<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Panitia;
use App\Models\TugasPanitia;
use App\Models\PaketSponsorship;
use App\Models\PengajuanSponsor;

class EoDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK EVENT
        |--------------------------------------------------------------------------
        */

        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'active',
            'published'
        ])->count();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK PANITIA
        |--------------------------------------------------------------------------
        */

        $totalPanitia = Panitia::count();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK TUGAS PANITIA
        |--------------------------------------------------------------------------
        */

        $totalTugas = TugasPanitia::count();

        $tugasBelumDimulai = TugasPanitia::where(
            'status',
            'belum_dimulai'
        )->count();

        $tugasBerjalan = TugasPanitia::where(
            'status',
            'sedang_dikerjakan'
        )->count();

        $tugasSelesai = TugasPanitia::where(
            'status',
            'selesai'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK SPONSORSHIP
        |--------------------------------------------------------------------------
        */

        $totalPaket = PaketSponsorship::count();

        $totalPengajuan = PengajuanSponsor::count();

        /*
        |--------------------------------------------------------------------------
        | EVENT TERBARU
        |--------------------------------------------------------------------------
        */

        $events = Event::latest()
            ->take(5)
            ->get();

        return view('eo.dashboard.index', compact(
            'user',
            'totalEvent',
            'eventAktif',
            'totalPanitia',
            'totalTugas',
            'tugasBelumDimulai',
            'tugasBerjalan',
            'tugasSelesai',
            'totalPaket',
            'totalPengajuan',
            'events'
        ));
    }
}