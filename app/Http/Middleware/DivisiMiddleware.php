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

        // Jika divisi tidak sesuai dengan yang diizinkan
        if (!$namaDivisi || !in_array($namaDivisi, $divisis)) {
            abort(403, 'Anda tidak memiliki akses ke fitur ini.');
        }

        return $next($request);
    }
}
