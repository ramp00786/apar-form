{{-- page 9 --}}
<style>
    #page9 textarea {
        width: 100%;
        border: 1px solid #ddd;
        padding: 10px;
        resize: vertical;
    }
    #page9 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page9 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page9Data = \App\Models\Page9Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page9">

    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn9" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit9()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn9" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges9()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn9" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit9()">
            {{-- cancel svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>
                <!-- Page 9: ANNUAL WORK REPORT (Self-Assessment) -->
                <div class="page-number">-9-</div>
                <div class="part-title">ANNUAL WORK REPORT</div>
                <div class="part-subtitle"><u>Self-Assessment by the officer reported upon</u></div>

                <div class="section-list">
                    <ol>
                        <li><strong>Name: {{ $form->employee_name }}</strong></li>
                        <li><strong>Designation: {{ $form->designation }}</strong></li>
                        <li><strong>Area of S&T function: {{ $form->area_of_specialization ?: 'N/A' }}</strong></li>
                    </ol>
                </div>

                <div class="part-title"><u>Part A</u></div>

                <div>
                    <strong>4. One page summary of the scientific and technical elements in the work done during the
                        financial Year:</strong>

                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 50px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="scientific_technical_summary" rows="2">{{ $page9Data->scientific_technical_summary ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>4. a. New Initiative taken:</strong></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 150px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="new_initiatives" rows="5">{{ $page9Data->new_initiatives ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>4. b. S&T content of the work done:</strong></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 150px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="st_content_work" rows="5">{{ $page9Data->st_content_work ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p><strong>4. c. Innovation content of the work done:</strong></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 150px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="innovation_content_work" rows="5">{{ $page9Data->innovation_content_work ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

<script>
function enableEdit9() {
    // Enable all textarea fields
    document.querySelectorAll('#page9 textarea').forEach(textarea => {
        textarea.disabled = false;
        textarea.style.backgroundColor = 'white';
    });

    // Show save/cancel buttons, hide edit button
    document.getElementById('editBtn9').style.display = 'none';
    document.getElementById('saveBtn9').style.display = 'inline-block';
    document.getElementById('cancelBtn9').style.display = 'inline-block';
}

function cancelEdit9() {
    // Disable all textarea fields and restore gray background
    document.querySelectorAll('#page9 textarea').forEach(textarea => {
        textarea.disabled = true;
        textarea.style.backgroundColor = 'lightgray';
    });

    // Show edit button, hide save/cancel buttons
    document.getElementById('editBtn9').style.display = 'inline-block';
    document.getElementById('saveBtn9').style.display = 'none';
    document.getElementById('cancelBtn9').style.display = 'none';

    // Reload the page to restore original values
    window.location.reload();
}

function saveChanges9() {
    const formId = {{ $form->id ?? 'null' }};
    
    if (!formId) {
        showToast('Form ID not found', 'error');
        return;
    }

    // Collect all form data
    const formData = {};
    document.querySelectorAll('#page9 textarea[name]').forEach(textarea => {
        formData[textarea.name] = textarea.value;
    });

    // Add form_id to the data
    formData.form_id = formId;

    // Show loading state
    const saveBtn = document.getElementById('saveBtn9');
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = 'Saving...';
    saveBtn.disabled = true;

    // Send AJAX request
    fetch('/form/page9/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast('Page 9 data saved successfully!', 'success');
            
            // Disable all textareas and restore gray background
            document.querySelectorAll('#page9 textarea').forEach(textarea => {
                textarea.disabled = true;
                textarea.style.backgroundColor = 'lightgray';
            });
            
            // Show edit button, hide save/cancel buttons
            document.getElementById('editBtn9').style.display = 'inline-block';
            document.getElementById('saveBtn9').style.display = 'none';
            document.getElementById('cancelBtn9').style.display = 'none';
        } else {
            showToast(data.message || 'Error saving data', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error saving data', 'error');
    })
    .finally(() => {
        // Restore button state
        saveBtn.innerHTML = originalText;
        saveBtn.disabled = false;
    });
}
</script>