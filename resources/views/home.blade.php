@extends('layouts.sidebar')

@section('seccionTitulo')
{{$seccion->nombre}}
@endsection
@section('homeContent')

    <div id="page-content-wrapper" class="w-100">
        <div class="container-fluid w-100">
            <div class="row justify-content-center">
                <div id="sliderC" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($seccion->contenidos as $contenido)
                            <li data-target="#sliderC" data-slide-to="{{ $contenido->id-1 }}"
                                class="@if ($contenido == $seccion->contenidos[0]) active @endif">
                            </li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($seccion->contenidos as $contenido)
                            <div class="carousel-item h-100 @if ($contenido == $seccion->contenidos[0]) active @endif">
                                <div class="card border-0 p-2" style="background:#E8F7FF;">
                                    <div class="border-0 h2 text-center">{{ $contenido->titulo }}</div>
                                    <div class="w-100 d-flex justify-content-center">
                                        <img class="card-img-top w-25" src="{{ $contenido->urlImg }}">
                                    </div>
                                    <div class="card-body">
                                        {{ $contenido->contenido }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
