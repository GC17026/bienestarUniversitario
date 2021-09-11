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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    @yield('style')
    @yield('script')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light bg-light navbar-expand-lg shadow-sm p-3 mb-5 bg-white">
            <div class="container">
                <a class="navbar-brand d-none d-sm-block d-sm-none d-md-block " href="{{ url('/') }}" style="font-family: Quicksand;font-style: normal;">
                    <img src="/assets/bob.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    {{ __('BIENESTAR UNIVERSITARIO') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto justify-content-end">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item mr-1 ml-1">
                            <a class="nav-link  btn {{url()->current() == route('login') ? ' btn-primary text-white' : 'btn-light'}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item mr-1 ml-1">
                            <a class="nav-link text-blue btn {{url()->current() == route('register') ? ' btn-primary text-white' : 'btn-light'}}" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
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

</html>
