<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('title', 'Register an Account')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="pg-container">
    <div class="pg-card">
        <div class="pg-card-header">Register</div>
        <div class="pg-card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="pg-form-group">
                    <label for="name" class="pg-form-label">Name</label>
                    <input id="name" type="text" class="pg-form-input @error('name') pg-error @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="pg-error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="pg-form-group">
                    <label for="email" class="pg-form-label">Email Address</label>
                    <input id="email" type="email" class="pg-form-input @error('email') pg-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="pg-error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="pg-form-group">
                    <label for="password" class="pg-form-label">Password</label>
                    <input id="password" type="password" class="pg-form-input @error('password') pg-error @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="pg-error-message">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="pg-form-group">
                    <label for="password-confirm" class="pg-form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="pg-form-input" name="password_confirmation" required autocomplete="new-password">
                </div>
                
                <div class="pg-form-actions">
                    <button type="submit" class="pg-btn">
                        Register
                    </button>
                    <a href="{{ route('login') }}" class="pg-btn pg-btn-secondary">
                        Already have an account?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/login.js') }}"></script>
@endsection