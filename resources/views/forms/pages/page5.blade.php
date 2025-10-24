{{-- page 5 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">

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
                            <td style="text-align: center;">{{ $formData['part_3']['work_planned_reporting'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['work_planned_reviewing'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['work_planned_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>(ii) Scientist & Technical Achievements</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['scientific_achievements_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['scientific_achievements_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['scientific_achievements_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(iii) Quality of output</td>
                            <td style="text-align: center;">{{ $formData['part_3']['quality_output_reporting'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['quality_output_reviewing'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['quality_output_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>(iv) Analytical ability</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['analytical_ability_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['analytical_ability_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['analytical_ability_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(v) Accomplishment of exceptional work</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['exceptional_work_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['exceptional_work_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $formData['part_3']['exceptional_work_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr style="background-color: #fff2cc;">
                            <td><strong>Overall Grading on "Work Output"</strong></td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_work_output_reporting'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_work_output_reviewing'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_work_output_initial'] ?? '' }}</strong>
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
                            <td style="text-align: center;">{{ $formData['part_3']['attitude_work_reporting'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['attitude_work_reviewing'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['attitude_work_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>(ii) Sense of Responsibility</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['sense_responsibility_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['sense_responsibility_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['sense_responsibility_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(iii) Maintenance of Discipline</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['maintenance_discipline_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['maintenance_discipline_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['maintenance_discipline_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(iv) Communication skills</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['communication_skills_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['communication_skills_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['communication_skills_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(v) Leadership Qualities</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['leadership_qualities_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['leadership_qualities_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['leadership_qualities_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(vi) Capacity to work in team spirit</td>
                            <td style="text-align: center;">{{ $formData['part_3']['team_spirit_reporting'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['team_spirit_reviewing'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['team_spirit_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr style="background-color: #fff2cc;">
                            <td><strong>Overall Grading on "Personal Attributes"</strong></td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_personal_attributes_reporting'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_personal_attributes_reviewing'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_personal_attributes_initial'] ?? '' }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Section C: Assessment of Functional Competency -->
                <div class="text-center"><strong>(C) Assessment of functional competency (weightage to this Section
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
                                {{ $formData['part_3']['scientific_capability_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['scientific_capability_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['scientific_capability_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(ii) S&T Foresight and Vision</td>
                            <td style="text-align: center;">{{ $formData['part_3']['st_foresight_reporting'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['st_foresight_reviewing'] ?? '' }}
                            </td>
                            <td style="text-align: center;">{{ $formData['part_3']['st_foresight_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>(iii) Decision making ability</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['decision_making_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['decision_making_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $formData['part_3']['decision_making_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td>(iv) Innovation/Creativity</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['innovation_creativity_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['innovation_creativity_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['innovation_creativity_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(v) Technical Competence</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['technical_competence_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['technical_competence_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['technical_competence_initial'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>(vi) New Initiative</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['new_initiative_reporting'] ?? '' }}</td>
                            <td style="text-align: center;">
                                {{ $formData['part_3']['new_initiative_reviewing'] ?? '' }}</td>
                            <td style="text-align: center;">{{ $formData['part_3']['new_initiative_initial'] ?? '' }}
                            </td>
                        </tr>
                        <tr style="background-color: #fff2cc;">
                            <td><strong>Overall Grading on "Functional Competency"</strong></td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_functional_competency_reporting'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_functional_competency_reviewing'] ?? '' }}</strong>
                            </td>
                            <td style="text-align: center;">
                                <strong>{{ $formData['part_3']['overall_functional_competency_initial'] ?? '' }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>            {{-- end page 5 --}}