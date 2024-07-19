<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        // Validate
        $field = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);
        // Register 
        $user = User::create($field);
        // Login
        Auth::login($user);
        // Redirect
        return redirect()->route('home');
    }
    // Login
    public function login(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($fields)) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['failed' => 'The provided credentials do not match our records.']);

        // Login



        // Redirect
    }
}
