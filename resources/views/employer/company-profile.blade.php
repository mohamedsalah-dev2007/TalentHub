@extends('layouts.employer')
@section('content')
<div class="eyebrow">Company settings</div><h1 class="title">Company Profile</h1><p class="subtitle">Keep your company's public information accurate for candidates.</p>
<div class="card company-card"><div class="company-logo">{{ strtoupper(substr($company->name ?: 'C',0,1)) }}</div><div>
<form method="POST" action="{{ route('employer.company.update') }}">@csrf @method('PUT')
<div class="form-grid"><div class="field"><label class="label">Company Name</label><input class="input" name="name" value="{{ old('name',$company->name) }}" required>@error('name')<div class="error">{{ $message }}</div>@enderror</div><div class="field"><label class="label">Location</label><input class="input" name="location" value="{{ old('location',$company->location) }}" placeholder="e.g. Cairo, Egypt">@error('location')<div class="error">{{ $message }}</div>@enderror</div><div class="field full"><label class="label">Company Description</label><textarea class="textarea" name="description" placeholder="Tell candidates about your company...">{{ old('description',$company->description) }}</textarea>@error('description')<div class="error">{{ $message }}</div>@enderror</div></div><button class="btn" type="submit">Save Company Profile</button>
</form></div></div>
@endsection
