<?php

namespace App\Http\Controllers;

use App\Models\AparForm;
use App\Models\Page5Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class Page5Controller extends Controller
{
    /**
     * Update Page 5 data
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

            // Validation rules for all page5 fields
            $validator = Validator::make($request->all(), [
                // Section A: Work Output
                'work_planned_reporting' => 'nullable|string|max:50',
                'work_planned_reviewing' => 'nullable|string|max:50', 
                'work_planned_initial' => 'nullable|string|max:50',
                'scientific_achievements_reporting' => 'nullable|string|max:50',
                'scientific_achievements_reviewing' => 'nullable|string|max:50',
                'scientific_achievements_initial' => 'nullable|string|max:50',
                'quality_output_reporting' => 'nullable|string|max:50',
                'quality_output_reviewing' => 'nullable|string|max:50',
                'quality_output_initial' => 'nullable|string|max:50',
                'analytical_ability_reporting' => 'nullable|string|max:50',
                'analytical_ability_reviewing' => 'nullable|string|max:50',
                'analytical_ability_initial' => 'nullable|string|max:50',
                'exceptional_work_reporting' => 'nullable|string|max:50',
                'exceptional_work_reviewing' => 'nullable|string|max:50',
                'exceptional_work_initial' => 'nullable|string|max:50',
                'overall_work_output_reporting' => 'nullable|string|max:50',
                'overall_work_output_reviewing' => 'nullable|string|max:50',
                'overall_work_output_initial' => 'nullable|string|max:50',
                
                // Section B: Personal Attributes
                'attitude_work_reporting' => 'nullable|string|max:50',
                'attitude_work_reviewing' => 'nullable|string|max:50',
                'attitude_work_initial' => 'nullable|string|max:50',
                'sense_responsibility_reporting' => 'nullable|string|max:50',
                'sense_responsibility_reviewing' => 'nullable|string|max:50',
                'sense_responsibility_initial' => 'nullable|string|max:50',
                'maintenance_discipline_reporting' => 'nullable|string|max:50',
                'maintenance_discipline_reviewing' => 'nullable|string|max:50',
                'maintenance_discipline_initial' => 'nullable|string|max:50',
                'communication_skills_reporting' => 'nullable|string|max:50',
                'communication_skills_reviewing' => 'nullable|string|max:50',
                'communication_skills_initial' => 'nullable|string|max:50',
                'leadership_qualities_reporting' => 'nullable|string|max:50',
                'leadership_qualities_reviewing' => 'nullable|string|max:50',
                'leadership_qualities_initial' => 'nullable|string|max:50',
                'team_spirit_reporting' => 'nullable|string|max:50',
                'team_spirit_reviewing' => 'nullable|string|max:50',
                'team_spirit_initial' => 'nullable|string|max:50',
                'overall_personal_attributes_reporting' => 'nullable|string|max:50',
                'overall_personal_attributes_reviewing' => 'nullable|string|max:50',
                'overall_personal_attributes_initial' => 'nullable|string|max:50',
                
                // Section C: Functional Competency
                'scientific_capability_reporting' => 'nullable|string|max:50',
                'scientific_capability_reviewing' => 'nullable|string|max:50',
                'scientific_capability_initial' => 'nullable|string|max:50',
                'st_foresight_reporting' => 'nullable|string|max:50',
                'st_foresight_reviewing' => 'nullable|string|max:50',
                'st_foresight_initial' => 'nullable|string|max:50',
                'decision_making_reporting' => 'nullable|string|max:50',
                'decision_making_reviewing' => 'nullable|string|max:50',
                'decision_making_initial' => 'nullable|string|max:50',
                'innovation_creativity_reporting' => 'nullable|string|max:50',
                'innovation_creativity_reviewing' => 'nullable|string|max:50',
                'innovation_creativity_initial' => 'nullable|string|max:50',
                'technical_competence_reporting' => 'nullable|string|max:50',
                'technical_competence_reviewing' => 'nullable|string|max:50',
                'technical_competence_initial' => 'nullable|string|max:50',
                'new_initiative_reporting' => 'nullable|string|max:50',
                'new_initiative_reviewing' => 'nullable|string|max:50',
                'new_initiative_initial' => 'nullable|string|max:50',
                'overall_functional_competency_reporting' => 'nullable|string|max:50',
                'overall_functional_competency_reviewing' => 'nullable|string|max:50',
                'overall_functional_competency_initial' => 'nullable|string|max:50',
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
                
                // Delete existing page5 data for this form
                Page5Data::where('form_id', $form->id)->delete();
                
                // Prepare data array
                $data = $request->only([
                    'work_planned_reporting', 'work_planned_reviewing', 'work_planned_initial',
                    'scientific_achievements_reporting', 'scientific_achievements_reviewing', 'scientific_achievements_initial',
                    'quality_output_reporting', 'quality_output_reviewing', 'quality_output_initial',
                    'analytical_ability_reporting', 'analytical_ability_reviewing', 'analytical_ability_initial',
                    'exceptional_work_reporting', 'exceptional_work_reviewing', 'exceptional_work_initial',
                    'overall_work_output_reporting', 'overall_work_output_reviewing', 'overall_work_output_initial',
                    'attitude_work_reporting', 'attitude_work_reviewing', 'attitude_work_initial',
                    'sense_responsibility_reporting', 'sense_responsibility_reviewing', 'sense_responsibility_initial',
                    'maintenance_discipline_reporting', 'maintenance_discipline_reviewing', 'maintenance_discipline_initial',
                    'communication_skills_reporting', 'communication_skills_reviewing', 'communication_skills_initial',
                    'leadership_qualities_reporting', 'leadership_qualities_reviewing', 'leadership_qualities_initial',
                    'team_spirit_reporting', 'team_spirit_reviewing', 'team_spirit_initial',
                    'overall_personal_attributes_reporting', 'overall_personal_attributes_reviewing', 'overall_personal_attributes_initial',
                    'scientific_capability_reporting', 'scientific_capability_reviewing', 'scientific_capability_initial',
                    'st_foresight_reporting', 'st_foresight_reviewing', 'st_foresight_initial',
                    'decision_making_reporting', 'decision_making_reviewing', 'decision_making_initial',
                    'innovation_creativity_reporting', 'innovation_creativity_reviewing', 'innovation_creativity_initial',
                    'technical_competence_reporting', 'technical_competence_reviewing', 'technical_competence_initial',
                    'new_initiative_reporting', 'new_initiative_reviewing', 'new_initiative_initial',
                    'overall_functional_competency_reporting', 'overall_functional_competency_reviewing', 'overall_functional_competency_initial',
                ]);
                
                // Check if any field has data
                $hasData = false;
                foreach ($data as $value) {
                    if (!empty(trim($value))) {
                        $hasData = true;
                        break;
                    }
                }
                
                // Insert new page5 data if at least one field has content
                if ($hasData) {
                    $data['form_id'] = $form->id;
                    $data['added_by'] = Auth::id();
                    Page5Data::create($data);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Page 5 data updated successfully!',
            ]);

        } catch (\Exception $e) {
            \Log::error('Page5Controller update error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the form.',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    public function save(Request $request)
    {
        try {
            $validated = $request->validate([
                'form_id' => 'required|exists:apar_forms,id',
                // Work Output Section
                'work_planned_reporting' => 'nullable|string|max:10',
                'work_planned_reviewing' => 'nullable|string|max:10',
                'work_planned_initial' => 'nullable|string|max:10',
                'scientific_achievements_reporting' => 'nullable|string|max:10',
                'scientific_achievements_reviewing' => 'nullable|string|max:10',
                'scientific_achievements_initial' => 'nullable|string|max:10',
                'quality_output_reporting' => 'nullable|string|max:10',
                'quality_output_reviewing' => 'nullable|string|max:10',
                'quality_output_initial' => 'nullable|string|max:10',
                'analytical_ability_reporting' => 'nullable|string|max:10',
                'analytical_ability_reviewing' => 'nullable|string|max:10',
                'analytical_ability_initial' => 'nullable|string|max:10',
                'exceptional_work_reporting' => 'nullable|string|max:10',
                'exceptional_work_reviewing' => 'nullable|string|max:10',
                'exceptional_work_initial' => 'nullable|string|max:10',
                'overall_work_output_reporting' => 'nullable|string|max:10',
                'overall_work_output_reviewing' => 'nullable|string|max:10',
                'overall_work_output_initial' => 'nullable|string|max:10',
                
                // Personal Attributes Section
                'attitude_work_reporting' => 'nullable|string|max:10',
                'attitude_work_reviewing' => 'nullable|string|max:10',
                'attitude_work_initial' => 'nullable|string|max:10',
                'sense_responsibility_reporting' => 'nullable|string|max:10',
                'sense_responsibility_reviewing' => 'nullable|string|max:10',
                'sense_responsibility_initial' => 'nullable|string|max:10',
                'maintenance_discipline_reporting' => 'nullable|string|max:10',
                'maintenance_discipline_reviewing' => 'nullable|string|max:10',
                'maintenance_discipline_initial' => 'nullable|string|max:10',
                'communication_skills_reporting' => 'nullable|string|max:10',
                'communication_skills_reviewing' => 'nullable|string|max:10',
                'communication_skills_initial' => 'nullable|string|max:10',
                'leadership_qualities_reporting' => 'nullable|string|max:10',
                'leadership_qualities_reviewing' => 'nullable|string|max:10',
                'leadership_qualities_initial' => 'nullable|string|max:10',
                'team_spirit_reporting' => 'nullable|string|max:10',
                'team_spirit_reviewing' => 'nullable|string|max:10',
                'team_spirit_initial' => 'nullable|string|max:10',
                'overall_personal_attributes_reporting' => 'nullable|string|max:10',
                'overall_personal_attributes_reviewing' => 'nullable|string|max:10',
                'overall_personal_attributes_initial' => 'nullable|string|max:10',
                
                // Functional Competency Section
                'scientific_capability_reporting' => 'nullable|string|max:10',
                'scientific_capability_reviewing' => 'nullable|string|max:10',
                'scientific_capability_initial' => 'nullable|string|max:10',
                'st_foresight_reporting' => 'nullable|string|max:10',
                'st_foresight_reviewing' => 'nullable|string|max:10',
                'st_foresight_initial' => 'nullable|string|max:10',
                'decision_making_reporting' => 'nullable|string|max:10',
                'decision_making_reviewing' => 'nullable|string|max:10',
                'decision_making_initial' => 'nullable|string|max:10',
                'innovation_creativity_reporting' => 'nullable|string|max:10',
                'innovation_creativity_reviewing' => 'nullable|string|max:10',
                'innovation_creativity_initial' => 'nullable|string|max:10',
                'technical_competence_reporting' => 'nullable|string|max:10',
                'technical_competence_reviewing' => 'nullable|string|max:10',
                'technical_competence_initial' => 'nullable|string|max:10',
                'new_initiative_reporting' => 'nullable|string|max:10',
                'new_initiative_reviewing' => 'nullable|string|max:10',
                'new_initiative_initial' => 'nullable|string|max:10',
                'overall_functional_competency_reporting' => 'nullable|string|max:10',
                'overall_functional_competency_reviewing' => 'nullable|string|max:10',
                'overall_functional_competency_initial' => 'nullable|string|max:10',
            ]);

            $page5Data = Page5Data::updateOrCreate(
                ['form_id' => $validated['form_id']],
                $validated
            );

            return response()->json([
                'success' => true,
                'message' => 'Page 5 data saved successfully!',
                'data' => $page5Data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}