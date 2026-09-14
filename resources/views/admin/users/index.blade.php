@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; color: #0f172a; margin-bottom: 4px;">Manage Users</h1>
            <p style="color: #64748b; margin: 0;">View and manage all platform users.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" style="background: #074c6b; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-block; min-width: 130px; text-align: center; box-sizing: border-box;">
            + Add User
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
        <thead>
            <tr style="background: #f1f5f9; text-align: left;">
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">ID</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Name</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Email</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Role</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Joined</th>
                <th style="padding: 12px 16px; font-size: 13px; color: #475569;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr style="border-top: 1px solid #f1f5f9;">
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $user->id }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $user->name }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $user->email }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $user->role }}</td>
                    <td style="padding: 12px 16px; font-size: 13px;">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td style="padding: 12px 16px; font-size: 13px; display: flex; align-items: center; gap: 12px;">
                        <a href="{{ route('admin.users.edit', $user->id) }}" style="color: #2563eb; text-decoration: none; font-weight: 600;">Edit</a>
                        
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="margin: 0;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc2626; text-decoration: none; font-weight: 600; cursor: pointer; padding: 0; font-size: 13px;">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $users->links() }}
    </div>
@endsection