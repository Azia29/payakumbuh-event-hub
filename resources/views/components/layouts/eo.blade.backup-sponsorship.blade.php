@props(['user'])

@php
    $currentRoute = request()->route()?->getName() ?? '';
    $division = strtoupper($user->divisi?->nama_divisi ?? '');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Event Hub' }} - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .eo-layout {
            min-height: 100vh;
            display: flex;
        }

        .eo-sidebar {
            width: 260px;
            min-width: 260px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .eo-brand {
            height: 92px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #047857;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
            color: #0f172a;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #64748b;
        }

        .account-box {
            padding: 22px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .account-label {
            font-size: 10px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: .8px;
            margin-bottom: 10px;
        }

        .account-name {
            font-size: 15px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .division-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 7px;
            background: #dcfce7;
            color: #047857;
            font-size: 11px;
            font-weight: 800;
        }

        .sidebar-section {
            padding: 20px 20px 8px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .sidebar-menu {
            padding: 0 15px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 44px;
            padding: 9px 12px;
            margin-bottom: 4px;
            border-radius: 10px;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-menu a:hover {
            background: #f1f5f9;
            color: #047857;
        }

        .sidebar-menu a.active {
            background: #dcfce7;
            color: #047857;
        }

        .menu-icon {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
        }

        .sidebar-menu a.active .menu-icon {
            background: #047857;
            color: #ffffff;
        }

        .sidebar-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 15px;
        }

        .logout-link {
            color: #dc2626 !important;
        }

        .logout-link:hover {
            background: #fef2f2 !important;
            color: #dc2626 !important;
        }

        .logout-link .menu-icon {
            background: #fef2f2;
            color: #dc2626;
        }

        .eo-main {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
        }

        .eo-header {
            height: 92px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 800;
            color: #0f172a;
        }

        .header-subtitle {
            margin-top: 4px;
            color: #64748b;
            font-size: 12px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-date {
            color: #64748b;
            font-size: 12px;
        }

        .header-division {
            padding: 9px 14px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            font-size: 12px;
            font-weight: 800;
        }

        .eo-content {
            min-height: calc(100vh - 92px);
        }

        @media (max-width: 800px) {
            .eo-sidebar {
                width: 220px;
                min-width: 220px;
            }

            .eo-main {
                margin-left: 220px;
                width: calc(100% - 220px);
            }

            .eo-header {
                padding: 0 18px;
            }

            .header-date {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="eo-layout">

    <aside class="eo-sidebar">

        <div class="eo-brand">
            <div class="brand-logo">EH</div>

            <div>
                <div class="brand-name">Event Hub</div>
                <div class="brand-subtitle">Payakumbuh</div>
            </div>
        </div>

        <div class="account-box">

            <div class="account-label">
                AKUN EO
            </div>

            <div class="account-name">
                {{ $user->name ?? 'EO' }}
            </div>

            <span class="division-badge">
                {{ $user->divisi?->nama_divisi ?? 'EO' }}
            </span>

        </div>


        {{-- =========================
             SIDEBAR KETUA
        ========================== --}}

        @if ($division === 'KETUA')

            <div class="sidebar-section">
                MENU UTAMA
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.profil') }}"/eo/dashboard') }}"
                   class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                    <span class="menu-icon">DB</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ url('/eo/events') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.events') ? 'active' : '' }}">
                    <span class="menu-icon">EV</span>
                    <span>Kelola Event</span>
                </a>

                <a href="{{ url('/eo/panitia') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.panitia') ? 'active' : '' }}">
                    <span class="menu-icon">PN</span>
                    <span>Kelola Panitia</span>
                </a>

                <a href="{{ url('/eo/monitoring') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.monitoring') ? 'active' : '' }}">
                    <span class="menu-icon">MN</span>
                    <span>Monitoring Kegiatan</span>
                </a>

                <a href="{{ url('/eo/laporan') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.laporan') ? 'active' : '' }}">
                    <span class="menu-icon">LP</span>
                    <span>Laporan Event</span>
                </a>

            </div>

        @endif


        {{-- =========================
             SIDEBAR HUMAS
        ========================== --}}

        @if ($division === 'HUMAS')

            <div class="sidebar-section">
                MENU UTAMA
            </div>

            <div class="sidebar-menu">

                <a href="{{ url('/eo/dashboard') }}"
                   class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                    <span class="menu-icon">DB</span>
                    <span>Dashboard</span>
                </a>

            </div>

            <div class="sidebar-section">
                INFORMASI & PUBLIKASI
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.events') ? 'active' : '' }}">
                    <span class="menu-icon">EV</span>
                    <span>Informasi Event</span>
                </a>

                <a href="{{ route('eo.publikasi.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.publikasi') ? 'active' : '' }}">
                    <span class="menu-icon">PB</span>
                    <span>Publikasi Event</span>
                </a>

                <a href="{{ route('eo.pengumuman.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.pengumuman') ? 'active' : '' }}">
                    <span class="menu-icon">PG</span>
                    <span>Pengumuman</span>
                </a>

                <a href="{{ route('eo.press-release.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.press-release') ? 'active' : '' }}">
                    <span class="menu-icon">PR</span>
                    <span>Press Release</span>
                </a>

            </div>

            <div class="sidebar-section">
                MEDIA & KOMUNIKASI
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.media-sosial.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.media-sosial') ? 'active' : '' }}">
                    <span class="menu-icon">MS</span>
                    <span>Media & Sosial</span>
                </a>

                <a href="{{ route('eo.kontak-komunikasi.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.kontak-komunikasi') ? 'active' : '' }}">
                    <span class="menu-icon">KK</span>
                    <span>Kontak & Komunikasi</span>
                </a>

            </div>

            <div class="sidebar-section">
                MONITORING
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.monitoring-publikasi') }}"
                   class="{{ $currentRoute === 'eo.monitoring-publikasi' ? 'active' : '' }}">
                    <span class="menu-icon">MN</span>
                    <span>Monitoring Publikasi</span>
                </a>

                <a href="{{ route('eo.laporan-humas') }}"
                   class="{{ $currentRoute === 'eo.laporan-humas' ? 'active' : '' }}">
                    <span class="menu-icon">LH</span>
                    <span>Laporan Humas</span>
                </a>

            </div>

        @endif


                {{-- =========================
             SIDEBAR DOKUMENTASI
        ========================== --}}

        @if ($division === 'DOKUMENTASI')

            <div class="sidebar-section">
                MENU UTAMA
            </div>

            <div class="sidebar-menu">

                <a href="{{ url('/eo/dashboard') }}"
                   class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                    <span class="menu-icon">DB</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('eo.dokumentasi.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.dokumentasi') ? 'active' : '' }}">
                    <span class="menu-icon">DK</span>
                    <span>Kelola Dokumentasi</span>
                </a>

            </div>

        @endif

        {{-- =========================
             AKUN
        ========================== --}}

        <div class="sidebar-divider"></div>

        <div class="sidebar-section">
            AKUN
        </div>

        
    <!-- MENU EO ACARA -->
    @if ($division === 'ACARA')

        <div class="sidebar-section">MENU UTAMA</div>

        <div class="sidebar-menu">

            <a href="{{ url('/eo/dashboard') }}"
               class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                <span class="menu-icon">DB</span>
                <span>Dashboard</span>
            </a>

        </div>

        <div class="sidebar-section">KELOLA ACARA</div>

        <div class="sidebar-menu">

            <a href="{{ url('/eo/events') }}"
               class="{{ str_starts_with($currentRoute, 'eo.events') ? 'active' : '' }}">
                <span class="menu-icon">EV</span>
                <span>Kelola Event</span>
            </a>

            <a href="{{ url('/eo/rundown') }}"
               class="{{ str_starts_with($currentRoute, 'eo.rundown') ? 'active' : '' }}">
                <span class="menu-icon">RD</span>
                <span>Rundown Acara</span>
            </a>

            <a href="{{ url('/eo/jadwal') }}"
               class="{{ str_starts_with($currentRoute, 'eo.jadwal') ? 'active' : '' }}">
                <span class="menu-icon">JD</span>
                <span>Jadwal Kegiatan</span>
            </a>

        </div>

        <div class="sidebar-section">PELAKSANAAN</div>

        <div class="sidebar-menu">

            <a href="{{ url('/eo/perlengkapan') }}"
               class="{{ str_starts_with($currentRoute, 'eo.perlengkapan') ? 'active' : '' }}">
                <span class="menu-icon">PR</span>
                <span>Perlengkapan</span>
            </a>

            <a href="{{ url('/eo/panitia') }}"
               class="{{ str_starts_with($currentRoute, 'eo.panitia') ? 'active' : '' }}">
                <span class="menu-icon">TA</span>
                <span>Tim Acara</span>
            </a>

            <a href="{{ url('/eo/monitoring') }}"
               class="{{ str_starts_with($currentRoute, 'eo.monitoring') ? 'active' : '' }}">
                <span class="menu-icon">MN</span>
                <span>Monitoring Kegiatan</span>
            </a>

        </div>

        <div class="sidebar-section">LAPORAN</div>

        <div class="sidebar-menu">

            <a href="{{ url('/eo/laporan') }}"
               class="{{ str_starts_with($currentRoute, 'eo.laporan-acara') ? 'active' : '' }}">
                <span class="menu-icon">LP</span>
                <span>Laporan Acara</span>
            </a>

        </div>

    @endif

    <!-- END MENU EO ACARA -->
<div class="sidebar-menu">

            <a href="{{ url('/eo/profil') }}"
               class="{{ str_starts_with($currentRoute, 'eo.profil') ? 'active' : '' }}">
                <span class="menu-icon">PR</span>
                <span>Profil Akun</span>
            </a>

            <form method="POST" action="{{ url('/logout') }}" style="margin:0;">
                @csrf

                <button type="submit"
                        class="logout-link"
                        style="
                            width:100%;
                            border:0;
                            background:transparent;
                            cursor:pointer;
                            display:flex;
                            align-items:center;
                            gap:12px;
                            min-height:44px;
                            padding:9px 12px;
                            border-radius:10px;
                            font-size:13px;
                            font-weight:600;
                            text-align:left;
                        ">

                    <span class="menu-icon">LO</span>
                    <span>Logout</span>

                </button>
            </form>

        </div>

    </aside>


    <main class="eo-main">

        <header class="eo-header">

            <div>
                <div class="header-title">
                    {{ $title ?? 'Dashboard' }}
                </div>

                <div class="header-subtitle">
                    Payakumbuh Event Hub
                </div>
            </div>

            <div class="header-right">

                <div class="header-date">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>

                <div class="header-division">
                    {{ $user->divisi?->nama_divisi ?? 'EO' }}
                </div>

            </div>

        </header>

        <div class="eo-content">
            {{ $slot }}
        </div>

    </main>

</div>

</body>
</html>