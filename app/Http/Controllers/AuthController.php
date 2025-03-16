<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        sleep(1);
        // Validate the request...
        $fields = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        // Register the user...
        $user = User::create($fields);
        // Login the user...
        Auth::login($user);
        // Redirect the user...
        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        // Validate the request...
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Try to login the user...
        if (Auth::attempt($fields, $request->remember)) {
            // Regenerate the session...
            $request->session()->regenerate();

            // Redirect the user...
            return redirect()->intended('dashboard');
        }

        // Display an error message...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
