<aside class="admin-sidebar" id="adminSidebar" aria-label="Administrator navigation">

    <div class="admin-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
            GREEN <span>ROUTE</span>
            <small>Admin</small>
        </a>

        <button type="button" class="admin-sidebar-close" id="adminSidebarClose" aria-label="Close menu">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>

    <nav class="admin-sidebar-nav" aria-label="Main">

        <p class="admin-nav-heading">Overview</p>
        <ul class="admin-nav-list">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                @if(request()->routeIs('admin.dashboard')) aria-current="page" @endif>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"></rect><rect x="14" y="3" width="7" height="5"></rect><rect x="14" y="12" width="7" height="9"></rect><rect x="3" y="16" width="7" height="5"></rect></svg>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>

        <p class="admin-nav-heading">Customer Requests</p>
        <ul class="admin-nav-list">
            {{-- Connect to admin.requests.index when the route is created --}}
            <li>
                <a href="{{ route('admin.requests.index') }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><path d="M14 2v6h6"></path></svg>
                    <span>All Requests</span>
                </a>
            </li>
            {{-- Connect to admin.requests.pending when the route is created --}}
            <li>
                <a href="{{  route('admin.requests.index' , ['status' => 'pending price']) }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                    <span>Pending Quotations</span>
                </a>
            </li>
            {{-- Connect to admin.requests.accepted when the route is created --}}
            <li>
                <a href="{{ route('admin.requests.index', ['status' => 'Accepted']) }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                    <span>Accepted Requests</span>
                </a>
            </li>
            {{-- Connect to admin.requests.rejected when the route is created --}}
            <li>
                <a href="{{ route('admin.requests.index', ['status' => 'Rejected']) }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    <span>Rejected Requests</span>
                </a>
            </li>
            {{-- Connect to admin.requests.completed when the route is created --}}
            <li>
                <a href="{{ route('admin.requests.index', ['status' => 'Completed']) }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"></path></svg>
                    <span>Completed Requests</span>
                </a>
            </li>
        </ul>

        <p class="admin-nav-heading">Management</p>
        <ul class="admin-nav-list">
            {{-- Connect to admin.cereals.index when the route is created --}}
            <li>
                <a href="{{ route('admin.cereals.index') }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c3 3 5 6 5 9a5 5 0 0 1-10 0c0-3 2-6 5-9z"></path></svg>
                    <span>Cereals Management</span>
                </a>
            </li>
            {{-- Connect to admin.settings when the route is created --}}
            <li>
                <a href="{{ route('admin.administrators.index') }}" class="admin-nav-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span>Administrators &amp; Settings</span>
                </a>
            </li>
        </ul>

        <p class="admin-nav-heading">General</p>
        <ul class="admin-nav-list">
            <li>
                <a href="{{ route('home') }}" class="admin-nav-link" target="_blank" rel="noopener">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    <span>View Public Website</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="admin-sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="admin-nav-link admin-logout-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
