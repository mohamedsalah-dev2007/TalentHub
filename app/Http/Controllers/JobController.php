<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        if (!$company->exists) {
            $company->save();
        }
        
        $jobs = $company->jobs()->latest()->get();
        return view('employer.manage-jobs', compact('company', 'jobs'));
    }

    public function create(): View
    {
        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        if (!$company->exists) {
            $company->save();
        }

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

        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        if (!$company->exists) {
            $company->save();
        }

        $company->jobs()->create($data);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully.');
    }

    public function edit(JobListing $job): View
    {
        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        
        abort_unless($job->company_id === $company->id, 403);
        return view('employer.edit-job', compact('company', 'job'));
    }

    public function update(Request $request, JobListing $job): RedirectResponse
    {
        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        
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
        $company = Company::firstOrNew(
            ['user_id' => auth()->id()],
            ['name' => auth()->user()->name . ' Company']
        );
        
        abort_unless($job->company_id === $company->id, 403);
        $job->delete();
        return back()->with('success', 'Job deleted successfully.');
    }

    public function employeeIndex()
    {
        $jobs = JobListing::with('company')->latest()->get();
        return view('employee.jobs', compact('jobs'));
    }

    public function apply(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        $alreadyApplied = Application::where('user_id', auth()->id())
            ->where('job_listing_id', $id)
            ->exists();

        if ($alreadyApplied) {
            return redirect()->route('employee.jobs')
                ->with('success', 'You have already applied for this job.');
        }

        Application::create([
            'user_id' => auth()->id(),
            'job_listing_id' => $id,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->route('employee.applications')
            ->with('success', 'Application submitted successfully.');
    }

    public function applications()
    {
        $applications = Application::with('jobListing.company')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('employee.applications', compact('applications'));
    }
}