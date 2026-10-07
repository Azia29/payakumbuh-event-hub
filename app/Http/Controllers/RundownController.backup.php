<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Rundown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RundownController extends Controller
{
    /**
     * Menampilkan semua rundown.
     */
    public function index()
    {
        $user = Auth::user();

        $rundowns = Rundown::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->get();

        return view('eo.rundown.index', compact(
            'user',
            'rundowns'
        ));
    }

    /**
     * Form tambah rundown.
     */
    public function create()
    {
        $user = Auth::user();

        $events = Event::orderBy('nama_event')->get();

        return view('eo.rundown.create', compact(
            'user',
            'events'
        ));
    }

    /**
     * Menyimpan rundown.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_rundown' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        Rundown::create($validated);

        return redirect()
            ->route('eo.rundown.index')
            ->with('success', 'Rundown berhasil ditambahkan.');
    }

    /**
     * Form edit rundown.
     */
    public function edit(Rundown $rundown)
    {
        $user = Auth::user();

        $events = Event::orderBy('nama_event')->get();

        return view('eo.rundown.edit', compact(
            'user',
            'rundown',
            'events'
        ));
    }

    /**
     * Memperbarui rundown.
     */
    public function update(Request $request, Rundown $rundown)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_rundown' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
            'penanggung_jawab' => 'nullable|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $rundown->update($validated);

        return redirect()
            ->route('eo.rundown.index')
            ->with('success', 'Rundown berhasil diperbarui.');
    }

    /**
     * Menghapus rundown.
     */
    public function destroy(Rundown $rundown)
    {
        $rundown->delete();

        return redirect()
            ->route('eo.rundown.index')
            ->with('success', 'Rundown berhasil dihapus.');
    }
}