<?php

namespace App\Http\Controllers;

use App\Models\NegosiasiSponsor;
use App\Models\PengajuanSponsor;
use Illuminate\Http\Request;

class NegosiasiSponsorController extends Controller
{
    public function index(PengajuanSponsor $pengajuanSponsor)
    {
        $user = auth()->user();

        $pengajuanSponsor->load([
            'sponsor',
            'paket.event',
            'negosiasi.user',
        ]);

        return view(
            'eo.sponsorship.negosiasi.index',
            compact('user', 'pengajuanSponsor')
        );
    }

    public function store(
        Request $request,
        PengajuanSponsor $pengajuanSponsor
    ) {
        $validated = $request->validate([
            'pesan' => 'required|string',
            'nominal_tawaran' => 'nullable|numeric|min:0',
        ]);

        NegosiasiSponsor::create([
            'pengajuan_sponsor_id' => $pengajuanSponsor->id,
            'user_id' => auth()->id(),
            'pengirim' => 'eo',
            'pesan' => $validated['pesan'],
            'nominal_tawaran' => $validated['nominal_tawaran'] ?? null,
        ]);

        $pengajuanSponsor->update([
            'status' => 'negosiasi',
        ]);

        return back()->with(
            'success',
            'Pesan negosiasi berhasil dikirim.'
        );
    }
}