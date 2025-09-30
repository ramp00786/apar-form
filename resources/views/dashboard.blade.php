
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                    APAR Dashboard
                </span>
                <span class="ml-4 text-base text-gray-500 font-normal">({{ auth()->user()->aparRoles->first()->display_name ?? 'User' }})</span>
            </h2>
            @if(auth()->user()->hasAparRole('reviewing_officer'))
                <a href="{{ route('forms.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-2 px-5 rounded-lg shadow transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
                    Create New Form
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white shadow-lg rounded-xl p-6 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform">
                    <div class="text-3xl font-extrabold">{{ $stats['total'] }}</div>
                    <div class="text-lg mt-2 font-medium">Total Forms</div>
                </div>
                <div class="bg-gradient-to-br from-yellow-300 to-yellow-500 text-white shadow-lg rounded-xl p-6 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform">
                    <div class="text-3xl font-extrabold">{{ $stats['draft'] }}</div>
                    <div class="text-lg mt-2 font-medium">Draft Forms</div>
                </div>
                <div class="bg-gradient-to-br from-orange-400 to-orange-600 text-white shadow-lg rounded-xl p-6 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform">
                    <div class="text-3xl font-extrabold">{{ $stats['in_progress'] }}</div>
                    <div class="text-lg mt-2 font-medium">In Progress</div>
                </div>
                <div class="bg-gradient-to-br from-green-400 to-green-600 text-white shadow-lg rounded-xl p-6 flex flex-col items-center hover:scale-105 hover:shadow-2xl transition-transform">
                    <div class="text-3xl font-extrabold">{{ $stats['completed'] }}</div>
                    <div class="text-lg mt-2 font-medium">Completed</div>
                </div>
            </div>

            <!-- Forms Table -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden">
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-6 text-gray-800 flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/></svg>
                        APAR Forms
                    </h3>

                    @if($forms->count() > 0)
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-indigo-100 to-blue-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Employee Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Employee ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Report Year</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Created By</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($forms as $form)
                                        <tr class="hover:bg-blue-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $form->employee_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $form->employee_id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $form->report_year }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full 
                                                    @if($form->status == 'completed') bg-green-100 text-green-700
                                                    @elseif($form->status == 'in_progress') bg-yellow-100 text-yellow-700
                                                    @else bg-gray-100 text-gray-700
                                                    @endif">
                                                    {{ ucfirst($form->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $form->creator->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
                                                <a href="{{ route('forms.show', $form) }}" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-900 font-semibold transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    View
                                                </a>
                                                <a href="{{ route('forms.edit', $form) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-900 font-semibold transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21h6l11.293-11.293a1 1 0 00-1.414-1.414L9 19H3v-6z"/></svg>
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $forms->links() }}
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No APAR forms found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
