<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                APAR Form - {{ $form->employee_name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Employee Information (Part 1) -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-2 text-blue-700 flex items-center gap-2 justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                        PART-1: Identification Information
                    </h3>
                    <p class="text-center text-sm text-gray-600 mb-2">(Furnished by Administration/Custodian)</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div><span class="font-semibold text-gray-700">Name of the Employee:</span> <span class="text-gray-900">{{ $form->employee_name }}</span></div>
                        <div><span class="font-semibold text-gray-700">Designation:</span> <span class="text-gray-900">{{ $form->designation }}</span></div>
                        <div><span class="font-semibold text-gray-700">Employee ID:</span> <span class="text-gray-900">{{ $form->employee_id }}</span></div>
                        <div><span class="font-semibold text-gray-700">Date of Birth:</span> <span class="text-gray-900">{{ $form->date_of_birth->format('d/m/Y') }}</span></div>
                        <div><span class="font-semibold text-gray-700">Section or Group:</span> <span class="text-gray-900">{{ $form->section_or_group }}</span></div>
                        <div><span class="font-semibold text-gray-700">Area of Specialization:</span> <span class="text-gray-900">{{ $form->area_of_specialization }}</span></div>
                        <div><span class="font-semibold text-gray-700">Date of Joining to the Post:</span> <span class="text-gray-900">{{ $form->date_of_joining->format('d/m/Y') }}</span></div>
                        <div><span class="font-semibold text-gray-700">E-mail ID:</span> <span class="text-gray-900">{{ $form->email }}</span></div>
                        <div><span class="font-semibold text-gray-700">Mobile No.:</span> <span class="text-gray-900">{{ $form->mobile_no }}</span></div>
                        <div><span class="font-semibold text-gray-700">Year Of the Report:</span> <span class="text-gray-900">{{ $form->report_year }}</span></div>
                        @if($form->department)
                        <div><span class="font-semibold text-gray-700">Department:</span> <span class="text-gray-900">{{ $form->department }}</span></div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sectioned Form Parts as Accordions -->
            <div class="space-y-8">
                <!-- Part 3 & 4 -->
                @if(auth()->user()->hasAparPermission('view_part_3') || auth()->user()->hasAparPermission('view_part_4'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-indigo-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-3 & 4: Assessment
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_3') || auth()->user()->hasAparPermission('edit_part_4'))
                                <button onclick="editSection('part_3')" class="inline-flex items-center gap-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11.293-11.293a1 1 0 00-1.414-1.414L9 19H3v-6z"/></svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-4">(Assessment by both Reviewing and Reporting Officers)</p>

                        <form id="part_3_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_3">

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Work Output Assessment</label>
                                    <textarea name="work_output" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">{{ $form->getFormDataBySection('part_3')['work_output'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Professional Skills</label>
                                    <textarea name="professional_skills" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">{{ $form->getFormDataBySection('part_3')['professional_skills'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Communication Skills</label>
                                    <textarea name="communication_skills" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">{{ $form->getFormDataBySection('part_3')['communication_skills'] ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_3')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_3_display">
                            @php $part3Data = $form->getFormDataBySection('part_3'); @endphp
                            @if($part3Data->isNotEmpty())
                                <div class="space-y-4">
                                    @if(isset($part3Data['work_output']))
                                        <div><span class="font-semibold text-gray-700">Work Output Assessment:</span><br><span class="text-gray-900">{{ $part3Data['work_output'] }}</span></div>
                                    @endif
                                    @if(isset($part3Data['professional_skills']))
                                        <div><span class="font-semibold text-gray-700">Professional Skills:</span><br><span class="text-gray-900">{{ $part3Data['professional_skills'] }}</span></div>
                                    @endif
                                    @if(isset($part3Data['communication_skills']))
                                        <div><span class="font-semibold text-gray-700">Communication Skills:</span><br><span class="text-gray-900">{{ $part3Data['communication_skills'] }}</span></div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-500">No assessment data available. Click Edit to add information.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Part 5 -->
                @if(auth()->user()->hasAparPermission('view_part_5'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-green-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-5: Reviewing Officer
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_5'))
                                <button onclick="editSection('part_5')" class="inline-flex items-center gap-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11.293-11.293a1 1 0 00-1.414-1.414L9 19H3v-6z"/></svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-4">(Reviewing Officer Only)</p>

                        <form id="part_5_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_5">

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Remarks of the Reviewing Officer</label>
                                    <textarea name="reviewing_remarks" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition">{{ $form->getFormDataBySection('part_5')['reviewing_remarks'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Overall Assessment</label>
                                    <textarea name="overall_assessment" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition">{{ $form->getFormDataBySection('part_5')['overall_assessment'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Numerical Grading</label>
                                    <input type="number" name="numerical_grading" min="1" max="10" step="0.1" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-green-500 focus:ring-2 focus:ring-green-200 transition" value="{{ $form->getFormDataBySection('part_5')['numerical_grading'] ?? '' }}">
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_5')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_5_display">
                            @php $part5Data = $form->getFormDataBySection('part_5'); @endphp
                            @if($part5Data->isNotEmpty())
                                <div class="space-y-4">
                                    @if(isset($part5Data['reviewing_remarks']))
                                        <div><span class="font-semibold text-gray-700">Reviewing Officer Remarks:</span><br><span class="text-gray-900">{{ $part5Data['reviewing_remarks'] }}</span></div>
                                    @endif
                                    @if(isset($part5Data['overall_assessment']))
                                        <div><span class="font-semibold text-gray-700">Overall Assessment:</span><br><span class="text-gray-900">{{ $part5Data['overall_assessment'] }}</span></div>
                                    @endif
                                    @if(isset($part5Data['numerical_grading']))
                                        <div><span class="font-semibold text-gray-700">Numerical Grading:</span> <span class="text-gray-900">{{ $part5Data['numerical_grading'] }}/10</span></div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-500">No reviewing officer data available. Click Edit to add information.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Part B -->
                @if(auth()->user()->hasAparPermission('view_part_b'))
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-orange-700 flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                                PART-B: Reporting Officer
                            </h3>
                            @if(auth()->user()->hasAparPermission('edit_part_b'))
                                <button onclick="editSection('part_b')" class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white font-semibold py-1.5 px-4 rounded-lg shadow transition-all duration-200 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11.293-11.293a1 1 0 00-1.414-1.414L9 19H3v-6z"/></svg>
                                    Edit
                                </button>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-4">(Assessment by the Reporting Authority - Reporting Officer Only)</p>

                        <form id="part_b_form" method="POST" action="{{ route('forms.update', $form) }}" style="display: none;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="section" value="part_b">

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Do you agree with the evaluation parameters suggested by the Officer?</label>
                                    <select name="agree_evaluation" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">
                                        <option value="">Select...</option>
                                        <option value="yes" {{ ($form->getFormDataBySection('part_b')['agree_evaluation'] ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no" {{ ($form->getFormDataBySection('part_b')['agree_evaluation'] ?? '') == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Short summary of the innovative content of the work done</label>
                                    <textarea name="innovative_summary" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['innovative_summary'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Exceptional contribution for which officer can be considered under exceptionally meritorious category</label>
                                    <textarea name="exceptional_contribution" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['exceptional_contribution'] ?? '' }}</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Overall assessment of the scientific work</label>
                                    <textarea name="scientific_work_assessment" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition">{{ $form->getFormDataBySection('part_b')['scientific_work_assessment'] ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end gap-2">
                                <button type="button" onclick="cancelEdit('part_b')" class="inline-flex items-center gap-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Cancel</button>
                                <button type="submit" class="inline-flex items-center gap-1 bg-gradient-to-r from-orange-400 to-orange-600 hover:from-orange-500 hover:to-orange-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">Save</button>
                            </div>
                        </form>

                        <div id="part_b_display">
                            @php $partBData = $form->getFormDataBySection('part_b'); @endphp
                            @if($partBData->isNotEmpty())
                                <div class="space-y-4">
                                    @if(isset($partBData['agree_evaluation']))
                                        <div><span class="font-semibold text-gray-700">Agree with evaluation parameters:</span> <span class="text-gray-900">{{ ucfirst($partBData['agree_evaluation']) }}</span></div>
                                    @endif
                                    @if(isset($partBData['innovative_summary']))
                                        <div><span class="font-semibold text-gray-700">Innovative content summary:</span><br><span class="text-gray-900">{{ $partBData['innovative_summary'] }}</span></div>
                                    @endif
                                    @if(isset($partBData['exceptional_contribution']))
                                        <div><span class="font-semibold text-gray-700">Exceptional contribution:</span><br><span class="text-gray-900">{{ $partBData['exceptional_contribution'] }}</span></div>
                                    @endif
                                    @if(isset($partBData['scientific_work_assessment']))
                                        <div><span class="font-semibold text-gray-700">Scientific work assessment:</span><br><span class="text-gray-900">{{ $partBData['scientific_work_assessment'] }}</span></div>
                                    @endif
                                </div>
                            @else
                                <p class="text-gray-500">No reporting officer data available. Click Edit to add information.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Print Form Button -->
            <div class="text-center mt-10 mb-6">
                <a href="{{ route('forms.print', $form) }}" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-purple-700 hover:from-purple-600 hover:to-purple-800 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2z"/></svg>
                    Print Form
                </a>
            </div>

            <!-- Back to Dashboard -->
            <div class="text-center mt-4">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-gray-500 to-gray-700 hover:from-gray-600 hover:to-gray-800 text-white font-semibold py-2 px-6 rounded-lg shadow transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <script>
        function editSection(section) {
            document.getElementById(section + '_display').style.display = 'none';
            document.getElementById(section + '_form').style.display = 'block';
        }

        function cancelEdit(section) {
            document.getElementById(section + '_form').style.display = 'none';
            document.getElementById(section + '_display').style.display = 'block';
        }
    </script>
</x-app-layout>