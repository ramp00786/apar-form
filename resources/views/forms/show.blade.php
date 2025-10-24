<x-app-layout>
    {{-- add style here --}}
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            line-height: 1.15;
            margin: 0;
            padding: 20px;
            background: white;
        }

        .print-container {
            max-width: 210mm;
            margin: 0 auto;
            background: white;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 13pt;
            font-weight: normal;
            margin: 5px 0;
        }

        .part-title {
            text-align: center;
            font-weight: bold;
            font-size: 13pt;
            margin: 20px 0 10px 0;
        }

        .part-subtitle {
            text-align: center;
            font-size: 13pt;
            margin: 5px 0;
        }

        .section-list {
            margin: 20px 0;
        }

        .section-list ol {
            list-style: decimal;
            padding-left: 20px;
        }

        .section-list li {
            margin: 10px 0;
            font-size: 13pt;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .form-table td,
        .form-table th {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
        }

        .form-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .signature-section {
            margin-top: 30px;
            text-align: right;
        }

        .page-break {
            page-break-before: always;
        }

        .page-number {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
            font-size: 14px;
            color: #c3c3c3;
        }

        ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 3px;
            line-height: 1.3;
        }

        @media print {
            body {
                margin: 0;
            }

            .no-print {
                display: none;
            }

            .page-break {
                page-break-before: always;
            }
        }

        .year-field {
            text-align: right;
            margin-bottom: 20px;
        }

        .evaluation-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .evaluation-table td,
        .evaluation-table th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .evaluation-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .large-text-area {
            min-height: 200px;
            padding: 10px;
        }

        .medium-text-area {
            min-height: 100px;
            padding: 10px;
        }

        .small-text-area {
            min-height: 50px;
            padding: 5px;
        }

        .assessment-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .assessment-table td,
        .assessment-table th {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        .assessment-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .assessment-table .text-center {
            text-align: center;
        }

        .roman-list li {
            list-style-type: lower-roman;
            padding-left: 5px;
        }

        .page-number {
            display: block;
        }
        .my-2{
            margin: 10px 0;
        }
        /* when scrollup make it sticky */
        #pageLinks{
            position: sticky;
            top: 0;
            z-index: 100;
            background: white;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Toast notifications should appear above page links */
        #toast-notification-11 {
            z-index: 1000 !important;
        }
    </style>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight tracking-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M12 4v16m8-8H4" />
                </svg>
                APAR Form - {{ $form->employee_name }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12 bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @php
                $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
                $isReviewingOfficer = auth()->user()->hasAparRole('reviewing_officer');
            @endphp

            {{-- pages header  --}}

            <div class="flex mb-4 gap-2 flex-wrap no-print justify-center" id="pageLinks">
                <label for="" class="px-4 py-2">Pages: </label>
                <a href="#main-page1" class="bg-blue-500 text-white px-4 py-2 rounded"> 1</a>
                <a href="#main-page2" class="bg-blue-500 text-white px-4 py-2 rounded"> 2</a>
                <a href="#main-page3" class="bg-blue-500 text-white px-4 py-2 rounded"> 3</a>
                <a href="#main-page4" class="bg-blue-500 text-white px-4 py-2 rounded"> 4</a>
                <a href="#main-page5" class="bg-blue-500 text-white px-4 py-2 rounded"> 5</a>
                <a href="#main-page6" class="bg-blue-500 text-white px-4 py-2 rounded"> 6</a>
                <a href="#main-page7" class="bg-blue-500 text-white px-4 py-2 rounded"> 7</a>
                <a href="#main-page8" class="bg-blue-500 text-white px-4 py-2 rounded"> 8</a>
                <a href="#main-page9" class="bg-blue-500 text-white px-4 py-2 rounded"> 9</a>
                <a href="#main-page10" class="bg-blue-500 text-white px-4 py-2 rounded"> 10</a>
                <a href="#main-page11" class="bg-blue-500 text-white px-4 py-2 rounded"> 11</a>
                <a href="#main-page12" class="bg-blue-500 text-white px-4 py-2 rounded"> 12</a>
                <a href="#main-page13" class="bg-blue-500 text-white px-4 py-2 rounded"> 13</a>
            </div>
            
            <!-- Employee Information (Part 1) -->
            {{-- page 1 --}}
            <div id="main-page1" class="py-8">
                @include('forms.pages.page1', ['form' => $form])
            </div>

            {{-- page 2 --}}
            <div id="main-page2" class="py-8">
                @include('forms.pages.page2', ['form' => $form])
            </div>

            {{-- page 3 --}}
            <div id="main-page3" class="py-8">
                @include('forms.pages.page3', ['form' => $form])
            </div>

            {{-- page 4 --}}
            <div id="main-page4" class="py-8">
                @include('forms.pages.page4', ['form' => $form])
            </div>

            {{-- page 5 --}}
            <div id="main-page5" class="py-8">
                @include('forms.pages.page5', ['form' => $form])
            </div>

            {{-- page 6 --}}
            <div id="main-page6" class="py-8">
                @include('forms.pages.page6', ['form' => $form])
            </div>

            {{-- page 7 --}}
            <div id="main-page7" class="py-8">
                @include('forms.pages.page7', ['form' => $form])
            </div>

            {{-- page 8 --}}
            <div id="main-page8" class="py-8">
                @include('forms.pages.page8', ['form' => $form])
            </div>

            {{-- page 9 --}}
            <div id="main-page9" class="py-8">
                @include('forms.pages.page9', ['form' => $form])
            </div>

            {{-- page 10 --}}
            <div id="main-page10" class="py-8">
                @include('forms.pages.page10', ['form' => $form])
            </div>

            {{-- page 11 --}}
            <div id="main-page11" class="py-8">
                @include('forms.pages.page11', ['form' => $form])
            </div>

            {{-- page 12 --}}
            <div id="main-page12" class="py-8">
                @include('forms.pages.page12', ['form' => $form])
            </div>

            {{-- page 13 --}}
            <div id="main-page13" class="py-8">
                @include('forms.pages.page13', ['form' => $form])
            </div>

            <div class="bg-white/90 backdrop-blur-md shadow rounded mb-8 p-4 px-8" id="bottom-actions">
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

    </div>


    
</x-app-layout>
