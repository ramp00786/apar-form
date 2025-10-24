<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                APAR Form - {{ $form->employee_name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Employee Information (Part 1) -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-2 text-blue-700 flex items-center gap-2 justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                        PART-1: Identification Information
                    </h3>
                    <p class="text-center text-sm text-gray-600 mb-2">(Furnished by Administration/Custodian)</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div><span class="font-semibold text-gray-700">Name of the Employee:</span> <span class="text-gray-900">{{ $form->employee_name }}</span></div>
                        <div><span class="font-semibold text-gray-700">Designation:</span> <span class="text-gray-900">{{ $form->designation }}</span></div>
                        <div><span class="font-semibold text-gray-700">Employee ID:</span> <span class="text-gray-900">{{ $form->employee_id ?: 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Date of Birth:</span> <span class="text-gray-900">{{ $form->date_of_birth ? $form->date_of_birth->format('d/m/Y') : 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Section or Group:</span> <span class="text-gray-900">{{ $form->section_or_group ?: 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Area of Specialization:</span> <span class="text-gray-900">{{ $form->area_of_specialization ?: 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Date of Joining to the Post:</span> <span class="text-gray-900">{{ $form->date_of_joining ? $form->date_of_joining->format('d/m/Y') : 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">E-mail ID:</span> <span class="text-gray-900">{{ $form->email ?: 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Mobile No.:</span> <span class="text-gray-900">{{ $form->mobile_no ?: 'N/A' }}</span></div>
                        <div><span class="font-semibold text-gray-700">Year Of the Report:</span> <span class="text-gray-900">{{ $form->report_year }}</span></div>
                        @if($form->department)
                        <div><span class="font-semibold text-gray-700">Department:</span> <span class="text-gray-900">{{ $form->department }}</span></div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sectioned Form Parts as Accordions -->
            <div class="space-y-8">
                <!-- Part 3 -->
                @if(auth()->user()->hasAparPermission('view_part_3'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-indigo-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-3 (Name of the Employee: {{ $form->employee_name }})
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_3'))
                                <button onclick="editSection('part_3')" class="inline-flex items-center gap-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <div class="mb-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">Numerical grading is to be awarded by reporting and reviewing authority which should be on a scale of 1-10 where 1 refers to the lowest grade and 10 to the highest.</p>
                            <p class="text-sm text-center text-gray-600 mb-4">(Please read carefully the guidelines before filling entries)</p>
                        </div>

                        <form id="part_3_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_3">
                            @php
                                $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
                                $isReviewingOfficer = auth()->user()->hasAparRole('reviewing_officer');
                                $reportingDisabled = !$isReportingOfficer ? 'disabled readonly' : '';
                                $reviewingDisabled = !$isReviewingOfficer ? 'disabled readonly' : '';
                                $reportingClass = !$isReportingOfficer ? 'bg-gray-100 cursor-not-allowed' : '';
                                $reviewingClass = !$isReviewingOfficer ? 'bg-gray-100 cursor-not-allowed' : '';
                                $initialDisabled = 'disabled readonly'; // Always disabled for all users
                                $initialClass = 'bg-gray-100 cursor-not-allowed'; // Always disabled styling
                            @endphp

                            <!-- Section A: Assessment of work output (40% weightage) -->
                            <div class="mb-8">
                                <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(A) Assessment of work output (weightage to this Section would be 40%)</h4>
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse border border-gray-400 text-sm">
                                        <thead>
                                            <tr>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority<br><span class="text-xs">(Refer Para 2 of Part 5)</span></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(i) Accomplishment of planned work/work allotted as per subject allotted</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="work_planned_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ !auth()->user()->hasAparRole('reporting_officer') ? 'bg-gray-100 cursor-not-allowed' : '' }}" value="{{ $form->getFormDataBySection('part_3')['work_planned_reporting'] ?? '' }}" {{ !auth()->user()->hasAparRole('reporting_officer') ? 'disabled readonly' : '' }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="work_planned_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ !auth()->user()->hasAparRole('reviewing_officer') ? 'bg-gray-100 cursor-not-allowed' : '' }}" value="{{ $form->getFormDataBySection('part_3')['work_planned_reviewing'] ?? '' }}" {{ !auth()->user()->hasAparRole('reviewing_officer') ? 'disabled readonly' : '' }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="work_planned_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['work_planned_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(ii) Scientist & Technical Achievements</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="scientific_achievements_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_achievements_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="scientific_achievements_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_achievements_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="scientific_achievements_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_achievements_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iii) Quality of output</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="quality_output_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['quality_output_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="quality_output_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['quality_output_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="quality_output_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['quality_output_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iv) Analytical ability</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="analytical_ability_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['analytical_ability_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="analytical_ability_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['analytical_ability_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="analytical_ability_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['analytical_ability_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(v) Accomplishment of exceptional work/unforeseen tasks performed</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="exceptional_work_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['exceptional_work_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="exceptional_work_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['exceptional_work_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="exceptional_work_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['exceptional_work_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr class="bg-yellow-50">
                                                <td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Work Output"</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_work_output_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_work_output_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_work_output_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_work_output_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="overall_work_output_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_work_output_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Section B: Assessment of personal attributes (30% weightage) -->
                            <div class="mb-8">
                                <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(B) Assessment of personal attributes (weightage to this Section would be 30%)</h4>
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse border border-gray-400 text-sm">
                                        <thead>
                                            <tr>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority<br><span class="text-xs">(Refer Para 2 of Part 5)</span></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(i) Attitude to work</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="attitude_work_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['attitude_work_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="attitude_work_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['attitude_work_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="attitude_work_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['attitude_work_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(ii) Sense of Responsibility</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="sense_responsibility_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['sense_responsibility_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="sense_responsibility_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['sense_responsibility_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="sense_responsibility_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['sense_responsibility_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iii) Maintenance of Discipline</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="maintenance_discipline_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['maintenance_discipline_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="maintenance_discipline_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['maintenance_discipline_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="maintenance_discipline_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['maintenance_discipline_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iv) Communication skills</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="communication_skills_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['communication_skills_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="communication_skills_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['communication_skills_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="communication_skills_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['communication_skills_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(v) Leadership Qualities</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="leadership_qualities_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['leadership_qualities_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="leadership_qualities_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['leadership_qualities_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="leadership_qualities_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['leadership_qualities_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(vi) Capacity to work in team spirit</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="team_spirit_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['team_spirit_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="team_spirit_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['team_spirit_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="team_spirit_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['team_spirit_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr class="bg-yellow-50">
                                                <td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Personal Attributes"</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_personal_attributes_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_personal_attributes_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_personal_attributes_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_personal_attributes_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="overall_personal_attributes_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_personal_attributes_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Section C: Assessment of Professional Competence (30% weightage) -->
                            <div class="mb-8">
                                <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(C) Assessment of Professional Competence (weightage to this Section would be 30%)</h4>
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse border border-gray-400 text-sm">
                                        <thead>
                                            <tr>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority<br><span class="text-xs">(Refer Para 2 of Part 5)</span></th>
                                                <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(i) Scientific Capability</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="scientific_capability_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_capability_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="scientific_capability_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_capability_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="scientific_capability_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['scientific_capability_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(ii) S&T Foresight and Vision</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="st_foresight_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['st_foresight_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="st_foresight_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['st_foresight_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="st_foresight_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['st_foresight_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iii) Decision making ability</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="decision_making_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['decision_making_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="decision_making_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['decision_making_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="decision_making_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['decision_making_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(iv) Innovation/Creativity</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="innovation_creativity_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['innovation_creativity_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="innovation_creativity_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['innovation_creativity_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="innovation_creativity_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['innovation_creativity_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(v) Technical Competence</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="technical_competence_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['technical_competence_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="technical_competence_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['technical_competence_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="technical_competence_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['technical_competence_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-400 p-2">(vi) New Initiative</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="new_initiative_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['new_initiative_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="new_initiative_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['new_initiative_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="new_initiative_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['new_initiative_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                            <tr class="bg-yellow-50">
                                                <td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Functional Competency"</td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_functional_competency_reporting" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reportingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_functional_competency_reporting'] ?? '' }}" {{ $reportingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="number" name="overall_functional_competency_reviewing" min="1" max="10" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $reviewingClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_functional_competency_reviewing'] ?? '' }}" {{ $reviewingDisabled }}></td>
                                                <td class="border border-gray-400 p-2"><input type="text" name="overall_functional_competency_initial" class="w-full text-center border-0 focus:ring-1 focus:ring-blue-200 font-semibold {{ $initialClass }}" value="{{ $form->getFormDataBySection('part_3')['overall_functional_competency_initial'] ?? '' }}" {{ $initialDisabled }}></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_3')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_3_display">
                            @php $part3Data = $form->getFormDataBySection('part_3'); @endphp
                            @if($part3Data->isNotEmpty())
                                <!-- Section A Display -->
                                <div class="mb-8">
                                    <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(A) Assessment of work output (weightage to this Section would be 40%)</h4>
                                    <div class="overflow-x-auto">
                                        <table class="w-full border-collapse border border-gray-400 text-sm">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td class="border border-gray-400 p-2">(i) Accomplishment of planned work/work allotted</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['work_planned_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['work_planned_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['work_planned_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(ii) Scientist & Technical Achievements</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_achievements_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_achievements_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_achievements_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iii) Quality of output</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['quality_output_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['quality_output_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['quality_output_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iv) Analytical ability</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['analytical_ability_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['analytical_ability_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['analytical_ability_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(v) Accomplishment of exceptional work</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['exceptional_work_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['exceptional_work_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['exceptional_work_initial'] ?? '-' }}</td></tr>
                                                <tr class="bg-yellow-50"><td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Work Output"</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_work_output_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_work_output_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_work_output_initial'] ?? '-' }}</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Section B Display -->
                                <div class="mb-8">
                                    <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(B) Assessment of personal attributes (weightage to this Section would be 30%)</h4>
                                    <div class="overflow-x-auto">
                                        <table class="w-full border-collapse border border-gray-400 text-sm">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td class="border border-gray-400 p-2">(i) Attitude to work</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['attitude_work_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['attitude_work_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['attitude_work_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(ii) Sense of Responsibility</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['sense_responsibility_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['sense_responsibility_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['sense_responsibility_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iii) Maintenance of Discipline</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['maintenance_discipline_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['maintenance_discipline_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['maintenance_discipline_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iv) Communication skills</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['communication_skills_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['communication_skills_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['communication_skills_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(v) Leadership Qualities</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['leadership_qualities_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['leadership_qualities_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['leadership_qualities_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(vi) Capacity to work in team spirit</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['team_spirit_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['team_spirit_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['team_spirit_initial'] ?? '-' }}</td></tr>
                                                <tr class="bg-yellow-50"><td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Personal Attributes"</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_personal_attributes_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_personal_attributes_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_personal_attributes_initial'] ?? '-' }}</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Section C Display -->
                                <div class="mb-8">
                                    <h4 class="text-center text-sm font-semibold text-gray-800 mb-4">(C) Assessment of Professional Competence (weightage to this Section would be 30%)</h4>
                                    <div class="overflow-x-auto">
                                        <table class="w-full border-collapse border border-gray-400 text-sm">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center"></th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-20">Reporting Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-32">Reviewing Authority</th>
                                                    <th class="border border-gray-400 bg-gray-50 p-2 text-center w-28">Initial of Reviewing Authority</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr><td class="border border-gray-400 p-2">(i) Scientific Capability</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_capability_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_capability_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['scientific_capability_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(ii) S&T Foresight and Vision</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['st_foresight_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['st_foresight_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['st_foresight_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iii) Decision making ability</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['decision_making_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['decision_making_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['decision_making_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(iv) Innovation/Creativity</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['innovation_creativity_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['innovation_creativity_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['innovation_creativity_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(v) Technical Competence</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['technical_competence_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['technical_competence_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['technical_competence_initial'] ?? '-' }}</td></tr>
                                                <tr><td class="border border-gray-400 p-2">(vi) New Initiative</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['new_initiative_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['new_initiative_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center">{{ $part3Data['new_initiative_initial'] ?? '-' }}</td></tr>
                                                <tr class="bg-yellow-50"><td class="border border-gray-400 p-2 font-semibold">Overall Grading on "Functional Competency"</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_functional_competency_reporting'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_functional_competency_reviewing'] ?? '-' }}</td><td class="border border-gray-400 p-2 text-center font-semibold">{{ $part3Data['overall_functional_competency_initial'] ?? '-' }}</td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-500">No assessment data available. Click Edit to add information.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Part 4 -->
                @if(auth()->user()->hasAparPermission('view_part_4'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-purple-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-4: Reporting Officer Assessment 
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_4'))
                                <button onclick="editSection('part_4')" class="inline-flex items-center gap-1 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    {{-- pencil icon --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-4">(Assessment by the Reporting Officer)</p>

                        <form id="part_4_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_4">

                            <div class="space-y-6">
                                <!-- 1. Relation with the public -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">1. Relation with the public (wherever applicable)</label>
                                    <p class="text-xs text-gray-600 mb-2">(Please comment on the Scientist accessibility to the public and responsiveness to their needs)</p>
                                    <textarea name="relation_with_public" rows="6" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">{{ $form->getFormDataBySection('part_4')['relation_with_public'] ?? '' }}</textarea>
                                </div>

                                <!-- 2. Training -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">2. Training</label>
                                    <p class="text-xs text-gray-600 mb-2">(Please give recommendation for training with a view to further improving the effectiveness and capabilities of the Scientist)</p>
                                    <textarea name="training_recommendation" rows="5" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">{{ $form->getFormDataBySection('part_4')['training_recommendation'] ?? '' }}</textarea>
                                </div>

                                <!-- 3. State of Health -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">3. State of Health</label>
                                    <textarea name="state_of_health" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">{{ $form->getFormDataBySection('part_4')['state_of_health'] ?? '' }}</textarea>
                                </div>

                                <!-- 4. Integrity -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">4. Integrity</label>
                                    <p class="text-xs text-gray-600 mb-2">(Please comment on the integrity of the Scientist)</p>
                                    <textarea name="integrity_assessment" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">{{ $form->getFormDataBySection('part_4')['integrity_assessment'] ?? '' }}</textarea>
                                </div>

                                <!-- 5. Pen Picture by Reporting Officer -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">5. Pen Picture by Reporting Officer (in about 100 words)</label>
                                    <p class="text-xs text-gray-600 mb-2">On the overall qualities of the Scientist including area of strengths and lesser strength extraordinary achievements, scientific & technical achievements (refer 3 of Part 2) and attitude towards weaker section.</p>
                                    <textarea name="pen_picture_reporting" rows="4" maxlength="600" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition" placeholder="Maximum 100 words...">{{ $form->getFormDataBySection('part_4')['pen_picture_reporting'] ?? '' }}</textarea>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <span id="pen_picture_word_count">0</span> words (recommended: ~100 words)
                                    </div>
                                </div>

                                <!-- 6. Overall numerical grading -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part-3 of the Report</label>
                                    <input style="width: 100%" type="number" name="overall_numerical_grading" min="1" max="10" step="0.1" class="mt-1 block rounded-lg border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition" value="{{ $form->getFormDataBySection('part_4')['overall_numerical_grading'] ?? '' }}" placeholder="1.0 - 10.0">
                                    <p class="text-xs text-gray-600 mt-1">Scale: 1.0 (lowest) to 10.0 (highest)</p>
                                </div>


                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_4')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_4_display">
                            @php $part4Data = $form->getFormDataBySection('part_4'); @endphp
                            @if($part4Data->isNotEmpty())
                                <div class="space-y-6">
                                    <!-- 1. Relation with the public -->
                                    @if(isset($part4Data['relation_with_public']) && $part4Data['relation_with_public'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">1. Relation with the public (wherever applicable)</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">(Please comment on the Scientist accessibility to the public and responsiveness to their needs)</p>
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part4Data['relation_with_public'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 2. Training -->
                                    @if(isset($part4Data['training_recommendation']) && $part4Data['training_recommendation'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">2. Training</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">(Please give recommendation for training with a view to further improving the effectiveness and capabilities of the Scientist)</p>
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part4Data['training_recommendation'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 3. State of Health -->
                                    @if(isset($part4Data['state_of_health']) && $part4Data['state_of_health'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">3. State of Health</h4>
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part4Data['state_of_health'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 4. Integrity -->
                                    @if(isset($part4Data['integrity_assessment']) && $part4Data['integrity_assessment'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">4. Integrity</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">(Please comment on the integrity of the Scientist)</p>
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part4Data['integrity_assessment'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 5. Pen Picture by Reporting Officer -->
                                    @if(isset($part4Data['pen_picture_reporting']) && $part4Data['pen_picture_reporting'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">5. Pen Picture by Reporting Officer (in about 100 words)</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">On the overall qualities of the Scientist including area of strengths and lesser strength extraordinary achievements, scientific & technical achievements and attitude towards weaker section.</p>
                                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 rounded-r-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part4Data['pen_picture_reporting'] }}</p>
                                                <p class="text-xs text-gray-600 mt-2">
                                                    <span class="font-medium">Word count:</span> {{ str_word_count($part4Data['pen_picture_reporting']) }} words
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 6. Overall numerical grading -->
                                    @if(isset($part4Data['overall_numerical_grading']) && $part4Data['overall_numerical_grading'])
                                        <div class="border-b border-purple-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part-3</h4>
                                            <div class="bg-blue-50 p-3 rounded-lg inline-block">
                                                <span class="text-2xl font-bold text-blue-800">{{ $part4Data['overall_numerical_grading'] }}</span>
                                                <span class="text-sm text-blue-600 ml-2">/ 10.0</span>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                            @else
                                <div class="text-center py-8">
                                    
                                    <p class="text-gray-500 text-lg mb-2">No Part-4 Assessment Data Available</p>
                                    <p class="text-gray-400 text-sm">Click the Edit button above to begin the reporting officer assessment as per the APAR guidelines.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Part 5 -->
                @if(auth()->user()->hasAparPermission('view_part_5'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-green-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-5: Reviewing Officer
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_5'))
                                <button onclick="editSection('part_5')" class="inline-flex items-center gap-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-4">(Reviewing Officer Only)</p>

                        <form id="part_5_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_5">

                            <div class="space-y-6">
                                <!-- 1. Remarks of the Reviewing Officer -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">1. Remarks of the Reviewing Officer</label>
                                    <p class="text-xs text-gray-600 mb-2">Length of Service under the Reviewing Officer.</p>
                                    <textarea name="reviewing_remarks" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition">{{ $form->getFormDataBySection('part_5')['reviewing_remarks'] ?? '' }}</textarea>
                                </div>

                                <!-- 2. Agreement with Reporting Officer Assessment -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">2. Do you agree with the assessment made by the reporting officer with respect to the work output and the various attributes in Part-3 & Part-4?</label>
                                    <p class="text-xs text-gray-600 mb-3">Do you agree with the assessment of reporting officer? In case you do not agree with any of the numerical assessments of attributes please record you assessment on the column provided for you in that section and initial your entries.</p>
                                    
                                    <!-- Yes/No Table -->
                                    <div class="flex justify-center mb-4">
                                        <div class="border border-gray-400 rounded-lg overflow-hidden">
                                            <table class="border-collapse">
                                                <tr>
                                                    <td class="border border-gray-400 p-4 text-center bg-gray-50 w-32">
                                                        <label class="flex items-center justify-center">
                                                            <input type="radio" name="agree_with_reporting_officer" value="yes" class="mr-2" {{ ($form->getFormDataBySection('part_5')['agree_with_reporting_officer'] ?? '') == 'yes' ? 'checked' : '' }}>
                                                            <span class="font-semibold">Yes</span>
                                                        </label>
                                                    </td>
                                                    <td class="border border-gray-400 p-4 text-center bg-gray-50 w-32">
                                                        <label class="flex items-center justify-center">
                                                            <input type="radio" name="agree_with_reporting_officer" value="no" class="mr-2" {{ ($form->getFormDataBySection('part_5')['agree_with_reporting_officer'] ?? '') == 'no' ? 'checked' : '' }}>
                                                            <span class="font-semibold">No</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- 3. Disagreement Reason -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">3. In case of disagreement please specify the reason, is there anything you wish to modify or add.</label>
                                    <textarea name="disagreement_reason" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition">{{ $form->getFormDataBySection('part_5')['disagreement_reason'] ?? '' }}</textarea>
                                </div>

                                <!-- 4. Pen Picture by Reviewing Officer -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">4. Pen Picture by Reviewing Officer (in about 100 words)</label>
                                    <p class="text-xs text-gray-600 mb-2">Please comment on the overall qualities of the Scientist including area of strengths and lesser strength scientific & technical achievements and attitude towards weaker section.</p>
                                    <textarea name="pen_picture_reviewing" rows="4" maxlength="600" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" placeholder="Maximum 100 words...">{{ $form->getFormDataBySection('part_5')['pen_picture_reviewing'] ?? '' }}</textarea>
                                    <div class="text-xs text-gray-500 mt-1">
                                        <span id="pen_picture_reviewing_word_count">0</span> words (recommended: ~100 words)
                                    </div>
                                </div>

                                <!-- 5. Overall numerical grading -->
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part-3 of the Report</label>
                                    <input type="number" name="overall_numerical_grading_reviewing" min="1" max="10" step="0.1" class="mt-1 block w-32 rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" value="{{ $form->getFormDataBySection('part_5')['overall_numerical_grading_reviewing'] ?? '' }}" placeholder="1.0 - 10.0">
                                    <p class="text-xs text-gray-600 mt-1">Scale: 1.0 (lowest) to 10.0 (highest)</p>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_5')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_5_display">
                            @php $part5Data = $form->getFormDataBySection('part_5'); @endphp
                            @if($part5Data->isNotEmpty())
                                <div class="space-y-6">
                                    <!-- 1. Remarks of the Reviewing Officer -->
                                    @if(isset($part5Data['reviewing_remarks']) && $part5Data['reviewing_remarks'])
                                        <div class="border-b border-green-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">1. Remarks of the Reviewing Officer</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">Length of Service under the Reviewing Officer.</p>
                                            <div class="bg-gray-50 p-3 rounded-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part5Data['reviewing_remarks'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 2. Agreement with Reporting Officer -->
                                    @if(isset($part5Data['agree_with_reporting_officer']) && $part5Data['agree_with_reporting_officer'])
                                        <div class="border-b border-green-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">2. Agreement with the assessment made by reporting officer</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">Do you agree with the assessment of reporting officer with respect to work output and various attributes in Part-3 & Part-4?</p>
                                            <div class="flex justify-center">
                                                <div class="border border-gray-300 rounded-lg overflow-hidden">
                                                    <table class="border-collapse">
                                                        <tr>
                                                            <td class="border border-gray-300 p-3 text-center w-24 {{ $part5Data['agree_with_reporting_officer'] == 'yes' ? 'bg-green-100 font-semibold' : 'bg-gray-50' }}">
                                                                Yes {{ $part5Data['agree_with_reporting_officer'] == 'yes' ? '✓' : '' }}
                                                            </td>
                                                            <td class="border border-gray-300 p-3 text-center w-24 {{ $part5Data['agree_with_reporting_officer'] == 'no' ? 'bg-red-100 font-semibold' : 'bg-gray-50' }}">
                                                                No {{ $part5Data['agree_with_reporting_officer'] == 'no' ? '✓' : '' }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 3. Disagreement Reason -->
                                    @if(isset($part5Data['disagreement_reason']) && $part5Data['disagreement_reason'])
                                        <div class="border-b border-green-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">3. Reason for disagreement / Modifications</h4>
                                            <div class="bg-red-50 border-l-4 border-red-400 p-3 rounded-r-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part5Data['disagreement_reason'] }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 4. Pen Picture by Reviewing Officer -->
                                    @if(isset($part5Data['pen_picture_reviewing']) && $part5Data['pen_picture_reviewing'])
                                        <div class="border-b border-green-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">4. Pen Picture by Reviewing Officer (in about 100 words)</h4>
                                            <p class="text-xs text-gray-600 mb-2 italic">Overall qualities of the Scientist including area of strengths and lesser strength scientific & technical achievements and attitude towards weaker section.</p>
                                            <div class="bg-green-50 border-l-4 border-green-400 p-3 rounded-r-lg">
                                                <p class="text-gray-900 whitespace-pre-wrap">{{ $part5Data['pen_picture_reviewing'] }}</p>
                                                <p class="text-xs text-gray-600 mt-2">
                                                    <span class="font-medium">Word count:</span> {{ str_word_count($part5Data['pen_picture_reviewing']) }} words
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- 5. Overall numerical grading -->
                                    @if(isset($part5Data['overall_numerical_grading_reviewing']) && $part5Data['overall_numerical_grading_reviewing'])
                                        <div class="border-b border-green-100 pb-4">
                                            <h4 class="font-semibold text-gray-700 mb-2">5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part-3</h4>
                                            <div class="bg-green-50 p-3 rounded-lg inline-block">
                                                <span class="text-2xl font-bold text-green-800">{{ $part5Data['overall_numerical_grading_reviewing'] }}</span>
                                                <span class="text-sm text-green-600 ml-2">/ 10.0</span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="text-center py-8">                                    
                                    <p class="text-gray-500 text-lg mb-2">No Part-5 Assessment Data Available</p>
                                    <p class="text-gray-400 text-sm">Click the Edit button above to begin the reviewing officer assessment as per the APAR guidelines.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Part B: Assessment by Reporting Authority -->
                @if(auth()->user()->hasAparPermission('view_part_b'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <div class="text-center w-full">
                                <h3 class="text-xl font-bold text-orange-700 underline">Part-B (Name of Employee: {{ $form->user->name ?? 'N/A' }})</h3>
                                <h4 class="text-lg font-bold text-orange-700 underline mt-2">ASSESSMENT BY THE REPORTING AUTHORITY</h4>
                            </div>
                            @if(auth()->user()->hasAparPermission('edit_part_b'))
                                <button onclick="editSection('part_b')" class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm absolute top-4 right-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Edit
                                </button>
                            @endif
                        </div>

                        <form id="part_b_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_b">

                            <div class="space-y-6">
                                <!-- Question 1 -->
                                <div>
                                    <h6 class="font-bold text-gray-900 mb-3">1. Do you agree with the evaluation parameters suggested by the Officer?</h6>
                                    <textarea name="agree_evaluation" rows="3" placeholder="Enter your response here..." class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['agree_evaluation'] ?? '' }}</textarea>
                                </div>

                                <!-- Question 2 -->
                                <div>
                                    <h6 class="font-bold text-gray-900 mb-3">2. Short summary of the innovative content of the work done</h6>
                                    <textarea name="innovative_summary" rows="3" placeholder="Enter innovative work summary here..." class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['innovative_summary'] ?? '' }}</textarea>
                                </div>

                                <!-- Question 3 -->
                                <div>
                                    <h6 class="font-bold text-gray-900 mb-3">3. Please also indicate the exceptional contribution of the Officer for which he can be considered under exceptionally meritorious category.</h6>
                                    <textarea name="exceptional_contribution" rows="3" placeholder="Enter exceptional contributions here..." class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['exceptional_contribution'] ?? '' }}</textarea>
                                </div>

                                <!-- Question 4: Assessment Table -->
                                <div>
                                    <h6 class="font-bold text-gray-900 mb-3">4. Overall assessment of the scientific work</h6>
                                    
                                    <div class="overflow-x-auto mt-3">
                                        <table class="min-w-full border border-gray-300">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th class="border border-gray-300 px-3 py-2 text-center text-sm font-bold">SL No.</th>
                                                    <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Brief Description of the parameter on which the officer has to be evaluated</th>
                                                    <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Marks given By the reporting authority</th>
                                                    <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Maximum marks of each sub parameter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for($i = 1; $i <= 5; $i++)
                                                <tr>
                                                    <td class="border border-gray-300 px-3 py-4 text-center font-bold">{{ $i }}.</td>
                                                    <td class="border border-gray-300 px-3 py-4">
                                                        <div class="space-y-1">
                                                            <div><strong>Parameter:</strong> ___________________</div>
                                                            <div class="mt-2"><strong>Sub Parameter</strong></div>
                                                            <div>a.</div>
                                                            <div>b.</div>
                                                            <div>c.</div>
                                                            <div>d.</div>
                                                            <div>e.</div>
                                                        </div>
                                                    </td>
                                                    <td class="border border-gray-300 px-3 py-4">
                                                        <input type="number" name="param{{ $i }}_marks" min="0" max="100" placeholder="Marks" class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-200" value="{{ $form->getFormDataBySection('part_b')['param' . $i . '_marks'] ?? '' }}">
                                                    </td>
                                                    <td class="border border-gray-300 px-3 py-4">
                                                        <input type="number" name="param{{ $i }}_max_marks" min="0" max="100" placeholder="Max Marks" class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-200" value="{{ $form->getFormDataBySection('part_b')['param' . $i . '_max_marks'] ?? '' }}">
                                                    </td>
                                                </tr>
                                                @endfor
                                                <tr class="bg-yellow-50">
                                                    <td class="border border-gray-300 px-3 py-4"></td>
                                                    <td class="border border-gray-300 px-3 py-4 font-bold">Total Marks Obtained</td>
                                                    <td class="border border-gray-300 px-3 py-4">
                                                        <input type="number" name="total_marks_obtained" min="0" max="500" placeholder="Total" class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-200" value="{{ $form->getFormDataBySection('part_b')['total_marks_obtained'] ?? '' }}">
                                                    </td>
                                                    <td class="border border-gray-300 px-3 py-4">
                                                        <input type="number" name="total_max_marks" min="0" max="500" placeholder="Total Max" class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:border-orange-500 focus:ring-1 focus:ring-orange-200" value="{{ $form->getFormDataBySection('part_b')['total_max_marks'] ?? '' }}">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_b')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_b_display">
                            @php $partBData = $form->getFormDataBySection('part_b'); @endphp
                            @if($partBData->isNotEmpty())
                                <div class="space-y-6">
                                    <!-- Question 1 Display -->
                                    @if(isset($partBData['agree_evaluation']) && $partBData['agree_evaluation'])
                                        <div>
                                            <h6 class="font-bold text-gray-900 mb-2">1. Do you agree with the evaluation parameters suggested by the Officer?</h6>
                                            <div class="bg-gray-50 p-3 rounded border-l-4 border-orange-400">{{ $partBData['agree_evaluation'] }}</div>
                                        </div>
                                    @endif

                                    <!-- Question 2 Display -->
                                    @if(isset($partBData['innovative_summary']) && $partBData['innovative_summary'])
                                        <div>
                                            <h6 class="font-bold text-gray-900 mb-2">2. Short summary of the innovative content of the work done</h6>
                                            <div class="bg-gray-50 p-3 rounded border-l-4 border-orange-400">{{ $partBData['innovative_summary'] }}</div>
                                        </div>
                                    @endif

                                    <!-- Question 3 Display -->
                                    @if(isset($partBData['exceptional_contribution']) && $partBData['exceptional_contribution'])
                                        <div>
                                            <h6 class="font-bold text-gray-900 mb-2">3. Please also indicate the exceptional contribution of the Officer for which he can be considered under exceptionally meritorious category.</h6>
                                            <div class="bg-gray-50 p-3 rounded border-l-4 border-orange-400">{{ $partBData['exceptional_contribution'] }}</div>
                                        </div>
                                    @endif

                                    <!-- Question 4 Display -->
                                    @if(isset($partBData['param1_marks']) || isset($partBData['param2_marks']) || isset($partBData['param3_marks']) || isset($partBData['param4_marks']) || isset($partBData['param5_marks']))
                                        <div>
                                            <h6 class="font-bold text-gray-900 mb-3">4. Overall assessment of the scientific work</h6>
                                            
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full border border-gray-300">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="border border-gray-300 px-3 py-2 text-center text-sm font-bold">SL No.</th>
                                                            <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Brief Description of the parameter</th>
                                                            <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Marks Given</th>
                                                            <th class="border border-gray-300 px-3 py-2 text-sm font-bold">Maximum Marks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @for($i = 1; $i <= 5; $i++)
                                                        @if(isset($partBData['param' . $i . '_marks']) && $partBData['param' . $i . '_marks'])
                                                        <tr>
                                                            <td class="border border-gray-300 px-3 py-4 text-center font-bold">{{ $i }}.</td>
                                                            <td class="border border-gray-300 px-3 py-4">
                                                                <div class="space-y-1">
                                                                    <div><strong>Parameter:</strong> ___________________</div>
                                                                    <div class="mt-2"><strong>Sub Parameter</strong></div>
                                                                    <div>a.</div>
                                                                    <div>b.</div>
                                                                    <div>c.</div>
                                                                    <div>d.</div>
                                                                    <div>e.</div>
                                                                </div>
                                                            </td>
                                                            <td class="border border-gray-300 px-3 py-4 text-center">{{ $partBData['param' . $i . '_marks'] }}</td>
                                                            <td class="border border-gray-300 px-3 py-4 text-center">{{ $partBData['param' . $i . '_max_marks'] ?? '' }}</td>
                                                        </tr>
                                                        @endif
                                                        @endfor
                                                        @if(isset($partBData['total_marks_obtained']) && $partBData['total_marks_obtained'])
                                                        <tr class="bg-yellow-50">
                                                            <td class="border border-gray-300 px-3 py-4"></td>
                                                            <td class="border border-gray-300 px-3 py-4 font-bold">Total Marks Obtained</td>
                                                            <td class="border border-gray-300 px-3 py-4 text-center font-bold">{{ $partBData['total_marks_obtained'] }}</td>
                                                            <td class="border border-gray-300 px-3 py-4 text-center font-bold">{{ $partBData['total_max_marks'] ?? '' }}</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Signature Section -->
                                <div class="mt-8 text-right">
                                    <div class="inline-block">
                                        <div class="mb-3">
                                            <strong>Signature of the Reporting officer</strong>
                                        </div>
                                        <div class="border-b border-gray-400 w-64 h-12 mb-4"></div>
                                        <div class="text-left space-y-2">
                                            <div><strong>Name:</strong> ________________________</div>
                                            <div><strong>Designation:</strong> ________________________</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-500 text-center py-8">No reporting officer data available. Click Edit to add information.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Print Form Button -->
            <div class="text-center mt-10 mb-6">
                <a href="{{ route('forms.print', $form) }}" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2z"/></svg>
                    Print Form
                </a>
            </div>

            <!-- Back to Dashboard -->
            <div class="text-center mt-4">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-gray-500 to-gray-700 hover:from-gray-600 hover:to-gray-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <script>
        function editSection(section) {
            const displayElement = document.getElementById(section + '_display');
            const formElement = document.getElementById(section + '_form');
            const editButton = document.querySelector(`button[onclick="editSection('${section}')"]`);
            
            // Toggle between display and form modes
            if (formElement.style.display === 'none' || formElement.style.display === '') {
                // Switch to edit mode
                displayElement.style.display = 'none';
                formElement.style.display = 'block';
                
                // Update button text and style
                editButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Cancel
                `;
                editButton.onclick = () => cancelEdit(section);
                
                // Initialize word count for pen picture if Part 4 or Part 5
                if (section === 'part_4') {
                    initializePenPictureWordCount();
                } else if (section === 'part_5') {
                    initializePenPictureReviewingWordCount();
                }
            }
        }

        function cancelEdit(section) {
            const displayElement = document.getElementById(section + '_display');
            const formElement = document.getElementById(section + '_form');
            const editButton = document.querySelector(`button[onclick*="${section}"]`);
            
            // Switch back to display mode
            formElement.style.display = 'none';
            displayElement.style.display = 'block';
            
            // Reset button text and style
            editButton.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            `;
            editButton.onclick = () => editSection(section);
        }

        function initializePenPictureWordCount() {
            const penPictureTextarea = document.querySelector('textarea[name="pen_picture_reporting"]');
            const wordCountSpan = document.getElementById('pen_picture_word_count');
            
            if (penPictureTextarea && wordCountSpan) {
                // Function to count words
                function countWords(text) {
                    return text.trim() === '' ? 0 : text.trim().split(/\s+/).length;
                }
                
                // Update word count
                function updateWordCount() {
                    const wordCount = countWords(penPictureTextarea.value);
                    wordCountSpan.textContent = wordCount;
                    
                    // Change color based on word count
                    if (wordCount > 120) {
                        wordCountSpan.className = 'text-red-600 font-semibold';
                    } else if (wordCount > 100) {
                        wordCountSpan.className = 'text-orange-600 font-semibold';
                    } else if (wordCount >= 80) {
                        wordCountSpan.className = 'text-green-600 font-semibold';
                    } else {
                        wordCountSpan.className = 'text-blue-600';
                    }
                }
                
                // Initial count
                updateWordCount();
                
                // Add event listener for real-time counting
                penPictureTextarea.addEventListener('input', updateWordCount);
                penPictureTextarea.addEventListener('paste', function() {
                    setTimeout(updateWordCount, 10);
                });
            }
        }

        function initializePenPictureReviewingWordCount() {
            const penPictureTextarea = document.querySelector('textarea[name="pen_picture_reviewing"]');
            const wordCountSpan = document.getElementById('pen_picture_reviewing_word_count');
            
            if (penPictureTextarea && wordCountSpan) {
                // Function to count words
                function countWords(text) {
                    return text.trim() === '' ? 0 : text.trim().split(/\s+/).length;
                }
                
                // Update word count
                function updateWordCount() {
                    const wordCount = countWords(penPictureTextarea.value);
                    wordCountSpan.textContent = wordCount;
                    
                    // Change color based on word count
                    if (wordCount > 120) {
                        wordCountSpan.className = 'text-red-600 font-semibold';
                    } else if (wordCount > 100) {
                        wordCountSpan.className = 'text-orange-600 font-semibold';
                    } else if (wordCount >= 80) {
                        wordCountSpan.className = 'text-green-600 font-semibold';
                    } else {
                        wordCountSpan.className = 'text-blue-600';
                    }
                }
                
                // Initial count
                updateWordCount();
                
                // Add event listener for real-time counting
                penPictureTextarea.addEventListener('input', updateWordCount);
                penPictureTextarea.addEventListener('paste', function() {
                    setTimeout(updateWordCount, 10);
                });
            }
        }

    </script>
</x-app-layout>