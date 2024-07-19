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
        return redirect()->intended('/');
    }
    // Login
    public function login()
    {
    }
}
