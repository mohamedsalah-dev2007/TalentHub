@extends('layouts.employer')
@section('content')
<div class="eyebrow">Recruitment</div><h1 class="title">View Applicants</h1><p class="subtitle">Review candidates for your company's job listings and make hiring decisions.</p>
<div class="card table-card">
@if($applications->isEmpty())<div class="empty">No applications have been submitted to your jobs yet.</div>@else
<table class="table"><thead><tr><th>Applicant</th><th>Job</th><th>Resume</th><th>Cover Letter</th><th>Status</th><th>Decision</th></tr></thead><tbody>
@foreach($applications as $application)
<tr><td><div class="job-title">{{ $application->user->name }}</div><div class="mini">{{ $application->user->email }}</div></td><td>{{ $application->jobListing->title }}</td><td>@if($application->resume)<a class="link" target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($application->resume) }}">View Resume ↗</a>@elseif($application->user->cv_path)<a class="link" target="_blank" href="{{ \Illuminate\Support\Facades\Storage::url($application->user->cv_path) }}">View CV ↗</a>@else<span class="muted">Not uploaded</span>@endif</td><td><div class="cover">{{ $application->cover_letter ?: 'No cover letter provided.' }}</div></td><td><span class="badge {{ $application->status }}">{{ ucfirst($application->status) }}</span></td><td><div class="actions"><form method="POST" action="{{ route('employer.applications.status',$application) }}">@csrf @method('PATCH')<input type="hidden" name="status" value="accepted"><button class="btn small" type="submit">Accept</button></form><form method="POST" action="{{ route('employer.applications.status',$application) }}">@csrf @method('PATCH')<input type="hidden" name="status" value="rejected"><button class="btn small danger" type="submit">Reject</button></form></div></td></tr>
@endforeach
</tbody></table>@endif
</div>
@endsection
