<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $dokumentasis = Dokumentasi::with('event')
            ->latest()
            ->get();

        return view('eo.dokumentasi.index', compact(
            'user',
            'dokumentasis'
        ));
    }

    public function create()
    {
        $user = Auth::user();
        $events = Event::orderBy('nama_event')->get();

        return view('eo.dokumentasi.create', compact(
            'user',
            'events'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'judul' => ['required', 'string', 'max:255'],
            'jenis' => ['required', 'string', 'max:100'],
            'tanggal' => ['required', 'date'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request
                ->file('file')
                ->store('dokumentasi', 'public');
        }

        Dokumentasi::create($validated);

        return redirect()
            ->route('eo.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil ditambahkan.');
    }

    public function show(Dokumentasi $dokumentasi)
    {
        $user = Auth::user();

        $dokumentasi->load('event');

        return view('eo.dokumentasi.show', compact(
            'user',
            'dokumentasi'
        ));
    }

    public function edit(Dokumentasi $dokumentasi)
    {
        $user = Auth::user();
        $events = Event::orderBy('nama_event')->get();

        return view('eo.dokumentasi.edit', compact(
            'user',
            'dokumentasi',
            'events'
        ));
    }

    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        $validated = $request->validate([
            'event_id' => ['required', 'exists:events,id'],
            'judul' => ['required', 'string', 'max:255'],
            'jenis' => ['required', 'string', 'max:100'],
            'tanggal' => ['required', 'date'],
            'keterangan' => ['nullable', 'string'],
            'file' => ['nullable', 'file', 'max:10240'],
        ]);

        if ($request->hasFile('file')) {

            if (
                $dokumentasi->file &&
                Storage::disk('public')->exists($dokumentasi->file)
            ) {
                Storage::disk('public')->delete(
                    $dokumentasi->file
                );
            }

            $validated['file'] = $request
                ->file('file')
                ->store('dokumentasi', 'public');
        }

        $dokumentasi->update($validated);

        return redirect()
            ->route('eo.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    public function destroy(Dokumentasi $dokumentasi)
    {
        if (
            $dokumentasi->file &&
            Storage::disk('public')->exists($dokumentasi->file)
        ) {
            Storage::disk('public')->delete(
                $dokumentasi->file
            );
        }

        $dokumentasi->delete();

        return redirect()
            ->route('eo.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil dihapus.');
    }
}