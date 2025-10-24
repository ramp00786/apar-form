<?php

namespace App\Http\Controllers;

use App\Models\Page11Data;
use App\Models\Page11OverallAssessment;
use App\Models\AparForm;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Page11Controller extends Controller
{
    public function store(Request $request, AparForm $form): JsonResponse
    {
        try {
            // Check if user has reporting officer role
            if (!auth()->user()->hasAparRole('reporting_officer')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Access denied. Only reporting officers can edit this page.'
                ], 403);
            }

            $validatedData = $request->validate([
                'agree_evaluation' => 'nullable|string|max:2000',
                'innovative_summary' => 'nullable|string|max:2000',
                'exceptional_contribution' => 'nullable|string|max:2000',
                'parameters' => 'nullable|array',
                'parameters.*.parameter_name' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_a' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_b' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_c' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_d' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_e' => 'nullable|string|max:255',
                'parameters.*.marks_given' => 'nullable|integer|min:0|max:100',
                'parameters.*.max_marks' => 'nullable|integer|min:0|max:100',
            ]);

            // Delete existing Page 11 data for this form
            Page11Data::where('form_id', $form->id)->delete();
            Page11OverallAssessment::where('form_id', $form->id)->delete();

            // Save text fields first (only one record for these)
            $textData = [
                'form_id' => $form->id,
                'agree_evaluation' => $validatedData['agree_evaluation'] ?? null,
                'innovative_summary' => $validatedData['innovative_summary'] ?? null,
                'exceptional_contribution' => $validatedData['exceptional_contribution'] ?? null,
            ];

            // Create a record for text fields only if they have data
            if (collect($textData)->filter()->count() > 1) { // More than just form_id
                Page11Data::create($textData);
            }

            // Save parameter data in separate table
            if (isset($validatedData['parameters']) && is_array($validatedData['parameters'])) {
                foreach ($validatedData['parameters'] as $parameterData) {
                    // Only save if at least one field has data
                    $hasData = collect($parameterData)->filter(function($value) {
                        return !empty($value);
                    });
                    
                    if ($hasData->count() > 0) {
                        Page11OverallAssessment::create([
                            'form_id' => $form->id,
                            'parameter_name' => $parameterData['parameter_name'] ?? null,
                            'sub_parameter_a' => $parameterData['sub_parameter_a'] ?? null,
                            'sub_parameter_b' => $parameterData['sub_parameter_b'] ?? null,
                            'sub_parameter_c' => $parameterData['sub_parameter_c'] ?? null,
                            'sub_parameter_d' => $parameterData['sub_parameter_d'] ?? null,
                            'sub_parameter_e' => $parameterData['sub_parameter_e'] ?? null,
                            'marks_given' => $parameterData['marks_given'] ?? null,
                            'max_marks' => $parameterData['max_marks'] ?? null,
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Page 11 data saved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving Page 11 data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, AparForm $form): JsonResponse
    {
        return $this->store($request, $form);
    }
}