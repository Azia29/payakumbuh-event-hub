<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user->load('divisi');

        return view('eo.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:1000',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
        ]);

        $user->update($validated);

        return redirect()
            ->route('eo.profil')
            ->with('success', 'Data profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|string|min:8',
            'password_baru_confirmation' => 'required|same:password_baru',
        ], [
            'password_baru.min' => 'Password baru minimal 8 karakter.',
            'password_baru_confirmation.same' => 'Konfirmasi password tidak sama.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()
                ->withErrors([
                    'password_lama' => 'Password lama tidak sesuai.'
                ])
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password_baru),
        ]);

        return redirect()
            ->route('eo.profil')
            ->with('success_password', 'Password berhasil diubah.');
    }
}