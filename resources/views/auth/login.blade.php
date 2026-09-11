<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - JobBoard</title>
</head>
<body style="background-color: #f8fafc; color: #1e293b; margin: 0; padding: 0; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh;">

    <div style="width: 100%; max-width: 420px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 32px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);">
        
        <!-- Logo / Brand -->
        <div style="text-align: center; margin-bottom: 24px;">
            <a href="{{ url('/') }}" style="text-decoration: none; font-size: 24px; font-weight: 800; color: #074c6b; letter-spacing: -0.5px;">JobBoard</a>
            <p style="font-size: 14px; color: #64748b; margin-top: 6px;">Welcome back! Please enter your details.</p>
        </div>

        
        @if ($errors->any())
            <div style="background-color: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 16px; border-radius: 8px; font-size: 13px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

           
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;" placeholder="name@example.com">
            </div>

            
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">Password</label>
                <input type="password" name="password" required autocomplete="new-password" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 14px; outline: none; box-sizing: border-box;" placeholder="••••••••">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; font-size: 13px;">
                <label style="display: flex; align-items: center; gap: 6px; color: #475569; cursor: pointer;">
                    <input type="checkbox" name="remember" style="accent-color: #074c6b;"> Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-decoration: none; color: #074c6b; font-weight: 600;">Forgot password?</a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" style="width: 100%; background-color: #074c6b; color: #ffffff; padding: 12px; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(7, 76, 107, 0.2);">Sign In</button>
        </form>

       
        <p style="text-align: center; font-size: 13px; color: #64748b; margin-top: 24px;">
            Don't have an account? <a href="{{ route('register') }}" style="text-decoration: none; color: #074c6b; font-weight: 600;">Sign up</a>
        </p>

    </div>

</body>
</html>