<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs</title>
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
        <h1 style="font-size: 28px; color: #0f172a;">Find Jobs</h1>
        

        <p style="color: #64748b;">
            Browse available jobs and apply for the ones that match your skills.
        </p>

        @if(session('success'))
            <p style="color: green;">
                {{ session('success') }}
            </p>
        @endif

        @forelse($jobs as $job)

            <div style="background: white; padding: 24px; margin-top: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">

                <h2>{{ $job->title }}</h2>

                <p>
                    <strong>Company:</strong>
                    {{ $job->company->name ?? 'Unknown' }}
                </p>

                <p>{{ $job->description }}</p>

                <p>
                    <strong>Location:</strong>
                    {{ $job->location }}
                </p>

                <p>
                    <strong>Job Type:</strong>
                    {{ $job->job_type }}
                </p>

                @if($job->salary)
                    <p>
                        <strong>Salary:</strong>
                        {{ $job->salary }}
                    </p>
                @endif

                <form action="{{ route('employee.jobs.apply', $job->id) }}" method="POST">
                    @csrf
                    <button
    type="submit"
    style="background: #074c6b; color: white; border: none; padding: 10px 22px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;"
>
    Apply
</button>
                </form>

            </div>

        @empty

            <div style="background: white; padding: 30px; margin-top: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">
                <h2>No jobs available</h2>
                <p style="color: #64748b;">
                    There are currently no available jobs.
                </p>
            </div>

        @endforelse

    </main>

</body>
</html>