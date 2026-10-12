<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Tugas {{ $panitia->nama }}</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: #f1f5f9; color: #1e293b; }
        .wrap { max-width: 640px; margin: 0 auto; padding: 18px 16px 40px; }
        .head { background: linear-gradient(135deg, #15803d, #166534); color: #fff; border-radius: 18px; padding: 22px 20px; margin-bottom: 18px; }
        .head small { display: block; font-size: 11px; font-weight: 700; letter-spacing: .6px; opacity: .85; text-transform: uppercase; }
        .head h1 { margin: 6px 0 0; font-size: 22px; }
        .head p { margin: 8px 0 0; font-size: 13px; opacity: .9; }
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px; margin-bottom: 12px; box-shadow: 0 3px 10px rgba(15,23,42,.04); }
        .card h2 { margin: 0 0 6px; font-size: 16px; }
        .meta { font-size: 12px; color: #64748b; line-height: 1.7; }
        .desc { margin-top: 10px; font-size: 13px; color: #334155; line-height: 1.6; }
        .badge { display: inline-block; margin-bottom: 10px; padding: 5px 10px; border-radius: 8px; font-size: 11px; font-weight: 800; }
        .b-belum { background: #f1f5f9; color: #475569; }
        .b-proses { background: #fff7ed; color: #c2410c; }
        .b-selesai { background: #f0fdf4; color: #15803d; }
        .empty { text-align: center; padding: 40px 20px; background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; color: #64748b; font-size: 14px; }
        .empty strong { display: block; color: #334155; font-size: 16px; margin-bottom: 6px; }
        .foot { margin-top: 18px; text-align: center; font-size: 11px; color: #94a3b8; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="head">
        <small>Tugas Panitia</small>
        <h1>{{ $panitia->nama }}</h1>
        <p>{{ $tugas->count() }} tugas diberikan kepada kamu.</p>
    </div>

    @forelse($tugas as $item)

        @php
            $status = $item->status ?? 'belum_dimulai';
            $label = match($status) {
                'sedang_dikerjakan' => 'Sedang Dikerjakan',
                'selesai' => 'Selesai',
                default => 'Belum Dimulai',
            };
            $kelas = match($status) {
                'sedang_dikerjakan' => 'b-proses',
                'selesai' => 'b-selesai',
                default => 'b-belum',
            };
        @endphp

        <div class="card">
            <span class="badge {{ $kelas }}">{{ $label }}</span>

            <h2>{{ $item->judul_tugas }}</h2>

            <div class="meta">
                @if($item->eventPanitia?->event)
                    Event: {{ $item->eventPanitia->event->nama_event }}<br>
                @endif
                @if($item->tanggal)
                    Tanggal: {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') }}<br>
                @endif
                @if($item->jam_mulai)
                    Jam: {{ substr($item->jam_mulai, 0, 5) }}@if($item->jam_selesai) - {{ substr($item->jam_selesai, 0, 5) }}@endif<br>
                @endif
                @if($item->lokasi)
                    Lokasi: {{ $item->lokasi }}
                @endif
            </div>

            @if($item->deskripsi)
                <div class="desc">{{ $item->deskripsi }}</div>
            @endif
        </div>

    @empty

        <div class="empty">
            <strong>Belum ada tugas</strong>
            Tugas akan muncul di sini setelah EO memberikannya. Scan QR yang sama lagi untuk melihat tugas terbaru.
        </div>

    @endforelse

    <div class="foot">Payakumbuh Event Hub &middot; Halaman ini hanya untuk melihat tugas.</div>

</div>
</body>
</html>