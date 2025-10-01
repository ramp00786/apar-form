<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                User Guide - APAR System
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome Section -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-6">
                    <h1 class="text-3xl font-bold text-white flex items-center gap-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Welcome to APAR System
                    </h1>
                    <p class="text-blue-100 mt-2 text-lg">Annual Performance and Appraisal Report - Complete User Guide</p>
                </div>
                <div class="p-8">
                    <p class="text-gray-700 leading-relaxed text-lg">
                        This comprehensive guide will help you navigate through the APAR system efficiently. Learn how to create, fill, edit, print forms, and manage status updates with step-by-step instructions.
                    </p>
                </div>
            </div>

            <!-- Table of Contents -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Table of Contents
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="#create-form" class="block p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">1</div>
                                <span class="font-semibold text-blue-800">How to Create a Form</span>
                            </div>
                        </a>
                        <a href="#fill-form" class="block p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold">2</div>
                                <span class="font-semibold text-green-800">How to Fill a Form</span>
                            </div>
                        </a>
                        <a href="#edit-form" class="block p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold">3</div>
                                <span class="font-semibold text-purple-800">How to Edit a Form</span>
                            </div>
                        </a>
                        <a href="#print-form" class="block p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold">4</div>
                                <span class="font-semibold text-orange-800">How to Print a Form</span>
                            </div>
                        </a>
                        <a href="#change-status" class="block p-4 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center font-bold">5</div>
                                <span class="font-semibold text-red-800">How to Change Status</span>
                            </div>
                        </a>
                        <a href="#roles-permissions" class="block p-4 bg-indigo-50 hover:bg-indigo-100 rounded-lg transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 bg-indigo-500 text-white rounded-full flex items-center justify-center font-bold">6</div>
                                <span class="font-semibold text-indigo-800">Roles & Permissions</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section 1: How to Create a Form -->
            <div id="create-form" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-blue-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</div>
                        How to Create a Form
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-blue-800 font-semibold">📋 Prerequisites:</p>
                            <p class="text-blue-700 mt-1">Only users with <strong>Reviewing Officer</strong> role can create new APAR forms.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Access the Dashboard</h4>
                                    <p class="text-gray-600">Navigate to the main dashboard by clicking "APAR Dashboard" in the navigation menu.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Click "Create New Form"</h4>
                                    <p class="text-gray-600">Look for the blue "Create New Form" button in the top-right corner of the dashboard.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Fill Required Information</h4>
                                    <p class="text-gray-600">Complete the form with employee details:</p>
                                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                                        <li><strong>Employee Name</strong> (Required)</li>
                                        <li><strong>Designation</strong> (Required)</li>
                                        <li><strong>Report Year</strong> (Required)</li>
                                        <li>Employee ID, Date of Birth, Email, Mobile, etc. (Optional)</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">4</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Submit the Form</h4>
                                    <p class="text-gray-600">Click "Create Form" button to save the new APAR form. You'll be redirected to the form's detail page.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: How to Fill a Form -->
            <div id="fill-form" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-green-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</div>
                        How to Fill a Form
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <p class="text-green-800 font-semibold">📝 Form Structure:</p>
                            <p class="text-green-700 mt-1">APAR forms are divided into multiple parts: Part-3, Part-4, Part-5, and Part-B, each with specific roles and permissions.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Access the Form</h4>
                                    <p class="text-gray-600">From the dashboard, click "View" on any form to access its details page.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Navigate Form Sections</h4>
                                    <p class="text-gray-600">Each form part has specific content:</p>
                                    <div class="mt-2 space-y-2">
                                        <div class="bg-indigo-50 p-3 rounded-lg">
                                            <strong class="text-indigo-700">Part-3:</strong> <span class="text-indigo-600">Numerical grading (1-10 scale) for work output, personal attributes, and functional competency</span>
                                        </div>
                                        <div class="bg-purple-50 p-3 rounded-lg">
                                            <strong class="text-purple-700">Part-4:</strong> <span class="text-purple-600">Reporting officer assessment including public relations, training, health, integrity</span>
                                        </div>
                                        <div class="bg-green-50 p-3 rounded-lg">
                                            <strong class="text-green-700">Part-5:</strong> <span class="text-green-600">Reviewing officer remarks and agreement with reporting officer</span>
                                        </div>
                                        <div class="bg-orange-50 p-3 rounded-lg">
                                            <strong class="text-orange-700">Part-B:</strong> <span class="text-orange-600">Assessment by reporting authority with evaluation parameters</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Fill Section by Section</h4>
                                    <p class="text-gray-600">Click "Edit" button on each section you have permission to modify. Fill out the required fields and click "Save" to store your progress.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: How to Edit a Form -->
            <div id="edit-form" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-purple-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold text-sm">3</div>
                        How to Edit a Form
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <p class="text-purple-800 font-semibold">✏️ Edit Permissions:</p>
                            <p class="text-purple-700 mt-1">Edit permissions are role-based. You can only edit sections relevant to your assigned role.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Toggle Edit Mode</h4>
                                    <p class="text-gray-600">On the form detail page, click the "Edit" button next to any section you want to modify. The section will switch to edit mode with input fields.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Make Changes</h4>
                                    <p class="text-gray-600">Update the fields as needed:</p>
                                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                                        <li>Numerical ratings (1-10 scale)</li>
                                        <li>Text assessments and comments</li>
                                        <li>Checkboxes and dropdown selections</li>
                                        <li>Word count is monitored for pen picture sections</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Save or Cancel</h4>
                                    <p class="text-gray-600">Click "Save" to store changes or "Cancel" to discard modifications and return to view mode.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">4</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Alternative Edit Method</h4>
                                    <p class="text-gray-600">You can also click "Edit" from the dashboard Actions column, which redirects to the form's detail page for inline editing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: How to Print a Form -->
            <div id="print-form" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-orange-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-orange-500 text-white rounded-full flex items-center justify-center font-bold text-sm">4</div>
                        How to Print a Form
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-orange-50 p-4 rounded-lg">
                            <p class="text-orange-800 font-semibold">🖨️ Professional Printing:</p>
                            <p class="text-orange-700 mt-1">Print view generates a 12-page professional document that matches the official APAR format exactly.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Access Print View</h4>
                                    <p class="text-gray-600">There are three ways to access the print function:</p>
                                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                                        <li><strong>From Dashboard:</strong> Click the green "Print" button in the Actions column</li>
                                        <li><strong>From Form Detail:</strong> Click "Print Form" button at the bottom</li>
                                        <li><strong>Direct URL:</strong> Access /forms/{id}/print directly</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Print Preview</h4>
                                    <p class="text-gray-600">The print view opens in a new tab showing:</p>
                                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                                        <li>12 pages with proper page numbers (-2- to -12-)</li>
                                        <li>All form data populated in official format</li>
                                        <li>Print and Close buttons (hidden when printing)</li>
                                        <li>Professional formatting with Times New Roman font</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Print the Document</h4>
                                    <p class="text-gray-600">Click the "🖨️ Print Form" button or use Ctrl+P (Cmd+P on Mac) to open the print dialog. Select your printer and print settings, then print.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">4</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Print Tips</h4>
                                    <div class="bg-yellow-50 p-3 rounded-lg mt-2">
                                        <ul class="list-disc list-inside text-yellow-800 text-sm">
                                            <li>Use A4 paper size for best results</li>
                                            <li>Ensure "Print backgrounds" is enabled for proper styling</li>
                                            <li>Check page margins are set to default</li>
                                            <li>Preview before printing to verify layout</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 5: How to Change Status -->
            <div id="change-status" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-red-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center font-bold text-sm">5</div>
                        How to Change Status
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-red-50 p-4 rounded-lg">
                            <p class="text-red-800 font-semibold">🔄 Status Options:</p>
                            <p class="text-red-700 mt-1">Forms can have three statuses: Draft, In Progress, and Completed. Status changes are tracked and updated in real-time.</p>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">1</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Access Status Dropdown</h4>
                                    <p class="text-gray-600">On the dashboard, locate the Status column in the APAR Forms table. Each form has a colored dropdown showing the current status.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">2</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Select New Status</h4>
                                    <p class="text-gray-600">Click the status dropdown and choose from:</p>
                                    <div class="mt-2 space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded-full">Draft</span>
                                            <span class="text-gray-600">- Form is being prepared or incomplete</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">In Progress</span>
                                            <span class="text-gray-600">- Form is being reviewed or processed</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Completed</span>
                                            <span class="text-gray-600">- Form is finalized and approved</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">3</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Automatic Update</h4>
                                    <p class="text-gray-600">The system automatically saves the status change and shows a success notification. The dropdown color updates immediately to reflect the new status.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0 mt-1">4</div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">Statistics Update</h4>
                                    <p class="text-gray-600">After status change, the dashboard statistics cards update automatically to reflect the new counts for Draft, In Progress, and Completed forms.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 6: Roles & Permissions -->
            <div id="roles-permissions" class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-indigo-800 mb-6 flex items-center gap-2">
                        <div class="w-8 h-8 bg-indigo-500 text-white rounded-full flex items-center justify-center font-bold text-sm">6</div>
                        Roles & Permissions
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="bg-indigo-50 p-4 rounded-lg">
                            <p class="text-indigo-800 font-semibold">🔐 Security & Access Control:</p>
                            <p class="text-indigo-700 mt-1">The APAR system uses role-based access control to ensure data security and proper workflow management.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Reporting Officer -->
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <h4 class="font-bold text-blue-800 text-lg mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Reporting Officer
                                </h4>
                                <p class="text-blue-700 text-sm mb-3">Direct supervisor responsible for employee assessment</p>
                                <div class="space-y-2">
                                    <div class="text-blue-800 font-semibold">✅ Can:</div>
                                    <ul class="list-disc list-inside text-blue-700 text-sm space-y-1">
                                        <li>View and edit Part-3 (Numerical grading)</li>
                                        <li>View and edit Part-4 (General assessment)</li>
                                        <li>View and edit Part-B (Reporting authority assessment)</li>
                                        <li>Change form status</li>
                                        <li>Print forms</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Reviewing Officer -->
                            <div class="bg-green-50 p-6 rounded-lg">
                                <h4 class="font-bold text-green-800 text-lg mb-3 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Reviewing Officer
                                </h4>
                                <p class="text-green-700 text-sm mb-3">Senior authority who reviews and approves assessments</p>
                                <div class="space-y-2">
                                    <div class="text-green-800 font-semibold">✅ Can:</div>
                                    <ul class="list-disc list-inside text-green-700 text-sm space-y-1">
                                        <li>Create new APAR forms</li>
                                        <li>View all form sections</li>
                                        <li>Edit Part-3 & Part-4 (Reviewing authority columns)</li>
                                        <li>View and edit Part-5 (Reviewing officer remarks)</li>
                                        <li>Change form status</li>
                                        <li>Print forms</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="font-semibold text-yellow-800 mb-2">🚫 Access Restrictions:</h4>
                            <ul class="list-disc list-inside text-yellow-700 text-sm space-y-1">
                                <li>Users can only edit sections relevant to their role</li>
                                <li>Initial columns in Part-3 are disabled for all users (administrative use)</li>
                                <li>Form creation is restricted to Reviewing Officers only</li>
                                <li>Permissions are enforced at both frontend and backend levels</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support Section -->
            <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl mb-8">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Need Help?
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center p-6 bg-blue-50 rounded-lg">
                            <svg class="w-12 h-12 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <h3 class="font-bold text-blue-800 mb-2">Documentation</h3>
                            <p class="text-blue-600 text-sm">Refer to this user guide for step-by-step instructions</p>
                        </div>

                        <div class="text-center p-6 bg-green-50 rounded-lg">
                            <svg class="w-12 h-12 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                            <h3 class="font-bold text-green-800 mb-2">Training</h3>
                            <p class="text-green-600 text-sm">Contact your system administrator for additional training</p>
                        </div>

                        <div class="text-center p-6 bg-purple-50 rounded-lg">
                            <svg class="w-12 h-12 text-purple-500 mx-auto mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a.75.75 0 000 1.5m0 0v0m0 0a.75.75 0 000 1.5M12 21a.75.75 0 100-1.5m0 0v0m0 0a.75.75 0 100 1.5M3.172 5.636a.75.75 0 001.061-1.061M18.364 18.364a.75.75 0 001.061 1.061m-16.95 0l.951-.951m16.95.951l-.951-.951"/></svg>
                            <h3 class="font-bold text-purple-800 mb-2">Technical Support</h3>
                            <p class="text-purple-600 text-sm">Report bugs or technical issues to the development team</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Dashboard -->
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-gray-500 to-gray-700 hover:from-gray-600 hover:to-gray-800 text-white font-semibold py-3 px-6 rounded-lg shadow transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"/></svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</x-app-layout>