<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $jadwals = Jadwal::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->get();

        return view('eo.jadwal.index', compact(
            'user',
            'jadwals'
        ));
    }

    public function create()
    {
        $user = Auth::user();

        $events = Event::orderBy('nama_event')->get();

        return view('eo.jadwal.create', compact(
            'user',
            'events'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_jadwal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        Jadwal::create($validated);

        return redirect()
            ->route('eo.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $user = Auth::user();

        $events = Event::orderBy('nama_event')->get();

        return view('eo.jadwal.edit', compact(
            'user',
            'jadwal',
            'events'
        ));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_jadwal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|string|max:50',
        ]);

        $jadwal->update($validated);

        return redirect()
            ->route('eo.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()
            ->route('eo.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}

