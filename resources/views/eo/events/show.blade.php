<x-layouts.eo :user="$user" title="Detail Event">

<style>
    .event-detail-page {
        padding: 10px 4px 40px;
    }

    .event-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 24px;
    }

    .event-header-left {
        flex: 1;
    }

    .event-breadcrumb {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
    }

    .event-breadcrumb span {
        color: #0f766e;
        font-weight: 600;
    }

    .event-title {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
        line-height: 1.2;
        color: #0f172a;
    }

    .event-subtitle {
        margin-top: 8px;
        font-size: 14px;
        color: #64748b;
    }

    .event-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .event-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 0 17px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        border: 1px solid transparent;
        transition: all .2s ease;
        cursor: pointer;
    }

    .event-btn-primary {
        background: #047857;
        color: white;
        box-shadow: 0 4px 10px rgba(4,120,87,.15);
    }

    .event-btn-primary:hover {
        background: #065f46;
        transform: translateY(-1px);
    }

    .event-btn-secondary {
        background: white;
        color: #334155;
        border-color: #e2e8f0;
    }

    .event-btn-secondary:hover {
        background: #f8fafc;
    }

    .event-main-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 20px;
        align-items: start;
    }

    .event-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        box-shadow: 0 4px 18px rgba(15,23,42,.05);
        overflow: hidden;
    }

    .event-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .event-card-title {
        margin: 0;
        color: #0f172a;
        font-size: 17px;
        font-weight: 800;
    }

    .event-card-subtitle {
        margin-top: 4px;
        color: #94a3b8;
        font-size: 12px;
    }

    .event-card-body {
        padding: 22px;
    }

    .event-name-box {
        padding: 20px;
        border-radius: 15px;
        background: linear-gradient(135deg, #ecfdf5, #f0fdfa);
        border: 1px solid #ccfbf1;
        margin-bottom: 22px;
    }

    .event-name-label {
        font-size: 11px;
        font-weight: 800;
        color: #0f766e;
        text-transform: uppercase;
        letter-spacing: .08em;
    }

    .event-name {
        margin-top: 6px;
        font-size: 25px;
        line-height: 1.3;
        font-weight: 800;
        color: #0f172a;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 12px;
        border-radius: 999px;
        background: #fef3c7;
        color: #92400e;
        font-size: 12px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f59e0b;
    }

    .info-section {
        margin-top: 22px;
    }

    .info-label {
        margin-bottom: 9px;
        color: #475569;
        font-size: 13px;
        font-weight: 800;
    }

    .description-box {
        padding: 16px;
        border-radius: 12px;
        background: #f8fafc;
        color: #475569;
        font-size: 14px;
        line-height: 1.7;
        border: 1px solid #eef2f7;
        white-space: pre-line;
    }

    .location-box {
        display: flex;
        gap: 13px;
        align-items: flex-start;
        padding: 16px;
        border: 1px solid #e2e8f0;
        border-radius: 13px;
        background: #ffffff;
    }

    .location-icon {
        width: 40px;
        height: 40px;
        flex: 0 0 40px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ecfdf5;
        color: #047857;
        font-size: 19px;
    }

    .location-text {
        color: #334155;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
    }

    .coordinate-text {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 11px;
    }

    .date-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .date-card {
        padding: 17px;
        border-radius: 13px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    .date-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #e0f2fe;
        color: #0369a1;
        margin-bottom: 12px;
        font-size: 16px;
    }

    .date-label {
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
    }

    .date-value {
        margin-top: 5px;
        color: #0f172a;
        font-size: 14px;
        font-weight: 800;
        line-height: 1.5;
    }

    .side-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        box-shadow: 0 4px 18px rgba(15,23,42,.05);
        overflow: hidden;
    }

    .summary-header {
        padding: 20px;
        background: linear-gradient(135deg, #047857, #0f766e);
        color: white;
    }

    .summary-header-title {
        font-size: 17px;
        font-weight: 800;
    }

    .summary-header-text {
        margin-top: 5px;
        font-size: 12px;
        color: #d1fae5;
    }

    .summary-body {
        padding: 18px;
    }

    .summary-item {
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .summary-item:last-child {
        border-bottom: 0;
    }

    .summary-label {
        color: #94a3b8;
        font-size: 11px;
        font-weight: 700;
    }

    .summary-value {
        margin-top: 4px;
        color: #1e293b;
        font-size: 14px;
        font-weight: 800;
    }

    .map-card {
        margin-top: 20px;
    }

    .map-frame {
        width: 100%;
        height: 280px;
        border: 0;
        display: block;
    }

    .map-footer {
        padding: 15px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-top: 1px solid #eef2f7;
    }

    .map-coordinates {
        color: #64748b;
        font-size: 11px;
        line-height: 1.6;
    }

    .maps-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 12px;
        border-radius: 9px;
        background: #eff6ff;
        color: #1d4ed8;
        text-decoration: none;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .maps-link:hover {
        background: #dbeafe;
    }

    .rejection-card {
        margin-top: 20px;
        padding: 18px;
        border: 1px solid #fecaca;
        border-radius: 15px;
        background: #fef2f2;
    }

    .rejection-title {
        color: #b91c1c;
        font-size: 14px;
        font-weight: 800;
    }

    .rejection-text {
        margin-top: 7px;
        color: #7f1d1d;
        font-size: 13px;
        line-height: 1.6;
    }

    @media (max-width: 1000px) {
        .event-main-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 700px) {
        .event-header {
            flex-direction: column;
        }

        .event-title {
            font-size: 25px;
        }

        .event-actions {
            width: 100%;
        }

        .event-btn {
            flex: 1;
        }

        .date-grid {
            grid-template-columns: 1fr;
        }

        .map-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="event-detail-page">

    {{-- HEADER --}}
    <div class="event-header">

        <div class="event-header-left">
            <div class="event-breadcrumb">
                Kelola Event
                <span> / Detail Event</span>
            </div>

            <h1 class="event-title">
                Detail Event
            </h1>

            <p class="event-subtitle">
                Lihat informasi lengkap dan lokasi event yang telah dibuat.
            </p>
        </div>

        <div class="event-actions">

            <a href="{{ route('eo.events.index') }}"
               class="event-btn event-btn-secondary">
                ← Kembali
            </a>

            <a href="{{ route('eo.events.edit', $event) }}"
               class="event-btn event-btn-primary">
                ✎ Edit Event
            </a>

        </div>

    </div>


    {{-- MAIN CONTENT --}}
    <div class="event-main-grid">

        {{-- LEFT --}}
        <div>

            <div class="event-card">

                <div class="event-card-header">
                    <div>
                        <h2 class="event-card-title">
                            Informasi Event
                        </h2>

                        <p class="event-card-subtitle">
                            Detail kegiatan yang sedang dikelola.
                        </p>
                    </div>

                    <div class="status-badge">
                        <span class="status-dot"></span>
                        {{ ucfirst($event->status ?? 'Draft') }}
                    </div>
                </div>

                <div class="event-card-body">

                    {{-- NAMA EVENT --}}
                    <div class="event-name-box">

                        <div class="event-name-label">
                            Nama Event
                        </div>

                        <div class="event-name">
                            {{ $event->nama_event }}
                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="info-section">

                        <div class="info-label">
                            Deskripsi Event
                        </div>

                        <div class="description-box">
                            {{ $event->deskripsi_event ?: 'Belum ada deskripsi untuk event ini.' }}
                        </div>

                    </div>


                    {{-- LOKASI --}}
                    <div class="info-section">

                        <div class="info-label">
                            Lokasi Event
                        </div>

                        <div class="location-box">

                            <div class="location-icon">
                                📍
                            </div>

                            <div>
                                <div class="location-text">
                                    {{ $event->lokasi_event ?: 'Lokasi belum ditentukan.' }}
                                </div>

                                @if($event->latitude !== null && $event->longitude !== null)

                                    <div class="coordinate-text">
                                        Koordinat:
                                        {{ $event->latitude }},
                                        {{ $event->longitude }}
                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- TANGGAL --}}
                    <div class="info-section">

                        <div class="info-label">
                            Jadwal Pelaksanaan
                        </div>

                        <div class="date-grid">

                            <div class="date-card">

                                <div class="date-icon">
                                    📅
                                </div>

                                <div class="date-label">
                                    TANGGAL MULAI
                                </div>

                                <div class="date-value">
                                    {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d F Y') }}
                                </div>

                                <div class="date-label" style="margin-top:5px;">
                                    {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('H:i') }} WIB
                                </div>

                            </div>


                            <div class="date-card">

                                <div class="date-icon">
                                    🏁
                                </div>

                                <div class="date-label">
                                    TANGGAL SELESAI
                                </div>

                                <div class="date-value">
                                    {{ \Carbon\Carbon::parse($event->tgl_selesai)->format('d F Y') }}
                                </div>

                                <div class="date-label" style="margin-top:5px;">
                                    {{ \Carbon\Carbon::parse($event->tgl_selesai)->format('H:i') }} WIB
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- MAP --}}
            @if($event->latitude !== null && $event->longitude !== null)

                <div class="event-card map-card">

                    <div class="event-card-header">

                        <div>
                            <h2 class="event-card-title">
                                Lokasi Event
                            </h2>

                            <p class="event-card-subtitle">
                                Posisi lokasi event berdasarkan koordinat.
                            </p>
                        </div>

                    </div>

                    <iframe
                        class="map-frame"
                        src="https://www.openstreetmap.org/export/embed.html?bbox={{ $event->longitude - 0.01 }},{{ $event->latitude - 0.01 }},{{ $event->longitude + 0.01 }},{{ $event->latitude + 0.01 }}&layer=mapnik&marker={{ $event->latitude }},{{ $event->longitude }}"
                        loading="lazy">
                    </iframe>

                    <div class="map-footer">

                        <div class="map-coordinates">
                            <strong>Latitude:</strong> {{ $event->latitude }}<br>
                            <strong>Longitude:</strong> {{ $event->longitude }}
                        </div>

                        <a
                            href="https://www.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="maps-link">
                            🗺 Buka Google Maps
                        </a>

                    </div>

                </div>

            @endif


            {{-- PENOLAKAN --}}
            @if($event->alasan_penolakan)

                <div class="rejection-card">

                    <div class="rejection-title">
                        ⚠ Alasan Penolakan
                    </div>

                    <div class="rejection-text">
                        {{ $event->alasan_penolakan }}
                    </div>

                </div>

            @endif

        </div>


        {{-- RIGHT SIDEBAR --}}
        <div>

            <div class="side-card">

                <div class="summary-header">

                    <div class="summary-header-title">
                        Ringkasan Event
                    </div>

                    <div class="summary-header-text">
                        Informasi singkat event
                    </div>

                </div>

                <div class="summary-body">

                    <div class="summary-item">

                        <div class="summary-label">
                            ID EVENT
                        </div>

                        <div class="summary-value">
                            #{{ $event->id }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            STATUS
                        </div>

                        <div class="summary-value">
                            {{ ucfirst($event->status ?? 'Draft') }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            LOKASI
                        </div>

                        <div class="summary-value">
                            {{ \Illuminate\Support\Str::limit($event->lokasi_event ?? '-', 45) }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            DIBUAT
                        </div>

                        <div class="summary-value">
                            {{ $event->created_at?->format('d M Y') ?? '-' }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            TERAKHIR DIPERBARUI
                        </div>

                        <div class="summary-value">
                            {{ $event->updated_at?->format('d M Y') ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- QUICK ACTION --}}
            <div class="side-card" style="margin-top:20px;">

                <div class="event-card-header">
                    <div>
                        <h2 class="event-card-title">
                            Aksi Cepat
                        </h2>

                        <p class="event-card-subtitle">
                            Kelola event ini.
                        </p>
                    </div>
                </div>

                <div style="padding:18px; display:grid; gap:10px;">

                    <a href="{{ route('eo.events.edit', $event) }}"
                       class="event-btn event-btn-primary">
                        ✎ Edit Event
                    </a>

                    <a href="{{ route('eo.events.index') }}"
                       class="event-btn event-btn-secondary">
                        ← Kembali ke Event
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-layouts.eo>