<x-layouts.eo :user="$user" title="Kelola Event">

<style>
    .event-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-title {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #172033;
    }

    .page-description {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        background: #087443;
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        border: 0;
        cursor: pointer;
        box-shadow: 0 5px 12px rgba(8,116,67,.18);
        transition: .2s;
    }

    .btn-primary:hover {
        background: #065f38;
        transform: translateY(-1px);
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .summary-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        padding: 18px;
        box-shadow: 0 4px 15px rgba(15,23,42,.04);
    }

    .summary-label {
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .summary-value {
        margin-top: 9px;
        font-size: 27px;
        font-weight: 800;
        color: #172033;
    }

    .summary-note {
        margin-top: 4px;
        font-size: 11px;
        color: #94a3b8;
    }

    .content-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(15,23,42,.05);
        overflow: hidden;
    }

    .card-toolbar {
        padding: 18px 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .card-heading {
        font-size: 17px;
        font-weight: 800;
        color: #172033;
    }

    .card-subheading {
        margin-top: 4px;
        font-size: 12px;
        color: #94a3b8;
    }

    .toolbar-controls {
        display: flex;
        gap: 10px;
    }

    .search-box,
    .filter-select {
        height: 40px;
        border: 1px solid #dbe2ea;
        border-radius: 9px;
        background: white;
        color: #334155;
        outline: none;
        font-size: 12px;
    }

    .search-box {
        width: 230px;
        padding: 0 13px;
    }

    .filter-select {
        padding: 0 10px;
    }

    .search-box:focus,
    .filter-select:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16,185,129,.10);
    }

    .table-wrapper {
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
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .5px;
        white-space: nowrap;
    }

    .event-table td {
        padding: 16px 18px;
        border-top: 1px solid #eef2f7;
        color: #475569;
        font-size: 13px;
        vertical-align: middle;
    }

    .event-table tbody tr {
        transition: .15s;
    }

    .event-table tbody tr:hover {
        background: #f8fffb;
    }

    .event-number {
        color: #94a3b8;
        font-weight: 700;
    }

    .event-name {
        color: #172033;
        font-weight: 800;
    }

    .event-location {
        color: #64748b;
        max-width: 180px;
    }

    .date-main {
        color: #334155;
        font-weight: 700;
        font-size: 12px;
    }

    .date-time {
        margin-top: 3px;
        color: #94a3b8;
        font-size: 11px;
    }

    .status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 800;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .status-active {
        background: #dcfce7;
        color: #15803d;
    }

    .status-approved {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .status-pending {
        background: #fef3c7;
        color: #a16207;
    }

    .status-rejected {
        background: #fee2e2;
        color: #b91c1c;
    }

    .status-draft {
        background: #f1f5f9;
        color: #64748b;
    }

    .action-group {
        display: flex;
        gap: 6px;
        white-space: nowrap;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 34px;
        height: 32px;
        padding: 0 9px;
        border-radius: 7px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
        border: 1px solid #e2e8f0;
        background: white;
        color: #475569;
        cursor: pointer;
        transition: .15s;
    }

    .action-btn:hover {
        background: #f8fafc;
    }

    .action-view {
        color: #047857;
        border-color: #bbf7d0;
        background: #f0fdf4;
    }

    .action-edit {
        color: #2563eb;
        border-color: #bfdbfe;
        background: #eff6ff;
    }

    .action-delete {
        color: #dc2626;
        border-color: #fecaca;
        background: #fef2f2;
    }

    .empty-state {
        padding: 65px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 15px;
        border-radius: 16px;
        background: #ecfdf5;
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 18px;
    }

    .empty-title {
        font-size: 16px;
        font-weight: 800;
        color: #172033;
    }

    .empty-text {
        margin: 6px 0 18px;
        color: #94a3b8;
        font-size: 13px;
    }

    .card-footer {
        padding: 15px 20px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #94a3b8;
        font-size: 11px;
    }

    .pagination {
        display: flex;
        gap: 5px;
    }

    .pagination a,
    .pagination span {
        min-width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #e2e8f0;
        border-radius: 7px;
        text-decoration: none;
        font-size: 11px;
        color: #64748b;
    }

    .pagination .active {
        background: #087443;
        border-color: #087443;
        color: white;
    }

    @media(max-width: 1000px) {
        .summary-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media(max-width: 700px) {
        .summary-grid {
            grid-template-columns: 1fr;
        }

        .card-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .toolbar-controls {
            width: 100%;
            flex-direction: column;
        }

        .search-box {
            width: 100%;
        }

        .filter-select {
            width: 100%;
        }

        .card-footer {
            flex-direction: column;
            gap: 12px;
        }
    }
</style>


<div class="event-page">

    {{-- HEADER --}}
    <div class="page-header">

        <div>
            <h1 class="page-title">Kelola Event</h1>

            <p class="page-description">
                Kelola dan pantau seluruh event yang tersedia dalam sistem Event Hub Payakumbuh.
            </p>
        </div>

        <a href="{{ route('eo.events.create') }}" class="btn-primary">
            <span>+</span>
            <span>Tambah Event</span>
        </a>

    </div>


    {{-- SUMMARY --}}
    @php
        $eventCollection = $events ?? collect();

        $totalEvent = $eventCollection->count();

        $aktifEvent = $eventCollection->filter(function ($event) {
            return in_array(
                strtolower($event->status ?? ''),
                ['aktif', 'berlangsung', 'disetujui']
            );
        })->count();

        $draftEvent = $eventCollection->filter(function ($event) {
            return strtolower($event->status ?? '') === 'draft';
        })->count();

        $selesaiEvent = $eventCollection->filter(function ($event) {
            return strtolower($event->status ?? '') === 'selesai';
        })->count();
    @endphp

    <div class="summary-grid">

        <div class="summary-card">
            <div class="summary-label">Total Event</div>
            <div class="summary-value">{{ $totalEvent }}</div>
            <div class="summary-note">Seluruh event dalam sistem</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Event Aktif</div>
            <div class="summary-value">{{ $aktifEvent }}</div>
            <div class="summary-note">Event aktif atau disetujui</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Draft</div>
            <div class="summary-value">{{ $draftEvent }}</div>
            <div class="summary-note">Event yang masih dipersiapkan</div>
        </div>

        <div class="summary-card">
            <div class="summary-label">Selesai</div>
            <div class="summary-value">{{ $selesaiEvent }}</div>
            <div class="summary-note">Event yang telah selesai</div>
        </div>

    </div>


    {{-- TABLE --}}
    <div class="content-card">

        <div class="card-toolbar">

            <div>
                <div class="card-heading">Daftar Event</div>

                <div class="card-subheading">
                    Semua event yang tersedia pada sistem.
                </div>
            </div>

            <div class="toolbar-controls">

                <input
                    type="text"
                    id="eventSearch"
                    class="search-box"
                    placeholder="Cari nama event atau lokasi..."
                >

                <select id="statusFilter" class="filter-select">
                    <option value="">Semua Status</option>
                    <option value="draft">Draft</option>
                    <option value="aktif">Aktif</option>
                    <option value="berlangsung">Berlangsung</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="selesai">Selesai</option>
                    <option value="ditolak">Ditolak</option>
                </select>

            </div>

        </div>


        @if($eventCollection->count() > 0)

            <div class="table-wrapper">

                <table class="event-table">

                    <thead>
                        <tr>
                            <th width="55">No</th>
                            <th>Event</th>
                            <th>Lokasi</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="eventTableBody">

                        @foreach($eventCollection as $index => $event)

                            @php
                                $status = strtolower($event->status ?? 'draft');

                                $statusClass = match($status) {
                                    'aktif', 'berlangsung' => 'status-active',
                                    'disetujui' => 'status-approved',
                                    'pending', 'menunggu' => 'status-pending',
                                    'ditolak', 'rejected' => 'status-rejected',
                                    default => 'status-draft',
                                };
                            @endphp

                            <tr
                                data-search="{{ strtolower(($event->nama_event ?? '') . ' ' . ($event->lokasi_event ?? '')) }}"
                                data-status="{{ $status }}"
                            >

                                <td class="event-number">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    <div class="event-name">
                                        {{ $event->nama_event ?? 'Tanpa nama event' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="event-location">
                                        {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="date-main">
                                        {{ $event->tgl_mulai ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y') : '-' }}
                                    </div>

                                    @if($event->tgl_mulai)
                                        <div class="date-time">
                                            {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('H:i') }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <div class="date-main">
                                        {{ $event->tgl_selesai ? \Carbon\Carbon::parse($event->tgl_selesai)->format('d M Y') : '-' }}
                                    </div>

                                    @if($event->tgl_selesai)
                                        <div class="date-time">
                                            {{ \Carbon\Carbon::parse($event->tgl_selesai)->format('H:i') }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <span class="status {{ $statusClass }}">
                                        <span class="status-dot"></span>
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>

                                <td>

                                    <div class="action-group">

                                        <a
                                            href="{{ route('eo.events.show', $event) }}"
                                            class="action-btn action-view"
                                            title="Lihat detail"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('eo.events.edit', $event) }}"
                                            class="action-btn action-edit"
                                            title="Edit event"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('eo.events.destroy', $event) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus event ini?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn action-delete"
                                                title="Hapus event"
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

            <div class="card-footer">

                <span id="eventCount">
                    Menampilkan {{ $eventCollection->count() }} event
                </span>

                @if(method_exists($eventCollection, 'links'))
                    <div class="pagination">
                        {{ $eventCollection->links() }}
                    </div>
                @endif

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    EV
                </div>

                <div class="empty-title">
                    Belum ada event
                </div>

                <div class="empty-text">
                    Belum ada data event yang tersedia. Tambahkan event pertama untuk mulai mengelola kegiatan.
                </div>

                <a href="{{ route('eo.events.create') }}" class="btn-primary">
                    <span>+</span>
                    <span>Tambah Event</span>
                </a>

            </div>

        @endif

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('eventSearch');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('#eventTableBody tr');
    const countText = document.getElementById('eventCount');

    function filterEvents() {

        const search = (searchInput?.value || '').toLowerCase().trim();
        const status = (statusFilter?.value || '').toLowerCase();

        let visible = 0;

        rows.forEach(function (row) {

            const rowSearch = row.dataset.search || '';
            const rowStatus = row.dataset.status || '';

            const matchSearch =
                search === '' || rowSearch.includes(search);

            const matchStatus =
                status === '' || rowStatus === status;

            if (matchSearch && matchStatus) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }

        });

        if (countText) {
            countText.textContent =
                'Menampilkan ' + visible + ' event';
        }
    }

    searchInput?.addEventListener('input', filterEvents);
    statusFilter?.addEventListener('change', filterEvents);

});
</script>

</x-layouts.eo>
