<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // sleep(2);
    return Inertia::render('Home');
})->name('home');

Route::get('/about', function () {
   return Inertia::render('About', [
       'user' => 'Douglas',
   ]);
})->name('about');
