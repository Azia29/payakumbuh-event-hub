<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $events = Event::latest()->get();

        return view('eo.events.index', compact('user', 'events'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('eo.events.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'nullable|string',

            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',

            'jenis_tiket' => 'required|in:gratis,berbayar',
            'harga_tiket' => 'required_if:jenis_tiket,berbayar|nullable|numeric|min:0',
            'kuota_tiket' => 'nullable|integer|min:1',

            'lokasi_event' => 'required|string|max:255',

            'latitude' => [
                'nullable',
                'numeric',
                'between:-90,90',
            ],

            'longitude' => [
                'nullable',
                'numeric',
                'between:-180,180',
            ],
        ]);

        if ($validated['jenis_tiket'] === 'gratis') {
            $validated['harga_tiket'] = 0;
        }

        if ($validated['jenis_tiket'] === 'berbayar' && empty($validated['harga_tiket'])) {
            return back()
                ->withErrors([
                    'harga_tiket' => 'Harga tiket wajib diisi untuk event berbayar.'
                ])
                ->withInput();
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        Event::create($validated);

        return redirect()
            ->route('eo.events.index')
            ->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event)
    {
        $user = Auth::user();

        return view('eo.events.show', compact('user', 'event'));
    }

    public function edit(Event $event)
    {
        if (! in_array(strtolower($event->status ?? 'draft'), ['draft', 'ditolak'])) {
            return redirect()
                ->route('eo.events.show', $event)
                ->with('error', 'Event yang sedang diajukan atau sudah disetujui admin tidak bisa diubah oleh EO.');
        }
        $user = Auth::user();

        return view('eo.events.edit', compact('user', 'event'));
    }

    public function update(Request $request, Event $event)
    {
        if (! in_array(strtolower($event->status ?? 'draft'), ['draft', 'ditolak'])) {
            return redirect()
                ->route('eo.events.show', $event)
                ->with('error', 'Event yang sedang diajukan atau sudah disetujui admin tidak bisa diubah oleh EO.');
        }
        $validated = $request->validate([
            'nama_event' => 'required|string|max:255',
            'deskripsi_event' => 'nullable|string',

            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after_or_equal:tgl_mulai',

            'lokasi_event' => 'required|string|max:255',

            'latitude' => [
                'nullable',
                'numeric',
                'between:-90,90',
            ],

            'longitude' => [
                'nullable',
                'numeric',
                'between:-180,180',
            ],
        ]);

        $event->update($validated);

        return redirect()
            ->route('eo.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function ajukan(Event $event)
    {
        $status = strtolower($event->status ?? 'draft');

        if (! in_array($status, ['draft', 'ditolak'])) {
            return back()->with('error', 'Hanya event berstatus draft atau ditolak yang bisa diajukan.');
        }

        $event->update([
            'status' => 'menunggu',
            'alasan_penolakan' => null,
        ]);

        return back()->with('success', 'Event berhasil diajukan ke admin untuk dipublikasi.');
    }

    public function batalkanPengajuan(Event $event)
    {
        if (strtolower($event->status ?? '') !== 'menunggu') {
            return back()->with('error', 'Hanya pengajuan yang masih menunggu admin yang bisa dibatalkan.');
        }

        $event->update(['status' => 'draft']);

        return back()->with('success', 'Pengajuan dibatalkan. Event kembali menjadi draft.');
    }

    public function destroy(Event $event)
    {
        if (! in_array(strtolower($event->status ?? 'draft'), ['draft', 'ditolak'])) {
            return back()->with('error', 'Event yang sedang diajukan atau sudah disetujui admin tidak bisa dihapus oleh EO.');
        }
        $event->delete();

        return redirect()
            ->route('eo.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}