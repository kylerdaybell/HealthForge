<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to authenticate the user
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {

            // --- VERIFICATION CHECK ---
            $user = Auth::user();

            // Check if the user's email is verified
            if ($user->email_verified_at === null) {
                // If not verified, log them out immediately
                Auth::logout();
                
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Redirect back to login with an error
                return back()->withErrors([
                    'email' => 'You must verify your email address before you can log in.',
                ])->onlyInput('email');
            }
            
            // 3. If successful AND verified, regenerate the session
            $request->session()->regenerate();

            // 4. Redirect to the intended page or a default 'dashboard'
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // 5. If authentication fails, redirect back
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 1. Log the user out
        Auth::logout();

        // 2. Invalidate the user's session
        $request->session()->invalidate();

        // 3. Regenerate the CSRF token
        $request->session()->regenerateToken();

        // 4. Redirect to the homepage
        return redirect('/');
    }
}

