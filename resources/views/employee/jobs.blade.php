<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs</title>
    <style>
        .job-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
        }
        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.08);
            border-color: #cbd5e1;
        }
        .apply-btn {
            background: #074c6b;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s ease;
        }
        .apply-btn:hover {
            background: #05364d;
        }
    </style>
</head>

<body style="background-color: #a7e4f4; color: #1e293b; margin: 0; font-family: Arial, sans-serif; display: flex; flex-direction: column; min-height: 100vh;">

    @include('layouts.navbar', [
    'role' => 'Employee',
    'links' => [
        'Home' => route('employee.home'),
        'Find Jobs' => route('employee.jobs'),
        'My Applications' => route('employee.applications'),
        'Profile' => route('profile.edit')
    ]
])

    <main style="max-width: 1150px; margin: 40px auto; padding: 0 16px; flex: 1;">

        <h1 style="font-size: 28px; color: #0f172a; margin-bottom: 4px;">Find Jobs</h1>
        
        <p style="color: #475569; margin-top: 0; margin-bottom: 24px;">
            Browse available jobs and apply for the ones that match your skills.
        </p>

        @if(session('success'))
            <p style="color: #16a34a; font-weight: 600; margin-bottom: 20px; background: #dcfce7; padding: 12px; border-radius: 8px;">
                {{ session('success') }}
            </p>
        @endif

        @php
            $hasJobs = count($jobs) > 0;
        @endphp

        @if($hasJobs)
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                @foreach($jobs as $job)
                    <div class="job-card">
                        <div>
                            <h2 style="font-size: 18px; margin-top: 0; color: #0f172a; margin-bottom: 12px;">
                                {{ $job->title }}
                            </h2>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Company:</strong>
                                {{ $job->company->name ?? 'Unknown' }}
                            </p>

                            <p style="color: #64748b; font-size: 14px; margin: 8px 0; line-height: 1.5;">
                                {{ $job->description }}
                            </p>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Location:</strong>
                                {{ $job->location }}
                            </p>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Job Type:</strong>
                                {{ $job->job_type }}
                            </p>

                            @if($job->salary)
                                <p style="color: #16a34a; font-size: 14px; margin: 8px 0; font-weight: bold;">
                                    <strong>Salary:</strong>
                                    {{ $job->salary }} EGP
                                </p>
                            @endif
                        </div>

                        <div style="margin-top: 20px; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                            <form action="{{ route('employee.jobs.apply', $job->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="apply-btn">
                                    Apply Now
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div style="background: white; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; text-align: center;">
                <h2 style="font-size: 20px; color: #0f172a; margin-top: 0;">No jobs available</h2>
                <p style="color: #64748b; margin-bottom: 0;">
                    There are currently no available jobs.
                </p>
            </div>
        @endif

    </main>

    @include('layouts.footer')
</body>
</html>