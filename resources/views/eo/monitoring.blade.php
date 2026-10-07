<x-layouts.eo :user="$user" title="Monitoring Kegiatan">

    <style>
        .monitoring-page {
            padding: 32px;
            background: #f8fafc;
            min-height: calc(100vh - 92px);
        }

        .page-hero {
            background: linear-gradient(135deg, #047857, #10b981);
            color: white;
            border-radius: 20px;
            padding: 28px 30px;
            margin-bottom: 24px;
            box-shadow: 0 12px 28px rgba(5,150,105,.14);
        }

        .page-hero h1 {
            margin: 0 0 7px;
            font-size: 27px;
            font-weight: 800;
        }

        .page-hero p {
            margin: 0;
            opacity: .9;
            font-size: 13px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 21px;
            box-shadow: 0 5px 18px rgba(15,23,42,.04);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .stat-title {
            color: #64748b;
            font-size: 12px;
            font-weight: 700;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 800;
            color: #0f172a;
        }

        .panel {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(15,23,42,.04);
        }

        .panel-header {
            padding: 21px 23px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .panel-header h2 {
            margin: 0;
            font-size: 17px;
            font-weight: 800;
            color: #0f172a;
        }

        .panel-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .monitoring-table {
            width: 100%;
            border-collapse: collapse;
        }

        .monitoring-table th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .4px;
            text-align: left;
            padding: 14px 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .monitoring-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
            color: #334155;
        }

        .monitoring-table tr:last-child td {
            border-bottom: 0;
        }

        .event-name {
            color: #0f172a;
            font-weight: 800;
        }

        .event-meta {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 4px;
        }

        .status {
            display: inline-flex;
            padding: 6px 10px;
            border-radius: 999px;
            background: #ecfdf5;
            color: #047857;
            font-size: 10px;
            font-weight: 800;
        }

        .empty {
            padding: 55px 20px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            width: 54px;
            height: 54px;
            margin: 0 auto 13px;
            border-radius: 15px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 12px;
        }

        .info-box {
            margin-top: 20px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 14px;
            padding: 17px 20px;
            color: #166534;
            font-size: 12px;
            line-height: 1.7;
        }

        @media(max-width:800px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .monitoring-page {
                padding: 18px;
            }

            .monitoring-table {
                min-width: 700px;
            }

            .panel {
                overflow-x: auto;
            }
        }
    </style>

    <div class="monitoring-page">

        <div class="page-hero">
            <h1>Monitoring Kegiatan</h1>
            <p>
                Pantau perkembangan, status, dan informasi seluruh kegiatan event
                yang dikelola Event Hub Payakumbuh.
            </p>
        </div>

        @php
            $total = isset($events) ? $events->count() : 0;

            $aktif = isset($events)
                ? $events->whereIn('status', ['aktif', 'berlangsung', 'disetujui'])->count()
                : 0;

            $selesai = isset($events)
                ? $events->whereIn('status', ['selesai', 'completed'])->count()
                : 0;
        @endphp

        <div class="stats">

            <div class="stat">
                <div class="stat-top">
                    <span class="stat-title">TOTAL EVENT</span>
                    <div class="stat-icon">EV</div>
                </div>
                <div class="stat-number">{{ $total }}</div>
            </div>

            <div class="stat">
                <div class="stat-top">
                    <span class="stat-title">EVENT AKTIF</span>
                    <div class="stat-icon">AK</div>
                </div>
                <div class="stat-number">{{ $aktif }}</div>
            </div>

            <div class="stat">
                <div class="stat-top">
                    <span class="stat-title">EVENT SELESAI</span>
                    <div class="stat-icon">SL</div>
                </div>
                <div class="stat-number">{{ $selesai }}</div>
            </div>

        </div>

        <div class="panel">

            <div class="panel-header">
                <div>
                    <h2>Daftar Kegiatan Event</h2>
                    <p>Monitoring status event yang tersedia dalam sistem.</p>
                </div>
            </div>

            @if(isset($events) && $events->count())

                <table class="monitoring-table">

                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($events as $event)

                            <tr>

                                <td>
                                    <div class="event-name">
                                        {{ $event->nama_event }}
                                    </div>

                                    <div class="event-meta">
                                        ID Event #{{ $event->id }}
                                    </div>
                                </td>

                                <td>
                                    {{ $event->lokasi_event ?? 'Belum ditentukan' }}
                                </td>

                                <td>
                                    {{ $event->tgl_mulai
                                        ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y')
                                        : '-' }}
                                </td>

                                <td>
                                    <span class="status">
                                        {{ ucfirst($event->status ?? 'Draft') }}
                                    </span>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            @else

                <div class="empty">
                    <div class="empty-icon">EV</div>

                    <strong style="color:#0f172a;">
                        Belum ada kegiatan
                    </strong>

                    <div style="margin-top:6px;">
                        Data event yang dibuat akan muncul di halaman monitoring.
                    </div>
                </div>

            @endif

        </div>

        <div class="info-box">
            <strong>Informasi Monitoring</strong><br>
            Ketua EO dapat menggunakan halaman ini untuk melihat kondisi event,
            status pelaksanaan, lokasi, dan tanggal kegiatan secara keseluruhan.
        </div>

    </div>

</x-layouts.eo>