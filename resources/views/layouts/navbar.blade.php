<header style="width: 100%; max-width: 1150px; margin: 24px auto 0 auto; padding: 0 16px;">
    <div style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(8px); border: 1px solid rgba(226, 232, 240, 0.8); box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); border-radius: 9999px; padding: 10px 24px; display: flex; align-items: center; justify-content: space-between;">
        
        <div style="display: flex; align-items: center; gap: 12px;">
            <span style="font-size: 16px; font-weight: bold; color: #074c6b;">TalentHub</span>
            @if(isset($role))
                <span style="font-size: 11px; font-weight: 600; color: #074c6b; background: #e0f2fe; padding: 4px 10px; border-radius: 9999px; text-transform: uppercase;">{{ $role }}</span>
            @endif
        </div>
        
        <nav style="display: flex; gap: 28px; font-size: 13px; font-weight: 500; align-items: center;">
            <a href="{{ url('/') }}" style="text-decoration: none; color: #475569;">Home</a>
            @if(isset($links) && is_iterable($links))
                @foreach($links as $name => $url)
                    <a href="{{ $url }}" style="text-decoration: none; color: #475569;">{{ $name }}</a>
                @endforeach
            @endif
        </nav>

        <div style="position: relative; display: inline-block;">
            <button onclick="toggleDropdown()" style="background: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 9999px; padding: 6px 14px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: #334155;">
                <span>{{ auth()->user()->name ?? 'Account' }}</span>
                <svg style="width: 12px; height: 12px; fill: #475569;" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <div id="userDropdown" style="display: none; position: absolute; right: 0; margin-top: 8px; background: #ffffff; min-width: 150px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; z-index: 50;">
                <a href="{{ route('profile.edit') }}" style="display: block; padding: 10px 16px; font-size: 13px; font-weight: 600; color: #334155; text-decoration: none; border-bottom: 1px solid #f1f5f9;">Profile</a>
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 10px 16px; font-size: 13px; font-weight: 600; color: #dc2626; cursor: pointer;">
                        Logout
                    </button>
                </form>
            </div>
        </div>

    </div>
</header>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }
    window.onclick = function(event) {
        if (!event.target.closest('button')) {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown && dropdown.style.display === 'block') dropdown.style.display = 'none';
        }
    }
</script>