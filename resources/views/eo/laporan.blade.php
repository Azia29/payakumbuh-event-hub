<x-layouts.eo :user="$user" title="Laporan Event">

    <style>
        .report-page {
            padding: 30px;
            background: #f8fafc;
            min-height: calc(100vh - 90px);
        }

        /* HERO */
        .report-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #047857 0%, #059669 55%, #10b981 100%);
            border-radius: 22px;
            padding: 30px;
            margin-bottom: 24px;
            color: white;
            box-shadow: 0 12px 30px rgba(5,150,105,.16);
        }

        .report-hero::after {
            content: "";
            position: absolute;
            width: 210px;
            height: 210px;
            right: -75px;
            top: -90px;
            border: 38px solid rgba(255,255,255,.08);
            border-radius: 50%;
        }

        .hero-label {
            display: inline-flex;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.16);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .7px;
            margin-bottom: 13px;
            position: relative;
            z-index: 1;
        }

        .report-hero h1 {
            margin: 0 0 8px;
            font-size: 29px;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .report-hero p {
            margin: 0;
            max-width: 720px;
            font-size: 13px;
            line-height: 1.7;
            opacity: .92;
            position: relative;
            z-index: 1;
        }

        /* STATISTICS */
        .report-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 17px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            padding: 20px;
            box-shadow: 0 5px 18px rgba(15,23,42,.045);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-title {
            color: #64748b;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .stat-icon {
            width: 39px;
            height: 39px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 800;
        }

        .stat-number {
            margin-top: 16px;
            color: #0f172a;
            font-size: 29px;
            font-weight: 800;
            line-height: 1;
        }

        .stat-note {
            margin-top: 8px;
            color: #94a3b8;
            font-size: 10px;
        }

        /* MAIN GRID */
        .report-grid {
            display: grid;
            grid-template-columns: 1.35fr .85fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .panel {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(15,23,42,.045);
        }

        .panel-header {
            padding: 20px 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .panel-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 17px;
            font-weight: 800;
        }

        .panel-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 11px;
        }

        /* SUMMARY */
        .summary {
            padding: 8px 22px 18px;
        }

        .summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .summary-row:last-child {
            border-bottom: 0;
        }

        .summary-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .summary-icon {
            width: 35px;
            height: 35px;
            border-radius: 9px;
            background: #f0fdf4;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
        }

        .summary-name {
            color: #334155;
            font-size: 12px;
            font-weight: 700;
        }

        .summary-description {
            color: #94a3b8;
            font-size: 10px;
            margin-top: 3px;
        }

        .summary-number {
            color: #047857;
            font-size: 17px;
            font-weight: 800;
        }

        /* FOCUS */
        .focus-list {
            padding: 8px 22px 18px;
        }

        .focus-item {
            display: flex;
            gap: 12px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .focus-item:last-child {
            border-bottom: 0;
        }

        .focus-number {
            width: 32px;
            height: 32px;
            min-width: 32px;
            border-radius: 9px;
            background: #ecfdf5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
        }

        .focus-item strong {
            display: block;
            color: #0f172a;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .focus-item span {
            color: #64748b;
            font-size: 10px;
            line-height: 1.5;
        }

        /* TABLE */
        .event-panel {
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
        }

        .report-table th {
            padding: 14px 18px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .4px;
            text-align: left;
            white-space: nowrap;
        }

        .report-table td {
            padding: 16px 18px;
            border-bottom: 1px solid #f1f5f9;
            color: #475569;
            font-size: 11px;
            white-space: nowrap;
        }

        .report-table tr:last-child td {
            border-bottom: 0;
        }

        .report-table tbody tr:hover {
            background: #f8fafc;
        }

        .event-name {
            color: #0f172a;
            font-size: 12px;
            font-weight: 800;
        }

        .event-location {
            color: #64748b;
        }

        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            background: #ecfdf5;
            color: #047857;
            font-size: 9px;
            font-weight: 800;
        }

        /* BOTTOM INFORMATION */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
        }

        .info-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 19px;
            box-shadow: 0 5px 18px rgba(15,23,42,.045);
        }

        .info-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #ecfdf5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .info-card h3 {
            margin: 0 0 6px;
            color: #0f172a;
            font-size: 13px;
        }

        .info-card p {
            margin: 0;
            color: #64748b;
            font-size: 10px;
            line-height: 1.7;
        }

        /* EMPTY */
        .empty {
            padding: 48px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 55px;
            height: 55px;
            margin: 0 auto 13px;
            border-radius: 15px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .empty-title {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
        }

        .empty-text {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 10px;
        }

        .report-note {
            margin-top: 20px;
            padding: 16px 19px;
            border-radius: 14px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            font-size: 10px;
            line-height: 1.7;
        }

        @media(max-width:1000px) {
            .report-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .report-grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width:600px) {
            .report-page {
                padding: 18px;
            }

            .report-stats {
                grid-template-columns: 1fr;
            }

            .report-hero {
                padding: 23px;
            }

            .report-hero h1 {
                font-size: 23px;
            }
        }
    </style>

    @php
        $totalEventValue = $totalEvent ?? 0;
        $eventAktifValue = $eventAktif ?? 0;
        $totalRundownValue = $totalRundown ?? 0;
        $totalJadwalValue = $totalJadwal ?? 0;
        $totalKegiatanValue = $totalKegiatan ?? 0;

        $eventData = $events
            ?? $eventTerbaru
            ?? collect();
    @endphp

    <div class="report-page">

        {{-- HERO --}}
        <div class="report-hero">

            <div class="hero-label">
                LAPORAN EO KETUA
            </div>

            <h1>Laporan Event</h1>

            <p>
                Ringkasan data event, kegiatan, rundown, dan jadwal
                untuk membantu Ketua EO melakukan evaluasi dan pemantauan
                kegiatan secara menyeluruh.
            </p>

        </div>


        {{-- STATISTIK --}}
        <div class="report-stats">

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">Total Event</span>
                    <div class="stat-icon">EV</div>
                </div>

                <div class="stat-number">
                    {{ $totalEventValue }}
                </div>

                <div class="stat-note">
                    Seluruh event yang terdaftar
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">Event Aktif</span>
                    <div class="stat-icon">AK</div>
                </div>

                <div class="stat-number">
                    {{ $eventAktifValue }}
                </div>

                <div class="stat-note">
                    Event aktif atau berlangsung
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">Total Kegiatan</span>
                    <div class="stat-icon">KG</div>
                </div>

                <div class="stat-number">
                    {{ $totalKegiatanValue }}
                </div>

                <div class="stat-note">
                    Kegiatan dalam event
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">Total Jadwal</span>
                    <div class="stat-icon">JD</div>
                </div>

                <div class="stat-number">
                    {{ $totalJadwalValue }}
                </div>

                <div class="stat-note">
                    Jadwal kegiatan event
                </div>
            </div>

        </div>


        {{-- RINGKASAN --}}
        <div class="report-grid">

            <div class="panel">

                <div class="panel-header">
                    <h2>Ringkasan Sistem</h2>
                    <p>Rekapitulasi data utama yang tersedia pada sistem.</p>
                </div>

                <div class="summary">

                    <div class="summary-row">
                        <div class="summary-left">
                            <div class="summary-icon">EV</div>

                            <div>
                                <div class="summary-name">
                                    Total Event
                                </div>

                                <div class="summary-description">
                                    Seluruh event yang terdaftar
                                </div>
                            </div>
                        </div>

                        <div class="summary-number">
                            {{ $totalEventValue }}
                        </div>
                    </div>


                    <div class="summary-row">
                        <div class="summary-left">
                            <div class="summary-icon">AK</div>

                            <div>
                                <div class="summary-name">
                                    Event Aktif
                                </div>

                                <div class="summary-description">
                                    Event aktif atau sedang berlangsung
                                </div>
                            </div>
                        </div>

                        <div class="summary-number">
                            {{ $eventAktifValue }}
                        </div>
                    </div>


                    <div class="summary-row">
                        <div class="summary-left">
                            <div class="summary-icon">KG</div>

                            <div>
                                <div class="summary-name">
                                    Total Kegiatan
                                </div>

                                <div class="summary-description">
                                    Kegiatan yang terdapat dalam event
                                </div>
                            </div>
                        </div>

                        <div class="summary-number">
                            {{ $totalKegiatanValue }}
                        </div>
                    </div>


                    <div class="summary-row">
                        <div class="summary-left">
                            <div class="summary-icon">RD</div>

                            <div>
                                <div class="summary-name">
                                    Total Rundown
                                </div>

                                <div class="summary-description">
                                    Rundown yang telah dibuat
                                </div>
                            </div>
                        </div>

                        <div class="summary-number">
                            {{ $totalRundownValue }}
                        </div>
                    </div>


                    <div class="summary-row">
                        <div class="summary-left">
                            <div class="summary-icon">JD</div>

                            <div>
                                <div class="summary-name">
                                    Total Jadwal
                                </div>

                                <div class="summary-description">
                                    Jadwal kegiatan event
                                </div>
                            </div>
                        </div>

                        <div class="summary-number">
                            {{ $totalJadwalValue }}
                        </div>
                    </div>

                </div>

            </div>


            {{-- FOKUS LAPORAN --}}
            <div class="panel">

                <div class="panel-header">
                    <h2>Fokus Laporan</h2>
                    <p>Informasi penting untuk evaluasi Ketua EO.</p>
                </div>

                <div class="focus-list">

                    <div class="focus-item">
                        <div class="focus-number">01</div>

                        <div>
                            <strong>Event</strong>

                            <span>
                                Memantau jumlah dan kondisi seluruh event
                                yang dikelola.
                            </span>
                        </div>
                    </div>


                    <div class="focus-item">
                        <div class="focus-number">02</div>

                        <div>
                            <strong>Kegiatan</strong>

                            <span>
                                Melihat aktivitas dan kegiatan yang terdapat
                                pada setiap event.
                            </span>
                        </div>
                    </div>


                    <div class="focus-item">
                        <div class="focus-number">03</div>

                        <div>
                            <strong>Rundown</strong>

                            <span>
                                Memastikan susunan kegiatan telah dipersiapkan.
                            </span>
                        </div>
                    </div>


                    <div class="focus-item">
                        <div class="focus-number">04</div>

                        <div>
                            <strong>Jadwal</strong>

                            <span>
                                Memantau jadwal kegiatan agar pelaksanaan
                                berjalan terarah.
                            </span>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        {{-- TABEL EVENT --}}
        <div class="panel event-panel">

            <div class="panel-header">
                <h2>Rekapitulasi Event</h2>

                <p>
                    Daftar event yang tersedia dalam sistem.
                </p>
            </div>


            @if($eventData instanceof \Illuminate\Support\Collection && $eventData->count())

                <div class="table-wrapper">

                    <table class="report-table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Lokasi</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($eventData as $index => $event)

                                <tr>

                                    <td>
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        <div class="event-name">
                                            {{ $event->nama_event ?? '-' }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="event-location">
                                            {{ $event->lokasi_event ?? 'Belum ditentukan' }}
                                        </span>
                                    </td>

                                    <td>
                                        @if($event->tgl_mulai)
                                            {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>
                                        @if($event->tgl_selesai)
                                            {{ \Carbon\Carbon::parse($event->tgl_selesai)->format('d M Y') }}
                                        @else
                                            -
                                        @endif
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

                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">
                        LP
                    </div>

                    <div class="empty-title">
                        Belum ada data event
                    </div>

                    <div class="empty-text">
                        Rekapitulasi event akan muncul setelah data event tersedia.
                    </div>

                </div>

            @endif

        </div>


        {{-- INFORMASI BAWAH --}}
        <div class="info-grid">

            <div class="info-card">

                <div class="info-icon">
                    EV
                </div>

                <h3>Evaluasi Event</h3>

                <p>
                    Gunakan laporan untuk melihat perkembangan dan kondisi
                    event secara keseluruhan.
                </p>

            </div>


            <div class="info-card">

                <div class="info-icon">
                    KG
                </div>

                <h3>Evaluasi Kegiatan</h3>

                <p>
                    Data kegiatan membantu Ketua mengetahui kesiapan
                    aktivitas yang terdapat dalam event.
                </p>

            </div>


            <div class="info-card">

                <div class="info-icon">
                    JD
                </div>

                <h3>Evaluasi Jadwal</h3>

                <p>
                    Jadwal dan rundown dapat digunakan sebagai dasar
                    pemantauan kesiapan pelaksanaan event.
                </p>

            </div>

        </div>


        <div class="report-note">
            <strong>Informasi:</strong>
            Laporan ini merupakan ringkasan data sistem untuk membantu
            Ketua EO dalam melakukan monitoring dan evaluasi kegiatan event.
        </div>

    </div>

</x-layouts.eo>