<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPanitia;
use App\Models\Jadwal;
use App\Models\Panitia;
use App\Models\Rundown;
use App\Models\TugasPanitia;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK UTAMA
        |--------------------------------------------------------------------------
        */

        $totalEvent = Event::count();

        $eventAktif = Event::whereIn('status', [
            'aktif',
            'berlangsung',
            'disetujui',
        ])->count();

        $totalPanitia = Panitia::count();


        /*
        |--------------------------------------------------------------------------
        | PROGRESS KEGIATAN
        |--------------------------------------------------------------------------
        |
        | Progress kegiatan diambil dari status rundown.
        |
        */

        $rundowns = Rundown::query()->get();

        $kegiatanBelumDimulai = $rundowns->filter(function ($rundown) {
            return in_array(
                strtolower($rundown->status ?? 'draft'),
                ['draft', 'terjadwal']
            );
        })->count();

        $kegiatanBerjalan = $rundowns->filter(function ($rundown) {
            return strtolower($rundown->status ?? '') === 'berlangsung';
        })->count();

        $kegiatanSelesai = $rundowns->filter(function ($rundown) {
            return strtolower($rundown->status ?? '') === 'selesai';
        })->count();


        /*
        |--------------------------------------------------------------------------
        | PROGRESS TUGAS PANITIA
        |--------------------------------------------------------------------------
        */

        $tugasBelumDimulai = TugasPanitia::where(
            'status',
            'belum_dimulai'
        )->count();

        $tugasSedangDikerjakan = TugasPanitia::where(
            'status',
            'sedang_dikerjakan'
        )->count();

        $tugasSelesai = TugasPanitia::where(
            'status',
            'selesai'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | EVENT YANG DIMONITOR
        |--------------------------------------------------------------------------
        */

        $events = Event::orderBy('tgl_mulai')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | JADWAL TERDEKAT
        |--------------------------------------------------------------------------
        */

        $jadwals = Jadwal::with('event')
            ->orderBy('tanggal')
            ->orderBy('waktu_mulai')
            ->take(8)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MONITORING PANITIA
        |--------------------------------------------------------------------------
        */

        $panitias = Panitia::with('event')
            ->orderBy('nama')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | HITUNG TUGAS SETIAP PANITIA
        |--------------------------------------------------------------------------
        */

        $tugasPanitia = TugasPanitia::with([
            'eventPanitia',
            'eventPanitia.panitia',
        ])->get();

        $monitoringPanitia = $panitias->map(function ($panitia) use ($tugasPanitia) {

            $tasks = $tugasPanitia->filter(function ($task) use ($panitia) {
                return $task->eventPanitia &&
                    $task->eventPanitia->panitia_id == $panitia->id;
            });

            $totalTugas = $tasks->count();

            $tugasSelesaiPanitia = $tasks->where(
                'status',
                'selesai'
            )->count();

            $tugasBerjalanPanitia = $tasks->where(
                'status',
                'sedang_dikerjakan'
            )->count();

            $tugasBelumPanitia = $tasks->where(
                'status',
                'belum_dimulai'
            )->count();

            $progress = $totalTugas > 0
                ? round(($tugasSelesaiPanitia / $totalTugas) * 100)
                : 0;

            return [
                'panitia' => $panitia,
                'total_tugas' => $totalTugas,
                'tugas_selesai' => $tugasSelesaiPanitia,
                'tugas_berjalan' => $tugasBerjalanPanitia,
                'tugas_belum' => $tugasBelumPanitia,
                'progress' => $progress,
            ];
        });


        /*
        |--------------------------------------------------------------------------
        | PROGRESS SETIAP EVENT
        |--------------------------------------------------------------------------
        */

        $eventMonitoring = $events->map(function ($event) {

            $totalRundown = Rundown::where(
                'event_id',
                $event->id
            )->count();

            $totalJadwal = Jadwal::where(
                'event_id',
                $event->id
            )->count();

            $totalPanitiaEvent = Panitia::where(
                'event_id',
                $event->id
            )->count();

            $eventPanitiaIds = EventPanitia::where(
                'event_id',
                $event->id
            )->pluck('id');

            $totalTugas = TugasPanitia::whereIn(
                'event_panitia_id',
                $eventPanitiaIds
            )->count();

            $tugasSelesai = TugasPanitia::whereIn(
                'event_panitia_id',
                $eventPanitiaIds
            )->where(
                'status',
                'selesai'
            )->count();

            $progress = $totalTugas > 0
                ? round(($tugasSelesai / $totalTugas) * 100)
                : 0;

            return [
                'event' => $event,
                'total_rundown' => $totalRundown,
                'total_jadwal' => $totalJadwal,
                'total_panitia' => $totalPanitiaEvent,
                'total_tugas' => $totalTugas,
                'tugas_selesai' => $tugasSelesai,
                'progress' => $progress,
            ];
        });


        return view('eo.monitoring.index', compact(
            'user',

            'totalEvent',
            'eventAktif',
            'totalPanitia',

            'kegiatanBelumDimulai',
            'kegiatanBerjalan',
            'kegiatanSelesai',

            'tugasBelumDimulai',
            'tugasSedangDikerjakan',
            'tugasSelesai',

            'eventMonitoring',
            'jadwals',
            'monitoringPanitia'
        ));
    }
}