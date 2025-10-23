@extends('layouts.guest')

@section('title', 'HealthForge - Forge a Stronger You')

@section('body-class', 'welcome')

@push('styles')
    <!-- Push the welcome-page-specific CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endpush

@section('content')

    <!-- Main Centered Content Container -->
    <div class="page-container w3-container">

        <!-- Header and Hero Section -->
        <header class="w3-padding-64">
            <h1 class="healthforge-title">HealthForge</h1>
            <h2 class="hero-headline">Forge a stronger you.</h2>
            <p class="hero-subheadline">The simple, beautiful way to track your health, build lasting habits, and see your progress come to life.</p>
            
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="cta-button w3-blue">Go to Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="cta-button w3-blue">Get Started &mdash; It's Free</a>
                    <br><br>
                    <a href="{{ route('login') }}" class="w3-text-blue">Log In</a>
                @endauth
            @endif

        </header>

        <!-- Feature Section -->
        <div class="feature-section w3-row-padding">
            <div class="w3-col l4 m6 s12">
                <div class="feature-card">
                    <h3>Effortless Logging</h3>
                    <p>Log meals and workouts in seconds with your personal library. No more endless searching.</p>
                </div>
            </div>
            <div class="w3-col l4 m6 s12">
                <div class="feature-card">
                    <h3>Visual Progress</h3>
                    <p>See your hard work pay off with clean charts and a side-by-side photo comparison gallery.</p>
                </div>
            </div>
            <div class="w3-col l4 m12 s12">
                <div class="feature-card">
                    <h3>Built For You</h3>
                    <p>Forge your own path by building a library of your favorite foods and workout routines.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
