<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event - Payakumbuh Event Hub</title>

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

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #bbf7d0;
        }

        .btn-login {
            background: white;
            color: #166534 !important;
            padding: 9px 16px;
            border-radius: 7px;
            font-weight: bold;
        }

        /* HERO */
        .hero {
            background: linear-gradient(
                135deg,
                #166534,
                #15803d
            );
            color: white;
            padding: 55px 6%;
        }

        .hero-content {
            max-width: 900px;
            margin: auto;
            text-align: center;
        }

        .hero h1 {
            font-size: 38px;
            margin: 0 0 15px;
        }

        .hero p {
            margin: 0;
            line-height: 1.7;
            opacity: .9;
        }

        /* CONTENT */
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .section-title {
            margin-bottom: 25px;
        }

        .section-title h2 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        .section-title p {
            margin: 0;
            color: #6b7280;
        }

        /* EVENT GRID */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .event-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0,0,0,.07);
            border: 1px solid #e5e7eb;
            transition: .2s;
        }

        .event-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 18px rgba(0,0,0,.10);
        }

        .event-header {
            background: #dcfce7;
            padding: 22px;
            min-height: 100px;
        }

        .event-header h3 {
            margin: 0;
            color: #166534;
            font-size: 19px;
        }

        .event-body {
            padding: 20px;
        }

        .event-info {
            margin-bottom: 10px;
            color: #4b5563;
            font-size: 14px;
        }

        .event-info strong {
            color: #1f2937;
        }

        .description {
            color: #6b7280;
            line-height: 1.6;
            font-size: 14px;
            margin: 15px 0;
        }

        .btn-detail {
            display: inline-block;
            width: 100%;
            text-align: center;
            background: #166534;
            color: white;
            text-decoration: none;
            padding: 11px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-detail:hover {
            background: #15803d;
        }

        /* EMPTY */
        .empty {
            background: white;
            padding: 50px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .empty h3 {
            margin-top: 0;
        }

        .empty p {
            color: #6b7280;
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

        @media (max-width: 900px) {
            .event-grid {
                grid-template-columns: repeat(2, 1fr);
            }
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

            .hero h1 {
                font-size: 29px;
            }

            .event-grid {
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

        <a href="{{ route('event.public') }}" class="active">
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


{{-- HERO --}}
<section class="hero">

    <div class="hero-content">

        <h1>Event Payakumbuh</h1>

        <p>
            Temukan berbagai kegiatan dan event yang
            diselenggarakan oleh Event Organizer di Kota Payakumbuh.
        </p>

    </div>

</section>


{{-- EVENT --}}
<main class="container">

    <div class="section-title">

        <h2>Event Terbaru</h2>

        <p>
            Daftar event yang telah disetujui dan dapat diikuti masyarakat.
        </p>

    </div>


    @if($events->count() > 0)

        <div class="event-grid">

            @foreach($events as $event)

                <div class="event-card">

                    <div class="event-header">

                        <h3>
                            {{ $event->nama_event }}
                        </h3>

                    </div>


                    <div class="event-body">

                        <div class="event-info">

                            <strong>Tanggal:</strong><br>

                            {{ \Carbon\Carbon::parse($event->tgl_mulai)->translatedFormat('d F Y, H:i') }}

                        </div>


                        <div class="event-info">

                            <strong>Lokasi:</strong><br>

                            {{ $event->lokasi_event }}

                        </div>


                        <div class="description">

                            {{ \Illuminate\Support\Str::limit(
                                $event->deskripsi_event ?? 'Tidak ada deskripsi event.',
                                120
                            ) }}

                        </div>


                        <a
                            href="{{ route('event.public.show', $event) }}"
                            class="btn-detail">

                            Lihat Detail

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">

            <h3>Belum Ada Event</h3>

            <p>
                Saat ini belum ada event yang tersedia untuk masyarakat.
            </p>

        </div>

    @endif

</main>


{{-- FOOTER --}}
<footer>

    Ã‚Â© {{ date('Y') }} Payakumbuh Event Hub.
    Semua hak dilindungi.

</footer>

</body>
</html>