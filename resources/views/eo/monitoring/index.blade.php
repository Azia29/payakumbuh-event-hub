<x-layouts.eo :user="$user" title="Monitoring Kegiatan">

<style>
    .monitoring-page {
        max-width: 1200px;
        margin: 0 auto;
    }

    .page-header {
        margin-bottom: 26px;
    }

    .page-title {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
    }

    .page-description {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .section {
        margin-bottom: 28px;
    }

    .section-header {
        margin-bottom: 14px;
    }

    .section-title {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
    }

    .section-description {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    /* =========================
       STATISTIK
    ========================= */

    .stat-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .stat-label {
        font-size: 13px;
        color: #64748b;
        font-weight: 600;
    }

    .stat-number {
        margin-top: 8px;
        font-size: 30px;
        line-height: 1;
        font-weight: 700;
        color: #1f2937;
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        background: #ecfdf5;
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 700;
    }

    /* =========================
       PROGRESS
    ========================= */

    .progress-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .progress-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .progress-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .progress-number {
        margin: 8px 0 14px;
        color: #1f2937;
        font-size: 28px;
        font-weight: 700;
    }

    .progress-bar {
        height: 7px;
        width: 100%;
        background: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: #059669;
        border-radius: 999px;
    }

    /* =========================
       EVENT
    ========================= */

    .event-list {
        display: grid;
        gap: 15px;
    }

    .event-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .event-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
    }

    .event-title {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #1f2937;
    }

    .event-meta {
        margin-top: 6px;
        color: #64748b;
        font-size: 13px;
        line-height: 1.5;
    }

    .status {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .status-draft {
        background: #f1f5f9;
        color: #475569;
    }

    .status-aktif {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status-berlangsung {
        background: #fef3c7;
        color: #92400e;
    }

    .status-selesai {
        background: #dcfce7;
        color: #166534;
    }

    .event-progress {
        margin-top: 20px;
    }

    .event-progress-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 7px;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
    }

    .event-progress-percent {
        color: #1f2937;
    }

    .event-progress-bar {
        height: 8px;
        background: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
    }

    .event-progress-fill {
        height: 100%;
        background: #059669;
        border-radius: 999px;
    }

    .event-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 18px;
    }

    .summary-item {
        padding: 12px;
        background: #f8fafc;
        border-radius: 9px;
        border: 1px solid #f1f5f9;
    }

    .summary-label {
        display: block;
        color: #94a3b8;
        font-size: 11px;
        margin-bottom: 4px;
    }

    .summary-value {
        color: #334155;
        font-size: 14px;
        font-weight: 700;
    }

    /* =========================
       JADWAL
    ========================= */

    .schedule-list {
        display: grid;
        gap: 12px;
    }

    .schedule-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 17px 19px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .schedule-main {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
    }

    .schedule-event {
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        margin-bottom: 4px;
    }

    .schedule-name {
        margin: 0;
        color: #1f2937;
        font-size: 15px;
        font-weight: 700;
    }

    .schedule-detail {
        margin-top: 8px;
        display: flex;
        flex-wrap: wrap;
        gap: 8px 18px;
        color: #64748b;
        font-size: 12px;
    }

    /* =========================
       PANITIA
    ========================= */

    .panitia-list {
        display: grid;
        gap: 12px;
    }

    .panitia-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 17px 19px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .panitia-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .panitia-name {
        margin: 0;
        color: #1f2937;
        font-size: 15px;
        font-weight: 700;
    }

    .panitia-event {
        margin-top: 4px;
        color: #64748b;
        font-size: 12px;
    }

    .division {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 7px;
        background: #f1f5f9;
        color: #475569;
        font-size: 11px;
        font-weight: 700;
    }

    .panitia-bottom {
        margin-top: 16px;
    }

    .panitia-stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 7px;
        color: #64748b;
        font-size: 12px;
    }

    .panitia-progress {
        height: 7px;
        background: #e5e7eb;
        border-radius: 999px;
        overflow: hidden;
    }

    .panitia-progress-fill {
        height: 100%;
        background: #059669;
        border-radius: 999px;
    }

    .empty {
        padding: 28px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        text-align: center;
        color: #94a3b8;
        font-size: 13px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {
        .stat-grid,
        .progress-grid {
            grid-template-columns: 1fr;
        }

        .event-summary {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .event-header,
        .schedule-main,
        .panitia-top {
            flex-direction: column;
            align-items: flex-start;
        }

        .event-summary {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>


<div class="monitoring-page">

    {{-- HEADER --}}

    <div class="page-header">

        <h1 class="page-title">
            Monitoring Kegiatan
        </h1>

        <p class="page-description">
            Pantau perkembangan event, kegiatan, tugas panitia,
            jadwal, dan pelaksanaan event dalam satu halaman.
        </p>

    </div>


    {{-- =====================================================
         STATISTIK UTAMA
    ====================================================== --}}

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Statistik Utama
            </h2>

            <p class="section-description">
                Ringkasan kondisi event dan panitia.
            </p>

        </div>


        <div class="stat-grid">

            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Total Event
                        </div>

                        <div class="stat-number">
                            {{ $totalEvent }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        EV
                    </div>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Event Aktif
                        </div>

                        <div class="stat-number">
                            {{ $eventAktif }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        AK
                    </div>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-top">

                    <div>
                        <div class="stat-label">
                            Total Panitia
                        </div>

                        <div class="stat-number">
                            {{ $totalPanitia }}
                        </div>
                    </div>

                    <div class="stat-icon">
                        PN
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PROGRESS KEGIATAN
    ====================================================== --}}

    @php
        $totalKegiatan =
            $kegiatanBelumDimulai +
            $kegiatanBerjalan +
            $kegiatanSelesai;

        $persenKegiatanBelum = $totalKegiatan > 0
            ? round(($kegiatanBelumDimulai / $totalKegiatan) * 100)
            : 0;

        $persenKegiatanBerjalan = $totalKegiatan > 0
            ? round(($kegiatanBerjalan / $totalKegiatan) * 100)
            : 0;

        $persenKegiatanSelesai = $totalKegiatan > 0
            ? round(($kegiatanSelesai / $totalKegiatan) * 100)
            : 0;


        $totalTugas =
            $tugasBelumDimulai +
            $tugasSedangDikerjakan +
            $tugasSelesai;

        $persenTugasBelum = $totalTugas > 0
            ? round(($tugasBelumDimulai / $totalTugas) * 100)
            : 0;

        $persenTugasBerjalan = $totalTugas > 0
            ? round(($tugasSedangDikerjakan / $totalTugas) * 100)
            : 0;

        $persenTugasSelesai = $totalTugas > 0
            ? round(($tugasSelesai / $totalTugas) * 100)
            : 0;
    @endphp


    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Progress Kegiatan
            </h2>

            <p class="section-description">
                Kondisi kegiatan berdasarkan status rundown.
            </p>

        </div>


        <div class="progress-grid">

            <div class="progress-card">

                <div class="progress-label">
                    Belum Dimulai
                </div>

                <div class="progress-number">
                    {{ $kegiatanBelumDimulai }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenKegiatanBelum }}%"
                    ></div>
                </div>

            </div>


            <div class="progress-card">

                <div class="progress-label">
                    Sedang Berjalan
                </div>

                <div class="progress-number">
                    {{ $kegiatanBerjalan }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenKegiatanBerjalan }}%"
                    ></div>
                </div>

            </div>


            <div class="progress-card">

                <div class="progress-label">
                    Selesai
                </div>

                <div class="progress-number">
                    {{ $kegiatanSelesai }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenKegiatanSelesai }}%"
                    ></div>
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         PROGRESS TUGAS PANITIA
    ====================================================== --}}

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Progress Tugas Panitia
            </h2>

            <p class="section-description">
                Status tugas yang diperbarui panitia melalui QR Code.
            </p>

        </div>


        <div class="progress-grid">

            <div class="progress-card">

                <div class="progress-label">
                    Belum Dimulai
                </div>

                <div class="progress-number">
                    {{ $tugasBelumDimulai }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenTugasBelum }}%"
                    ></div>
                </div>

            </div>


            <div class="progress-card">

                <div class="progress-label">
                    Sedang Dikerjakan
                </div>

                <div class="progress-number">
                    {{ $tugasSedangDikerjakan }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenTugasBerjalan }}%"
                    ></div>
                </div>

            </div>


            <div class="progress-card">

                <div class="progress-label">
                    Selesai
                </div>

                <div class="progress-number">
                    {{ $tugasSelesai }}
                </div>

                <div class="progress-bar">
                    <div
                        class="progress-fill"
                        style="width: {{ $persenTugasSelesai }}%"
                    ></div>
                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         EVENT YANG DIMONITOR
    ====================================================== --}}

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Event yang Dimonitor
            </h2>

            <p class="section-description">
                Perkembangan setiap event yang sedang dikelola.
            </p>

        </div>


        <div class="event-list">

            @forelse($eventMonitoring as $item)

                @php
                    $event = $item['event'];

                    $status = strtolower(
                        $event->status ?? 'draft'
                    );

                    $statusClass = match ($status) {
                        'aktif' => 'status-aktif',
                        'berlangsung' => 'status-berlangsung',
                        'selesai' => 'status-selesai',
                        default => 'status-draft',
                    };
                @endphp


                <div class="event-card">

                    <div class="event-header">

                        <div>

                            <h3 class="event-title">
                                {{ $event->nama_event }}
                            </h3>

                            <div class="event-meta">

                                {{ $event->tgl_mulai
                                    ? \Carbon\Carbon::parse(
                                        $event->tgl_mulai
                                    )->translatedFormat('d F Y')
                                    : 'Tanggal belum ditentukan'
                                }}

                                @if($event->lokasi_event)
                                    &nbsp; · &nbsp;
                                    {{ $event->lokasi_event }}
                                @endif

                            </div>

                        </div>


                        <span class="status {{ $statusClass }}">
                            {{ str_replace('_', ' ', $status) }}
                        </span>

                    </div>


                    <div class="event-progress">

                        <div class="event-progress-head">

                            <span>
                                Progress Tugas
                            </span>

                            <span class="event-progress-percent">
                                {{ $item['progress'] }}%
                            </span>

                        </div>


                        <div class="event-progress-bar">

                            <div
                                class="event-progress-fill"
                                style="width: {{ $item['progress'] }}%"
                            ></div>

                        </div>

                    </div>


                    <div class="event-summary">

                        <div class="summary-item">

                            <span class="summary-label">
                                Rundown
                            </span>

                            <span class="summary-value">
                                {{ $item['total_rundown'] }}
                            </span>

                        </div>


                        <div class="summary-item">

                            <span class="summary-label">
                                Jadwal
                            </span>

                            <span class="summary-value">
                                {{ $item['total_jadwal'] }}
                            </span>

                        </div>


                        <div class="summary-item">

                            <span class="summary-label">
                                Panitia
                            </span>

                            <span class="summary-value">
                                {{ $item['total_panitia'] }}
                            </span>

                        </div>


                        <div class="summary-item">

                            <span class="summary-label">
                                Tugas Selesai
                            </span>

                            <span class="summary-value">
                                {{ $item['tugas_selesai'] }}
                                /
                                {{ $item['total_tugas'] }}
                            </span>

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty">
                    Belum ada event yang dapat dimonitor.
                </div>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         JADWAL TERDEKAT
    ====================================================== --}}

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Jadwal Terdekat
            </h2>

            <p class="section-description">
                Jadwal kegiatan yang telah dibuat oleh EO.
            </p>

        </div>


        <div class="schedule-list">

            @forelse($jadwals as $jadwal)

                @php
                    $status = strtolower(
                        $jadwal->status ?? 'draft'
                    );

                    $statusClass = match ($status) {
                        'aktif' => 'status-aktif',
                        'berlangsung' => 'status-berlangsung',
                        'selesai' => 'status-selesai',
                        default => 'status-draft',
                    };
                @endphp


                <div class="schedule-card">

                    <div class="schedule-main">

                        <div>

                            <div class="schedule-event">
                                {{ $jadwal->event->nama_event ?? 'Event tidak tersedia' }}
                            </div>

                            <h3 class="schedule-name">
                                {{ $jadwal->nama_jadwal ?? '-' }}
                            </h3>

                            <div class="schedule-detail">

                                <span>
                                    {{ $jadwal->tanggal
                                        ? \Carbon\Carbon::parse(
                                            $jadwal->tanggal
                                        )->translatedFormat('d F Y')
                                        : 'Tanggal belum ditentukan'
                                    }}
                                </span>

                                <span>
                                    {{ $jadwal->waktu_mulai ?? '-' }}

                                    @if($jadwal->waktu_selesai)
                                        - {{ $jadwal->waktu_selesai }}
                                    @endif
                                </span>

                                <span>
                                    {{ $jadwal->lokasi ?? 'Lokasi belum ditentukan' }}
                                </span>

                            </div>

                        </div>


                        <span class="status {{ $statusClass }}">
                            {{ str_replace('_', ' ', $status) }}
                        </span>

                    </div>

                </div>

            @empty

                <div class="empty">
                    Belum ada jadwal kegiatan.
                </div>

            @endforelse

        </div>

    </div>


    {{-- =====================================================
         MONITORING PANITIA
    ====================================================== --}}

    <div class="section">

        <div class="section-header">

            <h2 class="section-title">
                Monitoring Panitia
            </h2>

            <p class="section-description">
                Pantau jumlah dan perkembangan tugas masing-masing panitia.
            </p>

        </div>


        <div class="panitia-list">

            @forelse($monitoringPanitia as $item)

                <div class="panitia-card">

                    <div class="panitia-top">

                        <div>

                            <h3 class="panitia-name">
                                {{ $item['panitia']->nama }}
                            </h3>

                            <div class="panitia-event">
                                {{ $item['panitia']->event->nama_event ?? 'Event tidak tersedia' }}
                            </div>

                        </div>


                        <span class="division">
                            {{ $item['panitia']->divisi ?? 'Belum ditentukan' }}
                        </span>

                    </div>


                    <div class="panitia-bottom">

                        <div class="panitia-stats">

                            <span>
                                {{ $item['total_tugas'] }} Tugas
                                ·
                                {{ $item['tugas_selesai'] }} Selesai
                            </span>

                            <strong>
                                {{ $item['progress'] }}%
                            </strong>

                        </div>


                        <div class="panitia-progress">

                            <div
                                class="panitia-progress-fill"
                                style="width: {{ $item['progress'] }}%"
                            ></div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="empty">
                    Belum ada data panitia.
                </div>

            @endforelse

        </div>

    </div>

</div>

</x-layouts.eo>