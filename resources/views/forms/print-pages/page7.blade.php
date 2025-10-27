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

    

    {{-- page 7 --}}

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
