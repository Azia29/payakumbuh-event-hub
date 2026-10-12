<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Tugas {{ $panitia->nama }} - Payakumbuh Event Hub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; font-family: system-ui, sans-serif;
            background: #f1f5f9; color: #1e293b;
        }
        .wrap { max-width: 680px; margin: auto; padding: 18px 14px 40px; }
        .head {
            background: linear-gradient(135deg, #15803d, #166534);
            color: white; border-radius: 18px; padding: 24px 20px;
            margin-bottom: 18px;
        }
        .head small { text-transform: uppercase; letter-spacing: 1px; }
        .head h1 { margin: 8px 0; font-size: 24px; }
        .card {
            background: white; border: 1px solid #e2e8f0;
            border-radius: 16px; padding: 18px; margin-bottom: 14px;
            box-shadow: 0 3px 10px rgba(15,23,42,.04);
        }
        .card h2 { margin: 8px 0; font-size: 18px; }
        .meta { color: #64748b; font-size: 13px; line-height: 1.9; }
        .desc { margin-top: 10px; line-height: 1.7; white-space: pre-line; }
        .badge {
            display: inline-block; padding: 5px 10px; border-radius: 8px;
            font-size: 12px; font-weight: 700;
        }
        .b-belum { background: #e2e8f0; color: #334155; }
        .b-proses { background: #fef3c7; color: #92400e; }
        .b-selesai { background: #dcfce7; color: #166534; }
        label { display: block; font-weight: 650; margin: 14px 0 7px; }
        select, textarea {
            width: 100%; padding: 12px; border: 1px solid #cbd5e1;
            border-radius: 10px; font: inherit; background: white;
        }
        textarea { min-height: 85px; resize: vertical; }
        button {
            width: 100%; border: 0; border-radius: 10px; padding: 13px;
            margin-top: 14px; background: #15803d; color: white;
            font: inherit; font-weight: 700; cursor: pointer;
        }
        button:hover { background: #166534; }
        .alert { padding: 12px 14px; border-radius: 10px; margin-bottom: 14px; }
        .success { background: #dcfce7; color: #166534; }
        .error { background: #fee2e2; color: #991b1b; }
        .empty { text-align: center; padding: 30px 15px; color: #64748b; }
        .foot { text-align: center; color: #94a3b8; font-size: 12px; margin-top: 22px; }
    </style>
</head>
<body>
<div class="wrap">
    <header class="head">
        <small>Payakumbuh Event Hub · Tugas Panitia</small>
        <h1>{{ $panitia->nama }}</h1>
        <p>{{ $tugas->count() }} tugas terdaftar pada akun panitia ini.</p>
    </header>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            <strong>Perubahan belum berhasil.</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @forelse($tugas as $item)
        @php
            $status = $item->status ?? 'belum_dimulai';
            $labelStatus = match($status) {
                'sedang_dikerjakan' => 'Sedang Dilakukan',
                'selesai' => 'Selesai',
                default => 'Belum',
            };
            $kelasStatus = match($status) {
                'sedang_dikerjakan' => 'b-proses',
                'selesai' => 'b-selesai',
                default => 'b-belum',
            };
        @endphp

        <article class="card">
            <span class="badge {{ $kelasStatus }}">{{ $labelStatus }}</span>
            <h2>{{ $item->judul_tugas }}</h2>

            <div class="meta">
                @if($item->eventPanitia?->event)
                    Event: {{ $item->eventPanitia->event->nama_event }}<br>
                @endif
                @if($item->tanggal)
                    Tanggal: {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') }}<br>
                @endif
                @if($item->jam_mulai)
                    Jam: {{ substr($item->jam_mulai, 0, 5) }}
                    @if($item->jam_selesai)
                        - {{ substr($item->jam_selesai, 0, 5) }}
                    @endif
                    <br>
                @endif
                @if($item->lokasi)
                    Lokasi: {{ $item->lokasi }}
                @endif
            </div>

            @if($item->deskripsi)
                <div class="desc">{{ $item->deskripsi }}</div>
            @endif

            <form method="POST"
                action="{{ route('panitia.qr.tugas.status', ['token' => $panitia->qr_token, 'tugasPanitia' => $item->id]) }}">
                @csrf
                @method('PUT')

                <label for="status-{{ $item->id }}">Perbarui status</label>
                <select id="status-{{ $item->id }}" name="status" required>
                    @if($status === 'belum_dimulai')
                        <option value="belum_dimulai" selected>Belum</option>
                        <option value="sedang_dikerjakan">Sedang Dilakukan</option>
                    @elseif($status === 'sedang_dikerjakan')
                        <option value="sedang_dikerjakan" selected>Sedang Dilakukan</option>
                        <option value="selesai">Selesai</option>
                    @else
                        <option value="selesai" selected>Selesai</option>
                    @endif
                </select>

                <label for="catatan-{{ $item->id }}">Catatan (opsional)</label>
                <textarea id="catatan-{{ $item->id }}" name="catatan_panitia"
                    maxlength="2000" placeholder="Tambahkan catatan perkembangan tugas...">{{ old('catatan_panitia', $item->catatan_panitia) }}</textarea>

                <button type="submit">Simpan Status</button>
            </form>
        </article>
    @empty
        <div class="card empty">
            <strong>Belum ada tugas</strong>
            <p>Tugas akan muncul setelah EO memberikan tugas kepada panitia.</p>
        </div>
    @endforelse

    <footer class="foot">Payakumbuh Event Hub</footer>
</div>
</body>
</html>
