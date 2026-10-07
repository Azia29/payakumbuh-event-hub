<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EoDashboardController;
use App\Http\Controllers\RundownController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\HumasController;
use App\Http\Controllers\TugasPanitiaController;

use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PaketSponsorshipController;
use App\Http\Controllers\PengajuanSponsorController;
use App\Http\Controllers\NegosiasiSponsorController;
use App\Http\Controllers\DukunganSponsorController;

use App\Http\Controllers\AdminPublikasiController;
use App\Http\Middleware\EoMiddleware;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/tentang', 'tentang')->name('tentang');

Route::view('/kontak', 'kontak')->name('kontak');

Route::get('/event', [EventController::class, 'publicIndex'])
    ->name('event.public');

Route::get('/event/{event}', [EventController::class, 'publicShow'])
    ->name('event.public.show');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| EO - SINGLE ACCOUNT
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', EoMiddleware::class])
    ->prefix('eo')
    ->name('eo.')
    ->group(function () {

        /*
        | Dashboard
        */
        Route::get('/dashboard', [EoDashboardController::class, 'index'])
            ->name('dashboard');


        /*
        | Event
        */
        Route::resource('/events', EventController::class)
            ->names('events');


        /*
        | Rundown
        */
        Route::resource('/rundown', RundownController::class)
            ->names('rundown');


        /*
        | Jadwal
        */
        Route::resource('/jadwal', JadwalController::class)
            ->names('jadwal');


        /*
        | Kegiatan
        */
        Route::resource('/kegiatan', KegiatanController::class)
            ->names('kegiatan');


        /*
        | Perlengkapan
        */
        Route::resource('/perlengkapan', PerlengkapanController::class)
            ->names('perlengkapan');


        /*
        | Panitia
        */
        Route::resource('/panitia', PanitiaController::class)
            ->names('panitia')
            ->whereNumber('panitium');
        /*
        | Pembagian Tugas Panitia
        */
        Route::prefix('/panitia/tugas')
            ->name('panitia.tugas.')
            ->group(function () {
                Route::get('/', [TugasPanitiaController::class, 'index'])
                    ->name('index');

                Route::get('/create', [TugasPanitiaController::class, 'create'])
                    ->name('create');

                Route::post('/', [TugasPanitiaController::class, 'store'])
                    ->name('store');

                Route::get('/{tugasPanitia}', [TugasPanitiaController::class, 'show'])
                    ->name('show');

                Route::put('/{tugasPanitia}/status', [TugasPanitiaController::class, 'updateStatus'])
                    ->name('update-status');

                Route::delete('/{tugasPanitia}', [TugasPanitiaController::class, 'destroy'])
                    ->name('destroy');
            });


        /*
        | Dokumentasi
        */
        Route::resource('/dokumentasi', DokumentasiController::class)
            ->names('dokumentasi');


        /*
        | Monitoring
        */
        Route::get('/monitoring', [MonitoringController::class, 'index'])
            ->name('monitoring');


        /*
        | Laporan
        */
        Route::get('/laporan', [LaporanController::class, 'index'])
            ->name('laporan');


        /*
        | Pengumuman
        */
        Route::resource('/pengumuman', PengumumanController::class)
            ->names('pengumuman');

        Route::post(
            '/pengumuman/{pengumuman}/ajukan',
            [PengumumanController::class, 'ajukan']
        )->name('pengumuman.ajukan');


        /*
        | Publikasi
        */
        Route::resource('/publikasi', PublikasiController::class)
            ->names('publikasi');

        Route::post(
            '/publikasi/{publikasi}/ajukan',
            [PublikasiController::class, 'ajukan']
        )->name('publikasi.ajukan');


        /*
        | Humas
        */
        Route::get(
            '/kontak-komunikasi',
            [HumasController::class, 'kontakKomunikasi']
        )->name('kontak-komunikasi.index');

        Route::get(
            '/media-sosial',
            [HumasController::class, 'mediaSosial']
        )->name('media-sosial.index');

        Route::get(
            '/press-release',
            [HumasController::class, 'pressRelease']
        )->name('press-release.index');

        Route::get(
            '/monitoring-publikasi',
            [HumasController::class, 'monitoringPublikasi']
        )->name('monitoring-publikasi');

        Route::get(
            '/laporan-humas',
            [HumasController::class, 'laporanHumas']
        )->name('laporan-humas');


        /*
        | Sponsorship
        */

        // Paket Sponsorship
        Route::get(
            '/sponsorship/paket',
            [PaketSponsorshipController::class, 'index']
        )->name('sponsorship.paket.index');

        Route::get(
            '/sponsorship/paket/create',
            [PaketSponsorshipController::class, 'create']
        )->name('sponsorship.paket.create');

        Route::post(
            '/sponsorship/paket',
            [PaketSponsorshipController::class, 'store']
        )->name('sponsorship.paket.store');

        Route::get(
            '/sponsorship/paket/{paketSponsorship}',
            [PaketSponsorshipController::class, 'show']
        )->name('sponsorship.paket.show');

        Route::get(
            '/sponsorship/paket/{paketSponsorship}/edit',
            [PaketSponsorshipController::class, 'edit']
        )->name('sponsorship.paket.edit');

        Route::put(
            '/sponsorship/paket/{paketSponsorship}',
            [PaketSponsorshipController::class, 'update']
        )->name('sponsorship.paket.update');

        Route::delete(
            '/sponsorship/paket/{paketSponsorship}',
            [PaketSponsorshipController::class, 'destroy']
        )->name('sponsorship.paket.destroy');


        // Pengajuan Sponsor
        Route::get(
            '/sponsorship/pengajuan',
            [PengajuanSponsorController::class, 'index']
        )->name('sponsorship.pengajuan.index');

        Route::get(
            '/sponsorship/pengajuan/{pengajuanSponsor}',
            [PengajuanSponsorController::class, 'show']
        )->name('sponsorship.pengajuan.show');

        Route::put(
            '/sponsorship/pengajuan/{pengajuanSponsor}/status',
            [PengajuanSponsorController::class, 'updateStatus']
        )->name('sponsorship.pengajuan.status');


        // Negosiasi
        Route::get(
            '/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
            [NegosiasiSponsorController::class, 'index']
        )->name('sponsorship.negosiasi.index');

        Route::post(
            '/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
            [NegosiasiSponsorController::class, 'store']
        )->name('sponsorship.negosiasi.store');


        // Dukungan Sponsor
        Route::get(
            '/sponsorship/dukungan',
            [DukunganSponsorController::class, 'index']
        )->name('sponsorship.dukungan.index');

        Route::post(
            '/sponsorship/pengajuan/{pengajuanSponsor}/dukungan',
            [DukunganSponsorController::class, 'store']
        )->name('sponsorship.dukungan.store');


        /*
        | Profil
        */
        Route::get(
            '/profil',
            [ProfilController::class, 'index']
        )->name('profil');

        Route::put(
            '/profil',
            [ProfilController::class, 'update']
        )->name('profil.update');

        Route::put(
            '/profil/password',
            [ProfilController::class, 'updatePassword']
        )->name('profil.password');

    });


/*
|--------------------------------------------------------------------------
| TUGAS PANITIA - PUBLIC QR
|--------------------------------------------------------------------------
*/

Route::get(
    '/tugas-panitia/{eventPanitia}',
    [TugasPanitiaController::class, 'publicPanitiaTasks']
)->name('panitia.tugas.panitia');
Route::get(
    '/tugas/{token}',
    [TugasPanitiaController::class, 'publicTask']
)->name('panitia.tugas.public');

Route::put(
    '/tugas/{token}',
    [TugasPanitiaController::class, 'publicUpdate']
)->name('panitia.tugas.public.update');

/*
|--------------------------------------------------------------------------
| ADMIN PUBLIKASI
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/publikasi',
    [AdminPublikasiController::class, 'index']
)->name('admin.publikasi.index');

Route::get(
    '/admin/publikasi/{publikasi}',
    [AdminPublikasiController::class, 'show']
)->name('admin.publikasi.show');

Route::post(
    '/admin/publikasi/{publikasi}/setujui',
    [AdminPublikasiController::class, 'setujui']
)->name('admin.publikasi.setujui');

Route::post(
    '/admin/publikasi/{publikasi}/tolak',
    [AdminPublikasiController::class, 'tolak']
)->name('admin.publikasi.tolak');