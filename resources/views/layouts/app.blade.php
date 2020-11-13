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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class=”main-container”>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a href="/explore" class="nav-link header-links">Explore</a>
                    </ul>


                    <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/imgs/paint.png" alt="Showroom" class="showroom-icon">
                     <span id="site-title">Showroom</span>
                    </a>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto " style="padding-right:20px;">
                        <!-- Authentication Links -->
                            <!-- <form class="form-inline search-bar" action="/search" method="GET">
                                <select name="category" class="category-filter custom-select">
                                    <option value="all">All</option>
                                    <option value="gallery">Gallery</option>
                                    <option value="painting">Painting</option>
                                    <option value="artist">Artist</option>
                                </select>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_text">
                                <button class="btn btn-outline-success" type="submit">
                                <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                                </svg>
                                </button>
                            </form>
                        -->
                            @auth
                            <a href="/create_gallery" class="btn btn-primary new_gallery">Upload</a>
                            @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link header-links " href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link header-links" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle header-links" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if( Auth::user()->is_admin )
                                <a href="/admin" class="dropdown-item">Admin Dashboard</a>
                                @endif
                                <a href="/profile/{{ Auth::user()->id }}" class="dropdown-item">My Profile</a>
                                <a href="/orders" class="dropdown-item">My Orders</a>
                                <a href="/galleries" class="dropdown-item">My Galleries</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

<footer>
    	<div class="footer-top">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-4 col-sm-12">
    					<h5>Contact</h5>
    					<div class="footer-links">
    						<a href="#">Privacy Policy</a>
    						|
    						<a href="mailto:i.ilali@intellcap.lu">Email Us</a>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12">
    					<h5>Follow Us</h5>
    					<div class="footer-links">
    						<a href="#"><img src="/storage/public/imgs/facebook.png"></a>
    						<a href="#"><img src="/storage/public/imgs/linkedin.png"></a>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12">
    					<h5>About</h5>
    					<p id="about-p">All Right reserved by &copy;Intellcap.2020</p>
    				</div>

    			</div>
    		</div>
    	</div>
    </footer>
</div>



</body>
</html>
