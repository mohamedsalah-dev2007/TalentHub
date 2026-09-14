<?php

namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\JobListing;

class JobController extends Controller
{
    public function index()
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
