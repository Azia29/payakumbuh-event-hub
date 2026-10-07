<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $event->nama_event }} - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            background: #166534;
            color: white;
            padding: 16px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-menu a:hover {
            color: #bbf7d0;
        }

        .btn-login {
            background: white;
            color: #166534 !important;
            padding: 9px 16px;
            border-radius: 7px;
            font-weight: bold;
        }

        /* CONTENT */
        .container {
            max-width: 1000px;
            margin: auto;
            padding: 45px 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #166534;
            text-decoration: none;
            font-weight: bold;
        }

        .back:hover {
            text-decoration: underline;
        }

        .event-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 20px rgba(0,0,0,.07);
        }

        .event-title {
            background: #166534;
            color: white;
            padding: 35px;
        }

        .event-title h1 {
            margin: 0 0 10px;
            font-size: 32px;
        }

        .status {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .event-content {
            padding: 35px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 18px;
        }

        .info-box .label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 7px;
        }

        .info-box .value {
            font-weight: bold;
            color: #1f2937;
            line-height: 1.5;
        }

        .section {
            margin-top: 30px;
        }

        .section h2 {
            color: #166534;
            margin-bottom: 12px;
        }

        .description {
            color: #4b5563;
            line-height: 1.8;
            white-space: pre-line;
        }

        .action {
            margin-top: 35px;
        }

        .btn-kembali {
            display: inline-block;
            background: #166534;
            color: white;
            text-decoration: none;
            padding: 11px 20px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-kembali:hover {
            background: #15803d;
        }

        /* FOOTER */
        footer {
            margin-top: 50px;
            background: #14532d;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        @media (max-width: 650px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .event-title {
                padding: 25px;
            }

            .event-title h1 {
                font-size: 25px;
            }

            .event-content {
                padding: 22px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar">

    <div class="logo">
        Payakumbuh Event Hub
    </div>

    <div class="nav-menu">

        <a href="{{ route('home') }}">
            Beranda
        </a>

        <a href="{{ route('event.public') }}">
            Event
        </a>

        <a href="{{ route('tentang') }}">
            Tentang
        </a>

        <a href="{{ route('kontak') }}">
            Kontak
        </a>

        <a href="{{ route('login') }}" class="btn-login">
            Login EO
        </a>

    </div>

</nav>


{{-- CONTENT --}}
<main class="container">

    <a
        href="{{ route('event.public') }}"
        class="back">

        â† Kembali ke Daftar Event

    </a>


    <div class="event-card">

        {{-- TITLE --}}
        <div class="event-title">

            <h1>
                {{ $event->nama_event }}
            </h1>

            <span class="status">
                Event Disetujui
            </span>

        </div>


        {{-- CONTENT --}}
        <div class="event-content">

            {{-- INFO --}}
            <div class="info-grid">

                <div class="info-box">

                    <div class="label">
                        Tanggal Mulai
                    </div>

                    <div class="value">

                        {{ \Carbon\Carbon::parse($event->tgl_mulai)->translatedFormat('d F Y, H:i') }}
                        WIB

                    </div>

                </div>


                <div class="info-box">

                    <div class="label">
                        Tanggal Selesai
                    </div>

                    <div class="value">

                        {{ \Carbon\Carbon::parse($event->tgl_selesai)->translatedFormat('d F Y, H:i') }}
                        WIB

                    </div>

                </div>


                <div class="info-box">

                    <div class="label">
                        Lokasi
                    </div>

                    <div class="value">
                        {{ $event->lokasi_event }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="label">
                        Penyelenggara
                    </div>

                    <div class="value">

                        {{ $event->user?->name ?? 'Event Organizer' }}

                    </div>

                </div>

            </div>


            {{-- DESKRIPSI --}}
            <div class="section">

                <h2>
                    Tentang Event
                </h2>

                <div class="description">

                    {{ $event->deskripsi_event ?? 'Tidak ada deskripsi event.' }}

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="action">

                <a
                    href="{{ route('event.public') }}"
                    class="btn-kembali">

                    â† Kembali ke Event

                </a>

            </div>

        </div>

    </div>

</main>


{{-- FOOTER --}}
<footer>

    Â© {{ date('Y') }} Payakumbuh Event Hub.
    Semua hak dilindungi.

</footer>

</body>
</html>