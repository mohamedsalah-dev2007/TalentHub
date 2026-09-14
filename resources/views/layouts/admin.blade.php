<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
</head>
<body style="background-color: #f8fafc; color: #1e293b; margin: 0; font-family: Arial, sans-serif;">

    @include('layouts.navbar', [
        'role' => 'Admin',
        'links' => [
            'Manage Users' => url('/admin/users'), 
            'Manage Jobs' => url('/admin/jobs'), 
            'All Applications' => url('/admin/applications')
        ]
    ])

    <main style="max-width: 1150px; margin: 0 auto; padding: 0 16px; margin-top: 20px;">
        <!-- عرض رسائل النجاح (Flash Message) تلقائياً -->
        @if (session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 600; border: 1px solid #bbf7d0;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>