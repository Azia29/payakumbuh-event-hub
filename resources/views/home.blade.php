<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payakumbuh Event Hub</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            max-width: 1200px;
            margin: auto;
            padding: 18px 24px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #16a34a;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 28px;
        }

        .nav-menu a {
            color: #374151;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-menu a:hover {
            color: #16a34a;
        }

        .login-btn {
            background: #16a34a;
            color: white !important;
            padding: 10px 18px;
            border-radius: 8px;
        }

        .login-btn:hover {
            background: #15803d;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            max-width: 1200px;
            margin: auto;
            padding: 90px 24px;

            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 50px;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero-content h1 span {
            color: #16a34a;
        }

        .hero-content p {
            color: #64748b;
            font-size: 18px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-block;
            background: #16a34a;
            color: white;
            padding: 13px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #15803d;
        }

        .btn-secondary {
            display: inline-block;
            background: white;
            color: #16a34a;
            border: 1px solid #16a34a;
            padding: 12px 22px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: #f0fdf4;
        }

        /* =========================
           HERO CARD
        ========================== */

        .hero-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .hero-card h3 {
            margin-bottom: 20px;
            font-size: 21px;
        }

        .event-preview {
            padding: 16px;
            background: #f8fafc;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .event-preview:last-child {
            margin-bottom: 0;
        }

        .event-preview strong {
            display: block;
            margin-bottom: 6px;
        }

        .event-preview small {
            color: #64748b;
        }

        /* =========================
           SECTION
        ========================== */

        .section {
            background: white;
            padding: 70px 24px;
        }

        .section-inner {
            max-width: 1200px;
            margin: auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;
        }

        /* =========================
           FEATURES
        ========================== */

        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 25px;
            background: #ffffff;
        }

        .feature-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;

            background: #dcfce7;
            color: #16a34a;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
            font-weight: bold;

            margin-bottom: 18px;
        }

        .feature h3 {
            margin-bottom: 10px;
        }

        .feature p {
            color: #64748b;
            line-height: 1.6;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            background: #111827;
            color: white;
            padding: 30px 24px;
            text-align: center;
        }

        footer p {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 800px) {

            .hero {
                grid-template-columns: 1fr;
                padding: 60px 24px;
            }

            .hero-content h1 {
                font-size: 36px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .nav-menu {
                gap: 12px;
            }

            .nav-menu a:not(.login-btn) {
                display: none;
            }

        }

    </style>

</head>


<body>


<header>

    <nav class="navbar">

        {{-- LOGO --}}

        <a
            href="{{ route('home') }}"
            class="logo"
        >
            Payakumbuh Event Hub
        </a>


        {{-- NAVIGATION --}}

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

            <a
                href="{{ route('login') }}"
                class="login-btn"
            >
                Login EO
            </a>

        </div>

    </nav>

</header>


<main>


    {{-- =========================
         HERO
    ========================== --}}

    <section class="hero">


        <div class="hero-content">

            <h1>

                Temukan dan Kelola

                <span>
                    Event Payakumbuh
                </span>

            </h1>


            <p>

                Payakumbuh Event Hub merupakan pusat informasi dan
                pengelolaan kegiatan yang membantu masyarakat menemukan
                berbagai event serta membantu EO mengelola kegiatan
                secara terintegrasi.

            </p>


            <div class="hero-buttons">

                {{-- TOMBOL EVENT --}}

                <a
                    href="{{ route('event.public') }}"
                    class="btn-primary"
                >
                    Lihat Event
                </a>


                {{-- TOMBOL LOGIN EO --}}

                <a
                    href="{{ route('login') }}"
                    class="btn-secondary"
                >
                    Login EO
                </a>

            </div>

        </div>


        {{-- =========================
             EVENT PREVIEW
        ========================== --}}

        <div class="hero-card">

            <h3>
                Event Terbaru
            </h3>


            <div class="event-preview">

                <strong>
                    Festival Payakumbuh
                </strong>

                <small>
                    Informasi kegiatan masyarakat Payakumbuh
                </small>

            </div>


            <div class="event-preview">

                <strong>
                    Pekan Kreativitas Kota
                </strong>

                <small>
                    Kegiatan komunitas dan kreativitas lokal
                </small>

            </div>


            <div class="event-preview">

                <strong>
                    Agenda Kota
                </strong>

                <small>
                    Temukan berbagai kegiatan yang akan datang
                </small>

            </div>

        </div>

    </section>


    {{-- =========================
         FITUR
    ========================== --}}

    <section class="section">

        <div class="section-inner">


            <div class="section-title">

                <h2>
                    Satu Platform untuk Event
                </h2>

                <p>
                    Informasi event dan pengelolaan kegiatan
                    dalam satu sistem.
                </p>

            </div>


            <div class="features">


                {{-- INFORMASI EVENT --}}

                <div class="feature">

                    <div class="feature-icon">
                        E
                    </div>

                    <h3>
                        Informasi Event
                    </h3>

                    <p>
                        Masyarakat dapat melihat informasi event
                        yang telah disetujui dan dipublikasikan.
                    </p>

                </div>


                {{-- PENGELOLAAN EO --}}

                <div class="feature">

                    <div class="feature-icon">
                        O
                    </div>

                    <h3>
                        Pengelolaan EO
                    </h3>

                    <p>
                        EO dapat mengelola event, panitia,
                        monitoring, dan laporan kegiatan.
                    </p>

                </div>


                {{-- ADMIN --}}

                <div class="feature">

                    <div class="feature-icon">
                        A
                    </div>

                    <h3>
                        Admin Terintegrasi
                    </h3>

                    <p>
                        Admin dapat melakukan verifikasi event
                        melalui aplikasi Android.
                    </p>

                </div>

            </div>

        </div>

    </section>

</main>


{{-- =========================
     FOOTER
========================== --}}

<footer>

    <p>
        Â© {{ date('Y') }} Payakumbuh Event Hub.
        Sistem Informasi Event Kota Payakumbuh.
    </p>

</footer>


</body>

</html>

