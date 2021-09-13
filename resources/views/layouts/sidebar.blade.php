@extends('layouts.app')
@section('style')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
@endsection
@section('sidebar')
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Inicio
                </a>
                @foreach ($secciones as $row)
                    <a class="nav-link collapsed" href="#" data-toggle="collapse"
                        data-target="{{ '#collapse' . $row->nombre }}" aria-expanded="false"
                        aria-controls="collapseLayouts" style="background: #B5DFFF;    font-weight: 500;">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                        {{ $row->nombre }}
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    @if (count($row->subSecciones) > 0)
                        <div class="collapse" id="{{ 'collapse' . $row->nombre }}" aria-labelledby="headingOne" style="background: #2EA7FF;    "
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                @foreach ($row->subSecciones as $subseccion)
                                    <a class="nav-link w-100" href="#" style="font-weight: 500;">{{ $subseccion->nombre }}</a>
                                @endforeach
                            </nav>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </nav>
@endsection
@section('content')
    @yield('homeContent')
@endsection
