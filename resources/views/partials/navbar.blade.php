<nav class="navbar navbar-expand-lg site-navbar fixed-top" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            GREEN <span>ROUTE</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNav" aria-controls="mainNav"
                aria-expanded="false" aria-label="Toggle navigation menu">
            <span aria-hidden="true">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}"
                    @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                    href="{{ route('about') }}"
                    @if(request()->routeIs('about')) aria-current="page" @endif>About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                    href="{{ route('services') }}"
                    @if(request()->routeIs('services')) aria-current="page" @endif>Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cereals') ? 'active' : '' }}"
                    href="{{ route('cereals') }}"
                    @if(request()->routeIs('cereals')) aria-current="page" @endif>Our Cereals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                    href="{{ route('contact') }}"
                    @if(request()->routeIs('contact')) aria-current="page" @endif>Contact</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="{{ route('requests.track.form') }}"
                            >
                        Track Request
                            </a>
                    </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a href="{{ Route::has('requests.create') ? route('requests.create') : url('/request-service') }}"
                    class="btn btn-request">
                        Request Service
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
