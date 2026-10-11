<x-layouts.eo :user="$user" title="Detail Tugas Panitia">

<style>
    .task-page {
        padding: 28px 32px 50px;
        color: #1f2937;
    }

    .task-breadcrumb {
        font-size: 13px;
        color: #64748b;
        margin-bottom: 8px;
    }

    .task-breadcrumb a {
        color: #059669;
        text-decoration: none;
        font-weight: 600;
    }

    .task-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 28px;
    }

    .task-title {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #111827;
    }

    .task-subtitle {
        margin-top: 7px;
        font-size: 14px;
        color: #64748b;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: white;
        color: #374151;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
    }

    .back-button:hover {
        background: #f8fafc;
        border-color: #9ca3af;
    }

    .task-grid {
        display: grid;
        grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr);
        gap: 22px;
    }

    .task-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .05);
    }

    .task-card-title {
        margin: 0 0 18px;
        font-size: 17px;
        font-weight: 750;
        color: #111827;
    }

    .task-main-title {
        font-size: 23px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .task-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
    }

    .status {
        display: inline-flex;
        align-items: center;
        padding: 7px 13px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-waiting {
        background: #f1f5f9;
        color: #475569;
    }

    .status-working {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status-done {
        background: #d1fae5;
        color: #047857;
    }

    .section-label {
        display: block;
        margin-bottom: 8px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: #94a3b8;
    }

    .description {
        margin-top: 22px;
        padding: 16px;
        background: #f8fafc;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.7;
        color: #475569;
        border: 1px solid #eef2f7;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
        margin-top: 20px;
    }

    .info-box {
        padding: 15px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #fff;
    }

    .info-value {
        font-size: 14px;
        font-weight: 700;
        color: #334155;
    }

    .full-width {
        grid-column: 1 / -1;
    }

    .person-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding-bottom: 18px;
        border-bottom: 1px solid #eef2f7;
    }

    .person-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #d1fae5;
        color: #047857;
        font-size: 20px;
        font-weight: 800;
    }

    .person-name {
        font-size: 16px;
        font-weight: 800;
        color: #111827;
    }

    .person-label {
        font-size: 11px;
        color: #94a3b8;
        text-transform: uppercase;
        letter-spacing: .05em;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .person-info {
        margin-top: 20px;
    }

    .person-row {
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .person-row:last-child {
        border-bottom: 0;
    }

    .monitor-card {
        margin-top: 22px;
    }

    .monitor-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .monitor-note {
        padding: 8px 12px;
        border-radius: 9px;
        background: #fffbeb;
        color: #b45309;
        font-size: 12px;
        font-weight: 700;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        overflow: hidden;
        border-radius: 999px;
        background: #e5e7eb;
    }

    .progress-fill {
        height: 100%;
        border-radius: 999px;
        transition: width .3s;
    }

    .progress-gray {
        background: #94a3b8;
    }

    .progress-blue {
        background: #3b82f6;
    }

    .progress-green {
        background: #10b981;
    }

    .timeline {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-top: 24px;
    }

    .timeline-item {
        padding: 17px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #f8fafc;
    }

    .timeline-item.active-gray {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .timeline-item.active-blue {
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .timeline-item.active-green {
        background: #ecfdf5;
        border-color: #a7f3d0;
    }

    .timeline-number {
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
        text-transform: uppercase;
    }

    .timeline-title {
        margin-top: 5px;
        font-size: 14px;
        font-weight: 800;
        color: #334155;
    }

    .timeline-desc {
        margin-top: 5px;
        font-size: 12px;
        line-height: 1.5;
        color: #64748b;
    }

    .note-card {
        margin-top: 22px;
    }

    .note-content {
        padding: 15px;
        background: #f8fafc;
        border: 1px solid #eef2f7;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.7;
        color: #475569;
    }

    .alert {
        padding: 13px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-success {
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }

    .alert-error {
        background: #fef2f2;
        color: #b91c1c;
        border: 1px solid #fecaca;
    }

    @media (max-width: 900px) {
        .task-grid {
            grid-template-columns: 1fr;
        }

        .timeline {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .task-page {
            padding: 20px 16px 40px;
        }

        .task-header,
        .monitor-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .full-width {
            grid-column: auto;
        }

        .task-top {
            flex-direction: column;
        }
    }
</style>

@php
    $status = $tugasPanitia->status;

    $statusLabel = match($status) {
        'belum_dimulai' => 'Belum Dimulai',
        'sedang_dikerjakan' => 'Sedang Dikerjakan',
        'selesai' => 'Selesai',
        default => ucfirst(str_replace('_', ' ', $status)),
    };

    $progress = match($status) {
        'belum_dimulai' => 0,
        'sedang_dikerjakan' => 50,
        'selesai' => 100,
        default => 0,
    };
@endphp

<div class="task-page">

    {{-- Header --}}
    <div class="task-header">

        <div>
            <div class="task-breadcrumb">
                <a href="{{ route('eo.panitia.tugas.index') }}">
                    Tugas Panitia
                </a>
                <span> / Detail Tugas</span>
            </div>

            <h1 class="task-title">
                Detail Tugas Panitia
            </h1>

            <p class="task-subtitle">
                Informasi tugas dan monitoring progres panitia.
            </p>
        </div>

        <a href="{{ route('eo.panitia.tugas.index') }}"
           class="back-button">
            <span>&lt;</span>
            Kembali
        </a>

    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Terjadi kesalahan:</strong>

            <ul style="margin:6px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Detail utama --}}
    <div class="task-grid">

        {{-- Detail tugas --}}
        <div class="task-card">

            <div class="task-top">

                <div>
                    <span class="section-label">
                        Judul Tugas
                    </span>

                    <h2 class="task-main-title">
                        {{ $tugasPanitia->judul_tugas }}
                    </h2>
                </div>

                <span class="status
                    {{ $status === 'selesai'
                        ? 'status-done'
                        : ($status === 'sedang_dikerjakan'
                            ? 'status-working'
                            : 'status-waiting') }}">
                    {{ $statusLabel }}
                </span>

            </div>

            {{-- Deskripsi --}}
            <div style="margin-top:22px;">
                <span class="section-label">
                    Deskripsi
                </span>

                <div class="description">
                    {{ $tugasPanitia->deskripsi ?: 'Tidak ada deskripsi tugas.' }}
                </div>
            </div>

            {{-- Informasi --}}
            <div class="info-grid">

                <div class="info-box">
                    <span class="section-label">
                        Tanggal
                    </span>

                    <div class="info-value">
                        {{ optional($tugasPanitia->tanggal)->format('d F Y') }}
                    </div>
                </div>

                <div class="info-box">
                    <span class="section-label">
                        Waktu
                    </span>

                    <div class="info-value">
                        {{ $tugasPanitia->jam_mulai ?: '-' }}

                        @if($tugasPanitia->jam_selesai)
                            - {{ $tugasPanitia->jam_selesai }}
                        @endif
                    </div>
                </div>

                <div class="info-box full-width">
                    <span class="section-label">
                        Lokasi
                    </span>

                    <div class="info-value">
                        {{ $tugasPanitia->lokasi ?: 'Lokasi belum ditentukan' }}
                    </div>
                </div>

            </div>

        </div>

        {{-- Penanggung jawab --}}
        <div class="task-card">

            <h2 class="task-card-title">
                Penanggung Jawab
            </h2>

            <div class="person-header">

                <div class="person-icon">
                    P
                </div>

                <div>
                    <div class="person-label">
                        Panitia
                    </div>

                    <div class="person-name">
                        {{ $tugasPanitia->eventPanitia?->panitia?->nama ?? 'Panitia' }}
                    </div>
                </div>

            </div>

            <div class="person-info">

                <div class="person-row">
                    <div class="person-label">
                        Divisi
                    </div>

                    <div class="info-value">
                        {{ $tugasPanitia->eventPanitia?->divisi?->nama_divisi
                            ?? $tugasPanitia->eventPanitia?->panitia?->divisi
                            ?? '-' }}
                    </div>
                </div>

                <div class="person-row">
                    <div class="person-label">
                        Event
                    </div>

                    <div class="info-value">
                        {{ $tugasPanitia->eventPanitia?->event?->nama_event ?? '-' }}
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Monitoring --}}
    <div class="task-card monitor-card">

        <div class="monitor-header">

            <div>
                <h2 class="task-card-title" style="margin-bottom:4px;">
                    Monitoring Status
                </h2>

                <div style="font-size:13px;color:#64748b;">
                    Status diperbarui oleh panitia melalui QR Panitia.
                </div>
            </div>

            <div class="monitor-note">
                EO hanya memantau
            </div>

        </div>

        {{-- Progress --}}
        <div style="margin-top:24px;">

            <div class="progress-info">
                <span>Progress Tugas</span>
                <span>{{ $progress }}%</span>
            </div>

            <div class="progress-bar">
                <div class="progress-fill
                    {{ $status === 'selesai'
                        ? 'progress-green'
                        : ($status === 'sedang_dikerjakan'
                            ? 'progress-blue'
                            : 'progress-gray') }}"
                    style="width: {{ $progress }}%;">
                </div>
            </div>

        </div>

        {{-- Timeline --}}
        <div class="timeline">

            <div class="timeline-item
                {{ $status === 'belum_dimulai'
                    ? 'active-gray'
                    : ($status !== 'belum_dimulai' ? 'active-green' : '') }}">

                <div class="timeline-number">
                    Tahap 1
                </div>

                <div class="timeline-title">
                    Belum Dimulai
                </div>

                <div class="timeline-desc">
                    Tugas menunggu untuk dikerjakan.
                </div>

            </div>

            <div class="timeline-item
                {{ in_array($status, ['sedang_dikerjakan', 'selesai'])
                    ? 'active-blue'
                    : '' }}">

                <div class="timeline-number">
                    Tahap 2
                </div>

                <div class="timeline-title">
                    Sedang Dikerjakan
                </div>

                <div class="timeline-desc">
                    Panitia sedang menjalankan tugas.
                </div>

            </div>

            <div class="timeline-item
                {{ $status === 'selesai'
                    ? 'active-green'
                    : '' }}">

                <div class="timeline-number">
                    Tahap 3
                </div>

                <div class="timeline-title">
                    Selesai
                </div>

                <div class="timeline-desc">
                    Tugas telah diselesaikan panitia.
                </div>

            </div>

        </div>

    </div>

    {{-- Catatan --}}
    <div class="task-card note-card">

        <h2 class="task-card-title">
            Catatan Panitia
        </h2>

        <div class="note-content">
            {{ $tugasPanitia->catatan_panitia ?: 'Belum ada catatan dari panitia.' }}
        </div>

    </div>

</div>

</x-layouts.eo>
