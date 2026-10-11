<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QR Panitia - {{ $panitia->nama }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #eef7f2;
            color: #1f2937;
        }

        .page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            width: 760px;
            max-width: 100%;
            background: #ffffff;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .12);
        }

        /* HEADER */

        .header {
            padding: 25px 35px;
            background: #ecfdf5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: 800;
            color: #047857;
        }

        .brand-subtitle {
            margin-top: 4px;
            font-size: 12px;
            color: #64748b;
        }

        .event-badge {
            background: #047857;
            color: white;
            padding: 11px 18px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            max-width: 230px;
            text-align: center;
        }

        /* CONTENT */

        .content {
            padding: 40px;
            text-align: center;
        }

        .title {
            margin: 0;
            font-size: 38px;
            font-weight: 800;
            color: #111827;
        }

        .subtitle {
            margin: 10px auto 30px;
            color: #64748b;
            font-size: 15px;
        }

        /* PROFIL */

        .profile-card {
            display: flex;
            align-items: center;
            gap: 25px;
            text-align: left;
            padding: 25px;
            margin-bottom: 35px;

            background: linear-gradient(
                135deg,
                #f0fdf4,
                #ecfdf5
            );

            border: 1px solid #d1fae5;
            border-radius: 22px;
        }

        .profile-photo {
            width: 110px;
            height: 110px;
            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #047857;
            color: white;

            font-size: 34px;
            font-weight: 800;

            box-shadow: 0 8px 20px rgba(4, 120, 87, .25);
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            margin: 0 0 14px;

            font-size: 25px;
            font-weight: 800;
            color: #064e3b;
        }

        .profile-row {
            display: flex;
            margin-top: 8px;
            font-size: 14px;
        }

        .profile-label {
            width: 75px;
            color: #64748b;
        }

        .profile-value {
            font-weight: 700;
            color: #1f2937;
        }

        /* QR */

        .qr-section {
            text-align: center;
        }

        .qr-wrapper {
            display: inline-flex;
            padding: 20px;

            background: white;

            border: 2px solid #d1fae5;
            border-radius: 24px;

            box-shadow:
                0 10px 30px rgba(5, 150, 105, .10);
        }

        .qr-wrapper img {
            width: 280px;
            height: 280px;
            display: block;
        }

        .qr-title {
            margin-top: 22px;

            font-size: 16px;
            font-weight: 800;

            color: #064e3b;
        }

        .instruction {
            margin-top: 7px;

            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
        }

        /* BUTTON */

        .print-button {
            margin-top: 30px;

            border: none;

            background: #047857;
            color: white;

            padding: 13px 26px;

            border-radius: 12px;

            font-size: 14px;
            font-weight: 700;

            cursor: pointer;
        }

        .print-button:hover {
            background: #065f46;
        }

        /* FOOTER */

        .footer {
            padding: 22px 35px;

            background: #064e3b;

            color: white;

            text-align: center;

            font-size: 12px;
        }

        .footer strong {
            display: block;

            margin-bottom: 5px;

            font-size: 16px;
        }

        /* MOBILE */

        @media (max-width: 650px) {

            .header {
                flex-direction: column;
                text-align: center;
            }

            .content {
                padding: 28px 20px;
            }

            .profile-card {
                flex-direction: column;
                text-align: center;
            }

            .profile-row {
                justify-content: center;
            }

            .title {
                font-size: 30px;
            }

            .qr-wrapper img {
                width: 240px;
                height: 240px;
            }
        }

        /* PRINT */

        @media print {

            @page {
                size: A4 portrait;
                margin: 10mm;
            }

            body {
                background: white;
            }

            .page {
                min-height: auto;
                padding: 0;
            }

            .card {
                width: 100%;
                max-width: none;

                border-radius: 0;

                box-shadow: none;
            }

            .print-button {
                display: none;
            }

            .header,
            .profile-card,
            .footer {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="card">

        {{-- HEADER --}}
        <div class="header">

            <div>
                <div class="brand">
                    Payakumbuh Event Hub
                </div>

                <div class="brand-subtitle">
                    Sistem Manajemen Event & Panitia
                </div>
            </div>

            <div class="event-badge">
                {{ $panitia->event->nama_event ?? 'Event' }}
            </div>

        </div>


        {{-- CONTENT --}}
        <div class="content">

            <h1 class="title">
                QR Panitia
            </h1>

            <div class="subtitle">
                Scan QR untuk mengakses informasi tugas panitia
            </div>


            {{-- PROFIL PANITIA --}}
            <div class="profile-card">

                <div class="profile-photo">
                    {{ strtoupper(substr($panitia->nama, 0, 1)) }}
                </div>

                <div class="profile-info">

                    <h2 class="profile-name">
                        {{ $panitia->nama }}
                    </h2>

                    <div class="profile-row">

                        <div class="profile-label">
                            Divisi
                        </div>

                        <div class="profile-value">
                            {{ $panitia->divisi }}
                        </div>

                    </div>

                    <div class="profile-row">

                        <div class="profile-label">
                            Event
                        </div>

                        <div class="profile-value">
                            {{ $panitia->event->nama_event ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- QR --}}
            <div class="qr-section">

                <div class="qr-wrapper">

                    <img
                        src="https://api.qrserver.com/v1/create-qr-code/?size=400x400&data={{ urlencode(route('panitia.qr', $panitia->qr_token)) }}"
                        alt="QR Panitia"
                    >

                </div>

                <div class="qr-title">
                    QR Code Panitia
                </div>

                <div class="instruction">
                    Arahkan kamera HP ke QR Code untuk mengakses<br>
                    halaman tugas panitia.
                </div>

            </div>


            {{-- PRINT --}}
            <button
                type="button"
                class="print-button"
                onclick="window.print()">

                🖨 Cetak QR

            </button>

        </div>


        {{-- FOOTER --}}
        <div class="footer">

            <strong>
                Payakumbuh Event Hub
            </strong>

            Event • UMKM • Kolaborasi

        </div>

    </div>

</div>

</body>
</html>