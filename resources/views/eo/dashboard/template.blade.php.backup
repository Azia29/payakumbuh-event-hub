<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard {{ $user->divisi?->nama_divisi }} - Payakumbuh Event Hub</title>

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

        .sidebar {
            width: 250px;
            background: #166534;
            color: white;
            padding: 25px 18px;
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
            font-size: 13px;
            opacity: .8;
        }

        .profile {
            background: #15803d;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .profile strong {
            display: block;
        }

        .profile span {
            font-size: 12px;
            opacity: .8;
        }

        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 14px;
            margin-bottom: 6px;
            border-radius: 8px;
        }

        .menu a:hover,
        .menu a.active {
            background: #15803d;
        }

        .logout {
            margin-top: 25px;
        }

        .logout button {
            width: 100%;
            padding: 11px;
            border: 0;
            border-radius: 8px;
            background: #dc2626;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .header {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 3px 10px rgba(0,0,0,.05);
        }

        .header h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,.05);
        }

        .card h3 {
            margin: 0;
            color: #166534;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            margin-top: 12px;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 210px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <aside class="sidebar">

        <div class="logo">
            <h2>Payakumbuh Event Hub</h2>
            <p>Panel Event Organizer</p>
        </div>

        <div class="profile">
            <strong>{{ $user->name }}</strong>
            <span>{{ $user->divisi?->nama_divisi }}</span>
        </div>

        <div class="menu">

            {{-- DASHBOARD --}}
            <a href="{{ route('eo.dashboard') }}"
               class="{{ request()->routeIs('eo.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>


            {{-- EVENT --}}
            <a href="{{ route('eo.events.index') }}"
               class="{{ request()->routeIs('eo.events.*') ? 'active' : '' }}">
                Kelola Event
            </a>


            {{-- KETUA --}}
            @if($user->divisi?->nama_divisi === 'Ketua')

                <a href="{{ route('eo.panitia.index') }}"
                   class="{{ request()->routeIs('eo.panitia.*') ? 'active' : '' }}">
                    Panitia
                </a>

                <a href="#">
                    Monitoring
                </a>

                <a href="#">
                    Laporan
                </a>

            @endif


            {{-- ACARA --}}
            @if($user->divisi?->nama_divisi === 'Acara')

                <a href="#">
                    Rundown
                </a>

                <a href="#">
                    Jadwal
                </a>

                <a href="#">
                    Kegiatan
                </a>

                <a href="#">
                    Laporan
                </a>

            @endif


            {{-- HUMAS --}}
            @if($user->divisi?->nama_divisi === 'Humas')

                <a href="#">
                    Publikasi
                </a>

                <a href="#">
                    Informasi
                </a>

                <a href="#">
                    Media
                </a>

                <a href="#">
                    Laporan
                </a>

            @endif


            {{-- SPONSORSHIP --}}
            @if($user->divisi?->nama_divisi === 'Sponsorship')

                <a href="#">
                    Sponsor
                </a>

                <a href="#">
                    Proposal
                </a>

                <a href="#">
                    Pengajuan
                </a>

                <a href="#">
                    Kerja Sama
                </a>

                <a href="#">
                    Laporan
                </a>

            @endif


            {{-- DOKUMENTASI --}}
            @if($user->divisi?->nama_divisi === 'Dokumentasi')

                <a href="#">
                    Dokumentasi
                </a>

                <a href="#">
                    Foto
                </a>

                <a href="#">
                    Video
                </a>

                <a href="#">
                    Upload
                </a>

                <a href="#">
                    Laporan
                </a>

            @endif

        </div>


        {{-- LOGOUT --}}
        <div class="logout">

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button type="submit">
                    Logout
                </button>

            </form>

        </div>

    </aside>


    <main class="content">

        <div class="header">

            <h1>
                Dashboard {{ $user->divisi?->nama_divisi }}
            </h1>

            <p>
                Selamat datang,
                <strong>{{ $user->name }}</strong>.
                Kelola kegiatan event dari halaman ini.
            </p>

        </div>


        <div class="cards">

            <div class="card">

                <h3>Total Event</h3>

                <div class="number">
                    0
                </div>

                <p>
                    Event yang dikelola
                </p>

            </div>


            <div class="card">

                <h3>Event Aktif</h3>

                <div class="number">
                    0
                </div>

                <p>
                    Event yang sedang berjalan
                </p>

            </div>


            <div class="card">

                <h3>Kegiatan</h3>

                <div class="number">
                    0
                </div>

                <p>
                    Data kegiatan event
                </p>

            </div>

        </div>

    </main>

</div>

</body>
</html>
