@extends('layouts.app')

@section('title', 'Import Foods')

@section('content')
    <h1 class="w3-xxlarge">Import Foods from CSV</h1>
    <p class="w3-large w3-text-dark-grey">Upload a CSV file to add or update foods in bulk.</p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <!-- Status Messages -->
    @if (session('error'))
        <div class="w3-panel w3-red w3-round-large w3-padding">
            <span class="w3-xlarge w3-left" style="margin-right: 16px;">&#10007;</span>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    <div class="w3-card-4 w3-round-large w3-white" style="max-width: 600px;">
        <div class="w3-container w3-padding-24">
            
            <form action="{{ route('admin.foods.import.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <p>
                    <label class="w3-label w3-text-dark-grey">CSV File</label>
                    <input class="w3-input w3-border w3-round-large w3-padding" type="file" name="csv_file" accept=".csv" required>
                    @error('csv_file') <span class="error-message">{{ $message }}</span> @enderror
                </p>

                <div class="w3-panel w3-leftbar w3-border-blue w3-light-blue w3-padding-large w3-round-large">
                    <h4 style="font-weight: 600;">CSV Format Requirement</h4>
                    <p>Your CSV file **must** have 9 columns in this exact order:</p>
                    <ol class="w3-margin-left">
                        <li>Name (e.g., "Apple Sauce")</li>
                        <li>Brand (e.g., "Mott's", or blank)</li>
                        <li>UPC Code (or blank)</li>
                        <li>Serving Size (e.g., 122)</li>
                        <li>Serving Unit (e.g., "g")</li>
                        <li>Calories</li>
                        <li>Protein (g)</li>
                        <li>Carbs (g)</li>
                        <li>Fats (g)</li>
                    </ol>
                    <p>A header row will be skipped.</p>
                </div>

                <p class="w3-margin-top">
                    <button type="submit" class="w3-button w3-blue w3-round-large w3-padding-large">Import File</button>
                    <a href="{{ route('admin.foods.index') }}" class="w3-button w3-text-blue w3-padding-large">Cancel</a>
                </p>
            </form>
        </div>
    </div>
@endsection
