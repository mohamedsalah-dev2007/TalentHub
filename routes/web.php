<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// مسارات الأدمن المحمية حصرياً (مصادقة + توثيق + صلاحية أدمن)
Route::middleware(['auth', 'verified', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // مسار لوحة التحكم الرئيسية للأدمن مع الإحصائيات
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // مسارات إدارة المستخدمين (UserController)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // مسارات إدارة الوظائف (JobController)
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');

    // مسارات طلبات التوظيف (ApplicationController)
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::put('/applications/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

// مسارات الداشبورد العامة والأدوار الأخرى والملف الشخصي
Route::middleware(['auth', 'verified'])->group(function () {

    // لوحة تحكم صاحب العمل
    Route::get('/employer/dashboard', function () {
        return view('employer.dashboard');
    })->name('employer.dashboard');

    // لوحة تحكم الموظف/الباحث عن عمل
    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');

    // الملف الشخصي المشترك
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';