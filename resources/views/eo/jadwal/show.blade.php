<x-layouts.eo :user="$user" title="Detail Jadwal">

<style>
    .jadwal-page {
        max-width: 1100px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .page-title {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
    }

    .page-description {
        margin: 6px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .header-actions {
        display: flex;
        gap: 10px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid transparent;
        cursor: pointer;
    }

    .btn-back {
        background: #ffffff;
        color: #475569;
        border-color: #e2e8f0;
    }

    .btn-edit {
        background: #0f766e;
        color: #ffffff;
    }

    .detail-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .detail-card-header {
        padding: 22px 24px;
        border-bottom: 1px solid #e5e7eb;
    }

    .event-label {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 6px;
    }

    .event-name {
        margin: 0;
        color: #1f2937;
        font-size: 21px;
        font-weight: 700;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .detail-item {
        padding: 20px 24px;
        border-bottom: 1px solid #eef2f7;
    }

    .detail-item:nth-child(odd) {
        border-right: 1px solid #eef2f7;
    }

    .detail-label {
        display: block;
        margin-bottom: 7px;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .detail-value {
        color: #1f2937;
        font-size: 15px;
        line-height: 1.6;
        word-break: break-word;
    }

    .status {
        display: inline-flex;
        padding: 6px 11px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .status-draft {
        background: #f1f5f9;
        color: #475569;
    }

    .status-terjadwal {
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

    .description-box {
        padding: 24px;
        background: #f8fafc;
        border-top: 1px solid #e5e7eb;
    }

    .description-title {
        margin: 0 0 8px;
        font-size: 14px;
        font-weight: 700;
        color: #334155;
    }

    .description-text {
        margin: 0;
        color: #64748b;
        line-height: 1.7;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn {
            flex: 1;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-item:nth-child(odd) {
            border-right: 0;
        }
    }
</style>

<div class="jadwal-page">

    <div class="page-header">
        <div>
            <h1 class="page-title">Detail Jadwal</h1>
            <p class="page-description">
                Informasi lengkap jadwal kegiatan event.
            </p>
        </div>

        <div class="header-actions">
            <a href="{{ route('eo.jadwal.index') }}" class="btn btn-back">
                Kembali
            </a>

            <a href="{{ route('eo.jadwal.edit', $jadwal) }}" class="btn btn-edit">
                Edit Jadwal
            </a>
        </div>
    </div>

    <div class="detail-card">

        <div class="detail-card-header">
            <div class="event-label">Event</div>

            <h2 class="event-name">
                {{ $jadwal->event->nama_event ?? 'Event tidak tersedia' }}
            </h2>
        </div>

        <div class="detail-grid">

            <div class="detail-item">
                <span class="detail-label">Nama Jadwal</span>
                <div class="detail-value">
                    {{ $jadwal->nama_jadwal ?? '-' }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Tanggal</span>
                <div class="detail-value">
                    {{ $jadwal->tanggal ? \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') : '-' }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Waktu</span>
                <div class="detail-value">
                    {{ $jadwal->waktu_mulai ?? '-' }}

                    @if($jadwal->waktu_selesai)
                        - {{ $jadwal->waktu_selesai }}
                    @endif
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Lokasi</span>
                <div class="detail-value">
                    {{ $jadwal->lokasi ?? '-' }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Penanggung Jawab</span>
                <div class="detail-value">
                    {{ $jadwal->penanggung_jawab ?? '-' }}
                </div>
            </div>

            <div class="detail-item">
                <span class="detail-label">Status</span>

                @php
                    $status = strtolower($jadwal->status ?? 'draft');
                    $statusClass = match($status) {
                        'terjadwal' => 'status-terjadwal',
                        'berlangsung' => 'status-berlangsung',
                        'selesai' => 'status-selesai',
                        default => 'status-draft',
                    };
                @endphp

                <span class="status {{ $statusClass }}">
                    {{ str_replace('_', ' ', $status) }}
                </span>
            </div>

        </div>

        <div class="description-box">
            <h3 class="description-title">Keterangan</h3>

            <p class="description-text">
                {{ $jadwal->keterangan ?: 'Tidak ada keterangan untuk jadwal ini.' }}
            </p>
        </div>

    </div>

</div>

</x-layouts.eo>
