<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
</head>
<body style="background-color: #f8fafc; color: #1e293b; margin: 0; font-family: Arial, sans-serif;">

   @include('layouts.navbar', [
        'role' => 'Admin',
        'links' => [
            'Manage Users' => '#', 
            'Manage Jobs' => '#', 
            'All Applications' => '#'
        ]
    ])

    <main style="max-width: 1150px; margin: 40px auto; padding: 0 16px;">
        <h1 style="font-size: 24px; color: #0f172a;">Welcome to Admin Dashboard</h1>
        <p style="color: #64748b;">Here you can manage users and system settings.</p>
    </main>

</body>
</html>