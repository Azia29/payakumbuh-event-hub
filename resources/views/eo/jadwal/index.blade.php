<x-layouts.eo :user="$user" title="Jadwal Event">

    <style>
        .jadwal-page {
            padding: 4px 0 30px;
        }

        /* =========================
           HERO
        ========================== */

        .jadwal-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #14532d, #166534 55%, #15803d);
            border-radius: 22px;
            padding: 32px;
            color: white;
            margin-bottom: 24px;
        }

        .jadwal-hero::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            right: -70px;
            top: -90px;
            background: rgba(255,255,255,.08);
            border-radius: 50%;
        }

        .jadwal-hero::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            right: 100px;
            bottom: -100px;
            background: rgba(255,255,255,.06);
            border-radius: 50%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .hero-left {
            max-width: 700px;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 20px;
            background: rgba(255,255,255,.13);
            font-size: 12px;
            margin-bottom: 12px;
        }

        .hero-left h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 800;
        }

        .hero-left p {
            margin: 0;
            line-height: 1.7;
            color: rgba(255,255,255,.84);
            font-size: 14px;
        }

        .hero-action {
            flex-shrink: 0;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: white;
            color: #166534;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            transition: .2s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,.15);
        }

        /* =========================
           STATISTICS
        ========================== */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 14px rgba(15,23,42,.05);
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15,23,42,.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #166534;
            font-size: 20px;
        }

        .stat-info span {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .stat-info strong {
            display: block;
            color: #0f172a;
            font-size: 24px;
            line-height: 1;
        }

        /* =========================
           CONTENT CARD
        ========================== */

        .content-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(15,23,42,.05);
            overflow: hidden;
        }

        .content-header {
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border-bottom: 1px solid #eef0f2;
        }

        .content-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .content-title-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #f0fdf4;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .content-title h2 {
            margin: 0 0 3px;
            font-size: 17px;
            color: #111827;
        }

        .content-title p {
            margin: 0;
            font-size: 12px;
            color: #64748b;
        }

        /* =========================
           TABLE
        ========================== */

        .table-wrapper {
            overflow-x: auto;
        }

        .jadwal-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        .jadwal-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 700;
            padding: 14px 18px;
            text-align: left;
            white-space: nowrap;
            border-bottom: 1px solid #e5e7eb;
        }

        .jadwal-table td {
            padding: 16px 18px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            font-size: 13px;
            vertical-align: middle;
        }

        .jadwal-table tbody tr {
            transition: .15s;
        }

        .jadwal-table tbody tr:hover {
            background: #f8fafc;
        }

        .jadwal-table tbody tr:last-child td {
            border-bottom: none;
        }

        .number {
            width: 45px;
            color: #94a3b8 !important;
            font-weight: 700;
        }

        .event-name {
            font-weight: 700;
            color: #166534;
        }

        .schedule-name {
            font-weight: 700;
            color: #1e293b;
        }

        .schedule-description {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 4px;
            max-width: 220px;
        }

        /* =========================
           DATE & TIME
        ========================== */

        .date-box {
            display: flex;
            align-items: center;
            gap: 9px;
            white-space: nowrap;
        }

        .date-icon,
        .time-icon,
        .location-icon,
        .person-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: #f0fdf4;
            color: #166534;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 12px;
        }

        .date-text strong {
            display: block;
            color: #334155;
            font-size: 12px;
        }

        .date-text span {
            display: block;
            color: #94a3b8;
            font-size: 10px;
            margin-top: 2px;
        }

        .time-text {
            white-space: nowrap;
            color: #475569;
            font-weight: 600;
        }

        /* =========================
           LOCATION
        ========================== */

        .location-box {
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 170px;
        }

        .location-text {
            color: #475569;
            line-height: 1.4;
        }

        /* =========================
           PERSON
        ========================== */

        .person-box {
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 170px;
        }

        .person-text {
            color: #475569;
            line-height: 1.4;
        }

        /* =========================
           STATUS
        ========================== */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-terjadwal {
            background: #eff6ff;
            color: #2563eb;
        }

        .status-berlangsung {
            background: #ecfdf5;
            color: #059669;
        }

        .status-selesai {
            background: #f1f5f9;
            color: #64748b;
        }

        .status-batal {
            background: #fef2f2;
            color: #dc2626;
        }

        .status-default {
            background: #f8fafc;
            color: #64748b;
        }

        /* =========================
           ACTION
        ========================== */

        .action-group {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .15s;
            font-size: 13px;
        }

        .action-view {
            background: #eff6ff;
            color: #2563eb;
        }

        .action-edit {
            background: #fffbeb;
            color: #d97706;
        }

        .action-delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        /* =========================
           EMPTY STATE
        ========================== */

        .empty-state {
            padding: 60px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            margin: 0 auto 18px;
            border-radius: 22px;
            background: #f0fdf4;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-state h3 {
            margin: 0 0 7px;
            color: #1e293b;
            font-size: 18px;
        }

        .empty-state p {
            margin: 0 auto 20px;
            color: #64748b;
            font-size: 13px;
            max-width: 420px;
            line-height: 1.6;
        }

        .empty-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #166534;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .empty-btn:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        /* =========================
           SUCCESS ALERT
        ========================== */

        .success-alert {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 16px;
            border-radius: 11px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-content {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .jadwal-hero {
                padding: 24px;
            }

            .hero-left h1 {
                font-size: 25px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .content-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero-action {
                width: 100%;
            }

            .btn-primary {
                width: 100%;
                justify-content: center;
            }
        }
    </style>


    <div class="jadwal-page">

        {{-- =========================
             HERO
        ========================== --}}

        <div class="jadwal-hero">

            <div class="hero-content">

                <div class="hero-left">

                    <div class="hero-label">
                        ðŸ“…
                        Divisi Acara
                    </div>

                    <h1>
                        Jadwal Event
                    </h1>

                    <p>
                        Kelola waktu, tempat, dan penanggung jawab
                        setiap kegiatan dalam pelaksanaan event
                        Payakumbuh Event Hub.
                    </p>

                </div>

                <div class="hero-action">

                    <a
                        href="{{ route('eo.jadwal.create') }}"
                        class="btn-primary">

                        <span>ï¼‹</span>

                        Tambah Jadwal

                    </a>

                </div>

            </div>

        </div>


        {{-- =========================
             SUCCESS MESSAGE
        ========================== --}}

        @if(session('success'))

            <div class="success-alert">

                <span>âœ“</span>

                {{ session('success') }}

            </div>

        @endif


        {{-- =========================
             STATISTICS
        ========================== --}}

        @php

            $totalJadwal = $jadwals->count();

            $jadwalTerjadwal = $jadwals
                ->where('status', 'terjadwal')
                ->count();

            $jadwalBerlangsung = $jadwals
                ->where('status', 'berlangsung')
                ->count();

            $jadwalSelesai = $jadwals
                ->where('status', 'selesai')
                ->count();

        @endphp


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon">
                    ðŸ“…
                </div>

                <div class="stat-info">

                    <span>
                        Total Jadwal
                    </span>

                    <strong>
                        {{ $totalJadwal }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ðŸ•
                </div>

                <div class="stat-info">

                    <span>
                        Terjadwal
                    </span>

                    <strong>
                        {{ $jadwalTerjadwal }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    â–¶
                </div>

                <div class="stat-info">

                    <span>
                        Berlangsung
                    </span>

                    <strong>
                        {{ $jadwalBerlangsung }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    âœ“
                </div>

                <div class="stat-info">

                    <span>
                        Selesai
                    </span>

                    <strong>
                        {{ $jadwalSelesai }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- =========================
             DATA JADWAL
        ========================== --}}

        <div class="content-card">

            <div class="content-header">

                <div class="content-title">

                    <div class="content-title-icon">
                        ðŸ“‹
                    </div>

                    <div>

                        <h2>
                            Daftar Jadwal
                        </h2>

                        <p>
                            Semua jadwal event yang telah dibuat.
                        </p>

                    </div>

                </div>

            </div>


            @if($jadwals->count() > 0)

                <div class="table-wrapper">

                    <table class="jadwal-table">

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Event
                                </th>

                                <th>
                                    Nama Jadwal
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Waktu
                                </th>

                                <th>
                                    Lokasi
                                </th>

                                <th>
                                    Penanggung Jawab
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($jadwals as $jadwal)

                                <tr>

                                    {{-- NO --}}

                                    <td class="number">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- EVENT --}}

                                    <td>

                                        <div class="event-name">

                                            {{ $jadwal->event?->nama_event ?? 'Event tidak ditemukan' }}

                                        </div>

                                    </td>


                                    {{-- NAMA JADWAL --}}

                                    <td>

                                        <div class="schedule-name">

                                            {{ $jadwal->nama_jadwal }}

                                        </div>

                                        @if($jadwal->keterangan)

                                            <div class="schedule-description">

                                                {{ \Illuminate\Support\Str::limit($jadwal->keterangan, 55) }}

                                            </div>

                                        @endif

                                    </td>


                                    {{-- TANGGAL --}}

                                    <td>

                                        <div class="date-box">

                                            <div class="date-icon">
                                                ðŸ“…
                                            </div>

                                            <div class="date-text">

                                                <strong>
                                                    {{ $jadwal->tanggal?->format('d M Y') }}
                                                </strong>

                                                <span>
                                                    {{ $jadwal->tanggal?->locale('id')->translatedFormat('l') }}
                                                </span>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- WAKTU --}}

                                    <td>

                                        <div class="date-box">

                                            <div class="time-icon">
                                                ðŸ•
                                            </div>

                                            <div class="time-text">

                                                {{ $jadwal->waktu_mulai }}

                                                @if($jadwal->waktu_selesai)

                                                    -
                                                    {{ $jadwal->waktu_selesai }}

                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    {{-- LOKASI --}}

                                    <td>

                                        <div class="location-box">

                                            <div class="location-icon">
                                                ðŸ“
                                            </div>

                                            <div class="location-text">

                                                {{ $jadwal->lokasi ?? 'Belum ditentukan' }}

                                            </div>

                                        </div>

                                    </td>


                                    {{-- PENANGGUNG JAWAB --}}

                                    <td>

                                        <div class="person-box">

                                            <div class="person-icon">
                                                ðŸ‘¤
                                            </div>

                                            <div class="person-text">

                                                {{ $jadwal->penanggung_jawab ?? 'Belum ditentukan' }}

                                            </div>

                                        </div>

                                    </td>


                                    {{-- STATUS --}}

                                    <td>

                                        @php

                                            $status = strtolower($jadwal->status ?? '');

                                            $statusClass = match($status) {

                                                'terjadwal'
                                                    => 'status-terjadwal',

                                                'berlangsung'
                                                    => 'status-berlangsung',

                                                'selesai'
                                                    => 'status-selesai',

                                                'batal'
                                                    => 'status-batal',

                                                default
                                                    => 'status-default',

                                            };

                                        @endphp


                                        <span class="status-badge {{ $statusClass }}">

                                            <span class="status-dot"></span>

                                            {{ ucfirst($jadwal->status ?? 'Tidak diketahui') }}

                                        </span>

                                    </td>


                                    {{-- AKSI --}}

                                    <td>

                                        <div class="action-group">

                                            {{-- DETAIL --}}

                                            <a
                                                href="{{ route('eo.jadwal.show', $jadwal) }}"
                                                class="action-btn action-view"
                                                title="Lihat detail">

                                                ðŸ‘

                                            </a>


                                            {{-- EDIT --}}

                                            <a
                                                href="{{ route('eo.jadwal.edit', $jadwal) }}"
                                                class="action-btn action-edit"
                                                title="Edit jadwal">

                                                âœŽ

                                            </a>


                                            {{-- DELETE --}}

                                            <form
                                                action="{{ route('eo.jadwal.destroy', $jadwal) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn action-delete"
                                                    title="Hapus jadwal">

                                                    ðŸ—‘

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- =========================
                     EMPTY STATE
                ========================== --}}

                <div class="empty-state">

                    <div class="empty-icon">
                        ðŸ“…
                    </div>

                    <h3>
                        Belum Ada Jadwal
                    </h3>

                    <p>
                        Belum ada jadwal event yang dibuat.
                        Tambahkan jadwal untuk mengatur waktu,
                        lokasi, dan penanggung jawab kegiatan.
                    </p>

                    <a
                        href="{{ route('eo.jadwal.create') }}"
                        class="empty-btn">

                        <span>ï¼‹</span>

                        Tambahkan Jadwal Pertama

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-layouts.eo>