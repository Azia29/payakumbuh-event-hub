<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanitiaDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (strtoupper($user->role) !== 'PANITIA') {
            abort(403, 'Akses hanya untuk Panitia.');
        }

        $panitia = $user->panitia;

        if (!$panitia) {
            abort(403, 'Akun Panitia belum terhubung dengan data Panitia.');
        }

        $tugas = $panitia->event
            ? \App\Models\TugasPanitia::whereHas('eventPanitia', function ($query) use ($panitia) {
                $query->where('panitia_id', $panitia->id);
            })
            ->with(['eventPanitia.event', 'eventPanitia.divisi'])
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get()
            : collect();

        return view('panitia.dashboard', compact(
            'user',
            'panitia',
            'tugas'
        ));
    }
}
