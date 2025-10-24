{{-- page 6 --}}
<style>
    #page6 textarea {
        width: 100%;
        border: 1px solid #ddd;
        padding: 10px;
        resize: vertical;
    }
    #page6 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page6 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page6Data = \App\Models\Page6Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page6">

    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn6" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit6()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn6" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges6()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn6" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit6()">
            {{-- cancel svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>
                <div class="page-number">-6-</div>
                <div class="part-title text-center">GENERAL</div>
                <div class="part-title text-center"><strong>PART-4</strong></div>

                <div style="margin: 20px 0;">
                    <strong>1. Relation with the public (wherever applicable)</strong>
                    <p><em>(Please comment on the Scientist accessibility to the public and responsiveness to their
                            needs)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 400px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="relation_with_public" rows="15">{{ $page6Data->relation_with_public ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 20px 0;">
                    <strong>2. Training</strong>
                    <p><em>(Please give recommendation for training with a view to further improving the effectiveness
                            and capabilities of the Scientist)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 300px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="training_recommendation" rows="10">{{ $page6Data->training_recommendation ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 20px 0;">
                    <strong>3. State of Health</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 200px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="state_of_health" rows="6">{{ $page6Data->state_of_health ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end page 6 --}}

<script>
function enableEdit6() {
    // Enable all textarea fields
    document.querySelectorAll('#page6 textarea').forEach(textarea => {
        textarea.disabled = false;
        textarea.style.backgroundColor = 'white';
    });

    // Show save/cancel buttons, hide edit button
    document.getElementById('editBtn6').style.display = 'none';
    document.getElementById('saveBtn6').style.display = 'inline-block';
    document.getElementById('cancelBtn6').style.display = 'inline-block';
}

function cancelEdit6() {
    // Disable all textarea fields and restore gray background
    document.querySelectorAll('#page6 textarea').forEach(textarea => {
        textarea.disabled = true;
        textarea.style.backgroundColor = 'lightgray';
    });

    // Show edit button, hide save/cancel buttons
    document.getElementById('editBtn6').style.display = 'inline-block';
    document.getElementById('saveBtn6').style.display = 'none';
    document.getElementById('cancelBtn6').style.display = 'none';

    // Reload the page to restore original values
    window.location.reload();
}

function saveChanges6() {
    const formId = {{ $form->id ?? 'null' }};
    
    if (!formId) {
        showToast('Form ID not found', 'error');
        return;
    }

    // Collect all form data
    const formData = {};
    document.querySelectorAll('#page6 textarea[name]').forEach(textarea => {
        formData[textarea.name] = textarea.value;
    });

    // Add form_id to the data
    formData.form_id = formId;

    // Show loading state
    const saveBtn = document.getElementById('saveBtn6');
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = 'Saving...';
    saveBtn.disabled = true;

    // Send AJAX request
    fetch('/form/page6/save', {
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
            showToast('Page 6 data saved successfully!', 'success');
            
            // Disable all textareas and restore gray background
            document.querySelectorAll('#page6 textarea').forEach(textarea => {
                textarea.disabled = true;
                textarea.style.backgroundColor = 'lightgray';
            });
            
            // Show edit button, hide save/cancel buttons
            document.getElementById('editBtn6').style.display = 'inline-block';
            document.getElementById('saveBtn6').style.display = 'none';
            document.getElementById('cancelBtn6').style.display = 'none';
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