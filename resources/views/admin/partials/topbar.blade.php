@php
    $adminName = auth()->user()->name ?? 'Administrator';
    $adminInitials = collect(explode(' ', trim($adminName)))
        ->filter()
        ->map(fn ($part) => mb_strtoupper(mb_substr($part, 0, 1)))
        ->take(2)
        ->implode('');
@endphp

<header class="admin-topbar">

    <button type="button" class="admin-sidebar-toggle" id="adminSidebarToggle"
            aria-label="Open menu" aria-expanded="false" aria-controls="adminSidebar">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>

    <div class="admin-topbar-title">
        <h1>@yield('page_title', 'Dashboard')</h1>
    </div>

    <div class="admin-topbar-search d-none d-md-flex">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true    "><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        {{-- Search is not yet wired to a backend query; connect to a future admin.requests.search route --}}
        <input type="search" class="admin-search-input" placeholder="Search requests (coming soon)" disabled aria-label="Search requests">
    </div>

    <div class="admin-topbar-actions">

        <button type="button" class="admin-icon-btn" aria-label="Notifications">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        </button>

        <div class="admin-user-menu dropdown">
            <button type="button" class="admin-user-trigger" id="adminUserMenuBtn"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <span class="admin-avatar">{{ $adminInitials ?: 'A' }}</span>
                <span class="admin-user-name d-none d-sm-inline">{{ $adminName }}</span>
                <svg class="admin-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </button>

            <ul class="dropdown-menu dropdown-menu-end admin-dropdown-menu" aria-labelledby="adminUserMenuBtn">
                {{-- Connect to admin.profile when the route is created --}}
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank" rel="noopener">View Public Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

    </div>

</header>
