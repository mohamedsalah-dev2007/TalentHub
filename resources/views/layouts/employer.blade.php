
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Employer | TalentHub' }}</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            background: #f8fafc;
            color: #1e293b;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            width: min(1150px, calc(100% - 32px));
            margin: 0 auto;
        }
        .nav-wrap {
            padding-top: 24px;
        }
        .navbar {
            background: rgba(255, 255, 255, .96);
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(15, 23, 42, .06);
            border-radius: 9999px;
            padding: 10px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 170px;
        }
        .brand a {
            text-decoration: none;
            font-size: 16px;
            font-weight: 800;
            color: #074c6b;
        }
        .role {
            font-size: 10px;
            font-weight: 700;
            color: #074c6b;
            background: #e0f2fe;
            padding: 4px 9px;
            border-radius: 9999px;
            text-transform: uppercase;
        }
        .nav {
            display: flex;
            gap: 22px;
            align-items: center;
            justify-content: center;
            flex: 1;
        }
        .nav a {
            text-decoration: none;
            color: #475569;
            font-size: 12px;
            font-weight: 600;
            padding: 7px 3px;
        }
        .nav a.active,
        .nav a:hover {
            color: #074c6b;
        }
        .account {
            position: relative;
        }
        .account button {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 9999px;
            padding: 7px 12px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            color: #334155;
        }
        .dropdown {
            display: none;
            position: absolute;
            right: 0;
            top: 42px;
            background: #fff;
            min-width: 155px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, .12);
            overflow: hidden;
            z-index: 20;
        }
        .dropdown.open {
            display: block;
        }
        .dropdown a,
        .dropdown button {
            display: block;
            width: 100%;
            text-align: left;
            padding: 11px 14px;
            background: #fff;
            border: 0;
            border-bottom: 1px solid #f1f5f9;
            text-decoration: none;
            color: #334155;
            font-size: 12px;
            font-weight: 600;
        }
        .dropdown .logout {
            color: #dc2626;
        }
        .page {
            padding: 42px 0 70px;
            flex: 1;
        }
        .eyebrow {
            font-size: 12px;
            font-weight: 700;
            color: #074c6b;
            text-transform: uppercase;
            letter-spacing: .08em;
        }
        .title {
            font-size: 30px;
            line-height: 1.2;
            color: #0f172a;
            margin: 7px 0 8px;
            font-weight: 800;
        }
        .subtitle {
            font-size: 14px;
            color: #64748b;
            margin: 0 0 28px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }
        .card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 4px 10px rgba(15, 23, 42, .025);
        }
        .stat-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
        }
        .stat-value {
            font-size: 30px;
            color: #0f172a;
            font-weight: 800;
            margin-top: 7px;
        }
        .section {
            margin-top: 28px;
        }
        .section-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 14px;
        }
        .section-title {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }
        .btn {
            display: inline-block;
            border: 0;
            text-decoration: none;
            background: #074c6b;
            color: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
        }
        .btn.secondary {
            background: #fff;
            color: #074c6b;
            border: 1px solid #cbd5e1;
        }
        .btn.danger {
            background: #fee2e2;
            color: #b91c1c;
        }
        .btn.small {
            padding: 7px 10px;
            font-size: 11px;
        }
        .actions {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }
        .table-card {
            overflow: auto;
            padding: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 760px;
        }
        .table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .04em;
            text-align: left;
            padding: 13px 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        .table td {
            padding: 15px 16px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 12px;
            color: #334155;
            vertical-align: top;
        }
        .table tr:last-child td {
            border-bottom: 0;
        }
        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 9999px;
            font-size: 10px;
            font-weight: 700;
        }
        .badge.pending {
            background: #fef3c7;
            color: #92400e;
        }
        .badge.accepted {
            background: #dcfce7;
            color: #166534;
        }
        .badge.rejected {
            background: #fee2e2;
            color: #991b1b;
        }
        .muted {
            color: #94a3b8;
        }
        .empty {
            text-align: center;
            padding: 42px 20px;
            color: #64748b;
            font-size: 13px;
        }
        .form-card {
            max-width: 100%;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }
        .field {
            margin-bottom: 17px;
        }
        .field.full {
            grid-column: 1 / -1;
        }
        .label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 7px;
        }
        .input,
        .textarea,
        .select {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 11px 12px;
            font: inherit;
            font-size: 13px;
            color: #1e293b;
            background: #fff;
            outline: none;
        }
        .textarea {
            min-height: 135px;
            resize: vertical;
        }
        .input:focus,
        .textarea:focus,
        .select:focus {
            border-color: #074c6b;
            box-shadow: 0 0 0 3px rgba(7, 76, 107, .08);
        }
        .error {
            font-size: 11px;
            color: #dc2626;
            margin-top: 5px;
        }
        .alert {
            padding: 12px 15px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        .company-card {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 24px;
            align-items: start;
        }
        .company-logo {
            width: 120px;
            height: 120px;
            border-radius: 16px;
            background: #e0f2fe;
            color: #074c6b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-weight: 800;
        }
        .job-title {
            font-weight: 800;
            color: #0f172a;
            font-size: 14px;
        }
        .job-desc {
            max-width: 360px;
            line-height: 1.55;
            color: #64748b;
        }
        .link {
            color: #074c6b;
            text-decoration: none;
            font-weight: 700;
        }
        .cover {
            max-width: 320px;
            white-space: normal;
            line-height: 1.5;
        }
        .mini {
            font-size: 11px;
            color: #64748b;
            margin-top: 3px;
        }
        @media (max-width: 900px) {
            .nav {
                gap: 10px;
            }
            .navbar {
                border-radius: 20px;
                flex-wrap: wrap;
            }
            .brand {
                min-width: auto;
            }
            .nav {
                order: 3;
                flex-basis: 100%;
                overflow: auto;
                justify-content: flex-start;
            }
            .grid {
                grid-template-columns: 1fr;
            }
            .company-card {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 600px) {
            .container {
                width: min(100% - 20px, 1150px);
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .field.full {
                grid-column: auto;
            }
            .page {
                padding-top: 30px;
            }
            .title {
                font-size: 25px;
            }
        }
    </style>
</head>
<body style="background-color: #a7e4f4;" class="...">
<header class="container nav-wrap">
    <div class="navbar">
        <div class="brand">
            <a href="{{ route('employer.dashboard') }}">TalentHub</a>
            <span class="role">Employer</span>
        </div>
        <nav class="nav">
            <a class="{{ request()->routeIs('employer.dashboard') ? 'active' : '' }}" href="{{ route('employer.dashboard') }}">Dashboard</a>
            <a class="{{ request()->routeIs('employer.jobs.create') ? 'active' : '' }}" href="{{ route('employer.jobs.create') }}">Post Job</a>
            <a class="{{ request()->routeIs('employer.jobs.*') && !request()->routeIs('employer.jobs.create') ? 'active' : '' }}" href="{{ route('employer.jobs.index') }}">Manage Jobs</a>
            <a class="{{ request()->routeIs('employer.applicants') ? 'active' : '' }}" href="{{ route('employer.applicants') }}">View Applicants</a>
            <a class="{{ request()->routeIs('employer.company.*') ? 'active' : '' }}" href="{{ route('employer.company.edit') }}">Company Profile</a>
        </nav>
        <div class="account">
            <button type="button" onclick="document.getElementById('userDropdown').classList.toggle('open')">{{ auth()->user()->name }} ▾</button>
            <div id="userDropdown" class="dropdown">
                <a href="{{ route('profile.edit') }}">Account Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="container page">
    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif
    @yield('content')
</main>

<!-- الفوتر بعرض الشاشة بالكامل -->
<div style="width: 100%; background-color: #0c4a60;">
    @include('layouts.footer')
</div>

<script>
    document.addEventListener('click', function (e) {
        const a = document.querySelector('.account');
        const d = document.getElementById('userDropdown');
        if (d && !a.contains(e.target)) d.classList.remove('open');
    });
</script>
</body>
</html>