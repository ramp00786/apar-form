{{-- page 1 --}}
<style>
    #page1 input{
        height: 25px;
    }
    #page1 input:disabled{
        background-color: lightgray;
    }
    
</style>

{{-- fetch education data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $educations = \App\Models\Page1Education::where('form_id', $formId)->orderBy('id')->get();
@endphp


<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page1">
    <!-- Page Number -->
    <div class="page-number">-1-</div>



    <!-- Year Field -->
    <div class="year-field">
        <strong>YEAR: {{ $form->report_year }}</strong>
    </div>
    <!-- Header -->
    <div class="header">
        <h1>GOVERNMENT OF INDIA</h1>
        <h1>DEPARTMENT OF MINISTRY OF EARTH SCIENCES</h1>
        <h1>REVISED ANNUAL PERFORMANCE AND APPRAISAL REPORT</h1>
        <h1>FORMAT FOR SCIENTISTS WORKING IN INSTITUTE AS WELL AS THE MINISTRIES/DEPARTMENTS</h1>
        <h1>INDIAN INSTITUTE OF TROPICAL METEOROLOGY, PUNE</h1>
    </div>

    <div class="part-title">PART-1</div>
    <div class="part-subtitle">(The information should be furnished by the Administration/Custodian)</div>
    <div class="part-subtitle">(Identification Information)</div>

    <div class="section-list" id="personalData">
        <ol>
            <li>Name of the Employee: <input type="text" disabled value="{{ $form->employee_name }}"></li>
            <li>Designation: <input type="text" disabled value="{{ $form->designation }}"></li>
            <li>Employee ID: <input type="text" disabled value="{{ $form->employee_id ?: '' }}"></li>
            <li>Date of Birth:
                <input type="text" disabled
                    value="{{ $form->date_of_birth ? $form->date_of_birth->format('d/m/Y') : '' }}">
            </li>
            <li>Section or Group: <input type="text" disabled value="{{ $form->section_or_group ?: '' }}"></li>
            <li>Area of Specialization: <input type="text" disabled value="{{ $form->area_of_specialization ?: '' }}"></li>
            <li>Date of Joining to the Post:
                <input type="text" disabled
                    value="{{ $form->date_of_joining ? $form->date_of_joining->format('d/m/Y') : '' }}">
            </li>
            <li>E-mail ID: <input type="text" disabled value="{{ $form->email ?: '' }}"></li>
            <li>Mobile No.: <input type="text" disabled value="{{ $form->mobile_no ?: '' }}"></li>
            <li>Year Of the Report: <input type="text" disabled value="{{ $form->report_year }}"></li>
            
        </ol>
    </div>

    <!-- Educational Attainments Table -->
    <div>
        <strong>11. Educational Attainments:</strong>
        
        <!-- Add More Button (only visible in edit mode) -->
        <div id="addMoreBtn" style="display: none;" class="my-2">
            <button type="button" onclick="addEducationRow()" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add More
            </button>
        </div>
        
        <table class="form-table" id="page1Educations">
            <thead>
                <tr>
                    <th>Qualification</th>
                    <th>Year</th>
                    <th>University / Institute</th>
                    <th>Remark</th>
                    <th id="actionHeader" style="display: none;">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Display existing education data --}}
                @forelse($educations as $education)
                    <tr>
                        <td><input type="text" disabled value="{{ $education->qualification }}"></td>
                        <td><input type="text" disabled value="{{ $education->year }}"></td>
                        <td><input type="text" disabled value="{{ $education->university }}"></td>
                        <td><input type="text" disabled value="{{ $education->remark }}"></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @empty
                    {{-- Show empty rows if no data --}}
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endforelse
                
                {{-- Additional empty rows for new entries --}}
                @for($i = $educations->count(); $i < 6; $i++)
                    <tr>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td><input type="text" disabled value=""></td>
                        <td class="action-cell" style="display: none;">
                            <button type="button" onclick="removeEducationRow(this)" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Remove</button>
                        </td>
                    </tr>
                @endfor
                {{-- dynamic fields for add more --}}
            </tbody>
        </table>
    </div>
</div>
