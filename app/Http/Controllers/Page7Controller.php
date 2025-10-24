<?php

namespace App\Http\Controllers;

use App\Models\Page7Data;
use Illuminate\Http\Request;

class Page7Controller extends Controller
{
    public function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_id' => 'required|exists:apar_apar_forms,id',
                'integrity_assessment' => 'nullable|string',
                'pen_picture_reporting' => 'nullable|string',
                'overall_numerical_grading' => 'nullable|string',
            ]);

            $page7Data = Page7Data::updateOrCreate(
                ['form_id' => $validated['form_id']],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Page 7 data saved successfully!',
                'data' => $page7Data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}