<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SponsorDashboardController extends Controller
{
    public function index()
    {
        $sponsor = Auth::guard('sponsor')->user();

        $pengajuans = $sponsor
            ->pengajuan()
            ->with(['paket.event'])
            ->latest()
            ->get();

        return view(
            'sponsor.dashboard',
            compact('sponsor', 'pengajuans')
        );
    }
}