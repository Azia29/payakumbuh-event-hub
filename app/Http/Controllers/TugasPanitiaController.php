<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPanitia;
use App\Models\Panitia;
use App\Models\TugasPanitia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TugasPanitiaController extends Controller
{
    /**
     * Daftar tugas untuk EO.
     * EO hanya melihat dan memantau tugas.
     */
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

        return view('eo.panitia.tugas.index', compact(
            'user',
            'tugas'
        ));
    }

    /**
     * Form membuat tugas.
     */
    public function create()
    {
        $user = auth()->user();

        $events = Event::orderBy('tgl_mulai')->get();

        $panitia = Panitia::with('event')
            ->orderBy('nama')
            ->get();

        return view('eo.panitia.tugas.create', compact(
            'user',
            'events',
            'panitia'
        ));
    }

    /**
     * Simpan tugas baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_panitia_id' => [
                'required',
                'exists:event_panitias,id',
            ],
            'judul_tugas' => [
                'required',
                'string',
                'max:255',
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'jam_mulai' => [
                'nullable',
                'date_format:H:i',
            ],
            'jam_selesai' => [
                'nullable',
                'date_format:H:i',
            ],
            'lokasi' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $eventPanitia = EventPanitia::findOrFail(
            $validated['event_panitia_id']
        );

        $validated['status'] = 'belum_dimulai';
        $validated['token'] = Str::random(64);

        $tugas = TugasPanitia::create($validated);

        return redirect()
            ->route('eo.panitia.tugas.show', $tugas)
            ->with('success', 'Tugas berhasil dibuat dan diberikan kepada panitia.');
    }

    /**
     * Detail tugas untuk EO.
     */
    public function show(TugasPanitia $tugasPanitia)
    {
        $user = auth()->user();

        $tugasPanitia->load([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ]);

        return view('eo.panitia.tugas.show', compact(
            'user',
            'tugasPanitia'
        ));
    }

    /**
     * EO TIDAK BOLEH mengubah status tugas.
     */
    public function updateStatus(Request $request, TugasPanitia $tugasPanitia)
    {
        abort(
            403,
            'EO tidak diperbolehkan mengubah status tugas. Status hanya dapat diperbarui oleh panitia yang ditugaskan.'
        );
    }

    /**
     * Hapus tugas.
     */
    public function destroy(TugasPanitia $tugasPanitia)
    {
        $tugasPanitia->delete();

        return redirect()
            ->route('eo.panitia.tugas.index')
            ->with('success', 'Tugas berhasil dihapus.');
    }

    /**
     * Halaman tugas milik panitia.
     */
    public function panitiaTask(TugasPanitia $tugasPanitia)
    {
        $user = auth()->user();

        if (strtoupper((string) $user->role) !== 'PANITIA') {
            abort(403, 'Akses hanya untuk Panitia.');
        }

        if (!$user->panitia_id) {
            abort(403, 'Akun belum terhubung dengan data Panitia.');
        }

        $tugasPanitia->load([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ]);

        if (
            !$tugasPanitia->eventPanitia ||
            $tugasPanitia->eventPanitia->panitia_id !== $user->panitia_id
        ) {
            abort(403, 'Anda tidak memiliki akses ke tugas ini.');
        }

        return view('panitia.tugas.show', compact(
            'user',
            'tugasPanitia'
        ));
    }

    /**
     * Panitia mengubah status tugas miliknya sendiri.
     *
     * Status harus berurutan:
     * belum_dimulai
     *      ?
     * sedang_dikerjakan
     *      ?
     * selesai
     */
    public function panitiaUpdateStatus(
        Request $request,
        TugasPanitia $tugasPanitia
    ) {
        $user = auth()->user();

        if (strtoupper((string) $user->role) !== 'PANITIA') {
            abort(403, 'Akses hanya untuk Panitia.');
        }

        if (!$user->panitia_id) {
            abort(403, 'Akun belum terhubung dengan data Panitia.');
        }

        $tugasPanitia->load('eventPanitia');

        if (
            !$tugasPanitia->eventPanitia ||
            $tugasPanitia->eventPanitia->panitia_id !== $user->panitia_id
        ) {
            abort(403, 'Anda tidak memiliki akses untuk mengubah tugas ini.');
        }

        $validated = $request->validate([
            'status' => [
                'required',
                'in:belum_dimulai,sedang_dikerjakan,selesai',
            ],
            'catatan_panitia' => [
                'nullable',
                'string',
            ],
        ]);

        $current = $tugasPanitia->status;
        $next = $validated['status'];

        $allowed = [
            'belum_dimulai' => ['belum_dimulai', 'sedang_dikerjakan'],
            'sedang_dikerjakan' => ['sedang_dikerjakan', 'selesai'],
            'selesai' => ['selesai'],
        ];

        if (!in_array($next, $allowed[$current] ?? [], true)) {
            return back()
                ->withErrors([
                    'status' => 'Status tugas harus dilakukan secara berurutan.',
                ])
                ->withInput();
        }

        $tugasPanitia->update([
            'status' => $next,
            'catatan_panitia' => $validated['catatan_panitia'] ?? null,
        ]);

        return back()->with(
            'success',
            'Status tugas berhasil diperbarui.'
        );
    }

    /**
     * Halaman tugas dari QR Code.
     *
     * QR hanya membuka informasi tugas.
     * QR tidak memberikan hak untuk mengubah data.
     */
    public function publicTask(string $token)
    {
        $tugasPanitia = TugasPanitia::with([
            'eventPanitia.event',
            'eventPanitia.panitia',
            'eventPanitia.divisi',
        ])
            ->where('token', $token)
            ->firstOrFail();

        return view('tugas.public', compact(
            'tugasPanitia'
        ));
    }

    /**
     * Halaman daftar tugas dari QR event/panitia.
     * Bersifat read-only.
     */
    public function publicPanitiaTasks(EventPanitia $eventPanitia)
    {
        $eventPanitia->load([
            'event',
            'panitia',
            'divisi',
            'tugasPanitia',
        ]);

        return view('tugas.panitia', compact(
            'eventPanitia'
        ));
    }

    /**
     * Sengaja tidak menyediakan update melalui QR publik.
     */
    public function publicUpdate()
    {
        abort(
            403,
            'Perubahan status tidak dapat dilakukan melalui QR publik.'
        );
    }

    /**
     * Halaman hasil scan QR panitia.
     * Hanya menampilkan tugas milik panitia pemilik token (read-only).
     */
    public function publicPanitiaByToken(string $token)
    {
        $panitia = Panitia::where('qr_token', $token)->firstOrFail();

        $tugas = TugasPanitia::whereHas('eventPanitia', function ($query) use ($panitia) {
            $query->where('panitia_id', $panitia->id);
        })
            ->with(['eventPanitia.event', 'eventPanitia.divisi'])
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('panitia.tugas-qr', compact('panitia', 'tugas'));
    }

    /**
     * Ubah status lewat QR sengaja ditutup.
     * Perubahan status hanya lewat login panitia.
     */
    public function publicUpdateStatusByQr(string $token, TugasPanitia $tugasPanitia)
    {
        abort(403, 'Perubahan status tidak dapat dilakukan melalui QR.');
    }}
