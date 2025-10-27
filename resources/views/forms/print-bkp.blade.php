<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APAR Form - {{ $form->employee_name }}</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            line-height: 1.15;
            margin: 0;
            padding: 20px;
            background: white;
        }
        
        .print-container {
            max-width: 210mm;
            margin: 0 auto;
            background: white;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .header h1 {
            font-size: 13pt;
            font-weight: normal;
            margin: 5px 0;
        }
        
        .part-title {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin: 20px 0 10px 0;
        }
        
        .part-subtitle {
            text-align: center;
            font-size: 13pt;
            margin: 5px 0;
        }
        
        .section-list {
            margin: 20px 0;
        }
        
        .section-list ol {
            padding-left: 20px;
        }
        
        .section-list li {
            margin: 10px 0;
            font-size: 13pt;
        }
        
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .form-table td, .form-table th {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
        }
        
        .form-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        
        .signature-section {
            margin-top: 30px;
            text-align: right;
        }
        
        .page-break {
            page-break-before: always;
        }

        .page-number {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
            font-size: 14px;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 3px;
            line-height: 1.3;
        }
        
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
            .page-break { page-break-before: always; }
        }
        
        .year-field {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        
        .evaluation-table td, .evaluation-table th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        
        .evaluation-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .large-text-area {
            min-height: 200px;
            padding: 10px;
        }
        
        .medium-text-area {
            min-height: 100px;
            padding: 10px;
        }
        
        .small-text-area {
            min-height: 50px;
            padding: 5px;
        }
        
        .assessment-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        
        .assessment-table td, .assessment-table th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        
        .assessment-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .assessment-table .text-center {
            text-align: center;
        }
        .roman-list li{
            list-style-type: lower-roman;
            padding-left: 5px;
        }
        .page-number{
            display: none;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <!-- Print Button (hidden in print) -->
        <div class="no-print" style="text-align: center; margin-bottom: 20px;">
            <button onclick="window.print()" style="background: #4f46e5; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                🖨️ Print Form
            </button>
            <button onclick="window.close()" style="background: #6b7280; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-left: 10px;">
                ✕ Close
            </button>
        </div>

        <!-- Year Field -->
        <div class="year-field">
            <strong>YEAR: {{ $form->report_year }}</strong>
        </div>

        <!-- Header -->
        <div class="header">
            <h1>GOVERNMENT OF INDIA</h1>
            <h1>DEPARTMENT OF MINISTRY OF EARTH SCIENCES</h1>
            <h1>REVISED ANNUAL PERFORMANCE AND APPRAISAL REPORT</h1>
            <h1>FORMAT FOR SCIENTISTS WORKING IN INSTITUTE AS WELL AS THE MINISTRIES/DEPARTMENTS</h1>
            <h1>INDIAN INSTITUTE OF TROPICAL METEOROLOGY, PUNE</h1>
        </div>

        <!-- Page 2: PART-1 -->
        <div class="page-number">-2-</div>
        <div class="part-title">PART-1</div>
        <div class="part-subtitle">(The information should be furnished by the Administration/Custodian)</div>
        <div class="part-subtitle">(Identification Information)</div>

        <div class="section-list">
            <ol>
                <li>Name of the Employee: <strong>{{ $form->employee_name }}</strong></li>
                <li>Designation: <strong>{{ $form->designation }}</strong></li>
                <li>Employee ID: <strong>{{ $form->employee_id ?: 'N/A' }}</strong></li>
                <li>Date of Birth: <strong>{{ $form->date_of_birth ? $form->date_of_birth->format('d/m/Y') : 'N/A' }}</strong></li>
                <li>Section or Group: <strong>{{ $form->section_or_group ?: 'N/A' }}</strong></li>
                <li>Area of Specialization: <strong>{{ $form->area_of_specialization ?: 'N/A' }}</strong></li>
                <li>Date of Joining to the Post: <strong>{{ $form->date_of_joining ? $form->date_of_joining->format('d/m/Y') : 'N/A' }}</strong></li>
                <li>E-mail ID: <strong>{{ $form->email ?: 'N/A' }}</strong></li>
                <li>Mobile No.: <strong>{{ $form->mobile_no ?: 'N/A' }}</strong></li>
                <li>Year Of the Report: <strong>{{ $form->report_year }}</strong></li>
                @if($form->department)
                <li>Department: <strong>{{ $form->department }}</strong></li>
                @endif
            </ol>
        </div>

        <!-- Educational Attainments Table -->
        <div>
            <strong>11. Educational Attainments:</strong>
            <table class="form-table">
                <thead>
                    <tr>
                        <th>Qualification</th>
                        <th>Year</th>
                        <th>University / Institute</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formData['page1_educations'] ?? [] as $education)
                    <tr>
                        <td>{{ $education->qualification }}</td>
                        <td>{{ $education->year }}</td>
                        <td>{{ $education->university }}</td>
                        <td>{{ $education->remark }}</td>
                    </tr>
                    @empty
                    @for($i = 1; $i <= 7; $i++)
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    @endfor
                    @endforelse
                    @if(isset($formData['page1_educations']) && $formData['page1_educations']->count() > 0 && $formData['page1_educations']->count() < 7)
                        @for($i = $formData['page1_educations']->count() + 1; $i <= 7; $i++)
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        @endfor
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Employment Details -->
        <div>
            <strong>Employment Details (PDF positions held may be included here)</strong>
            <table class="form-table">
                <thead>
                    <tr>
                        <th>Grade / Post</th>
                        <th>Lab/ Institute</th>
                        <th>Duration (From – To)</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formData['page2_employment_details'] ?? [] as $employment)
                    <tr>
                        <td>{{ $employment->grade_post }}</td>
                        <td>{{ $employment->lab_institute }}</td>
                        <td>{{ $employment->duration }}</td>
                        <td>{{ $employment->remark }}</td>
                    </tr>
                    @empty
                    @for($i = 1; $i <= 3; $i++)
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    @endfor
                    @endforelse
                    @if(isset($formData['page2_employment_details']) && $formData['page2_employment_details']->count() > 0 && $formData['page2_employment_details']->count() < 3)
                        @for($i = $formData['page2_employment_details']->count() + 1; $i <= 3; $i++)
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        @endfor
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Qualifications Acquired During Year -->
        <div>
            <strong>12. Any qualification Acquired during the year of Report:</strong>
            <table class="form-table">
                <thead>
                    <tr>
                        <th>Qualification</th>
                        <th>Year</th>
                        <th>University/Institute</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formData['page2_qualifications'] ?? [] as $qualification)
                    <tr>
                        <td>{{ $qualification->qualification }}</td>
                        <td>{{ $qualification->year }}</td>
                        <td>{{ $qualification->university_institute }}</td>
                        <td>{{ $qualification->remark }}</td>
                    </tr>
                    @empty
                    @for($i = 1; $i <= 3; $i++)
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    @endfor
                    @endforelse
                    @if(isset($formData['page2_qualifications']) && $formData['page2_qualifications']->count() > 0 && $formData['page2_qualifications']->count() < 3)
                        @for($i = $formData['page2_qualifications']->count() + 1; $i <= 3; $i++)
                        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                        @endfor
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Training -->
        <div>
            <strong>13. Any training undergone during the year of Report:</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 180px; padding: 10px;">
                            @forelse($formData['page2_trainings'] ?? [] as $training)
                                <div style="margin-bottom: 10px;">
                                    {{ $training->training_details }}
                                </div>
                            @empty
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endforelse
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Leave Details -->
        <div>
            <strong>14. Any leave availed during the year of Report:</strong>
            <table class="form-table">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Nature of Leave</th>
                        <th>Period</th>
                        <th>No. Of Days</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formData['page2_leave_details'] ?? [] as $index => $leave)
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td>{{ $leave->nature_of_leave }}</td>
                        <td>{{ $leave->period }}</td>
                        <td>{{ $leave->no_of_days }}</td>
                    </tr>
                    @empty
                    <tr><td>1.</td><td>Maternity Leave</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>2.</td><td>EL</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>3.</td><td>Study Leave</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>4.</td><td>CCL</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 3: Part-2 -->
        <div class="page-number">-3-</div>
        <div class="part-title">Part-2</div>
        <div class="part-subtitle">To be filled in by the Scientist reported upon</div>
        <div class="part-subtitle">(Please read carefully the instructions before filling the entries)</div>

        <div>
            <strong>1. Brief description of duties.</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 360px; padding: 10px;">
                            {{ $formData['page3_duties']->duties_description ?? '' }}
                            @if(!isset($formData['page3_duties']) || empty($formData['page3_duties']->duties_description))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>2. Please specify the programs/projects assigned to you and your achievements there to in 100 words.</strong>
            <table class="form-table">
                <thead>
                    <tr>
                        <th style="width: 40%;">Brief description about the Program/Project/Field study.</th>
                        <th style="width: 60%;">Your Achievement there to in 100 words.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($formData['page3_projects'] ?? [] as $project)
                    <tr>
                        <td style="min-height: 180px; padding: 10px; vertical-align: top;">{{ $project->project_description }}</td>
                        <td style="min-height: 180px; padding: 10px; vertical-align: top;">{{ $project->achievement_description }}</td>
                    </tr>
                    @empty
                    <tr><td style="min-height: 180px; padding: 10px;">&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td><td style="min-height: 180px; padding: 10px;">&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
        <div class="page-number">-4-</div>
        <div>
            <strong>3. Please state briefly about major publications/reports/Technology transferred/patents filed/projects managed/social outreach activities/manpower trained not exceeding in 100 word.</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 150px; padding: 10px;">
                            {{ $formData['page4_data']->publications_reports ?? '' }}
                            @if(!isset($formData['page4_data']) || empty($formData['page4_data']->publications_reports))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>4. Specific contribution made to different mission of the Government like Atma Nirbhar Bharat, Make in India, Swachh Bharat etc., in bullets (50 words.)</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 90px; padding: 10px;">
                            {{ $formData['page4_data']->government_missions ?? '' }}
                            @if(!isset($formData['page4_data']) || empty($formData['page4_data']->government_missions))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>5. Please brief about the work done/utilization of GeM portal for procurement of goods and services.</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 90px; padding: 10px;">
                            {{ $formData['page4_data']->gem_portal_work ?? '' }}
                            @if(!isset($formData['page4_data']) || empty($formData['page4_data']->gem_portal_work))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>6. Please state whether annual return on immovable property for the preceding calendar year was filed within the prescribed date i.e 31st January of the year following the calendar year. If not the date of filling the return should be given.</strong>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 90px; padding: 10px;">
                            {{ $formData['page4_data']->property_return_filing ?? '' }}
                            @if(!isset($formData['page4_data']) || empty($formData['page4_data']->property_return_filing))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            
            <p>Date: ________________</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of the Scientist Reported Upon</strong></p>
                
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

    

        


        <!-- Page 5: PART-3 -->
        <div class="page-number">-5-</div>
        <div class="part-title">PART-3 (Name of the Employee:____{{ $form->employee_name }}____)</div>
        <div class="part-subtitle" style="text-align: left; font-weight: bold;">Numerical grading is to be awarded by reporting and reviewing authority which should be on a scale of 1-10 where 1 refers to the lowest grade and 10 to the highest.</div>
        <div class="part-subtitle">(Please read carefully the guidelines before filling entries)</div>
        
       

        <!-- Section A: Assessment of Work Output -->
        <div class="text-center"><strong>(A) Assessment of work output (weightage to this Section would be 40%)</strong></div>
        
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
                    <td style="text-align: center;">{{ $formData['page5_data']->work_planned_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->work_planned_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->work_planned_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(ii) Scientist & Technical Achievements</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_achievements_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_achievements_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_achievements_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iii) Quality of output</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->quality_output_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->quality_output_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->quality_output_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iv) Analytical ability</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->analytical_ability_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->analytical_ability_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->analytical_ability_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(v) Accomplishment of exceptional work</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->exceptional_work_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->exceptional_work_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->exceptional_work_initial ?? '' }}</td>
                </tr>
                <tr style="background-color: #fff2cc;">
                    <td><strong>Overall Grading on "Work Output"</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_work_output_reporting ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_work_output_reviewing ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_work_output_initial ?? '' }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Section B: Assessment of Personal Attributes -->
        <div class="text-center"><strong>(B) Assessment of personal attributes (weightage to this Section would be 30%)</strong></div>
        
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
                    <td style="text-align: center;">{{ $formData['page5_data']->attitude_work_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->attitude_work_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->attitude_work_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(ii) Sense of Responsibility</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->sense_responsibility_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->sense_responsibility_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->sense_responsibility_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iii) Maintenance of Discipline</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->maintenance_discipline_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->maintenance_discipline_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->maintenance_discipline_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iv) Communication skills</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->communication_skills_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->communication_skills_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->communication_skills_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(v) Leadership Qualities</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->leadership_qualities_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->leadership_qualities_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->leadership_qualities_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(vi) Capacity to work in team spirit</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->team_spirit_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->team_spirit_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->team_spirit_initial ?? '' }}</td>
                </tr>
                <tr style="background-color: #fff2cc;">
                    <td><strong>Overall Grading on "Personal Attributes"</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_personal_attributes_reporting ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_personal_attributes_reviewing ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_personal_attributes_initial ?? '' }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Section C: Assessment of Functional Competency -->
        <div class="text-center"><strong>(C) Assessment of functional competency (weightage to this Section would be 30%)</strong></div>
        
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
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_capability_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_capability_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->scientific_capability_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(ii) S&T Foresight and Vision</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->st_foresight_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->st_foresight_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->st_foresight_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iii) Decision making ability</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->decision_making_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->decision_making_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->decision_making_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(iv) Innovation/Creativity</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->innovation_creativity_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->innovation_creativity_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->innovation_creativity_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(v) Technical Competence</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->technical_competence_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->technical_competence_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->technical_competence_initial ?? '' }}</td>
                </tr>
                <tr>
                    <td>(vi) New Initiative</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->new_initiative_reporting ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->new_initiative_reviewing ?? '' }}</td>
                    <td style="text-align: center;">{{ $formData['page5_data']->new_initiative_initial ?? '' }}</td>
                </tr>
                <tr style="background-color: #fff2cc;">
                    <td><strong>Overall Grading on "Functional Competency"</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_functional_competency_reporting ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_functional_competency_reviewing ?? '' }}</strong></td>
                    <td style="text-align: center;"><strong>{{ $formData['page5_data']->overall_functional_competency_initial ?? '' }}</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 6: PART-4 -->
        <div class="page-number">-6-</div>
        <div class="part-title text-center">GENERAL</div>
        <div class="part-title text-center"><strong>PART-4</strong></div>

        <div style="margin: 20px 0;">
            <strong>1. Relation with the public (wherever applicable)</strong>
            <p><em>(Please comment on the Scientist accessibility to the public and responsiveness to their needs)</em></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 200px; padding: 10px; border: 1px solid black;">{{ $formData['page6_data']->relation_with_public ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin: 20px 0;">
            <strong>2. Training</strong>
            <p><em>(Please give recommendation for training with a view to further improving the effectiveness and capabilities of the Scientist)</em></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 150px; padding: 10px; border: 1px solid black;">{{ $formData['page6_data']->training_recommendation ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin: 20px 0;">
            <strong>3. State of Health</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 100px; padding: 10px; border: 1px solid black;">{{ $formData['page6_data']->state_of_health ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

       

        <!-- Page 7: Continuing PART-4 -->
        <div class="page-number">-7-</div>

        <div style="margin: 20px 0;">
            <strong>4. Integrity</strong>
            <p><em>(Please comment on the integrity of the Scientist)</em></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 100px; padding: 10px; border: 1px solid black;">{{ $formData['page7_data']->integrity_assessment ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin: 30px 0;">
            <strong>5. Pen Picture by Reporting Officer (in about 100words) on the overall qualities of the Scientist including area of strengths and lesser strength extraordinary achievements, scientific & technical achievements (refer 3 of Part 2) and attitude towards weaker section.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 200px; padding: 10px; border: 1px solid black;">{{ $formData['page7_data']->pen_picture_reporting ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin: 30px 0;">
            <strong>6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part -3 of the Report.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px; border: 1px solid black;">{{ $formData['page7_data']->overall_numerical_grading ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div class="page-break"></div>

        <div style="margin-top: 60px;">
            <p>Place: _______________________</p>
            <p>Date: _______________________</p>
            <br><br>
            <div class="signature-section">
                <p><strong>Signature of Reporting Officer</strong></p>
                <br><br>
                <p><strong>Name (in Block Letters): _________________________________</strong></p>
                <p><strong>Designation: _________________________________________</strong></p>
                <p><strong>During the period of report: ____________________________</strong></p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 8: PART-5 -->
        <div class="page-number">-8-</div>
        <div class="part-title">PART-5</div>

        <div>
            <strong>1. Remarks of the Reviewing Officer</strong>
            <p>Length of Service under the Reviewing Officer.</p>
            <table class="form-table">
                <tbody>
                    <tr><td class="medium-text-area">{{ $formData['page8_data']->reviewing_remarks ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>2. Do you agree with the assessment made by the reporting officer with respect to the work output and the various attributes in Part-3 & Part-4? Do you agree with the assessment of reporting officer? In case you do not agree with any of the numerical assessments of attributes please record you assessment on the column provided for you in that section and initial your entries.</strong>
            
            <table class="form-table" style="width: 300px; margin: 10px auto;">
                <tr>
                    <td class="text-center">Yes</td>
                    <td class="text-center">No</td>
                </tr>
                <tr>
                    <td style="height: 30px; text-align: center;">{{ ($formData['page8_data']->agree_with_reporting_officer ?? '') == 'yes' ? '✓' : '' }}</td>
                    <td style="height: 30px; text-align: center;">{{ ($formData['page8_data']->agree_with_reporting_officer ?? '') == 'no' ? '✓' : '' }}</td>
                </tr>
            </table>
        </div>

        <div>
            <strong>3. In case of disagreement please specify the reason, is there anything you wish to modify or add.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td class="medium-text-area">{{ $formData['page8_data']->disagreement_reason ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>4. Pen Picture by Reviewing Officer, please comment (in about 100words) on the overall qualities of the Scientist including area of strengths and lesser strength scientific & technical achievements and attitude towards weaker section.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td class="large-text-area">{{ $formData['page8_data']->pen_picture_reviewing ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part -3 the Report.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td class="large-text-area">{{ $formData['page8_data']->overall_numerical_grading_reviewing ?? '' }}</td></tr>
                </tbody>
            </table>
            
        </div>

        <div style="margin-top: 40px;">
            <p>Place:</p>
            <p>Date:</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of Reviewing Officer</strong></p>
                <br>
                <p style="margin-left: 150px;">Officer Name of Block Letter:_______________________</p>
                <p style="margin-left: 150px;">Designation:_______________________</p>
                <p style="margin-left: 150px;">The period of report:_______________________</p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 9: ANNUAL WORK REPORT (Self-Assessment) -->
        <div class="page-number">-9-</div>
        <div class="part-title">ANNUAL WORK REPORT</div>
        <div class="part-subtitle"><u>Self-Assessment by the officer reported upon</u></div>

        <div class="section-list">
            <ol>
                <li><strong>Name: {{ $form->employee_name }}</strong></li>
                <li><strong>Designation: {{ $form->designation }}</strong></li>
                <li><strong>Area of S&T function: {{ $form->area_of_specialization ?: 'N/A' }}</strong></li>
            </ol>
        </div>

        <div class="part-title"><u>Part A</u></div>

        <div>
            <strong>4. One page summary of the scientific and technical elements in the work done during the financial Year:</strong>
            
            <p><strong>4. a. New Initiative taken:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 120px; padding: 10px;">
                            {{ $formData['page9_data']->new_initiatives ?? '' }}
                            @if(!isset($formData['page9_data']) || empty($formData['page9_data']->new_initiatives))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><strong>4. b. S&T content of the work done:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 120px; padding: 10px;">
                            {{ $formData['page9_data']->st_content_work ?? '' }}
                            @if(!isset($formData['page9_data']) || empty($formData['page9_data']->st_content_work))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <p><strong>4. c. Innovation content of the work done:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="min-height: 120px; padding: 10px;">
                            {{ $formData['page9_data']->innovation_content_work ?? '' }}
                            @if(!isset($formData['page9_data']) || empty($formData['page9_data']->innovation_content_work))
                                &nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 10: Parameter Evaluation Table -->
        <div class="page-number">-10-</div>

        <p><strong>5. Brief Description of evaluation parameters related to the officer's work function as given in the Appendix:</strong></p>
        <p>Assessment of work output</p>
        <div style="text-align: center; margin: 20px 0;">
            <strong>(Out of the five broad parameters given at Appendix, the officer may choose at least twenty sub parameters of 5 marks each for 100 marks in total relevant to the work function of the officer).</strong>
        </div>

        <table class="evaluation-table">
            <thead>
                <tr>
                    <th style="width: 8%; text-align: center;">SL<br>No.</th>
                    <th style="width: 52%; text-align: center;">Brief Description of the parameter on which the officer has to be evaluated</th>
                    <th style="width: 40%; text-align: center;">Achievement made there to by the Officer concerned (maximum 50 words each for each sub parameters)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($formData['page10_data'] ?? [] as $index => $parameter)
                <tr>
                    <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $index + 1 }}</td>
                    <td style="vertical-align: top; padding: 8px;">
                        <div><strong>Parameter:</strong> {{ $parameter->parameter_name }}</div>
                        <div style="margin-top: 8px;"><strong>Sub Parameters:</strong></div>
                        <div>a. {{ $parameter->sub_parameter_a }}</div>
                        <div>b. {{ $parameter->sub_parameter_b }}</div>
                        <div>c. {{ $parameter->sub_parameter_c }}</div>
                        <div>d. {{ $parameter->sub_parameter_d }}</div>
                        <div>e. {{ $parameter->sub_parameter_e }}</div>
                    </td>
                    <td style="vertical-align: top; padding: 8px; min-height: 120px;">{{ $parameter->achievement_description }}</td>
                </tr>
                @empty
                @for($i = 1; $i <= 5; $i++)
                <tr>
                    <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $i }}</td>
                    <td style="vertical-align: top; padding: 8px;">
                        <div><strong>Parameter:</strong> ____________________</div>
                        <div style="margin-top: 8px;"><strong>Sub Parameter</strong></div>
                        <div>a.</div>
                        <div>b.</div>
                        <div>c.</div>
                        <div>d.</div>
                        <div>e.</div>
                    </td>
                    <td style="vertical-align: top; padding: 8px; min-height: 120px;">&nbsp;</td>
                </tr>
                @endfor
                @endforelse
                @if(isset($formData['page10_data']) && $formData['page10_data']->count() > 0 && $formData['page10_data']->count() < 5)
                    @for($i = $formData['page10_data']->count() + 1; $i <= 5; $i++)
                    <tr>
                        <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $i }}</td>
                        <td style="vertical-align: top; padding: 8px;">
                            <div><strong>Parameter:</strong> ____________________</div>
                            <div style="margin-top: 8px;"><strong>Sub Parameter</strong></div>
                            <div>a.</div>
                            <div>b.</div>
                            <div>c.</div>
                            <div>d.</div>
                            <div>e.</div>
                        </td>
                        <td style="vertical-align: top; padding: 8px; min-height: 120px;">&nbsp;</td>
                    </tr>
                    @endfor
                @endif
            </tbody>
        </table>

        <div class="page-break"></div>

        <div style="margin-top: 40px;">
            <p>Date: ________________</p>
            <p>Place: ________________</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of the Officer</strong></p>
            </div>
            <div style="text-align: right; margin-left:0px">
                <p><strong>Name: ____________________________</strong></p>
                <p><strong>Designation: ____________________________</strong></p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- Page 11: Part-B (Assessment by Reporting Authority) -->
        <div class="page-number">-11-</div>
        <div class="part-title">Part-B (Name of Employee: {{ $form->employee_name }})</div>
        <div class="part-subtitle"><u>ASSESSMENT BY THE REPORTING AUTHORITY</u></div>

        <div>
            <strong>1. Do you agree with the evaluation parameters suggested by the Officer?</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 80px; padding: 10px;">
                        @php
                            $page11Data = $formData['page11_data'] ?? collect();
                            $textRecord = $page11Data->whereNotNull('agree_evaluation')->first();
                        @endphp
                        {{ $textRecord->agree_evaluation ?? '' }}
                    </td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>2. Short summary of the innovative content of the work done</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 80px; padding: 10px;">
                        @php
                            $page11Data = $formData['page11_data'] ?? collect();
                            $textRecord = $page11Data->whereNotNull('innovative_summary')->first();
                        @endphp
                        {{ $textRecord->innovative_summary ?? '' }}
                    </td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>3. Please also indicate the exceptional contribution of the Officer for which he can be considered under exceptionally meritorious category.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 80px; padding: 10px;">
                        @php
                            $page11Data = $formData['page11_data'] ?? collect();
                            $textRecord = $page11Data->whereNotNull('exceptional_contribution')->first();
                        @endphp
                        {{ $textRecord->exceptional_contribution ?? '' }}
                    </td></tr>
                </tbody>
            </table>
        </div>
        <div class="page-break"></div>
        <div>
            <strong>4. Overall assessment of the scientific work</strong>
            <table class="assessment-table">
                <thead>
                    <tr>
                        <th style="width: 8%;">SL No.</th>
                        <th style="width: 40%;">Brief Description of the parameter on which the officer has to be evaluated</th>
                        <th style="width: 26%;">Marks given By the reporting authority</th>
                        <th style="width: 26%;">Maximum marks of each sub parameter</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $parametersWithMarks = $formData['page11_overall_assessments'] ?? collect();
                        $totalMarksObtained = $parametersWithMarks->sum('marks_given');
                        $totalMaxMarks = $parametersWithMarks->sum('max_marks');
                    @endphp
                    @forelse($parametersWithMarks as $index => $parameter)
                    <tr>
                        <td class="text-center"><strong>{{ $index + 1 }}.</strong></td>
                        <td>
                            <div><strong>Parameter:</strong> {{ $parameter->parameter_name }}</div>
                            <div style="margin-top: 8px;"><strong>Sub Parameters:</strong></div>
                            <div>a. {{ $parameter->sub_parameter_a }}</div>
                            <div>b. {{ $parameter->sub_parameter_b }}</div>
                            <div>c. {{ $parameter->sub_parameter_c }}</div>
                            <div>d. {{ $parameter->sub_parameter_d }}</div>
                            <div>e. {{ $parameter->sub_parameter_e }}</div>
                        </td>
                        <td class="text-center">{{ $parameter->marks_given }}</td>
                        <td class="text-center">{{ $parameter->max_marks }}</td>
                    </tr>
                    @empty
                    @for($i = 1; $i <= 5; $i++)
                    <tr>
                        <td class="text-center"><strong>{{ $i }}.</strong></td>
                        <td>
                            <div><strong>Parameter:</strong> ___________________</div>
                            <div style="margin-top: 8px;"><strong>Sub Parameter</strong></div>
                            <div>a.</div><div>b.</div><div>c.</div><div>d.</div><div>e.</div>
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                    @endfor
                    @endforelse
                    @if($parametersWithMarks->count() > 0 && $parametersWithMarks->count() < 5)
                        @for($i = $parametersWithMarks->count() + 1; $i <= 5; $i++)
                        <tr>
                            <td class="text-center"><strong>{{ $i }}.</strong></td>
                            <td>
                                <div><strong>Parameter:</strong> ___________________</div>
                                <div style="margin-top: 8px;"><strong>Sub Parameter</strong></div>
                                <div>a.</div><div>b.</div><div>c.</div><div>d.</div><div>e.</div>
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                        @endfor
                    @endif
                    <tr style="background-color: #fff2cc;">
                        <td></td>
                        <td><strong>Total Marks Obtained</strong></td>
                        <td class="text-center"><strong>{{ $totalMarksObtained }}</strong></td>
                        <td class="text-center"><strong>{{ $totalMaxMarks }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px; text-align: right;">
            <div style="margin-bottom: 40px;">
                <strong>Signature of the Reporting officer</strong>
            </div>
            <div style="text-align: right; margin-left:0px">
                <div><strong>Name:</strong> ________________________</div>
                <div style="margin-top: 8px;"><strong>Designation:</strong> ________________________</div>
            </div>
            <br>
            <br>
            
        </div>

        <!-- Page Break -->
        

        <!-- Page 12: Parameters for Evaluation (Appendix) -->
        <div class="page-number">-12-</div>
        
        <div>
            <strong>Parameters for Evaluation (Officer reported can choose at least twenty sub parameters given below) in consultation with the Reporting Officer</strong>
        </div>

        <div>
            <strong>1. S&T Management/S&T Policy Product/Scientific and Technological Aspects</strong>
            <ul style="margin-left: 20px;">
                <li>Extra and Intra mural R&D projects handled/executed/monitored</li>
                <li>Scientific Notes/Reports/database created/managed/handled</li>
                <li>S&T scheme or projects handled/launched/implemented/facilitated/managed</li>
                <li>S&T manuals/brochures/technology status report prepared</li>
                <li>S&T cooperation with other countries facilitated</li>
                <li>Signing of domestic/international MOU facilitated</li>
                <li>SFC/EFC/Cabinet Notes/Projects/Schemes prepared</li>
                <li>Technology Intelligence/foresight/assessment reports prepared</li>
                <li>Drafting/review of National/International standards for products/process</li>
                <li>Preparation of field report/observational data etc.</li>
                <li>Output/Outcomes of Research Projects generated</li>
                <li>Management of Scientific Resources</li>
            </ul>
        </div>

        <div>
            <strong>2. Knowledge Product</strong>
            <ul style="margin-left: 20px;">
                <li>Publications and invited lectures</li>
                <li>Patent/IPR documentation/copyrights/designs</li>
                <li>Output/Outcome Analysis for strategic S&T planning</li>
                <li>Development/Improvement of new/existing laboratory analytical method</li>
                <li>Development/Improvement of new/existing mathematical/statistical/dynamical models</li>
                <li>Preparation of data/meta data standards</li>
                <li>Development of Algorithms for IT solutions</li>
                <li>Development of convergent technology solutions</li>
                <li>Design and documentation of application software</li>
                <li>Preparation of technology status report</li>
            </ul>
        </div>

        <div>
            <strong>3. S&T Economic Product</strong>
            <ul style="margin-left: 20px;">
                <li>Technology Developed/Facilitated</li>
                <li>Technology transferred/ licensed/ commercialized</li>
                <li>Consultancy projects carried out/income generated/ EMR grants receipt</li>
                <li>Licensing Fee/Income catalysed/facilitated</li>
                <li>Start-ups created</li>
                <li>Incubation facilities created</li>
                <li>Technical services/Calibration implemented/facilitated</li>
                <li>Maintenance and upgradation of observational and Computational networks</li>
                <li>Capacity building</li>
                <li>Delivery of statutory/promotional services to industry</li>
                <li>Cost cutting Measures Implemented</li>
            </ul>
        </div>

        <div>
            <strong>4. Capacity building and Promotion of S&T</strong>
            <ul style="margin-left: 20px;">
                <li>HRD schemes managed/handled</li>
                <li>Skill Development/Rural development Programme implemented</li>
                <li>Technology field demonstration/entrepreneurship Training carried out</li>
                <li>Science education/Knowledge dissemination</li>
                <li>Training course designed and developed including capacity building</li>
                <li>PhD/MTech/Msc Students guided/trained</li>
            </ul>
        </div>

        <div>
            <strong>5. S&T Services and Outreach activities</strong>
            <ul style="margin-left: 20px;">
                <li>Outreach materials of R&D outputs disseminated</li>
                <li>Artisanal training/Skill Development Initiatives taken</li>
                <li>Grass root S&T related actions Technology adapted for local needs</li>
                <li>Participation in field survey, data collection, scientific exploration</li>
                <li>Laboratory Accreditation, Good Laboratory Practice</li>
                <li>Inspection survey, R&D Service</li>
                <li>Weather, Climate, Ocean, Seismological and Cryospheric services</li>
                <li>Environmental impact appraisals, Natural wealth and Hazard Assessment</li>
                <li>Testing and calibration service carried out</li>
                <li>Design/development of regulatory framework</li>
                <li>Software/hardware/electronic products deployed/developed</li>
                <li>Good Manufacturing Practices</li>
                <li>Projects planning/monitoring/evaluation</li>
                <li>Maintenance and enhancement of e-Governance Projects</li>
                <li>Design, development and hosting of portals, web applications and websites for information/dissemination</li>
                <li>Management and prevention of security threats/vulnerabilities in Cyber Space</li>
                <li>Monitoring systems for implementation of Government Schemes and dissemination to public using ICT Tools</li>
            </ul>
        </div>


        <div>
            <p>
                *Any other parameter not included above but included in the as S&T Output/Indicator in Annexure-II titled as “Criteria for identifying S&T Agencies/Organisations for implementation of Revised Flexible Complementing Scheme”.
            </p>
        </div>

        <div>
            <p>
                <strong>*Guidelines regarding filling up of APAR with numerical grading*</strong>
            </p>
        </div>

        <div>
            <ul class="roman-list">
                <li>
                    The columns in the APAR should be filled in with due care and attention and after devoting adequate time.
                </li>
                <li>
                    It is expected that any grading of 1 or 2 (against work output or attributes or overall grade) would be adequately justified with respect to specific accomplishments. Grades of 1-2 or 9-10 are expected to be rare occurrence sand hence the need to justify them. In awarding a numerical grade the reporting and reviewing authorities should rate the Scientist against a larger population of His/Her peers that may be currently working under them.
                </li>
                <li>
                    APARs graded between 8&10 will be rates as “Outstanding” and will be given a score of 9 for the purpose of calculating average scores for Promotion/Up-gradation under the Scheme.
                </li>
                <li>
                    APARs graded between 6 and short of 8 will be rated as “Very Good” and will be given a score of 7.
                </li>
                <li>
                    APARs graded between 4 and short of 6 will be rated as “Good” and will be given a score of 5.
                </li>
                <li>
                    APARs graded below 4 will be given a score of “Zero”.
                </li>
            </ul>
        </div>

        <div>
            <p style="text-align: center; margin-top: 40px;">
                **********
            </p>
        </div>


    </div>
    

    
</body>
</html>
        