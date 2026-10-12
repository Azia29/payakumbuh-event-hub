<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login EO - Payakumbuh Event Hub</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: #f1f5f9; color: #1e293b; display: flex; align-items: center; justify-content: center; padding: 24px; }
        .shell { width: 100%; max-width: 940px; display: grid; grid-template-columns: 1fr 1fr; background: #fff; border-radius: 24px; overflow: hidden; box-shadow: 0 25px 60px rgba(15,23,42,.14); }
        .brand { background: linear-gradient(145deg, #166534, #15803d 55%, #22c55e); color: #fff; padding: 48px 40px; display: flex; flex-direction: column; justify-content: space-between; gap: 32px; }
        .logo { display: inline-flex; align-items: center; justify-content: center; width: 52px; height: 52px; border-radius: 15px; background: rgba(255,255,255,.18); font-weight: 800; font-size: 18px; letter-spacing: .5px; }
        .brand h1 { margin: 22px 0 10px; font-size: 30px; line-height: 1.2; }
        .brand p { margin: 0; font-size: 14px; line-height: 1.7; opacity: .9; }
        .points { list-style: none; margin: 0; padding: 0; display: grid; gap: 13px; }
        .points li { display: flex; gap: 11px; align-items: flex-start; font-size: 13px; line-height: 1.5; }
        .points span { flex: 0 0 22px; height: 22px; border-radius: 50%; background: rgba(255,255,255,.2); display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; }
        .panel { padding: 48px 44px; display: flex; flex-direction: column; justify-content: center; }
        .mobile-brand { display: none; margin-bottom: 20px; font-weight: 800; color: #15803d; font-size: 18px; }
        .panel h2 { margin: 0; font-size: 26px; color: #172033; }
        .panel .sub { margin: 8px 0 26px; color: #64748b; font-size: 14px; }
        .alert { margin-bottom: 18px; padding: 12px 14px; border-radius: 11px; border: 1px solid #fecaca; background: #fef2f2; color: #b91c1c; font-size: 13px; font-weight: 600; }
        .alert ul { margin: 0; padding-left: 18px; }
        .field { margin-bottom: 18px; }
        .field label { display: block; margin-bottom: 7px; font-size: 13px; font-weight: 700; color: #172033; }
        .input { position: relative; }
        .input input { width: 100%; height: 48px; padding: 0 16px; border: 1px solid #e2e8f0; border-radius: 12px; background: #f8fafc; font-size: 14px; color: #334155; outline: none; transition: .2s; }
        .input input:focus { background: #fff; border-color: #22c55e; box-shadow: 0 0 0 4px rgba(34,197,94,.12); }
        .input input.with-btn { padding-right: 76px; }
        .toggle { position: absolute; right: 8px; top: 8px; height: 32px; padding: 0 12px; border: 0; border-radius: 8px; background: #e2e8f0; color: #475569; font-size: 12px; font-weight: 700; cursor: pointer; }
        .toggle:hover { background: #cbd5e1; }
        .btn { width: 100%; height: 50px; margin-top: 6px; border: 0; border-radius: 12px; background: #15803d; color: #fff; font-size: 15px; font-weight: 800; cursor: pointer; box-shadow: 0 8px 18px rgba(21,128,61,.25); transition: .2s; }
        .btn:hover { background: #166534; transform: translateY(-1px); }
        .back { display: block; margin-top: 22px; text-align: center; font-size: 13px; font-weight: 700; color: #15803d; text-decoration: none; }
        .back:hover { text-decoration: underline; }
        @media (max-width: 860px) {
            .shell { grid-template-columns: 1fr; max-width: 460px; }
            .brand { display: none; }
            .panel { padding: 36px 26px; }
            .mobile-brand { display: block; }
        }
    </style>
</head>
<body>

<div class="shell">

    <div class="brand">
        <div>
            <div class="logo">EH</div>
            <h1>Payakumbuh<br>Event Hub</h1>
            <p>Sistem pengelolaan event untuk Event Organizer Kota Payakumbuh.</p>
        </div>

        <ul class="points">
            <li><span>1</span> Kelola event, rundown, dan jadwal kegiatan</li>
            <li><span>2</span> Bagikan tugas dan pantau kerja panitia</li>
            <li><span>3</span> Sponsorship dan dokumentasi dalam satu tempat</li>
        </ul>
    </div>

    <div class="panel">

        <div class="mobile-brand">Payakumbuh Event Hub</div>

        <h2>Selamat Datang</h2>
        <p class="sub">Masuk ke akun Event Organizer Anda.</p>

        @if($errors->any())
            <div class="alert">
                <ul>
                    @foreach($errors->all() as $pesan)
                        <li>{{ $pesan }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="field">
                <label for="login-email">Email</label>
                <div class="input">
                    <input type="text" id="login-email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" autocomplete="username" required autofocus>
                </div>
            </div>

            <div class="field">
                <label for="login-password">Password</label>
                <div class="input">
                    <input type="password" id="login-password" name="password" class="with-btn" placeholder="Masukkan password" autocomplete="current-password" required>
                    <button type="button" class="toggle" id="togglePassword">Lihat</button>
                </div>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <a href="{{ route('home') }}" class="back">&larr; Kembali ke Beranda</a>

    </div>

</div>

<script>
    (function () {
        var input = document.getElementById('login-password');
        var tombol = document.getElementById('togglePassword');
        if (!input || !tombol) return;
        tombol.addEventListener('click', function () {
            var tampil = input.type === 'password';
            input.type = tampil ? 'text' : 'password';
            tombol.textContent = tampil ? 'Sembunyi' : 'Lihat';
        });
    })();
</script>

</body>
</html>