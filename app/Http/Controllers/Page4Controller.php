<?php

namespace App\Http\Controllers;

use App\Models\AparForm;
use App\Models\Page4Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Page4Controller extends Controller
{
    /**
     * Update Page 4 data
     */
    public function update(Request $request, $formId)
    {
        try {
            // Find the form
            $form = AparForm::findOrFail($formId);
            
            // Check if user has permission to edit this form
            if ($form->created_by !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have permission to edit this form.'
                ], 403);
            }

            // Validation rules
            $validator = Validator::make($request->all(), [
                'publications_reports' => 'nullable|string|max:10000',
                'government_missions' => 'nullable|string|max:5000',
                'gem_portal_work' => 'nullable|string|max:5000',
                'property_return_filing' => 'nullable|string|max:5000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Use database transaction for data consistency
            DB::transaction(function () use ($request, $form) {
                
                // Delete existing page4 data for this form
                Page4Data::where('form_id', $form->id)->delete();
                
                // Check if any field has data
                $publicationsReports = trim($request->publications_reports ?? '');
                $governmentMissions = trim($request->government_missions ?? '');
                $gemPortalWork = trim($request->gem_portal_work ?? '');
                $propertyReturnFiling = trim($request->property_return_filing ?? '');
                
                // Insert new page4 data if at least one field has content
                if ($publicationsReports || $governmentMissions || $gemPortalWork || $propertyReturnFiling) {
                    Page4Data::create([
                        'form_id' => $form->id,
                        'publications_reports' => $publicationsReports ?: null,
                        'government_missions' => $governmentMissions ?: null,
                        'gem_portal_work' => $gemPortalWork ?: null,
                        'property_return_filing' => $propertyReturnFiling ?: null,
                        'added_by' => Auth::id(),
                    ]);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Page 4 data updated successfully!',
            ]);

        } catch (\Exception $e) {
            \Log::error('Page4Controller update error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the form.',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
}