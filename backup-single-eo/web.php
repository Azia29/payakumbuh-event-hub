<?php

use App\Http\Controllers\PerlengkapanController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HumasController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\EoDashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RundownController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PaketSponsorshipController;
use App\Http\Controllers\PengajuanSponsorController;
use App\Http\Controllers\NegosiasiSponsorController;
use App\Http\Controllers\DukunganSponsorController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\AdminPublikasiController;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/


// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');


// Daftar event untuk masyarakat
Route::get('/event', [
    EventController::class,
    'publicIndex'
])->name('event.public');


// Detail event untuk masyarakat
Route::get('/event/{event}', [
    EventController::class,
    'publicShow'
])->name('event.public.show');


// Tentang
Route::view('/tentang', 'tentang')
    ->name('tentang');


// Kontak
Route::view('/kontak', 'kontak')
    ->name('kontak');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/


// Halaman login
Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');


// Proses login
Route::post('/login', [
    AuthController::class,
    'login'
])->name('login.process');


/*
|--------------------------------------------------------------------------
| SEMUA USER YANG SUDAH LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD EO
    |--------------------------------------------------------------------------
    */

    Route::get('/eo/dashboard', [
        EoDashboardController::class,
        'index'
    ])->name('eo.dashboard');


    /*
    |--------------------------------------------------------------------------
    | KELOLA EVENT
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'eo/events',
        EventController::class
    )->names([

        'index'   => 'eo.events.index',
        'create'  => 'eo.events.create',
        'store'   => 'eo.events.store',
        'show'    => 'eo.events.show',
        'edit'    => 'eo.events.edit',
        'update'  => 'eo.events.update',
        'destroy' => 'eo.events.destroy',

    ]);


    /*
    |--------------------------------------------------------------------------
    | KELOLA PANITIA
    |--------------------------------------------------------------------------
    */

    Route::get('/eo/panitia', [
        PanitiaController::class,
        'index'
    ])->name('eo.panitia.index');


    Route::get('/eo/panitia/create', [
        PanitiaController::class,
        'create'
    ])->name('eo.panitia.create');


    Route::post('/eo/panitia', [
        PanitiaController::class,
        'store'
    ])->name('eo.panitia.store');


    Route::get('/eo/panitia/{panitia}/edit', [
        PanitiaController::class,
        'edit'
    ])->name('eo.panitia.edit');


    Route::put('/eo/panitia/{panitia}', [
        PanitiaController::class,
        'update'
    ])->name('eo.panitia.update');


    Route::delete('/eo/panitia/{panitia}', [
        PanitiaController::class,
        'destroy'
    ])->name('eo.panitia.destroy');


    Route::get('/eo/panitia/{panitia}', [
        PanitiaController::class,
        'show'
    ])->name('eo.panitia.show');


    /*
    |--------------------------------------------------------------------------
    | MONITORING
    |--------------------------------------------------------------------------
    */

    Route::get('/eo/monitoring', [
        MonitoringController::class,
        'index'
    ])->name('eo.monitoring');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get('/eo/laporan', [
        LaporanController::class,
        'index'
    ])->name('eo.laporan');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout');

});


/*
|--------------------------------------------------------------------------
| EO DIVISI ACARA
|--------------------------------------------------------------------------
|
| Hanya divisi Acara yang dapat mengelola:
| - Rundown
| - Jadwal
| - Kegiatan
|
*/

Route::middleware([
    'auth',
    'divisi:Acara'
])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | RUNDOWN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'eo/rundown',
        RundownController::class
    )->names([

        'index'   => 'eo.rundown.index',
        'create'  => 'eo.rundown.create',
        'store'   => 'eo.rundown.store',
        'show'    => 'eo.rundown.show',
        'edit'    => 'eo.rundown.edit',
        'update'  => 'eo.rundown.update',
        'destroy' => 'eo.rundown.destroy',

    ]);


    /*
    |--------------------------------------------------------------------------
    | JADWAL
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'eo/jadwal',
        JadwalController::class
    )->names([

        'index'   => 'eo.jadwal.index',
        'create'  => 'eo.jadwal.create',
        'store'   => 'eo.jadwal.store',
        'show'    => 'eo.jadwal.show',
        'edit'    => 'eo.jadwal.edit',
        'update'  => 'eo.jadwal.update',
        'destroy' => 'eo.jadwal.destroy',

    ]);


    /*
    |--------------------------------------------------------------------------
    | KEGIATAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'eo/kegiatan',
        KegiatanController::class
    )->names([

        'index'   => 'eo.kegiatan.index',
        'create'  => 'eo.kegiatan.create',
        'store'   => 'eo.kegiatan.store',
        'show'    => 'eo.kegiatan.show',
        'edit'    => 'eo.kegiatan.edit',
        'update'  => 'eo.kegiatan.update',
        'destroy' => 'eo.kegiatan.destroy',

    ]);

});


/*
|--------------------------------------------------------------------------
| EO DIVISI SPONSORSHIP
|--------------------------------------------------------------------------
|
| Hanya divisi Sponsorship yang dapat mengelola sponsor.
|
*/

Route::middleware([
    'auth',
    'divisi:Sponsorship'
])->group(function () {


        /*
    |--------------------------------------------------------------------------
    | PAKET SPONSORSHIP
    |--------------------------------------------------------------------------
    */

    Route::get(
        'eo/sponsorship/paket',
        [PaketSponsorshipController::class, 'index']
    )->name('eo.sponsorship.paket.index');

    Route::get(
        'eo/sponsorship/paket/create',
        [PaketSponsorshipController::class, 'create']
    )->name('eo.sponsorship.paket.create');

    Route::post(
        'eo/sponsorship/paket',
        [PaketSponsorshipController::class, 'store']
    )->name('eo.sponsorship.paket.store');

    Route::get(
        'eo/sponsorship/paket/{paketSponsorship}',
        [PaketSponsorshipController::class, 'show']
    )->name('eo.sponsorship.paket.show');

    Route::get(
        'eo/sponsorship/paket/{paketSponsorship}/edit',
        [PaketSponsorshipController::class, 'edit']
    )->name('eo.sponsorship.paket.edit');

    Route::put(
        'eo/sponsorship/paket/{paketSponsorship}',
        [PaketSponsorshipController::class, 'update']
    )->name('eo.sponsorship.paket.update');

    Route::delete(
        'eo/sponsorship/paket/{paketSponsorship}',
        [PaketSponsorshipController::class, 'destroy']
    )->name('eo.sponsorship.paket.destroy');

    /*
    |--------------------------------------------------------------------------
    | PENGAJUAN SPONSOR
    |--------------------------------------------------------------------------
    */

    Route::get(
        'eo/sponsorship/pengajuan',
        [PengajuanSponsorController::class, 'index']
    )->name('eo.sponsorship.pengajuan.index');

    Route::get(
        'eo/sponsorship/pengajuan/{pengajuanSponsor}',
        [PengajuanSponsorController::class, 'show']
    )->name('eo.sponsorship.pengajuan.show');

    Route::put(
        'eo/sponsorship/pengajuan/{pengajuanSponsor}/status',
        [PengajuanSponsorController::class, 'updateStatus']
    )->name('eo.sponsorship.pengajuan.status');

    /*
    |--------------------------------------------------------------------------
    | NEGOSIASI
    |--------------------------------------------------------------------------
    */

    Route::get(
        'eo/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
        [NegosiasiSponsorController::class, 'index']
    )->name('eo.sponsorship.negosiasi.index');

    Route::post(
        'eo/sponsorship/pengajuan/{pengajuanSponsor}/negosiasi',
        [NegosiasiSponsorController::class, 'store']
    )->name('eo.sponsorship.negosiasi.store');

    /*
    |--------------------------------------------------------------------------
    | DUKUNGAN SPONSOR
    |--------------------------------------------------------------------------
    */

    Route::get(
        'eo/sponsorship/dukungan',
        [DukunganSponsorController::class, 'index']
    )->name('eo.sponsorship.dukungan.index');

    Route::post(
        'eo/sponsorship/pengajuan/{pengajuanSponsor}/dukungan',
        [DukunganSponsorController::class, 'store']
    )->name('eo.sponsorship.dukungan.store');
Route::resource(
        'eo/sponsorship',
        SponsorController::class
    )->names([

        'index'   => 'eo.sponsorship.index',
        'create'  => 'eo.sponsorship.create',
        'store'   => 'eo.sponsorship.store',
        'show'    => 'eo.sponsorship.show',
        'edit'    => 'eo.sponsorship.edit',
        'update'  => 'eo.sponsorship.update',
        'destroy' => 'eo.sponsorship.destroy',

    ]);

});


/*
|--------------------------------------------------------------------------
| EO DIVISI DOKUMENTASI
|--------------------------------------------------------------------------
|
| Hanya divisi Dokumentasi yang dapat mengelola dokumentasi event.
|
*/

Route::middleware([
    'auth',
    'divisi:Dokumentasi'
])->group(function () {


    Route::resource(
        'eo/dokumentasi',
        DokumentasiController::class
    )->names([

        'index'   => 'eo.dokumentasi.index',
        'create'  => 'eo.dokumentasi.create',
        'store'   => 'eo.dokumentasi.store',
        'show'    => 'eo.dokumentasi.show',
        'edit'    => 'eo.dokumentasi.edit',
        'update'  => 'eo.dokumentasi.update',
        'destroy' => 'eo.dokumentasi.destroy',

    ]);

});


/*
|--------------------------------------------------------------------------
| EO DIVISI HUMAS
|--------------------------------------------------------------------------
|
| Humas bertugas membuat dan mengajukan publikasi.
| Humas tidak dapat langsung mempublikasikan.
|
*/

Route::middleware([
    'auth',
    'divisi:Humas'
])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | PUBLIKASI HUMAS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'eo/publikasi',
        PublikasiController::class
    )->names([

        'index'   => 'eo.publikasi.index',
        'create'  => 'eo.publikasi.create',
        'store'   => 'eo.publikasi.store',
        'show'    => 'eo.publikasi.show',
        'edit'    => 'eo.publikasi.edit',
        'update'  => 'eo.publikasi.update',
        'destroy' => 'eo.publikasi.destroy',

    ]);


    /*
    |--------------------------------------------------------------------------
    | AJUKAN PUBLIKASI KE ADMIN
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/eo/publikasi/{publikasi}/ajukan',
        [PublikasiController::class, 'ajukan']
    )->name('eo.publikasi.ajukan');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| Admin memeriksa publikasi yang diajukan oleh Humas.
|
*/

Route::middleware(['auth'])->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DAFTAR PUBLIKASI UNTUK ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/publikasi',
        [AdminPublikasiController::class, 'index']
    )->name('admin.publikasi.index');


    /*
    |--------------------------------------------------------------------------
    | DETAIL PUBLIKASI
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/publikasi/{publikasi}',
        [AdminPublikasiController::class, 'show']
    )->name('admin.publikasi.show');


    /*
    |--------------------------------------------------------------------------
    | ADMIN MENYETUJUI DAN MEMPUBLIKASIKAN
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/admin/publikasi/{publikasi}/setujui',
        [AdminPublikasiController::class, 'setujui']
    )->name('admin.publikasi.setujui');


    /*
    |--------------------------------------------------------------------------
    | ADMIN MENOLAK PUBLIKASI
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/admin/publikasi/{publikasi}/tolak',
        [AdminPublikasiController::class, 'tolak']
    )->name('admin.publikasi.tolak');

});

/*
|--------------------------------------------------------------------------
| Pengumuman EO Humas
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'divisi:Humas'])->group(function () {
    Route::resource('eo/pengumuman', PengumumanController::class)
        ->names([
            'index' => 'eo.pengumuman.index',
            'create' => 'eo.pengumuman.create',
            'store' => 'eo.pengumuman.store',
            'show' => 'eo.pengumuman.show',
            'edit' => 'eo.pengumuman.edit',
            'update' => 'eo.pengumuman.update',
            'destroy' => 'eo.pengumuman.destroy',
        ]);

    Route::post(
        '/eo/pengumuman/{pengumuman}/ajukan',
        [PengumumanController::class, 'ajukan']
    )->name('eo.pengumuman.ajukan');
});
/*
|--------------------------------------------------------------------------
| FITUR EO HUMAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'divisi:Humas'])->group(function () {

    Route::get('/eo/press-release', [HumasController::class, 'pressRelease'])
        ->name('eo.press-release.index');

    Route::get('/eo/media-sosial', [HumasController::class, 'mediaSosial'])
        ->name('eo.media-sosial.index');

    Route::get('/eo/kontak-komunikasi', [HumasController::class, 'kontakKomunikasi'])
        ->name('eo.kontak-komunikasi.index');

    Route::get('/eo/monitoring-publikasi', [HumasController::class, 'monitoringPublikasi'])
        ->name('eo.monitoring-publikasi');

    Route::get('/eo/laporan-humas', [HumasController::class, 'laporanHumas'])
        ->name('eo.laporan-humas');

});

/*
|--------------------------------------------------------------------------
| Profil Akun EO
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/eo/profil', [
    \App\Http\Controllers\ProfilController::class,
    'index'
])->name('eo.profil');

Route::middleware('auth')->group(function () {

    Route::put('/eo/profil', [
        \App\Http\Controllers\ProfilController::class,
        'update'
    ])->name('eo.profil.update');

    Route::put('/eo/profil/password', [
        \App\Http\Controllers\ProfilController::class,
        'updatePassword'
    ])->name('eo.profil.password');

});

Route::middleware(['auth', 'divisi:Acara'])->group(function () {
    Route::get('/eo/perlengkapan/create', [PerlengkapanController::class, 'create'])
    ->name('eo.perlengkapan.create');

Route::post('/eo/perlengkapan', [PerlengkapanController::class, 'store'])
    ->name('eo.perlengkapan.store');

Route::get('/eo/perlengkapan/{perlengkapan}/edit', [PerlengkapanController::class, 'edit'])
    ->name('eo.perlengkapan.edit');

Route::put('/eo/perlengkapan/{perlengkapan}', [PerlengkapanController::class, 'update'])
    ->name('eo.perlengkapan.update');

Route::delete('/eo/perlengkapan/{perlengkapan}', [PerlengkapanController::class, 'destroy'])
    ->name('eo.perlengkapan.destroy');
Route::get('/eo/perlengkapan', [PerlengkapanController::class, 'index'])
        ->name('eo.perlengkapan.index');
});