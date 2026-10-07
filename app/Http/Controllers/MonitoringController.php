<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Panitia;
use App\Models\Rundown;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $totalPanitia = Panitia::count();

        $totalRundown = Rundown::count();

        $totalJadwal = Jadwal::count();

        $totalKegiatan = Kegiatan::count();

        // Jumlah EO berdasarkan divisi
        $jumlahDivisi = User::where('role', 'EO')
            ->with('divisi')
            ->get()
            ->groupBy(function ($eo) {
                return $eo->divisi?->nama_divisi ?? 'Belum Ada Divisi';
            })
            ->map(fn ($items) => $items->count());

        // Event terbaru
        $events = Event::latest()
            ->take(10)
            ->get();

        // Rundown terdekat
        $rundowns = Rundown::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(5)
            ->get();

        return view('eo.monitoring.index', compact(
            'user',
            'totalEvent',
            'eventAktif',
            'totalPanitia',
            'totalRundown',
            'totalJadwal',
            'totalKegiatan',
            'jumlahDivisi',
            'events',
            'rundowns'
        ));
    }
}