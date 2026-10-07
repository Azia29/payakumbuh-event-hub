<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang - Payakumbuh Event Hub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f8fafc;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            height: 72px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #166534;
            font-size: 20px;
            font-weight: bold;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: #16a34a;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu a {
            text-decoration: none;
            color: #475569;
            font-size: 15px;
            transition: 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
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

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #166534, #16a34a);
            color: white;
            padding: 75px 7%;
            text-align: center;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .hero p {
            max-width: 700px;
            margin: auto;
            line-height: 1.7;
            color: #dcfce7;
            font-size: 17px;
        }

        /* CONTENT */
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 65px 20px;
        }

        .section {
            margin-bottom: 55px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            font-size: 30px;
            color: #166534;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.05);
        }

        .card h3 {
            color: #166534;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .card p {
            color: #64748b;
            line-height: 1.8;
            font-size: 15px;
        }

        /* FITUR */
        .features {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .feature-card {
            background: white;
            padding: 28px 22px;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            text-align: center;
        }

        .feature-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 18px;
            border-radius: 12px;
            background: #dcfce7;
            color: #15803d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }

        .feature-card h3 {
            margin-bottom: 10px;
            color: #1f2937;
        }

        .feature-card p {
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        /* AKTOR */
        .actors {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .actor {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 25px 15px;
            text-align: center;
        }

        .actor h3 {
            color: #166534;
            margin-bottom: 8px;
            font-size: 17px;
        }

        .actor p {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        /* CTA */
        .cta {
            background: #166534;
            color: white;
            border-radius: 16px;
            padding: 45px 30px;
            text-align: center;
        }

        .cta h2 {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .cta p {
            color: #dcfce7;
            margin-bottom: 25px;
        }

        .cta a {
            display: inline-block;
            background: white;
            color: #166534;
            padding: 12px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .cta a:hover {
            background: #f0fdf4;
        }

        /* FOOTER */
        footer {
            background: #111827;
            color: #cbd5e1;
            padding: 35px 7%;
            text-align: center;
        }

        footer h3 {
            color: white;
            margin-bottom: 10px;
        }

        footer p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-bottom {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #374151;
            font-size: 13px;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .nav-menu {
                gap: 15px;
            }

            .about-grid,
            .features {
                grid-template-columns: 1fr 1fr;
            }

            .actors {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 0 20px;
            }

            .nav-menu {
                display: none;
            }

            .hero {
                padding: 55px 20px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .about-grid,
            .features,
            .actors {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 45px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <a href="{{ route('home') }}" class="logo">
            <span class="logo-icon">PE</span>
            <span>Payakumbuh Event Hub</span>
        </a>

        <div class="nav-menu">
            <a href="{{ route('home') }}">Beranda</a>

            <a href="{{ route('event.public') }}">
                Event
            </a>

            <a href="{{ route('tentang') }}" class="active">
                Tentang
            </a>

            <a href="{{ route('kontak') }}">
                Kontak
            </a>

            <a href="{{ route('login') }}" class="login-btn">
                Login EO
            </a>
        </div>

    </nav>


    <!-- HERO -->
    <section class="hero">

        <h1>Tentang Payakumbuh Event Hub</h1>

        <p>
            Platform informasi dan pengelolaan event yang membantu
            menghubungkan penyelenggara kegiatan dengan masyarakat
            melalui sistem informasi event yang terintegrasi.
        </p>

    </section>


    <!-- CONTENT -->
    <main class="container">

        <!-- TENTANG -->
        <section class="section">

            <div class="section-title">
                <h2>Apa Itu Payakumbuh Event Hub?</h2>
                <p>
                    Sistem informasi event untuk mendukung pengelolaan kegiatan.
                </p>
            </div>

            <div class="about-grid">

                <div class="card">

                    <h3>Payakumbuh Event Hub</h3>

                    <p>
                        Payakumbuh Event Hub merupakan platform berbasis web
                        yang dirancang untuk membantu pengelolaan dan penyebaran
                        informasi kegiatan atau event di Kota Payakumbuh.
                    </p>

                    <p style="margin-top: 15px;">
                        Platform ini menyediakan tempat bagi Event Organizer
                        untuk mengelola kegiatan, panitia, monitoring, dan
                        laporan event secara terstruktur.
                    </p>

                </div>

                <div class="card">

                    <h3>Tujuan Sistem</h3>

                    <p>
                        Sistem ini bertujuan untuk membuat proses pengelolaan
                        event menjadi lebih terorganisir, mulai dari pembuatan
                        event, pengelolaan panitia, pemantauan kegiatan hingga
                        penyajian laporan.
                    </p>

                    <p style="margin-top: 15px;">
                        Masyarakat juga dapat melihat informasi event yang telah
                        disetujui sehingga informasi kegiatan dapat diakses
                        dengan lebih mudah.
                    </p>

                </div>

            </div>

        </section>


        <!-- FITUR -->
        <section class="section">

            <div class="section-title">

                <h2>Fitur Utama</h2>

                <p>
                    Beberapa fungsi utama yang tersedia dalam sistem.
                </p>

            </div>

            <div class="features">

                <div class="feature-card">

                    <div class="feature-icon">E</div>

                    <h3>Kelola Event</h3>

                    <p>
                        EO dapat membuat, mengubah, melihat, dan mengelola
                        informasi event.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">P</div>

                    <h3>Kelola Panitia</h3>

                    <p>
                        Pengelolaan data panitia dan pembagian divisi
                        dalam kegiatan.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">M</div>

                    <h3>Monitoring</h3>

                    <p>
                        Membantu memantau status dan perkembangan
                        kegiatan yang diselenggarakan.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">L</div>

                    <h3>Laporan</h3>

                    <p>
                        Menampilkan ringkasan data event dan informasi
                        kegiatan secara terstruktur.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">I</div>

                    <h3>Informasi Event</h3>

                    <p>
                        Masyarakat dapat melihat informasi event yang
                        telah dipublikasikan.
                    </p>

                </div>


                <div class="feature-card">

                    <div class="feature-icon">A</div>

                    <h3>Akses Terintegrasi</h3>

                    <p>
                        Sistem dirancang agar pengelolaan event dapat
                        dilakukan melalui satu platform.
                    </p>

                </div>

            </div>

        </section>


        <!-- AKTOR -->
        <section class="section">

            <div class="section-title">

                <h2>Pengguna Sistem</h2>

                <p>
                    Setiap pengguna memiliki fungsi dan akses yang berbeda.
                </p>

            </div>

            <div class="actors">

                <div class="actor">

                    <h3>EO</h3>

                    <p>
                        Mengelola event dan menjalankan kegiatan
                        sesuai dengan divisi masing-masing.
                    </p>

                </div>


                <div class="actor">

                    <h3>Sponsor</h3>

                    <p>
                        Mendukung kegiatan dan mengelola informasi
                        yang berkaitan dengan sponsorship.
                    </p>

                </div>


                <div class="actor">

                    <h3>Admin</h3>

                    <p>
                        Mengelola dan melakukan pengawasan terhadap
                        data serta proses dalam sistem.
                    </p>

                </div>


                <div class="actor">

                    <h3>Masyarakat</h3>

                    <p>
                        Melihat dan mendapatkan informasi mengenai
                        event yang tersedia secara publik.
                    </p>

                </div>

            </div>

        </section>


        <!-- CTA -->
        <section class="section">

            <div class="cta">

                <h2>Temukan Event di Payakumbuh</h2>

                <p>
                    Lihat berbagai informasi event yang telah dipublikasikan
                    dan dapatkan informasi kegiatan dengan mudah.
                </p>

                <a href="{{ route('event.public') }}">
                    Lihat Event
                </a>

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer>

        <h3>Payakumbuh Event Hub</h3>

        <p>
            Platform informasi dan pengelolaan event di Kota Payakumbuh.
        </p>

        <div class="footer-bottom">
            &copy; {{ date('Y') }} Payakumbuh Event Hub.
            All rights reserved.
        </div>

    </footer>

</body>
</html>