<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kegiatan;
use App\Models\Jadwal;
use App\Models\Rundown;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
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

        $totalRundown = Rundown::count();

        $totalJadwal = Jadwal::count();

        $totalKegiatan = Kegiatan::count();

        $events = Event::with([
            'rundowns',
            'jadwals',
            'kegiatans',
        ])
        ->latest()
        ->get();

        return view('eo.laporan.index', compact(
            'user',
            'totalEvent',
            'eventAktif',
            'totalRundown',
            'totalJadwal',
            'totalKegiatan',
            'events'
        ));
    }
}