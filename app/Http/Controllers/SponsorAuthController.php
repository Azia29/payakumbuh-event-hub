<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorAuthController extends Controller
{
    public function showLogin()
    {
        return view('sponsor.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::guard('sponsor')->attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password Sponsor salah.',
                ])
                ->onlyInput('email');
        }

        $sponsor = Auth::guard('sponsor')->user();

        if ($sponsor->status !== 'aktif') {
            Auth::guard('sponsor')->logout();

            return back()
                ->withErrors([
                    'email' => 'Akun Sponsor sedang tidak aktif.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('sponsor.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('sponsor')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sponsor.login');
    }
}