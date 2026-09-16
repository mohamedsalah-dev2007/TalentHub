<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Dashboard</title>
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
        <h1 style="font-size: 24px; color: #0f172a;">Welcome to Employee Dashboard</h1>
        <p style="color: #64748b;">Here you can search for jobs and track your applications.</p>
    </main>
    @include('layouts.footer')

</body>
</html>