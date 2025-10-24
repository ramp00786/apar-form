<?php

namespace App\Http\Controllers;

use App\Models\Page9Data;
use Illuminate\Http\Request;

class Page9Controller extends Controller
{
    public function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_id' => 'required|exists:apar_apar_forms,id',
                'scientific_technical_summary' => 'nullable|string',
                'new_initiatives' => 'nullable|string',
                'st_content_work' => 'nullable|string',
                'innovation_content_work' => 'nullable|string',
            ]);

            $page9Data = Page9Data::updateOrCreate(
                ['form_id' => $validated['form_id']],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Page 9 data saved successfully!',
                'data' => $page9Data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}