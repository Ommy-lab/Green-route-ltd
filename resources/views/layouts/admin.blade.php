<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Dashboard') | GREEN ROUTE ltd Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicongreen.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-layout">

    {{-- Mobile sidebar overlay — closes the sidebar when tapped --}}
    <div class="admin-mobile-overlay" id="adminSidebarOverlay"></div>

    @include('admin.partials.sidebar')

    <div class="admin-main">

        @include('admin.partials.topbar')

        <main id="admin-content" class="admin-content">
            <div class="container-fluid">

                {{-- Flash messages --}}
                @if (session('success'))
                    <div class="alert alert-success shadow-sm" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger shadow-sm" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger shadow-sm" role="alert">
                        <h6 class="fw-bold mb-2">Please correct the following:</h6>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

            </div>
        </main>

        @include('admin.partials.footer')

    </div>

</body>
</html>
