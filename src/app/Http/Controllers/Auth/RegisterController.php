<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an registration attempt.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the incoming request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(), // <-- Added this line
        ]);

        // 3. Assign the default 'user' role (using Spatie)
        // This assumes you have already created the 'user' role in your database
        $user->assignRole('user');

        // 4. Fire the registration event
        event(new Registered($user));

        // 5. Log the new user in
        Auth::login($user);

        // 6. Redirect to the dashboard
        return redirect(route('dashboard', absolute: false));
    }
}

