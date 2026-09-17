<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\JobListing;
use App\Models\Application;

class AdminController extends Controller
{
    // عرض لوحة التحكم الرئيسية للأدمن مع الإحصائيات
    public function dashboard()
    {
        $usersCount = User::count();
        $jobsCount = JobListing::count();
        $applicationsCount = Application::count();

        return view('admin.dashboard', compact('usersCount', 'jobsCount', 'applicationsCount'));
    }
}
