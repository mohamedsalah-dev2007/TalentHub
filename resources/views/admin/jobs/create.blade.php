@extends('layouts.admin')

@section('title', 'Add New Job')

@section('content')
    <div style="width: 100%;">
        <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Add New Job</h1>
        <p style="color: #64748b; margin-bottom: 24px;">Create a new job posting.</p>

        <form method="POST" action="{{ route('admin.jobs.store') }}" style="background: #ffffff; padding: 32px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 100%; box-sizing: border-box;">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Job Title</label>
                <input type="text" name="title" value="{{ old('title') }}" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
            </div>

            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Company Name</label>
                    <input type="text" name="company_name" value="{{ old('company_name') }}" placeholder="e.g. Google, Microsoft" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
                </div>
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Job Type</label>
                    <select name="job_type" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box; background: #fff;">
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Remote">Remote</option>
                    </select>
                </div>
            </div>

            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
                </div>
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Salary</label>
                    <input type="text" name="salary" value="{{ old('salary') }}" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
                </div>
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Description</label>
                <textarea name="description" rows="5" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>{{ old('description') }}</textarea>
            </div>

            <div style="display: flex; align-items: center; gap: 16px;">
                <button type="submit" style="background: #074c6b; color: #ffffff; border: none; padding: 12px 28px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                    Create Job
                </button>
                <a href="{{ route('admin.jobs.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px; font-weight: 500;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection