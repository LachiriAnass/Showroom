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




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome_styles.css') }}" rel="stylesheet">


</head>
<body style="height:100%">

    <div class="showroom-main-page-icon">
        <a href="{{ url('/') }}">
            <img src="/imgs/paint.png" alt="Showroom" class="showroom-icon">
            <span">Showroom</span>
        </a>
    </div>

    <div class="main-page-menu-buttons">
            <a href="{{ route('login') }}">{{ __('Login') }}</a>
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>

    <div class="section s1" style="background-image:  url('imgs/test1.jpg');">
        <h1>Showcase</h1>
        <div class="description">
            <p>Sell and showcase your paintings </p>
            <a href="{{ route('register') }}" ><button type="button">Get started</button></a>
        </div>
    </div>
    <div class="section s2" style="background-image: url('imgs/section2.jpg');">
        <h1>Discover</h1>
        <div class="description">
            <p>Discover new paintings to buy</p>
            <a href="/explore" ><button type="button">Explore</button></a>
        </div>
    </div>
    <div class="section s3" style="background-image: url('imgs/section3.jpg');">
        <h1>Upvote</h1>
        <div class="description">
            <p>Upvote your favorite paintings and artists</p>
        </div>
    </div>

</body>
</html>

