<x-layouts.eo :user="$user" title="Laporan Event">

<style>
    .laporan-page {
        padding: 30px;
        background: #f8fafc;
        min-height: calc(100vh - 80px);
    }

    .laporan-hero {
        position: relative;
        overflow: hidden;
        padding: 30px;
        border-radius: 22px;
        background: linear-gradient(135deg, #047857, #059669, #10b981);
        color: white;
        margin-bottom: 22px;
        box-shadow: 0 12px 30px rgba(5,150,105,.15);
    }

    .laporan-hero::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        right: -80px;
        top: -100px;
        border: 40px solid rgba(255,255,255,.08);
        border-radius: 50%;
    }

    .hero-badge {
        display: inline-flex;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(255,255,255,.15);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .7px;
        margin-bottom: 12px;
    }

    .laporan-hero h1 {
        margin: 0 0 8px;
        font-size: 30px;
        font-weight: 800;
    }

    .laporan-hero p {
        margin: 0;
        max-width: 700px;
        font-size: 13px;
        line-height: 1.7;
        opacity: .92;
    }

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 17px;
        padding: 20px;
        box-shadow: 0 5px 18px rgba(15,23,42,.045);
    }

    .stat-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-label {
        color: #64748b;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ecfdf5;
        color: #047857;
        font-size: 10px;
        font-weight: 800;
    }

    .stat-value {
        margin-top: 17px;
        font-size: 29px;
        font-weight: 800;
        color: #0f172a;
    }

    .stat-desc {
        margin-top: 7px;
        color: #94a3b8;
        font-size: 10px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1.3fr .7fr;
        gap: 18px;
        margin-bottom: 18px;
    }

    .card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        box-shadow: 0 5px 18px rgba(15,23,42,.045);
        overflow: hidden;
    }

    .card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e2e8f0;
    }

    .card-header h2 {
        margin: 0;
        color: #0f172a;
        font-size: 17px;
        font-weight: 800;
    }

    .card-header p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 11px;
    }

    .summary {
        padding: 8px 22px 18px;
    }

    .summary-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .summary-item:last-child {
        border-bottom: 0;
    }

    .summary-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .summary-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #f0fdf4;
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        font-weight: 800;
    }

    .summary-title {
        color: #334155;
        font-size: 12px;
        font-weight: 700;
    }

    .summary-desc {
        color: #94a3b8;
        font-size: 10px;
        margin-top: 3px;
    }

    .summary-value {
        color: #047857;
        font-size: 17px;
        font-weight: 800;
    }

    .focus {
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
        justify-content: center;
        align-items: center;
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
        line-height: 1.6;
    }

    .event-card {
        margin-bottom: 18px;
    }

    .table-wrap {
        overflow-x: auto;
    }

    .event-table {
        width: 100%;
        border-collapse: collapse;
    }

    .event-table th {
        padding: 14px 18px;
        background: #f8fafc;
        color: #64748b;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .4px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .event-table td {
        padding: 16px 18px;
        color: #475569;
        font-size: 11px;
        border-bottom: 1px solid #f1f5f9;
    }

    .event-table tr:last-child td {
        border-bottom: 0;
    }

    .event-table tbody tr:hover {
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
        padding: 6px 10px;
        border-radius: 999px;
        background: #ecfdf5;
        color: #047857;
        font-size: 9px;
        font-weight: 800;
    }

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

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
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

    .note {
        margin-top: 18px;
        padding: 15px 18px;
        border-radius: 14px;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1e40af;
        font-size: 10px;
        line-height: 1.7;
    }

    @media(max-width:1000px) {
        .stat-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .content-grid {
            grid-template-columns: 1fr;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:600px) {
        .laporan-page {
            padding: 18px;
        }

        .stat-grid {
            grid-template-columns: 1fr;
        }

        .laporan-hero {
            padding: 23px;
        }

        .laporan-hero h1 {
            font-size: 24px;
        }
    }
</style>

@php
    $totalEventValue = $totalEvent ?? 0;
    $eventAktifValue = $eventAktif ?? 0;
    $totalRundownValue = $totalRundown ?? 0;
    $totalJadwalValue = $totalJadwal ?? 0;
    $totalKegiatanValue = $totalKegiatan ?? 0;

    $eventData = $events ?? $eventTerbaru ?? collect();
@endphp

<div class="laporan-page">

    <div class="laporan-hero">
        <div class="hero-badge">LAPORAN EO KETUA</div>

        <h1>Laporan Event</h1>

        <p>
            Ringkasan dan rekapitulasi data event untuk membantu Ketua EO
            memantau perkembangan kegiatan, jadwal, rundown, dan aktivitas
            yang berjalan dalam sistem.
        </p>
    </div>


    <div class="stat-grid">

        <div class="stat-card">
            <div class="stat-head">
                <span class="stat-label">Total Event</span>
                <div class="stat-icon">EV</div>
            </div>

            <div class="stat-value">{{ $totalEventValue }}</div>

            <div class="stat-desc">
                Seluruh event terdaftar
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-head">
                <span class="stat-label">Event Aktif</span>
                <div class="stat-icon">AK</div>
            </div>

            <div class="stat-value">{{ $eventAktifValue }}</div>

            <div class="stat-desc">
                Event aktif atau berlangsung
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-head">
                <span class="stat-label">Kegiatan</span>
                <div class="stat-icon">KG</div>
            </div>

            <div class="stat-value">{{ $totalKegiatanValue }}</div>

            <div class="stat-desc">
                Kegiatan dalam event
            </div>
        </div>


        <div class="stat-card">
            <div class="stat-head">
                <span class="stat-label">Jadwal</span>
                <div class="stat-icon">JD</div>
            </div>

            <div class="stat-value">{{ $totalJadwalValue }}</div>

            <div class="stat-desc">
                Jadwal kegiatan
            </div>
        </div>

    </div>


    <div class="content-grid">

        <div class="card">

            <div class="card-header">
                <h2>Ringkasan Sistem</h2>
                <p>Rekapitulasi data utama pada sistem Event Hub.</p>
            </div>

            <div class="summary">

                <div class="summary-item">
                    <div class="summary-left">
                        <div class="summary-icon">EV</div>
                        <div>
                            <div class="summary-title">Total Event</div>
                            <div class="summary-desc">Seluruh event yang terdaftar</div>
                        </div>
                    </div>
                    <div class="summary-value">{{ $totalEventValue }}</div>
                </div>

                <div class="summary-item">
                    <div class="summary-left">
                        <div class="summary-icon">AK</div>
                        <div>
                            <div class="summary-title">Event Aktif</div>
                            <div class="summary-desc">Event aktif atau berlangsung</div>
                        </div>
                    </div>
                    <div class="summary-value">{{ $eventAktifValue }}</div>
                </div>

                <div class="summary-item">
                    <div class="summary-left">
                        <div class="summary-icon">KG</div>
                        <div>
                            <div class="summary-title">Total Kegiatan</div>
                            <div class="summary-desc">Kegiatan yang terdapat dalam event</div>
                        </div>
                    </div>
                    <div class="summary-value">{{ $totalKegiatanValue }}</div>
                </div>

                <div class="summary-item">
                    <div class="summary-left">
                        <div class="summary-icon">RD</div>
                        <div>
                            <div class="summary-title">Total Rundown</div>
                            <div class="summary-desc">Rundown yang telah dibuat</div>
                        </div>
                    </div>
                    <div class="summary-value">{{ $totalRundownValue }}</div>
                </div>

                <div class="summary-item">
                    <div class="summary-left">
                        <div class="summary-icon">JD</div>
                        <div>
                            <div class="summary-title">Total Jadwal</div>
                            <div class="summary-desc">Jadwal kegiatan event</div>
                        </div>
                    </div>
                    <div class="summary-value">{{ $totalJadwalValue }}</div>
                </div>

            </div>

        </div>


        <div class="card">

            <div class="card-header">
                <h2>Fokus Evaluasi</h2>
                <p>Aspek yang diperhatikan Ketua EO.</p>
            </div>

            <div class="focus">

                <div class="focus-item">
                    <div class="focus-number">01</div>
                    <div>
                        <strong>Event</strong>
                        <span>Memantau jumlah dan kondisi event.</span>
                    </div>
                </div>

                <div class="focus-item">
                    <div class="focus-number">02</div>
                    <div>
                        <strong>Kegiatan</strong>
                        <span>Melihat aktivitas dalam setiap event.</span>
                    </div>
                </div>

                <div class="focus-item">
                    <div class="focus-number">03</div>
                    <div>
                        <strong>Rundown</strong>
                        <span>Memastikan susunan kegiatan tersedia.</span>
                    </div>
                </div>

                <div class="focus-item">
                    <div class="focus-number">04</div>
                    <div>
                        <strong>Jadwal</strong>
                        <span>Memantau kesiapan jadwal pelaksanaan.</span>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <div class="card event-card">

        <div class="card-header">
            <h2>Rekapitulasi Event</h2>
            <p>Daftar event yang tersedia dalam sistem.</p>
        </div>

        @if($eventData instanceof \Illuminate\Support\Collection && $eventData->count())

            <div class="table-wrap">

                <table class="event-table">

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
                                <td>{{ $index + 1 }}</td>

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
                                    {{ $event->tgl_mulai
                                        ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y')
                                        : '-' }}
                                </td>

                                <td>
                                    {{ $event->tgl_selesai
                                        ? \Carbon\Carbon::parse($event->tgl_selesai)->format('d M Y')
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

            </div>

        @else

            <div class="empty">
                <div class="empty-icon">EV</div>

                <div class="empty-title">
                    Belum ada data event
                </div>

                <div class="empty-text">
                    Rekapitulasi event akan muncul setelah data event tersedia.
                </div>
            </div>

        @endif

    </div>


    <div class="info-grid">

        <div class="info-card">
            <div class="info-icon">EV</div>

            <h3>Evaluasi Event</h3>

            <p>
                Gunakan data laporan untuk mengetahui perkembangan
                event secara keseluruhan.
            </p>
        </div>


        <div class="info-card">
            <div class="info-icon">KG</div>

            <h3>Evaluasi Kegiatan</h3>

            <p>
                Data kegiatan membantu Ketua melihat aktivitas
                yang terdapat pada setiap event.
            </p>
        </div>


        <div class="info-card">
            <div class="info-icon">JD</div>

            <h3>Evaluasi Jadwal</h3>

            <p>
                Jadwal dan rundown menjadi bagian penting dalam
                pemantauan kesiapan pelaksanaan event.
            </p>
        </div>

    </div>


    <div class="note">
        <strong>Catatan:</strong>
        Laporan digunakan sebagai ringkasan informasi untuk membantu
        Ketua EO melakukan monitoring dan evaluasi kegiatan.
    </div>

</div>

</x-layouts.eo>