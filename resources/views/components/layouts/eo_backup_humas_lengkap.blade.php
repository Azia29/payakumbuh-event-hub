@php
    $currentRoute = Route::currentRouteName();
    $division = strtoupper($user->divisi?->nama_divisi ?? 'EO');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Dashboard EO' }} - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        .eo-wrapper {
            min-height: 100vh;
        }

        /* SIDEBAR */
        .eo-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-brand {
            height: 78px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #087443;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 14px;
        }

        .brand-name {
            font-size: 15px;
            font-weight: 800;
            color: #172033;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #64748b;
            margin-top: 3px;
        }

        .sidebar-user {
            padding: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .account-label {
            font-size: 10px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: .7px;
            margin-bottom: 9px;
        }

        .account-name {
            font-size: 14px;
            font-weight: 800;
            color: #172033;
        }

        .account-division {
            display: inline-block;
            margin-top: 7px;
            padding: 5px 10px;
            background: #dcfce7;
            color: #047857;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
        }

        .sidebar-section {
            padding: 20px 20px 8px;
            font-size: 10px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: .8px;
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 0 15px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 43px;
            padding: 10px 13px;
            margin: 3px 0;
            color: #475569;
            text-decoration: none;
            font-size: 13px;
            border-radius: 9px;
            transition: .2s;
        }

        .sidebar-menu a:hover {
            background: #f1f5f9;
            color: #047857;
        }

        .sidebar-menu a.active {
            background: #d9f8e3;
            color: #047857;
            font-weight: 700;
        }

        .menu-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            background: #f1f5f9;
            font-size: 11px;
            font-weight: 800;
        }

        .sidebar-menu a.active .menu-icon {
            background: #087443;
            color: white;
        }

        .sidebar-divider {
            height: 1px;
            background: #e2e8f0;
            margin: 16px 15px;
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

        /* MAIN */
        .eo-main {
            margin-left: 260px;
            min-height: 100vh;
        }

        .eo-topbar {
            height: 78px;
            background: white;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 800;
            color: #172033;
        }

        .topbar-subtitle {
            margin-top: 3px;
            font-size: 12px;
            color: #64748b;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .topbar-date {
            font-size: 12px;
            color: #64748b;
        }

        .topbar-user {
            padding: 8px 13px;
            background: #f0fdf4;
            color: #047857;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .eo-content {
            padding: 28px;
        }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .mobile-button {
            display: none;
        }

        @media(max-width: 900px) {
            .eo-sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .eo-sidebar.show {
                transform: translateX(0);
            }

            .eo-main {
                margin-left: 0;
            }

            .mobile-button {
                display: block;
                border: 0;
                background: #087443;
                color: white;
                padding: 8px 11px;
                border-radius: 7px;
                cursor: pointer;
            }

            .eo-topbar {
                padding: 0 18px;
            }

            .topbar-date {
                display: none;
            }

            .eo-content {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<div class="eo-wrapper">

    <!-- SIDEBAR -->
    <aside class="eo-sidebar" id="eoSidebar">

        <!-- BRAND -->
        <div class="sidebar-brand">
            <div class="brand-logo">EH</div>

            <div>
                <div class="brand-name">Event Hub</div>
                <div class="brand-subtitle">Payakumbuh</div>
            </div>
        </div>

        <!-- ACCOUNT -->
        <div class="sidebar-user">
            <div class="account-label">AKUN EO</div>

            <div class="account-name">
                {{ $user->name ?? 'EO User' }}
            </div>

            <div class="account-division">
                {{ ucfirst(strtolower($user->divisi?->nama_divisi ?? 'EO')) }}
            </div>
        </div>

        <!-- DASHBOARD -->
        <div class="sidebar-section">
            Menu Utama
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.dashboard') }}"
               class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                <span class="menu-icon">DB</span>
                <span>Dashboard</span>
            </a>

        </div>


        {{-- =========================
             HUMAS
        ========================== --}}
        @if ($division === 'HUMAS')

            <div class="sidebar-section">
                Informasi & Publikasi
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

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">PG</span>
                    <span>Pengumuman</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">PR</span>
                    <span>Press Release</span>
                </a>

            </div>

            <div class="sidebar-section">
                Media & Komunikasi
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">MS</span>
                    <span>Media & Sosial</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">KK</span>
                    <span>Kontak & Komunikasi</span>
                </a>

            </div>

            <div class="sidebar-section">
                Monitoring
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.monitoring') }}"
                   class="{{ $currentRoute === 'eo.monitoring' ? 'active' : '' }}">
                    <span class="menu-icon">MN</span>
                    <span>Monitoring Publikasi</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">LH</span>
                    <span>Laporan Humas</span>
                </a>

            </div>


        {{-- =========================
             KETUA
        ========================== --}}
        @elseif ($division === 'KETUA')

            <div class="sidebar-section">
                Manajemen
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">EV</span>
                    <span>Kelola Event</span>
                </a>

                <a href="{{ route('eo.panitia.index') }}">
                    <span class="menu-icon">PN</span>
                    <span>Kelola Panitia</span>
                </a>

                <a href="{{ route('eo.monitoring') }}">
                    <span class="menu-icon">MN</span>
                    <span>Monitoring Kegiatan</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">LP</span>
                    <span>Laporan Event</span>
                </a>

            </div>


        {{-- =========================
             ACARA
        ========================== --}}
        @elseif ($division === 'ACARA')

            <div class="sidebar-section">
                Manajemen Acara
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">EV</span>
                    <span>Kelola Event</span>
                </a>

                <a href="{{ route('eo.rundown.index') }}">
                    <span class="menu-icon">RD</span>
                    <span>Rundown</span>
                </a>

                <a href="{{ route('eo.jadwal.index') }}">
                    <span class="menu-icon">JD</span>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('eo.kegiatan.index') }}">
                    <span class="menu-icon">KG</span>
                    <span>Kegiatan</span>
                </a>

            </div>


        {{-- =========================
             SPONSORSHIP
        ========================== --}}
        @elseif ($division === 'SPONSORSHIP')

            <div class="sidebar-section">
                Sponsorship
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.sponsorship.index') }}">
                    <span class="menu-icon">SP</span>
                    <span>Kelola Sponsor</span>
                </a>

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">EV</span>
                    <span>Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">LP</span>
                    <span>Laporan Sponsor</span>
                </a>

            </div>


        {{-- =========================
             DOKUMENTASI
        ========================== --}}
        @elseif ($division === 'DOKUMENTASI')

            <div class="sidebar-section">
                Dokumentasi
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.dokumentasi.index') }}">
                    <span class="menu-icon">DK</span>
                    <span>Dokumentasi</span>
                </a>

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">EV</span>
                    <span>Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">LP</span>
                    <span>Laporan Dokumentasi</span>
                </a>

            </div>

        @endif


        <!-- ACCOUNT -->
        <div class="sidebar-divider"></div>

        <div class="sidebar-section">
            Akun
        </div>

        <div class="sidebar-menu">

            <a href="#">
                <span class="menu-icon">PR</span>
                <span>Profil Akun</span>
            </a>

            <a href="{{ route('logout') }}"
               class="logout-link"
               onclick="event.preventDefault(); document.getElementById('eo-logout-form').submit();">

                <span class="menu-icon">LO</span>
                <span>Logout</span>

            </a>

        </div>

        <form id="eo-logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display:none;">
            @csrf
        </form>

    </aside>


    <!-- MAIN -->
    <main class="eo-main">

        <header class="eo-topbar">

            <div style="display:flex;align-items:center;gap:12px;">

                <button class="mobile-button"
                        onclick="document.getElementById('eoSidebar').classList.toggle('show')">
                    â˜°
                </button>

                <div>
                    <div class="topbar-title">
                        {{ $title ?? 'Dashboard EO' }}
                    </div>

                    <div class="topbar-subtitle">
                        Payakumbuh Event Hub
                    </div>
                </div>

            </div>

            <div class="topbar-right">

                <span class="topbar-date">
                    {{ now()->translatedFormat('l, d F Y') }}
                </span>

                <span class="topbar-user">
                    {{ ucfirst(strtolower($user->divisi?->nama_divisi ?? 'EO')) }}
                </span>

            </div>

        </header>


        <section class="eo-content">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}

        </section>

    </main>

</div>

</body>
</html>
