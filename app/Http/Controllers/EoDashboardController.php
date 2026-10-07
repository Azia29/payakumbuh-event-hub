<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Panitia;
use App\Models\Dokumentasi;
use App\Models\Perlengkapan;
use App\Models\PaketSponsorship;
use App\Models\PengajuanSponsor;

class EoDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'active',
            'published'
        ])->count();

        $totalPanitia = Panitia::count();

        $totalDokumentasi = Dokumentasi::count();

        $totalPerlengkapan = Perlengkapan::count();

        $totalPaket = PaketSponsorship::count();

        $totalPengajuan = PengajuanSponsor::count();

        $events = Event::latest()->take(5)->get();

        return view('eo.dashboard.index', compact(
            'user',
            'totalEvent',
            'eventAktif',
            'totalPanitia',
            'totalDokumentasi',
            'totalPerlengkapan',
            'totalPaket',
            'totalPengajuan',
            'events'
        ));
    }
}