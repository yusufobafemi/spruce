{{-- resources/views/errors/404.blade.php --}}
@extends('layouts.app')

@section('title', 'Page Not Found')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/errors.css') }}">
@endsection

@section('content')
    <div class="error-container">
        <div class="error-content">
            <div class="error-animation">
                <div class="planet"></div>
                <div class="astronaut">
                    <div class="astronaut-helmet">
                        <div class="astronaut-glass"></div>
                    </div>
                    <div class="astronaut-body"></div>
                    <div class="astronaut-backpack"></div>
                    <div class="astronaut-leg left"></div>
                    <div class="astronaut-leg right"></div>
                    <div class="astronaut-arm left">
                        <div class="astronaut-hand"></div>
                    </div>
                    <div class="astronaut-arm right">
                        <div class="astronaut-hand"></div>
                    </div>
                </div>
                <div class="error-404">404</div>
            </div>
            <div class="error-message">
                <h1>Opps, we have a problem!</h1>
                <p>The page you're looking for has floated off into space.</p>
                <a href="/" class="home-button">
                    <span class="button-text">Return to Earth</span>
                    <span class="button-icon">
                        <i class="fas fa-rocket"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
@endsection
