@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="w3-xxlarge">Admin Dashboard</h1>
    <p class="w3-large w3-text-dark-grey">Welcome, {{ Auth::user()->name }}.</p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <div class="w3-row-padding">
        
        <!-- Manage Users Card -->
        <div class="w3-col l6 m6 w3-margin-bottom">
            <a href="{{ route('admin.users.index') }}" style="text-decoration: none;">
                <div class="w3-card-4 w3-round-xlarge w3-white w3-hover-shadow w3-padding-24 w3-center">
                    <i class="fa fa-users w3-xxxlarge w3-text-blue"></i>
                    <h3 class="w3-xlarge w3-text-dark-grey" style="font-weight: 500; margin-top: 16px;">Manage Users</h3>
                    <p class="w3-text-grey">Edit user roles and permissions.</p>
                </div>
            </a>
        </div>

        <!-- Manage Foods Card -->
        <div class="w3-col l6 m6 w3-margin-bottom">
            <a href="{{ route('admin.foods.index') }}" style="text-decoration: none;">
                <div class="w3-card-4 w3-round-xlarge w3-white w3-hover-shadow w3-padding-24 w3-center">
                    <i class="fa fa-cutlery w3-xxxlarge w3-text-green"></i>
                    <h3 class="w3-xlarge w3-text-dark-grey" style="font-weight: 500; margin-top: 16px;">Manage Foods</h3>
                    <p class="w3-text-grey">Add or edit items in the global library.</p>
                </div>
            </a>
        </div>

        <!-- Add more tool cards here as you build them -->

    </div>
@endsection
