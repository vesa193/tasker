<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('boards.index')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'Email or password is invalid',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            auth()->login($user);

            return redirect()->route('boards.index')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            Log::error('Greška pri registraciji korisnika: ' . $e->getMessage());

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
