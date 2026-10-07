<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Event;
use App\Models\EventPanitia;
use App\Models\Panitia;
use App\Models\TugasPanitia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TugasPanitiaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $tugas = TugasPanitia::with([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ])
        ->latest()
        ->get();

        return view(
            'eo.panitia.tugas.index',
            compact('user', 'tugas')
        );
    }

    public function create()
    {
        $user = auth()->user();

        $events = Event::orderBy('nama_event')->get();

        $panitias = Panitia::orderBy('nama')->get();

        $divisis = Divisi::orderBy('nama_divisi')->get();

        return view(
            'eo.panitia.tugas.create',
            compact(
                'user',
                'events',
                'panitias',
                'divisis'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'panitia_id' => 'required|exists:panitias,id',
            'divisi_id' => 'required|exists:divisis,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'jam_mulai' => 'nullable',
            'jam_selesai' => 'nullable',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $eventPanitia = EventPanitia::firstOrCreate(
            [
                'event_id' => $validated['event_id'],
                'panitia_id' => $validated['panitia_id'],
            ],
            [
                'divisi_id' => $validated['divisi_id'],
            ]
        );

        $eventPanitia->update([
            'divisi_id' => $validated['divisi_id'],
        ]);

        TugasPanitia::create([
            'event_panitia_id' => $eventPanitia->id,
            'judul_tugas' => $validated['judul_tugas'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'tanggal' => $validated['tanggal'] ?? null,
            'jam_mulai' => $validated['jam_mulai'] ?? null,
            'jam_selesai' => $validated['jam_selesai'] ?? null,
            'lokasi' => $validated['lokasi'] ?? null,
            'status' => 'belum_dimulai',
            'token' => Str::random(64),
        ]);

        return redirect()
            ->route('eo.panitia.tugas.index')
            ->with('success', 'Tugas panitia berhasil dibuat.');
    }

    public function show(TugasPanitia $tugasPanitia)
    {
        $user = auth()->user();

        $tugasPanitia->load([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ]);

        return view(
            'eo.panitia.tugas.show',
            compact('user', 'tugasPanitia')
        );
    }

    public function updateStatus(
        Request $request,
        TugasPanitia $tugasPanitia
    ) {
        $validated = $request->validate([
            'status' => 'required|in:belum_dimulai,sedang_dikerjakan,selesai',
            'catatan_panitia' => 'nullable|string',
        ]);

        $tugasPanitia->update($validated);

        return back()->with(
            'success',
            'Status tugas berhasil diperbarui.'
        );
    }

    public function destroy(TugasPanitia $tugasPanitia)
    {
        $tugasPanitia->delete();

        return redirect()
            ->route('eo.panitia.tugas.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }

    public function publicTask(string $token)
    {
        $tugasPanitia = TugasPanitia::with([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ])
        ->where('token', $token)
        ->firstOrFail();

        return view(
            'panitia.tugas',
            compact('tugasPanitia')
        );
    }

    public function publicUpdate(
        Request $request,
        string $token
    ) {
        $validated = $request->validate([
            'status' => 'required|in:belum_dimulai,sedang_dikerjakan,selesai',
            'catatan_panitia' => 'nullable|string',
        ]);

        $tugasPanitia = TugasPanitia::where(
            'token',
            $token
        )->firstOrFail();

        $tugasPanitia->update($validated);

        return back()->with(
            'success',
            'Status tugas berhasil diperbarui.'
        );
    }
}