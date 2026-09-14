@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 8px;">Edit User</h1>
    <p style="color: #64748b; margin-bottom: 24px;">Update this user's information.</p>

    <form method="POST" action="{{ url('/admin/users/' . $user->id) }}" style="background: #ffffff; padding: 24px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); width: 100%;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 16px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 24px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Role</label>
            <select name="role" style="width: 100%; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; box-sizing: border-box;">
                <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="employer" {{ $user->role === 'employer' ? 'selected' : '' }}>Employer</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" style="background: #074c6b; color: #ffffff; border: none; padding: 10px 24px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
            Save Changes
        </button>
        <a href="{{ route('admin.users.index') }}" style="margin-left: 12px; color: #64748b; text-decoration: none; font-size: 14px;">
            Cancel
        </a>
    </form>
@endsection