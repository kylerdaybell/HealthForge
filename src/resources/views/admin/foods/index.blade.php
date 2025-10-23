@extends('layouts.app')

@section('title', 'Manage Foods')

@section('content')
    <div class="w3-container w3-padding-24">
        <div class="w3-row">
            <div class="w3-col m6">
                <h1 class="w3-xxlarge w3-text-dark-grey" style="font-weight: 600;">Manage Foods</h1>
            </div>
            <div class="w3-col m6 w3-right-align">
                <a href="{{ route('admin.foods.import.create') }}" class="w3-button w3-light-blue w3-round-large w3-padding-large" style="font-weight: 600; margin-right: 10px;">
                    Import CSV
                </a>
                <a href="{{ route('admin.foods.create') }}" class="w3-button w3-blue w3-round-large w3-padding-large" style="font-weight: 600;">+ Add New Food</a>
            </div>
        </div>

        <hr class="w3-border-gray" style="margin: 32px 0;">

        @if (session('status'))
            <div class="w3-panel w3-green w3-round-large w3-padding">
                <span class="w3-xlarge w3-left" style="margin-right: 16px;">&#10003;</span>
                <p>{{ session('status') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="w3-panel w3-red w3-round-large w3-padding">
                <span class="w3-xlarge w3-left" style="margin-right: 16px;">&#10007;</span>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="w3-white w3-card-4 w3-round-xlarge w3-responsive">
            <table class="w3-table-all w3-hoverable">
                <tr class="w3-light-grey">
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Serving</th>
                    <th>Calories</th>
                    <th>Protein</th>
                    <th>Carbs</th>
                    <th>Fats</th>
                    <th class="w3-center">Actions</th>
                </tr>
                @forelse ($foods as $food)
                    <tr>
                        <td><strong>{{ $food->name }}</strong></td>
                        <td>{{ $food->brand_name ?? 'N/A' }}</td>
                        <td>{{ $food->serving_size }} {{ $food->serving_unit }}</td>
                        <td>{{ $food->calories }}</td>
                        <td>{{ $food->protein_g }}g</td>
                        <td>{{ $food->carbs_g }}g</td>
                        <td>{{ $food->fats_g }}g</td>
                        <td class="w3-center" style="white-space: nowrap;">
                            <a href="{{ route('admin.foods.edit', $food) }}" class="w3-button w3-small w3-blue w3-round">Edit</a>
                            
                            <form action="{{ route('admin.foods.destroy', $food) }}" method="POST" style="display: inline-block; margin-left: 5px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w3-button w3-small w3-red w3-round" 
                                        onclick="return confirm('Are you sure you want to delete \'{{ $food->name }}\'? This action cannot be undone.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="w3-center w3-padding-large">No foods found in the library.</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <div class="w3-padding-16">
            {{ $foods->links() }}
        </div>
    </div>
@endsection