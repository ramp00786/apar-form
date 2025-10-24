{{-- page 3 --}}
<style>
    #page3 input,
    #page3 textarea {
        height: auto;
    }

    #page3 textarea {
        min-height: 100px;
    }

    #page3 input:disabled,
    #page3 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page3 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $duty = \App\Models\Page3Duty::where('form_id', $formId)->first();
    $projects = \App\Models\Page3Project::where('form_id', $formId)->orderBy('id')->get();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page3">

    @if($isReviewingOfficer)
    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn3" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit3()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>

        <button id="saveBtn3" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;"
            onclick="saveChanges3()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>

        <button id="cancelBtn3" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;"
            onclick="cancelEdit3()">
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
    <div class="page-number">-3-</div>

    <div class="part-title">Part-2</div>
    <div class="part-subtitle">To be filled in by the Scientist reported upon</div>
    <div class="part-subtitle">(Please read carefully the instructions before filling the entries)</div>

    <div>
        <strong>1. Brief description of duties.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 360px; padding: 10px;">
                        <textarea id="dutiesTextarea" disabled
                            style="width: 100%; min-height: 330px; border: none; outline: none; resize: vertical;">{{ $duty->duties_description ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>2. Please specify the programs/projects assigned to you and your achievements there to in
            100 words.</strong>

        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreProjectBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addProjectRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>

        <table class="form-table" id="projectsTable">
            <thead>
                <tr>
                    <th style="width: 40%;">Brief description about the Program/Project/Field study.</th>
                    <th style="width: 50%;">Your Achievement there to in 100 words.</th>
                    <th id="projectActionHeader" style="display: none; width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Display existing project data --}}
                @forelse($projects as $project)
                    <tr>
                        <td style="min-height: 180px; padding: 10px;">
                            <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;">{{ $project->project_description }}</textarea>
                        </td>
                        <td style="min-height: 180px; padding: 10px;">
                            <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;">{{ $project->achievement_description }}</textarea>
                        </td>
                        <td class="project-action-cell" style="display: none;">
                            <button type="button" onclick="removeProjectRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @empty
                    {{-- Show empty row if no data --}}
                @endforelse

                {{-- Additional empty rows for new entries --}}
                @for ($i = $projects->count(); $i < 1; $i++)
                    <tr>
                        <td style="min-height: 180px; padding: 10px;">
                            <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;"></textarea>
                        </td>
                        <td style="min-height: 180px; padding: 10px;">
                            <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;"></textarea>
                        </td>
                        <td class="project-action-cell" style="display: none;">
                            <button type="button" onclick="removeProjectRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

</div>

@if ($isReviewingOfficer)
    @push('scripts')
        <script>
            let originalValues3 = {};

            function enableEdit3() {
                // Store original values before editing
                const inputs = document.querySelectorAll('#page3 input, #page3 textarea');
                originalValues3 = {};
                inputs.forEach((input, index) => {
                    originalValues3[index] = input.value;
                });

                // Hide edit button, show save and cancel buttons
                document.getElementById('editBtn3').style.display = 'none';
                document.getElementById('saveBtn3').style.display = 'inline-block';
                document.getElementById('cancelBtn3').style.display = 'inline-block';

                // Show Add More button and Action column
                document.getElementById('addMoreProjectBtn').style.display = 'block';
                document.getElementById('projectActionHeader').style.display = 'table-cell';

                document.querySelectorAll('.project-action-cell').forEach(cell => {
                    cell.style.display = 'table-cell';
                });

                // Enable all input fields in page3
                inputs.forEach(input => {
                    input.disabled = false;
                });
            }

            function saveChanges3() {
                const formData = {};

                // Collect Duties Description
                const dutiesTextarea = document.getElementById('dutiesTextarea');
                const dutiesDescription = dutiesTextarea ? dutiesTextarea.value.trim() : '';

                // Collect Projects Data
                const projectRows = document.querySelectorAll('#projectsTable tbody tr');
                const projects = [];

                projectRows.forEach(row => {
                    const textareas = row.querySelectorAll('textarea');
                    if (textareas.length >= 2) {
                        const projectDescription = textareas[0].value.trim();
                        const achievementDescription = textareas[1].value.trim();

                        if (projectDescription || achievementDescription) {
                            projects.push({
                                project_description: projectDescription,
                                achievement_description: achievementDescription
                            });
                        }
                    }
                });

                // Prepare form data
                formData.duties_description = dutiesDescription;
                formData.projects = projects;
                formData._token = '{{ csrf_token() }}';

                console.log('Sending data:', formData); // Debug log

                // Send AJAX request
                fetch('{{ route('forms.page3.update', $form->id) }}', {
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
                            document.getElementById('editBtn3').style.display = 'inline-block';
                            document.getElementById('saveBtn3').style.display = 'none';
                            document.getElementById('cancelBtn3').style.display = 'none';

                            // Hide Add More button and Action column
                            document.getElementById('addMoreProjectBtn').style.display = 'none';
                            document.getElementById('projectActionHeader').style.display = 'none';

                            document.querySelectorAll('.project-action-cell').forEach(cell => {
                                cell.style.display = 'none';
                            });

                            // Disable all input fields in page3
                            const inputs = document.querySelectorAll('#page3 input, #page3 textarea');
                            inputs.forEach(input => {
                                input.disabled = true;
                            });

                            showToast('Page 3 data saved successfully!');
                        } else {
                            showToast('Error saving changes: ' + data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('An error occurred while saving changes.', 'error');
                    });
            }

            function cancelEdit3() {
                // Hide save and cancel buttons, show edit button
                document.getElementById('editBtn3').style.display = 'inline-block';
                document.getElementById('saveBtn3').style.display = 'none';
                document.getElementById('cancelBtn3').style.display = 'none';

                // Hide Add More button and Action column
                document.getElementById('addMoreProjectBtn').style.display = 'none';
                document.getElementById('projectActionHeader').style.display = 'none';

                document.querySelectorAll('.project-action-cell').forEach(cell => {
                    cell.style.display = 'none';
                });

                // Restore original values and disable inputs
                const inputs = document.querySelectorAll('#page3 input, #page3 textarea');
                inputs.forEach((input, index) => {
                    input.value = originalValues3[index] || '';
                    input.disabled = true;
                });
            }

            // Project functions
            function addProjectRow() {
                const tbody = document.querySelector('#projectsTable tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td style="min-height: 180px; padding: 10px;">
                    <textarea style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;"></textarea>
                </td>
                <td style="min-height: 180px; padding: 10px;">
                    <textarea style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;"></textarea>
                </td>
                <td class="project-action-cell">
                    <button type="button" onclick="removeProjectRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                </td>
            `;
                tbody.appendChild(newRow);
            }

            function removeProjectRow(button) {
                const row = button.closest('tr');
                row.remove();
            }

            // Toast function for page 3
            function showToast(message, type = 'success') {
                // Remove existing toast if any
                const existingToast = document.getElementById('toast-notification-3');
                if (existingToast) {
                    existingToast.remove();
                }

                const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';

                // Create toast HTML
                const toastHTML = `
                <div id="toast-notification-3" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast3()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;

                // Add to body
                document.body.insertAdjacentHTML('beforeend', toastHTML);

                const toast = document.getElementById('toast-notification-3');

                // Show toast with animation
                setTimeout(() => {
                    toast.classList.remove('opacity-0', 'translate-x-full');
                    toast.classList.add('opacity-100', 'translate-x-0');
                }, 10);

                // Auto hide after 3 seconds
                setTimeout(() => {
                    closeToast3();
                }, 3000);
            }

            function closeToast3() {
                const toast = document.getElementById('toast-notification-3');
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
