@extends('layouts.sidebar')
@section('subSeccionTitulo')
{{ $subSeccion->nombre }}
@endsection
@section('homeContent')
<div id="page-content-wrapper" class="w-100 d-flex" style="height: 95%;">
    <div class="container w-100">
    <div class="row justify-content-center h-100">
            <div id="sliderC" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                    $counter=0
                    @endphp
                    @foreach ($subSeccion->contenidos as $contenido)
                    <li data-target="#sliderC" data-slide-to="{{ $counter }}" class="@if ($contenido == $subSeccion->contenidos[0]) active @endif">
                    </li>
                    @php
                    $counter=$counter+1
                    @endphp
                    @endforeach
                </ol>
                <div class="carousel-inner h-100">
                    @foreach ($subSeccion->contenidos as $contenido)
                    <div class="carousel-item h-100 @if ($contenido == $subSeccion->contenidos[0]) active @endif">
                        <div class="card border-0 h-100 p-2" style="background:#E8F7FF;">
                            <div class="border-0 h2 text-center">{{ $contenido->titulo }}</div>
                            <div class="w-100 d-flex h-50 justify-content-center">
                                <img class="card-img-top w-50" style="object-fit:cover;" src="{{ $contenido->urlImg }}">
                            </div>
                            <div class="card-body h-25 text-justify">
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
