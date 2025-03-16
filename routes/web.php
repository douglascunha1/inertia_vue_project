<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');

// Auth routes for authenticated users
Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Auth routes for guest users
Route::middleware('guest')->group(function() {
    Route::get('/register', function () {
        return Inertia::render('Auth/Register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', function () {
        return Inertia::render('Auth/Login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


