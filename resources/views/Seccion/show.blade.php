@extends('layouts.sidebar')
@section('seccionTitulo')
{{ $seccion->nombre }}
@endsection
@section('homeContent')
<div id="page-content-wrapper" class="w-100 d-flex" style="height: 95%;">
    <div class="w-100">
        <div class="row justify-content-center h-100">
            <div id="sliderC" class="carousel slide" data-ride="carousel w-100">
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
                <div class="carousel-inner h-100"   style="width:65vw;">
                    @foreach ($seccion->contenidos as $contenido)
                    <div class="carousel-item h-100 @if ($contenido == $seccion->contenidos[0]) active @endif">
                        <div class="card border-0 h-100 p-2" style="background:#E8F7FF;">
                            <div class="border-0 h2 text-center mb-4" style="height: auto !important;">{{ $contenido->titulo }}</div>
                            <div class="w-100 d-flex h-50-md h-75-lg justify-content-center align-items-center bg-light">
                                <img class="card-img-top w-50-lg overflow-hidden card-img-top w-100-md overflow-hidden carousel__image" src="{{ $contenido->urlImg }}">
                            </div>
                            <div class="content h-25 overflow-auto">
                                <div class="card-body  text-justify ">
                                    {!! nl2br($contenido->contenido)!!}
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
<script>
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        myFunction()
    };

    function myFunction() {
        var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.width = scrolled + "%";
    }
</script>
