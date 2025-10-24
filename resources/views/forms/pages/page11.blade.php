{{-- page 11 --}}
<style>
    #page11 input, #page11 textarea {
        height: 25px;
    }
    #page11 textarea {
        height: auto;
        min-height: 80px;
    }
    #page11 input:disabled, #page11 textarea:disabled {
        background-color: lightgray;
    }
    .assessment-table th, .assessment-table td {
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
    $parameterData = $page11Data->whereNotNull('parameter_name');
    $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page11">

    {{-- Edit/Save/Cancel Buttons - Only for Reporting Officer --}}
    @if($isReportingOfficer)
    <div class="flex justify-end py-4">
        <button id="editBtn11" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit11()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn11" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges11()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn11" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit11()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>
    @endif

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
                    @if($isReportingOfficer)
                    <div id="addMoreParameterBtn11" style="display: none;" class="my-2">
                        <button type="button" onclick="addParameterRow11()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                                @if($isReportingOfficer)
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
                                            <input type="text" disabled value="{{ $parameter->parameter_name }}" style="width: 70%; border: none; outline: none;">
                                        </div>
                                        <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                                        <div style="margin-bottom: 2px;">a. <input type="text" disabled value="{{ $parameter->sub_parameter_a }}" style="width: 85%; border: none; outline: none;"></div>
                                        <div style="margin-bottom: 2px;">b. <input type="text" disabled value="{{ $parameter->sub_parameter_b }}" style="width: 85%; border: none; outline: none;"></div>
                                        <div style="margin-bottom: 2px;">c. <input type="text" disabled value="{{ $parameter->sub_parameter_c }}" style="width: 85%; border: none; outline: none;"></div>
                                        <div style="margin-bottom: 2px;">d. <input type="text" disabled value="{{ $parameter->sub_parameter_d }}" style="width: 85%; border: none; outline: none;"></div>
                                        <div>e. <input type="text" disabled value="{{ $parameter->sub_parameter_e }}" style="width: 85%; border: none; outline: none;"></div>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" disabled value="{{ $parameter->marks_given }}" style="width: 80%; height: 30px; text-align: center; border: none; outline: none;" min="0" max="100">
                                    </td>
                                    <td class="text-center">
                                        <input type="number" disabled value="{{ $parameter->max_marks }}" style="width: 80%; text-align: center; border: none; outline: none;" min="0" max="100">
                                    </td>
                                    @if($isReportingOfficer)
                                    <td class="parameter-action-cell11" style="display: none; text-align: center; vertical-align: middle;">
                                        <button type="button" onclick="removeParameterRow11(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                {{-- Show default 5 empty rows if no data --}}
                                @for($i = 1; $i <= 5; $i++)
                                    <tr>
                                        <td class="text-center"><strong>{{ $i }}.</strong></td>
                                        <td>
                                            <div style="margin-bottom: 8px;">
                                                <strong>Parameter:</strong> 
                                                <input type="text" disabled value="" style="width: 70%; border: none; outline: none;">
                                            </div>
                                            <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                                            <div style="margin-bottom: 2px;">a. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">b. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">c. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">d. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div>e. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                        </td>
                                        <td class="text-center">
                                            <input type="number" disabled value="" style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;" min="0" max="100">
                                        </td>
                                        <td class="text-center">
                                            <input type="number" disabled value="" style="width: 80%; min-height: 150px; text-align: center; border: none; outline: none;" min="0" max="100">
                                        </td>
                                        @if($isReportingOfficer)
                                        <td class="parameter-action-cell11" style="display: none; text-align: center; vertical-align: middle;">
                                            <button type="button" onclick="removeParameterRow11(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                        </td>
                                        @endif
                                    </tr>
                                @endfor
                            @endforelse
                            
                            {{-- Additional empty rows if existing data < 5 --}}
                            @if($parameterData->count() > 0 && $parameterData->count() < 5)
                                @for($i = $parameterData->count() + 1; $i <= 5; $i++)
                                    <tr>
                                        <td class="text-center"><strong>{{ $i }}.</strong></td>
                                        <td>
                                            <div style="margin-bottom: 8px;">
                                                <strong>Parameter:</strong> 
                                                <input type="text" disabled value="" style="width: 70%; border: none; outline: none;">
                                            </div>
                                            <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                                            <div style="margin-bottom: 2px;">a. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">b. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">c. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div style="margin-bottom: 2px;">d. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                            <div>e. <input type="text" disabled value="" style="width: 85%; border: none; outline: none;"></div>
                                        </td>
                                        <td class="text-center">
                                            <input type="number" disabled value="" style="width: 80%; text-align: center; border: none; outline: none;" min="0" max="100">
                                        </td>
                                        <td class="text-center">
                                            <input type="number" disabled value="" style="width: 80%; text-align: center; border: none; outline: none;" min="0" max="100">
                                        </td>
                                        @if($isReportingOfficer)
                                        <td class="parameter-action-cell11" style="display: none; text-align: center; vertical-align: middle;">
                                            <button type="button" onclick="removeParameterRow11(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
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
                                @if($isReportingOfficer)
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

@if($isReportingOfficer)
@push('scripts')
    <script>
        let originalValues11 = {};
        
        function enableEdit11() {
            // Store original values before editing
            const inputs = document.querySelectorAll('#page11 input, #page11 textarea');
            originalValues11 = {};
            inputs.forEach((input, index) => {
                originalValues11[index] = input.value;
            });
            
            // Hide edit button, show save and cancel buttons
            document.getElementById('editBtn11').style.display = 'none';
            document.getElementById('saveBtn11').style.display = 'inline-block';
            document.getElementById('cancelBtn11').style.display = 'inline-block';
            
            // Show Add More button and Action column
            document.getElementById('addMoreParameterBtn11').style.display = 'block';
            const actionHeader = document.getElementById('parameterActionHeader11');
            if (actionHeader) {
                actionHeader.style.display = 'table-cell';
            }
            
            document.querySelectorAll('.parameter-action-cell11').forEach(cell => {
                cell.style.display = 'table-cell';
            });
            
            // Enable all input fields in page11
            inputs.forEach(input => {
                input.disabled = false;
            });
            
            // Update totals initially
            updateTotals11();
        }
        
        function saveChanges11() {
            const formData = {};
            
            // Collect text area data
            const textareas = document.querySelectorAll('#page11 textarea');
            formData.agree_evaluation = textareas[0] ? textareas[0].value.trim() : '';
            formData.innovative_summary = textareas[1] ? textareas[1].value.trim() : '';
            formData.exceptional_contribution = textareas[2] ? textareas[2].value.trim() : '';
            
            // Collect Parameter data
            const parameterRows = document.querySelectorAll('#parameterTable11 tbody tr:not(:last-child)'); // Exclude total row
            const parameters = [];
            
            parameterRows.forEach((row, index) => {
                const inputs = row.querySelectorAll('input');
                
                if (inputs.length >= 8) { // 1 param + 5 sub + 2 marks = 8 inputs
                    const parameterName = inputs[0].value.trim();
                    const subParameterA = inputs[1].value.trim();
                    const subParameterB = inputs[2].value.trim();
                    const subParameterC = inputs[3].value.trim();
                    const subParameterD = inputs[4].value.trim();
                    const subParameterE = inputs[5].value.trim();
                    const marksGiven = inputs[6].value.trim();
                    const maxMarks = inputs[7].value.trim();
                    
                    // Check if any field has content
                    if (parameterName || subParameterA || subParameterB || subParameterC || subParameterD || subParameterE || marksGiven || maxMarks) {
                        parameters.push({
                            parameter_name: parameterName,
                            sub_parameter_a: subParameterA,
                            sub_parameter_b: subParameterB,
                            sub_parameter_c: subParameterC,
                            sub_parameter_d: subParameterD,
                            sub_parameter_e: subParameterE,
                            marks_given: marksGiven ? parseInt(marksGiven) : null,
                            max_marks: maxMarks ? parseInt(maxMarks) : null
                        });
                    }
                }
            });
            
            // Prepare form data
            formData.parameters = parameters;
            formData._token = '{{ csrf_token() }}';

            console.log('Sending Page 11 data:', formData); // Debug log

            // Send AJAX request
            fetch('{{ route('forms.page11.update', $form->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server response:', data); // Debug log
                if (data.success) {
                    // Hide save and cancel buttons, show edit button
                    document.getElementById('editBtn11').style.display = 'inline-block';
                    document.getElementById('saveBtn11').style.display = 'none';
                    document.getElementById('cancelBtn11').style.display = 'none';
                    
                    // Hide Add More button and Action column
                    document.getElementById('addMoreParameterBtn11').style.display = 'none';
                    const actionHeader = document.getElementById('parameterActionHeader11');
                    if (actionHeader) {
                        actionHeader.style.display = 'none';
                    }
                    
                    document.querySelectorAll('.parameter-action-cell11').forEach(cell => {
                        cell.style.display = 'none';
                    });
                    
                    // Disable all input fields in page11
                    const inputs = document.querySelectorAll('#page11 input, #page11 textarea');
                    inputs.forEach(input => {
                        input.disabled = true;
                    });
                    
                    showToast('Page 11 data saved successfully!');
                } else {
                    showToast('Error saving changes: ' + data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while saving changes.', 'error');
            });
        }
        
        function cancelEdit11() {
            // Hide save and cancel buttons, show edit button
            document.getElementById('editBtn11').style.display = 'inline-block';
            document.getElementById('saveBtn11').style.display = 'none';
            document.getElementById('cancelBtn11').style.display = 'none';
            
            // Hide Add More button and Action column
            document.getElementById('addMoreParameterBtn11').style.display = 'none';
            const actionHeader = document.getElementById('parameterActionHeader11');
            if (actionHeader) {
                actionHeader.style.display = 'none';
            }
            
            document.querySelectorAll('.parameter-action-cell11').forEach(cell => {
                cell.style.display = 'none';
            });
            
            // Restore original values and disable inputs
            const inputs = document.querySelectorAll('#page11 input, #page11 textarea');
            inputs.forEach((input, index) => {
                input.value = originalValues11[index] || '';
                input.disabled = true;
            });
            
            // Update totals
            updateTotals11();
        }
        
        // Parameter functions
        function addParameterRow11() {
            const tbody = document.querySelector('#parameterTable11 tbody');
            const totalRow = tbody.querySelector('tr:last-child'); // Get total row
            const rowCount = tbody.children.length - 1; // Exclude total row
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="text-center"><strong>${rowCount + 1}.</strong></td>
                <td>
                    <div style="margin-bottom: 8px;">
                        <strong>Parameter:</strong> 
                        <input type="text" value="" style="width: 70%; border: none; outline: none;">
                    </div>
                    <div style="margin-bottom: 4px;"><strong>Sub Parameters:</strong></div>
                    <div style="margin-bottom: 2px;">a. <input type="text" value="" style="width: 85%; border: none; outline: none;"></div>
                    <div style="margin-bottom: 2px;">b. <input type="text" value="" style="width: 85%; border: none; outline: none;"></div>
                    <div style="margin-bottom: 2px;">c. <input type="text" value="" style="width: 85%; border: none; outline: none;"></div>
                    <div style="margin-bottom: 2px;">d. <input type="text" value="" style="width: 85%; border: none; outline: none;"></div>
                    <div>e. <input type="text" value="" style="width: 85%; border: none; outline: none;"></div>
                </td>
                <td class="text-center">
                    <input type="number" value="" style="width: 80%; text-align: center; border: none; outline: none;" min="0" max="100" onchange="updateTotals11()">
                </td>
                <td class="text-center">
                    <input type="number" value="" style="width: 80%; text-align: center; border: none; outline: none;" min="0" max="100" onchange="updateTotals11()">
                </td>
                <td class="parameter-action-cell11" style="text-align: center; vertical-align: middle;">
                    <button type="button" onclick="removeParameterRow11(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
            tbody.insertBefore(newRow, totalRow);
            updateRowNumbers11();
            updateTotals11();
        }
        
        function removeParameterRow11(button) {
            const row = button.closest('tr');
            row.remove();
            updateRowNumbers11();
            updateTotals11();
        }
        
        function updateRowNumbers11() {
            const tbody = document.querySelector('#parameterTable11 tbody');
            const rows = tbody.querySelectorAll('tr:not(:last-child)'); // Exclude total row
            rows.forEach((row, index) => {
                const firstCell = row.querySelector('td strong');
                if (firstCell) {
                    firstCell.textContent = (index + 1) + '.';
                }
            });
        }
        
        function updateTotals11() {
            const tbody = document.querySelector('#parameterTable11 tbody');
            const rows = tbody.querySelectorAll('tr:not(:last-child)'); // Exclude total row
            let totalObtained = 0;
            let totalMax = 0;
            
            rows.forEach(row => {
                const inputs = row.querySelectorAll('input[type="number"]');
                if (inputs.length >= 2) {
                    const obtained = parseInt(inputs[0].value) || 0;
                    const max = parseInt(inputs[1].value) || 0;
                    totalObtained += obtained;
                    totalMax += max;
                }
            });
            
            document.getElementById('totalMarksObtained').textContent = totalObtained;
            document.getElementById('totalMaxMarks').textContent = totalMax;
        }
        
        // Add event listeners for automatic total calculation
        document.addEventListener('DOMContentLoaded', function() {
            // Add change listeners to existing number inputs
            document.querySelectorAll('#page11 input[type="number"]').forEach(input => {
                input.addEventListener('change', updateTotals11);
                input.addEventListener('input', updateTotals11);
            });
            
            // Initial calculation
            updateTotals11();
        });

        // Toast function for page 11
        function showToast(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.getElementById('toast-notification-11');
            if (existingToast) {
                existingToast.remove();
            }
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            
            // Create toast HTML
            const toastHTML = `
                <div id="toast-notification-11" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast11()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to body
            document.body.insertAdjacentHTML('beforeend', toastHTML);
            
            const toast = document.getElementById('toast-notification-11');
            
            // Show toast with animation
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-full');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 10);
            
            // Auto hide after 3 seconds
            setTimeout(() => {
                closeToast11();
            }, 3000);
        }
        
        function closeToast11() {
            const toast = document.getElementById('toast-notification-11');
            if (toast) {
                toast.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }
    </script>
@endpush
@endif