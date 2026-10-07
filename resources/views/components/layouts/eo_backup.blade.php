@props([
    'user' => null,
    'title' => 'Dashboard'
])

@php
    $divisi = $user?->divisi?->nama_divisi ?? '';
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

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7f6;
            color: #1f2937;
        }

        .eo-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .eo-sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 100;
        }

        .eo-brand {
            height: 76px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .eo-brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #166534;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
        }

        .eo-brand-title {
            font-size: 15px;
            font-weight: bold;
            color: #172033;
        }

        .eo-brand-subtitle {
            margin-top: 3px;
            font-size: 12px;
            color: #64748b;
        }

        /* USER */

        .eo-user {
            padding: 20px;
            background: #f8fafc;
            border-bottom: 1px solid #e5e7eb;
        }

        .eo-user-label {
            margin-bottom: 7px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .eo-user-name {
            margin-bottom: 7px;
            color: #1f2937;
            font-size: 15px;
            font-weight: bold;
        }

        .eo-user-divisi {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        /* MENU */

        .eo-menu {
            padding: 18px 15px;
        }

        .eo-menu-title {
            margin: 5px 5px 12px;
            color: #94a3b8;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .eo-menu a,
        .eo-logout-button {
            width: 100%;
            min-height: 44px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 5px;
            padding: 11px 13px;
            border: none;
            border-radius: 9px;
            background: transparent;
            color: #475569;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            text-align: left;
            transition: .2s;
        }

        .eo-menu a:hover {
            background: #f0fdf4;
            color: #166534;
        }

        .eo-menu a.active {
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
        }

        .eo-menu-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border-radius: 7px;
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: bold;
        }

        .eo-menu a.active .eo-menu-icon {
            background: #166534;
            color: #ffffff;
        }

        .eo-logout {
            margin-top: 20px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .eo-logout-button {
            color: #dc2626;
        }

        .eo-logout-button:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        .eo-logout-button .eo-menu-icon {
            color: #dc2626;
            background: #fef2f2;
        }

        /* =========================
           MAIN
        ========================== */

        .eo-main {
            width: calc(100% - 260px);
            min-height: 100vh;
            margin-left: 260px;
        }

        .eo-topbar {
            min-height: 76px;
            padding: 18px 28px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .eo-page-title {
            margin: 0;
            color: #172033;
            font-size: 23px;
            font-weight: bold;
        }

        .eo-page-subtitle {
            margin-top: 4px;
            color: #64748b;
            font-size: 13px;
        }

        .eo-topbar-badge {
            padding: 7px 11px;
            border-radius: 7px;
            background: #f0fdf4;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
        }

        .eo-content {
            padding: 28px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 850px) {
            .eo-sidebar {
                width: 225px;
            }

            .eo-main {
                width: calc(100% - 225px);
                margin-left: 225px;
            }

            .eo-content {
                padding: 20px;
            }
        }

        @media (max-width: 650px) {
            .eo-wrapper {
                display: block;
            }

            .eo-sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .eo-main {
                width: 100%;
                margin-left: 0;
            }

            .eo-topbar {
                padding: 16px 18px;
            }

            .eo-content {
                padding: 16px;
            }

            .eo-topbar-badge {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="eo-wrapper">

    {{-- SIDEBAR --}}
    <aside class="eo-sidebar">

        {{-- BRAND --}}
        <div class="eo-brand">

            <div class="eo-brand-icon">
                EH
            </div>

            <div>
                <div class="eo-brand-title">
                    Event Hub
                </div>

                <div class="eo-brand-subtitle">
                    Payakumbuh
                </div>
            </div>

        </div>


        {{-- USER --}}
        <div class="eo-user">

            <div class="eo-user-label">
                Akun EO
            </div>

            <div class="eo-user-name">
                {{ $user?->name ?? 'EO' }}
            </div>

            <div class="eo-user-divisi">
                {{ $divisi ?: 'Divisi belum ditentukan' }}
            </div>

        </div>


        {{-- MENU --}}
        <nav class="eo-menu">

            <div class="eo-menu-title">
                Menu Utama
            </div>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('eo.dashboard') }}"
                class="{{ request()->routeIs('eo.dashboard') ? 'active' : '' }}"
            >

                <span class="eo-menu-icon">
                    DB
                </span>

                Dashboard

            </a>


            {{-- KETUA --}}
            @if($divisi === 'Ketua')

                <a
                    href="{{ route('eo.events.index') }}"
                    class="{{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        EV
                    </span>

                    Kelola Event
                </a>


                <a
                    href="{{ route('eo.panitia.index') }}"
                    class="{{ request()->routeIs('eo.panitia.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        PN
                    </span>

                    Panitia
                </a>


                <a
                    href="{{ route('eo.monitoring') }}"
                    class="{{ request()->routeIs('eo.monitoring') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        MN
                    </span>

                    Monitoring
                </a>


                <a
                    href="{{ route('eo.laporan') }}"
                    class="{{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        LP
                    </span>

                    Laporan
                </a>

            @endif


            {{-- ACARA --}}
            @if($divisi === 'Acara')

                <a
                    href="{{ route('eo.rundown.index') }}"
                    class="{{ request()->routeIs('eo.rundown.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        RD
                    </span>

                    Rundown
                </a>


                <a
                    href="{{ route('eo.jadwal.index') }}"
                    class="{{ request()->routeIs('eo.jadwal.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        JD
                    </span>

                    Jadwal
                </a>


                <a
                    href="{{ route('eo.kegiatan.index') }}"
                    class="{{ request()->routeIs('eo.kegiatan.*') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        KG
                    </span>

                    Kegiatan
                </a>

            @endif


            {{-- HUMAS --}}
            @if($divisi === 'Humas')

                <a
                    href="{{ route('eo.laporan') }}"
                    class="{{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >
                    <span class="eo-menu-icon">
                        LP
                    </span>

                    Laporan
                </a>

            @endif


            {{-- SPONSORSHIP --}}
            @if($divisi === 'Sponsorship')

                @if(Route::has('eo.sponsorship.index'))

                    <a
                        href="{{ route('eo.sponsorship.index') }}"
                        class="{{ request()->routeIs('eo.sponsorship.*') ? 'active' : '' }}"
                    >
                        <span class="eo-menu-icon">
                            SP
                        </span>

                        Sponsorship
                    </a>

                @endif

            @endif


            {{-- DOKUMENTASI --}}
            @if($divisi === 'Dokumentasi')

                @if(Route::has('eo.dokumentasi.index'))

                    <a
                        href="{{ route('eo.dokumentasi.index') }}"
                        class="{{ request()->routeIs('eo.dokumentasi.*') ? 'active' : '' }}"
                    >
                        <span class="eo-menu-icon">
                            DK
                        </span>

                        Dokumentasi
                    </a>

                @endif

            @endif


            {{-- LOGOUT --}}
            <div class="eo-logout">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="eo-logout-button"
                    >

                        <span class="eo-menu-icon">
                            LO
                        </span>

                        Logout

                    </button>

                </form>

            </div>

        </nav>

    </aside>


    {{-- MAIN CONTENT --}}
    <main class="eo-main">

        <header class="eo-topbar">

            <div>
                <h1 class="eo-page-title">
                    {{ $title }}
                </h1>

                <div class="eo-page-subtitle">
                    Payakumbuh Event Hub
                </div>
            </div>

            <div class="eo-topbar-badge">
                {{ $divisi ?: 'EO' }}
            </div>

        </header>


        <section class="eo-content">

            {{ $slot }}

        </section>

    </main>

</div>

</body>

</html>