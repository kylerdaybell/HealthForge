<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of all users.
     */
    public function index(): View
    {
        // Eager load the roles to prevent N+1 query issues
        $users = User::with('roles')->paginate(20);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for editing a specific user.
     */
    public function edit(User $user): View
    {
        // Fetch all available roles
        $roles = Role::all();
        
        // Get the user's current role name (assuming they have one)
        $userRole = $user->getRoleNames()->first();

        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified user's roles in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'role' => 'required|string|exists:roles,name',
        ]);

        // 'syncRoles' is a Spatie method. It removes all old roles
        // and adds the new one provided.
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')
                         ->with('status', "User '{$user->name}' updated successfully.");
    }
    
    // Note: We are intentionally not creating store/destroy methods
    // to prevent admins from creating/deleting users from this panel.
    // User creation should happen via the main registration form.
}
