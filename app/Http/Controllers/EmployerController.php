<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployerController extends Controller
{
    public function dashboard(): View
    {
        $company = Company::first() ?? Company::create([
            'name' => auth()->user()->name . ' Company',
        ]);
        
        $jobsCount = method_exists($company, 'jobs') ? $company->jobs()->count() : 0;
        $applicationsCount = Application::count();
        $pendingCount = Application::where('status', 'pending')->count();
        $recentJobs = method_exists($company, 'jobs') ? $company->jobs()->latest()->take(5)->get() : collect();

        return view('employer.dashboard', compact('company', 'jobsCount', 'applicationsCount', 'pendingCount', 'recentJobs'));
    }

    public function companyEdit(): View
    {
        $company = Company::first() ?? Company::create([
            'name' => auth()->user()->name . ' Company',
        ]);
        return view('employer.company-profile', compact('company'));
    }

    public function companyUpdate(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $company = Company::first();
        if ($company) {
            $company->update($data);
        }

        return back()->with('success', 'Company profile updated successfully.');
    }

    public function applicants(): View
    {
        $company = Company::first() ?? Company::create([
            'name' => auth()->user()->name . ' Company',
        ]);
        $applications = Application::with(['user', 'jobListing'])->latest()->get();

        return view('employer.applicants', compact('applications', 'company'));
    }

    public function updateApplicationStatus(Request $request, Application $application): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:accepted,rejected,pending']]);
        
        $application->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated.');
    }
}