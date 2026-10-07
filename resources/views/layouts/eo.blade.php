{{-- resources/views/layouts/eo.blade.php --}}

@php
    $currentRoute = Route::currentRouteName();
    $division = strtoupper($user?->divisi?->nama_divisi ?? 'EO');
@endphp

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $title ?? 'Dashboard EO' }} - Payakumbuh Event Hub
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family:
                Arial,
                Helvetica,
                sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* ========================================
           SIDEBAR
        ======================================== */

        .sidebar {
            width: 270px;
            min-height: 100vh;
            background: linear-gradient(
                180deg,
                #047857 0%,
                #065f46 100%
            );
            color: white;
            padding: 24px 18px;
            flex-shrink: 0;
        }

        .logo {
            text-align: center;
            padding: 5px 5px 22px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .logo h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .logo p {
            margin: 7px 0 0;
            font-size: 12px;
            opacity: .8;
        }

        /* ========================================
           PROFILE
        ======================================== */

        .profile {
            margin: 20px 0;
            padding: 15px;
            border-radius: 14px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.10);
        }

        .profile-name {
            display: block;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .profile-role {
            display: block;
            font-size: 12px;
            opacity: .78;
        }

        /* ========================================
           MENU
        ======================================== */

        .menu-title {
            margin: 22px 10px 9px;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            opacity: .55;
        }

        .menu a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: .2s ease;
        }

        .menu a:hover {
            background: rgba(255,255,255,.12);
            transform: translateX(2px);
        }

        .menu a.active {
            background: rgba(255,255,255,.18);
            font-weight: 700;
            box-shadow:
                inset 3px 0 0 white;
        }

        /* ========================================
           LOGOUT
        ======================================== */

        .logout {
            margin-top: 28px;
        }

        .logout button {
            width: 100%;
            border: 0;
            border-radius: 10px;
            padding: 12px;
            background: #dc2626;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s ease;
        }

        .logout button:hover {
            background: #b91c1c;
        }

        /* ========================================
           MAIN
        ======================================== */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 72px;
            padding: 0 30px;
            background: white;
            border-bottom: 1px solid #e5e7eb;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .topbar-title {
            font-size: 19px;
            font-weight: 700;
            color: #111827;
        }

        .topbar-user {
            color: #64748b;
            font-size: 13px;
        }

        .content {
            padding: 30px;
        }

        /* ========================================
           ALERT
        ======================================== */

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        /* ========================================
           GENERAL
        ======================================== */

        .page-header {
            background: white;
            padding: 24px;
            border-radius: 16px;
            margin-bottom: 24px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(15,23,42,.05);
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 26px;
            color: #111827;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(15,23,42,.05);
        }

        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 230px;
            }

            .content {
                padding: 22px;
            }

            .topbar {
                padding: 0 22px;
            }

        }

        @media (max-width: 650px) {

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .topbar {
                min-height: auto;
                padding: 15px;
                flex-direction: column;
                align-items: flex-start;
            }

            .content {
                padding: 15px;
            }

        }

    <style>
.menu-icon {
    width: 28px;
    height: 28px;
    min-width: 28px;
    border-radius: 8px;
    background: rgba(255,255,255,.10);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .3px;
}

.sidebar a.active .menu-icon {
    background: rgba(255,255,255,.20);
}

.logout .menu-icon {
    display: inline-flex;
}
</style>
</style>

</head>


<body>

<div class="layout">


    {{-- ========================================
         SIDEBAR
    ======================================== --}}

    <aside class="sidebar">


        {{-- LOGO --}}

        <div class="logo">

            <h2>
                Payakumbuh Event Hub
            </h2>

            <p>
                Panel Event Organizer
            </p>

        </div>


        {{-- PROFILE --}}

        <div class="profile">

            <span class="profile-name">
                {{ $user->name ?? 'EO' }}
            </span>

            <span class="profile-role">

                EO

                @if($user?->divisi)

                    - {{ $user->divisi->nama_divisi }}

                @endif

            </span>

        </div>


        {{-- ====================================
             MENU
        ==================================== --}}

        <div class="menu">


            <div class="menu-title">
                Menu Utama
            </div>


            {{-- DASHBOARD --}}

            <a
                href="{{ route('eo.dashboard') }}"
                class="{{ request()->routeIs('eo.dashboard') ? 'active' : '' }}"
            >

                Dashboard

            </a>


            {{-- =================================
                 EVENT
            ================================== --}}

            <a
                href="{{ route('eo.events.index') }}"
                class="{{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
            >

                Kelola Event

            </a>


            {{-- =================================
                 MENU KETUA
            ================================== --}}

            @if($user?->divisi?->nama_divisi === 'Ketua')


                <a
                    href="{{ route('eo.panitia.index') }}"
                    class="{{ request()->routeIs('eo.panitia.*') ? 'active' : '' }}"
                >

                    Panitia

                </a>


                <a
                    href="{{ route('eo.monitoring') }}"
                    class="{{ request()->routeIs('eo.monitoring') ? 'active' : '' }}"
                >

                    Monitoring

                </a>


                <a
                    href="{{ route('eo.laporan') }}"
                    class="{{ request()->routeIs('eo.laporan') ? 'active' : '' }}"
                >

                    Laporan

                </a>

            @endif


            {{-- =================================
                 MENU ACARA
            ================================== --}}

            @if($user?->divisi?->nama_divisi === 'Acara')


                <div class="menu-title">
                    Divisi Acara
                </div>


                <a
                    href="{{ route('eo.rundown.index') }}"
                    class="{{ request()->routeIs('eo.rundown.*') ? 'active' : '' }}"
                >

                    Rundown

                </a>


                <a
                    href="{{ route('eo.jadwal.index') }}"
                    class="{{ request()->routeIs('eo.jadwal.*') ? 'active' : '' }}"
                >

                    Jadwal

                </a>


                <a
                    href="{{ route('eo.kegiatan.index') }}"
                    class="{{ request()->routeIs('eo.kegiatan.*') ? 'active' : '' }}"
                >

                    Kegiatan

                </a>

            @endif


            {{-- =================================
                 MENU HUMAS
            ================================== --}}

            @if($user?->divisi?->nama_divisi === 'Humas')


                <div class="menu-title">
                    Divisi Humas
                </div>


                {{-- PUBLIKASI --}}

                <a
                    href="{{ route('eo.publikasi.index') }}"
                    class="{{ request()->routeIs('eo.publikasi.*') ? 'active' : '' }}"
                >

                    Publikasi

                </a>


                {{-- BUAT PUBLIKASI --}}

                <a
                    href="{{ route('eo.publikasi.create') }}"
                    class="{{ request()->routeIs('eo.publikasi.create') ? 'active' : '' }}"
                >

                    Ajukan Publikasi

                </a>

            @endif


            {{-- =================================
                 MENU SPONSORSHIP
            ================================== --}}

            @if($user?->divisi?->nama_divisi === 'Sponsorship')


                <div class="menu-title">
                    Divisi Sponsorship
                </div>


                <a
                    href="{{ route('eo.sponsorship.index') }}"
                    class="{{ request()->routeIs('eo.sponsorship.*') ? 'active' : '' }}"
                >

                    Sponsorship

                </a>

            @endif


            {{-- =================================
     MENU DOKUMENTASI
================================== --}}

@if($user?->divisi?->nama_divisi === 'Dokumentasi')

    <div class="menu-title">
        DOKUMENTASI
    </div>

    <a
        href="{{ route('eo.dokumentasi.index') }}"
        class="{{ request()->routeIs('eo.dokumentasi.index') || request()->routeIs('eo.dokumentasi.show') || request()->routeIs('eo.dokumentasi.edit') ? 'active' : '' }}"
    >
        <span class="menu-icon">DK</span>
        <span>Kelola Dokumentasi</span>
    </a>

    <a
        href="{{ route('eo.dokumentasi.create') }}"
        class="{{ request()->routeIs('eo.dokumentasi.create') ? 'active' : '' }}"
    >
        <span class="menu-icon">+</span>
        <span>Tambah Dokumentasi</span>
    </a>

    <div class="menu-title">
        KEGIATAN
    </div>

    <a
        href="{{ route('eo.events.index') }}"
        class="{{ request()->routeIs('eo.events.*') ? 'active' : '' }}"
    >
        <span class="menu-icon">EV</span>
        <span>Event</span>
    </a>

    <a
        href="{{ route('eo.kegiatan.index') }}"
        class="{{ request()->routeIs('eo.kegiatan.*') ? 'active' : '' }}"
    >
        <span class="menu-icon">KG</span>
        <span>Kegiatan</span>
    </a>

@endif
            {{-- =================================
                 AKUN
            ================================== --}}

            <div class="menu-title">
                AKUN
            </div>

            <a
                href="{{ route('eo.profil') }}"
                class="{{ request()->routeIs('eo.profil*') ? 'active' : '' }}"
            >
                <span class="menu-icon">PR</span>
                <span>Profil Akun</span>
            </a>

            <div class="logout">
                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf

                    <button type="submit">
                        <span class="menu-icon">LO</span>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
</aside>


    {{-- ========================================
         MAIN
    ======================================== --}}

    <main class="main">


        {{-- TOPBAR --}}

        <div class="topbar">

            <div class="topbar-title">

                {{ $title ?? 'Dashboard' }}

            </div>


            <div class="topbar-user">

                {{ $user->name ?? 'EO' }}

                @if($user?->divisi)

                    Ãƒâ€šÃ‚Â· {{ $user->divisi->nama_divisi }}

                @endif

            </div>

        </div>


        {{-- CONTENT --}}

        <section class="content">


            {{-- SUCCESS --}}

            @if(session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ERROR --}}

            @if(session('error'))

                <div class="alert-error">

                    {{ session('error') }}

                </div>

            @endif


            {{ $slot }}


        </section>

    </main>

</div>

</body>

</html>