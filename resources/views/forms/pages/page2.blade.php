{{-- page 2 --}}
<style>
    #page2 input, #page2 textarea {
        height: 25px;
    }
    #page2 textarea {
        height: auto;
        min-height: 100px;
    }
    #page2 input:disabled, #page2 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page2 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $employmentDetails = \App\Models\Page2EmploymentDetail::where('form_id', $formId)->orderBy('id')->get();
    $qualifications = \App\Models\Page2Qualification::where('form_id', $formId)->orderBy('id')->get();
    $training = \App\Models\Page2Training::where('form_id', $formId)->first();
    $leaveDetails = \App\Models\Page2LeaveDetail::where('form_id', $formId)->orderBy('id')->get();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page2">

    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn2" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit2()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn2" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges2()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn2" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit2()">
            {{-- cancel svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>

                <!-- Page Number -->
                <div class="page-number">-2-</div>
                <!-- Employment Details -->
                <div>
                    <strong>Employment Details (PDF positions held may be included here)</strong>
                    
                    <!-- Add More Button (only visible in edit mode) -->
                    <div id="addMoreEmploymentBtn" style="display: none;" class="my-2">
                        <button type="button" onclick="addEmploymentRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add More
                        </button>
                    </div>
                    
                    <table class="form-table" id="employmentTable">
                        <thead>
                            <tr>
                                <th>Grade / Post</th>
                                <th>Lab/ Institute</th>
                                <th>Duration (From – To)</th>
                                <th>Remark</th>
                                <th id="employmentActionHeader" style="display: none;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Display existing employment data --}}
                            @forelse($employmentDetails as $employment)
                                <tr>
                                    <td><input type="text" disabled value="{{ $employment->grade_post }}"></td>
                                    <td><input type="text" disabled value="{{ $employment->lab_institute }}"></td>
                                    <td><input type="text" disabled value="{{ $employment->duration }}"></td>
                                    <td><input type="text" disabled value="{{ $employment->remark }}"></td>
                                    <td class="employment-action-cell" style="display: none;">
                                        <button type="button" onclick="removeEmploymentRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @empty
                                {{-- Show empty rows if no data --}}
                                <tr>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td class="employment-action-cell" style="display: none;">
                                        <button type="button" onclick="removeEmploymentRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endforelse
                            
                            {{-- Additional empty rows for new entries --}}
                            @for($i = $employmentDetails->count(); $i < 3; $i++)
                                <tr>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td class="employment-action-cell" style="display: none;">
                                        <button type="button" onclick="removeEmploymentRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Qualifications Acquired During Year -->
                <div>
                    <strong>12. Any qualification Acquired during the year of Report:</strong>
                    
                    <!-- Add More Button (only visible in edit mode) -->
                    <div id="addMoreQualificationBtn" style="display: none;" class="my-2">
                        <button type="button" onclick="addQualificationRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add More
                        </button>
                    </div>
                    
                    <table class="form-table" id="qualificationTable">
                        <thead>
                            <tr>
                                <th>Qualification</th>
                                <th>Year</th>
                                <th>University/Institute</th>
                                <th>Remark</th>
                                <th id="qualificationActionHeader" style="display: none;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Display existing qualification data --}}
                            @forelse($qualifications as $qualification)
                                <tr>
                                    <td><input type="text" disabled value="{{ $qualification->qualification }}"></td>
                                    <td><input type="text" disabled value="{{ $qualification->year }}"></td>
                                    <td><input type="text" disabled value="{{ $qualification->university_institute }}"></td>
                                    <td><input type="text" disabled value="{{ $qualification->remark }}"></td>
                                    <td class="qualification-action-cell" style="display: none;">
                                        <button type="button" onclick="removeQualificationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @empty
                                {{-- Show empty rows if no data --}}
                                <tr>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td class="qualification-action-cell" style="display: none;">
                                        <button type="button" onclick="removeQualificationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endforelse
                            
                            {{-- Additional empty rows for new entries --}}
                            @for($i = $qualifications->count(); $i < 3; $i++)
                                <tr>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td><input type="text" disabled value=""></td>
                                    <td class="qualification-action-cell" style="display: none;">
                                        <button type="button" onclick="removeQualificationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endfor
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
                                    <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;">{{ $training->training_details ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Leave Details -->
                <div>
                    <strong>14. Any leave availed during the year of Report:</strong>
                    
                    <!-- Add More Button (only visible in edit mode) -->
                    <div id="addMoreLeaveBtn" style="display: none;" class="my-2">
                        <button type="button" onclick="addLeaveRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add More
                        </button>
                    </div>
                    
                    <table class="form-table" id="leaveTable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Nature of Leave</th>
                                <th>Period</th>
                                <th>No. Of Days</th>
                                <th id="leaveActionHeader" style="display: none;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Default leave types --}}
                            @php
                                $defaultLeaves = ['Maternity Leave', 'EL', 'Study Leave', 'CCL'];
                                $existingLeaves = $leaveDetails->pluck('nature_of_leave', 'nature_of_leave')->toArray();
                                $leaveIndex = 0;
                            @endphp
                            
                            @foreach($defaultLeaves as $index => $leaveType)
                                @php
                                    $existingLeave = $leaveDetails->where('nature_of_leave', $leaveType)->first();
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}.</td>
                                    <td><input type="text" disabled value="{{ $leaveType }}"></td>
                                    <td><input type="text" disabled value="{{ $existingLeave->period ?? '' }}"></td>
                                    <td><input type="number" disabled value="{{ $existingLeave->no_of_days ?? '' }}"></td>
                                    <td class="leave-action-cell" style="display: none;">
                                        <button type="button" onclick="removeLeaveRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                            
                            {{-- Additional custom leave entries --}}
                            @foreach($leaveDetails->whereNotIn('nature_of_leave', $defaultLeaves) as $leave)
                                <tr>
                                    <td>{{ count($defaultLeaves) + $loop->iteration }}.</td>
                                    <td><input type="text" disabled value="{{ $leave->nature_of_leave }}"></td>
                                    <td><input type="text" disabled value="{{ $leave->period }}"></td>
                                    <td><input type="number" disabled value="{{ $leave->no_of_days }}"></td>
                                    <td class="leave-action-cell" style="display: none;">
                                        <button type="button" onclick="removeLeaveRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

@push('scripts')
    <script>
        let originalValues2 = {};
        
        function enableEdit2() {
            // Store original values before editing
            const inputs = document.querySelectorAll('#page2 input, #page2 textarea');
            originalValues2 = {};
            inputs.forEach((input, index) => {
                originalValues2[index] = input.value;
            });
            
            // Hide edit button, show save and cancel buttons
            document.getElementById('editBtn2').style.display = 'none';
            document.getElementById('saveBtn2').style.display = 'inline-block';
            document.getElementById('cancelBtn2').style.display = 'inline-block';
            
            // Show Add More buttons and Action columns
            document.getElementById('addMoreEmploymentBtn').style.display = 'block';
            document.getElementById('addMoreQualificationBtn').style.display = 'block';
            document.getElementById('addMoreLeaveBtn').style.display = 'block';
            
            document.getElementById('employmentActionHeader').style.display = 'table-cell';
            document.getElementById('qualificationActionHeader').style.display = 'table-cell';
            document.getElementById('leaveActionHeader').style.display = 'table-cell';
            
            document.querySelectorAll('.employment-action-cell, .qualification-action-cell, .leave-action-cell').forEach(cell => {
                cell.style.display = 'table-cell';
            });
            
            // Enable all input fields in page2
            inputs.forEach(input => {
                input.disabled = false;
            });
        }
        
        function saveChanges2() {
            const formData = {};
            
            // Collect Employment Details
            const employmentRows = document.querySelectorAll('#employmentTable tbody tr');
            const employmentDetails = [];
            
            employmentRows.forEach(row => {
                const inputs = row.querySelectorAll('input');
                if (inputs.length >= 4) {
                    const gradePost = inputs[0].value.trim();
                    const labInstitute = inputs[1].value.trim();
                    const duration = inputs[2].value.trim();
                    const remark = inputs[3].value.trim();
                    
                    if (gradePost || labInstitute || duration || remark) {
                        employmentDetails.push({
                            grade_post: gradePost,
                            lab_institute: labInstitute,
                            duration: duration,
                            remark: remark
                        });
                    }
                }
            });
            
            // Collect Qualifications
            const qualificationRows = document.querySelectorAll('#qualificationTable tbody tr');
            const qualifications = [];
            
            qualificationRows.forEach(row => {
                const inputs = row.querySelectorAll('input');
                if (inputs.length >= 4) {
                    const qualification = inputs[0].value.trim();
                    const year = inputs[1].value.trim();
                    const universityInstitute = inputs[2].value.trim();
                    const remark = inputs[3].value.trim();
                    
                    if (qualification || year || universityInstitute || remark) {
                        qualifications.push({
                            qualification: qualification,
                            year: year,
                            university_institute: universityInstitute,
                            remark: remark
                        });
                    }
                }
            });
            
            // Collect Training Details
            const trainingTextarea = document.querySelector('#page2 textarea');
            const trainingDetails = trainingTextarea ? trainingTextarea.value.trim() : '';
            
            // Collect Leave Details
            const leaveRows = document.querySelectorAll('#leaveTable tbody tr');
            const leaveDetails = [];
            
            leaveRows.forEach((row, index) => {
                const inputs = row.querySelectorAll('input');
                if (inputs.length >= 3) {
                    const natureOfLeave = inputs[0].value.trim();
                    const period = inputs[1].value.trim();
                    const noOfDays = inputs[2].value.trim();
                    
                    if (natureOfLeave || period || noOfDays) {
                        leaveDetails.push({
                            nature_of_leave: natureOfLeave,
                            period: period,
                            no_of_days: noOfDays
                        });
                    }
                }
            });
            
            // Prepare form data
            formData.employment_details = employmentDetails;
            formData.qualifications = qualifications;
            formData.training_details = trainingDetails;
            formData.leave_details = leaveDetails;
            formData._token = '{{ csrf_token() }}';

            console.log('Sending data:', formData); // Debug log

            // Send AJAX request
            fetch('{{ route('forms.page2.update', $form->id) }}', {
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
                    document.getElementById('editBtn2').style.display = 'inline-block';
                    document.getElementById('saveBtn2').style.display = 'none';
                    document.getElementById('cancelBtn2').style.display = 'none';
                    
                    // Hide Add More buttons and Action columns
                    document.getElementById('addMoreEmploymentBtn').style.display = 'none';
                    document.getElementById('addMoreQualificationBtn').style.display = 'none';
                    document.getElementById('addMoreLeaveBtn').style.display = 'none';
                    
                    document.getElementById('employmentActionHeader').style.display = 'none';
                    document.getElementById('qualificationActionHeader').style.display = 'none';
                    document.getElementById('leaveActionHeader').style.display = 'none';
                    
                    document.querySelectorAll('.employment-action-cell, .qualification-action-cell, .leave-action-cell').forEach(cell => {
                        cell.style.display = 'none';
                    });
                    
                    // Disable all input fields in page2
                    const inputs = document.querySelectorAll('#page2 input, #page2 textarea');
                    inputs.forEach(input => {
                        input.disabled = true;
                    });
                    
                    showToast2('Page 2 data saved successfully!');
                } else {
                    alert('Error saving changes: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving changes.');
            });
        }
        
        function cancelEdit2() {
            // Hide save and cancel buttons, show edit button
            document.getElementById('editBtn2').style.display = 'inline-block';
            document.getElementById('saveBtn2').style.display = 'none';
            document.getElementById('cancelBtn2').style.display = 'none';
            
            // Hide Add More buttons and Action columns
            document.getElementById('addMoreEmploymentBtn').style.display = 'none';
            document.getElementById('addMoreQualificationBtn').style.display = 'none';
            document.getElementById('addMoreLeaveBtn').style.display = 'none';
            
            document.getElementById('employmentActionHeader').style.display = 'none';
            document.getElementById('qualificationActionHeader').style.display = 'none';
            document.getElementById('leaveActionHeader').style.display = 'none';
            
            document.querySelectorAll('.employment-action-cell, .qualification-action-cell, .leave-action-cell').forEach(cell => {
                cell.style.display = 'none';
            });
            
            // Restore original values and disable inputs
            const inputs = document.querySelectorAll('#page2 input, #page2 textarea');
            inputs.forEach((input, index) => {
                input.value = originalValues2[index] || '';
                input.disabled = true;
            });
        }
        
        // Employment functions
        function addEmploymentRow() {
            const tbody = document.querySelector('#employmentTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td class="employment-action-cell">
                    <button type="button" onclick="removeEmploymentRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
            tbody.appendChild(newRow);
        }
        
        function removeEmploymentRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
        
        // Qualification functions
        function addQualificationRow() {
            const tbody = document.querySelector('#qualificationTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td class="qualification-action-cell">
                    <button type="button" onclick="removeQualificationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
            tbody.appendChild(newRow);
        }
        
        function removeQualificationRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
        
        // Leave functions
        function addLeaveRow() {
            const tbody = document.querySelector('#leaveTable tbody');
            const rowCount = tbody.children.length;
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${rowCount + 1}.</td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="number" value=""></td>
                <td class="leave-action-cell">
                    <button type="button" onclick="removeLeaveRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
            tbody.appendChild(newRow);
        }
        
        function removeLeaveRow(button) {
            const row = button.closest('tr');
            row.remove();
            
            // Update serial numbers
            const tbody = document.querySelector('#leaveTable tbody');
            const rows = tbody.querySelectorAll('tr');
            rows.forEach((row, index) => {
                const firstCell = row.querySelector('td');
                if (firstCell) {
                    firstCell.textContent = (index + 1) + '.';
                }
            });
        }

        // Toast function for page 2
        function showToast2(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.getElementById('toast-notification-2');
            if (existingToast) {
                existingToast.remove();
            }
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            
            // Create toast HTML
            const toastHTML = `
                <div id="toast-notification-2" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast2()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to body
            document.body.insertAdjacentHTML('beforeend', toastHTML);
            
            const toast = document.getElementById('toast-notification-2');
            
            // Show toast with animation
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-full');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 10);
            
            // Auto hide after 3 seconds
            setTimeout(() => {
                closeToast2();
            }, 3000);
        }
        
        function closeToast2() {
            const toast = document.getElementById('toast-notification-2');
            if (toast) {
                toast.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }
    </script>
@endpush