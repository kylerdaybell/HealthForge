@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

    <!-- Welcome Header -->
    <div class="w3-container w3-padding-top-24">
        <h1 class="w3-xxlarge w3-text-dark-grey" style="font-weight: 600;">Welcome back, {{ $user->name }}</h1>
    </div>

    <!-- Dashboard Cards (Responsive) -->
    <div class="w3-row-padding" style="margin: 32px -16px 0 -16px;">

        <!-- Primary Card: Today's Log -->
        <div class="w3-col l8 m12 w3-margin-bottom">
            <div class="w3-white w3-card-4 w3-round-xlarge w3-padding-large">
                <h3 style="font-weight: 500;">Today's Log</h3>
                
                <!-- Calorie Progress (Example) -->
                <div class="w3-padding-16">
                    <span class="w3-large">0 / 2,500</span>
                    <span class="w3-text-grey">kcal</span>
                    
                    <div class="w3-light-grey w3-round-large w3-margin-top">
                        <!-- This progress bar would be dynamic -->
                        <div class="w3-container w3-blue w3-round-large" style="width:1%">
                            <span class="w3-text-white" style="opacity: 0;">1%</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Add Buttons -->
                <div class="w3-row-padding w3-margin-top">
                    <div class="w3-half">
                        <a href="#" class="w3-button w3-round-large quick-add-btn">
                            + Log Food
                        </a>
                    </div>
                    <div class="w3-half">
                        <a href="#" class="w3-button w3-round-large quick-add-btn">
                            + Log Exercise
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Cards -->
        <div class="w3-col l4 m12">
            
            <!-- Quick Actions Card -->
            <div class="w3-white w3-card-4 w3-round-xlarge w3-padding-large w3-margin-bottom">
                <h3 style="font-weight: 500;">Quick Actions</h3>
                <div class="w3-padding-16">
                    <a href="{{ route('weight.index') }}" class="w3-button w3-blue w3-round-large w3-margin-bottom action-btn">Log Weight</a>
                    <br>
                    <a href="#" class="w3-button w3-blue w3-round-large action-btn">Add Progress Photo</a>
                </div>
            </div>
            
            <!-- Weight Chart (Placeholder) -->
            <div class="w3-white w3-card-4 w3-round-xlarge w3-padding-large">
                <h3 style="font-weight: 500;">Weight Chart</h3>
                <div class="w3-padding-16 w3-center w3-text-grey">
                    <p>Your progress chart will appear here.</p>
                    <a href="{{ route('weight.index') }}" class="w3-text-blue">View Progress</a>
                </div>
            </div>
            
        </div>

    </div>

@endsection

