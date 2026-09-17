<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\JobListing;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();

        $myApplicationsCount = Application::where('user_id', $userId)->count();
        
        $pendingApplicationsCount = Application::where('user_id', $userId)->where('status', 'pending')->count();
        
        $availableJobs = JobListing::latest()->take(5)->get();

        return view('employee.dashboard', compact('myApplicationsCount', 'pendingApplicationsCount', 'availableJobs'));
    }
}