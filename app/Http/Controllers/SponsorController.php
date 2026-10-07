<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Menampilkan daftar sponsor.
     */
    public function index()
    {
        $user = auth()->user();

        $sponsors = Sponsor::with('event')
            ->latest()
            ->get();

        return view(
            'eo.sponsorship.index',
            compact(
                'user',
                'sponsors'
            )
        );
    }

    /**
     * Menampilkan form tambah sponsor.
     */
    public function create()
    {
        $user = auth()->user();

        $events = Event::orderBy('nama_event')->get();

        return view(
            'eo.sponsorship.create',
            compact(
                'user',
                'events'
            )
        );
    }

    /**
     * Menyimpan sponsor baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'nama_perusahaan' => 'required|string|max:255',
            'nama_kontak' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'jenis_dukungan' => 'nullable|string|max:255',
            'nominal_dukungan' => 'nullable|numeric|min:0',
            'status' => 'required|in:calon,proposal_dikirim,negosiasi,disetujui,ditolak,selesai',
            'keterangan' => 'nullable|string',
        ]);

        Sponsor::create($validated);

        return redirect()
            ->route('eo.sponsorship.index')
            ->with('success', 'Data sponsor berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail sponsor.
     */
    public function show(Sponsor $sponsor)
    {
        $user = auth()->user();

        $sponsor->load('event');

        return view(
            'eo.sponsorship.show',
            compact(
                'user',
                'sponsor'
            )
        );
    }

    /**
     * Menampilkan form edit sponsor.
     */
    public function edit(Sponsor $sponsor)
    {
        $user = auth()->user();

        $events = Event::orderBy('nama_event')->get();

        return view(
            'eo.sponsorship.edit',
            compact(
                'user',
                'sponsor',
                'events'
            )
        );
    }

    /**
     * Memperbarui sponsor.
     */
    public function update(
        Request $request,
        Sponsor $sponsor
    ) {
        $validated = $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'nama_perusahaan' => 'required|string|max:255',
            'nama_kontak' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'alamat' => 'nullable|string',
            'jenis_dukungan' => 'nullable|string|max:255',
            'nominal_dukungan' => 'nullable|numeric|min:0',
            'status' => 'required|in:calon,proposal_dikirim,negosiasi,disetujui,ditolak,selesai',
            'keterangan' => 'nullable|string',
        ]);

        $sponsor->update($validated);

        return redirect()
            ->route('eo.sponsorship.index')
            ->with('success', 'Data sponsor berhasil diperbarui.');
    }

    /**
     * Menghapus sponsor.
     */
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();

        return redirect()
            ->route('eo.sponsorship.index')
            ->with('success', 'Data sponsor berhasil dihapus.');
    }
}

