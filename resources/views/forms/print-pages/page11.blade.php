{{-- page 11 --}}
<style>
    #page11 input,
    #page11 textarea {
        height: 25px;
    }

    #page11 textarea {
        height: auto;
        min-height: 80px;
    }

    #page11 input:disabled,
    #page11 textarea:disabled {
        background-color: lightgray;
    }

    .assessment-table th,
    .assessment-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .assessment-table {
        width: 100%;
        border-collapse: collapse;
    }
</style>

{{-- fetch page11 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page11Data = \App\Models\Page11Data::where('form_id', $formId)->get();
    $textData = $page11Data->whereNotNull('agree_evaluation')->first();
    $parameterData = \App\Models\Page11OverallAssessment::where('form_id', $formId)->get();
    $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page11">

    {{-- Edit/Save/Cancel Buttons - Only for Reporting Officer --}}
    


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
                        <textarea disabled style="width: 100%; height: 80px; border: none; outline: none; resize: vertical;">{{ $textData->agree_evaluation ?? '' }}</textarea>
                    </td>
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
                        <textarea disabled style="width: 100%; height: 80px; border: none; outline: none; resize: vertical;">{{ $textData->innovative_summary ?? '' }}</textarea>
                    </td>
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
                        <textarea disabled style="width: 100%; height: 80px; border: none; outline: none; resize: vertical;">{{ $textData->exceptional_contribution ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="page-break"></div>
    <div>
        <strong>4. Overall assessment of the scientific work</strong>

        <!-- Add More Button (only visible in edit mode for reporting officer) -->
        @if ($isReportingOfficer)
            <div id="addMoreParameterBtn11" style="display: none;" class="my-2">
                <button type="button" onclick="addParameterRow11()"
                    class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add More Parameter
                </button>
            </div>
        @endif

        <table class="assessment-table" id="parameterTable11">
            <thead>
                <tr>
                    <th style="width: 8%;">SL No.</th>
                    <th style="width: 40%;">Brief Description of the parameter on which the officer has to
                        be evaluated</th>
                    <th style="width: 26%;">Marks given By the reporting authority</th>
                    <th style="width: 26%;">Maximum marks of each sub parameter</th>
                    @if ($isReportingOfficer)
                        <th id="parameterActionHeader11" style="display: none; width: 10%;">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                {{-- Display existing page11 data --}}
                @forelse($parameterData as $index => $parameter)
                    <tr>
                        <td class="text-center"><strong>{{ $index + 1 }}.</strong></td>
                        <td>
                            <div style="margin-bottom: 8px;">
                                <strong>Parameter:</strong>
                                <input type="text" disabled value="{{ $parameter->parameter_name }}"
                                    style="width: 70%; border: none; outline: none;">
                            </div>
                            <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                            <div style="margin-bottom: 2px;">a. <input type="text" disabled
                                    value="{{ $parameter->sub_parameter_a }}"
                                    style="width: 85%; border: none; outline: none;"></div>
                            <div style="margin-bottom: 2px;">b. <input type="text" disabled
                                    value="{{ $parameter->sub_parameter_b }}"
                                    style="width: 85%; border: none; outline: none;"></div>
                            <div style="margin-bottom: 2px;">c. <input type="text" disabled
                                    value="{{ $parameter->sub_parameter_c }}"
                                    style="width: 85%; border: none; outline: none;"></div>
                            <div style="margin-bottom: 2px;">d. <input type="text" disabled
                                    value="{{ $parameter->sub_parameter_d }}"
                                    style="width: 85%; border: none; outline: none;"></div>
                            <div>e. <input type="text" disabled value="{{ $parameter->sub_parameter_e }}"
                                    style="width: 85%; border: none; outline: none;"></div>
                        </td>
                        <td class="text-center">
                            <input type="number" disabled value="{{ $parameter->marks_given }}"
                                style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;"
                                min="0" max="100">
                        </td>
                        <td class="text-center">
                            <input type="number" disabled value="{{ $parameter->max_marks }}"
                                style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;" min="0"
                                max="100">
                        </td>
                        @if ($isReportingOfficer)
                            <td class="parameter-action-cell11"
                                style="display: none; text-align: center; vertical-align: middle;">
                                <button type="button" onclick="removeParameterRow11(this)"
                                    class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                            </td>
                        @endif
                    </tr>
                @empty
                    {{-- Show default 5 empty rows if no data --}}
                    @for ($i = 1; $i <= 5; $i++)
                        <tr>
                            <td class="text-center"><strong>{{ $i }}.</strong></td>
                            <td>
                                <div style="margin-bottom: 8px;">
                                    <strong>Parameter:</strong>
                                    <input type="text" disabled value=""
                                        style="width: 70%; border: none; outline: none;">
                                </div>
                                <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                                <div style="margin-bottom: 2px;">a. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">b. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">c. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">d. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div>e. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                            </td>
                            <td class="text-center">
                                <input type="number" disabled value=""
                                    style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;"
                                    min="0" max="100">
                            </td>
                            <td class="text-center">
                                <input type="number" disabled value=""
                                    style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;"
                                    min="0" max="100">
                            </td>
                            @if ($isReportingOfficer)
                                <td class="parameter-action-cell11"
                                    style="display: none; text-align: center; vertical-align: middle;">
                                    <button type="button" onclick="removeParameterRow11(this)"
                                        class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                </td>
                            @endif
                        </tr>
                    @endfor
                @endforelse

                {{-- Additional empty rows if existing data < 5 --}}
                @if ($parameterData->count() > 0 && $parameterData->count() < 5)
                    @for ($i = $parameterData->count() + 1; $i <= 5; $i++)
                        <tr>
                            <td class="text-center"><strong>{{ $i }}.</strong></td>
                            <td>
                                <div style="margin-bottom: 8px;">
                                    <strong>Parameter:</strong>
                                    <input type="text" disabled value=""
                                        style="width: 70%; border: none; outline: none;">
                                </div>
                                <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                                <div style="margin-bottom: 2px;">a. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">b. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">c. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div style="margin-bottom: 2px;">d. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                                <div>e. <input type="text" disabled value=""
                                        style="width: 85%; border: none; outline: none;"></div>
                            </td>
                            <td class="text-center">
                                <input type="number" disabled value=""
                                    style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;"
                                    min="0" max="100">
                            </td>
                            <td class="text-center">
                                <input type="number" disabled value=""
                                    style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;"
                                    min="0" max="100">
                            </td>
                            @if ($isReportingOfficer)
                                <td class="parameter-action-cell11"
                                    style="display: none; text-align: center; vertical-align: middle;">
                                    <button type="button" onclick="removeParameterRow11(this)"
                                        class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                </td>
                            @endif
                        </tr>
                    @endfor
                @endif

                {{-- Total row --}}
                <tr style="background-color: #fff2cc;">
                    <td></td>
                    <td><strong>Total Marks Obtained</strong></td>
                    <td class="text-center">
                        <strong id="totalMarksObtained">0</strong>
                    </td>
                    <td class="text-center">
                        <strong id="totalMaxMarks">0</strong>
                    </td>
                    @if ($isReportingOfficer)
                        <td style="display: none;"></td>
                    @endif
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
