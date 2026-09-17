@extends('layouts.admin')

@section('title', 'Manage Jobs')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 4px;">Manage Jobs</h1>
            <p style="color: #64748b; margin: 0;">View and manage all job postings on the platform.</p>
        </div>
        <a href="{{ route('admin.jobs.create') }}" style="background: #074c6b; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-block; min-width: 130px; text-align: center; box-sizing: border-box;">
            + Add Job
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #f1f5f9; text-align: left;">
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">ID</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Title</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Description</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Location</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Salary</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Type</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr style="border-top: 1px solid #f1f5f9;">
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $job->id }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $job->title }}</td>
                    <td style="padding: 12px 16px; font-size: 13px; color: #64748b;">{{ Str::limit($job->description, 40) }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $job->location }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $job->salary }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $job->job_type }}</td>
                    <td style="padding: 12px 16px; font-size: 13px; display: flex; align-items: center; gap: 12px;">
                        <a href="{{ route('admin.jobs.edit', $job->id) }}" style="color: #2563eb; text-decoration: none; font-weight: 600;">Edit</a>
                        
                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; text-decoration: none; font-weight: 600; cursor: pointer; padding: 0; font-size: 13px;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection