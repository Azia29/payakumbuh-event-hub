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
        $user = Auth::user();

        return view('eo.events.edit', compact('user', 'event'));
    }

    public function update(Request $request, Event $event)
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

        $event->update($validated);

        return redirect()
            ->route('eo.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('eo.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}