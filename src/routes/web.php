<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WeightLogController;

// Admin controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// --- GUEST Routes ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});


// --- AUTH Routes ---
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    // Weight Logging Routes
    Route::get('weight', [WeightLogController::class, 'index'])
        ->name('weight.index');
    Route::post('weight', [WeightLogController::class, 'store'])
        ->name('weight.store');

    // Logout Route
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});

// --- ADMIN Routes ---
// This group is protected by authentication AND the 'admin' role
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Use Route::get for a single dashboard page
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Food Management Routes
    Route::get('foods/import', [FoodController::class, 'importCreate'])->name('foods.import.create');
    Route::post('foods/import', [FoodController::class, 'importStore'])->name('foods.import.store');
    Route::resource('foods', FoodController::class);


    // Use ->only() to register only the routes you have methods for
    Route::resource('users', UserController::class)->only([
        'index', 'edit', 'update'
    ]);
});

