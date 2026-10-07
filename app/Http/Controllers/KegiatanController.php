<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $kegiatans = Kegiatan::with('event')
            ->latest('tanggal')
            ->latest('waktu_mulai')
            ->get();

        return view('eo.kegiatan.index', compact(
            'user',
            'kegiatans'
        ));
    }

    public function create()
    {
        $user = Auth::user();
        $events = Event::orderBy('nama_event')->get();

        return view('eo.kegiatan.create', compact(
            'user',
            'events'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'nullable',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Kegiatan::create($validated);

        return redirect()
            ->route('eo.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        $user = Auth::user();
        $events = Event::orderBy('nama_event')->get();

        return view('eo.kegiatan.edit', compact(
            'user',
            'kegiatan',
            'events'
        ));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'nullable',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $kegiatan->update($validated);

        return redirect()
            ->route('eo.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        return redirect()
            ->route('eo.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}