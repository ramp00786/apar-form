{{-- page 11 --}}
<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8">

                <!-- Page 11: Part-B (Assessment by Reporting Authority) -->
                <div class="page-number">-11-</div>
                <div class="part-title">Part-B (Name of Employee: {{ $form->employee_name }})</div>
                <div class="part-subtitle"><u>ASSESSMENT BY THE REPORTING AUTHORITY</u></div>

                <div>
                    <strong>1. Do you agree with the evaluation parameters suggested by the Officer?</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 80px; padding: 10px;">
                                    {{ $formData['part_b']['agree_evaluation'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <strong>2. Short summary of the innovative content of the work done</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 80px; padding: 10px;">
                                    {{ $formData['part_b']['innovative_summary'] ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <strong>3. Please also indicate the exceptional contribution of the Officer for which he can be
                        considered under exceptionally meritorious category.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 80px; padding: 10px;">
                                    {{ $formData['part_b']['exceptional_contribution'] ?? '' }}</td>
                            </tr>
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
                                <th style="width: 40%;">Brief Description of the parameter on which the officer has to
                                    be evaluated</th>
                                <th style="width: 26%;">Marks given By the reporting authority</th>
                                <th style="width: 26%;">Maximum marks of each sub parameter</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td class="text-center"><strong>{{ $i }}.</strong></td>
                                    <td>
                                        <div><strong>Parameter:</strong> ___________________</div>
                                        <div style="margin-top: 8px;"><strong>Sub Parameter</strong>
                                            ___________________</div>
                                        <div>a.</div>
                                        <div>b.</div>
                                        <div>c.</div>
                                        <div>d.</div>
                                        <div>e.</div>
                                    </td>
                                    <td class="text-center">{{ $formData['part_b']['param' . $i . '_marks'] ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $formData['part_b']['param' . $i . '_max_marks'] ?? '' }}</td>
                                </tr>
                            @endfor
                            <tr style="background-color: #fff2cc;">
                                <td></td>
                                <td><strong>Total Marks Obtained</strong></td>
                                <td class="text-center">
                                    <strong>{{ $formData['part_b']['total_marks_obtained'] ?? '' }}</strong>
                                </td>
                                <td class="text-center">
                                    <strong>{{ $formData['part_b']['total_max_marks'] ?? '' }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 80px; text-align: right;">
                    <div style="margin-bottom: 40px;">
                        <strong>Signature of the Reporting officer</strong>
                    </div>
                    <div style="text-align: right; margin-left:0px">
                        <div class="pb-4"><strong>Name:</strong> ________________________</div>
                        <div style="margin-top: 8px;"><strong>Designation:</strong> ________________________</div>
                    </div>
                    <br>
                    <br>

                </div>
            </div>