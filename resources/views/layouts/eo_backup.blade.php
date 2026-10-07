{{-- resources/views/layouts/eo.blade.php --}}

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

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 250px;
            background: #166534;
            color: white;
            padding: 25px 18px;
            flex-shrink: 0;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo h2 {
            margin: 0;
            font-size: 19px;
        }

        .logo p {
            margin: 8px 0 0;
            font-size: 12px;
            opacity: .8;
        }

        /* PROFILE */

        .profile {
            background: #15803d;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .profile-name {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .profile-role {
            font-size: 12px;
            opacity: .85;
        }

        /* MENU */

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            opacity: .65;
            margin: 20px 10px 8px;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 8px;
            font-size: 14px;
        }

        .menu a:hover {
            background: #15803d;
        }

        .menu a.active {
            background: #15803d;
            font-weight: bold;
        }

        /* LOGOUT */

        .logout {
            margin-top: 30px;
        }

        .logout button {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 8px;
            background: #dc2626;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .logout button:hover {
            background: #b91c1c;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: white;
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e5e7eb;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: bold;
        }

        .topbar-user {
            color: #6b7280;
            font-size: 14px;
        }

        .content {
            padding: 30px;
        }

        /* =========================
           GENERAL
        ========================= */

        .page-header {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0,0,0,.05);
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 25px;
        }

        .page-header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 3px 10px rgba(0,0,0,.05);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .sidebar {
                width: 210px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 0 20px;
            }

        }

        @media (max-width: 600px) {

            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .topbar {
                height: auto;
                padding: 15px;
                gap: 10px;
                flex-direction: column;
                align-items: flex-start;
            }

            .content {
                padding: 15px;
            }

        }

    </style>

</head>


<body>

<div class="layout">


    {{-- =========================
         SIDEBAR EO
    ========================== --}}

    <aside class="sidebar">

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


        {{-- MENU --}}

        <div class="menu">

            <div class="menu-title">
                Menu Utama
            </div>


            {{-- DASHBOARD --}}

            <a
                href="{{ route('eo.dashboard') }}"
                class="{{ request()->routeIs('eo.dashboard') ? 'active' : '' }}">

                Dashboard

            </a>


            {{-- EVENT --}}

            <a
                href="{{ route('eo.events.index') }}"
                class="{{ request()->routeIs('eo.events.*') ? 'active' : '' }}">

                Kelola Event

            </a>


            {{-- PANITIA --}}

            @if($user?->divisi?->nama_divisi === 'Ketua')

                <a
                    href="{{ route('eo.panitia.index') }}"
                    class="{{ request()->routeIs('eo.panitia.*') ? 'active' : '' }}">

                    Panitia

                </a>

            @endif


            {{-- MONITORING --}}

            @if($user?->divisi?->nama_divisi === 'Ketua')

                <a
                    href="{{ route('eo.monitoring') }}"
                    class="{{ request()->routeIs('eo.monitoring.*') ? 'active' : '' }}">

                    Monitoring

                </a>

            @endif


            {{-- LAPORAN --}}

            @if($user?->divisi?->nama_divisi === 'Ketua')

                <a
                    href="{{ route('eo.laporan') }}"
                    class="{{ request()->routeIs('eo.laporan.*') ? 'active' : '' }}">

                    Laporan

                </a>

            @endif


            <div class="menu-title">
                Akun
            </div>


            {{-- LOGOUT --}}

            <div class="logout">

                <form
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button type="submit">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </aside>


    {{-- =========================
         MAIN
    ========================== --}}

    <main class="main">


        {{-- TOPBAR --}}

        <div class="topbar">

            <div class="topbar-title">

                {{ $title ?? 'Dashboard' }}

            </div>

            <div class="topbar-user">

                {{ $user->name ?? 'EO' }}

                @if($user?->divisi)
                    Â· {{ $user->divisi->nama_divisi }}
                @endif

            </div>

        </div>


        {{-- CONTENT --}}

        <section class="content">

            @if(session('success'))

                <div
                    style="
                        background:#dcfce7;
                        color:#166534;
                        padding:13px 16px;
                        border-radius:8px;
                        margin-bottom:20px;
                    ">

                    {{ session('success') }}

                </div>

            @endif


            @if(session('error'))

                <div
                    style="
                        background:#fee2e2;
                        color:#991b1b;
                        padding:13px 16px;
                        border-radius:8px;
                        margin-bottom:20px;
                    ">

                    {{ session('error') }}

                </div>

            @endif


            {{ $slot }}

        </section>

    </main>

</div>

</body>

</html>
