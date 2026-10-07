<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? 'Dashboard EO' }} - Payakumbuh Event Hub
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --green-dark: #064e3b;
            --green: #047857;
            --green-light: #10b981;
            --green-soft: #ecfdf5;
            --bg: #f5f8fa;
            --white: #ffffff;
            --text: #102a43;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #ef4444;
        }

        body {
            margin: 0;
            font-family: Inter, Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* ========================================
           LAYOUT
        ======================================== */

        .eo-layout {
            min-height: 100vh;
            display: flex;
        }

        /* ========================================
           SIDEBAR
        ======================================== */

        .eo-sidebar {
            width: 265px;
            min-width: 265px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            display: flex;
            flex-direction: column;
            padding: 20px 15px;
            color: white;
            background:
                radial-gradient(circle at 20% 85%, rgba(16,185,129,.15), transparent 28%),
                linear-gradient(180deg, #063f32 0%, #064e3b 45%, #053b30 100%);
            box-shadow: 8px 0 30px rgba(15,23,42,.08);
            overflow-y: auto;
        }

        /* LOGO */

        .eo-brand {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 5px 9px 20px;
            border-bottom: 1px solid rgba(255,255,255,.10);
        }

        .eo-brand-logo {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#10b981,#047857);
            color: white;
            font-size: 14px;
            font-weight: 900;
            box-shadow: 0 7px 20px rgba(16,185,129,.22);
        }

        .eo-brand-name {
            font-size: 17px;
            line-height: 20px;
            font-weight: 800;
        }

        .eo-brand-subtitle {
            margin-top: 2px;
            font-size: 10px;
            color: rgba(255,255,255,.62);
        }

        /* PROFILE */

        .eo-profile {
            margin: 18px 2px 15px;
            padding: 12px;
            border-radius: 15px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.09);
        }

        .eo-profile-top {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .eo-avatar {
            width: 39px;
            height: 39px;
            flex-shrink: 0;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #d1fae5;
            color: #047857;
            font-weight: 900;
            font-size: 13px;
        }

        .eo-profile-info {
            min-width: 0;
        }

        .eo-profile-name {
            display: block;
            color: white;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .eo-profile-role {
            display: block;
            margin-top: 3px;
            color: rgba(255,255,255,.60);
            font-size: 10px;
        }

        /* MENU */

        .eo-menu {
            flex: 1;
        }

        .eo-menu-title {
            margin: 18px 9px 7px;
            color: rgba(255,255,255,.42);
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .eo-menu-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            min-height: 42px;
            padding: 9px 11px;
            margin-bottom: 3px;
            border-radius: 11px;
            color: rgba(255,255,255,.78);
            font-size: 12px;
            font-weight: 600;
            transition: all .18s ease;
        }

        .eo-menu-link:hover {
            color: white;
            background: rgba(255,255,255,.09);
            transform: translateX(2px);
        }

        .eo-menu-link.active {
            color: white;
            background: linear-gradient(
                90deg,
                rgba(16,185,129,.95),
                rgba(5,150,105,.82)
            );
            box-shadow: 0 7px 18px rgba(0,0,0,.12);
        }

        .eo-menu-icon {
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: rgba(255,255,255,.08);
            font-size: 9px;
            font-weight: 900;
        }

        .eo-menu-link.active .eo-menu-icon {
            background: rgba(255,255,255,.16);
        }

        .eo-menu-arrow {
            margin-left: auto;
            color: rgba(255,255,255,.35);
            font-size: 16px;
        }

        /* SIDEBAR BOTTOM */

        .eo-sidebar-bottom {
            padding-top: 12px;
            margin-top: 12px;
            border-top: 1px solid rgba(255,255,255,.09);
        }

        .eo-logout {
            width: 100%;
            border: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 10px 11px;
            border-radius: 11px;
            color: #fecaca;
            background: transparent;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
        }

        .eo-logout:hover {
            background: rgba(239,68,68,.13);
            color: #fee2e2;
        }

        .eo-sidebar-quote {
            margin: 15px 8px 5px;
            color: rgba(255,255,255,.43);
            font-size: 9px;
            line-height: 1.6;
        }

        /* ========================================
           MAIN
        ======================================== */

        .eo-main {
            width: calc(100% - 265px);
            margin-left: 265px;
            min-width: 0;
        }

        /* ========================================
           TOPBAR
        ======================================== */

        .eo-topbar {
            height: 72px;
            position: sticky;
            top: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 0 30px;
            background: rgba(255,255,255,.94);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
        }

        .eo-topbar-left {
            min-width: 0;
        }

        .eo-breadcrumb {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #94a3b8;
            font-size: 10px;
            margin-bottom: 3px;
        }

        .eo-breadcrumb-current {
            color: #475569;
            font-weight: 700;
        }

        .eo-topbar-title {
            font-size: 15px;
            font-weight: 800;
            color: #102a43;
        }

        .eo-topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .eo-date {
            color: #64748b;
            font-size: 11px;
            padding: 8px 12px;
            border: 1px solid var(--border);
            background: #f8fafc;
            border-radius: 10px;
        }

        .eo-user-mini {
            display: flex;
            align-items: center;
            gap: 9px;
            padding-left: 14px;
            border-left: 1px solid var(--border);
        }

        .eo-mini-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #d1fae5;
            color: #047857;
            font-size: 11px;
            font-weight: 900;
        }

        .eo-mini-name {
            color: #1e293b;
            font-size: 11px;
            font-weight: 800;
        }

        .eo-mini-role {
            color: #94a3b8;
            font-size: 9px;
            margin-top: 2px;
        }

        /* ========================================
           CONTENT
        ======================================== */

        .eo-content {
            padding: 27px 30px 40px;
            min-height: calc(100vh - 72px);
        }

        .eo-alert {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding: 13px 15px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .eo-alert-success {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .eo-alert-error {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid #fecaca;
        }

        /* ========================================
           GENERAL PAGE COMPONENTS
        ======================================== */

        .page-header {
            background: white;
            padding: 22px;
            border-radius: 17px;
            margin-bottom: 20px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 15px rgba(15,23,42,.035);
        }

        .page-header h1 {
            margin: 0 0 7px;
            color: #102a43;
            font-size: 25px;
            font-weight: 800;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .card {
            background: white;
            border-radius: 17px;
            padding: 21px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 15px rgba(15,23,42,.035);
        }

        /* ========================================
           MOBILE BUTTON
        ======================================== */

        .eo-mobile-button {
            display: none;
            width: 38px;
            height: 38px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--green);
            font-weight: 900;
            cursor: pointer;
        }

        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 1100px) {

            .eo-sidebar {
                width: 235px;
                min-width: 235px;
            }

            .eo-main {
                width: calc(100% - 235px);
                margin-left: 235px;
            }

            .eo-content {
                padding: 24px;
            }

            .eo-date {
                display: none;
            }
        }

        @media (max-width: 800px) {

            .eo-sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .eo-sidebar.open {
                transform: translateX(0);
            }

            .eo-main {
                width: 100%;
                margin-left: 0;
            }

            .eo-mobile-button {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .eo-topbar {
                padding: 0 17px;
            }

            .eo-topbar-title {
                font-size: 14px;
            }

            .eo-user-mini {
                display: none;
            }

            .eo-content {
                padding: 18px;
            }
        }

        @media (max-width: 520px) {

            .eo-topbar {
                height: 64px;
            }

            .eo-content {
                padding: 14px;
            }

            .eo-breadcrumb {
                display: none;
            }

            .page-header {
                padding: 17px;
            }

            .page-header h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="eo-layout">

    {{-- =========================================
         SIDEBAR
    ========================================== --}}

    <aside class="eo-sidebar" id="eoSidebar">

        {{-- BRAND --}}
        <div class="eo-brand">

            <div class="eo-brand-logo">
                EH
            </div>

            <div>
                <div class="eo-brand-name">
                    Event Hub
                </div>

                <div class="eo-brand-subtitle">
                    Payakumbuh
                </div>
            </div>

        </div>

        {{-- PROFILE --}}
        <div class="eo-profile">

            <div class="eo-profile-top">

                <div class="eo-avatar">
                    {{ strtoupper(substr($user->name ?? 'EO', 0, 2)) }}
                </div>

                <div class="eo-profile-info">

                    <span class="eo-profile-name">
                        {{ $user->name ?? 'EO' }}
                    </span>

                    <span class="eo-profile-role">
                        EO
                        @if($user?->divisi)
                            {{ $user->divisi->nama_divisi }}
                        @endif
                    </span>

                </div>

            </div>

        </div>

        {{-- MENU --}}
        <nav class="eo-menu">

            {{-- UTAMA --}}
            <div class="eo-menu-title">
                Menu Utama
            </div>

            <a
                href="{{ route('eo.dashboard') }}"
                class="eo-menu-link {{ request()->routeIs('eo.dashboard') ? 'active' : '' }}"
            >
                <span class="eo-menu-icon">DB</span>
                <span>Dashboard</span>
                <span class="eo-menu-arrow">›</span>
            </a>


            {{-- KETUA --}}
            @if($user?->divisi?->nama_divisi === 'Ketua')

                <div class="eo-menu-title">
                    Manajemen EO
                </div>

                <a
                    href="{{ route('eo.events.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">EV</span>
                    <span>Kelola Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.panitia.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.panitia.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">PN</span>
                    <span>Panitia</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.monitoring') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.monitoring') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">MN</span>
                    <span>Monitoring</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">LP</span>
                    <span>Laporan</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

            @endif


            {{-- ACARA --}}
            @if($user?->divisi?->nama_divisi === 'Acara')

                <div class="eo-menu-title">
                    Kelola Acara
                </div>

                <a
                    href="{{ route('eo.events.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">EV</span>
                    <span>Kelola Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.jadwal.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.jadwal.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">JD</span>
                    <span>Jadwal</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.rundown.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.rundown.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">RD</span>
                    <span>Rundown</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.kegiatan.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.kegiatan.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">KG</span>
                    <span>Kegiatan</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

            @endif


            {{-- HUMAS --}}
            @if($user?->divisi?->nama_divisi === 'Humas')

                <div class="eo-menu-title">
                    Kelola Humas
                </div>

                <a
                    href="{{ route('eo.events.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">IN</span>
                    <span>Informasi Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">PB</span>
                    <span>Publikasi Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link"
                >
                    <span class="eo-menu-icon">PG</span>
                    <span>Pengumuman</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link"
                >
                    <span class="eo-menu-icon">PR</span>
                    <span>Press Release</span>
                    <span class="eo-menu-arrow">›</span>
                </a>


                <div class="eo-menu-title">
                    Komunikasi
                </div>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link"
                >
                    <span class="eo-menu-icon">MS</span>
                    <span>Media & Sosial</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link"
                >
                    <span class="eo-menu-icon">KK</span>
                    <span>Kontak & Komunikasi</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link"
                >
                    <span class="eo-menu-icon">MP</span>
                    <span>Monitoring Publikasi</span>
                    <span class="eo-menu-arrow">›</span>
                </a>


                <div class="eo-menu-title">
                    Laporan
                </div>

                <a
                    href="{{ route('eo.laporan') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">LP</span>
                    <span>Laporan Humas</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

            @endif


            {{-- SPONSORSHIP --}}
            @if($user?->divisi?->nama_divisi === 'Sponsorship')

                <div class="eo-menu-title">
                    Sponsorship
                </div>

                <a
                    href="{{ route('eo.sponsorship.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.sponsorship.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">SP</span>
                    <span>Sponsorship</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.events.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">EV</span>
                    <span>Informasi Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

            @endif


            {{-- DOKUMENTASI --}}
            @if($user?->divisi?->nama_divisi === 'Dokumentasi')

                <div class="eo-menu-title">
                    Dokumentasi
                </div>

                <a
                    href="{{ route('eo.dokumentasi.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.dokumentasi.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">DK</span>
                    <span>Dokumentasi</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

                <a
                    href="{{ route('eo.events.index') }}"
                    class="eo-menu-link {{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">EV</span>
                    <span>Informasi Event</span>
                    <span class="eo-menu-arrow">›</span>
                </a>

            @endif

        </nav>


        {{-- BOTTOM --}}
        <div class="eo-sidebar-bottom">

            <div class="eo-menu-title">
                Akun
            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="eo-logout"
                >
                    <span class="eo-menu-icon">LO</span>
                    <span>Logout</span>
                </button>
            </form>

            <div class="eo-sidebar-quote">
                Bersama informasi,<br>
                kita hadirkan event<br>
                yang lebih berdampak.
            </div>

        </div>

    </aside>


    {{-- =========================================
         MAIN
    ========================================== --}}

    <main class="eo-main">

        {{-- TOPBAR --}}
        <header class="eo-topbar">

            <div class="eo-topbar-left">

                <button
                    class="eo-mobile-button"
                    onclick="document.getElementById('eoSidebar').classList.toggle('open')"
                >
                    ☰
                </button>

                <div class="eo-breadcrumb">
                    <span>Event Hub</span>
                    <span>/</span>
                    <span class="eo-breadcrumb-current">
                        {{ $title ?? 'Dashboard' }}
                    </span>
                </div>

                <div class="eo-topbar-title">
                    {{ $title ?? 'Dashboard EO' }}
                </div>

            </div>


            <div class="eo-topbar-right">

                <div class="eo-date">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>

                <div class="eo-user-mini">

                    <div class="eo-mini-avatar">
                        {{ strtoupper(substr($user->name ?? 'EO', 0, 2)) }}
                    </div>

                    <div>
                        <div class="eo-mini-name">
                            {{ $user->name ?? 'EO' }}
                        </div>

                        <div class="eo-mini-role">
                            EO
                            @if($user?->divisi)
                                {{ $user->divisi->nama_divisi }}
                            @endif
                        </div>
                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <section class="eo-content">

            @if(session('success'))

                <div class="eo-alert eo-alert-success">
                    <strong>Berhasil</strong>
                    <span>{{ session('success') }}</span>
                </div>

            @endif


            @if(session('error'))

                <div class="eo-alert eo-alert-error">
                    <strong>Perhatian</strong>
                    <span>{{ session('error') }}</span>
                </div>

            @endif


            {{ $slot }}

        </section>

    </main>

</div>

</body>
</html>
