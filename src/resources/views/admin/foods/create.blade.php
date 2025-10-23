@extends('layouts.app')

@section('title', 'Add New Food')

@section('content')
    <h1 class="w3-xxlarge">Add New Food</h1>
    <p class="w3-large w3-text-dark-grey">Add a new item to the global food library.</p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <div class="w3-card-4 w3-round-large w3-white" style="max-width: 600px;">
        <div class="w3-container w3-padding-24">
            
            <form action="{{ route('admin.foods.store') }}" method="POST">
                @csrf
                @include('admin.foods._input')

                <p class="w3-margin-top">
                    <button type="submit" class="w3-button w3-blue w3-round-large w3-padding-large">Save Food</button>
                    <a href="{{ route('admin.foods.index') }}" class="w3-button w3-text-blue w3-padding-large">Cancel</a>
                </p>
            </form>
        </div>
    </div>
@endsection