<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AparForm;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get forms based on user role
        if ($user->hasAparRole('reviewing_officer')) {
            // Reviewing officers can see all forms
            $forms = AparForm::with('creator')->paginate(10);
        } else {
            // Reporting officers can only see forms they have access to
            $forms = AparForm::with('creator')->paginate(10);
        }

        $stats = [
            'total' => AparForm::count(),
            'draft' => AparForm::where('status', 'draft')->count(),
            'in_progress' => AparForm::where('status', 'in_progress')->count(),
            'completed' => AparForm::where('status', 'completed')->count(),
        ];

        return view('dashboard', compact('forms', 'stats'));
    }
}
