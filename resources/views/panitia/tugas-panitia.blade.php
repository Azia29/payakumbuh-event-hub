<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tugas Panitia</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 20px;
        }

        .header {
            background: #15803d;
            color: white;
            padding: 28px;
            border-radius: 16px 16px 0 0;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 25px;
        }

        .header p {
            margin: 5px 0;
            opacity: .9;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 8px 25px rgba(15,23,42,.08);
        }

        .identity {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 10px;
            padding-bottom: 20px;
            margin-bottom: 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            color: #64748b;
        }

        .value {
            font-weight: 700;
        }

        .task {
            padding: 18px;
            margin-bottom: 15px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            background: #f8fafc;
        }

        .task h3 {
            margin: 0 0 12px;
            color: #172033;
        }

        .task-info {
            margin: 7px 0;
            color: #475569;
        }

        .status {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 10px;
            border-radius: 7px;
            background: #dcfce7;
            color: #166534;
            font-size: 13px;
            font-weight: 700;
        }

        .empty {
            padding: 25px;
            text-align: center;
            background: #f8fafc;
            border-radius: 12px;
            color: #64748b;
        }

        @media(max-width:600px) {
            .container {
                margin: 10px auto;
                padding: 10px;
            }

            .identity {
                grid-template-columns: 1fr;
                gap: 4px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>
            {{ $eventPanitia->panitia?->nama ?? 'Panitia' }}
        </h1>

        <p>
            {{ $eventPanitia->event?->nama_event ?? '-' }}
        </p>

        <p>
            Divisi:
            {{ $eventPanitia->divisi?->nama_divisi ?? '-' }}
        </p>

    </div>

    <div class="card">

        <div class="identity">

            <div class="label">
                Event
            </div>

            <div class="value">
                {{ $eventPanitia->event?->nama_event ?? '-' }}
            </div>

            <div class="label">
                Panitia
            </div>

            <div class="value">
                {{ $eventPanitia->panitia?->nama ?? '-' }}
            </div>

            <div class="label">
                Divisi
            </div>

            <div class="value">
                {{ $eventPanitia->divisi?->nama_divisi ?? '-' }}
            </div>

        </div>

        <h2>
            Daftar Tugas
        </h2>

        @forelse($tugas as $item)

            <div class="task">

                <h3>
                    {{ $item->judul_tugas }}
                </h3>

                <div class="task-info">
                    <strong>Tanggal:</strong>
                    {{ $item->tanggal?->format('d/m/Y') ?? '-' }}
                </div>

                <div class="task-info">
                    <strong>Waktu:</strong>
                    {{ $item->jam_mulai ?? '-' }}

                    @if($item->jam_selesai)
                        - {{ $item->jam_selesai }}
                    @endif
                </div>

                <div class="task-info">
                    <strong>Lokasi:</strong>
                    {{ $item->lokasi ?? '-' }}
                </div>

                <div class="task-info">
                    <strong>Deskripsi:</strong>
                    {{ $item->deskripsi ?: '-' }}
                </div>

                <span class="status">
                    @if($item->status === 'belum_dimulai')
                        Belum Dimulai
                    @elseif($item->status === 'sedang_dikerjakan')
                        Sedang Dikerjakan
                    @else
                        Selesai
                    @endif
                </span>

            </div>

        @empty

            <div class="empty">
                Belum ada tugas yang diberikan kepada panitia ini.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>