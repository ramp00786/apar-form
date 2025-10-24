<?php

namespace App\Http\Controllers;

use App\Models\Page10Data;
use App\Models\AparForm;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Page10Controller extends Controller
{
    public function store(Request $request, AparForm $form): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'parameters' => 'required|array',
                'parameters.*.parameter_name' => 'nullable|string|max:255',
                'parameters.*.sub_parameters_label' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_a' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_b' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_c' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_d' => 'nullable|string|max:255',
                'parameters.*.sub_parameter_e' => 'nullable|string|max:255',
                'parameters.*.achievement_description' => 'nullable|string|max:1000',
            ]);

            // Delete existing Page 10 data for this form
            Page10Data::where('form_id', $form->id)->delete();

            // Save new data
            foreach ($validatedData['parameters'] as $parameterData) {
                // Only save if at least one field has data
                $hasData = collect($parameterData)->filter()->isNotEmpty();
                
                if ($hasData) {
                    Page10Data::create([
                        'form_id' => $form->id,
                        'parameter_name' => $parameterData['parameter_name'] ?? null,
                        'sub_parameters_label' => $parameterData['sub_parameters_label'] ?? null,
                        'sub_parameter_a' => $parameterData['sub_parameter_a'] ?? null,
                        'sub_parameter_b' => $parameterData['sub_parameter_b'] ?? null,
                        'sub_parameter_c' => $parameterData['sub_parameter_c'] ?? null,
                        'sub_parameter_d' => $parameterData['sub_parameter_d'] ?? null,
                        'sub_parameter_e' => $parameterData['sub_parameter_e'] ?? null,
                        'achievement_description' => $parameterData['achievement_description'] ?? null,
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Page 10 data saved successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving Page 10 data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, AparForm $form): JsonResponse
    {
        return $this->store($request, $form);
    }
}