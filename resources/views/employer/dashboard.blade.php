<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employer Dashboard</title>
</head>
<body style="background-color: #f8fafc; color: #1e293b; margin: 0; font-family: Arial, sans-serif;">

   @include('layouts.navbar', [
    'role' => 'Employer',
    'links' => [
        'Post Job' => '#', 
        'Manage Jobs' => '#', 
        'View Applicants' => '#', 
        'Company Profile' => '#'
    ]
])
    <main style="max-width: 1150px; margin: 40px auto; padding: 0 16px;">
        <h1 style="font-size: 24px; color: #0f172a;">Welcome to Employer Dashboard</h1>
        <p style="color: #64748b;">Here you can post new jobs and manage applicants.</p>
    </main>

</body>
</html>