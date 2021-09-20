<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    @yield('style')
    @yield('script')
</head>

<body>
    <div id="app">
        <!--------------------------Barra de navegación horizontal --------------------------------------->
        <nav class="sb-topnav navbar navbar-expand navbar-dark navbar-full bg-light">
            <a class="navbar-brand d-none d-sm-block d-sm-none d-md-block w-100 text-dark" href="{{ url('/') }}" style="font-family: Quicksand;font-style: normal;">
                <img src="/assets/bob.png" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ __('BIENESTAR UNIVERSITARIO') }}
            </a>

            @auth
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars  text-dark"></i></button>
            @endauth

            <!-- El div mágico-->
            <div class="d-none d-md-inline-block  ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    @guest
                <li class="nav-item mr-1 ml-1">
                    <a class="nav-link  btn {{url()->current() == route('login') ? ' btn-primary text-white' : 'btn-light text-dark'}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item mr-1 ml-1">
                    <a class="nav-link text-blue btn {{url()->current() == route('register') ? ' btn-primary text-white' : 'btn-light text-dark'}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <a class="nav-link dropdown-toggle  text-dark" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endguest
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav" class="d-flex">
            <div id="layoutSidenav_nav">
                @yield('sidebar')
            </div>
            <div id="layoutSidenav_content" class="w-100">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
<!-- Footer -->
<footer class="page-footer font-small d-flex justify-content-between ml-5 mr-5">
    <div class="container flex-row d-flex">
        <div class="footer-copyright text-left py-3 mr-5 w-50">
            <a href="https://mdbootstrap.com/">Acerca de nosotros</a>
        </div>
        <div class="footer-copyright text-right py-3 ml-5 w-50">2021|
            <a class="text-black" href="{{ url('/') }}"> Bienestar Universitario</a>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>

</html>
