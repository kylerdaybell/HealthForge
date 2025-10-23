@extends('layouts.app')

@section('title', 'Edit Food')

@section('content')
    <h1 class="w3-xxlarge">Edit Food</h1>
    <p class="w3-large w3-text-dark-grey">Editing: <strong>{{ $food->name }}</strong></p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <div class="w3-card-4 w3-round-large w3-white" style="max-width: 600px;">
        <div class="w3-container w3-padding-24">
            
            <form action="{{ route('admin.foods.update', $food) }}" method="POST">
                @csrf
                @method('PUT')
                
                

                <p class="w3-margin-top">
                    <button type="submit" class="w3-button w3-blue w3-round-large w3-padding-large">Update Food</button>
                    <a href="{{ route('admin.foods.index') }}" class="w3-button w3-text-blue w3-padding-large">Cancel</a>
                </p>
            </form>
        </div>
    </div>
@endsection