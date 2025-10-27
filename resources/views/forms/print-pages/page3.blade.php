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
