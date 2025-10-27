<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APAR Form - {{ $form->employee_name }}</title>
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
        
        .form-table td, .form-table th {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
        }
        
        .form-table th {
            background: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        
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
            body { margin: 0; }
            .no-print { display: none; }
            .page-break { page-break-before: always; }
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
        
        .evaluation-table td, .evaluation-table th {
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
        
        .assessment-table td, .assessment-table th {
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
        .roman-list li{
            list-style-type: lower-roman;
            padding-left: 5px;
        }
        .page-number{
            display: none;
        }
        .print-container input{
            border: none !important;
            font-size: 11pt;
            font-family: "Times New Roman", serif;
            background: transparent !important;
            width: auto !important;
            color: #000 !important;
            font-weight: 600 !important;
        }

        .print-container textarea{
            border: none !important;
            font-size: 11pt;
            font-family: "Times New Roman", serif;
            background: transparent !important;
            width: 100% !important;
            resize: none !important;
            color: #000 !important;
            font-weight: 600 !important;
        }

        /* p-4 px-8 */
        .p-4{
            padding: 1rem !important;
        }
        .px-8{
            padding-left: 2rem !important;
            padding-right: 2rem !important;
        }
    </style>
</head>
<body>
    <div class="print-container">
        <!-- Print Button (hidden in print) -->
        <div class="no-print" style="text-align: center; margin-bottom: 20px;">
            <button onclick="window.print()" style="background: #4f46e5; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                🖨️ Print Form
            </button>
            <button onclick="window.close()" style="background: #6b7280; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-left: 10px;">
                ✕ Close
            </button>
        </div>

        @php
            $isReportingOfficer = auth()->user()->hasAparRole('reporting_officer');
            $isReviewingOfficer = auth()->user()->hasAparRole('reviewing_officer');
        @endphp


        {{-- page 1 --}}
            <div id="main-page1" class="py-8">
                @include('forms.print-pages.page1', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 2 --}}
            <div id="main-page2" class="py-8">
                @include('forms.print-pages.page2', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 3 --}}
            <div id="main-page3" class="py-8">
                @include('forms.print-pages.page3', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 4 --}}
            <div id="main-page4" class="py-8">
                @include('forms.print-pages.page4', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 5 --}}
            <div id="main-page5" class="py-8">
                @include('forms.print-pages.page5', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 6 --}}
            <div id="main-page6" class="py-8">
                @include('forms.print-pages.page6', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 7 --}}
            <div id="main-page7" class="py-8">
                @include('forms.print-pages.page7', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 8 --}}
            <div id="main-page8" class="py-8">
                @include('forms.print-pages.page8', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 9 --}}
            <div id="main-page9" class="py-8">
                @include('forms.print-pages.page9', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 10 --}}
            <div id="main-page10" class="py-8">
                @include('forms.print-pages.page10', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 11 --}}
            <div id="main-page11" class="py-8">
                @include('forms.print-pages.page11', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 12 --}}
            <div id="main-page12" class="py-8">
                @include('forms.print-pages.page12', ['form' => $form])
            </div>
            <div class="page-break"></div>
            {{-- page 13 --}}
            <div id="main-page13" class="py-8">
                @include('forms.print-pages.page13', ['form' => $form])
            </div>
    </div>

    
</body>
</html>
        