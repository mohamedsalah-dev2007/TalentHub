@extends('layouts.employer')
@section('content')
<div class="eyebrow">Employer module</div><h1 class="title">Post a New Job</h1><p class="subtitle">Create a clear opportunity for candidates to discover and apply.</p>
<div class="card form-card">
<form method="POST" action="{{ route('employer.jobs.store') }}">@csrf
<div class="form-grid">
<div class="field"><label class="label">Job Title</label><input class="input" name="title" value="{{ old('title') }}" placeholder="e.g. Full-Stack Developer" required>@error('title')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Location</label><input class="input" name="location" value="{{ old('location') }}" placeholder="e.g. Cairo, Egypt or Remote" required>@error('location')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Salary</label><input class="input" name="salary" value="{{ old('salary') }}" placeholder="e.g. 20,000 EGP / month">@error('salary')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field"><label class="label">Job Type</label><select class="select" name="job_type" required>@foreach(['Full-time','Part-time','Contract','Internship','Remote'] as $type)<option value="{{ $type }}" @selected(old('job_type','Full-time')===$type)>{{ $type }}</option>@endforeach</select>@error('job_type')<div class="error">{{ $message }}</div>@enderror</div>
<div class="field full"><label class="label">Job Description</label><textarea class="textarea" name="description" placeholder="Describe responsibilities, requirements, and what makes this opportunity great..." required>{{ old('description') }}</textarea>@error('description')<div class="error">{{ $message }}</div>@enderror</div>
</div>
<div class="actions"><button class="btn" type="submit">Publish Job</button><a class="btn secondary" href="{{ route('employer.jobs.index') }}">Cancel</a></div>
</form></div>
@endsection
