<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisiMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$divisis
    ): Response {

        $user = $request->user();

        // Pastikan pengguna sudah login
        if (!$user) {
            return redirect()->route('login');
        }

        // Ambil nama divisi pengguna
        $namaDivisi = $user->divisi?->nama_divisi;

        \Log::info('DIAGNOSTIK DIVISI EO', [
            'user_id' => $user->id,
            'role' => $user->role,
            'divisi_id' => $user->divisi_id,
            'nama_divisi' => $namaDivisi,
            'divisi_diizinkan' => $divisis,
            'path' => $request->path(),
        ]);

        // Jika divisi tidak sesuai dengan yang diizinkan
        if (!$namaDivisi || !in_array($namaDivisi, $divisis)) {
            abort(403, 'Anda tidak memiliki akses ke fitur ini.');
        }

        return $next($request);
    }
}
