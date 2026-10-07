@props(['user' => null, 'title' => 'EO Event Hub'])

@php
    $currentRoute = request()->route()?->getName() ?? '';

    $isActive = function ($prefixes) use ($currentRoute) {
        foreach ((array) $prefixes as $prefix) {
            if ($currentRoute === $prefix || str_starts_with($currentRoute, $prefix . '.')) {
                return true;
            }
        }
        return false;
    };
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }} - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
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

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        .eo-layout {
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .eo-sidebar {
            width: 260px;
            min-width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            overflow-y: auto;
        }

        .eo-brand {
            height: 82px;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
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
            font-size: 13px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 800;
            color: #0f172a;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 11px;
            color: #64748b;
        }

        .account-box {
            padding: 18px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .account-label {
            margin-bottom: 8px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .account-name {
            margin-bottom: 8px;
            color: #0f172a;
            font-size: 14px;
            font-weight: 800;
        }

        .account-role {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 7px;
            background: #dcfce7;
            color: #047857;
            font-size: 10px;
            font-weight: 800;
        }

        .sidebar-section {
            padding: 18px 20px 7px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .sidebar-menu {
            padding: 0 14px;
        }

        .sidebar-menu a,
        .logout-button {
            width: 100%;
            min-height: 42px;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 8px 11px;
            margin-bottom: 3px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: #475569;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            cursor: pointer;
            transition: .2s ease;
        }

        .sidebar-menu a:hover,
        .logout-button:hover {
            background: #f1f5f9;
            color: #047857;
        }

        .sidebar-menu a.active {
            background: #dcfce7;
            color: #047857;
            font-weight: 700;
        }

        .menu-icon {
            width: 28px;
            height: 28px;
            min-width: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 9px;
            font-weight: 800;
        }

        .sidebar-menu a.active .menu-icon {
            background: #047857;
            color: #ffffff;
        }

        .logout-button {
            color: #dc2626;
        }

        .logout-button:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .logout-button .menu-icon {
            background: #fef2f2;
            color: #dc2626;
        }

        .sidebar-divider {
            height: 1px;
            margin: 16px 15px 0;
            background: #e2e8f0;
        }

        /* =========================
           MAIN
        ========================== */

        .eo-main {
            width: calc(100% - 260px);
            min-height: 100vh;
            margin-left: 260px;
        }

        .eo-header {
            height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        .header-title {
            color: #0f172a;
            font-size: 23px;
            font-weight: 800;
        }

        .header-subtitle {
            margin-top: 4px;
            color: #64748b;
            font-size: 12px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-date {
            color: #64748b;
            font-size: 12px;
        }

        .header-role {
            padding: 8px 12px;
            border-radius: 9px;
            background: #ecfdf5;
            color: #047857;
            font-size: 11px;
            font-weight: 800;
        }

        .eo-content {
            min-height: calc(100vh - 82px);
        }

        /* =========================
           SCROLLBAR
        ========================== */

        .eo-sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .eo-sidebar::-webkit-scrollbar-track {
            background: #ffffff;
        }

        .eo-sidebar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 900px) {
            .eo-sidebar {
                width: 225px;
                min-width: 225px;
            }

            .eo-main {
                width: calc(100% - 225px);
                margin-left: 225px;
            }

            .eo-header {
                padding: 0 18px;
            }

            .header-date {
                display: none;
            }
        }

        @media (max-width: 650px) {
            .eo-sidebar {
                width: 200px;
                min-width: 200px;
            }

            .eo-main {
                width: calc(100% - 200px);
                margin-left: 200px;
            }

            .eo-header {
                height: 72px;
            }

            .header-title {
                font-size: 18px;
            }

            .header-subtitle {
                font-size: 10px;
            }

            .header-role {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="eo-layout">

    <aside class="eo-sidebar">

        {{-- BRAND --}}
        <div class="eo-brand">
            <div class="brand-logo">EH</div>

            <div>
                <div class="brand-name">EO Event Hub</div>
                <div class="brand-subtitle">Payakumbuh Event Hub</div>
            </div>
        </div>

        {{-- ACCOUNT --}}
        <div class="account-box">
            <div class="account-label">AKUN EO</div>

            <div class="account-name">
                {{ $user?->name ?? 'EO Event Hub' }}
            </div>

            <span class="account-role">
                EVENT ORGANIZER
            </span>
        </div>

        {{-- DASHBOARD --}}
        <div class="sidebar-section">
            DASHBOARD
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.dashboard') }}"
               class="{{ $currentRoute === 'eo.dashboard' ? 'active' : '' }}">
                <span class="menu-icon">DB</span>
                <span>Dashboard</span>
            </a>

        </div>

        {{-- EVENT --}}
        <div class="sidebar-section">
            EVENT
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.events.index') }}"
               class="{{ $isActive('eo.events') ? 'active' : '' }}">
                <span class="menu-icon">EV</span>
                <span>Kelola Event</span>
            </a>

            <a href="{{ route('eo.rundown.index') }}"
               class="{{ $isActive('eo.rundown') ? 'active' : '' }}">
                <span class="menu-icon">RD</span>
                <span>Rundown Acara</span>
            </a>

            <a href="{{ route('eo.jadwal.index') }}"
               class="{{ $isActive('eo.jadwal') ? 'active' : '' }}">
                <span class="menu-icon">JD</span>
                <span>Jadwal Kegiatan</span>
            </a>

            <a href="{{ route('eo.perlengkapan.index') }}"
               class="{{ $isActive('eo.perlengkapan') ? 'active' : '' }}">
                <span class="menu-icon">PR</span>
                <span>Perlengkapan</span>
            </a>

            <a href="{{ route('eo.monitoring') }}"
               class="{{ $currentRoute === 'eo.monitoring' ? 'active' : '' }}">
                <span class="menu-icon">MN</span>
                <span>Monitoring Kegiatan</span>
            </a>

        </div>

        {{-- PANITIA --}}
        <div class="sidebar-section">
            PANITIA
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.panitia.index') }}"
               class="{{ $isActive('eo.panitia') ? 'active' : '' }}">
                <span class="menu-icon">PN</span>
                <span>Kelola Panitia</span>
            </a>

            <a href="{{ route('eo.panitia.index') }}"
               class="{{ $isActive('eo.panitia') ? 'active' : '' }}">
                <span class="menu-icon">PT</span>
                <span>Pembagian Tugas</span>
            </a>

        </div>

        {{-- SPONSORSHIP --}}
        <div class="sidebar-section">
            SPONSORSHIP
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.sponsorship.paket.index') }}"
               class="{{ $isActive('eo.sponsorship.paket') ? 'active' : '' }}">
                <span class="menu-icon">PS</span>
                <span>Paket Sponsorship</span>
            </a>

            <a href="{{ route('eo.sponsorship.pengajuan.index') }}"
               class="{{ $isActive('eo.sponsorship.pengajuan') ? 'active' : '' }}">
                <span class="menu-icon">PG</span>
                <span>Pengajuan Sponsor</span>
            </a>

            <a href="{{ route('eo.sponsorship.pengajuan.index') }}"
               class="{{ $isActive('eo.sponsorship.pengajuan') ? 'active' : '' }}">
                <span class="menu-icon">NG</span>
                <span>Negosiasi</span>
            </a>

            <a href="{{ route('eo.sponsorship.dukungan.index') }}"
               class="{{ $isActive('eo.sponsorship.dukungan') ? 'active' : '' }}">
                <span class="menu-icon">DS</span>
                <span>Dukungan Sponsor</span>
            </a>

        </div>

        {{-- DOKUMENTASI --}}
        <div class="sidebar-section">
            DOKUMENTASI
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.dokumentasi.index') }}"
               class="{{ $isActive('eo.dokumentasi') ? 'active' : '' }}">
                <span class="menu-icon">DK</span>
                <span>Kelola Dokumentasi</span>
            </a>

            <a href="{{ route('eo.dokumentasi.index') }}"
               class="{{ $isActive('eo.dokumentasi') ? 'active' : '' }}">
                <span class="menu-icon">GL</span>
                <span>Galeri Event</span>
            </a>

        </div>

        {{-- LAPORAN --}}
        <div class="sidebar-section">
            LAPORAN
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.laporan') }}"
               class="{{ $currentRoute === 'eo.laporan' ? 'active' : '' }}">
                <span class="menu-icon">LP</span>
                <span>Laporan Event</span>
            </a>

        </div>

        <div class="sidebar-divider"></div>

        {{-- AKUN --}}
        <div class="sidebar-section">
            AKUN
        </div>

        <div class="sidebar-menu">

            <a href="{{ route('eo.profil') }}"
               class="{{ $currentRoute === 'eo.profil' ? 'active' : '' }}">
                <span class="menu-icon">PR</span>
                <span>Profil</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf

                <button type="submit" class="logout-button">
                    <span class="menu-icon">LO</span>
                    <span>Logout</span>
                </button>
            </form>

        </div>

        <div style="height:20px;"></div>

    </aside>

    <main class="eo-main">

        <header class="eo-header">

            <div>
                <div class="header-title">
                    {{ $title }}
                </div>

                <div class="header-subtitle">
                    EO Event Hub - Payakumbuh
                </div>
            </div>

            <div class="header-right">

                <div class="header-date">
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>

                <div class="header-role">
                    EVENT ORGANIZER
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