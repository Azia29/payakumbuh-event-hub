<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - Payakumbuh Event Hub</title>

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

        /* =========================
           NAVBAR
        ========================== */

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

        /* =========================
           HERO
        ========================== */

        .hero {
            background: linear-gradient(
                135deg,
                #166534,
                #15803d
            );

            color: white;
            padding: 55px 20px;
            text-align: center;
        }

        .hero h1 {
            margin: 0 0 12px;
            font-size: 36px;
        }

        .hero p {
            margin: 0 auto;
            max-width: 700px;
            line-height: 1.7;
            opacity: .9;
        }

        /* =========================
           CONTENT
        ========================== */

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 45px 20px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 3px 12px rgba(0,0,0,.06);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #166534;
        }

        .card-description {
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        /* =========================
           CONTACT ITEM
        ========================== */

        .contact-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #dcfce7;
            color: #166534;

            border-radius: 9px;
            font-weight: bold;
        }

        .contact-item h3 {
            margin: 0 0 5px;
            font-size: 15px;
        }

        .contact-item p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
        }

        /* =========================
           FORM
        ========================== */

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 11px 13px;

            border: 1px solid #d1d5db;
            border-radius: 8px;

            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #166534;
        }

        .btn-kirim {
            width: 100%;
            border: none;
            background: #166534;
            color: white;

            padding: 12px;
            border-radius: 8px;

            font-weight: bold;
            cursor: pointer;
        }

        .btn-kirim:hover {
            background: #15803d;
        }

        /* =========================
           INFO
        ========================== */

        .info-box {
            margin-top: 25px;
            padding: 18px;

            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
        }

        .info-box strong {
            color: #166534;
        }

        .info-box p {
            margin: 7px 0 0;
            color: #4b5563;
            line-height: 1.6;
            font-size: 14px;
        }

        /* =========================
           FOOTER
        ========================== */

        footer {
            margin-top: 30px;
            background: #14532d;
            color: white;
            text-align: center;
            padding: 25px;
            font-size: 14px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 750px) {

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

            .contact-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


{{-- =========================
     NAVBAR
========================== --}}

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

        <a href="{{ route('kontak') }}" class="active">
            Kontak
        </a>

        <a href="{{ route('login') }}" class="btn-login">
            Login EO
        </a>

    </div>

</nav>


{{-- =========================
     HERO
========================== --}}

<section class="hero">

    <h1>
        Hubungi Kami
    </h1>

    <p>
        Punya pertanyaan atau membutuhkan informasi
        mengenai event di Payakumbuh? Silakan hubungi
        kami melalui informasi kontak yang tersedia.
    </p>

</section>


{{-- =========================
     CONTENT
========================== --}}

<main class="container">

    <div class="contact-grid">


        {{-- INFORMASI KONTAK --}}

        <div class="card">

            <h2>
                Informasi Kontak
            </h2>

            <p class="card-description">
                Gunakan informasi berikut untuk menghubungi
                pengelola Payakumbuh Event Hub.
            </p>


            {{-- ALAMAT --}}

            <div class="contact-item">

                <div class="contact-icon">
                    A
                </div>

                <div>

                    <h3>
                        Alamat
                    </h3>

                    <p>
                        Kota Payakumbuh,<br>
                        Sumatera Barat, Indonesia
                    </p>

                </div>

            </div>


            {{-- EMAIL --}}

            <div class="contact-item">

                <div class="contact-icon">
                    @
                </div>

                <div>

                    <h3>
                        Email
                    </h3>

                    <p>
                        info@payakumbuheventhub.com
                    </p>

                </div>

            </div>


            {{-- TELEPON --}}

            <div class="contact-item">

                <div class="contact-icon">
                    T
                </div>

                <div>

                    <h3>
                        Telepon
                    </h3>

                    <p>
                        +62 800 0000 0000
                    </p>

                </div>

            </div>


            {{-- JAM LAYANAN --}}

            <div class="contact-item">

                <div class="contact-icon">
                    J
                </div>

                <div>

                    <h3>
                        Jam Layanan
                    </h3>

                    <p>
                        Senin - Jumat<br>
                        08.00 - 16.00 WIB
                    </p>

                </div>

            </div>


            <div class="info-box">

                <strong>
                    Informasi
                </strong>

                <p>
                    Untuk informasi event tertentu,
                    masyarakat dapat melihat detail event
                    langsung melalui halaman Event.
                </p>

            </div>

        </div>


        {{-- FORM KONTAK --}}

        <div class="card">

            <h2>
                Kirim Pesan
            </h2>

            <p class="card-description">
                Sampaikan pertanyaan atau pesan Anda
                kepada pengelola Payakumbuh Event Hub.
            </p>


            <form
                action="#"
                method="POST">

                @csrf


                <div class="form-group">

                    <label for="nama">
                        Nama
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama Anda"
                        required>

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email Anda"
                        required>

                </div>


                <div class="form-group">

                    <label for="subjek">
                        Subjek
                    </label>

                    <input
                        type="text"
                        id="subjek"
                        name="subjek"
                        placeholder="Subjek pesan"
                        required>

                </div>


                <div class="form-group">

                    <label for="pesan">
                        Pesan
                    </label>

                    <textarea
                        id="pesan"
                        name="pesan"
                        placeholder="Tuliskan pesan Anda..."
                        required></textarea>

                </div>


                <button
                    type="submit"
                    class="btn-kirim">

                    Kirim Pesan

                </button>

            </form>

        </div>

    </div>

</main>


{{-- =========================
     FOOTER
========================== --}}

<footer>

    Â© {{ date('Y') }} Payakumbuh Event Hub.
    Semua hak dilindungi.

</footer>


</body>

</html>
