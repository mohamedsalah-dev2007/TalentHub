@extends('layouts.admin')

@section('title', 'Edit Job')

@section('content')
    <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Edit Job</h1>
    <p style="color: #64748b; margin-bottom: 24px;">Update this job posting's information.</p>

    <form method="POST" action="{{ url('/admin/jobs/' . $job->id) }}" style="background: #ffffff; padding: 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 100%;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Job Title</label>
            <input type="text" name="title" value="{{ $job->title }}" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Description</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>{{ old('description', $job->description) }}</textarea>
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Location</label>
            <input type="text" name="location" value="{{ $job->location }}" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Salary</label>
            <input type="text" name="salary" value="{{ $job->salary }}" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Job Type</label>
            <select name="job_type" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
                <option value="Full-time" {{ $job->job_type === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ $job->job_type === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Remote" {{ $job->job_type === 'Remote' ? 'selected' : '' }}>Remote</option>
            </select>
        </div>

        <button type="submit" style="background: #074c6b; color: #ffffff; border: none; padding: 10px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Save Changes
        </button>
        <a href="{{ route('admin.jobs.index') }}" style="margin-left: 12px; color: #64748b; text-decoration: none; font-size: 14px;">
            Cancel
        </a>
    </form>
@endsection