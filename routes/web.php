<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AparFormController;
use App\Http\Controllers\Page1Controller;
use App\Http\Controllers\Page2Controller;
use App\Http\Controllers\Page3Controller;
use App\Http\Controllers\Page4Controller;
use App\Http\Controllers\Page5Controller;
use App\Http\Controllers\Page6Controller;
use App\Http\Controllers\Page7Controller;
use App\Http\Controllers\Page8Controller;
use App\Http\Controllers\Page9Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-guide', function () {
        return view('user-guide');
    })->name('user-guide');
    
    Route::resource('forms', AparFormController::class);
    Route::get('/forms/{form}/print', [AparFormController::class, 'print'])->name('forms.print');
    Route::post('/forms/{form}/status', [AparFormController::class, 'updateStatus'])->name('forms.updateStatus');
    
    // Page-specific routes
    Route::post('/forms/{form}/page1', [Page1Controller::class, 'update'])->name('forms.page1.update');
    Route::post('/forms/{form}/page2', [Page2Controller::class, 'update'])->name('forms.page2.update');
    Route::post('/forms/{form}/page3', [Page3Controller::class, 'update'])->name('forms.page3.update');
    Route::post('/forms/{form}/page4', [Page4Controller::class, 'update'])->name('forms.page4.update');
    Route::post('/form/page5/save', [Page5Controller::class, 'save'])->name('forms.page5.save');
    Route::post('/form/page6/save', [Page6Controller::class, 'save'])->name('forms.page6.save');
    Route::post('/form/page7/save', [Page7Controller::class, 'save'])->name('forms.page7.save');
    Route::post('/form/page8/save', [Page8Controller::class, 'save'])->name('forms.page8.save');
    Route::post('/form/page9/save', [Page9Controller::class, 'save'])->name('forms.page9.save');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
