@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Admin Dashboard</h1>
    <p style="color: #64748b; margin-bottom: 24px;">Welcome back! Here is a quick overview of your platform.</p>

    <!-- كروت الإحصائيات -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px;">
        
        <!-- كارت المستخدمين -->
        <div style="background: #ffffff; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #2563eb;">
            <p style="color: #64748b; font-size: 14px; margin: 0 0 8px 0; font-weight: 600;">Total Users</p>
            <h2 style="color: #0f172a; font-size: 28px; margin: 0;">{{ $usersCount }}</h2>
        </div>

        <!-- كارت الوظائف -->
        <div style="background: #ffffff; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #16a34a;">
            <p style="color: #64748b; font-size: 14px; margin: 0 0 8px 0; font-weight: 600;">Total Jobs</p>
            <h2 style="color: #0f172a; font-size: 28px; margin: 0;">{{ $jobsCount }}</h2>
        </div>

        <!-- كارت طلبات التوظيف -->
        <div style="background: #ffffff; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #d97706;">
            <p style="color: #64748b; font-size: 14px; margin: 0 0 8px 0; font-weight: 600;">Total Applications</p>
            <h2 style="color: #0f172a; font-size: 28px; margin: 0;">{{ $applicationsCount }}</h2>
        </div>

    </div>
@endsection