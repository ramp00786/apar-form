<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AparFormController;
use App\Http\Controllers\Page1Controller;
use App\Http\Controllers\Page2Controller;
use App\Http\Controllers\Page3Controller;
use App\Http\Controllers\Page4Controller;
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
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
