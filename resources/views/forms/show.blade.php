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
            <!-- Employee Information (Part 1) -->
            {{-- page 1 --}}
            @include('forms.pages.page1', ['form' => $form])

            {{-- page 2 --}}
            @include('forms.pages.page2', ['form' => $form])

            {{-- page 3 --}}
            @include('forms.pages.page3', ['form' => $form])


            {{-- page 4 --}}
            @include('forms.pages.page4', ['form' => $form])

            {{-- page 5 --}}
            @include('forms.pages.page5', ['form' => $form])

            {{-- page 6 --}}
            @include('forms.pages.page6', ['form' => $form])

            {{-- page 7 --}}
            @include('forms.pages.page7', ['form' => $form])

            {{-- page 8 --}}
            @include('forms.pages.page8', ['form' => $form])

            {{-- page 9 --}}
            @include('forms.pages.page9', ['form' => $form])

            {{-- page 10 --}}
            @include('forms.pages.page10', ['form' => $form])

            {{-- page 11 --}}
            @include('forms.pages.page11', ['form' => $form])

            {{-- page 12 --}}
            @include('forms.pages.page12', ['form' => $form])


            {{-- page 13 --}}
            @include('forms.pages.page13', ['form' => $form])


        </div>

    </div>

    
</x-app-layout>
