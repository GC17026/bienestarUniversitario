@extends('layouts.sidebar')
@section('seccionTitulo')
{{$seccion->nombre}}
@endsection
@section('homeContent')
<div id="page-content-wrapper" class="w-100 d-flex" style="height: 95%;">
    <div class="container w-100">
        <div class="row justify-content-center h-100">
            <div id="sliderC" class="carousel slide  w-100" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                    $counter=0
                    @endphp
                    @foreach ($seccion->contenidos as $contenido)
                    <li data-target="#sliderC" data-slide-to="{{ $counter }}" class="@if ($contenido == $seccion->contenidos[0]) active @endif">
                    </li>
                    @php
                    $counter=$counter+1
                    @endphp
                    @endforeach
                </ol>
                <div class="carousel-inner h-100">
                    @foreach ($seccion->contenidos as $contenido)
                    <div class="carousel-item h-100 @if ($contenido == $seccion->contenidos[0]) active @endif">
                        <div class="card border-0 h-100 p-2" style="background:#E8F7FF;">
                            <div class="border-0 h2 text-center" style="height: 10% !important;">{{ $contenido->titulo }}</div>
                            <div class="w-100 d-flex h-75 justify-content-center">
                                <img class="card-img-top w-50 overflow-hidden" style="object-fit:cover;max-height: 486px;max-width: 730px;" src="{{ $contenido->urlImg }}">
                            </div>
                            <div class="content h-25 overflow-auto">
                                <div class="card-body  text-justify ">
                                    {{ $contenido->contenido }}
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
@endsection
