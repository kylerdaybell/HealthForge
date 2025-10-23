@extends('layouts.app')

@section('title', 'Weight Tracker - HealthForge')

@section('content')
<!-- Page Header -->
<div class="w3-container w3-padding-24">
    <h2 class="w3-text-dark-grey" style="font-weight: 600;">Weight Tracker</h2>
</div>

<!-- Success Message -->
@if (session('status'))
    <div class="w3-container">
        <div class="w3-panel w3-green w3-round-large w3-padding">
            {{ session('status') }}
        </div>
    </div>
@endif

<!-- Main Content Grid -->
<div class="w3-row-padding">

    <!-- Column 1: Log Weight Form -->
    <div class="w3-col l4 m6 w3-margin-bottom">
        <div class="w3-white w3-card-4 w3-round-xlarge w3-padding-large">
            <h3 style="font-weight: 500;">Log New Weight</h3>
            
            <form action="{{ route('weight.store') }}" method="POST">
                @csrf
                <p>
                    <label class="w3-label-auth">Weight (in kg)</label>
                    <input class="w3-input w3-input-auth" type="number" step="0.1" name="weight_kg" value="{{ old('weight_kg') }}" required>
                    @error('weight_kg')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </p>
                <p>
                    <label class="w3-label-auth">Date</label>
                    <input class="w3-input w3-input-auth" type="date" name="log_date" value="{{ old('log_date', date('Y-m-d')) }}" required>
                    @error('log_date')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </p>
                <p class="w3-margin-top">
                    <button type="submit" class="w3-button w3-block w3-button-auth w3-text-white">Save Weight</button>
                </p>
            </form>
        </div>
    </div>

    @include('weight.chart')
</div>
@endsection
