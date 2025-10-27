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
