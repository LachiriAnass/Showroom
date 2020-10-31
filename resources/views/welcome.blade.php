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
    <link href="{{ asset('css/fullpage.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .showroom-main-page-icon{
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 20px 60px;
        }

        .showroom-main-page-icon a{
            text-decoration: none;
            color: white;
            font-size: 25px;
        }

        .main-page-menu-buttons{
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1000;

            padding: 20px 60px;
        }

        .main-page-menu-buttons a{
            text-decoration: none;
            color: white;
            font-size: 25px;
            margin-left: 20px;
            padding-bottom: 5px;
        }

        .main-page-menu-buttons a:hover{
            border-bottom: 1px solid white;
        }
    </style>
</head>
<body>


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

    <div id="fullPage">
            <div class="section s1" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('imgs/section1.jpg');">
                <h1>Showcase</h1>
                <div class="description">
                    <p>Sell and showcase your paintings </p>
                    <a href="{{ route('register') }}" ><button type="button">Get started</button></a>
                </div>
            </div>
            <div class="section s2" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('imgs/section2.jpg');">
                <h1>Discover</h1>
                <div class="description">
                    <p>Discover new paintings to buy</p>
                    <a href="/explore" ><button type="button">Explore</button></a>
                </div>
            </div>
            <div class="section s3" style="background: linear-gradient( rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5) ), url('imgs/section3.jpg');">
                <h1>Upvote</h1>
                <div class="description">
                    <p>Upvote your favorite paintings and artists</p>
                </div>
            </div>
        </div>


    <script src="js/fullpage.min.js"></script>

</body>
</html>

