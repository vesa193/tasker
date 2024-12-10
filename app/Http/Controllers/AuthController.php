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
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->where('password', $password)->first();

        if ($user) {
            $request->session()->put('user', $user);
            return redirect('/');
        }

        return redirect('/login')->with('error', 'Invalid email or password');
    }

    public function register(Request $request)
    {
        try {
            // Validacija unetih podataka
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            // Kreiranje korisnika
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Hashuj lozinku
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);

            // (Opcionalno) Automatsko logovanje korisnika
            auth()->login($user);

            // Preusmeri korisnika
            return redirect()->route('boards.index')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Loguj grešku
            Log::error('Greška pri registraciji korisnika: ' . $e->getMessage());

            // Takođe, možeš prikazati grešku korisniku
            return back()->withErrors(['error' => 'Something went wrong, try again']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login'); // Redirect to the login page
    }
}
