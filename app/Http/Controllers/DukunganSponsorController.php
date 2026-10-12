<?php

namespace App\Http\Controllers;

use App\Models\DukunganSponsor;
use App\Models\PengajuanSponsor;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DukunganSponsorController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $dukungans = DukunganSponsor::with([
            'pengajuan.sponsor',
            'pengajuan.paket.event',
        ])->latest()->get();

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
            'nominal' => 'required|numeric|min:0.01',
            'status_pembayaran' => 'required|in:belum_dibayar,menunggu_verifikasi,dibayar,ditolak',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_pembayaran' => 'nullable|date',
        ]);

        $pengajuanSponsor->loadMissing([
            'sponsor',
            'paket.event',
        ]);

        $eventId = $pengajuanSponsor->paket?->event_id;

        if (!$eventId) {
            return back()
                ->withInput()
                ->withErrors([
                    'status_pembayaran' =>
                        'Event untuk pengajuan sponsor ini tidak ditemukan.',
                ]);
        }

        DB::transaction(function () use (
            $validated,
            $pengajuanSponsor,
            $eventId
        ) {
            $tanggalBayar = $validated['tanggal_pembayaran']
                ?? now()->toDateString();

            $status = $validated['status_pembayaran'];

            $dukungan = DukunganSponsor::create([
                'pengajuan_sponsor_id' => $pengajuanSponsor->id,
                'nominal' => $validated['nominal'],
                'status_pembayaran' => $status,
                'bukti_pembayaran' =>
                    $validated['bukti_pembayaran'] ?? null,
                'catatan' => $validated['catatan'] ?? null,
                'tanggal_pembayaran' => $status === 'dibayar'
                    ? $tanggalBayar
                    : ($validated['tanggal_pembayaran'] ?? null),
            ]);

            if ($status === 'dibayar') {
                $namaSponsor = $pengajuanSponsor->sponsor?->nama
                    ?? $pengajuanSponsor->sponsor?->nama_sponsor
                    ?? 'Sponsor';

                Transaksi::updateOrCreate(
                    [
                        'sumber' => 'sponsor_dukungan_' . $dukungan->id,
                    ],
                    [
                        'event_id' => $eventId,
                        'jenis' => 'pemasukan',
                        'kategori' => 'Sponsor',
                        'jumlah' => $validated['nominal'],
                        'tanggal' => $tanggalBayar,
                        'keterangan' =>
                            'Pembayaran sponsor: ' . $namaSponsor
                            . ' (pengajuan #' . $pengajuanSponsor->id . ')',
                        'bukti_path' =>
                            $validated['bukti_pembayaran'] ?? null,
                        'dibuat_oleh' => auth()->id(),
                    ]
                );

                $pengajuanSponsor->update([
                    'status' => 'selesai',
                ]);
            }
        });

        return back()->with(
            'success',
            'Data dukungan sponsor berhasil disimpan.'
        );
    }
}