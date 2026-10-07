<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Panitia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanitiaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $panitia = Panitia::with('event')
            ->latest()
            ->get();

        return view('eo.panitia.index', compact(
            'user',
            'panitia'
        ));
    }

    public function create()
    {
        $user = Auth::user();
        $events = Event::orderBy('tgl_mulai')->get();

        return view('eo.panitia.create', compact(
            'user',
            'events'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'no_hp' => ['nullable', 'string', 'max:30'],
            'divisi' => [
                'required',
                'in:Ketua,Acara,Humas,Sponsorship,Dokumentasi'
            ],
            'keterangan' => ['nullable', 'string'],
        ]);

        Panitia::create($validated);

        return redirect()
            ->route('eo.panitia.index')
            ->with('success', 'Data panitia berhasil ditambahkan.');
    }

    public function edit(Panitia $panitia)
    {
        $user = Auth::user();
        $events = Event::orderBy('tgl_mulai')->get();

        return view('eo.panitia.edit', compact(
            'user',
            'panitia',
            'events'
        ));
    }

    public function update(Request $request, Panitia $panitia)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'no_hp' => ['nullable', 'string', 'max:30'],
            'divisi' => [
                'required',
                'in:Ketua,Acara,Humas,Sponsorship,Dokumentasi'
            ],
            'keterangan' => ['nullable', 'string'],
        ]);

        $panitia->update($validated);

        return redirect()
            ->route('eo.panitia.index')
            ->with('success', 'Data panitia berhasil diperbarui.');
    }

    public function destroy(Panitia $panitia)
    {
        $panitia->delete();

        return redirect()
            ->route('eo.panitia.index')
            ->with('success', 'Data panitia berhasil dihapus.');
    }
}