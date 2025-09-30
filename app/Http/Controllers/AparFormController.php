<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AparForm;

class AparFormController extends Controller
{
    public function index()
    {
        $forms = AparForm::with('creator')->paginate(10);
        return view('forms.index', compact('forms'));
    }

    public function create()
    {
        // Only reviewing officers can create forms
        if (!auth()->user()->hasAparRole('reviewing_officer')) {
            abort(403, 'Only Reviewing Officers can create forms.');
        }

        return view('forms.create');
    }

    public function store(Request $request)
    {
        // Only reviewing officers can create forms
        if (!auth()->user()->hasAparRole('reviewing_officer')) {
            abort(403, 'Only Reviewing Officers can create forms.');
        }

        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'employee_id' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'section_or_group' => 'required|string|max:255',
            'area_of_specialization' => 'required|string|max:255',
            'date_of_joining' => 'required|date',
            'email' => 'required|email|max:255',
            'mobile_no' => 'required|string|max:20',
            'report_year' => 'required|integer|min:2000|max:2100',
            'department' => 'nullable|string|max:255',
        ]);

        $validated['created_by'] = auth()->id();

        $form = AparForm::create($validated);

        return redirect()->route('forms.show', $form)
            ->with('success', 'APAR form created successfully.');
    }

    public function show(AparForm $form)
    {
        $user = auth()->user();
        
        // Check if user has permission to view this form
        // For now, all authenticated users can view forms
        
        return view('forms.show', compact('form'));
    }

    public function edit(AparForm $form)
    {
        return view('forms.edit', compact('form'));
    }

    public function update(Request $request, AparForm $form)
    {
        $request->validate([
            'section' => 'required|in:part_3,part_5,part_b',
        ]);

        $section = $request->input('section');
        $data = $request->except(['_token', '_method', 'section']);

        // Store or update the form data for the specific section
        foreach ($data as $key => $value) {
            AparFormData::updateOrCreate(
                [
                    'apar_form_id' => $form->id,
                    'section' => $section,
                    'field_name' => $key,
                ],
                [
                    'field_value' => $value,
                ]
            );
        }

        return redirect()->route('forms.show', $form)->with('success', 'Form data updated successfully.');
    }

    public function print(AparForm $form)
    {
        // Get all form data organized by sections
        $formData = [
            'part_3' => $form->getFormDataBySection('part_3'),
            'part_5' => $form->getFormDataBySection('part_5'),
            'part_b' => $form->getFormDataBySection('part_b'),
        ];

        return view('forms.print', compact('form', 'formData'));
    }

    private function canEditSection($user, $section)
    {
        switch ($section) {
            case 'part_3':
            case 'part_4':
                return $user->hasAparPermission('edit_part_3') || $user->hasAparPermission('edit_part_4');
            case 'part_5':
                return $user->hasAparPermission('edit_part_5');
            case 'part_b':
                return $user->hasAparPermission('edit_part_b');
            default:
                return false;
        }
    }
}
