<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSponsor;
use Illuminate\Http\Request;

class PengajuanSponsorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $pengajuans = PengajuanSponsor::with([
            'sponsor',
            'paket.event',
            'negosiasi',
            'dukungan',
        ])
        ->latest()
        ->get();

        return view(
            'eo.sponsorship.pengajuan.index',
            compact('user', 'pengajuans')
        );
    }

    public function show(PengajuanSponsor $pengajuanSponsor)
    {
        $user = auth()->user();

        $pengajuanSponsor->load([
            'sponsor',
            'paket.event',
            'negosiasi.user',
            'dukungan',
        ]);

        return view(
            'eo.sponsorship.pengajuan.show',
            compact('user', 'pengajuanSponsor')
        );
    }

    public function updateStatus(
        Request $request,
        PengajuanSponsor $pengajuanSponsor
    ) {
        $validated = $request->validate([
            'status' => 'required|in:menunggu,ditinjau,negosiasi,disetujui,ditolak,selesai',
            'catatan_eo' => 'nullable|string',
        ]);

        $pengajuanSponsor->update([
            'status' => $validated['status'],
            'catatan_eo' => $validated['catatan_eo'] ?? null,
        ]);

        return back()->with(
            'success',
            'Status dan catatan pengajuan berhasil diperbarui.'
        );
    }
}