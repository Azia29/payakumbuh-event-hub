<x-layouts.eo :user="$user" title="Rundown Event">

<style>
    .rundown-page {
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

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border-radius: 9px;
        background: #16a34a;
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s;
        white-space: nowrap;
    }

    .btn-primary:hover {
        background: #15803d;
        transform: translateY(-1px);
    }

    .statistics {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .stat-value {
        color: #1f2937;
        font-size: 27px;
        font-weight: 700;
    }

    .content-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .content-header {
        padding: 20px 22px;
        border-bottom: 1px solid #e5e7eb;
    }

    .content-header h2 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
    }

    .content-header p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    .rundown-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 950px;
    }

    .rundown-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        padding: 13px 16px;
        border-bottom: 1px solid #e5e7eb;
        white-space: nowrap;
    }

    .rundown-table td {
        padding: 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 13px;
        vertical-align: middle;
    }

    .rundown-table tbody tr:hover {
        background: #fafafa;
    }

    .number {
        color: #64748b;
        font-weight: 600;
    }

    .event-name {
        color: #1f2937;
        font-weight: 700;
    }

    .activity-name {
        color: #334155;
        font-weight: 600;
    }

    .muted {
        color: #64748b;
    }

    .status {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 999px;
        font-size: 11px;
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

    .actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 10px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #e2e8f0;
        background: #fff;
        color: #475569;
        transition: .2s;
    }

    .btn-action:hover {
        background: #f8fafc;
    }

    .btn-delete {
        border: 1px solid #fecaca;
        background: #fff;
        color: #dc2626;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #fef2f2;
    }

    .empty-state {
        text-align: center;
        padding: 55px 20px;
        color: #64748b;
    }

    .empty-state strong {
        display: block;
        color: #334155;
        font-size: 16px;
        margin-bottom: 5px;
    }

    @media (max-width: 900px) {
        .statistics {
            grid-template-columns: 1fr;
        }

        .page-header {
            flex-direction: column;
        }
    }

    @media (max-width: 640px) {
        .rundown-page {
            padding: 0 16px 24px;
        }

        .page-header h1 {
            font-size: 22px;
        }
    }
</style>

<div class="rundown-page">

    <div class="page-header">
        <div>
            <h1>Rundown Event</h1>
            <p>
                Kelola susunan kegiatan, waktu, lokasi, dan penanggung jawab event.
            </p>
        </div>

        <a href="{{ route('eo.rundown.create') }}" class="btn-primary">
            <span>+</span>
            Tambah Rundown
        </a>
    </div>

    <div class="statistics">

        <div class="stat-card">
            <div class="stat-label">Total Rundown</div>
            <div class="stat-value">{{ $rundowns->count() }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Terjadwal</div>
            <div class="stat-value">
                {{ $rundowns->where('status', 'terjadwal')->count() }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Selesai</div>
            <div class="stat-value">
                {{ $rundowns->where('status', 'selesai')->count() }}
            </div>
        </div>

    </div>

    <div class="content-card">

        <div class="content-header">
            <h2>Daftar Rundown</h2>
            <p>
                Susunan kegiatan event yang telah dibuat.
            </p>
        </div>

        @if($rundowns->count())

            <div class="table-wrapper">

                <table class="rundown-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Event</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Penanggung Jawab</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($rundowns as $index => $rundown)

                            <tr>

                                <td class="number">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <div class="event-name">
                                        {{ $rundown->event->nama_event ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="activity-name">
                                        {{ $rundown->nama_kegiatan ?? $rundown->judul ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $rundown->tanggal
                                        ? \Carbon\Carbon::parse($rundown->tanggal)->translatedFormat('d M Y')
                                        : '-' }}
                                </td>

                                <td>
                                    @if($rundown->jam_mulai || $rundown->jam_selesai)
                                        {{ $rundown->jam_mulai ?? '-' }}
                                        @if($rundown->jam_selesai)
                                            - {{ $rundown->jam_selesai }}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>

                                <td class="muted">
                                    {{ $rundown->lokasi ?? '-' }}
                                </td>

                                <td>
                                    {{ $rundown->penanggung_jawab ?? $rundown->pic ?? '-' }}
                                </td>

                                <td>
                                    @php
                                        $status = strtolower($rundown->status ?? 'draft');

                                        $statusClass = match ($status) {
                                            'terjadwal' => 'status-terjadwal',
                                            'berlangsung' => 'status-berlangsung',
                                            'selesai' => 'status-selesai',
                                            default => 'status-draft',
                                        };
                                    @endphp

                                    <span class="status {{ $statusClass }}">
                                        {{ str_replace('_', ' ', $status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('eo.rundown.show', $rundown) }}"
                                            class="btn-action"
                                        >
                                            Lihat
                                        </a>

                                        <a
                                            href="{{ route('eo.rundown.edit', $rundown) }}"
                                            class="btn-action"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('eo.rundown.destroy', $rundown) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus rundown ini?');"
                                            style="display:inline;"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-action btn-delete"
                                            >
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">
                <strong>Belum ada rundown</strong>
                <span>Silakan tambahkan rundown untuk event yang sedang dikelola.</span>
            </div>

        @endif

    </div>

</div>

</x-layouts.eo>