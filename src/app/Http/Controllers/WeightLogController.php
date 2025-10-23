<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class WeightLogController extends Controller
{
    /**
     * Display the weight logging page and chart.
     */
    public function index(): View
    {
        // Get all weight logs for the user, ordered by date.
        // The UserScope automatically ensures we only get the logged-in user's data.
        $logs = WeightLog::orderBy('log_date', 'asc')->get();

        // Pass the logs to the view
        return view('weight.index', [
            'logs' => $logs
        ]);
    }

    /**
     * Store a new weight log entry.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validate the request
        $validated = $request->validate([
            'weight_kg' => 'required|numeric|min:0|max:1000',
            'log_date' => 'required|date|before_or_equal:today',
        ]);

        // 2. Create the weight log associated with the user
        // We can do this because of the hasMany relationship on the User model
        Auth::user()->weightLogs()->create([
            'weight_kg' => $validated['weight_kg'],
            'log_date' => $validated['log_date'],
        ]);

        // 3. Redirect back with a success message
        return redirect()->route('weight.index')->with('status', 'Weight logged successfully!');
    }
}
