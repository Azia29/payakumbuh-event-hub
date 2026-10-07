<x-layouts.eo :user="$user" title="Dashboard Ketua">

    <style>
        .ketua-page {
            padding: 32px;
            background: #f8fafc;
            min-height: calc(100vh - 80px);
        }

        .ketua-hero {
            background: linear-gradient(135deg, #047857 0%, #059669 55%, #10b981 100%);
            border-radius: 20px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
            box-shadow: 0 12px 30px rgba(5, 150, 105, .15);
        }

        .ketua-hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .ketua-hero h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -.5px;
        }

        .ketua-hero p {
            margin: 0;
            font-size: 14px;
            line-height: 1.7;
            opacity: .92;
            max-width: 650px;
        }

        .ketua-badge {
            background: rgba(255,255,255,.16);
            border: 1px solid rgba(255,255,255,.22);
            padding: 9px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .section-title {
            margin: 28px 0 14px;
        }

        .section-title h2 {
            margin: 0;
            color: #0f172a;
            font-size: 18px;
            font-weight: 800;
        }

        .section-title p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .05);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ecfdf5;
            color: #047857;
            font-size: 13px;
            font-weight: 800;
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 600;
        }

        .stat-value {
            color: #0f172a;
            font-size: 30px;
            line-height: 1;
            font-weight: 800;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .quick-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px;
            text-decoration: none;
            display: block;
            transition: .2s ease;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .04);
        }

        .quick-card:hover {
            transform: translateY(-3px);
            border-color: #86efac;
            box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
        }

        .quick-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #f0fdf4;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .quick-card h3 {
            margin: 0 0 6px;
            color: #0f172a;
            font-size: 15px;
            font-weight: 800;
        }

        .quick-card p {
            margin: 0;
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 18px;
            margin-top: 18px;
        }

        .panel {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, .04);
            overflow: hidden;
        }

        .panel-header {
            padding: 20px 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .panel-header h3 {
            margin: 0;
            color: #0f172a;
            font-size: 16px;
            font-weight: 800;
        }

        .panel-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 12px;
        }

        .event-list {
            padding: 4px 22px 18px;
        }

        .event-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .event-item:last-child {
            border-bottom: 0;
        }

        .event-name {
            color: #0f172a;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .event-meta {
            color: #64748b;
            font-size: 12px;
        }

        .status-badge {
            background: #ecfdf5;
            color: #047857;
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .empty-state {
            padding: 35px 20px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        .empty-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-size: 12px;
            font-weight: 800;
        }

        .responsibility {
            padding: 20px 22px;
        }

        .responsibility-item {
            display: flex;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .responsibility-item:last-child {
            border-bottom: 0;
        }

        .number {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 8px;
            background: #ecfdf5;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .responsibility strong {
            display: block;
            color: #0f172a;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .responsibility span {
            color: #64748b;
            font-size: 11px;
            line-height: 1.5;
        }

        @media (max-width: 900px) {
            .stats-grid,
            .quick-grid {
                grid-template-columns: 1fr;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .ketua-hero-top {
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .ketua-page {
                padding: 18px;
            }

            .ketua-hero {
                padding: 22px;
            }

            .ketua-hero h1 {
                font-size: 23px;
            }
        }
    </style>

    <div class="ketua-page">

        {{-- HERO --}}
        <div class="ketua-hero">
            <div class="ketua-hero-top">
                <div>
                    <h1>Selamat Datang, EO Ketua</h1>
                    <p>
                        Dashboard utama untuk mengontrol, memantau,
                        dan mengoordinasikan seluruh kegiatan Event Hub Payakumbuh.
                    </p>
                </div>

                <div class="ketua-badge">
                    Ketua EO
                </div>
            </div>
        </div>

        {{-- STATISTIK --}}
        <div class="section-title">
            <h2>Ringkasan Kegiatan</h2>
            <p>Informasi singkat mengenai kondisi event saat ini.</p>
        </div>

        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Total Event</span>
                    <div class="stat-icon">EV</div>
                </div>

                <div class="stat-value">
                    {{ $totalEvent ?? 0 }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Event Aktif</span>
                    <div class="stat-icon">AK</div>
                </div>

                <div class="stat-value">
                    {{ $eventAktif ?? 0 }}
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-label">Event Selesai</span>
                    <div class="stat-icon">SL</div>
                </div>

                <div class="stat-value">
                    {{ $eventSelesai ?? 0 }}
                </div>
            </div>

        </div>

        {{-- AKSI CEPAT --}}
        <div class="section-title">
            <h2>Aksi Cepat</h2>
            <p>Akses menu utama yang paling sering digunakan Ketua EO.</p>
        </div>

        <div class="quick-grid">

            <a href="{{ url('/eo/events/create') }}" class="quick-card">
                <div class="quick-icon">EV</div>
                <h3>Buat Event</h3>
                <p>Membuat dan memasukkan data event baru ke dalam sistem.</p>
            </a>

            <a href="{{ url('/eo/panitia') }}" class="quick-card">
                <div class="quick-icon">PN</div>
                <h3>Kelola Panitia</h3>
                <p>Mengelola anggota panitia dan pembagian tugas event.</p>
            </a>

            <a href="{{ url('/eo/events') }}" class="quick-card">
                <div class="quick-icon">MN</div>
                <h3>Monitoring Event</h3>
                <p>Melihat perkembangan dan status event yang sedang berjalan.</p>
            </a>

        </div>

        {{-- EVENT + TANGGUNG JAWAB --}}
        <div class="content-grid">

            <div class="panel">

                <div class="panel-header">
                    <h3>Event Terbaru</h3>
                    <p>Daftar event yang baru ditambahkan ke sistem.</p>
                </div>

                <div class="event-list">

                    @if(isset($eventTerbaru) && $eventTerbaru->count() > 0)

                        @foreach($eventTerbaru as $event)

                            <div class="event-item">

                                <div>
                                    <div class="event-name">
                                        {{ $event->nama_event }}
                                    </div>

                                    <div class="event-meta">
                                        {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                                        @if($event->tgl_mulai)
                                            · {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y') }}
                                        @endif
                                    </div>
                                </div>

                                <span class="status-badge">
                                    {{ ucfirst($event->status ?? 'Draft') }}
                                </span>

                            </div>

                        @endforeach

                    @else

                        <div class="empty-state">
                            <div class="empty-icon">EV</div>
                            <strong>Belum ada event</strong>
                            <div style="margin-top:5px;">
                                Event yang dibuat akan muncul di bagian ini.
                            </div>
                        </div>

                    @endif

                </div>

            </div>

            <div class="panel">

                <div class="panel-header">
                    <h3>Tanggung Jawab Ketua</h3>
                    <p>Fokus utama pengelolaan EO.</p>
                </div>

                <div class="responsibility">

                    <div class="responsibility-item">
                        <div class="number">01</div>
                        <div>
                            <strong>Koordinasi Event</strong>
                            <span>Mengawasi seluruh kegiatan event dari awal sampai selesai.</span>
                        </div>
                    </div>

                    <div class="responsibility-item">
                        <div class="number">02</div>
                        <div>
                            <strong>Koordinasi Panitia</strong>
                            <span>Memastikan setiap bidang panitia menjalankan tugasnya.</span>
                        </div>
                    </div>

                    <div class="responsibility-item">
                        <div class="number">03</div>
                        <div>
                            <strong>Monitoring</strong>
                            <span>Memantau status dan perkembangan setiap event.</span>
                        </div>
                    </div>

                    <div class="responsibility-item">
                        <div class="number">04</div>
                        <div>
                            <strong>Laporan</strong>
                            <span>Melihat hasil dan ringkasan pelaksanaan kegiatan.</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.eo>