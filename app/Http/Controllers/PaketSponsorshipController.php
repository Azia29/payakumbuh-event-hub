<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PaketSponsorship;
use Illuminate\Http\Request;

class PaketSponsorshipController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $pakets = PaketSponsorship::with('event')
            ->latest()
            ->get();

        return view(
            'eo.sponsorship.paket.index',
            compact('user', 'pakets')
        );
    }

    public function create()
    {
        $user = auth()->user();

        $events = Event::orderBy('nama_event')->get();

        return view(
            'eo.sponsorship.paket.create',
            compact('user', 'events')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'benefit' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        PaketSponsorship::create($validated);

        return redirect()
            ->route('eo.sponsorship.paket.index')
            ->with('success', 'Paket sponsorship berhasil ditambahkan.');
    }

    public function show(PaketSponsorship $paketSponsorship)
    {
        $user = auth()->user();

        $paketSponsorship->load('event');

        return view(
            'eo.sponsorship.paket.show',
            compact('user', 'paketSponsorship')
        );
    }

    public function edit(PaketSponsorship $paketSponsorship)
    {
        $user = auth()->user();

        $events = Event::orderBy('nama_event')->get();

        return view(
            'eo.sponsorship.paket.edit',
            compact('user', 'paketSponsorship', 'events')
        );
    }

    public function update(
        Request $request,
        PaketSponsorship $paketSponsorship
    ) {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'benefit' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $paketSponsorship->update($validated);

        return redirect()
            ->route('eo.sponsorship.paket.index')
            ->with('success', 'Paket sponsorship berhasil diperbarui.');
    }

    public function destroy(PaketSponsorship $paketSponsorship)
    {
        $paketSponsorship->delete();

        return redirect()
            ->route('eo.sponsorship.paket.index')
            ->with('success', 'Paket sponsorship berhasil dihapus.');
    }
}