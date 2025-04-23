@extends('layouts.app')

@section('title', 'Login to an Account')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="pg-container">
    <div class="pg-card">
        <div class="pg-card-header">Login</div>
        <div class="pg-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="pg-form-group">
                    <label for="email" class="pg-form-label">Email Address</label>
                    <input id="email" type="email" class="pg-form-input @error('email') pg-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="pg-error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="pg-form-group">
                    <label for="password" class="pg-form-label">Password</label>
                    <input id="password" type="password" class="pg-form-input @error('password') pg-error @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="pg-error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="pg-checkbox-wrapper">
                    <input class="pg-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="pg-checkbox-label" for="remember">
                        Remember Me
                    </label>
                </div>
                
                <div class="pg-form-actions">
                    <button type="submit" class="pg-btn" id="login-btn">
                        <span class="btn-text">Login</span>
                        <span class="btn-spinner" style="display: none; margin-left: 8px;">
                            <svg width="18" height="18" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <circle cx="50" cy="50" fill="none" stroke="#fff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                </circle>
                            </svg>
                        </span>
                    </button>
                    @if (Route::has('password.request'))
                        <a class="pg-btn pg-btn-secondary" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endsection
