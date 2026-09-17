@extends('layouts.admin')

@section('title', 'All Applications')

@section('content')
    <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">All Applications</h1>
    <p style="color: #64748b; margin-bottom: 24px;">View and manage all job applications across the platform.</p>

    <div style="background: #ffffff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">ID</th>
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">Applicant</th>
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">Job Title</th>
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">Status</th>
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">Date</th>
                    <th style="padding: 12px 16px; font-size: 13px; color: #475569; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $app)
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 16px; font-size: 13px; color: #1e293b;">{{ $app->id }}</td>
                        <td style="padding: 12px 16px; font-size: 13px;">
                            <a href="{{ route('admin.applications.show', $app->id) }}" style="color: #074c6b; text-decoration: none; font-weight: 600;">
                                {{ $app->user->name ?? 'N/A' }}
                            </a>
                        </td>
                        {{-- تم تعديلها هنا لتعمل مع العلاقة الصحيحة jobListing --}}
                        <td style="padding: 12px 16px; font-size: 13px; color: #1e293b;">{{ $app->jobListing->title ?? 'N/A' }}</td>
                        <td style="padding: 12px 16px; font-size: 13px;">
                            <span style="background: {{ ($app->status ?? '') == 'Accepted' ? '#dcfce7' : '#fef3c7' }}; color: {{ ($app->status ?? '') == 'Accepted' ? '#166534' : '#92400e' }}; padding: 4px 8px; border-radius: 9999px; font-size: 11px; font-weight: 600;">
                                {{ ucfirst($app->status ?? 'Pending') }}
                            </span>
                        </td>
                        <td style="padding: 12px 16px; font-size: 13px; color: #64748b;">{{ $app->created_at ? $app->created_at->format('Y-m-d') : '' }}</td>
                        <td style="padding: 12px 16px; font-size: 13px; display: flex; align-items: center; gap: 12px;">
                            <a href="{{ route('admin.applications.show', $app->id) }}" style="color: #2563eb; text-decoration: none; font-weight: 600;">View</a>
                            
                            <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this application?');">
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
    </div>
@endsection