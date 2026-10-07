<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pengumumans = Pengumuman::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'eo.pengumuman.index',
            compact('user', 'pengumumans')
        );
    }

    public function create()
    {
        $user = Auth::user();

        $events = Event::orderBy('tgl_mulai')->get();

        return view(
            'eo.pengumuman.create',
            compact('user', 'events')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'draft';

        Pengumuman::create($validated);

        return redirect()
            ->route('eo.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil dibuat dan disimpan sebagai Draft.'
            );
    }

    public function show(Pengumuman $pengumuman)
    {
        $user = Auth::user();

        abort_unless(
            $pengumuman->user_id === Auth::id(),
            403
        );

        $pengumuman->load('event');

        return view(
            'eo.pengumuman.show',
            compact('user', 'pengumuman')
        );
    }

    public function edit(Pengumuman $pengumuman)
    {
        $user = Auth::user();

        abort_unless(
            $pengumuman->user_id === Auth::id(),
            403
        );

        if ($pengumuman->status === 'diajukan') {
            return redirect()
                ->route('eo.pengumuman.index')
                ->with(
                    'error',
                    'Pengumuman yang sedang diajukan tidak dapat diedit.'
                );
        }

        $events = Event::orderBy('tgl_mulai')->get();

        return view(
            'eo.pengumuman.edit',
            compact('user', 'pengumuman', 'events')
        );
    }

    public function update(
        Request $request,
        Pengumuman $pengumuman
    ) {
        abort_unless(
            $pengumuman->user_id === Auth::id(),
            403
        );

        if ($pengumuman->status === 'diajukan') {
            return redirect()
                ->route('eo.pengumuman.index')
                ->with(
                    'error',
                    'Pengumuman yang sedang diajukan tidak dapat diedit.'
                );
        }

        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $pengumuman->update($validated);

        return redirect()
            ->route('eo.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil diperbarui.'
            );
    }

    public function destroy(Pengumuman $pengumuman)
    {
        abort_unless(
            $pengumuman->user_id === Auth::id(),
            403
        );

        if ($pengumuman->status === 'diajukan') {
            return redirect()
                ->route('eo.pengumuman.index')
                ->with(
                    'error',
                    'Pengumuman yang sedang diajukan tidak dapat dihapus.'
                );
        }

        $pengumuman->delete();

        return redirect()
            ->route('eo.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil dihapus.'
            );
    }

    public function ajukan(Pengumuman $pengumuman)
    {
        abort_unless(
            $pengumuman->user_id === Auth::id(),
            403
        );

        if (!in_array(
            $pengumuman->status,
            ['draft', 'ditolak']
        )) {
            return redirect()
                ->route('eo.pengumuman.index')
                ->with(
                    'error',
                    'Pengumuman ini tidak dapat diajukan.'
                );
        }

        $pengumuman->update([
            'status' => 'diajukan',
            'catatan_admin' => null,
        ]);

        return redirect()
            ->route('eo.pengumuman.index')
            ->with(
                'success',
                'Pengumuman berhasil diajukan kepada Admin.'
            );
    }
}