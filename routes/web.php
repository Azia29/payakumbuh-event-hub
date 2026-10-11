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
use App\Http\Controllers\PanitiaDashboardController;

use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PaketSponsorshipController;
use App\Http\Controllers\PengajuanSponsorController;
use App\Http\Controllers\NegosiasiSponsorController;
use App\Http\Controllers\DukunganSponsorController;
use App\Http\Controllers\SponsorAuthController;
use App\Http\Controllers\SponsorDashboardController;

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

Route::view('/tentang', 'tentang')
    ->name('tentang');

Route::view('/kontak', 'kontak')
    ->name('kontak');


/*
|--------------------------------------------------------------------------
| PUBLIC EVENT
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| SPONSOR AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get(
    '/sponsor/login',
    [SponsorAuthController::class, 'showLogin']
)->name('sponsor.login');

Route::post(
    '/sponsor/login',
    [SponsorAuthController::class, 'login']
)->name('sponsor.login.process');

Route::middleware('auth:sponsor')
    ->prefix('sponsor')
    ->name('sponsor.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [SponsorDashboardController::class, 'index']
        )->name('dashboard');

        Route::post(
            '/logout',
            [SponsorAuthController::class, 'logout']
        )->name('logout');
    });

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
|
| Semua fitur EO berada dalam satu akun.
| Divisi menentukan dashboard/tampilan yang digunakan.
|
*/

Route::middleware(['auth', EoMiddleware::class])
    ->prefix('eo')
    ->name('eo.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [EoDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | EVENT
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/events',
            EventController::class
        )->names('events');

        Route::patch('/events/{event}/ajukan', [EventController::class, 'ajukan'])->name('events.ajukan');
        Route::patch('/events/{event}/batalkan', [EventController::class, 'batalkanPengajuan'])->name('events.batalkan');


        /*
        |--------------------------------------------------------------------------
        | RUNDOWN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/rundown',
            RundownController::class
        )->names('rundown');


        /*
        |--------------------------------------------------------------------------
        | JADWAL
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/jadwal',
            JadwalController::class
        )->names('jadwal');


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/kegiatan',
            KegiatanController::class
        )->names('kegiatan');


        /*
        |--------------------------------------------------------------------------
        | PERLENGKAPAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/perlengkapan',
            PerlengkapanController::class
        )->names('perlengkapan');


        /*
        |--------------------------------------------------------------------------
        | PANITIA
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/panitia',
            PanitiaController::class
        )
            ->names('panitia')
            ->parameters([
                'panitia' => 'panitia'
            ])
            ->whereNumber('panitia');


        /*
        |--------------------------------------------------------------------------
        | QR PANITIA
        |--------------------------------------------------------------------------
        |
        | EO dapat melihat QR milik satu Panitia.
        |
        | Contoh:
        | /eo/panitia/2/qr
        |
        */

        Route::get(
            '/panitia/{panitia}/qr',
            [PanitiaController::class, 'qr']
        )->name('panitia.qr');


        /*
        |--------------------------------------------------------------------------
        | PEMBAGIAN TUGAS PANITIA
        |--------------------------------------------------------------------------
        |
        | EO membuat dan mengelola tugas.
        |
        | EO TIDAK mengubah status tugas.
        | Status diperbarui melalui halaman QR Panitia.
        |
        */

        Route::prefix('/panitia/tugas')
            ->name('panitia.tugas.')
            ->group(function () {

                Route::get(
                    '/',
                    [TugasPanitiaController::class, 'index']
                )->name('index');

                Route::get(
                    '/create',
                    [TugasPanitiaController::class, 'create']
                )->name('create');

                Route::post(
                    '/',
                    [TugasPanitiaController::class, 'store']
                )->name('store');

                Route::get(
                    '/{tugasPanitia}',
                    [TugasPanitiaController::class, 'show']
                )->name('show');

                Route::delete(
                    '/{tugasPanitia}',
                    [TugasPanitiaController::class, 'destroy']
                )->name('destroy');

            });


        /*
        |--------------------------------------------------------------------------
        | DOKUMENTASI
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/dokumentasi',
            DokumentasiController::class
        )->names('dokumentasi');

        Route::get('/galeri', [DokumentasiController::class, 'galeri'])->name('galeri.index');

        Route::patch('/dokumentasi/{dokumentasi}/ajukan', [DokumentasiController::class, 'ajukan'])->name('dokumentasi.ajukan');
        Route::patch('/dokumentasi/{dokumentasi}/batalkan', [DokumentasiController::class, 'batalkanPengajuan'])->name('dokumentasi.batalkan');


        /*
        |--------------------------------------------------------------------------
        | MONITORING
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/monitoring',
            [MonitoringController::class, 'index']
        )->name('monitoring');


        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/laporan',
            [LaporanController::class, 'index']
        )->name('laporan');


        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/pengumuman',
            PengumumanController::class
        )->names('pengumuman');

        Route::post(
            '/pengumuman/{pengumuman}/ajukan',
            [PengumumanController::class, 'ajukan']
        )->name('pengumuman.ajukan');


        /*
        |--------------------------------------------------------------------------
        | PUBLIKASI
        |--------------------------------------------------------------------------
        */

        Route::resource(
            '/publikasi',
            PublikasiController::class
        )->names('publikasi');

        Route::post(
            '/publikasi/{publikasi}/ajukan',
            [PublikasiController::class, 'ajukan']
        )->name('publikasi.ajukan');


        /*
        |--------------------------------------------------------------------------
        | HUMAS
        |--------------------------------------------------------------------------
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
        |--------------------------------------------------------------------------
        | SPONSORSHIP
        |--------------------------------------------------------------------------
        */


        /*
        |--------------------------------------------------------------------------
        | Paket Sponsorship
        |--------------------------------------------------------------------------
        */

        Route::middleware('divisi:Sponsorship,Ketua')->group(function () {

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


        /*
        |--------------------------------------------------------------------------
        | Pengajuan Sponsor
        |--------------------------------------------------------------------------
        */

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


        /*
        |--------------------------------------------------------------------------
        | Daftar Negosiasi Sponsor
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/sponsorship/negosiasi',
            [NegosiasiSponsorController::class, 'all']
        )->name('sponsorship.negosiasi.all');


        


        /*
        |--------------------------------------------------------------------------
        | Negosiasi Sponsor
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
            [NegosiasiSponsorController::class, 'index']
        )->name('sponsorship.negosiasi.index');

        Route::post(
            '/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
            [NegosiasiSponsorController::class, 'store']
        )->name('sponsorship.negosiasi.store');


        /*
        |--------------------------------------------------------------------------
        | Dukungan Sponsor
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/sponsorship/dukungan',
            [DukunganSponsorController::class, 'index']
        )->name('sponsorship.dukungan.index');

        Route::post(
            '/sponsorship/pengajuan/{pengajuanSponsor}/dukungan',
            [DukunganSponsorController::class, 'store']
        )->name('sponsorship.dukungan.store');


        });

        /*
        |--------------------------------------------------------------------------
        | PROFIL
        |--------------------------------------------------------------------------
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
| PANITIA LOGIN
|--------------------------------------------------------------------------
|
| Bagian ini masih dipertahankan dari sistem lama.
|
| Untuk konsep terbaru:
| Panitia TIDAK perlu login.
| Akses tugas menggunakan QR.
|
| Route ini tidak digunakan untuk alur QR.
|
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/panitia/dashboard',
        [PanitiaDashboardController::class, 'index']
    )->name('panitia.dashboard');

});


/*
|--------------------------------------------------------------------------
| TUGAS PANITIA - PUBLIC
|--------------------------------------------------------------------------
|
| Route di bawah TIDAK menggunakan middleware auth.
|
| Panitia dapat mengakses tugas menggunakan QR.
|
*/


/*
|--------------------------------------------------------------------------
| PUBLIC - Tugas berdasarkan EventPanitia
|--------------------------------------------------------------------------
|
| Route lama tetap dipertahankan.
|
*/

Route::get(
    '/tugas-panitia/{eventPanitia}',
    [TugasPanitiaController::class, 'publicPanitiaTasks']
)->name('panitia.tugas.panitia');


/*
|--------------------------------------------------------------------------
| PUBLIC - Satu Tugas berdasarkan Token
|--------------------------------------------------------------------------
|
| Route lama tetap dipertahankan.
|
*/

Route::get(
    '/tugas/{token}',
    [TugasPanitiaController::class, 'publicTask']
)->name('panitia.tugas.public');


/*
|--------------------------------------------------------------------------
| PUBLIC - QR PANITIA
|--------------------------------------------------------------------------
|
| Ini adalah route utama konsep:
|
| 1 Panitia
|      Ã¢â€ â€œ
| 1 QR
|      Ã¢â€ â€œ
| Banyak Tugas
|
| Contoh:
|
| /panitia/qr/xxxxxxxxxxxxxxxx
|
| Tidak membutuhkan login.
|
*/

Route::get(
    '/panitia/qr/{token}',
    [TugasPanitiaController::class, 'publicPanitiaByToken']
)->name('panitia.qr');


/*
|--------------------------------------------------------------------------
| ADMIN PUBLIKASI
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/publikasi',
    [AdminPublikasiController::class, 'index']
)->name('admin.publikasi.index');
/*
|--------------------------------------------------------------------------
| PUBLIC - QR PANITIA
|--------------------------------------------------------------------------
|
| Ini adalah route utama konsep:
|
| 1 Panitia
|      Ã¢â€ â€œ
| 1 QR
|      Ã¢â€ â€œ
| Banyak Tugas
|
| Contoh:
|
| /panitia/qr/xxxxxxxxxxxxxxxx
|
| Tidak membutuhkan login.
|
*/

Route::get(
    '/panitia/qr/{token}',
    [TugasPanitiaController::class, 'publicPanitiaByToken']
)->name('panitia.qr');


/*
|--------------------------------------------------------------------------
| PUBLIC - UPDATE STATUS TUGAS MELALUI QR
|--------------------------------------------------------------------------
|
| Panitia menggunakan QR yang sama untuk memperbarui status
| tugas yang memang dimiliki oleh Panitia tersebut.
|
| Alur:
|
| BELUM DIMULAI
|       Ã¢â€ â€œ
| SEDANG DIKERJAKAN
|       Ã¢â€ â€œ
| SELESAI
|
| EO tidak menggunakan route ini.
|
*/

Route::put(
    '/panitia/qr/{token}/tugas/{tugasPanitia}/status',
    [TugasPanitiaController::class, 'publicUpdateStatusByQr']
)->name('panitia.qr.tugas.status');


/*
|--------------------------------------------------------------------------
| ADMIN PUBLIKASI
|--------------------------------------------------------------------------
*/

Route::get(
    '/admin/publikasi',
    [AdminPublikasiController::class, 'index']
)->name('admin.publikasi.index');

