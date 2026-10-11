<x-layouts.eo :user="$user" title="Detail Rundown">

<style>
    .detail-page {
        padding: 0 28px 32px;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-header h1 {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .actions {
        display: flex;
        gap: 9px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 10px 16px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
    }

    .btn:hover {
        background: #f8fafc;
    }

    .btn-primary {
        background: #16a34a;
        border-color: #16a34a;
        color: #fff;
    }

    .btn-primary:hover {
        background: #15803d;
    }

    .grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
    }

    .card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(15,23,42,.05);
        overflow: hidden;
    }

    .card-header {
        padding: 18px 22px;
        border-bottom: 1px solid #e5e7eb;
    }

    .card-header h2 {
        margin: 0;
        font-size: 17px;
        color: #1f2937;
    }

    .card-body {
        padding: 22px;
    }

    .event {
        color: #16a34a;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .rundown-name {
        color: #1f2937;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .description {
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .info {
        display: grid;
    }

    .info-row {
        display: grid;
        grid-template-columns: 140px 1fr;
        gap: 15px;
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .label {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .value {
        color: #334155;
        font-size: 13px;
        font-weight: 500;
    }

    .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #475569;
        font-size: 11px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .location {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        padding: 14px;
        color: #475569;
        font-size: 13px;
    }

    @media (max-width: 900px) {
        .grid {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
        }
    }

    @media (max-width: 600px) {
        .detail-page {
            padding: 0 16px 24px;
        }

        .actions {
            width: 100%;
        }

        .btn {
            flex: 1;
            justify-content: center;
        }

        .info-row {
            grid-template-columns: 1fr;
            gap: 5px;
        }
    }
</style>

<div class="detail-page">

    <div class="page-header">

        <div>
            <h1>Detail Rundown</h1>
            <p>Informasi lengkap mengenai kegiatan event.</p>
        </div>

        <div class="actions">

            <a href="{{ route('eo.rundown.index') }}" class="btn">
                Kembali
            </a>

            <a href="{{ route('eo.rundown.edit', $rundown) }}" class="btn btn-primary">
                Edit Rundown
            </a>

        </div>

    </div>

    <div class="grid">

        <div class="card">

            <div class="card-header">
                <h2>Informasi Kegiatan</h2>
            </div>

            <div class="card-body">

                <div class="event">
                    {{ $rundown->event->nama_event ?? 'Event tidak tersedia' }}
                </div>

                <div class="rundown-name">
                    {{ $rundown->nama_rundown ?? '-' }}
                </div>

                <div class="description">
                    {{ $rundown->deskripsi ?? 'Tidak ada deskripsi kegiatan.' }}
                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <h2>Status</h2>
            </div>

            <div class="card-body">

                <div class="info">

                    <div class="info-row">
                        <div class="label">Status</div>
                        <div class="value">
                            <span class="status">
                                {{ ucfirst(str_replace('_', ' ', $rundown->status ?? 'draft')) }}
                            </span>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="label">Penanggung Jawab</div>
                        <div class="value">
                            {{ $rundown->penanggung_jawab ?? '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <h2>Waktu Pelaksanaan</h2>
            </div>

            <div class="card-body">

                <div class="info">

                    <div class="info-row">
                        <div class="label">Tanggal</div>
                        <div class="value">
                            @if($rundown->tanggal)
                                {{ \Carbon\Carbon::parse($rundown->tanggal)->translatedFormat('d F Y') }}
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="label">Waktu Mulai</div>
                        <div class="value">
                            {{ $rundown->waktu_mulai ?? '-' }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="label">Waktu Selesai</div>
                        <div class="value">
                            {{ $rundown->waktu_selesai ?? '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header">
                <h2>Lokasi Kegiatan</h2>
            </div>

            <div class="card-body">

                <div class="location">
                    {{ $rundown->lokasi ?? '-' }}
                </div>

                <div class="info" style="margin-top:10px;">

                    <div class="info-row">
                        <div class="label">Latitude</div>
                        <div class="value">
                            {{ $rundown->latitude ?? '-' }}
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="label">Longitude</div>
                        <div class="value">
                            {{ $rundown->longitude ?? '-' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-layouts.eo>