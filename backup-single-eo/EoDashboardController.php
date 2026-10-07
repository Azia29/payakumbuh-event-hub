<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Dokumentasi;
use App\Models\Panitia;
use App\Models\Rundown;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;

class EoDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $divisi = $user->divisi?->nama_divisi;

        return match ($divisi) {

            'Ketua' => $this->dashboardKetua($user),

            'Acara' => $this->dashboardAcara($user),

            'Humas' => $this->dashboardHumas($user),

            'Sponsorship' => $this->dashboardSponsorship($user),

            'Dokumentasi' => $this->dashboardDokumentasi($user),

            default => abort(
                403,
                'Divisi akun belum ditentukan.'
            ),
        };
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD KETUA
    |--------------------------------------------------------------------------
    */

    private function dashboardKetua($user)
    {
        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $eventSelesai = Event::whereIn('status', [
            'selesai',
        ])->count();

        $totalPanitia = Panitia::count();

        $totalRundown = Rundown::count();

        $totalJadwal = Jadwal::count();

        $totalKegiatan = Kegiatan::count();

        $totalSponsor = Sponsor::count();

        $eventTerbaru = Event::latest()
            ->take(5)
            ->get();

        return view(
            'eo.dashboard.ketua',
            compact(
                'user',
                'totalEvent',
                'eventAktif',
                'eventSelesai',
                'totalPanitia',
                'totalRundown',
                'totalJadwal',
                'totalKegiatan',
                'totalSponsor',
                'eventTerbaru'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ACARA
    |--------------------------------------------------------------------------
    */

    private function dashboardAcara($user)
    {
        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $totalRundown = Rundown::count();

        $totalJadwal = Jadwal::count();

        $totalKegiatan = Kegiatan::count();

        $rundowns = Rundown::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(5)
            ->get();

        $jadwals = Jadwal::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(5)
            ->get();

        $kegiatan = Kegiatan::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(5)
            ->get();

        return view(
            'eo.dashboard.acara',
            compact(
                'user',
                'totalEvent',
                'eventAktif',
                'totalRundown',
                'totalJadwal',
                'totalKegiatan',
                'rundowns',
                'jadwals',
                'kegiatan'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD HUMAS
    |--------------------------------------------------------------------------
    */

    private function dashboardHumas($user)
    {
        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $eventMendatang = Event::whereDate(
            'tgl_mulai',
            '>=',
            now()->toDateString()
        )
            ->orderBy('tgl_mulai')
            ->take(5)
            ->get();

        $eventTerbaru = Event::latest()
            ->take(5)
            ->get();

        return view(
            'eo.dashboard.humas',
            compact(
                'user',
                'totalEvent',
                'eventAktif',
                'eventMendatang',
                'eventTerbaru'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD SPONSORSHIP
    |--------------------------------------------------------------------------
    */

    private function dashboardSponsorship($user)
    {
        $totalSponsor = Sponsor::count();

        $calonSponsor = Sponsor::where(
            'status',
            'calon'
        )->count();

        $proposalDikirim = Sponsor::where(
            'status',
            'proposal_dikirim'
        )->count();

        $negosiasi = Sponsor::where(
            'status',
            'negosiasi'
        )->count();

        $disetujui = Sponsor::where(
            'status',
            'disetujui'
        )->count();

        $totalDukungan = Sponsor::where(
            'status',
            'disetujui'
        )->sum('nominal_dukungan');

        $sponsors = Sponsor::with('event')
            ->latest()
            ->take(8)
            ->get();

        return view(
            'eo.dashboard.sponsorship',
            compact(
                'user',
                'totalSponsor',
                'calonSponsor',
                'proposalDikirim',
                'negosiasi',
                'disetujui',
                'totalDukungan',
                'sponsors'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD DOKUMENTASI
    |--------------------------------------------------------------------------
    */

    private function dashboardDokumentasi($user)
    {
        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $totalDokumentasi = Dokumentasi::count();

        $totalFoto = Dokumentasi::whereRaw(
            'LOWER(jenis) = ?',
            ['foto']
        )->count();

        $totalVideo = Dokumentasi::whereRaw(
            'LOWER(jenis) = ?',
            ['video']
        )->count();

        $eventTerdokumentasi = Dokumentasi::distinct(
            'event_id'
        )->count('event_id');

        $dokumentasiTerbaru = Dokumentasi::with('event')
            ->latest()
            ->take(8)
            ->get();

        $eventMendatang = Event::whereDate(
            'tgl_mulai',
            '>=',
            now()->toDateString()
        )
            ->orderBy('tgl_mulai')
            ->take(5)
            ->get();

        $kegiatanMendatang = Kegiatan::with('event')
            ->whereDate(
                'tanggal',
                '>=',
                now()->toDateString()
            )
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(8)
            ->get();

        $eventTerbaru = Event::latest()
            ->take(5)
            ->get();

        return view(
            'eo.dashboard.dokumentasi',
            compact(
                'user',
                'totalEvent',
                'eventAktif',
                'totalDokumentasi',
                'totalFoto',
                'totalVideo',
                'eventTerdokumentasi',
                'dokumentasiTerbaru',
                'eventMendatang',
                'kegiatanMendatang',
                'eventTerbaru'
            )
        );
    }
}

