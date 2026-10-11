<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Sponsor - Payakumbuh Event Hub</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #f3f6f4; color: #1f2937; }
        header { background: #166534; color: white; padding: 20px 5%; display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; }
        header h1 { margin: 0; font-size: 21px; }
        header form { margin: 0; }
        button { border: 0; border-radius: 8px; padding: 10px 14px; cursor: pointer; font-weight: 600; }
        header button { background: white; color: #166534; }
        main { max-width: 1100px; margin: 28px auto; padding: 0 20px; }
        .welcome, .panel { background: white; border-radius: 14px; padding: 24px; margin-bottom: 20px; box-shadow: 0 4px 16px #0f172a0a; }
        .welcome h2 { margin-top: 0; }
        .muted { color: #64748b; }
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 620px; }
        th, td { padding: 14px 12px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { color: #475569; background: #f8fafc; }
        .status { display: inline-block; padding: 6px 10px; border-radius: 20px; background: #dcfce7; color: #166534; font-size: 12px; }
        .empty { padding: 28px; text-align: center; color: #64748b; }
        @media (max-width: 600px) { header { padding: 18px; } main { margin-top: 18px; padding: 0 12px; } .welcome, .panel { padding: 17px; } }
    </style>
</head>
<body>
<header>
    <h1>Payakumbuh Event Hub · Sponsor</h1>
    <form method="POST" action="{{ route('sponsor.logout') }}">
        @csrf
        <button type="submit">Keluar</button>
    </form>
</header>

<main>
    <section class="welcome">
        <p class="muted">DASHBOARD SPONSOR</p>
        <h2>Selamat datang, {{ $sponsor->nama_perusahaan }}</h2>
        <p class="muted">Pantau pengajuan sponsorship dan status kerja sama perusahaan Anda di sini.</p>
    </section>

    @if (session('success'))
        <div class="panel">{{ session('success') }}</div>
    @endif

    <section class="panel">
        <h2>Pengajuan Sponsorship Saya</h2>
        <p class="muted">Daftar berikut hanya berisi pengajuan yang terkait dengan akun Sponsor Anda.</p>

        @if ($pengajuans->isEmpty())
            <div class="empty">
                <h3>Belum ada pengajuan</h3>
                <p>Pengajuan sponsorship Anda akan tampil di halaman ini setelah dibuat.</p>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Event</th>
                            <th>Paket Sponsorship</th>
                            <th>Nominal Pengajuan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $pengajuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajuan->paket?->event?->nama_event ?? 'Event tidak tersedia' }}</td>
                                <td>{{ $pengajuan->paket?->nama_paket ?? 'Paket sponsorship' }}</td>
                                <td>Rp {{ number_format((float) $pengajuan->nominal_pengajuan, 0, ',', '.') }}</td>
                                <td><span class="status">{{ ucfirst($pengajuan->status) }}</span></td>
                                <td>{{ $pengajuan->created_at?->format('d-m-Y') ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
</main>
</body>
</html>