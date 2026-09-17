@extends('layouts.employer')
@section('content')

<div class="eyebrow">Employer workspace</div>
<h1 class="title">Welcome back, {{ auth()->user()->name }}</h1>
<p class="subtitle">Manage your company, publish opportunities, and review applicants from one place.</p>

<div class="grid">
    <div class="card"><div class="stat-label">Active Jobs</div><div class="stat-value">{{ $jobsCount }}</div></div>
    <div class="card"><div class="stat-label">Total Applications</div><div class="stat-value">{{ $applicationsCount }}</div></div>
    <div class="card"><div class="stat-label">Pending Reviews</div><div class="stat-value">{{ $pendingCount }}</div></div>
</div>

<div class="section">
    <div class="section-head"><h2 class="section-title">Your Latest Job Listings</h2><a class="btn" href="{{ route('employer.jobs.create') }}">+ Post New Job</a></div>
    <div class="card table-card">
        @if($recentJobs->isEmpty())
            <div class="empty">No jobs posted yet. Create your first job opportunity.</div>
        @else
            <table class="table"><thead><tr><th>Job</th><th>Location</th><th>Salary</th><th>Type</th><th>Posted</th><th></th></tr></thead><tbody>
            @foreach($recentJobs as $job)
                <tr><td><div class="job-title">{{ $job->title }}</div><div class="mini">{{ $company->name }}</div></td><td>{{ $job->location }}</td><td>{{ $job->salary ?: 'Not specified' }}</td><td><span class="badge pending">{{ $job->job_type }}</span></td><td>{{ $job->created_at->format('M d, Y') }}</td><td><a class="link" href="{{ route('employer.jobs.edit',$job) }}">Edit</a></td></tr>
            @endforeach
            </tbody></table>
        @endif
    </div>
</div>
@endsection