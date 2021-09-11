@extends('layouts.app')
@section('style')
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 justify-content-center d-flex">
                <div class="card w-75 h-100">
                    <div class="text-primary card-header border-0 h1 justify-content-center d-flex bg-white"
                        style="font-family: Comfortaa;font-style: normal;font-weight: normal;">
                        {{ __('Login') }}
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="/assets/user.png" class="d-inline-block align-top w-25" alt="">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row justify-content-center">

                                <div class="col-form-label text-md-right col-md-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Email address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-form-label text-md-right col-md-9">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Introduce password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-form-label text-md-center w-100 col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Next') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 w-100 justify-content-between">
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="btn text-black" href="{{ route('password.request') }}">
                                            {{ __('Forgotten password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    <a class="btn text-black" href="{{ route('register') }}">Create user</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
