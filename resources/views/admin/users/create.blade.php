@extends('layouts.admin')

@section('title', 'Add New User')

@section('content')
    <div style="width: 100%;">
        <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Add New User</h1>
        <p style="color: #64748b; margin-bottom: 24px;">Create a new user account.</p>

        <form method="POST" action="{{ route('admin.users.store') }}" style="background: #ffffff; padding: 32px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 100%; box-sizing: border-box;">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
            </div>

            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
                </div>
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Role</label>
                    <select name="role" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box; background: #fff;">
                        <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                        <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Password</label>
                <input type="password" name="password" placeholder="Enter secure password" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;" required>
            </div>

            <div style="display: flex; align-items: center; gap: 16px;">
                <button type="submit" style="background: #074c6b; color: #ffffff; border: none; padding: 12px 28px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                    Create User
                </button>
                <a href="{{ route('admin.users.index') }}" style="color: #64748b; text-decoration: none; font-size: 14px; font-weight: 500;">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection