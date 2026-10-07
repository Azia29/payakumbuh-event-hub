<x-layouts.eo :user="$user" title="Rundown Event">

    <style>
        .rundown-page {
            padding: 28px;
        }

        .rundown-hero {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            box-shadow: 0 10px 30px rgba(22, 101, 52, .18);
        }

        .rundown-hero h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .rundown-hero p {
            margin: 0;
            opacity: .9;
            line-height: 1.6;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            color: #166534;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #f0fdf4;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 5px 18px rgba(0,0,0,.04);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .stat-card small {
            display: block;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .stat-card strong {
            font-size: 24px;
            color: #111827;
        }

        .content-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.04);
        }

        .content-header {
            padding: 22px 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .content-header h2 {
            margin: 0;
            font-size: 19px;
            color: #111827;
        }

        .content-header p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #f8fafc;
            color: #6b7280;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .04em;
            padding: 14px 18px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 17px 18px;
            border-top: 1px solid #f1f5f9;
            color: #374151;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:hover td {
            background: #f8fafc;
        }

        .event-name {
            font-weight: 700;
            color: #166534;
        }

        .rundown-name {
            font-weight: 700;
            color: #111827;
        }

        .description {
            color: #6b7280;
            font-size: 12px;
            margin-top: 4px;
            max-width: 220px;
        }

        .date-box {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
            background: #f0fdf4;
            color: #166534;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .time {
            font-weight: 700;
            color: #374151;
            white-space: nowrap;
        }

        .location {
            color: #4b5563;
        }

        .pic {
            font-weight: 600;
            color: #374151;
        }

        .status {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .status-terjadwal {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-selesai {
            background: #dcfce7;
            color: #15803d;
        }

        .status-berlangsung {
            background: #fef3c7;
            color: #b45309;
        }

        .status-batal {
            background: #fee2e2;
            color: #b91c1c;
        }

        .status-default {
            background: #f3f4f6;
            color: #4b5563;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-view {
            background: #eff6ff;
            color: #2563eb;
        }

        .btn-edit {
            background: #fef3c7;
            color: #b45309;
        }

        .btn-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 65px 25px;
        }

        .empty-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            border-radius: 18px;
            background: #f0fdf4;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
        }

        .empty-state h3 {
            margin: 0 0 8px;
            color: #111827;
        }

        .empty-state p {
            color: #6b7280;
            margin: 0 0 20px;
        }

        .empty-btn {
            display: inline-block;
            padding: 11px 17px;
            border-radius: 9px;
            background: #166534;
            color: white;
            text-decoration: none;
            font-weight: 700;
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .rundown-hero {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 600px) {
            .rundown-page {
                padding: 18px;
            }

            .rundown-hero {
                padding: 23px;
            }

            .rundown-hero h1 {
                font-size: 23px;
            }
        }
    </style>

    <div class="rundown-page">

        {{-- NOTIFIKASI --}}

        @if(session('success'))
            <div class="alert-success">
                âœ“ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif


        {{-- HERO --}}

        <section class="rundown-hero">

            <div>
                <h1>Rundown Event</h1>

                <p>
                    Atur urutan kegiatan, waktu, lokasi,
                    dan penanggung jawab setiap event.
                </p>
            </div>

            <a href="{{ route('eo.rundown.create') }}" class="btn-add">
                ï¼‹ Tambah Rundown
            </a>

        </section>


        {{-- STATISTIK --}}

        @php
            $totalRundown = $rundowns->count();

            $totalTerjadwal = $rundowns
                ->where('status', 'terjadwal')
                ->count();

            $totalSelesai = $rundowns
                ->where('status', 'selesai')
                ->count();
        @endphp

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon">
                    â˜°
                </div>

                <div>
                    <small>Total Rundown</small>
                    <strong>{{ $totalRundown }}</strong>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon">
                    â—·
                </div>

                <div>
                    <small>Terjadwal</small>
                    <strong>{{ $totalTerjadwal }}</strong>
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-icon">
                    âœ“
                </div>

                <div>
                    <small>Selesai</small>
                    <strong>{{ $totalSelesai }}</strong>
                </div>
            </div>

        </div>


        {{-- DATA RUNDOWN --}}

        <section class="content-card">

            <div class="content-header">

                <div>
                    <h2>Daftar Rundown</h2>

                    <p>
                        Seluruh susunan kegiatan event yang telah dibuat.
                    </p>
                </div>

            </div>


            @if($rundowns->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Event</th>
                                <th>Rundown</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Penanggung Jawab</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($rundowns as $rundown)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>
                                        <div class="event-name">
                                            {{ $rundown->event?->nama_event ?? 'Event tidak ditemukan' }}
                                        </div>
                                    </td>


                                    <td>

                                        <div class="rundown-name">
                                            {{ $rundown->nama_rundown }}
                                        </div>

                                        @if($rundown->deskripsi)
                                            <div class="description">
                                                {{ Str::limit($rundown->deskripsi, 60) }}
                                            </div>
                                        @endif

                                    </td>


                                    <td>

                                        <span class="date-box">
                                            ðŸ“…
                                            {{ $rundown->tanggal?->format('d M Y') ?? '-' }}
                                        </span>

                                    </td>


                                    <td>

                                        <div class="time">
                                            {{ $rundown->waktu_mulai ?? '-' }}

                                            @if($rundown->waktu_selesai)
                                                -
                                                {{ $rundown->waktu_selesai }}
                                            @endif
                                        </div>

                                    </td>


                                    <td>

                                        <div class="location">
                                            {{ $rundown->lokasi ?: '-' }}
                                        </div>

                                    </td>


                                    <td>

                                        <div class="pic">
                                            {{ $rundown->penanggung_jawab ?: '-' }}
                                        </div>

                                    </td>


                                    <td>

                                        @php
                                            $statusClass = match(strtolower($rundown->status ?? '')) {
                                                'terjadwal' => 'status-terjadwal',
                                                'selesai' => 'status-selesai',
                                                'berlangsung' => 'status-berlangsung',
                                                'batal' => 'status-batal',
                                                default => 'status-default',
                                            };
                                        @endphp

                                        <span class="status {{ $statusClass }}">
                                            {{ $rundown->status ?: 'terjadwal' }}
                                        </span>

                                    </td>


                                    <td>

                                        <div class="actions">

                                            <a
                                                href="{{ route('eo.rundown.show', $rundown) }}"
                                                class="action-btn btn-view"
                                                title="Lihat">
                                                ðŸ‘
                                            </a>


                                            <a
                                                href="{{ route('eo.rundown.edit', $rundown) }}"
                                                class="action-btn btn-edit"
                                                title="Edit">
                                                âœŽ
                                            </a>


                                            <form
                                                action="{{ route('eo.rundown.destroy', $rundown) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus rundown ini?');">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn btn-delete"
                                                    title="Hapus">
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

                <div class="empty-state">

                    <div class="empty-icon">
                        â˜°
                    </div>

                    <h3>
                        Belum Ada Rundown
                    </h3>

                    <p>
                        Belum ada susunan kegiatan yang dibuat
                        untuk event.
                    </p>

                    <a
                        href="{{ route('eo.rundown.create') }}"
                        class="empty-btn">

                        ï¼‹ Buat Rundown Pertama

                    </a>

                </div>

            @endif

        </section>

    </div>

</x-layouts.eo>