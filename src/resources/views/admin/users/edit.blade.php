@extends('layouts.app')

@section('title', 'Edit User Role')

@section('content')
    <h1 class="w3-xxlarge">Edit User Role</h1>
    <p class="w3-large w3-text-dark-grey">Editing user: <strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
    <hr class="w3-border-gray" style="margin: 32px 0;">

    <div class="w3-card-4 w3-round-large w3-white" style="max-width: 600px;">
        <div class="w3-container w3-padding-24">
            
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                
                <p>
                    <label class="w3-label w3-text-dark-grey">Assign Role</label>
                    <select class="w3-select w3-border w3-round-large" name="role" required>
                        <option value="" disabled>Select a role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ $userRole == $role->name ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('role') <span class="error-message">{{ $message }}</span> @enderror
                </p>

                <p class="w3-margin-top">
                    <button type="submit" class="w3-button w3-blue w3-round-large w3-padding-large">Update Role</button>
                    <a href="{{ route('admin.users.index') }}" class="w3-button w3-text-blue w3-padding-large">Cancel</a>
                </p>
            </form>
        </div>
    </div>
@endsection
