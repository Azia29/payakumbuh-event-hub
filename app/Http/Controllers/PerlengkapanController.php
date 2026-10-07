<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerlengkapanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $perlengkapans = Perlengkapan::with('event')
            ->latest()
            ->get();

        return view('eo.perlengkapan.index', compact(
            'user',
            'perlengkapans'
        ));
    }

    public function create()
    {
        $user = Auth::user();

        $events = Event::orderBy('tgl_mulai')->get();

        return view('eo.perlengkapan.create', compact(
            'user',
            'events'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_perlengkapan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'sumber' => 'required|in:Milik EO,Sewa,Pinjam',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|in:Tersedia,Dipakai,Dikembalikan',
            'keterangan' => 'nullable|string',
        ]);

        Perlengkapan::create($validated);

        return redirect()
            ->route('eo.perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil ditambahkan.');
    }

    public function edit(Perlengkapan $perlengkapan)
    {
        $user = Auth::user();

        $events = Event::orderBy('tgl_mulai')->get();

        return view('eo.perlengkapan.edit', compact(
            'user',
            'perlengkapan',
            'events'
        ));
    }

    public function update(Request $request, Perlengkapan $perlengkapan)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_perlengkapan' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'sumber' => 'required|in:Milik EO,Sewa,Pinjam',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|in:Tersedia,Dipakai,Dikembalikan',
            'keterangan' => 'nullable|string',
        ]);

        $perlengkapan->update($validated);

        return redirect()
            ->route('eo.perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil diperbarui.');
    }

    public function destroy(Perlengkapan $perlengkapan)
    {
        $perlengkapan->delete();

        return redirect()
            ->route('eo.perlengkapan.index')
            ->with('success', 'Perlengkapan berhasil dihapus.');
    }
}