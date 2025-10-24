<?php

namespace App\Http\Controllers;

use App\Models\AparForm;
use App\Models\Page3Duty;
use App\Models\Page3Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Page3Controller extends Controller
{
    /**
     * Update Page 3 data
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
                'duties_description' => 'nullable|string|max:10000',
                'projects' => 'nullable|array',
                'projects.*.project_description' => 'nullable|string|max:5000',
                'projects.*.achievement_description' => 'nullable|string|max:5000',
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
                
                // Handle Duties Description
                if ($request->has('duties_description')) {
                    // Delete existing duty record for this form
                    Page3Duty::where('form_id', $form->id)->delete();
                    
                    // Insert new duty record if data exists
                    if (!empty(trim($request->duties_description))) {
                        Page3Duty::create([
                            'form_id' => $form->id,
                            'duties_description' => $request->duties_description,
                            'added_by' => Auth::id(),
                        ]);
                    }
                }

                // Handle Projects Data
                if ($request->has('projects') && is_array($request->projects)) {
                    // Delete existing project records for this form
                    Page3Project::where('form_id', $form->id)->delete();
                    
                    // Insert new project records
                    foreach ($request->projects as $project) {
                        // Only create if at least one field has data
                        $projectDesc = trim($project['project_description'] ?? '');
                        $achievementDesc = trim($project['achievement_description'] ?? '');
                        
                        if (!empty($projectDesc) || !empty($achievementDesc)) {
                            Page3Project::create([
                                'form_id' => $form->id,
                                'project_description' => $projectDesc ?: null,
                                'achievement_description' => $achievementDesc ?: null,
                                'added_by' => Auth::id(),
                            ]);
                        }
                    }
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Page 3 data updated successfully!',
            ]);

        } catch (\Exception $e) {
            \Log::error('Page3Controller update error: ' . $e->getMessage());
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