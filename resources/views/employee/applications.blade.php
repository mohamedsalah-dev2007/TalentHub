<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications</title>
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
    </style>
</head>

<body style="background-color: #a7e4f4; color: #1e293b; margin: 0; font-family: Arial, sans-serif;">

  @include('layouts.navbar', [
    'role' => 'Employee',
    'links' => [
        'Home' => route('employee.home'),
        'Find Jobs' => route('employee.jobs'),
        'My Applications' => route('employee.applications'),
        'Profile' => route('profile.edit')
    ]
])
    <main style="max-width: 1150px; margin: 40px auto; padding: 0 16px;">
        
      

        <h1 style="font-size: 28px; color: #0f172a; margin-bottom: 4px;">My Applications</h1>
        
        <p style="color: #64748b; margin-top: 0; margin-bottom: 24px;">
            Track the jobs you have applied for.
        </p>

        @php
            $hasApplications = count($applications) > 0;
        @endphp

        @if($hasApplications)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px;">
                @foreach($applications as $application)
                    <div class="job-card">
                        
                        <div>
                            <h2 style="font-size: 18px; margin-top: 0; color: #0f172a; margin-bottom: 12px;">
                                {{ $application->jobListing->title }}
                            </h2>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Company:</strong>
                                {{ $application->jobListing->company->name ?? 'Unknown' }}
                            </p>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Location:</strong>
                                {{ $application->jobListing->location }}
                            </p>

                            <p style="color: #475569; font-size: 14px; margin: 8px 0;">
                                <strong>Status:</strong>
                                @if($application->status === 'pending')
                                    <span style="color: #d97706; font-weight: bold;">Pending</span>
                                @elseif($application->status === 'accepted')
                                    <span style="color: #16a34a; font-weight: bold;">Accepted</span>
                                @elseif($application->status === 'rejected')
                                    <span style="color: #dc2626; font-weight: bold;">Rejected</span>
                                @endif
                            </p>
                        </div>

                        <p style="color: #94a3b8; font-size: 12px; margin-top: 20px; margin-bottom: 0; border-top: 1px solid #f1f5f9; padding-top: 12px;">
                            <strong>Applied:</strong>
                            {{ $application->created_at->format('Y-m-d') }}
                        </p>

                    </div>
                @endforeach
            </div>
        @else
            <div style="background: white; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; text-align: center;">
                <h2 style="font-size: 20px; color: #0f172a; margin-top: 0;">No applications yet</h2>
                <p style="color: #64748b; margin-bottom: 0;">
                    You have not applied for any jobs yet.
                </p>
            </div>
        @endif

    </main>
 @include('layouts.footer')
</body>
</html>