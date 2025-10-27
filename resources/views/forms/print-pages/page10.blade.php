{{-- page 10 --}}
<style>
    #page10 input,
    #page10 textarea {
        height: 25px;
    }

    #page10 textarea {
        height: auto;
        min-height: 80px;
    }

    #page10 input:disabled,
    #page10 textarea:disabled {
        background-color: lightgray;
    }

    .evaluation-table th,
    .evaluation-table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .evaluation-table {
        width: 100%;
        border-collapse: collapse;
    }
</style>

{{-- fetch page10 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page10Data = \App\Models\Page10Data::where('form_id', $formId)->orderBy('id')->get();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page10">

    
    <!-- Page 10: Parameter Evaluation Table -->
    <div class="page-number">-10-</div>

    <p><strong>5. Brief Description of evaluation parameters related to the officer's work function as given
            in the Appendix:</strong></p>
    <p class="pt-4">Assessment of work output</p>
    <div style="text-align: justify; margin: 20px 0;">
        <strong>(Out of the five broad parameters given at Appendix, the officer may choose at least twenty
            sub parameters of 5 marks each for 100 marks in total relevant to the work function of the
            officer).</strong>
    </div>

    <!-- Add More Button (only visible in edit mode) -->
    <div id="addMoreParameterBtn" style="display: none;" class="my-2">
        <button type="button" onclick="addParameterRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add More Parameter
        </button>
    </div>

    <table class="evaluation-table" id="parameterTable">
        <thead>
            <tr>
                <th style="width: 8%; text-align: center;">SL<br>No.</th>
                <th style="width: 52%; text-align: center;">Brief Description of the parameter on which the
                    officer has to be evaluated</th>
                <th style="width: 40%; text-align: center;">Achievement made there to by the Officer
                    concerned (maximum 50 words each for each sub parameters)</th>
                <th id="parameterActionHeader" style="display: none; width: 10%;">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- Display existing page10 data --}}
            @forelse($page10Data as $index => $parameter)
                <tr>
                    <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $index + 1 }}</td>
                    <td style="vertical-align: top; padding: 8px;">
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
                    <td style="vertical-align: top; padding: 8px;">
                        <textarea disabled style="width: 100%; min-height: 120px; border: none; outline: none; resize: vertical;">{{ $parameter->achievement_description }}</textarea>
                    </td>
                    <td class="parameter-action-cell"
                        style="display: none; text-align: center; vertical-align: middle;">
                        <button type="button" onclick="removeParameterRow(this)"
                            class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                    </td>
                </tr>
            @empty
                {{-- Show default 5 empty rows if no data --}}
                @for ($i = 1; $i <= 5; $i++)
                    <tr>
                        <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $i }}</td>
                        <td style="vertical-align: top; padding: 8px;">
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
                        <td style="vertical-align: top; padding: 8px;">
                            <textarea disabled style="width: 100%; min-height: 120px; border: none; outline: none; resize: vertical;"></textarea>
                        </td>
                        <td class="parameter-action-cell"
                            style="display: none; text-align: center; vertical-align: middle;">
                            <button type="button" onclick="removeParameterRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
            @endforelse

            {{-- Additional empty rows if existing data < 5 --}}
            @if ($page10Data->count() > 0 && $page10Data->count() < 5)
                @for ($i = $page10Data->count() + 1; $i <= 5; $i++)
                    <tr>
                        <td style="text-align: center; vertical-align: top; padding: 8px;">{{ $i }}</td>
                        <td style="vertical-align: top; padding: 8px;">
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
                        <td style="vertical-align: top; padding: 8px;">
                            <textarea disabled style="width: 100%; min-height: 120px; border: none; outline: none; resize: vertical;"></textarea>
                        </td>
                        <td class="parameter-action-cell"
                            style="display: none; text-align: center; vertical-align: middle;">
                            <button type="button" onclick="removeParameterRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>


    {{-- ignore to save into database start --}}
    <div style="margin-top: 40px;">
        <p class="pb-4">Date: ________________</p>
        <p>Place: ________________</p>
        <br>
        <div class="signature-section">
            <p><strong>Signature of the Officer</strong></p>
        </div>
        <div style="text-align: right; margin-left:0px; margin-top: 40px;" class="pb-4">
            <p class="pb-4"><strong>Name: ____________________________</strong></p>
            <p><strong>Designation: ____________________________</strong></p>
        </div>
    </div>
    {{-- ignore to save into database end --}}
</div>
