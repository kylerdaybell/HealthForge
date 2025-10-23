<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the main admin dashboard.
     */
    public function index(): View
    {
        // We can pass stats here in the future (e.g., user count)
        return view('admin.dashboard.dashboard');
    }
}
