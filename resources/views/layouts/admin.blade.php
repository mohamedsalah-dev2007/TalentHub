<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #a7e4f4;" class="text-gray-800 min-h-screen flex flex-col">    @include('layouts.navbar', [
        'role' => 'Admin',
        'links' => [
            'Manage Users' => route('admin.users.index'), 
            'Manage Jobs' => route('admin.jobs.index'), 
            'All Applications' => route('admin.applications.index')
        ]
    ])
    
    <main class="flex-1" style="max-width: 1150px; width: 100%; margin: 0 auto; padding: 0 16px; margin-top: 20px;">
        @if (session('success'))
            <div style="background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 600; border: 1px solid #bbf7d0;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>