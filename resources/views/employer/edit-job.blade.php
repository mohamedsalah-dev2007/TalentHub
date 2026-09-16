@extends('layouts.employer')
@section('content')
<div class="eyebrow">Manage jobs</div><h1 class="title">Edit Job</h1><p class="subtitle">Update the details of your job listing.</p>
<div class="card form-card">
<form method="POST" action="{{ route('employer.jobs.update',$job) }}">@csrf @method('PUT')
<div class="form-grid">
<div class="field"><label class="label">Job Title</label><input class="input" name="title" value="{{ old('title',$job->title) }}" required>@error('title')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Location</label><input class="input" name="location" value="{{ old('location',$job->location) }}" required>@error('location')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Salary</label><input class="input" name="salary" value="{{ old('salary',$job->salary) }}">@error('salary')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Job Type</label><select class="select" name="job_type" required>@foreach(['Full-time','Part-time','Contract','Internship','Remote'] as $type)<option value="{{ $type }}" @selected(old('job_type',$job->job_type)===$type)>{{ $type }}</option>@endforeach</select></div>
<div class="field full"><label class="label">Job Description</label><textarea class="textarea" name="description" required>{{ old('description',$job->description) }}</textarea>@error('description')<div class="error">{{ $message }}</div>@enderror</div>
</div><div class="actions"><button class="btn" type="submit">Save Changes</button><a class="btn secondary" href="{{ route('employer.jobs.index') }}">Cancel</a></div>
</form></div>
@endsection
