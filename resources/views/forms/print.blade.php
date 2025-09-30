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

        <!-- PART-1 -->
        <div class="part-title">PART-1</div>
        <div class="part-subtitle">(The information should be furnished by the Administration/Custodian)</div>
        <div class="part-subtitle">(Identification Information)</div>

        <div class="section-list">
            <ol>
                <li>Name of the Employee: <strong>{{ $form->employee_name }}</strong></li>
                <li>Designation: <strong>{{ $form->designation }}</strong></li>
                <li>Employee ID: <strong>{{ $form->employee_id }}</strong></li>
                <li>Date of Birth: <strong>{{ $form->date_of_birth->format('d/m/Y') }}</strong></li>
                <li>Section or Group: <strong>{{ $form->section_or_group }}</strong></li>
                <li>Area of Specialization: <strong>{{ $form->area_of_specialization }}</strong></li>
                <li>Date of Joining to the Post: <strong>{{ $form->date_of_joining->format('d/m/Y') }}</strong></li>
                <li>E-mail ID: <strong>{{ $form->email }}</strong></li>
                <li>Mobile No.: <strong>{{ $form->mobile_no }}</strong></li>
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
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Training -->
        <div>
            <strong>13. Any training undergone during the year of Report:</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 180px; padding: 10px;">&nbsp;</td></tr>
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
                    <tr><td>1.</td><td>Maternity Leave</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>2.</td><td>EL</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>3.</td><td>Study Leave</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td>4.</td><td>CCL</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-2 -->
        <div class="part-title">Part-2</div>
        <div class="part-subtitle">To be filled in by the Scientist reported upon</div>
        <div class="part-subtitle">(Please read carefully the instructions before filling the entries)</div>

        <div>
            <strong>1. Brief description of duties.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 360px; padding: 10px;">&nbsp;</td></tr>
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
                    <tr><td style="min-height: 180px; padding: 10px;">&nbsp;</td><td style="min-height: 180px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>3. Please state briefly about major publications/reports/Technology transferred/patents filed/projects managed/social outreach activities/manpower trained not exceeding in 100 word.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 150px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>4. Specific contribution made to different mission of the Government like Atma Nirbhar Bharat, Make in India, Swachh Bharat etc., in bullets (50 words.)</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 90px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>5. Please brief about the work done/utilization of GeM portal for procurement of goods and services.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 90px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>6. Please state whether annual return on immovable property for the preceding calendar year was filed within the prescribed date i.e 31st January of the year following the calendar year. If not the date of filling the return should be given.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 90px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            <p>Date: {{ date('d/m/Y') }}</p>
            <p>Place: ________________</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of the Scientist Reported Upon</strong></p>
                <p><strong>{{ $form->employee_name }}</strong></p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-3 -->
        <div class="part-title">PART-3</div>
        <div class="part-subtitle">Numerical grading is to be awarded by reporting and reviewing authority which should be on a scale of 1-10 where 1 refers to the lowest grade and 10 to the highest.</div>
        <div class="part-subtitle">(Please read carefully the guidelines before filling entries)</div>
        
        <div style="margin: 20px 0;">
            <strong>(Name of the Employee: {{ $form->employee_name }})</strong>
        </div>

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
                    <td>Work Output Assessment</td>
                    <td>&nbsp;</td>
                    <td>{{ $formData['part_3']['work_output'] ?? '' }}</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Professional Skills</td>
                    <td>&nbsp;</td>
                    <td>{{ $formData['part_3']['professional_skills'] ?? '' }}</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Communication Skills</td>
                    <td>&nbsp;</td>
                    <td>{{ $formData['part_3']['communication_skills'] ?? '' }}</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>Overall Grading on "Work Output"</strong></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
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
                <tr><td>(i) Integrity & Conduct</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(ii) Ability to work hard</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(iii) Sense of responsibility</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(iv) Communication skills</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(v) Leadership Qualities</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(vi) Capacity to work in team spirit</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(vii) Capacity to adhere to time-schedule</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(viii) Inter-personal relations</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(ix) Overall bearing and personality</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td><strong>Overall Grading on "Personal Attributes"</strong></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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
                <tr><td>(i) Scientific Capability</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(ii) S&T Foresight and Vision</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(iii) Decision making ability</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(iv) Organizing ability</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(v) Ability to motivate and groom sub-ordinates</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>(vi) New Initiative</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td><strong>Overall Grading on "Functional Competency"</strong></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
            </tbody>
        </table>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-4 -->
        <div class="part-title">PART-4</div>
        <div class="part-subtitle">GENERAL</div>

        <div>
            <strong>1. Relation with the public (wherever applicable)</strong>
            <p>(Please comment on the Scientist accessibility to the public and responsiveness to their needs)</p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 200px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>2. Training</strong>
            <p>(Please give recommendation for training with a view to further improving the effectiveness and capabilities of the Scientist)</p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 200px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>3. State of Health</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>4. Integrity</strong>
            <p>(Please comment on the integrity of the Scientist)</p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>5. Pen Picture by Reporting Officer (in about 100words) on the overall qualities of the Scientist including area of strengths and lesser strength extraordinary achievements, scientific & technical achievements (refer 3 of Part 2) and attitude towards weaker section.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 200px; padding: 10px;">{{ $formData['part_b']['innovative_summary'] ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part -3 of the Report.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 80px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            <p>Place:</p>
            <p>Date:</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of Reporting Officer</strong></p>
                <br>
                <p style="margin-left: 150px;">Name of Block Letter:</p>
                <p style="margin-left: 150px;">Designation:</p>
                <p style="margin-left: 150px;">During the period of report:</p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-5 -->
        <div class="part-title">PART-5</div>

        <div>
            <strong>1. Remarks of the Reviewing Officer</strong>
            <p>Length of Service under the Reviewing Officer.</p>
            <table class="form-table">
                <tbody>
                    <tr><td class="medium-text-area">{{ $formData['part_5']['reviewing_remarks'] ?? '' }}</td></tr>
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
                    <td style="height: 30px;">{{ ($formData['part_b']['agree_evaluation'] ?? '') == 'yes' ? '✓' : '' }}</td>
                    <td style="height: 30px;">{{ ($formData['part_b']['agree_evaluation'] ?? '') == 'no' ? '✓' : '' }}</td>
                </tr>
            </table>
        </div>

        <div>
            <strong>3. In case of disagreement please specify the reason, is there anything you wish to modify or add.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td class="medium-text-area">{{ $formData['part_b']['exceptional_contribution'] ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>4. Pen Picture by Reviewing Officer, please comment (in about 100words) on the overall qualities of the Scientist including area of strengths and lesser strength scientific & technical achievements and attitude towards weaker section.</strong>
            <table class="form-table">
                <tbody>
                    <tr><td class="large-text-area">{{ $formData['part_5']['overall_assessment'] ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part -3 the Report.</strong>
            <p><strong>Numerical Grading: {{ $formData['part_5']['numerical_grading'] ?? '' }}/10</strong></p>
        </div>

        <div style="margin-top: 40px;">
            <p>Place:</p>
            <p>Date:</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of Reviewing Officer</strong></p>
                <br>
                <p style="margin-left: 150px;">Officer Name of Block Letter:</p>
                <p style="margin-left: 150px;">Designation:</p>
                <p style="margin-left: 150px;">The period of report:</p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-B -->
        <div class="part-title">PART-B</div>
        <div class="part-subtitle">ANNUAL WORK REPORT</div>
        <div class="part-subtitle"><u>Self-Assessment by the officer reported upon</u></div>

        <div class="section-list">
            <ol>
                <li><strong>Name: {{ $form->employee_name }}</strong></li>
                <li><strong>Designation: {{ $form->designation }}</strong></li>
                <li><strong>Area of S&T function: {{ $form->area_of_specialization }}</strong></li>
            </ol>
        </div>

        <div class="part-title"><u>Part A</u></div>

        <div>
            <strong>4. One page summary of the scientific and technical elements in the work done during the financial Year:</strong>
            
            <p><strong>4. a. New Initiative taken:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>

            <p><strong>4. b. S&T content of the work done:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px;">{{ $formData['part_b']['scientific_work_assessment'] ?? '' }}</td></tr>
                </tbody>
            </table>

            <p><strong>4. c. Innovation content of the work done:</strong></p>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 120px; padding: 10px;">{{ $formData['part_b']['innovative_summary'] ?? '' }}</td></tr>
                </tbody>
            </table>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <div>
            <strong>5. Brief Description of evaluation parameters related to the officer's work function as given in the Appendix:</strong>
            <p><strong>Assessment of work output</strong></p>
            
            <p><em>(Out of the five broad parameters given at Appendix, the officer may choose at least twenty sub parameters of 5 marks each for 100 marks in total relevant to the work function of the officer).</em></p>

            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">SL No.</th>
                        <th style="width: 50%;">Brief Description of the parameter on which the officer has to be evaluated</th>
                        <th style="width: 40%;">Achievement made there to by the Officer concerned (maximum 50 words each for each sub parameters)</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 20; $i++)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td style="min-height: 60px; padding: 5px;">&nbsp;</td>
                        <td style="min-height: 60px; padding: 5px;">&nbsp;</td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            <p>Date: {{ date('d/m/Y') }}</p>
            <p>Place: ________________</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of the Officer</strong></p>
                <p><strong>{{ $form->employee_name }}</strong></p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- PART-C -->
        <div class="part-title">PART-C</div>
        <div class="part-subtitle">ACCEPTANCE BY THE HEAD OF OFFICE/INSTITUTE</div>

        <div>
            <p>I have gone through the self-assessment report submitted by Shri/Smt/Dr. <strong>{{ $form->employee_name }}</strong> and certify that:</p>
        </div>

        <div>
            <table class="form-table">
                <tbody>
                    <tr>
                        <td style="width: 5%; text-align: center;">1.</td>
                        <td style="width: 85%;">The facts stated are correct to the best of my knowledge.</td>
                        <td style="width: 10%; text-align: center;">Yes/No</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2.</td>
                        <td>The achievements claimed are reasonable and justified.</td>
                        <td style="text-align: center;">Yes/No</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">3.</td>
                        <td>The officer has satisfactorily completed the assigned work during the period under report.</td>
                        <td style="text-align: center;">Yes/No</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>Additional Comments (if any):</strong>
            <table class="form-table">
                <tbody>
                    <tr><td style="min-height: 150px; padding: 10px;">&nbsp;</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 40px;">
            <p>Date: ________________</p>
            <p>Place: ________________</p>
            <br>
            <div class="signature-section">
                <p><strong>Signature of Head of Office/Institute</strong></p>
                <br>
                <p style="margin-left: 150px;">Name: ________________________</p>
                <p style="margin-left: 150px;">Designation: __________________</p>
            </div>
        </div>

        <!-- Page Break -->
        <div class="page-break"></div>

        <!-- APPENDIX -->
        <div class="part-title">APPENDIX</div>
        <div class="part-subtitle">EVALUATION PARAMETERS FOR SCIENTIFIC & TECHNICAL PERSONNEL</div>

        <div>
            <strong>A. RESEARCH AND DEVELOPMENT (R&D)</strong>
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Sr. No.</th>
                        <th style="width: 70%;">Parameter</th>
                        <th style="width: 20%;">Max Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Quality research publications in peer reviewed journals</td><td>5</td></tr>
                    <tr><td>2</td><td>Books/Monographs authored</td><td>5</td></tr>
                    <tr><td>3</td><td>Patents filed/granted</td><td>5</td></tr>
                    <tr><td>4</td><td>Technology transferred/commercialized</td><td>5</td></tr>
                    <tr><td>5</td><td>Research projects completed/ongoing</td><td>5</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>B. ACADEMIC ACTIVITIES</strong>
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Sr. No.</th>
                        <th style="width: 70%;">Parameter</th>
                        <th style="width: 20%;">Max Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Lectures delivered at conferences/seminars</td><td>5</td></tr>
                    <tr><td>2</td><td>Training programs conducted</td><td>5</td></tr>
                    <tr><td>3</td><td>Thesis guidance (Ph.D./M.Tech/M.Sc.)</td><td>5</td></tr>
                    <tr><td>4</td><td>Course curriculum development</td><td>5</td></tr>
                    <tr><td>5</td><td>International collaborations</td><td>5</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>C. SERVICES TO PROFESSION AND SOCIETY</strong>
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Sr. No.</th>
                        <th style="width: 70%;">Parameter</th>
                        <th style="width: 20%;">Max Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Editorial board membership of journals</td><td>5</td></tr>
                    <tr><td>2</td><td>Reviewer for journals/projects</td><td>5</td></tr>
                    <tr><td>3</td><td>Professional society activities</td><td>5</td></tr>
                    <tr><td>4</td><td>Awards and recognition received</td><td>5</td></tr>
                    <tr><td>5</td><td>Social outreach activities</td><td>5</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>D. ADMINISTRATIVE RESPONSIBILITIES</strong>
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Sr. No.</th>
                        <th style="width: 70%;">Parameter</th>
                        <th style="width: 20%;">Max Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Committee memberships and contributions</td><td>5</td></tr>
                    <tr><td>2</td><td>Leadership roles in projects/initiatives</td><td>5</td></tr>
                    <tr><td>3</td><td>Resource mobilization activities</td><td>5</td></tr>
                    <tr><td>4</td><td>Institutional development contributions</td><td>5</td></tr>
                    <tr><td>5</td><td>Policy formulation participation</td><td>5</td></tr>
                </tbody>
            </table>
        </div>

        <div>
            <strong>E. INNOVATION AND ENTREPRENEURSHIP</strong>
            <table class="evaluation-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Sr. No.</th>
                        <th style="width: 70%;">Parameter</th>
                        <th style="width: 20%;">Max Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>Innovative solutions developed</td><td>5</td></tr>
                    <tr><td>2</td><td>Start-up incubation activities</td><td>5</td></tr>
                    <tr><td>3</td><td>Industry partnerships established</td><td>5</td></tr>
                    <tr><td>4</td><td>New methodologies/techniques developed</td><td>5</td></tr>
                    <tr><td>5</td><td>Commercialization of research outputs</td><td>5</td></tr>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 30px;">
            <p><strong>Note:</strong> The officer should select at least 20 sub-parameters from the above five broad categories, each carrying 5 marks, for a total of 100 marks. The selection should be relevant to the officer's work function and responsibilities.</p>
        </div>
    </div>

    <script>
        // Auto print when page loads (optional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>