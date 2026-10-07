<x-layouts.eo :user="$user" title="Monitoring Kegiatan">

    <style>
        .monitoring-page {
            padding: 30px;
            background: #f8fafc;
            min-height: calc(100vh - 92px);
        }

        .monitoring-hero {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #047857 0%, #059669 55%, #10b981 100%);
            border-radius: 22px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
            box-shadow: 0 12px 30px rgba(5, 150, 105, .16);
        }

        .monitoring-hero::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            right: -50px;
            top: -70px;
            border: 35px solid rgba(255,255,255,.08);
            border-radius: 50%;
        }

        .monitoring-hero h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 800;
            position: relative;
            z-index: 1;
        }

        .monitoring-hero p {
            margin: 0;
            font-size: 13px;
            line-height: 1.7;
            opacity: .92;
            max-width: 680px;
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-block;
            margin-bottom: 13px;
            padding: 6px 11px;
            border-radius: 999px;
            background: rgba(255,255,255,.15);
            border: 1px solid rgba(255,255,255,.18);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .7px;
            position: relative;
            z-index: 1;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 17px;
            padding: 21px;
            box-shadow: 0 5px 18px rgba(15,23,42,.045);
        }

        .stat-card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 17px;
        }

        .stat-title {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ecfdf5;
            color: #047857;
            font-size: 11px;
            font-weight: 800;
        }

        .stat-number {
            color: #0f172a;
            font-size: 29px;
            line-height: 1;
            font-weight: 800;
        }

        .stat-description {
            margin-top: 8px;
            color: #94a3b8;
            font-size: 11px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.45fr .85fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .panel {
            background: #ffffff;
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
            font-size: 12px;
        }

        .monitoring-list {
            padding: 8px 22px 18px;
        }

        .monitoring-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .monitoring-item:last-child {
            border-bottom: 0;
        }

        .item-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 11px;
            background: #f0fdf4;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .item-info {
            flex: 1;
        }

        .item-title {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
        }

        .item-description {
            margin-top: 4px;
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        .item-value {
            color: #047857;
            font-size: 17px;
            font-weight: 800;
        }

        .division-list {
            padding: 7px 22px 18px;
        }

        .division-item {
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .division-item:last-child {
            border-bottom: 0;
        }

        .division-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .division-name {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
        }

        .division-count {
            color: #047857;
            font-size: 11px;
            font-weight: 800;
        }

        .progress {
            height: 7px;
            background: #f1f5f9;
            border-radius: 99px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 65%;
            background: linear-gradient(90deg, #059669, #10b981);
            border-radius: 99px;
        }

        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: #64748b;
        }

        .empty-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 12px;
            border-radius: 14px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .monitoring-info {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 20px;
        }

        .info-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 19px;
        }

        .info-card-title {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .info-card-text {
            color: #64748b;
            font-size: 11px;
            line-height: 1.6;
        }

        @media(max-width:900px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .monitoring-info {
                grid-template-columns: 1fr;
            }
        }

        @media(max-width:600px) {
            .monitoring-page {
                padding: 18px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .monitoring-hero {
                padding: 23px;
            }

            .monitoring-hero h1 {
                font-size: 23px;
            }
        }
    </style>

    @php
        $totalEventValue = $totalEvent ?? 0;
        $eventAktifValue = $eventAktif ?? 0;
        $totalPanitiaValue = $totalPanitia ?? 0;
        $totalKegiatanValue = $totalKegiatan ?? 0;
        $totalRundownValue = $totalRundown ?? 0;
        $totalJadwalValue = $totalJadwal ?? 0;
        $divisions = $divisiStats ?? collect();
    @endphp

    <div class="monitoring-page">

        <div class="monitoring-hero">

            <div class="hero-label">
                MONITORING EO KETUA
            </div>

            <h1>Monitoring Kegiatan</h1>

            <p>
                Pantau perkembangan seluruh event, panitia, kegiatan,
                rundown, jadwal, dan struktur divisi EO dalam satu halaman.
            </p>

        </div>


        {{-- STATISTIK UTAMA --}}

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-title">Total Event</span>
                    <div class="stat-icon">EV</div>
                </div>

                <div class="stat-number">
                    {{ $totalEventValue }}
                </div>

                <div class="stat-description">
                    Seluruh event yang terdaftar
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-title">Event Aktif</span>
                    <div class="stat-icon">AK</div>
                </div>

                <div class="stat-number">
                    {{ $eventAktifValue }}
                </div>

                <div class="stat-description">
                    Event aktif, berlangsung, atau disetujui
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-card-top">
                    <span class="stat-title">Total Panitia</span>
                    <div class="stat-icon">PN</div>
                </div>

                <div class="stat-number">
                    {{ $totalPanitiaValue }}
                </div>

                <div class="stat-description">
                    Anggota panitia yang terdaftar
                </div>
            </div>

        </div>


        {{-- MONITORING DETAIL --}}

        <div class="content-grid">

            <div class="panel">

                <div class="panel-header">
                    <h2>Ikhtisar Kegiatan</h2>
                    <p>Data utama yang sedang dipantau oleh Ketua EO.</p>
                </div>

                <div class="monitoring-list">

                    <div class="monitoring-item">
                        <div class="item-icon">KG</div>

                        <div class="item-info">
                            <div class="item-title">Total Kegiatan</div>
                            <div class="item-description">
                                Jumlah kegiatan yang terdapat dalam seluruh event.
                            </div>
                        </div>

                        <div class="item-value">
                            {{ $totalKegiatanValue }}
                        </div>
                    </div>


                    <div class="monitoring-item">
                        <div class="item-icon">RD</div>

                        <div class="item-info">
                            <div class="item-title">Total Rundown</div>
                            <div class="item-description">
                                Rundown kegiatan yang telah dibuat.
                            </div>
                        </div>

                        <div class="item-value">
                            {{ $totalRundownValue }}
                        </div>
                    </div>


                    <div class="monitoring-item">
                        <div class="item-icon">JD</div>

                        <div class="item-info">
                            <div class="item-title">Total Jadwal</div>
                            <div class="item-description">
                                Jadwal kegiatan event yang tersedia.
                            </div>
                        </div>

                        <div class="item-value">
                            {{ $totalJadwalValue }}
                        </div>
                    </div>

                </div>

            </div>


            {{-- DIVISI --}}

            <div class="panel">

                <div class="panel-header">
                    <h2>Struktur Divisi EO</h2>
                    <p>Distribusi akun berdasarkan divisi.</p>
                </div>

                <div class="division-list">

                    @if($divisions instanceof \Illuminate\Support\Collection && $divisions->count())

                        @foreach($divisions as $division)

                            @php
                                $divisionName = $division->nama_divisi
                                    ?? $division->divisi
                                    ?? 'Divisi';

                                $divisionCount = $division->jumlah
                                    ?? $division->total
                                    ?? $division->count
                                    ?? 0;
                            @endphp

                            <div class="division-item">

                                <div class="division-top">
                                    <span class="division-name">
                                        {{ $divisionName }}
                                    </span>

                                    <span class="division-count">
                                        {{ $divisionCount }} akun
                                    </span>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar"></div>
                                </div>

                            </div>

                        @endforeach

                    @else

                        <div class="empty-state">
                            <div class="empty-icon">DV</div>

                            <strong style="color:#0f172a;">
                                Data divisi belum tersedia
                            </strong>

                            <div style="margin-top:6px;">
                                Informasi divisi akan muncul ketika data tersedia.
                            </div>
                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- INFORMASI --}}

        <div class="monitoring-info">

            <div class="info-card">
                <div class="info-card-title">
                    Monitoring Event
                </div>

                <div class="info-card-text">
                    Ketua dapat memantau jumlah event dan kondisi pelaksanaan
                    kegiatan secara keseluruhan.
                </div>
            </div>


            <div class="info-card">
                <div class="info-card-title">
                    Monitoring Panitia
                </div>

                <div class="info-card-text">
                    Data panitia membantu Ketua melihat kesiapan sumber daya
                    yang terlibat dalam event.
                </div>
            </div>


            <div class="info-card">
                <div class="info-card-title">
                    Monitoring Jadwal
                </div>

                <div class="info-card-text">
                    Rundown dan jadwal menjadi bagian penting untuk memastikan
                    kegiatan berjalan sesuai rencana.
                </div>
            </div>

        </div>

    </div>

</x-layouts.eo>