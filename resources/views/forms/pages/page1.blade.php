{{-- page 1 --}}
<style>
    #page1 input{
        height: 25px;
    }
    #page1 input:disabled{
        background-color: lightgray;
    }
</style>

{{-- fetch education data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $educations = \App\Models\Page1Education::where('form_id', $formId)->orderBy('id')->get();
@endphp


<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page1">

    @if($isReviewingOfficer)
    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit()">
            {{-- cancel svg --}}
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

    <div class="section-list" id="personalData">
        <ol>
            <li>Name of the Employee: <input type="text" disabled value="{{ $form->employee_name }}"></li>
            <li>Designation: <input type="text" disabled value="{{ $form->designation }}"></li>
            <li>Employee ID: <input type="text" disabled value="{{ $form->employee_id ?: '' }}"></li>
            <li>Date of Birth:
                <input type="text" disabled
                    value="{{ $form->date_of_birth ? $form->date_of_birth->format('d/m/Y') : '' }}">
            </li>
            <li>Section or Group: <input type="text" disabled value="{{ $form->section_or_group ?: '' }}"></li>
            <li>Area of Specialization: <input type="text" disabled value="{{ $form->area_of_specialization ?: '' }}"></li>
            <li>Date of Joining to the Post:
                <input type="text" disabled
                    value="{{ $form->date_of_joining ? $form->date_of_joining->format('d/m/Y') : '' }}">
            </li>
            <li>E-mail ID: <input type="text" disabled value="{{ $form->email ?: '' }}"></li>
            <li>Mobile No.: <input type="text" disabled value="{{ $form->mobile_no ?: '' }}"></li>
            <li>Year Of the Report: <input type="text" disabled value="{{ $form->report_year }}"></li>
            
        </ol>
    </div>

    <!-- Educational Attainments Table -->
    <div>
        <strong>11. Educational Attainments:</strong>
        
        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addEducationRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>
        
        <table class="form-table" id="page1Educations">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Year</th>
                    <th>University / Institute</th>
                    <th>Remark</th>
                    <th id="actionHeader" style="display: none;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Display existing education data --}}
                @forelse($educations as $education)
                    <tr>
                        <td><input type="text" disabled value="{{ $education->qualification }}"></td>
                        <td><input type="text" disabled value="{{ $education->year }}"></td>
                        <td><input type="text" disabled value="{{ $education->university }}"></td>
                        <td><input type="text" disabled value="{{ $education->remark }}"></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @empty
                    {{-- Show empty rows if no data --}}
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforelse
                
                {{-- Additional empty rows for new entries --}}
                @for($i = $educations->count(); $i < 6; $i++)
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
                {{-- dynamic fields for add more --}}
            </tbody>
        </table>
    </div>
</div>

@if($isReviewingOfficer)
@push('scripts')
    <script>
        let originalValues = {};
        
        function enableEdit() {
            // Store original values before editing
            const inputs = document.querySelectorAll('#page1 input');
            originalValues = {};
            inputs.forEach((input, index) => {
                originalValues[index] = input.value;
            });
            
            // Hide edit button, show save and cancel buttons
            document.getElementById('editBtn').style.display = 'none';
            document.getElementById('saveBtn').style.display = 'inline-block';
            document.getElementById('cancelBtn').style.display = 'inline-block';
            
            // Show Add More button and Action column
            document.getElementById('addMoreBtn').style.display = 'block';
            document.getElementById('actionHeader').style.display = 'table-cell';
            document.querySelectorAll('.action-cell').forEach(cell => {
                cell.style.display = 'table-cell';
            });
            
            // Enable all input fields in page1
            inputs.forEach(input => {
                input.disabled = false;
            });
        }
        
        function saveChanges() {
            // Collect all personal data inputs
            const personalInputs = document.querySelectorAll('#personalData input');
            const formData = {};
            
            // Field names mapping for personal data inputs (in order)
            const fieldNames = [
                'employee_name',
                'designation', 
                'employee_id',
                'date_of_birth',
                'section_or_group',
                'area_of_specialization',
                'date_of_joining',
                'email',
                'mobile_no',
                'report_year'
            ];
            
            // Map inputs to field names
            personalInputs.forEach((input, index) => {
                if (fieldNames[index]) {
                    formData[fieldNames[index]] = input.value;
                }
            });
            
            // Collect education data
            const educationRows = document.querySelectorAll('#page1Educations tbody tr');
            const educations = [];
            
            educationRows.forEach(row => {
                const inputs = row.querySelectorAll('input');
                if (inputs.length >= 4) {
                    const qualification = inputs[0].value.trim();
                    const year = inputs[1].value.trim();
                    const university = inputs[2].value.trim();
                    const remark = inputs[3].value.trim();
                    
                    // Add to educations array if at least one field has data
                    if (qualification || year || university || remark) {
                        educations.push({
                            qualification: qualification,
                            year: year,
                            university: university,
                            remark: remark
                        });
                    }
                }
            });
            
            // Add education data to form data
            formData.educations = educations;
            formData._token = '{{ csrf_token() }}';

            // Send AJAX request
            fetch('{{ route('forms.page1.update', $form->id) }}', {
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
                    document.getElementById('editBtn').style.display = 'inline-block';
                    document.getElementById('saveBtn').style.display = 'none';
                    document.getElementById('cancelBtn').style.display = 'none';
                    
                    // Hide Add More button and Action column
                    document.getElementById('addMoreBtn').style.display = 'none';
                    document.getElementById('actionHeader').style.display = 'none';
                    document.querySelectorAll('.action-cell').forEach(cell => {
                        cell.style.display = 'none';
                    });
                    
                    // Disable all input fields in page1
                    const inputs = document.querySelectorAll('#page1 input');
                    inputs.forEach(input => {
                        input.disabled = true;
                    });
                    
                    // alert('Changes saved successfully!');
                    showToast('Changes saved successfully!');
                } else {
                    showToast('Error saving changes: ' + data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while saving changes.', 'error');
            });
        }
        
        function cancelEdit() {
            // Hide save and cancel buttons, show edit button
            document.getElementById('editBtn').style.display = 'inline-block';
            document.getElementById('saveBtn').style.display = 'none';
            document.getElementById('cancelBtn').style.display = 'none';
            
            // Hide Add More button and Action column
            document.getElementById('addMoreBtn').style.display = 'none';
            document.getElementById('actionHeader').style.display = 'none';
            document.querySelectorAll('.action-cell').forEach(cell => {
                cell.style.display = 'none';
            });
            
            // Restore original values and disable inputs
            const inputs = document.querySelectorAll('#page1 input');
            inputs.forEach((input, index) => {
                input.value = originalValues[index] || '';
                input.disabled = true;
            });
        }
        
        function addEducationRow() {
            const tbody = document.querySelector('#page1Educations tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td><input type="text" value=""></td>
                <td class="action-cell">
                    <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
            tbody.appendChild(newRow);
        }
        
        function removeEducationRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        // Simple Tailwind Toast
        function showToast(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.getElementById('toast-notification');
            if (existingToast) {
                existingToast.remove();
            }
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            
            // Create toast HTML
            const toastHTML = `
                <div id="toast-notification" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to body
            document.body.insertAdjacentHTML('beforeend', toastHTML);
            
            const toast = document.getElementById('toast-notification');
            
            // Show toast with animation
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-full');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 10);
            
            // Auto hide after 3 seconds
            setTimeout(() => {
                closeToast();
            }, 3000);
        }
        
        function closeToast() {
            const toast = document.getElementById('toast-notification');
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
