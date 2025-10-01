<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                Create New APAR Form
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Stepper Header -->
                    <div class="flex items-center justify-center mb-8">
                        <div class="flex items-center gap-4">
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-lg">1</div>
                                <span class="mt-2 text-xs text-blue-700 font-semibold">Employee Info</span>
                            </div>
                            <div class="w-10 h-1 bg-blue-200 rounded"></div>
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center font-bold text-lg">2</div>
                                <span class="mt-2 text-xs text-gray-400 font-semibold">Other Details</span>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('forms.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Employee Name -->
                            <div>
                                <label for="employee_name" class="block text-sm font-semibold text-gray-700 mb-1">Name of the Employee <span class="text-red-500">*</span></label>
                                <input type="text" name="employee_name" id="employee_name" required
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('employee_name') }}">
                                @error('employee_name')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Designation -->
                            <div>
                                <label for="designation" class="block text-sm font-semibold text-gray-700 mb-1">Designation <span class="text-red-500">*</span></label>
                                <input type="text" name="designation" id="designation" required
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('designation') }}">
                                @error('designation')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Employee ID -->
                            <div>
                                <label for="employee_id" class="block text-sm font-semibold text-gray-700 mb-1">Employee ID</label>
                                <input type="text" name="employee_id" id="employee_id"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('employee_id') }}">
                                @error('employee_id')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Birth -->
                            <div>
                                <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-1">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('date_of_birth') }}">
                                @error('date_of_birth')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Section or Group -->
                            <div>
                                <label for="section_or_group" class="block text-sm font-semibold text-gray-700 mb-1">Section or Group</label>
                                <input type="text" name="section_or_group" id="section_or_group"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('section_or_group') }}">
                                @error('section_or_group')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Area of Specialization -->
                            <div>
                                <label for="area_of_specialization" class="block text-sm font-semibold text-gray-700 mb-1">Area of Specialization</label>
                                <input type="text" name="area_of_specialization" id="area_of_specialization"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('area_of_specialization') }}">
                                @error('area_of_specialization')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date of Joining -->
                            <div>
                                <label for="date_of_joining" class="block text-sm font-semibold text-gray-700 mb-1">Date of Joining to the Post</label>
                                <input type="date" name="date_of_joining" id="date_of_joining"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('date_of_joining') }}">
                                @error('date_of_joining')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">E-mail ID</label>
                                <input type="email" name="email" id="email"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Mobile No -->
                            <div>
                                <label for="mobile_no" class="block text-sm font-semibold text-gray-700 mb-1">Mobile No.</label>
                                <input type="text" name="mobile_no" id="mobile_no"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('mobile_no') }}">
                                @error('mobile_no')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Report Year -->
                            <div>
                                <label for="report_year" class="block text-sm font-semibold text-gray-700 mb-1">Year Of the Report <span class="text-red-500">*</span></label>
                                <input type="number" name="report_year" id="report_year" required min="2000" max="2100"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('report_year', date('Y')) }}">
                                @error('report_year')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Department (Optional) -->
                            <div>
                                <label for="department" class="block text-sm font-semibold text-gray-700 mb-1">Department</label>
                                <input type="text" name="department" id="department"
                                    class="mt-1 block w-full rounded-lg border border-gray-300 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                    value="{{ old('department') }}">
                                @error('department')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-10 flex justify-end gap-4">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center gap-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                                Cancel
                            </a>
                            <button type="submit"
                                class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                                Create Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>