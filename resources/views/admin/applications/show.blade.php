@extends('layouts.admin')

@section('title', 'Application Details')

@section('content')
    <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Application Details</h1>
    <p style="color: #64748b; margin-bottom: 24px;">Review complete information about this job application.</p>

    <div style="background: #ffffff; padding: 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 100%;">
        
        <div style="margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Applicant Name</span>
            <span style="font-size: 15px; color: #1e293b; font-weight: 600;">{{ $application->user->name ?? 'N/A' }}</span>
        </div>

        <div style="margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Email Address</span>
            <span style="font-size: 15px; color: #1e293b;">{{ $application->user->email ?? 'N/A' }}</span>
        </div>

        <div style="margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Applied Job Title</span>
            {{-- تم تعديلها هنا لتعمل مع العلاقة الصحيحة jobListing --}}
            <span style="font-size: 15px; color: #1e293b; font-weight: 600;">{{ $application->jobListing->title ?? 'N/A' }}</span>
        </div>

        <div style="margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Application Status</span>
            <form method="POST" action="{{ route('admin.applications.update', $application->id) }}" style="display: flex; justify-content: space-between; align-items: center; margin-top: 6px;">
                @csrf
                @method('PUT')
                <select name="status" style="padding: 8px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 14px; background: #fff; min-width: 150px;">
                    <option value="Pending" {{ ($application->status ?? '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Accepted" {{ ($application->status ?? '') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="Rejected" {{ ($application->status ?? '') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                <button type="submit" style="background: #2563eb; color: #ffffff; border: none; padding: 8px 22px; border-radius: 6px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Update Status
                </button>
            </form>
        </div>

        <div style="margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Submission Date</span>
            <span style="font-size: 15px; color: #1e293b;">{{ $application->created_at ? $application->created_at->format('Y-m-d') : '' }}</span>
        </div>

        <div style="margin-bottom: 24px;">
            <span style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Cover Letter / Notes</span>
            <p style="font-size: 14px; color: #334155; background: #f8fafc; padding: 12px; border-radius: 8px; line-height: 1.5; margin: 0;">
                {{ $application->cover_letter ?? 'No cover letter provided.' }}
            </p>
        </div>

        <div>
            <a href="{{ route('admin.applications.index') }}" style="background: #074c6b; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 600; display: inline-block;">
                Back to Applications
            </a>
        </div>
    </div>
@endsection