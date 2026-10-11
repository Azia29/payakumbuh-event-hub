<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sponsor - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #1f2937;
        }

        .login-wrapper {
            width: 100%;
            max-width: 430px;
        }

        .brand {
            text-align: center;
            margin-bottom: 22px;
        }

        .brand-logo {
            width: 58px;
            height: 58px;
            margin: 0 auto 12px;
            border-radius: 16px;
            background: #10b981;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
        }

        .brand h1 {
            margin: 0;
            font-size: 24px;
        }

        .brand p {
            margin: 7px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .08);
            border: 1px solid #e5e7eb;
        }

        .card h2 {
            margin: 0 0 7px;
            font-size: 21px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .alert {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .field input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            outline: none;
        }

        .field input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .12);
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 13px;
            background: #10b981;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover {
            background: #059669;
        }

        .info {
            margin-top: 20px;
            padding: 13px;
            background: #f8fafc;
            border-radius: 10px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 13px;
        }

        .back:hover {
            color: #10b981;
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="brand">
        <div class="brand-logo">PH</div>
        <h1>Payakumbuh Event Hub</h1>
        <p>Portal Sponsor</p>
    </div>

    <div class="card">

        <h2>Masuk sebagai Sponsor</h2>

        <div class="subtitle">
            Kelola pengajuan sponsorship dan pantau proses kerja sama event.
        </div>

        @if ($errors->any())
            <div class="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('sponsor.login.process') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email sponsor"
                    required
                    autofocus
                >
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn">
                Masuk ke Portal Sponsor
            </button>
        </form>

        <div class="info">
            Akun Sponsor digunakan untuk mengajukan paket sponsorship,
            melihat status pengajuan, mengikuti proses negosiasi,
            dan memantau dukungan yang telah disepakati.
        </div>

    </div>

    <a href="{{ route('home') }}" class="back">
        ← Kembali ke halaman utama
    </a>

</div>

</body>
</html>