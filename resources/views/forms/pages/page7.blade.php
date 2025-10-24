{{-- Page 7 --}}
<style>
    #page7 textarea {
        width: 100%;
        border: 1px solid #ddd;
        padding: 10px;
        resize: vertical;
    }
    #page7 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page7 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page7Data = \App\Models\Page7Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page7">

    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn7" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit7()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn7" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges7()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn7" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit7()">
            {{-- cancel svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>

                <div class="page-number">-7-</div>

                <div style="margin: 20px 0;">
                    <strong>4. Integrity</strong>
                    <p><em>(Please comment on the integrity of the Scientist)</em></p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 200px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="integrity_assessment" rows="6">{{ $page7Data->integrity_assessment ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 30px 0;">
                    <strong>5. Pen Picture by Reporting Officer (in about 100words) on the overall qualities of the
                        Scientist including area of strengths and lesser strength extraordinary achievements, scientific
                        & technical achievements (refer 3 of Part 2) and attitude towards weaker section.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 300px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="pen_picture_reporting" rows="10">{{ $page7Data->pen_picture_reporting ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="margin: 30px 0;">
                    <strong>6. Overall numerical grading on the basis of weightage given in Section A, B and C in Part
                        -3 of the Report.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="height: 150px; padding: 10px; border: 1px solid black;">
                                    <textarea disabled name="overall_numerical_grading" rows="4">{{ $page7Data->overall_numerical_grading ?? '' }}</textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                {{-- Signature section --}}
                <div style="margin-top: 60px; ">
                    <p style="margin-bottom: 20px">Place: _______________________</p>

                    <p>Date: _______________________</p>
                    <br><br>
                    <div class="signature-section">
                        <p><strong>Signature of Reporting Officer</strong></p>
                    </div>
                    <div style="margin-top: 40px;" class="pb-4">
                        <p><strong>Name (in Block Letters): </strong></p>
                        <p class="py-8"><strong>Designation: </strong></p>
                        <p><strong>During the period of report: </strong></p>
                    </div>
                </div>

            </div>

<script>
function enableEdit7() {
    // Enable all textarea fields
    document.querySelectorAll('#page7 textarea').forEach(textarea => {
        textarea.disabled = false;
        textarea.style.backgroundColor = 'white';
    });

    // Show save/cancel buttons, hide edit button
    document.getElementById('editBtn7').style.display = 'none';
    document.getElementById('saveBtn7').style.display = 'inline-block';
    document.getElementById('cancelBtn7').style.display = 'inline-block';
}

function cancelEdit7() {
    // Disable all textarea fields and restore gray background
    document.querySelectorAll('#page7 textarea').forEach(textarea => {
        textarea.disabled = true;
        textarea.style.backgroundColor = 'lightgray';
    });

    // Show edit button, hide save/cancel buttons
    document.getElementById('editBtn7').style.display = 'inline-block';
    document.getElementById('saveBtn7').style.display = 'none';
    document.getElementById('cancelBtn7').style.display = 'none';

    // Reload the page to restore original values
    window.location.reload();
}

function saveChanges7() {
    const formId = {{ $form->id ?? 'null' }};
    
    if (!formId) {
        showToast('Form ID not found', 'error');
        return;
    }

    // Collect all form data
    const formData = {};
    document.querySelectorAll('#page7 textarea[name]').forEach(textarea => {
        formData[textarea.name] = textarea.value;
    });

    // Add form_id to the data
    formData.form_id = formId;

    // Show loading state
    const saveBtn = document.getElementById('saveBtn7');
    const originalText = saveBtn.innerHTML;
    saveBtn.innerHTML = 'Saving...';
    saveBtn.disabled = true;

    // Send AJAX request
    fetch('/form/page7/save', {
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
            showToast('Page 7 data saved successfully!', 'success');
            
            // Disable all textareas and restore gray background
            document.querySelectorAll('#page7 textarea').forEach(textarea => {
                textarea.disabled = true;
                textarea.style.backgroundColor = 'lightgray';
            });
            
            // Show edit button, hide save/cancel buttons
            document.getElementById('editBtn7').style.display = 'inline-block';
            document.getElementById('saveBtn7').style.display = 'none';
            document.getElementById('cancelBtn7').style.display = 'none';
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