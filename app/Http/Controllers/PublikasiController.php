<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublikasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $publikasis = Publikasi::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('eo.publikasi.index', compact('user', 'publikasis'));
    }

    public function create()
    {
        $user = Auth::user();

        $events = Event::orderBy('tgl_mulai')->get();

        return view('eo.publikasi.create', compact('user', 'events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'judul' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] =
                $request->file('gambar')->store('publikasi', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        Publikasi::create($validated);

        return redirect()
            ->route('eo.publikasi.index')
            ->with(
                'success',
                'Publikasi berhasil dibuat dan disimpan sebagai Draft.'
            );
    }

    public function show(Publikasi $publikasi)
    {
        $user = Auth::user();

        abort_unless(
            $publikasi->user_id === Auth::id(),
            403
        );

        $publikasi->load('event');

        return view(
            'eo.publikasi.show',
            compact('user', 'publikasi')
        );
    }

    public function edit(Publikasi $publikasi)
    {
        $user = Auth::user();

        abort_unless(
            $publikasi->user_id === Auth::id(),
            403
        );

        if ($publikasi->status === 'diajukan') {
            return redirect()
                ->route('eo.publikasi.index')
                ->with(
                    'error',
                    'Publikasi yang sedang diajukan tidak dapat diedit.'
                );
        }

        $events = Event::orderBy('tgl_mulai')->get();

        return view(
            'eo.publikasi.edit',
            compact('user', 'publikasi', 'events')
        );
    }

    public function update(
        Request $request,
        Publikasi $publikasi
    ) {
        abort_unless(
            $publikasi->user_id === Auth::id(),
            403
        );

        if ($publikasi->status === 'diajukan') {
            return redirect()
                ->route('eo.publikasi.index')
                ->with(
                    'error',
                    'Publikasi yang sedang diajukan tidak dapat diedit.'
                );
        }

        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'judul' => 'required|string|max:255',
            'jenis' => 'required|string|max:50',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] =
                $request->file('gambar')->store('publikasi', 'public');
        }

        $publikasi->update($validated);

        return redirect()
            ->route('eo.publikasi.index')
            ->with(
                'success',
                'Publikasi berhasil diperbarui.'
            );
    }

    public function destroy(Publikasi $publikasi)
    {
        abort_unless(
            $publikasi->user_id === Auth::id(),
            403
        );

        if ($publikasi->status === 'diajukan') {
            return redirect()
                ->route('eo.publikasi.index')
                ->with(
                    'error',
                    'Publikasi yang sedang diajukan tidak dapat dihapus.'
                );
        }

        $publikasi->delete();

        return redirect()
            ->route('eo.publikasi.index')
            ->with(
                'success',
                'Publikasi berhasil dihapus.'
            );
    }

    public function ajukan(Publikasi $publikasi)
    {
        abort_unless(
            $publikasi->user_id === Auth::id(),
            403
        );

        if (!in_array(
            $publikasi->status,
            ['draft', 'ditolak']
        )) {
            return redirect()
                ->route('eo.publikasi.index')
                ->with(
                    'error',
                    'Publikasi ini tidak dapat diajukan.'
                );
        }

        $publikasi->update([
            'status' => 'diajukan',
            'catatan_admin' => null,
        ]);

        return redirect()
            ->route('eo.publikasi.index')
            ->with(
                'success',
                'Publikasi berhasil diajukan kepada Admin.'
            );
    }
}