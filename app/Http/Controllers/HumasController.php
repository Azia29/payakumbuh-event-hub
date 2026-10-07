<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Publikasi;
use Illuminate\Support\Facades\Auth;

class HumasController extends Controller
{
    public function pengumuman()
    {
        $user = Auth::user();

        return view('eo.humas.pengumuman', compact('user'));
    }

    public function pressRelease()
    {
        $user = Auth::user();

        return view('eo.humas.press-release', compact('user'));
    }

    public function mediaSosial()
    {
        $user = Auth::user();

        return view('eo.humas.media-sosial', compact('user'));
    }

    public function kontakKomunikasi()
    {
        $user = Auth::user();

        return view('eo.humas.kontak-komunikasi', compact('user'));
    }

    public function monitoringPublikasi()
    {
        $user = Auth::user();

        $publikasis = Publikasi::with('event')
            ->latest()
            ->get();

        return view(
            'eo.humas.monitoring-publikasi',
            compact('user', 'publikasis')
        );
    }

    public function laporanHumas()
    {
        $user = Auth::user();

        $totalEvent = Event::count();
        $totalPublikasi = Publikasi::count();

        $draft = Publikasi::where('status', 'draft')->count();
        $diajukan = Publikasi::where('status', 'diajukan')->count();
        $ditolak = Publikasi::where('status', 'ditolak')->count();
        $dipublikasikan = Publikasi::where('status', 'dipublikasikan')->count();

        $publikasis = Publikasi::with('event')
            ->latest()
            ->take(10)
            ->get();

        return view(
            'eo.humas.laporan',
            compact(
                'user',
                'totalEvent',
                'totalPublikasi',
                'draft',
                'diajukan',
                'ditolak',
                'dipublikasikan',
                'publikasis'
            )
        );
    }
}