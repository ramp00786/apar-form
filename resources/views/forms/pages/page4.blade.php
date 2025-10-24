{{-- page 4 --}}
<style>
    #page4 input, #page4 textarea {
        height: auto;
    }
    #page4 textarea {
        min-height: 80px;
    }
    #page4 input:disabled, #page4 textarea:disabled {
        background-color: lightgray;
    }
</style>

{{-- fetch page4 data directly from database --}}
@php
    $formId = request()->route('form')->id ?? $form->id;
    $page4Data = \App\Models\Page4Data::where('form_id', $formId)->first();
@endphp

<div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="page4">

    {{-- Edit/Save/Cancel Buttons --}}
    <div class="flex justify-end py-4">
        <button id="editBtn4" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="enableEdit4()">
            {{-- edit svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Edit
        </button>
        
        <button id="saveBtn4" class="bg-green-500 text-white px-4 py-2 rounded mr-2" style="display: none;" onclick="saveChanges4()">
            {{-- save svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save
        </button>
        
        <button id="cancelBtn4" class="bg-gray-500 text-white px-4 py-2 rounded" style="display: none;" onclick="cancelEdit4()">
            {{-- cancel svg --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </button>
    </div>

                <div class="page-number">-4-</div>
                <div>
                    <strong>3. Please state briefly about major publications/reports/Technology transferred/patents
                        filed/projects managed/social outreach activities/manpower trained not exceeding in 100
                        word.</strong>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td style="min-height: 150px; padding: 10px;">
                                    <textarea id="publicationsReports" disabled style="width: 100%; min-height: 130px; border: none; outline: none; resize: vertical;">{{ $page4Data->publications_reports ?? '' }}</textarea>
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
                                    <textarea id="governmentMissions" disabled style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->government_missions ?? '' }}</textarea>
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
                                    <textarea id="gemPortalWork" disabled style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->gem_portal_work ?? '' }}</textarea>
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
                                    <textarea id="propertyReturnFiling" disabled style="width: 100%; min-height: 70px; border: none; outline: none; resize: vertical;">{{ $page4Data->property_return_filing ?? '' }}</textarea>
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

@push('scripts')
    <script>
        let originalValues4 = {};
        
        function enableEdit4() {
            // Store original values before editing
            const inputs = document.querySelectorAll('#page4 input, #page4 textarea');
            originalValues4 = {};
            inputs.forEach((input, index) => {
                originalValues4[index] = input.value;
            });
            
            // Hide edit button, show save and cancel buttons
            document.getElementById('editBtn4').style.display = 'none';
            document.getElementById('saveBtn4').style.display = 'inline-block';
            document.getElementById('cancelBtn4').style.display = 'inline-block';
            
            // Enable all textarea fields in page4 (excluding signature and date)
            document.getElementById('publicationsReports').disabled = false;
            document.getElementById('governmentMissions').disabled = false;
            document.getElementById('gemPortalWork').disabled = false;
            document.getElementById('propertyReturnFiling').disabled = false;
        }
        
        function saveChanges4() {
            const formData = {};
            
            // Collect all textarea data
            formData.publications_reports = document.getElementById('publicationsReports').value.trim();
            formData.government_missions = document.getElementById('governmentMissions').value.trim();
            formData.gem_portal_work = document.getElementById('gemPortalWork').value.trim();
            formData.property_return_filing = document.getElementById('propertyReturnFiling').value.trim();
            formData._token = '{{ csrf_token() }}';

            console.log('Sending data:', formData); // Debug log

            // Send AJAX request
            fetch('{{ route('forms.page4.update', $form->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server response:', data); // Debug log
                if (data.success) {
                    // Hide save and cancel buttons, show edit button
                    document.getElementById('editBtn4').style.display = 'inline-block';
                    document.getElementById('saveBtn4').style.display = 'none';
                    document.getElementById('cancelBtn4').style.display = 'none';
                    
                    // Disable all textarea fields in page4
                    document.getElementById('publicationsReports').disabled = true;
                    document.getElementById('governmentMissions').disabled = true;
                    document.getElementById('gemPortalWork').disabled = true;
                    document.getElementById('propertyReturnFiling').disabled = true;
                    
                    showToast('Page 4 data saved successfully!');
                } else {
                    showToast('Error saving changes: ' + data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('An error occurred while saving changes.', 'error');
            });
        }
        
        function cancelEdit4() {
            // Hide save and cancel buttons, show edit button
            document.getElementById('editBtn4').style.display = 'inline-block';
            document.getElementById('saveBtn4').style.display = 'none';
            document.getElementById('cancelBtn4').style.display = 'none';
            
            // Restore original values and disable textareas
            document.getElementById('publicationsReports').value = originalValues4[0] || '';
            document.getElementById('governmentMissions').value = originalValues4[1] || '';
            document.getElementById('gemPortalWork').value = originalValues4[2] || '';
            document.getElementById('propertyReturnFiling').value = originalValues4[3] || '';
            
            document.getElementById('publicationsReports').disabled = true;
            document.getElementById('governmentMissions').disabled = true;
            document.getElementById('gemPortalWork').disabled = true;
            document.getElementById('propertyReturnFiling').disabled = true;
        }

        // Toast function for page 4
        function showToast(message, type = 'success') {
            // Remove existing toast if any
            const existingToast = document.getElementById('toast-notification-4');
            if (existingToast) {
                existingToast.remove();
            }
            
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            
            // Create toast HTML
            const toastHTML = `
                <div id="toast-notification-4" class="fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 opacity-0 transform translate-x-full transition-all duration-300">
                    <div class="flex items-center">
                        <span class="text-sm font-medium">${message}</span>
                        <button onclick="closeToast4()" class="ml-4 text-white hover:text-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            
            // Add to body
            document.body.insertAdjacentHTML('beforeend', toastHTML);
            
            const toast = document.getElementById('toast-notification-4');
            
            // Show toast with animation
            setTimeout(() => {
                toast.classList.remove('opacity-0', 'translate-x-full');
                toast.classList.add('opacity-100', 'translate-x-0');
            }, 10);
            
            // Auto hide after 3 seconds
            setTimeout(() => {
                closeToast4();
            }, 3000);
        }
        
        function closeToast4() {
            const toast = document.getElementById('toast-notification-4');
            if (toast) {
                toast.classList.add('opacity-0', 'translate-x-full');
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }
    </script>
@endpush
            {{-- end page 4 --}}