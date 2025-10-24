{{-- page 1 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">

                <!-- Page Number -->
                <div class="page-number">-1-</div>


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

                <div class="part-title">PART-1</div>
                <div class="part-subtitle">(The information should be furnished by the Administration/Custodian)</div>
                <div class="part-subtitle">(Identification Information)</div>

                <div class="section-list">
                    <ol>
                        <li>Name of the Employee: <strong>{{ $form->employee_name }}</strong></li>
                        <li>Designation: <strong>{{ $form->designation }}</strong></li>
                        <li>Employee ID: <strong>{{ $form->employee_id ?: 'N/A' }}</strong></li>
                        <li>Date of Birth:
                            <strong>{{ $form->date_of_birth ? $form->date_of_birth->format('d/m/Y') : 'N/A' }}</strong>
                        </li>
                        <li>Section or Group: <strong>{{ $form->section_or_group ?: 'N/A' }}</strong></li>
                        <li>Area of Specialization: <strong>{{ $form->area_of_specialization ?: 'N/A' }}</strong></li>
                        <li>Date of Joining to the Post:
                            <strong>{{ $form->date_of_joining ? $form->date_of_joining->format('d/m/Y') : 'N/A' }}</strong>
                        </li>
                        <li>E-mail ID: <strong>{{ $form->email ?: 'N/A' }}</strong></li>
                        <li>Mobile No.: <strong>{{ $form->mobile_no ?: 'N/A' }}</strong></li>
                        <li>Year Of the Report: <strong>{{ $form->report_year }}</strong></li>
                        @if ($form->department)
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
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>