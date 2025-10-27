{{-- page 5 --}}
<style>
    #page5 input {
        height: 35px;
        text-align: center;
    }

    #page5 input:disabled {
        background-color: lightgray;
        cursor: not-allowed;
    }

    .bg-gray-100 {
        background-color: #f3f4f6;
    }

    .evaluation-table input {
        border: 1px solid #ddd;
        width: 100%;
        padding: 5px;
    }

    #page5 input[type="number"] {
        -moz-appearance: textfield;
    }

    #page5 input[type="number"]::-webkit-outer-spin-button,
    #page5 input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

{{-- fetch page5 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page5Data = \App\Models\Page5Data::where('form_id', $formId)->first();

    // Role-based access control
    $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
    $isReviewingOfficer = auth()->user()->hasAparRole('reviewing_officer');
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page5">

    {{-- Edit/Save/Cancel Buttons --}}
    

    {{-- page 5 --}}

    <div class="page-number">-5-</div>
    <div class="part-title">PART-3 (Name of the Employee:____{{ $form->employee_name }}____)</div>
    <div class="part-subtitle" style="text-align: left; font-weight: bold;">Numerical grading is to be
        awarded by reporting and reviewing authority which should be on a scale of 1-10 where 1 refers to
        the lowest grade and 10 to the highest.</div>
    <div class="part-subtitle">(Please read carefully the guidelines before filling entries)</div>



    <!-- Section A: Assessment of Work Output -->
    <div class="text-center"><strong>(A) Assessment of work output (weightage to this Section would be
            40%)</strong></div>
    <table class="evaluation-table">
        <thead>
            <tr>
                <th style="width: 40%;">&nbsp;</th>
                <th style="width: 20%;">Reporting Authority</th>
                <th style="width: 25%;">Reviewing Authority</th>
                <th style="width: 15%;">Initial of Reviewing Authority</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>(i) Accomplishment of planned work/work allotted</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->work_planned_reporting ?? '' }}" name="work_planned_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->work_planned_reviewing ?? '' }}" name="work_planned_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->work_planned_initial ?? '' }}" name="work_planned_initial" min="1"
                        max="10">
                </td>
            </tr>
            <tr>
                <td>(ii) Scientist & Technical Achievements</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->scientific_achievements_reporting ?? '' }}"
                        name="scientific_achievements_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->scientific_achievements_reviewing ?? '' }}"
                        name="scientific_achievements_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->scientific_achievements_initial ?? '' }}"
                        name="scientific_achievements_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iii) Quality of output</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->quality_output_reporting ?? '' }}" name="quality_output_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->quality_output_reviewing ?? '' }}" name="quality_output_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->quality_output_initial ?? '' }}" name="quality_output_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iv) Analytical ability</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->analytical_ability_reporting ?? '' }}"
                        name="analytical_ability_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->analytical_ability_reviewing ?? '' }}"
                        name="analytical_ability_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->analytical_ability_initial ?? '' }}" name="analytical_ability_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(v) Accomplishment of exceptional work</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->exceptional_work_reporting ?? '' }}" name="exceptional_work_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->exceptional_work_reviewing ?? '' }}" name="exceptional_work_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->exceptional_work_initial ?? '' }}" name="exceptional_work_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr style="background-color: #fff2cc;">
                <td><strong>Overall Grading on "Work Output"</strong></td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->overall_work_output_reporting ?? '' }}"
                        name="overall_work_output_reporting" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->overall_work_output_reviewing ?? '' }}"
                        name="overall_work_output_reviewing" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->overall_work_output_initial ?? '' }}"
                        name="overall_work_output_initial" style="font-weight: bold;" min="1" max="10">
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Section B: Assessment of Personal Attributes -->
    <div class="text-center"><strong>(B) Assessment of personal attributes (weightage to this Section would
            be 30%)</strong></div>

    <table class="evaluation-table">
        <thead>
            <tr>
                <th style="width: 40%;">&nbsp;</th>
                <th style="width: 20%;">Reporting Authority</th>
                <th style="width: 25%;">Reviewing Authority</th>
                <th style="width: 15%;">Initial of Reviewing Authority</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>(i) Attitude to work</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->attitude_work_reporting ?? '' }}" name="attitude_work_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->attitude_work_reviewing ?? '' }}" name="attitude_work_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->attitude_work_initial ?? '' }}" name="attitude_work_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(ii) Sense of Responsibility</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->sense_responsibility_reporting ?? '' }}"
                        name="sense_responsibility_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->sense_responsibility_reviewing ?? '' }}"
                        name="sense_responsibility_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->sense_responsibility_initial ?? '' }}"
                        name="sense_responsibility_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iii) Maintenance of Discipline</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->maintenance_discipline_reporting ?? '' }}"
                        name="maintenance_discipline_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->maintenance_discipline_reviewing ?? '' }}"
                        name="maintenance_discipline_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->maintenance_discipline_initial ?? '' }}"
                        name="maintenance_discipline_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iv) Communication skills</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->communication_skills_reporting ?? '' }}"
                        name="communication_skills_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->communication_skills_reviewing ?? '' }}"
                        name="communication_skills_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->communication_skills_initial ?? '' }}"
                        name="communication_skills_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(v) Leadership Qualities</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->leadership_qualities_reporting ?? '' }}"
                        name="leadership_qualities_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->leadership_qualities_reviewing ?? '' }}"
                        name="leadership_qualities_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->leadership_qualities_initial ?? '' }}"
                        name="leadership_qualities_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(vi) Capacity to work in team spirit</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->team_spirit_reporting ?? '' }}" name="team_spirit_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->team_spirit_reviewing ?? '' }}" name="team_spirit_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->team_spirit_initial ?? '' }}" name="team_spirit_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr style="background-color: #fff2cc;">
                <td><strong>Overall Grading on "Personal Attributes"</strong></td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->overall_personal_attributes_reporting ?? '' }}"
                        name="overall_personal_attributes_reporting" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->overall_personal_attributes_reviewing ?? '' }}"
                        name="overall_personal_attributes_reviewing" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->overall_personal_attributes_initial ?? '' }}"
                        name="overall_personal_attributes_initial" style="font-weight: bold;" min="1"
                        max="10">
                </td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>
    <!-- Section C: Assessment of Functional Competency -->
    <div class="text-center p-4 px-8"><strong>(C) Assessment of functional competency (weightage to this Section
            would be 30%)</strong></div>

    <table class="evaluation-table">
        <thead>
            <tr>
                <th style="width: 40%;">&nbsp;</th>
                <th style="width: 20%;">Reporting Authority</th>
                <th style="width: 25%;">Reviewing Authority (Refer Para 2 of Part 5)</th>
                <th style="width: 15%;">Initial of Reviewing Authority</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>(i) Scientific Capability</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->scientific_capability_reporting ?? '' }}"
                        name="scientific_capability_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->scientific_capability_reviewing ?? '' }}"
                        name="scientific_capability_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->scientific_capability_initial ?? '' }}"
                        name="scientific_capability_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(ii) S&T Foresight and Vision</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->st_foresight_reporting ?? '' }}" name="st_foresight_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->st_foresight_reviewing ?? '' }}" name="st_foresight_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->st_foresight_initial ?? '' }}" name="st_foresight_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iii) Decision making ability</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->decision_making_reporting ?? '' }}" name="decision_making_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->decision_making_reviewing ?? '' }}" name="decision_making_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->decision_making_initial ?? '' }}" name="decision_making_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(iv) Innovation/Creativity</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->innovation_creativity_reporting ?? '' }}"
                        name="innovation_creativity_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->innovation_creativity_reviewing ?? '' }}"
                        name="innovation_creativity_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->innovation_creativity_initial ?? '' }}"
                        name="innovation_creativity_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(v) Technical Competence</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->technical_competence_reporting ?? '' }}"
                        name="technical_competence_reporting" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->technical_competence_reviewing ?? '' }}"
                        name="technical_competence_reviewing" min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->technical_competence_initial ?? '' }}"
                        name="technical_competence_initial" min="1" max="10">
                </td>
            </tr>
            <tr>
                <td>(vi) New Initiative</td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->new_initiative_reporting ?? '' }}" name="new_initiative_reporting"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->new_initiative_reviewing ?? '' }}" name="new_initiative_reviewing"
                        min="1" max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->new_initiative_initial ?? '' }}" name="new_initiative_initial"
                        min="1" max="10">
                </td>
            </tr>
            <tr style="background-color: #fff2cc;">
                <td><strong>Overall Grading on "Functional Competency"</strong></td>
                <td style="text-align: center;">
                    <input type="number" class="reporting-field" disabled
                        value="{{ $page5Data->overall_functional_competency_reporting ?? '' }}"
                        name="overall_functional_competency_reporting" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="reviewing-field" disabled
                        value="{{ $page5Data->overall_functional_competency_reviewing ?? '' }}"
                        name="overall_functional_competency_reviewing" style="font-weight: bold;" min="1"
                        max="10">
                </td>
                <td style="text-align: center;">
                    <input type="number" class="initial-field" disabled
                        value="{{ $page5Data->overall_functional_competency_initial ?? '' }}"
                        name="overall_functional_competency_initial" style="font-weight: bold;" min="1"
                        max="10">
                </td>
            </tr>
        </tbody>
    </table>


</div> {{-- end page 5 --}}
