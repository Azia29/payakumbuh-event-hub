<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Event;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Rundown;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class LaporanController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');

        $user = Auth::user();

        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $eventDraft = Event::where('status', 'draft')->count();

        $totalRundown = Rundown::count();
        $totalJadwal = Jadwal::count();
        $totalKegiatan = Kegiatan::count();

        // Sponsorship
        $totalPaket = $this->hitung(\App\Models\PaketSponsorship::class);
        $totalPengajuan = $this->hitung(\App\Models\PengajuanSponsor::class);
        $pengajuanNegosiasi = class_exists(\App\Models\PengajuanSponsor::class)
            ? \App\Models\PengajuanSponsor::where('status', 'negosiasi')->count()
            : 0;
        $totalDukungan = $this->hitung(\App\Models\DukunganSponsor::class);

        // Panitia
        $totalPanitia = $this->hitung(\App\Models\Panitia::class);

        // Dokumentasi
        $dokDraft = Dokumentasi::where('status', 'draft')->count();
        $dokDiajukan = Dokumentasi::where('status', 'diajukan')->count();
        $dokDipublikasi = Dokumentasi::where('status', 'dipublikasi')->count();

        $dokumentasiPerEvent = Dokumentasi::selectRaw('event_id, COUNT(*) as total')
            ->groupBy('event_id')
            ->pluck('total', 'event_id');

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
            'eventDraft',
            'totalRundown',
            'totalJadwal',
            'totalKegiatan',
            'totalPaket',
            'totalPengajuan',
            'pengajuanNegosiasi',
            'totalDukungan',
            'totalPanitia',
            'dokDraft',
            'dokDiajukan',
            'dokDipublikasi',
            'dokumentasiPerEvent',
            'events'
        ));
    }

    private function hitung(string $model): int
    {
        if (! class_exists($model)) {
            return 0;
        }

        $tabel = (new $model)->getTable();

        return Schema::hasTable($tabel) ? $model::count() : 0;
    }
}