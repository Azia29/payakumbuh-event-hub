<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Saya - Panitia</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #0f172a;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 35px;
        }

        .logo span {
            color: #22c55e;
        }

        .menu-title {
            font-size: 12px;
            color: #94a3b8;
            text-transform: uppercase;
            margin: 20px 10px 10px;
        }

        .menu a {
            display: block;
            padding: 12px 14px;
            margin-bottom: 6px;
            color: #cbd5e1;
            text-decoration: none;
            border-radius: 9px;
        }

        .menu a:hover,
        .menu a.active {
            background: #1e293b;
            color: white;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            background: white;
            border-radius: 14px;
            padding: 20px 24px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .06);
        }

        .topbar h1 {
            margin: 0 0 7px;
            font-size: 25px;
        }

        .topbar p {
            margin: 0;
            color: #64748b;
        }

        .alert {
            padding: 14px 17px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .06);
        }

        .event-name {
            color: #16a34a;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .task-title {
            font-size: 27px;
            margin: 0 0 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .info {
            background: #f8fafc;
            border-radius: 11px;
            padding: 15px;
        }

        .label {
            display: block;
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .value {
            font-weight: 600;
        }

        .description {
            margin-top: 20px;
            line-height: 1.7;
            color: #475569;
        }

        .status-box {
            border-top: 1px solid #e2e8f0;
            margin-top: 24px;
            padding-top: 24px;
        }

        .status-current {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: #e2e8f0;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .status-current.sedang_dikerjakan {
            background: #fef3c7;
            color: #92400e;
        }

        .status-current.selesai {
            background: #dcfce7;
            color: #166534;
        }

        .status-current.belum_dimulai {
            background: #e2e8f0;
            color: #475569;
        }

        textarea {
            width: 100%;
            min-height: 110px;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            resize: vertical;
            font-family: inherit;
            margin-bottom: 15px;
        }

        textarea:focus {
            outline: none;
            border-color: #22c55e;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        button {
            border: 0;
            border-radius: 9px;
            padding: 12px 18px;
            cursor: pointer;
            font-weight: 700;
            color: white;
        }

        .btn-start {
            background: #f59e0b;
        }

        .btn-finish {
            background: #16a34a;
        }

        .finished {
            padding: 15px;
            border-radius: 10px;
            background: #f0fdf4;
            color: #166534;
            font-weight: 600;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 800px) {
            .sidebar {
                display: none;
            }

            .content {
                padding: 18px;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <aside class="sidebar">
        <div class="logo">
            Payakumbuh<span>EventHub</span>
        </div>

        <div class="menu-title">Menu Panitia</div>

        <div class="menu">
            <a href="{{ route('panitia.dashboard') }}">
                Dashboard
            </a>

            <a href="{{ route('panitia.tugas.show', $tugasPanitia) }}" class="active">
                Tugas Saya
            </a>
        </div>

        <div class="menu-title">Akun</div>

        <div class="menu">
            <a href="{{ route('logout') }}">
                Keluar
            </a>
        </div>
    </aside>

    <main class="content">

        <a href="{{ route('panitia.dashboard') }}" class="back">
            ← Kembali ke Dashboard
        </a>

        <div class="topbar">
            <h1>Detail Tugas</h1>
            <p>Kelola tugas yang diberikan kepada Anda.</p>
        </div>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="card">

            <div class="event-name">
                {{ $tugasPanitia->eventPanitia?->event?->nama_event ?? 'Event' }}
            </div>

            <h2 class="task-title">
                {{ $tugasPanitia->judul_tugas }}
            </h2>

            <div class="grid">

                <div class="info">
                    <span class="label">Panitia</span>
                    <span class="value">
                        {{ $tugasPanitia->eventPanitia?->panitia?->nama ?? '-' }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">Divisi</span>
                    <span class="value">
                        {{ $tugasPanitia->eventPanitia?->divisi?->nama_divisi
                            ?? $tugasPanitia->eventPanitia?->panitia?->divisi
                            ?? '-' }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">Tanggal</span>
                    <span class="value">
                        {{ $tugasPanitia->tanggal
                            ? \Carbon\Carbon::parse($tugasPanitia->tanggal)->format('d M Y')
                            : '-' }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">Jam</span>
                    <span class="value">
                        {{ $tugasPanitia->jam_mulai ?? '-' }}
                        -
                        {{ $tugasPanitia->jam_selesai ?? '-' }}
                    </span>
                </div>

                <div class="info">
                    <span class="label">Lokasi</span>
                    <span class="value">
                        {{ $tugasPanitia->lokasi ?? '-' }}
                    </span>
                </div>

            </div>

            @if($tugasPanitia->deskripsi)
                <div class="description">
                    <strong>Deskripsi Tugas</strong>
                    <p>{{ $tugasPanitia->deskripsi }}</p>
                </div>
            @endif

            <div class="status-box">

                <span class="label">Status Saat Ini</span>

                <div class="status-current {{ $tugasPanitia->status }}">
                    {{ ucwords(str_replace('_', ' ', $tugasPanitia->status)) }}
                </div>

                @if($tugasPanitia->status !== 'selesai')

                    <form
                        method="POST"
                        action="{{ route('panitia.tugas.update-status', $tugasPanitia) }}"
                    >
                        @csrf
                        @method('PUT')

                        <label class="label">
                            Catatan Panitia
                        </label>

                        <textarea
                            name="catatan_panitia"
                            placeholder="Tuliskan catatan atau perkembangan tugas..."
                        >{{ old('catatan_panitia', $tugasPanitia->catatan_panitia) }}</textarea>

                        <div class="buttons">

                            @if($tugasPanitia->status === 'belum_dimulai')
                                <input type="hidden" name="status" value="sedang_dikerjakan">

                                <button type="submit" class="btn-start">
                                    Mulai Kerjakan
                                </button>
                            @elseif($tugasPanitia->status === 'sedang_dikerjakan')
                                <input type="hidden" name="status" value="selesai">

                                <button type="submit" class="btn-finish">
                                    Tandai Selesai
                                </button>
                            @endif

                        </div>
                    </form>

                @else

                    <div class="finished">
                        ✓ Tugas ini sudah selesai dan tidak dapat diubah lagi.
                    </div>

                    @if($tugasPanitia->catatan_panitia)
                        <div class="description">
                            <strong>Catatan Panitia</strong>
                            <p>{{ $tugasPanitia->catatan_panitia }}</p>
                        </div>
                    @endif

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>
