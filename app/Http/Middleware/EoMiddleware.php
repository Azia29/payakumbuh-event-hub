<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EoMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (strtoupper((string) auth()->user()->role) !== 'EO') {
            abort(403, 'Akses khusus untuk akun EO.');
        }

        return $next($request);
    }
}