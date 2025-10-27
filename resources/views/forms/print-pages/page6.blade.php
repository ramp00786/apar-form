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

    
    {{-- page 6 --}}
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
