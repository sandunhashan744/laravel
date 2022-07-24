@extends('layouts.login')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<div class="form login">
    <span class="title">Login</span>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-field">
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email" autofocus>
            <i class="uil uil-envelope icon"></i>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="input-field">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Your Email" required autocomplete="current-password">
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="checkbox-text">
            <div class="checkbox-content">
                <input type="checkbox" id="logCheck">
                <label for="logCheck" class="text">Remember me</label>
            </div>
            
            @if (Route::has('password.request'))
                <a class="text" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            <!--<a href="#" class="text">Forgot password?</a>-->
        </div>

        <div class="input-field button" >
            <button type="submit" href="main" >
                {{ __('Login') }}
            </button>
        </div>
        
    </form>

    <div class="login-signup">
        <span class="text">Not a member?
            <a href="{{ route('register') }}" class="text signup-link">Signup now</a>
        </span>
    </div>
</div>

@endsection
