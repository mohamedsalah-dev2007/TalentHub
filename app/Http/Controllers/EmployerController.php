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
        $company = $this->companyForCurrentUser();
        $jobsCount = $company->jobs()->count();
        $applicationsCount = Application::whereHas('jobListing', fn ($q) => $q->where('company_id', $company->id))->count();
        $pendingCount = Application::whereHas('jobListing', fn ($q) => $q->where('company_id', $company->id))->where('status', 'pending')->count();
        $recentJobs = $company->jobs()->latest()->take(5)->get();

        return view('employer.dashboard', compact('company', 'jobsCount', 'applicationsCount', 'pendingCount', 'recentJobs'));
    }

    public function companyEdit(): View
    {
        $company = $this->companyForCurrentUser();
        return view('employer.company-profile', compact('company'));
    }

    public function companyUpdate(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        $this->companyForCurrentUser()->update($data);

        return back()->with('success', 'Company profile updated successfully.');
    }

    public function applicants(): View
    {
        $company = $this->companyForCurrentUser();
        $applications = Application::with(['user', 'jobListing'])
            ->whereHas('jobListing', fn ($q) => $q->where('company_id', $company->id))
            ->latest()
            ->get();

        return view('employer.applicants', compact('applications', 'company'));
    }

    public function updateApplicationStatus(Request $request, Application $application): RedirectResponse
    {
        $request->validate(['status' => ['required', 'in:accepted,rejected,pending']]);
        $company = $this->companyForCurrentUser();

        abort_unless($application->jobListing && $application->jobListing->company_id === $company->id, 403);

        $application->update(['status' => $request->status]);

        return back()->with('success', 'Application status updated.');
    }

    public function companyForCurrentUser(): Company
    {
        abort_unless(auth()->check() && auth()->user()->role === 'employer', 403);

        return Company::firstOrCreate(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company', 'description' => '', 'location' => '']
        );
    }
}
