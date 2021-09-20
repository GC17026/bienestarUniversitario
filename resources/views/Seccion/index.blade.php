@extends('layouts.sidebar')

@section('homeContent')

<div id="page-content-wrapper" class="w-100">
    <div class="container w-100">
        <div class="row justify-content-center">
            <div class="">
                <div class="card">
                    <div class="card-header">{{ __('Seccion mamalona') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
