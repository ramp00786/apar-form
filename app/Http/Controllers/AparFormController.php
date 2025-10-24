<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AparForm;
use App\Models\AparFormData;

class AparFormController extends Controller
{
    public function index()
    {
        $forms = AparForm::with('creator')->paginate(10);
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        // Only reviewing officers can create forms
        if (!auth()->user()->hasAparRole('reviewing_officer')) {
            abort(403, 'Only Reviewing Officers can create forms.');
        }

        return view('forms.create');
    }

    public function store(Request $request)
    {
        // Only reviewing officers can create forms
        if (!auth()->user()->hasAparRole('reviewing_officer')) {
            abort(403, 'Only Reviewing Officers can create forms.');
        }

        $validated = $request->validate([
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
            'department' => 'nullable|string|max:255',
        ]);

        $validated['created_by'] = auth()->id();

        $form = AparForm::create($validated);

        return redirect()->route('forms.show', $form)
            ->with('success', 'APAR form created successfully.');
    }

    public function show(AparForm $form)
    {
        $user = auth()->user();
        
        // Check if user has permission to view this form
        // For now, all authenticated users can view forms
        
        return view('forms.show', compact('form'));
    }

    public function edit(AparForm $form)
    {
        return view('forms.edit', compact('form'));
    }

    public function update(Request $request, AparForm $form)
    {
        $request->validate([
            'section' => 'required|in:part_3,part_4,part_5,part_b',
        ]);

        $section = $request->input('section');
        $user = auth()->user();

        // Check permissions for the section
        if (!$this->canEditSection($user, $section)) {
            abort(403, 'You do not have permission to edit this section.');
        }

        // Get validation rules for the section
        $validationRules = $this->getValidationRules($section);
        
        // Validate the data
        $validatedData = $request->validate($validationRules);
        $data = collect($validatedData)->except(['_token', '_method', 'section'])->toArray();

        // Store or update the form data for the specific section
        foreach ($data as $key => $value) {
            AparFormData::updateOrCreate(
                [
                    'form_id' => $form->id,
                    'section' => $section,
                    'field_name' => $key,
                ],
                [
                    'field_value' => is_null($value) ? null : (string) $value,
                ]
            );
        }

        return redirect()->route('forms.show', $form)->with('success', ucfirst(str_replace('_', ' ', $section)) . ' updated successfully.');
    }

    public function print(AparForm $form)
    {
        // Get all form data organized by sections
        $formData = [
            'part_3' => $form->getFormDataBySection('part_3'),
            'part_4' => $form->getFormDataBySection('part_4'),
            'part_5' => $form->getFormDataBySection('part_5'),
            'part_b' => $form->getFormDataBySection('part_b'),
            // Page specific data
            'page1_educations' => \App\Models\Page1Education::where('form_id', $form->id)->get(),
            'page2_qualifications' => \App\Models\Page2Qualification::where('form_id', $form->id)->get(),
            'page2_employment_details' => \App\Models\Page2EmploymentDetail::where('form_id', $form->id)->get(),
            'page2_trainings' => \App\Models\Page2Training::where('form_id', $form->id)->get(),
            'page2_leave_details' => \App\Models\Page2LeaveDetail::where('form_id', $form->id)->get(),
            'page3_duties' => \App\Models\Page3Duty::where('form_id', $form->id)->first(),
            'page3_projects' => \App\Models\Page3Project::where('form_id', $form->id)->get(),
            'page4_data' => \App\Models\Page4Data::where('form_id', $form->id)->first(),
            'page5_data' => \App\Models\Page5Data::where('form_id', $form->id)->first(),
            'page6_data' => \App\Models\Page6Data::where('form_id', $form->id)->first(),
            'page7_data' => \App\Models\Page7Data::where('form_id', $form->id)->first(),
            'page8_data' => \App\Models\Page8Data::where('form_id', $form->id)->first(),
            'page9_data' => \App\Models\Page9Data::where('form_id', $form->id)->first(),
            'page10_data' => \App\Models\Page10Data::where('form_id', $form->id)->get(),
            'page11_data' => \App\Models\Page11Data::where('form_id', $form->id)->get(),
        ];

        // For backwards compatibility and easier access
        $formData['page5_data_array'] = $formData['page5_data'] ? $formData['page5_data']->toArray() : [];

        return view('forms.print', compact('form', 'formData'));
    }

    private function canEditSection($user, $section)
    {
        switch ($section) {
            case 'part_3':
                return $user->hasAparPermission('edit_part_3');
            case 'part_4':
                return $user->hasAparPermission('edit_part_4');
            case 'part_5':
                return $user->hasAparPermission('edit_part_5');
            case 'part_b':
                return $user->hasAparPermission('edit_part_b');
            default:
                return false;
        }
    }

    private function getValidationRules($section)
    {
        switch ($section) {
            case 'part_3':
                return [
                    // Section A: Work Output (40%)
                    'work_planned_reporting' => 'nullable|integer|min:1|max:10',
                    'work_planned_reviewing' => 'nullable|integer|min:1|max:10',
                    'work_planned_initial' => 'nullable|string|max:10',
                    'scientific_achievements_reporting' => 'nullable|integer|min:1|max:10',
                    'scientific_achievements_reviewing' => 'nullable|integer|min:1|max:10',
                    'scientific_achievements_initial' => 'nullable|string|max:10',
                    'quality_output_reporting' => 'nullable|integer|min:1|max:10',
                    'quality_output_reviewing' => 'nullable|integer|min:1|max:10',
                    'quality_output_initial' => 'nullable|string|max:10',
                    'analytical_ability_reporting' => 'nullable|integer|min:1|max:10',
                    'analytical_ability_reviewing' => 'nullable|integer|min:1|max:10',
                    'analytical_ability_initial' => 'nullable|string|max:10',
                    'exceptional_work_reporting' => 'nullable|integer|min:1|max:10',
                    'exceptional_work_reviewing' => 'nullable|integer|min:1|max:10',
                    'exceptional_work_initial' => 'nullable|string|max:10',
                    'overall_work_output_reporting' => 'nullable|integer|min:1|max:10',
                    'overall_work_output_reviewing' => 'nullable|integer|min:1|max:10',
                    'overall_work_output_initial' => 'nullable|string|max:10',
                    
                    // Section B: Personal Attributes (30%)
                    'attitude_work_reporting' => 'nullable|integer|min:1|max:10',
                    'attitude_work_reviewing' => 'nullable|integer|min:1|max:10',
                    'attitude_work_initial' => 'nullable|string|max:10',
                    'sense_responsibility_reporting' => 'nullable|integer|min:1|max:10',
                    'sense_responsibility_reviewing' => 'nullable|integer|min:1|max:10',
                    'sense_responsibility_initial' => 'nullable|string|max:10',
                    'maintenance_discipline_reporting' => 'nullable|integer|min:1|max:10',
                    'maintenance_discipline_reviewing' => 'nullable|integer|min:1|max:10',
                    'maintenance_discipline_initial' => 'nullable|string|max:10',
                    'communication_skills_reporting' => 'nullable|integer|min:1|max:10',
                    'communication_skills_reviewing' => 'nullable|integer|min:1|max:10',
                    'communication_skills_initial' => 'nullable|string|max:10',
                    'leadership_qualities_reporting' => 'nullable|integer|min:1|max:10',
                    'leadership_qualities_reviewing' => 'nullable|integer|min:1|max:10',
                    'leadership_qualities_initial' => 'nullable|string|max:10',
                    'team_spirit_reporting' => 'nullable|integer|min:1|max:10',
                    'team_spirit_reviewing' => 'nullable|integer|min:1|max:10',
                    'team_spirit_initial' => 'nullable|string|max:10',
                    'overall_personal_attributes_reporting' => 'nullable|integer|min:1|max:10',
                    'overall_personal_attributes_reviewing' => 'nullable|integer|min:1|max:10',
                    'overall_personal_attributes_initial' => 'nullable|string|max:10',
                    
                    // Section C: Professional Competence (30%)
                    'scientific_capability_reporting' => 'nullable|integer|min:1|max:10',
                    'scientific_capability_reviewing' => 'nullable|integer|min:1|max:10',
                    'scientific_capability_initial' => 'nullable|string|max:10',
                    'st_foresight_reporting' => 'nullable|integer|min:1|max:10',
                    'st_foresight_reviewing' => 'nullable|integer|min:1|max:10',
                    'st_foresight_initial' => 'nullable|string|max:10',
                    'decision_making_reporting' => 'nullable|integer|min:1|max:10',
                    'decision_making_reviewing' => 'nullable|integer|min:1|max:10',
                    'decision_making_initial' => 'nullable|string|max:10',
                    'innovation_creativity_reporting' => 'nullable|integer|min:1|max:10',
                    'innovation_creativity_reviewing' => 'nullable|integer|min:1|max:10',
                    'innovation_creativity_initial' => 'nullable|string|max:10',
                    'technical_competence_reporting' => 'nullable|integer|min:1|max:10',
                    'technical_competence_reviewing' => 'nullable|integer|min:1|max:10',
                    'technical_competence_initial' => 'nullable|string|max:10',
                    'new_initiative_reporting' => 'nullable|integer|min:1|max:10',
                    'new_initiative_reviewing' => 'nullable|integer|min:1|max:10',
                    'new_initiative_initial' => 'nullable|string|max:10',
                    'overall_functional_competency_reporting' => 'nullable|integer|min:1|max:10',
                    'overall_functional_competency_reviewing' => 'nullable|integer|min:1|max:10',
                    'overall_functional_competency_initial' => 'nullable|string|max:10',
                ];
                
            case 'part_4':
                return [
                    'relation_with_public' => 'nullable|string|max:2000',
                    'training_recommendation' => 'nullable|string|max:2000',
                    'state_of_health' => 'nullable|string|max:1000',
                    'integrity_assessment' => 'nullable|string|max:1000',
                    'pen_picture_reporting' => 'nullable|string|max:2000',
                    'overall_numerical_grading' => 'nullable|numeric|min:1|max:10',
                ];
                
            case 'part_5':
                return [
                    'reviewing_remarks' => 'nullable|string|max:2000',
                    'agree_with_reporting_officer' => 'nullable|in:yes,no',
                    'disagreement_reason' => 'nullable|string|max:2000',
                    'pen_picture_reviewing' => 'nullable|string|max:2000',
                    'overall_numerical_grading_reviewing' => 'nullable|numeric|min:1|max:10',
                ];
                
            case 'part_b':
                return [
                    'agree_evaluation' => 'nullable|string|max:2000',
                    'innovative_summary' => 'nullable|string|max:2000',
                    'exceptional_contribution' => 'nullable|string|max:2000',
                    'param1_marks' => 'nullable|integer|min:0|max:100',
                    'param1_max_marks' => 'nullable|integer|min:0|max:100',
                    'param2_marks' => 'nullable|integer|min:0|max:100',
                    'param2_max_marks' => 'nullable|integer|min:0|max:100',
                    'param3_marks' => 'nullable|integer|min:0|max:100',
                    'param3_max_marks' => 'nullable|integer|min:0|max:100',
                    'param4_marks' => 'nullable|integer|min:0|max:100',
                    'param4_max_marks' => 'nullable|integer|min:0|max:100',
                    'param5_marks' => 'nullable|integer|min:0|max:100',
                    'param5_max_marks' => 'nullable|integer|min:0|max:100',
                    'total_marks_obtained' => 'nullable|integer|min:0|max:500',
                    'total_max_marks' => 'nullable|integer|min:0|max:500',
                ];
                
            default:
                return [];
        }
    }

    public function updateStatus(Request $request, AparForm $form)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:draft,in_progress,completed'
            ]);

            $form->update(['status' => $validated['status']]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'status' => $form->status
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage()
            ], 500);
        }
    }
}
