{{-- page 2 --}}
<style>
    #page2 input,
    #page2 textarea {
        height: 25px;
    }

    #page2 textarea {
        height: auto;
        min-height: 100px;
    }

    #page2 input:disabled,
    #page2 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page2 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $employmentDetails = \App\Models\Page2EmploymentDetail::where('form_id', $formId)->orderBy('id')->get();
    $qualifications = \App\Models\Page2Qualification::where('form_id', $formId)->orderBy('id')->get();
    $training = \App\Models\Page2Training::where('form_id', $formId)->first();
    $leaveDetails = \App\Models\Page2LeaveDetail::where('form_id', $formId)->orderBy('id')->get();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page2">

    

    <!-- Page Number -->
    <div class="page-number">-2-</div>
    <!-- Employment Details -->
    <div>
        <strong>Employment Details (PDF positions held may be included here)</strong>

        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreEmploymentBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addEmploymentRow()"
                class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>

        <table class="form-table" id="employmentTable">
            <thead>
                <tr>
                    <th>Grade / Post</th>
                    <th>Lab/ Institute</th>
                    <th>Duration (From – To)</th>
                    <th>Remark</th>
                    <th id="employmentActionHeader" style="display: none;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Display existing employment data --}}
                @forelse($employmentDetails as $employment)
                    <tr>
                        <td><input type="text" disabled value="{{ $employment->grade_post }}"></td>
                        <td><input type="text" disabled value="{{ $employment->lab_institute }}"></td>
                        <td><input type="text" disabled value="{{ $employment->duration }}"></td>
                        <td><input type="text" disabled value="{{ $employment->remark }}"></td>
                        <td class="employment-action-cell" style="display: none;">
                            <button type="button" onclick="removeEmploymentRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @empty
                    {{-- Show empty rows if no data --}}
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="employment-action-cell" style="display: none;">
                            <button type="button" onclick="removeEmploymentRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforelse

                {{-- Additional empty rows for new entries --}}
                @for ($i = $employmentDetails->count(); $i < 3; $i++)
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="employment-action-cell" style="display: none;">
                            <button type="button" onclick="removeEmploymentRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Qualifications Acquired During Year -->
    <div>
        <strong>12. Any qualification Acquired during the year of Report:</strong>

        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreQualificationBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addQualificationRow()"
                class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>

        <table class="form-table" id="qualificationTable">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Year</th>
                    <th>University/Institute</th>
                    <th>Remark</th>
                    <th id="qualificationActionHeader" style="display: none;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Display existing qualification data --}}
                @forelse($qualifications as $qualification)
                    <tr>
                        <td><input type="text" disabled value="{{ $qualification->qualification }}"></td>
                        <td><input type="text" disabled value="{{ $qualification->year }}"></td>
                        <td><input type="text" disabled value="{{ $qualification->university_institute }}"></td>
                        <td><input type="text" disabled value="{{ $qualification->remark }}"></td>
                        <td class="qualification-action-cell" style="display: none;">
                            <button type="button" onclick="removeQualificationRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @empty
                    {{-- Show empty rows if no data --}}
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="qualification-action-cell" style="display: none;">
                            <button type="button" onclick="removeQualificationRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforelse

                {{-- Additional empty rows for new entries --}}
                @for ($i = $qualifications->count(); $i < 3; $i++)
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="qualification-action-cell" style="display: none;">
                            <button type="button" onclick="removeQualificationRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Training -->
    <div>
        <strong>13. Any training undergone during the year of Report:</strong>
        <table class="form-table">
            <tbody>
                <tr>
                    <td style="min-height: 180px; padding: 10px;">
                        <textarea disabled style="width: 100%; min-height: 150px; border: none; outline: none; resize: vertical;">{{ $training->training_details ?? '' }}</textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Leave Details -->
    <div>
        <strong>14. Any leave availed during the year of Report:</strong>

        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreLeaveBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addLeaveRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>

        <table class="form-table" id="leaveTable">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Nature of Leave</th>
                    <th>Period</th>
                    <th>No. Of Days</th>
                    <th id="leaveActionHeader" style="display: none;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Default leave types --}}
                @php
                    $defaultLeaves = ['Maternity Leave', 'EL', 'Study Leave', 'CCL'];
                    $existingLeaves = $leaveDetails->pluck('nature_of_leave', 'nature_of_leave')->toArray();
                    $leaveIndex = 0;
                @endphp

                @foreach ($defaultLeaves as $index => $leaveType)
                    @php
                        $existingLeave = $leaveDetails->where('nature_of_leave', $leaveType)->first();
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}.</td>
                        <td><input type="text" disabled value="{{ $leaveType }}"></td>
                        <td><input type="text" disabled value="{{ $existingLeave->period ?? '' }}"></td>
                        <td><input type="number" disabled value="{{ $existingLeave->no_of_days ?? '' }}"></td>
                        <td class="leave-action-cell" style="display: none;">
                            <button type="button" onclick="removeLeaveRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforeach

                {{-- Additional custom leave entries --}}
                @foreach ($leaveDetails->whereNotIn('nature_of_leave', $defaultLeaves) as $leave)
                    <tr>
                        <td>{{ count($defaultLeaves) + $loop->iteration }}.</td>
                        <td><input type="text" disabled value="{{ $leave->nature_of_leave }}"></td>
                        <td><input type="text" disabled value="{{ $leave->period }}"></td>
                        <td><input type="number" disabled value="{{ $leave->no_of_days }}"></td>
                        <td class="leave-action-cell" style="display: none;">
                            <button type="button" onclick="removeLeaveRow(this)"
                                class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
