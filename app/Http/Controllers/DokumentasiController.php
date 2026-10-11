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

    public function galeri(Request $request)
    {
        $user = Auth::user();
        $events = Event::orderBy('nama_event')->get();

        $items = Dokumentasi::with('event')
            ->dipublikasi()
            ->whereRaw("LOWER(jenis) IN ('foto', 'video')")
            ->when($request->filled('event_id'), function ($query) use ($request) {
                $query->where('event_id', $request->event_id);
            })
            ->latest('published_at')
            ->get();

        return view('eo.dokumentasi.galeri', compact('user', 'events', 'items'));
    }

    public function ajukan(Dokumentasi $dokumentasi)
    {
        if (($dokumentasi->status ?? 'draft') !== 'draft') {
            return back()->with('error', 'Hanya dokumentasi berstatus draft yang bisa diajukan.');
        }

        $dokumentasi->update(['status' => 'diajukan']);

        return back()->with('success', 'Dokumentasi berhasil diajukan ke admin untuk dipublikasi.');
    }

    public function batalkanPengajuan(Dokumentasi $dokumentasi)
    {
        if ($dokumentasi->status !== 'diajukan') {
            return back()->with('error', 'Hanya pengajuan yang masih menunggu admin yang bisa dibatalkan.');
        }

        $dokumentasi->update(['status' => 'draft']);

        return back()->with('success', 'Pengajuan dibatalkan. Dokumentasi kembali menjadi draft.');
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

        $validated['status'] = 'draft';

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
        if (($dokumentasi->status ?? 'draft') !== 'draft') {
            return redirect()
                ->route('eo.dokumentasi.show', $dokumentasi)
                ->with('error', 'Dokumentasi yang sedang diajukan atau sudah dipublikasi tidak bisa diedit oleh EO.');
        }

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
        if (in_array($dokumentasi->status, ['diajukan', 'dipublikasi'])) {
            return back()->with('error', 'Dokumentasi yang sedang diajukan atau sudah dipublikasi tidak bisa diubah atau dihapus oleh EO.');
        }

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
        if (in_array($dokumentasi->status, ['diajukan', 'dipublikasi'])) {
            return back()->with('error', 'Dokumentasi yang sedang diajukan atau sudah dipublikasi tidak bisa diubah atau dihapus oleh EO.');
        }

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