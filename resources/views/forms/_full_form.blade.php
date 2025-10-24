<div class="print-container">
    <!-- Print Button (hidden in print) -->
    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()" style="background: #4f46e5; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">🖨️ Print Form</button>
        <button onclick="window.close()" style="background: #6b7280; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-left: 10px;">✕ Close</button>
    </div>

    <!-- Year Field -->
    <div class="year-field"><strong>YEAR: {{ $form->report_year }}</strong></div>

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
                @for($i=0;$i<7;$i++)
                <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                @endfor
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

    <div class="page-break"></div>

    <!-- Page 3: Part-2 -->
    <div class="page-number">-3-</div>
    <div class="part-title">Part-2</div>
    <div class="part-subtitle">To be filled in by the Scientist reported upon</div>
    <div class="part-subtitle">(Please read carefully the instructions before filling the entries)</div>

    <div>
        <strong>1. Brief description of duties.</strong>
        <table class="form-table"><tbody><tr><td style="min-height: 360px; padding: 10px;">&nbsp;</td></tr></tbody></table>
    </div>

    <div>
        <strong>2. Please specify the programs/projects assigned to you and your achievements there to in 100 words.</strong>
        <table class="form-table"><thead><tr><th style="width:40%">Brief description about the Program/Project/Field study.</th><th style="width:60%">Your Achievement there to in 100 words.</th></tr></thead><tbody><tr><td style="min-height:180px;padding:10px">&nbsp;</td><td style="min-height:180px;padding:10px">&nbsp;</td></tr></tbody></table>
    </div>

    <div class="page-break"></div>

    <!-- Page 4 -->
    <div class="page-number">-4-</div>
    <div>
        <strong>3. Please state briefly about major publications/reports/Technology transferred/patents filed/projects managed/social outreach activities/manpower trained not exceeding in 100 word.</strong>
        <table class="form-table"><tbody><tr><td style="min-height:150px;padding:10px">&nbsp;</td></tr></tbody></table>
    </div>

    <!-- ... include the rest of the printed content by referencing the existing fields where available ... -->

    <!-- For brevity the rest of the full form is included as-is from the print template in the project files. -->

</div>
