@extends('layouts.guest', ['title' => 'Register'])
@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center vh-100" style="background: url('{{ asset('assets/image/main.png') }}') no-repeat center center / cover; position: relative;">
    <!-- Gradient Overlay -->
    <div class="overlay position-absolute top-0 start-0 w-100 h-100 opacity-50 bg-black"></div>

    <div class="card shadow-lg p-4 text-white z-1 w-100 opacity-50 bg-black rounded" style="max-width: 400px;">
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" class="form-control bg-transparent text-white border-light" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control bg-transparent text-white border-light" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control bg-transparent text-white border-light" type="password" name="password" required autocomplete="new-password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control bg-transparent text-white border-light" type="password" name="password_confirmation" required autocomplete="new-password">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="d-grid pt-2 m-2">
                <button type="submit" class="btn btn-light text-dark w-100">{{ __('Register') }}</button>
            </div>
        </form>

        <!-- Already have an account -->
        <div class="pt-5 text-center">
            <p>Already have an account? <a href="{{ route('login') }}" class="text-white text-decoration-none">Login</a></p>
        </div>
    </div>
</div>

@endsection
