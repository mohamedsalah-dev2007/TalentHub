<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
</head>

<body style="background-color: #f8fafc; color: #1e293b; margin: 0; font-family: Arial, sans-serif;">

    @include('layouts.navbar', [
        'role' => 'Employee',
        'links' => [
            'Find Jobs' => route('employee.jobs'),
            'My Applications' => route('employee.applications'),
            'Profile' => route('profile.edit')
        ]
    ])

    <main style="max-width: 1150px; margin: 40px auto; padding: 0 16px;">
<a href="{{ route('employee.dashboard') }}"
   style="display: inline-block; margin-bottom: 12px; color: #074c6b; text-decoration: none; font-size: 13px; font-weight: 600;">
    ← Back to Dashboard
</a>
        <h1 style="font-size: 28px; color: #0f172a;">My Applications</h1>
        

        <p style="color: #64748b;">
            Track the jobs you have applied for.
        </p>

        @forelse($applications as $application)

            <div style="background: white; padding: 24px; margin-top: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">

                <h2>{{ $application->jobListing->title }}</h2>

                <p>
                    <strong>Company:</strong>
                    {{ $application->jobListing->company->name ?? 'Unknown' }}
                </p>

                <p>
                    <strong>Location:</strong>
                    {{ $application->jobListing->location }}
                </p>

               <p>
    <strong>Status:</strong>

    @if($application->status === 'pending')
        <span style="color: #d97706; font-weight: bold;">
            Pending
        </span>
    @elseif($application->status === 'accepted')
        <span style="color: #16a34a; font-weight: bold;">
            Accepted
        </span>
    @elseif($application->status === 'rejected')
        <span style="color: #dc2626; font-weight: bold;">
            Rejected
        </span>
    @endif
</p>

                <p>
                    <strong>Applied:</strong>
                    {{ $application->created_at->format('Y-m-d') }}
                </p>

            </div>

        @empty

            <div style="background: white; padding: 30px; margin-top: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">
                <h2>No applications yet</h2>
                <p style="color: #64748b;">
                    You have not applied for any jobs yet.
                </p>
            </div>

        @endforelse

    </main>

</body>
</html>