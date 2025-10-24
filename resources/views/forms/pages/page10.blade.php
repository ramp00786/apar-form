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

    @if($isReviewingOfficer)
    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn10" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit10()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>

        <button id="saveBtn10" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;"
            onclick="saveChanges10()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>

        <button id="cancelBtn10" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;"
            onclick="cancelEdit10()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>
    @else
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm">
                        <strong>Access Restricted:</strong> You do not have permission to edit this section.
                    </p>
                </div>
            </div>
        </div>
    @endif

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

@if ($isReviewingOfficer)
    @push('scripts')
        <script>
            let originalValues10 = {};

            function enableEdit10() {
                // Store original values before editing
                const inputs = document.querySelectorAll('#page10 input, #page10 textarea');
                originalValues10 = {};
                inputs.forEach((input, index) => {
                    originalValues10[index] = input.value;
                });

                // Hide edit button, show save and cancel buttons
                document.getElementById('editBtn10').style.display = 'none';
                document.getElementById('saveBtn10').style.display = 'inline-block';
                document.getElementById('cancelBtn10').style.display = 'inline-block';

                // Show Add More button and Action column
                document.getElementById('addMoreParameterBtn').style.display = 'block';
                document.getElementById('parameterActionHeader').style.display = 'table-cell';

                document.querySelectorAll('.parameter-action-cell').forEach(cell => {
                    cell.style.display = 'table-cell';
                });

                // Enable all input fields in page10
                inputs.forEach(input => {
                    input.disabled = false;
                });
            }

            function saveChanges10() {
                const formData = {};

                // Collect Parameter data
                const parameterRows = document.querySelectorAll('#parameterTable tbody tr');
                const parameters = [];

                parameterRows.forEach((row, index) => {
                    const inputs = row.querySelectorAll('input');
                    const textarea = row.querySelector('textarea');

                    if (inputs.length >= 6 && textarea) {
                        const parameterName = inputs[0].value.trim();
                        const subParameterA = inputs[1].value.trim();
                        const subParameterB = inputs[2].value.trim();
                        const subParameterC = inputs[3].value.trim();
                        const subParameterD = inputs[4].value.trim();
                        const subParameterE = inputs[5].value.trim();
                        const achievementDescription = textarea.value.trim();

                        // Check if any field has content
                        if (parameterName || subParameterA || subParameterB || subParameterC || subParameterD ||
                            subParameterE || achievementDescription) {
                            // Word count validation for achievement description
                            const wordCount = achievementDescription ? achievementDescription.split(/\s+/).filter(
                                word => word.length > 0).length : 0;
                            if (wordCount > 50) {
                                showToast(
                                    `Achievement description in row ${index + 1} exceeds 50 words. Please reduce to 50 words or less.`,
                                    'error');
                                return false;
                            }

                            parameters.push({
                                parameter_name: parameterName,
                                sub_parameters_label: 'Sub Parameters', // Fixed label
                                sub_parameter_a: subParameterA,
                                sub_parameter_b: subParameterB,
                                sub_parameter_c: subParameterC,
                                sub_parameter_d: subParameterD,
                                sub_parameter_e: subParameterE,
                                achievement_description: achievementDescription
                            });
                        }
                    }
                });

                // Prepare form data
                formData.parameters = parameters;
                formData._token = '{{ csrf_token() }}';

                console.log('Sending Page 10 data:', formData); // Debug log

                // Send AJAX request
                fetch('{{ route('forms.page10.update', $form->id) }}', {
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
                            document.getElementById('editBtn10').style.display = 'inline-block';
                            document.getElementById('saveBtn10').style.display = 'none';
                            document.getElementById('cancelBtn10').style.display = 'none';

                            // Hide Add More button and Action column
                            document.getElementById('addMoreParameterBtn').style.display = 'none';
                            document.getElementById('parameterActionHeader').style.display = 'none';

                            document.querySelectorAll('.parameter-action-cell').forEach(cell => {
                                cell.style.display = 'none';
                            });

                            // Disable all input fields in page10
                            const inputs = document.querySelectorAll('#page10 input, #page10 textarea');
                            inputs.forEach(input => {
                                input.disabled = true;
                            });

                            showToast('Page 10 data saved successfully!');
                        } else {
                            showToast('Error saving changes: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while saving changes.', 'error');
                    });
            }

            function cancelEdit10() {
                // Hide save and cancel buttons, show edit button
                document.getElementById('editBtn10').style.display = 'inline-block';
                document.getElementById('saveBtn10').style.display = 'none';
                document.getElementById('cancelBtn10').style.display = 'none';

                // Hide Add More button and Action column
                document.getElementById('addMoreParameterBtn').style.display = 'none';
                document.getElementById('parameterActionHeader').style.display = 'none';

                document.querySelectorAll('.parameter-action-cell').forEach(cell => {
                    cell.style.display = 'none';
                });

                // Restore original values and disable inputs
                const inputs = document.querySelectorAll('#page10 input, #page10 textarea');
                inputs.forEach((input, index) => {
                    input.value = originalValues10[index] || '';
                    input.disabled = true;
                });
            }

            // Parameter functions
            function addParameterRow() {
                const tbody = document.querySelector('#parameterTable tbody');
                const rowCount = tbody.children.length;
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td style="text-align: center; vertical-align: top; padding: 8px;">${rowCount + 1}</td>
                <td style="vertical-align: top; padding: 8px;">
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
                <td style="vertical-align: top; padding: 8px;">
                    <textarea style="width: 100%; min-height: 120px; border: none; outline: none; resize: vertical;"></textarea>
                </td>
                <td class="parameter-action-cell" style="text-align: center; vertical-align: middle;">
                    <button type="button" onclick="removeParameterRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
                tbody.appendChild(newRow);
                updateRowNumbers();
            }

            function removeParameterRow(button) {
                const row = button.closest('tr');
                row.remove();
                updateRowNumbers();
            }

            function updateRowNumbers() {
                const tbody = document.querySelector('#parameterTable tbody');
                const rows = tbody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    const firstCell = row.querySelector('td');
                    if (firstCell) {
                        firstCell.textContent = index + 1;
                    }
                });
            }

            // Toast function for page 10
            function showToast(message, type = 'success') {
                // Remove existing toast if any
                const existingToast = document.getElementById('toast-notification-10');
                if (existingToast) {
                    existingToast.remove();
                }

                const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

                // Create toast HTML
                const toastHTML = `
                <div id="toast-notification-10" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast10()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

                // Add to body
                document.body.insertAdjacentHTML('beforeend', toastHTML);

                const toast = document.getElementById('toast-notification-10');

                // Show toast with animation
                setTimeout(() => {
                    toast.classList.remove('opacity-0', 'translate-x-full');
                    toast.classList.add('opacity-100', 'translate-x-0');
                }, 10);

                // Auto hide after 3 seconds
                setTimeout(() => {
                    closeToast10();
                }, 3000);
            }

            function closeToast10() {
                const toast = document.getElementById('toast-notification-10');
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
