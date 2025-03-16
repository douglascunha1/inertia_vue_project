<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        sleep(1);
        // Validate the request...
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);
        dd('pass');
        // Register the user...

        // Login the user...

        // Redirect the user...
        dd($request);
    }
}
