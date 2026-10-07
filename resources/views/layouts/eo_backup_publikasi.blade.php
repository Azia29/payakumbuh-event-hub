@php
    $currentRoute = Route::currentRouteName();
    $division = strtoupper($user->divisi?->nama_divisi ?? 'EO');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Dashboard EO' }} - Event Hub Payakumbuh</title>

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
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .eo-sidebar {
            width: 270px;
            min-height: 100vh;
            background: linear-gradient(180deg, #047857 0%, #065f46 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0,0,0,.08);
        }

        .sidebar-brand {
            padding: 24px 22px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
        }

        .brand-subtitle {
            font-size: 12px;
            opacity: .75;
            margin-top: 5px;
        }

        .sidebar-user {
            margin: 18px 15px;
            padding: 15px;
            background: rgba(255,255,255,.10);
            border-radius: 14px;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
        }

        .user-division {
            font-size: 12px;
            opacity: .75;
            margin-top: 5px;
        }

        .sidebar-section {
            padding: 10px 20px 7px;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            color: rgba(255,255,255,.55);
            text-transform: uppercase;
        }

        .sidebar-menu {
            padding: 0 12px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 13px;
            margin: 3px 0;
            border-radius: 10px;
            color: rgba(255,255,255,.85);
            text-decoration: none;
            font-size: 13px;
            transition: .2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: rgba(255,255,255,.16);
            color: white;
        }

        .menu-icon {
            width: 24px;
            text-align: center;
            font-size: 14px;
        }

        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,.12);
            margin: 15px 18px;
        }

        /* CONTENT */
        .eo-main {
            margin-left: 270px;
            width: calc(100% - 270px);
            min-height: 100vh;
        }

        .eo-topbar {
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 800;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 18px;
            font-size: 13px;
            color: #64748b;
        }

        .topbar-user {
            font-weight: 700;
            color: #334155;
        }

        .eo-content {
            padding: 30px;
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

        /* MOBILE */
        .mobile-menu {
            display: none;
        }

        @media (max-width: 900px) {
            .eo-sidebar {
                transform: translateX(-100%);
                transition: .25s;
            }

            .eo-sidebar.show {
                transform: translateX(0);
            }

            .eo-main {
                margin-left: 0;
                width: 100%;
            }

            .mobile-menu {
                display: block;
                border: none;
                background: #047857;
                color: white;
                padding: 9px 12px;
                border-radius: 8px;
                cursor: pointer;
            }

            .eo-topbar {
                padding: 0 18px;
            }

            .eo-content {
                padding: 18px;
            }

            .topbar-right {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="eo-wrapper">

    <!-- SIDEBAR -->
    <aside class="eo-sidebar" id="eoSidebar">

        <div class="sidebar-brand">
            <div class="brand-title">Event Hub</div>
            <div class="brand-subtitle">Payakumbuh Event Management</div>
        </div>

        <div class="sidebar-user">
            <div class="user-name">
                {{ $user->name ?? 'User EO' }}
            </div>

            <div class="user-division">
                EO {{ ucfirst(strtolower($user->divisi?->nama_divisi ?? '')) }}
            </div>
        </div>

        {{-- DASHBOARD --}}
        <div class="sidebar-section">
            Utama
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.dashboard') }}"
               class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                <span class="menu-icon">⌂</span>
                <span>Dashboard</span>
            </a>

        </div>


        {{-- HUMAS --}}
        @if ($division === 'HUMAS')

            <div class="sidebar-section">
                Informasi & Publikasi
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.events') ? 'active' : '' }}">
                    <span class="menu-icon">▣</span>
                    <span>Informasi Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}"
                   class="{{ $currentRoute === 'eo.laporan' ? 'active' : '' }}">
                    <span class="menu-icon">▤</span>
                    <span>Publikasi Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">!</span>
                    <span>Pengumuman</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">✎</span>
                    <span>Press Release</span>
                </a>

            </div>


            <div class="sidebar-section">
                Media & Komunikasi
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">◎</span>
                    <span>Media & Sosial</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">☎</span>
                    <span>Kontak & Komunikasi</span>
                </a>

            </div>


            <div class="sidebar-section">
                Monitoring
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.monitoring') }}"
                   class="{{ $currentRoute === 'eo.monitoring' ? 'active' : '' }}">
                    <span class="menu-icon">◉</span>
                    <span>Monitoring Publikasi</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">▥</span>
                    <span>Laporan Humas</span>
                </a>

            </div>

        {{-- KETUA --}}
        @elseif ($division === 'KETUA')

            <div class="sidebar-section">
                Manajemen
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.events') ? 'active' : '' }}">
                    <span class="menu-icon">▣</span>
                    <span>Kelola Event</span>
                </a>

                <a href="{{ route('eo.panitia.index') }}"
                   class="{{ str_starts_with($currentRoute, 'eo.panitia') ? 'active' : '' }}">
                    <span class="menu-icon">♟</span>
                    <span>Kelola Panitia</span>
                </a>

                <a href="{{ route('eo.monitoring') }}">
                    <span class="menu-icon">◉</span>
                    <span>Monitoring Kegiatan</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">▤</span>
                    <span>Laporan Event</span>
                </a>

            </div>

        {{-- ACARA --}}
        @elseif ($division === 'ACARA')

            <div class="sidebar-section">
                Manajemen Acara
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">▣</span>
                    <span>Kelola Event</span>
                </a>

                <a href="{{ route('eo.rundown.index') }}">
                    <span class="menu-icon">☷</span>
                    <span>Rundown</span>
                </a>

                <a href="{{ route('eo.jadwal.index') }}">
                    <span class="menu-icon">◷</span>
                    <span>Jadwal</span>
                </a>

                <a href="{{ route('eo.kegiatan.index') }}">
                    <span class="menu-icon">✓</span>
                    <span>Kegiatan</span>
                </a>

            </div>

        {{-- SPONSORSHIP --}}
        @elseif ($division === 'SPONSORSHIP')

            <div class="sidebar-section">
                Sponsorship
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.sponsorship.index') }}">
                    <span class="menu-icon">$</span>
                    <span>Kelola Sponsor</span>
                </a>

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">▣</span>
                    <span>Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">▤</span>
                    <span>Laporan Sponsor</span>
                </a>

            </div>

        {{-- DOKUMENTASI --}}
        @elseif ($division === 'DOKUMENTASI')

            <div class="sidebar-section">
                Dokumentasi
            </div>

            <div class="sidebar-menu">

                <a href="{{ route('eo.dokumentasi.index') }}">
                    <span class="menu-icon">▣</span>
                    <span>Dokumentasi</span>
                </a>

                <a href="{{ route('eo.events.index') }}">
                    <span class="menu-icon">▣</span>
                    <span>Event</span>
                </a>

                <a href="{{ route('eo.laporan') }}">
                    <span class="menu-icon">▤</span>
                    <span>Laporan Dokumentasi</span>
                </a>

            </div>

        @endif


        <div class="sidebar-divider"></div>

        <div class="sidebar-section">
            Akun
        </div>

        <div class="sidebar-menu">

            <a href="#">
                <span class="menu-icon">●</span>
                <span>Profil Akun</span>
            </a>

            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="menu-icon">↪</span>
                <span>Logout</span>
            </a>

        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

    </aside>


    <!-- MAIN -->
    <main class="eo-main">

        <header class="eo-topbar">

            <div style="display:flex;align-items:center;gap:12px;">

                <button class="mobile-menu"
                        onclick="document.getElementById('eoSidebar').classList.toggle('show')">
                    ☰
                </button>

                <div class="topbar-title">
                    {{ $title ?? 'Dashboard EO' }}
                </div>

            </div>

            <div class="topbar-right">
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                <span class="topbar-user">
                    {{ $user->name ?? 'User EO' }}
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
