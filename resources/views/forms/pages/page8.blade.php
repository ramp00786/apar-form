{{-- page 8 --}}
<style>
    #page8 textarea {
        width: 100%;
        border: 1px solid #ddd;
        padding: 10px;
        resize: vertical;
    }

    #page8 textarea:disabled {
        background-color: lightgray;
    }

    #page8 input[type="radio"]:disabled {
        opacity: 0.5;
    }
</style>

{{-- fetch page8 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page8Data = \App\Models\Page8Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page8">

    {{-- Edit/Save/Cancel Buttons --}}
    @if($isReviewingOfficer)
    <div class="flex justify-end py-4">
        <button id="editBtn8" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit8()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>

        <button id="saveBtn8" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;"
            onclick="saveChanges8()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>

        <button id="cancelBtn8" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;"
            onclick="cancelEdit8()">
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

    <div class="page-number">-8-</div>
    <div class="part-title">PART-5</div>

    <div>
        <strong>1. Remarks of the Reviewing Officer</strong>
        <p>Length of Service under the Reviewing Officer.</p>
        <table class="form-table">
            <tbody>
                <tr>
                    <td class="medium-text-area" style="height: 250px; padding: 10px; border: 1px solid black;">
                        <textarea disabled name="reviewing_remarks" rows="10">{{ $page8Data->reviewing_remarks ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>2. Do you agree with the assessment made by the reporting officer with respect to the work
            output and the various attributes in Part-3 & Part-4? Do you agree with the assessment of
            reporting officer? In case you do not agree with any of the numerical assessments of attributes
            please record you assessment on the column provided for you in that section and initial your
            entries.</strong>

        <table class="form-table" style="width: 300px; margin: 10px auto;">
            <tr>
                <td class="text-center">Yes</td>
                <td class="text-center">No</td>
            </tr>
            <tr>
                <td style="height: 30px; text-align: center;">
                    <input type="radio" disabled name="agree_with_reporting_officer" value="yes"
                        {{ ($page8Data->agree_with_reporting_officer ?? '') == 'yes' ? 'checked' : '' }}>
                </td>
                <td style="height: 30px; text-align: center;">
                    <input type="radio" disabled name="agree_with_reporting_officer" value="no"
                        {{ ($page8Data->agree_with_reporting_officer ?? '') == 'no' ? 'checked' : '' }}>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <strong>3. In case of disagreement please specify the reason, is there anything you wish to modify
            or add.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td class="medium-text-area" style="height: 250px; padding: 10px; border: 1px solid black;">
                        <textarea disabled name="disagreement_reason" rows="10">{{ $page8Data->disagreement_reason ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>4. Pen Picture by Reviewing Officer, please comment (in about 100words) on the overall
            qualities of the Scientist including area of strengths and lesser strength scientific &
            technical achievements and attitude towards weaker section.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td class="large-text-area" style="height: 300px; padding: 10px; border: 1px solid black;">
                        <textarea disabled name="pen_picture_reviewing" rows="12">{{ $page8Data->pen_picture_reviewing ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>5. Overall numerical grading on the basis of weightage given in Section A, B and C in Part
            -3 the Report.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td class="small-text-area" style="height: 50px; padding: 10px; border: 1px solid black;">
                        <textarea disabled name="overall_numerical_grading_reviewing" rows="2">{{ $page8Data->overall_numerical_grading_reviewing ?? '' }}</textarea>
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
            <p><strong>Signature of Reviewing Officer</strong></p>
        </div>
        <div style="margin-top: 40px;" class="pb-4">
            <p><strong>Officer Name of Block Letter: </strong></p>
            <p class="py-8"><strong>Designation: </strong></p>
            <p><strong>The period of report: </strong></p>
        </div>
    </div>
</div>

@if($isReviewingOfficer)
<script>
    function enableEdit8() {
        // Enable all textarea fields
        document.querySelectorAll('#page8 textarea').forEach(textarea => {
            textarea.disabled = false;
            textarea.style.backgroundColor = 'white';
        });

        // Enable all radio buttons
        document.querySelectorAll('#page8 input[type="radio"]').forEach(radio => {
            radio.disabled = false;
        });

        // Show save/cancel buttons, hide edit button
        document.getElementById('editBtn8').style.display = 'none';
        document.getElementById('saveBtn8').style.display = 'inline-block';
        document.getElementById('cancelBtn8').style.display = 'inline-block';
    }

    function cancelEdit8() {
        // Disable all textarea fields and restore gray background
        document.querySelectorAll('#page8 textarea').forEach(textarea => {
            textarea.disabled = true;
            textarea.style.backgroundColor = 'lightgray';
        });

        // Disable all radio buttons
        document.querySelectorAll('#page8 input[type="radio"]').forEach(radio => {
            radio.disabled = true;
        });

        // Show edit button, hide save/cancel buttons
        document.getElementById('editBtn8').style.display = 'inline-block';
        document.getElementById('saveBtn8').style.display = 'none';
        document.getElementById('cancelBtn8').style.display = 'none';

        // Reload the page to restore original values
        window.location.reload();
    }

    function saveChanges8() {
        const formId = {{ $form->id ?? 'null' }};

        if (!formId) {
            showToast('Form ID not found', 'error');
            return;
        }

        // Collect all form data
        const formData = {};

        // Collect textarea data
        document.querySelectorAll('#page8 textarea[name]').forEach(textarea => {
            formData[textarea.name] = textarea.value;
        });

        // Collect radio button data
        const checkedRadio = document.querySelector(
            '#page8 input[type="radio"][name="agree_with_reporting_officer"]:checked');
        if (checkedRadio) {
            formData['agree_with_reporting_officer'] = checkedRadio.value;
        }

        // Add form_id to the data
        formData.form_id = formId;

        // Show loading state
        const saveBtn = document.getElementById('saveBtn8');
        const originalText = saveBtn.innerHTML;
        saveBtn.innerHTML = 'Saving...';
        saveBtn.disabled = true;

        // Send AJAX request
        fetch('/form/page8/save', {
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
                    showToast('Page 8 data saved successfully!', 'success');

                    // Disable all textareas and restore gray background
                    document.querySelectorAll('#page8 textarea').forEach(textarea => {
                        textarea.disabled = true;
                        textarea.style.backgroundColor = 'lightgray';
                    });

                    // Disable all radio buttons
                    document.querySelectorAll('#page8 input[type="radio"]').forEach(radio => {
                        radio.disabled = true;
                    });

                    // Show edit button, hide save/cancel buttons
                    document.getElementById('editBtn8').style.display = 'inline-block';
                    document.getElementById('saveBtn8').style.display = 'none';
                    document.getElementById('cancelBtn8').style.display = 'none';
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
@endif
