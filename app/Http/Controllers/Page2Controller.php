<?php

namespace App\Http\Controllers;

use App\Models\AparForm;
use App\Models\Page2EmploymentDetail;
use App\Models\Page2Qualification;
use App\Models\Page2Training;
use App\Models\Page2LeaveDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Page2Controller extends Controller
{
    /**
     * Update Page 2 data
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
                // Employment details
                'employment_details' => 'nullable|array',
                'employment_details.*.grade_post' => 'nullable|string|max:255',
                'employment_details.*.lab_institute' => 'nullable|string|max:255',
                'employment_details.*.duration' => 'nullable|string|max:255',
                'employment_details.*.remark' => 'nullable|string|max:500',
                
                // Qualifications
                'qualifications' => 'nullable|array',
                'qualifications.*.qualification' => 'nullable|string|max:255',
                'qualifications.*.year' => 'nullable|string|max:10',
                'qualifications.*.university_institute' => 'nullable|string|max:255',
                'qualifications.*.remark' => 'nullable|string|max:500',
                
                // Training details
                'training_details' => 'nullable|string|max:5000',
                
                // Leave details
                'leave_details' => 'nullable|array',
                'leave_details.*.nature_of_leave' => 'nullable|string|max:255',
                'leave_details.*.period' => 'nullable|string|max:255',
                'leave_details.*.no_of_days' => 'nullable|integer|min:0|max:365',
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
                
                // Handle Employment Details
                if ($request->has('employment_details') && is_array($request->employment_details)) {
                    // Delete existing employment records for this form
                    Page2EmploymentDetail::where('form_id', $form->id)->delete();
                    
                    // Insert new employment records
                    foreach ($request->employment_details as $employment) {
                        // Only create if at least one field has data
                        if (!empty(array_filter($employment))) {
                            Page2EmploymentDetail::create([
                                'form_id' => $form->id,
                                'grade_post' => $employment['grade_post'] ?? null,
                                'lab_institute' => $employment['lab_institute'] ?? null,
                                'duration' => $employment['duration'] ?? null,
                                'remark' => $employment['remark'] ?? null,
                                'added_by' => Auth::id(),
                            ]);
                        }
                    }
                }

                // Handle Qualifications
                if ($request->has('qualifications') && is_array($request->qualifications)) {
                    // Delete existing qualification records for this form
                    Page2Qualification::where('form_id', $form->id)->delete();
                    
                    // Insert new qualification records
                    foreach ($request->qualifications as $qualification) {
                        // Only create if at least one field has data
                        if (!empty(array_filter($qualification))) {
                            Page2Qualification::create([
                                'form_id' => $form->id,
                                'qualification' => $qualification['qualification'] ?? null,
                                'year' => $qualification['year'] ?? null,
                                'university_institute' => $qualification['university_institute'] ?? null,
                                'remark' => $qualification['remark'] ?? null,
                                'added_by' => Auth::id(),
                            ]);
                        }
                    }
                }

                // Handle Training Details
                if ($request->has('training_details')) {
                    // Delete existing training record for this form
                    Page2Training::where('form_id', $form->id)->delete();
                    
                    // Insert new training record if data exists
                    if (!empty(trim($request->training_details))) {
                        Page2Training::create([
                            'form_id' => $form->id,
                            'training_details' => $request->training_details,
                            'added_by' => Auth::id(),
                        ]);
                    }
                }

                // Handle Leave Details
                if ($request->has('leave_details') && is_array($request->leave_details)) {
                    // Delete existing leave records for this form
                    Page2LeaveDetail::where('form_id', $form->id)->delete();
                    
                    // Insert new leave records
                    foreach ($request->leave_details as $leave) {
                        // Only create if at least one field has data
                        if (!empty(array_filter($leave))) {
                            Page2LeaveDetail::create([
                                'form_id' => $form->id,
                                'nature_of_leave' => $leave['nature_of_leave'] ?? null,
                                'period' => $leave['period'] ?? null,
                                'no_of_days' => $leave['no_of_days'] ?? null,
                                'added_by' => Auth::id(),
                            ]);
                        }
                    }
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Page 2 data updated successfully!',
            ]);

        } catch (\Exception $e) {
            \Log::error('Page2Controller update error: ' . $e->getMessage());
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