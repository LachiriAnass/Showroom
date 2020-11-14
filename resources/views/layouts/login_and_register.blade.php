<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Showroom</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login_and_register_styles.css') }}" rel="stylesheet">

</head>
<body>
    <div class=”main-container”>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/imgs/paint.png') }}" alt="Showroom" class="showroom-icon">
                <span id="site-title">Showroom</span>
                </a>

                <ul class="navbar-nav mr-auto">
                        <a href="/explore" class="nav-link">Explore</a>
                </ul>

                    
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

</body>
</html>





