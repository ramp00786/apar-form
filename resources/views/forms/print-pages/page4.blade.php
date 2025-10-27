{{-- page 4 --}}
<style>
    #page4 input,
    #page4 textarea {
        height: auto;
    }

    #page4 textarea {
        min-height: 80px;
    }

    #page4 input:disabled,
    #page4 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page4 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page4Data = \App\Models\Page4Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page4">

    

    {{-- page 4 --}}
    <div class="page-number">-4-</div>
    <div>
        <strong>3. Please state briefly about major publications/reports/Technology transferred/patents
            filed/projects managed/social outreach activities/manpower trained not exceeding in 100
            word.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 150px; padding: 10px;">
                        <textarea id="publicationsReports" disabled
                            style="width: 100%; min-height: 130px; border: none; outline: none; resize: vertical;">{{ $page4Data->publications_reports ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>4. Specific contribution made to different mission of the Government like Atma Nirbhar
            Bharat, Make in India, Swachh Bharat etc., in bullets (50 words.)</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 90px; padding: 10px;">
                        <textarea id="governmentMissions" disabled
                            style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->government_missions ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>5. Please brief about the work done/utilization of GeM portal for procurement of goods and
            services.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 90px; padding: 10px;">
                        <textarea id="gemPortalWork" disabled
                            style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->gem_portal_work ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <strong>6. Please state whether annual return on immovable property for the preceding calendar year
            was filed within the prescribed date i.e 31st January of the year following the calendar year.
            If not the date of filling the return should be given.</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 90px; padding: 10px;">
                        <textarea id="propertyReturnFiling" disabled
                            style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->property_return_filing ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 100px; margin-bottom: 40px;">
        <div class="signature-section">
            <p><strong>Signature of the Scientist Reported Upon</strong></p>
        </div>
        <br>
        <p>Date: ________________</p>
    </div>

</div>
{{-- end page 4 --}}
