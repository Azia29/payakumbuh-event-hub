<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tugas {{ $panitia->nama }} - Payakumbuh Event Hub</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1f2937;
        }

        .header {
            background: #166534;
            color: white;
            padding: 22px;
        }

        .header-inner {
            max-width: 1100px;
            margin: auto;
        }

        .header h1 {
            margin: 0 0 6px;
        }

        .header p {
            margin: 0;
            opacity: .85;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .profile {
            background: white;
            border-radius: 16px;
            padding: 22px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        .profile h2 {
            margin-top: 0;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .info-item span {
            display: block;
            color: #64748b;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .tasks {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 18px;
        }

        .task {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
        }

        .task h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .task p {
            color: #64748b;
            line-height: 1.5;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .belum {
            background: #fef3c7;
            color: #92400e;
        }

        .kerja {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .selesai {
            background: #dcfce7;
            color: #166534;
        }

        .detail {
            margin: 12px 0;
            font-size: 14px;
        }

        .empty {
            background: white;
            padding: 40px;
            text-align: center;
            border-radius: 16px;
            color: #64748b;
        }
    </style>
</head>

<body>

<div class="header">
    <div class="header-inner">
        <h1>Payakumbuh Event Hub</h1>
        <p>Daftar Tugas Panitia</p>
    </div>
</div>

<div class="container">

    <div class="profile">

        <h2>{{ $panitia->nama }}</h2>

        <div class="info">

            <div class="info-item">
                <span>Divisi</span>
                <strong>{{ $panitia->divisi }}</strong>
            </div>

            <div class="info-item">
                <span>Email</span>
                <strong>{{ $panitia->email ?? '-' }}</strong>
            </div>

            <div class="info-item">
                <span>No. HP</span>
                <strong>{{ $panitia->no_hp ?? '-' }}</strong>
            </div>

        </div>

    </div>

    <h2>Tugas Saya</h2>

    @if($tugas->count())

        <div class="tasks">

            @foreach($tugas as $item)

                <div class="task">

                    @if($item->status === 'belum_dimulai')
                        <span class="badge belum">
                            Belum Dimulai
                        </span>
                    @elseif($item->status === 'sedang_dikerjakan')
                        <span class="badge kerja">
                            Sedang Dikerjakan
                        </span>
                    @else
                        <span class="badge selesai">
                            Selesai
                        </span>
                    @endif

                    <h3>
                        {{ $item->judul_tugas }}
                    </h3>

                    <p>
                        {{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}
                    </p>

                    <div class="detail">
                        <strong>Event:</strong>
                        {{ $item->eventPanitia?->event?->nama_event ?? '-' }}
                    </div>

                    <div class="detail">
                        <strong>Tanggal:</strong>
                        {{ $item->tanggal
                            ? \Carbon\Carbon::parse($item->tanggal)->format('d M Y')
                            : '-'
                        }}
                    </div>

                    <div class="detail">
                        <strong>Waktu:</strong>
                        {{ $item->jam_mulai ?? '-' }}
                        -
                        {{ $item->jam_selesai ?? '-' }}
                    </div>

                    <div class="detail">
                        <strong>Lokasi:</strong>
                        {{ $item->lokasi ?? '-' }}
                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="empty">
            <h3>Belum Ada Tugas</h3>

            <p>
                Saat EO memberikan tugas baru,
                tugas tersebut akan muncul di halaman ini.
            </p>
        </div>

    @endif

</div>

</body>
</html>
