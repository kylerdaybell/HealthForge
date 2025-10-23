@extends('layouts.guest')

@section('title', 'Register - HealthForge')

@section('content')
<div class="login-wrapper">
    <div class="login-card w3-padding">
    
        <!-- App Title -->
        <h2 class="w3-center gradient-text" style="font-size: 2.5rem; font-weight: 700;">HealthForge</h2>

        <form method="POST" action="{{ route('register') }}" class="w3-container w3-white w3-card-4 w3-round-xlarge w3-padding-24">
            @csrf <!-- CSRF Protection Token -->

            <h4 class="w3-center w3-text-dark-grey" style="font-weight: 500;">Create your account</h4>

            <!-- Name Input -->
            <p>
                <label class="w3-label-auth">Name</label>
                <input class="w3-input w3-input-auth" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </p>

            <!-- Email Input -->
            <p>
                <label class="w3-label-auth">Email</label>
                <input class="w3-input w3-input-auth" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </p>

            <!-- Password Input -->
            <p>
                <label class="w3-label-auth">Password</label>
                <input class="w3-input w3-input-auth" type="password" name="password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </p>

            <!-- Confirm Password Input -->
            <p>
                <label class="w3-label-auth">Confirm Password</label>
                <input class="w3-input w3-input-auth" type="password" name="password_confirmation" required>
            </p>


            <!-- Register Button -->
            <p class="w3-margin-top">
                <button type="submit" class="w3-button w3-text-white w3-block w3-button-auth">Register</button>
            </p>
            
            <!-- Login Link -->
            <div class="w3-center w3-margin-top">
                <a href="{{ route('login') }}" class="w3-text-blue">Already have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection

