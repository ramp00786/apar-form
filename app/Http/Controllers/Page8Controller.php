<?php

namespace App\Http\Controllers;

use App\Models\Page8Data;
use Illuminate\Http\Request;

class Page8Controller extends Controller
{
    public function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_id' => 'required|exists:apar_apar_forms,id',
                'reviewing_remarks' => 'nullable|string',
                'agree_with_reporting_officer' => 'nullable|in:yes,no',
                'disagreement_reason' => 'nullable|string',
                'pen_picture_reviewing' => 'nullable|string',
                'overall_numerical_grading_reviewing' => 'nullable|string',
            ]);

            $page8Data = Page8Data::updateOrCreate(
                ['form_id' => $validated['form_id']],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Page 8 data saved successfully!',
                'data' => $page8Data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}