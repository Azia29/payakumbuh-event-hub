<?php

namespace App\Http\Controllers;

use App\Models\DukunganSponsor;
use App\Models\PengajuanSponsor;
use Illuminate\Http\Request;

class DukunganSponsorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $dukungans = DukunganSponsor::with([
            'pengajuan.sponsor',
            'pengajuan.paket.event',
        ])
        ->latest()
        ->get();

        return view(
            'eo.sponsorship.dukungan.index',
            compact('user', 'dukungans')
        );
    }

    public function store(
        Request $request,
        PengajuanSponsor $pengajuanSponsor
    ) {
        $validated = $request->validate([
            'nominal' => 'required|numeric|min:0',
            'status_pembayaran' => 'required|in:belum_dibayar,menunggu_verifikasi,dibayar,ditolak',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        DukunganSponsor::create([
            'pengajuan_sponsor_id' => $pengajuanSponsor->id,
            'nominal' => $validated['nominal'],
            'status_pembayaran' => $validated['status_pembayaran'],
            'bukti_pembayaran' => $validated['bukti_pembayaran'] ?? null,
            'catatan' => $validated['catatan'] ?? null,
            'tanggal_pembayaran' => $validated['tanggal_pembayaran'] ?? null,
        ]);

        if ($validated['status_pembayaran'] === 'dibayar') {
            $pengajuanSponsor->update([
                'status' => 'selesai',
            ]);
        }

        return back()->with(
            'success',
            'Data dukungan sponsor berhasil disimpan.'
        );
    }
}