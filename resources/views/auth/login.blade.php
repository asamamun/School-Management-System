@extends('layouts.guest', ['title' => 'Login'])
@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container-fluid d-flex justify-content-center align-items-center vh-100" style="background: url('{{ asset('storage/image/main.png') }}') no-repeat center center / cover; position: relative;">
        <!-- Gradient Overlay -->
        <div class="overlay position-absolute top-0 start-0 w-100 h-100 opacity-50 bg-black"></div>
    
        <div class="card shadow-lg p-4 text-white z-1 w-100 opacity-50 bg-black rounded" style="max-width: 400px;">
            <div class="text-center mb-4">
                <a class="text-white text-decoration-none" href="{{ url('/') }}">
                    <span style="font-size: 2rem; font-weight: bold;">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
            </div>
    
            <h4 class="text-center mb-4">Login</h4>
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-control bg-transparent text-white border-light" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
    
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-control bg-transparent text-white border-light" type="password" name="password" required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
    
                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                </div>
    
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-light text-dark">{{ __('Log in') }}</button>
                </div>
    
                <!-- Forgot Password -->
                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-white text-decoration-none">{{ __('Forgot your password?') }}</a>
                    @endif
                </div>
            </form>
    
            <!-- Register Link -->
            <div class="text-center mt-3">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-white text-decoration-none">Register</a></p>
            </div>
        </div>
    </div>
    
    
@endsection
