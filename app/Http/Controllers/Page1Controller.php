<?php

namespace App\Http\Controllers;

use App\Models\AparForm;
use App\Models\Page1Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Page1Controller extends Controller
{
    /**
     * Update Page 1 data
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
                'employee_name' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'employee_id' => 'nullable|string|max:255',
                'date_of_birth' => 'nullable|date',
                'section_or_group' => 'nullable|string|max:255',
                'area_of_specialization' => 'nullable|string|max:255',
                'date_of_joining' => 'nullable|date',
                'email' => 'nullable|email|max:255',
                'mobile_no' => 'nullable|string|max:20',
                'report_year' => 'required|integer|min:2000|max:2100',
                'educations' => 'nullable|array',
                'educations.*.qualification' => 'nullable|string|max:255',
                'educations.*.year' => 'nullable|string|max:10',
                'educations.*.university' => 'nullable|string|max:255',
                'educations.*.remark' => 'nullable|string|max:255'
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
                // Update the form
                $form->update([
                    'employee_name' => $request->employee_name,
                    'designation' => $request->designation,
                    'employee_id' => $request->employee_id,
                    'date_of_birth' => $request->date_of_birth,
                    'section_or_group' => $request->section_or_group,
                    'area_of_specialization' => $request->area_of_specialization,
                    'date_of_joining' => $request->date_of_joining,
                    'email' => $request->email,
                    'mobile_no' => $request->mobile_no,
                    'report_year' => $request->report_year
                ]);

                // Handle education data if provided
                if ($request->has('educations') && is_array($request->educations)) {
                    // Delete existing education records for this form
                    Page1Education::where('form_id', $form->id)->delete();
                    
                    // Insert new education records
                    foreach ($request->educations as $education) {
                        // Only create if at least one field has data
                        if (!empty(array_filter($education))) {
                            Page1Education::create([
                                'form_id' => $form->id,
                                'qualification' => $education['qualification'] ?? null,
                                'year' => $education['year'] ?? null,
                                'university' => $education['university'] ?? null,
                                'remark' => $education['remark'] ?? null,
                                'added_by' => Auth::id(),
                            ]);
                        }
                    }
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Page 1 data updated successfully!',
                'form' => $form->fresh()->load('page1Educations')
            ]);

        } catch (\Exception $e) {
            \Log::error('Page1Controller update error: ' . $e->getMessage());
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