<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        $user = Auth::user();

        // In the future, you'll pass data here, like:
        // $calories = $user->foodLogs()->whereDate('log_date', today())->sum('calories');
        // $profile = $user->profile;

        // For now, we just load the view.
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
