<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>TalentHub</title>
</head>
<body style="background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; font-family: Arial, sans-serif;">

    <!-- Hero Section -->
    <div style="background-image: url('{{ asset('images/home_img.png') }}'); background-size: cover; background-position: center; position: relative; width: 100%; min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; padding: 24px 0;">
        
      
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.35); z-index: 1;"></div>

        <!-- Navbar -->
        <header style="width: 100%; max-width: 1150px; margin: 0 auto; padding: 0 16px; z-index: 2;">
            <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px); border: 1px solid rgba(226, 232, 240, 0.8); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border-radius: 9999px; padding: 10px 24px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center;">
                    <span style="font-size: 16px; font-weight: bold; color: #074c6b; letter-spacing: -0.5px;">JobBoard</span>
                </div>
                
                <nav style="display: flex; gap: 28px; font-size: 13px; font-weight: 500; align-items: center;">
                    <a href="{{ url('/') }}" style="text-decoration: none; color: #074c6b; font-weight: 600;">Home</a>
                    <a href="#" style="text-decoration: none; color: #475569;">Jobs</a>
                    <a href="#" style="text-decoration: none; color: #475569;">Companies</a>
                    <a href="#" style="text-decoration: none; color: #475569;">About</a>
                </nav>

                <div style="display: flex; align-items: center; gap: 12px;">
                    @if (Route::has('login'))
                        @auth
                            @php
                                $dashboardUrl = url('/employee/dashboard');
                                if (auth()->user()->role === 'admin') {
                                    $dashboardUrl = url('/admin/dashboard');
                                } elseif (auth()->user()->role === 'employer') {
                                    $dashboardUrl = url('/employer/dashboard');
                                }
                            @endphp
                            <a href="{{ $dashboardUrl }}" style="text-decoration: none; background-color: #074c6b; color: #ffffff; font-size: 13px; font-weight: 600; padding: 8px 18px; border-radius: 9999px;">My Account</a>
                            
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: #dc2626; font-size: 13px; font-weight: 600; cursor: pointer;">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" style="text-decoration: none; font-size: 13px; font-weight: 600; color: #334155; padding: 6px 12px;">Login</a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="text-decoration: none; background-color: #074c6b; color: #ffffff; font-size: 13px; font-weight: 600; padding: 8px 18px; border-radius: 9999px;">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div style="width: 100%; max-width: 1150px; margin: 0 auto; padding: 0 16px; z-index: 2; display: flex; align-items: center; flex: 1;">
            <div style="max-width: 650px; text-align: left;">
                <h1 style="font-size: 48px; font-weight: 800; color: #ffffff; line-height: 1.15; margin-bottom: 20px; text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);">Find Your Next Career Opportunity & Build the Future</h1>
                <p style="font-size: 16px; color: #f1f5f9; line-height: 1.6; margin-bottom: 30px; font-weight: 600; text-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);">Discover thousands of job opportunities from top companies, connect with great employers, and take the next step in your professional journey.</p>
                
                <div style="display: flex; gap: 16px;">
                    <a href="#" style="text-decoration: none; background-color: #074c6b; color: #fff; padding: 12px 28px; border-radius: 9999px; font-size: 14px; font-weight: 600; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2);">Browse Jobs &rarr;</a>
                    <a href="#" style="text-decoration: none; background-color: rgba(255, 255, 255, 0.9); color: #1e293b; border: 1px solid #cbd5e1; padding: 12px 28px; border-radius: 9999px; font-size: 14px; font-weight: 600;">How It Works</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Dynamic Section -->
    @php
        $latestJobs = [
            ['title' => 'Full-Stack Developer', 'company' => 'Tech Solutions', 'location' => 'Cairo, Egypt', 'type' => 'Full-time'],
            ['title' => 'UI/UX Designer', 'company' => 'Creative Minds', 'location' => 'Remote', 'type' => 'Contract'],
            ['title' => 'Backend Engineer', 'company' => 'Data Systems', 'location' => 'Alexandria, Egypt', 'type' => 'Full-time'],
        ];
    @endphp

    <section style="max-width: 1150px; margin: 60px auto; padding: 0 16px;">
        <h2 style="font-size: 24px; font-weight: bold; color: #0f172a; margin-bottom: 24px;">Latest Job Openings</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
            @foreach($latestJobs as $job)
                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);">
                    <span style="font-size: 12px; font-weight: 600; color: #074c6b; background: #e0f2fe; padding: 4px 10px; border-radius: 9999px;">{{ $job['type'] }}</span>
                    <h3 style="font-size: 18px; font-weight: bold; color: #0f172a; margin: 12px 0 6px 0;">{{ $job['title'] }}</h3>
                    <p style="font-size: 14px; color: #64748b; margin-bottom: 16px;">{{ $job['company'] }} &bull; {{ $job['location'] }}</p>
                    <a href="#" style="text-decoration: none; font-size: 13px; font-weight: 600; color: #074c6b;">Apply Now &rarr;</a>
                </div>
            @endforeach
        </div>
    </section>

</body>
</html>