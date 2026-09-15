<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'employer') {
            return redirect()->route('employer.dashboard');
        } else {
            return redirect()->route('employee.dashboard');
        }
    })->name('dashboard');

    Route::get('/admin/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/employee/dashboard', function () { return view('employee.dashboard'); })->name('employee.dashboard');

    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');

    Route::prefix('employer')->name('employer.')->group(function () {
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
        Route::get('/applicants', [EmployerController::class, 'applicants'])->name('applicants');
        Route::patch('/applications/{application}/status', [EmployerController::class, 'updateApplicationStatus'])->name('applications.status');
        Route::get('/company-profile', [EmployerController::class, 'companyEdit'])->name('company.edit');
        Route::put('/company-profile', [EmployerController::class, 'companyUpdate'])->name('company.update');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';