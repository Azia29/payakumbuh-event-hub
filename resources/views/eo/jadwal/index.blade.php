<x-layouts.eo :user="$user" title="Jadwal Event">

<style>
    .jadwal-page {
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
        max-width: 700px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 17px;
        border-radius: 9px;
        background: #16a34a;
        border: 1px solid #16a34a;
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        white-space: nowrap;
        transition: .2s;
    }

    .btn-primary:hover {
        background: #15803d;
        border-color: #15803d;
        transform: translateY(-1px);
    }

    .statistics {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        padding: 19px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .stat-label {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .stat-value {
        color: #1f2937;
        font-size: 26px;
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
        width: 100%;
        overflow-x: auto;
    }

    .jadwal-table {
        width: 100%;
        min-width: 1050px;
        border-collapse: collapse;
    }

    .jadwal-table th {
        padding: 13px 15px;
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .jadwal-table td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 13px;
        vertical-align: middle;
    }

    .jadwal-table tbody tr:hover {
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

    .jadwal-name {
        color: #334155;
        font-weight: 600;
    }

    .muted {
        color: #64748b;
    }

    .date {
        color: #334155;
        font-weight: 600;
        white-space: nowrap;
    }

    .time {
        white-space: nowrap;
        color: #475569;
    }

    .location {
        max-width: 230px;
        line-height: 1.5;
    }

    .pic {
        color: #475569;
        font-weight: 600;
    }

    .status {
        display: inline-flex;
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
        white-space: nowrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 7px 10px;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        background: #fff;
        color: #475569;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .btn-action:hover {
        background: #f8fafc;
    }

    .btn-delete {
        color: #dc2626;
        border-color: #fecaca;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #fef2f2;
    }

    .empty-state {
        padding: 55px 20px;
        text-align: center;
        color: #64748b;
    }

    .empty-state strong {
        display: block;
        margin-bottom: 6px;
        color: #334155;
        font-size: 16px;
    }

    @media (max-width: 1000px) {
        .statistics {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 700px) {
        .jadwal-page {
            padding: 0 16px 24px;
        }

        .page-header {
            flex-direction: column;
        }

        .statistics {
            grid-template-columns: 1fr;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

<div class="jadwal-page">

    <div class="page-header">

        <div>
            <h1>Jadwal Event</h1>

            <p>
                Kelola waktu, tempat, dan penanggung jawab setiap kegiatan
                dalam pelaksanaan event Payakumbuh Event Hub.
            </p>
        </div>

        <a
            href="{{ route('eo.jadwal.create') }}"
            class="btn-primary"
        >
            + Tambah Jadwal
        </a>

    </div>

    <div class="statistics">

        <div class="stat-card">
            <div class="stat-label">Total Jadwal</div>
            <div class="stat-value">
                {{ $jadwals->count() }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Terjadwal</div>
            <div class="stat-value">
                {{ $jadwals->where('status', 'terjadwal')->count() }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Berlangsung</div>
            <div class="stat-value">
                {{ $jadwals->where('status', 'berlangsung')->count() }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Selesai</div>
            <div class="stat-value">
                {{ $jadwals->where('status', 'selesai')->count() }}
            </div>
        </div>

    </div>

    <div class="content-card">

        <div class="content-header">
            <h2>Daftar Jadwal</h2>

            <p>
                Semua jadwal kegiatan event yang telah dibuat.
            </p>
        </div>

        @if($jadwals->count())

            <div class="table-wrapper">

                <table class="jadwal-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Event</th>
                            <th>Nama Jadwal</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Penanggung Jawab</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($jadwals as $index => $jadwal)

                            @php
                                $status = strtolower($jadwal->status ?? 'draft');

                                $statusClass = match ($status) {
                                    'terjadwal' => 'status-terjadwal',
                                    'berlangsung' => 'status-berlangsung',
                                    'selesai' => 'status-selesai',
                                    default => 'status-draft',
                                };
                            @endphp

                            <tr>

                                <td class="number">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <div class="event-name">
                                        {{ $jadwal->event->nama_event ?? '-' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="jadwal-name">
                                        {{ $jadwal->nama_jadwal ?? '-' }}
                                    </div>
                                </td>

                                <td class="date">

                                    @if($jadwal->tanggal)
                                        {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d M Y') }}
                                    @else
                                        -
                                    @endif

                                </td>

                                <td class="time">

                                    {{ $jadwal->waktu_mulai ?? '-' }}

                                    @if($jadwal->waktu_selesai)
                                        - {{ $jadwal->waktu_selesai }}
                                    @endif

                                </td>

                                <td class="location">

                                    {{ $jadwal->lokasi ?? '-' }}

                                </td>

                                <td class="pic">

                                    {{ $jadwal->penanggung_jawab ?? '-' }}

                                </td>

                                <td>

                                    <span class="status {{ $statusClass }}">
                                        {{ str_replace('_', ' ', $status) }}
                                    </span>

                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('eo.jadwal.show', $jadwal) }}"
                                            class="btn-action"
                                            title="Lihat detail"
                                        >
                                            Lihat
                                        </a>

                                        <a
                                            href="{{ route('eo.jadwal.edit', $jadwal) }}"
                                            class="btn-action"
                                            title="Edit jadwal"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('eo.jadwal.destroy', $jadwal) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn-action btn-delete"
                                                title="Hapus jadwal"
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

                <strong>Belum ada jadwal event</strong>

                <span>
                    Silakan tambahkan jadwal untuk kegiatan event.
                </span>

            </div>

        @endif

    </div>

</div>

</x-layouts.eo>