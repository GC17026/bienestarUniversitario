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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
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
    <script>
        function clock(argument) {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            var month = currentTime.getMonth() + 1;
            var date = currentTime.getDate();
            if (minutes < 10) minutes = "0" + minutes;
            if (seconds < 10) seconds = "0" + seconds;
            if (month < 10) month = "0" + month;
            if (date < 10) date = "0" + date;
            var t_str =
                date +
                "/" +
                month +
                "/" +
                currentTime.getFullYear() +
                " " +
                (hours % 12 || 12) +
                ":" +
                minutes +
                ":" +
                seconds;
            if (hours > 11) t_str += " PM";
            else t_str += " AM";
            document.getElementById("time_span").innerHTML = t_str;
            setTimeout("clock()", 1000);
        }
    </script>
</head>

<body onload="clock()">
    <style>
        #slider {
            /*height: 350px;
    overflow: hidden;
    width: 100%;*/
        }

        .carousel-item {
            height: 350px;
        }

        .carousel-indicators li {
            width: 10px;
            height: 10px;
            border-radius: 100%;
            background-color: #0E4DA7;
        }

        .carousel-indicators {
            bottom: -40px;
        }

    </style>
    <div id="app">
        <!--------------------------Barra de navegación horizontal --------------------------------------->
        <nav class="sb-topnav navbar navbar-expand navbar-dark navbar-full shadow-sm p-3 bg-white">
            <a class="navbar-brand d-none d-sm-block d-sm-none d-md-block w-100 text-dark" href="{{ url('/') }}"
                style="font-family: Quicksand;font-style: normal;">
                <img src="/assets/salud.png" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ __('BIENESTAR UNIVERSITARIO') }}
            </a>

            @auth
                <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                        class="fas fa-bars  text-dark"></i></button>
            @endauth

            <!-- El div mágico-->
            <div class="d-none d-md-inline-block  ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </div>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    @guest
                    <li class="nav-item mr-1 ml-1">
                        <a class="nav-link  btn {{ url()->current() == route('login') ? ' btn-primary text-white' : 'btn-light text-dark' }}"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item mr-1 ml-1">
                            <a class="nav-link text-blue btn {{ url()->current() == route('register') ? ' btn-primary text-white' : 'btn-light text-dark' }}"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a class="nav-link dropdown-toggle  text-dark" id="userDropdown" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        @hasanyrole('Administrador|Editor')
                        <a class="dropdown-item" href="{{ route('seccion.index') }}">
                            {{ __('Editar secciones') }}
                        </a>
                        @endhasanyrole
                        @hasanyrole('Administrador')
                        <a class="dropdown-item" href="{{ route('bitacora.index') }}">
                            {{ __('Bitacora de acciones') }}
                        </a>
                        @endhasanyrole
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
            <div id="layoutSidenav_content" class="w-100 pt-3 pl-3">
                <main class="pb-5 pl-5 pt-3 pr-5 rounded h-100" style="background:#F7F9FA;width:95%;">
                    <div class="d-flex justify-content-center">
                        <p class="h3">@yield('seccionTitulo')</p>
                    </div>
                    @yield('content')
                </main>
            </div>
            <div class="w-25 d-none d-sm-block d-sm-none d-md-block pt-3 pr-3">
                <div class="container rounded  p-4 mb-2 d-flex flex-column  h-100" style="background:#F7F9FA;">
                    <div class="d-flex justify-content-center">
                        <p class="h3">Fecha</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="h6" id="time_span"></p>
                    </div>
                    <div class="container rounded justify-content-center p-4 mt-2 d-flex flex-column "
                        style="background:#F7F9FA;">
                        <div class="d-flex justify-content-center pb-2">
                            <p class="h3">Novedades</p>
                            @can('crear aviso')
                                <button type="button" class="btn-create-novedad btn btn-info btn-circle ml-auto"
                                    data-toggle="modal" data-target="#novedadcreate">
                                    <i class="fa fa-plus"></i>
                                </button>
                            @endcan
                        </div>
                    </div>

                    <div id="slider" class="carousel slide" data-ride="carousel">
                        @php
                            $counter = 0;
                        @endphp
                        <ol class="carousel-indicators">
                            @foreach ($avisos as $aviso)
                                <li data-target="#slider" data-slide-to="{{ $counter }}"
                                    class="@if ($aviso == $avisos[0]) active @endif"></li>
                                @php
                                    $counter = $counter + 1;
                                @endphp
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach ($avisos as $aviso)
                                <div class="carousel-item @if ($aviso == $avisos[0]) active @endif">
                                    <div class="rounded" style="background:#F7F9FA;">
                                        <div style="background:#E8F7FF;" class="rounded">
                                            <div class="card-header">
                                                <div class=" d-flex">
                                                    <div
                                                        class="d-flex flex-row justify-content-center align-items-center ">
                                                        <img src="/assets/salud.png" width="30" height="30"
                                                            class="d-inline-block align-top mr-2" alt="">
                                                        <p class="h3 ml-2">{{ $aviso->titulo }}</p>
                                                    </div>
                                                    @can('editar aviso')
                                                        <button type="button"
                                                            class="btn-edit-novedad btn btn-success m-1  btn-circle ml-auto"
                                                            data-toggle="modal" data-target="#NovedadEdit"
                                                            data-novedadid="{{ $aviso->id }}"
                                                            data-titulo="{{ $aviso->titulo }}"
                                                            data-contenido="{{ $aviso->contenido }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endcan
                                                    @can('eliminar aviso')
                                                        <button type="button"
                                                            class="btn-delete-novedad btn btn-danger m-1  btn-circle"
                                                            data-toggle="modal" data-novedadid="{{ $aviso->id }}"
                                                            data-tipoDelete='novedad' data-target="#deleteModal">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    @endcan
                                                </div>
                                                <div class="w-100 text-justify">
                                                    <p class="w-100 p-3">{{ $aviso->contenido }}</p>
                                                </div>
                                            </div>
                                            <div class="text-justify">
                                                <p style="font-weight: 500;">{{ $aviso->created_at }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal para creacion de novedad-->
    <div class=" modal
                    fade" id="NovedadCreate" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva novedad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="modal-alert" role="alert" style="display:none;">
                    This is a success alert—check it out!
                </div>
                <form name="novedadCreateForm" id="novedadCreateForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Título</label>
                            <input type="text" class="form-control" id="recipient-name" name="titulo">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Contenido</label>
                            <textarea class="form-control" id="message-text" name="contenido"></textarea>
                        </div>
                        <!--<div class="form-group">
                            <label for="message-text" class="col-form-label">Imagen</label>
                            <input type="file" class="form-control-file" id="File1" name="foto_contenido">
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--modal para edicion de novedad-->
    <div class="modal fade" id="NovedadEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar nodedad: </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="modal-alert" role="alert" style="display:none;">
                    This is a success alert—check it out!
                </div>
                <form name="novedadEditForm" id="novedadEditForm">
                    @csrf
                    <input type="hidden" name="id" id="novedadid-edit" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tituloContenido" class="col-form-label">Título</label>
                            <input type="text" class="form-control" id="tituloContenido" name="titulo">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Contenido</label>
                            <textarea class="form-control" id="text-contenido" name="contenido"></textarea>
                        </div>
                        <!--<div class="form-group">
                            <label for="message-text" class="col-form-label">Imagen</label>
                            <input type="file" class="form-control-file" id="File1" name="foto_contenido">
                        </div>-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Editar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para delete-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container d-flex pl-0"><img src="https://imgur.com/Kh1gwTq.png">
                        <h5 class="modal-title ml-2" id="exampleModalLabel">Confirmación de eliminación</h5>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="modal-alert" role="alert" style="display:none;">
                    This is a success alert—check it out!
                </div>
                <div class="modal-body">
                    <p class="text-muted">Está seguro que lo desea eliminar? Este cambio es irreversible
                    </p>
                </div>
                <div class="modal-footer">
                    <form name="deleteForm" id="deleteForm" method="POST">
                        @csrf
                        <input type="hidden" name="toDeleteId" id="toDeleteId" value="">
                        <input type="hidden" name="toDeleteType" id="toDeleteType" value="">
                        <button type="submit" class="btn btn-danger m-1 ">Eliminar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
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
