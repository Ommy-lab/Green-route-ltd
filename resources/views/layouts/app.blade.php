<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Cereal Transport provides reliable transportation of your cereals and cereal supply services across Tanzania, from pickup to delivery.')">
    <meta name="theme-color" content="#163C2C">
    <title>@yield('title', 'Green Route') | Cereal Transportation &amp; Supply</title>
    <link rel="icon" type="image/png" href="{{ asset('favicongreen.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>

    {{-- Loading screen: removed quickly by app.js, never blocks access --}}
    <div id="loading-screen" aria-hidden="true">
        <div class="loader-grain" role="status" aria-label="Loading"></div>
    </div>

    @include('partials.navbar')

    <main id="main-content">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
