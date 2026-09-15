@extends('layouts.employer')
@section('content')
<div class="eyebrow">Employer module</div><h1 class="title">Manage Jobs</h1><p class="subtitle">View, edit, or remove the opportunities published by your company.</p>
<div class="section-head"><div><h2 class="section-title">{{ $jobs->count() }} Job Listings</h2></div><a class="btn" href="{{ route('employer.jobs.create') }}">+ Post New Job</a></div>
<div class="card table-card">
@if($jobs->isEmpty())<div class="empty">You have not posted any jobs yet.</div>@else
<table class="table"><thead><tr><th>Title</th><th>Location</th><th>Salary</th><th>Type</th><th>Applications</th><th>Posted</th><th>Actions</th></tr></thead><tbody>
@foreach($jobs as $job)<tr><td><div class="job-title">{{ $job->title }}</div><div class="mini">#{{ $job->id }}</div></td><td>{{ $job->location }}</td><td>{{ $job->salary ?: 'Not specified' }}</td><td><span class="badge pending">{{ $job->job_type }}</span></td><td>{{ $job->applications()->count() }}</td><td>{{ $job->created_at->format('M d, Y') }}</td><td><div class="actions"><a class="btn small secondary" href="{{ route('employer.jobs.edit',$job) }}">Edit</a><form method="POST" action="{{ route('employer.jobs.destroy',$job) }}" onsubmit="return confirm('Delete this job and its applications?')">@csrf @method('DELETE')<button class="btn small danger" type="submit">Delete</button></form></div></td></tr>@endforeach
</tbody></table>@endif
</div>
@endsection
