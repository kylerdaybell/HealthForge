@extends('layouts.guest')

@section('title', 'Login - HealthForge')

@section('content')
<div class="login-wrapper">
    <div class="login-card w3-padding">
    
        <!-- App Title -->
        <h2 class="w3-center gradient-text" style="font-size: 2.5rem; font-weight: 700;">HealthForge</h2>

        <form method="POST" action="{{ route('login') }}" class="w3-container w3-white w3-card-4 w3-round-xlarge w3-padding-24">
            @csrf <!-- CSRF Protection Token -->

            <h4 class="w3-center w3-text-dark-grey" style="font-weight: 500;">Welcome back</h4>

            <!-- Email Input -->
            <p>
                <label class="w3-label-auth">Email</label>
                <input class="w3-input w3-input-auth" type="email" name="email" value="{{ old('email') }}" required autofocus>
                
                <!-- Show validation error for email -->
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </p>

            <!-- Password Input -->
            <p>
                <label class="w3-label-auth">Password</label>
                <input class="w3-input w3-input-auth" type="password" name="password" required>
                
                <!-- Show validation error for password (less common) -->
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </p>

            <!-- Remember Me Checkbox -->
            <p>
                <input class="w3-check" type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </p>

            <!-- Login Button -->
            <p>
                <button class="w3-button w3-text-white w3-block w3-button-auth">Log In</button>
            </p>
            
            <!-- Optional: Forgot Password / Register Links -->
            <div class="w3-center w3-margin-top">
                <a href="#" class="w3-text-blue">Forgot Password?</a>
                <span class="w3-padding">|</span>
                <a href="{{ route('register') }}" class="w3-text-blue">Register</a>
            </div>
        </form>
    </div>
</div>
@endsection

