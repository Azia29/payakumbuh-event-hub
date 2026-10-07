<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class AdminPublikasiController extends Controller
{
    public function index()
    {
        $publikasis = Publikasi::with([
            'event',
            'user'
        ])
        ->latest()
        ->get();

        return view(
            'admin.publikasi.index',
            compact('publikasis')
        );
    }

    public function show(Publikasi $publikasi)
    {
        $publikasi->load([
            'event',
            'user'
        ]);

        return view(
            'admin.publikasi.show',
            compact('publikasi')
        );
    }

    public function setujui(Publikasi $publikasi)
    {
        $publikasi->update([
            'status' => 'dipublikasikan',
            'published_at' => now(),
            'catatan_admin' => null,
        ]);

        return redirect()
            ->route('admin.publikasi.index')
            ->with(
                'success',
                'Publikasi telah disetujui dan dipublikasikan.'
            );
    }

    public function tolak(
        Request $request,
        Publikasi $publikasi
    ) {
        $validated = $request->validate([
            'catatan_admin' => 'required|string|max:1000',
        ]);

        $publikasi->update([
            'status' => 'ditolak',
            'catatan_admin' => $validated['catatan_admin'],
        ]);

        return redirect()
            ->route('admin.publikasi.index')
            ->with(
                'success',
                'Publikasi dikembalikan kepada Humas untuk diperbaiki.'
            );
    }
}
