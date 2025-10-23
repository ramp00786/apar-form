
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
                                                <select onchange="updateStatus({{ $form->id }}, this.value)" 
                                                    style="padding-right: 35px !important;"
                                                    class="px-3 py-1 text-xs font-bold rounded-full border-0 focus:ring-2 focus:ring-blue-500 transition-all
                                                    @if($form->status == 'completed') bg-green-100 text-green-700
                                                    @elseif($form->status == 'in_progress') bg-yellow-100 text-yellow-700
                                                    @else bg-gray-100 text-gray-700
                                                    @endif">
                                                    <option value="draft" {{ $form->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                    <option value="in_progress" {{ $form->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                    <option value="completed" {{ $form->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                </select>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $form->creator->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2">
                                                <a href="{{ route('forms.show', $form) }}" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-900 font-semibold transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    View
                                                </a>
                                                <a href="{{ route('forms.edit', $form) }}" class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-900 font-semibold transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    Edit
                                                </a>
                                                <a href="{{ route('forms.print', $form) }}" target="_blank" class="inline-flex items-center gap-1 text-green-600 hover:text-green-900 font-semibold transition">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2z"/></svg>
                                                    Print
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
    <script>
        function updateStatus(formId, newStatus) {
            // Show loading state
            const select = event.target;
            const originalValue = select.dataset.originalValue || select.value;
            select.disabled = true;
            select.style.opacity = '0.6';

            // Use Laravel's proper URL generation that includes base path
            const url = `{{ route('forms.updateStatus', ':formId') }}`.replace(':formId', formId);

            // Use simple POST approach for maximum compatibility
            const formData = new FormData();
            formData.append('status', newStatus);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.text().then(text => {
                        throw new Error(`HTTP ${response.status}: Failed to update status`);
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Update the select styling based on new status
                    select.className = select.className.replace(/bg-(green|yellow|gray)-100 text-(green|yellow|gray)-700/g, '');
                    
                    if (newStatus === 'completed') {
                        select.className += ' bg-green-100 text-green-700';
                    } else if (newStatus === 'in_progress') {
                        select.className += ' bg-yellow-100 text-yellow-700';
                    } else {
                        select.className += ' bg-gray-100 text-gray-700';
                    }
                    
                    // Show success message
                    showToast('Status updated successfully!', 'success');
                    
                    // Update stats if needed
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    throw new Error(data.message || 'Unknown error occurred');
                }
            })
            .catch(error => {
                // Revert to original value
                select.value = originalValue;
                showToast('Failed to update status. Please try again.', 'error');
            })
            .finally(() => {
                select.disabled = false;
                select.style.opacity = '1';
                select.dataset.originalValue = select.value;
            });
        }

        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 text-white font-semibold transition-all duration-300 transform translate-x-full ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            }`;
            toast.textContent = message;
            
            document.body.appendChild(toast);
            
            // Animate in
            setTimeout(() => {
                toast.style.transform = 'translateX(0)';
            }, 10);
            
            // Animate out and remove
            setTimeout(() => {
                toast.style.transform = 'translateX(full)';
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Store original values on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('select[onchange*="updateStatus"]').forEach(select => {
                select.dataset.originalValue = select.value;
            });
        });
    </script>
</x-app-layout>
