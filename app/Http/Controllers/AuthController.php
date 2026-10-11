<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password salah.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $user = Auth::user();

        $role = strtoupper((string) $user->role);

        // =========================
        // LOGIN EO
        // =========================
        if ($role === 'EO') {
            return redirect()->route('eo.dashboard');
        }

        // =========================
        // LOGIN PANITIA
        // =========================
        if ($role === 'PANITIA') {

            if (!$user->panitia_id) {
                Auth::logout();

                return back()
                    ->withErrors([
                        'email' => 'Akun panitia belum terhubung dengan data panitia.',
                    ])
                    ->onlyInput('email');
            }

            return redirect()->route('panitia.dashboard');
        }

        // =========================
        // ROLE TIDAK DIKENAL
        // =========================
        Auth::logout();

        return back()
            ->withErrors([
                'email' => 'Role akun tidak dikenali.',
            ])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}