<?php

namespace App\Http\Controllers;

use App\Models\Page6Data;
use Illuminate\Http\Request;

class Page6Controller extends Controller
{
    public function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_id' => 'required|exists:apar_apar_forms,id',
                'relation_with_public' => 'nullable|string',
                'training_recommendation' => 'nullable|string',
                'state_of_health' => 'nullable|string',
            ]);

            $page6Data = Page6Data::updateOrCreate(
                ['form_id' => $validated['form_id']],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Page 6 data saved successfully!',
                'data' => $page6Data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}