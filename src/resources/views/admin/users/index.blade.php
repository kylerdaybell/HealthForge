@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    <div class="w3-container w3-padding-24">
        <!-- Header -->
        <h1 class="w3-xxlarge w3-text-dark-grey" style="font-weight: 600;">Manage Users</h1>
        <p class="w3-large w3-text-dark-grey">Assign roles and manage user accounts.</p>

        <hr class="w3-border-gray" style="margin: 32px 0;">

        <!-- Status Messages -->
        @if (session('status'))
            <div class="w3-panel w3-green w3-round-large w3-padding">
                <span class="w3-xlarge w3-left" style="margin-right: 16px;">&#10003;</span>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <!-- Users Table -->
        <div class="w3-white w3-card-4 w3-round-xlarge w3-responsive">
            <table class="w3-table-all w3-hoverable">
                <tr class="w3-light-grey">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th class="w3-center">Actions</th>
                </tr>
                @forelse ($users as $user)
                    <tr>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- 'getRoleNames' is a Spatie method -->
                            <span class="w3-tag w3-round {{ $user->hasRole('admin') ? 'w3-red' : 'w3-blue' }}">
                                {{ $user->getRoleNames()->first() ?? 'No Role' }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td class="w3-center">
                            <a href="{{ route('admin.users.edit', $user) }}" class="w3-button w3-small w3-blue w3-round">Edit Role</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="w3-center w3-padding-large">No users found.</td>
                    </tr>
                @endforelse
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="w3-padding-16">
            {{ $users->links() }}
        </div>
    </div>
@endsection
