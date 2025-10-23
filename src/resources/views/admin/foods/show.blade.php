@extends('layouts.app')

@section('title', $food->name)

@section('content')
    <h1 class="w3-xxlarge">{{ $food->name }}</h1>
    <p class="w3-large w3-text-dark-grey">{{ $food->brand_name ?? 'Generic Food Item' }}</p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <div class="w3-card-4 w3-round-large w3-white" style="max-width: 600px;">
        <div class="w3-container w3-padding-24">
            <h3 class="w3-border-bottom w3-border-light-grey w3-padding-bottom">Nutritional Information</h3>
            
            <p class="w3-large"><strong>Serving:</strong> {{ $food->serving_size }} {{ $food->serving_unit }}</p>
            
            <div class="w3-row-padding w3-large" style="margin-top: 24px;">
                <div class="w3-col s6 m3">
                    <h4 class="w3-text-blue">Calories</h4>
                    <p>{{ $food->calories }}</p>
                </div>
                <div class="w3-col s6 m3">
                    <h4 class="w3-text-green">Protein</h4>
                    <p>{{ $food->protein_g }}g</p>
                </div>
                <div class="w3-col s6 m3">
                    <h4 class="w3-text-orange">Carbs</h4>
                    <p>{{ $food->carbs_g }}g</p>
                </div>
                <div class="w3-col s6 m3">
                    <h4 class="w3-text-red">Fats</h4>
                    <p>{{ $food->fats_g }}g</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w3-margin-top">
        <a href="{{ route('admin.foods.edit', $food) }}" class="w3-button w3-blue w3-round-large">Edit</a>
        <a href="{{ route('admin.foods.index') }}" class="w3-button w3-text-blue">Back to List</a>
    </div>
@endsection