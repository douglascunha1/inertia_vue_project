<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

// Controller classname and method name
Route::post('/register', [AuthController::class, 'register']);
