<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// مسارات الداشبورد المحمية لكل دور
Route::middleware(['auth', 'verified'])->group(function () {
    
    // لوحة تحكم الأدمن
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // لوحة تحكم صاحب العمل
    Route::get('/employer/dashboard', function () {
        return view('employer.dashboard');
    })->name('employer.dashboard');

    // لوحة تحكم الموظف/الباحث عن عمل
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');

    // ملف الشخصي المشترك
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';