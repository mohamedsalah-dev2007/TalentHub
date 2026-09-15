<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        $company = app(EmployerController::class)->companyForCurrentUser();
        $jobs = $company->jobs()->latest()->get();
        return view('employer.manage-jobs', compact('company', 'jobs'));
    }

    public function create(): View
    {
        $company = app(EmployerController::class)->companyForCurrentUser();
        return view('employer.post-job', compact('company'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:10000'],
            'salary' => ['nullable', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'in:Full-time,Part-time,Contract,Internship,Remote'],
        ]);

        $company = app(EmployerController::class)->companyForCurrentUser();
        $company->jobs()->create($data);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully.');
    }

    public function edit(JobListing $job): View
    {
        $company = app(EmployerController::class)->companyForCurrentUser();
        abort_unless($job->company_id === $company->id, 403);
        return view('employer.edit-job', compact('company', 'job'));
    }

    public function update(Request $request, JobListing $job): RedirectResponse
    {
        $company = app(EmployerController::class)->companyForCurrentUser();
        abort_unless($job->company_id === $company->id, 403);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:10000'],
            'salary' => ['nullable', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'job_type' => ['required', 'string', 'in:Full-time,Part-time,Contract,Internship,Remote'],
        ]);

        $job->update($data);
        return redirect()->route('employer.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(JobListing $job): RedirectResponse
    {
        $company = app(EmployerController::class)->companyForCurrentUser();
        abort_unless($job->company_id === $company->id, 403);
        $job->delete();
        return back()->with('success', 'Job deleted successfully.');
    }
}
