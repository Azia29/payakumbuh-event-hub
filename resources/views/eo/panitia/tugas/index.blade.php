<x-layouts.eo :user="$user" title="Pembagian Tugas">

<div class="page">

    <div class="page-header">
        <div>
            <h1>Pembagian Tugas</h1>
            <p>Kelola pembagian tugas panitia berdasarkan event dan divisi.</p>
        </div>

        <a href="{{ route('eo.panitia.tugas.create') }}" class="btn-primary">
            + Tambah Tugas
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <div>
                <h2>Daftar Tugas Panitia</h2>
                <p>{{ $tugas->count() }} tugas terdaftar</p>
            </div>
        </div>

        @if($tugas->count())

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Panitia</th>
                            <th>Divisi</th>
                            <th>Tugas</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tugas as $item)
                            @php
                                $status = $item->status;

                                $statusLabel = match($status) {
                                    'sedang_dikerjakan' => 'Sedang Dikerjakan',
                                    'selesai' => 'Selesai',
                                    default => 'Belum Dimulai',
                                };
                            @endphp

                            <tr>

                                <td>
                                    <strong>
                                        {{ $item->eventPanitia?->event?->nama_event ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $item->eventPanitia?->panitia?->nama ?? '-' }}
                                </td>

                                <td>
                                    <span class="division">
                                        {{ $item->eventPanitia?->divisi?->nama_divisi ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <strong>{{ $item->judul_tugas }}</strong>

                                    @if($item->lokasi)
                                        <small>{{ $item->lokasi }}</small>
                                    @endif
                                </td>

                                <td>
                                    @if($item->tanggal)
                                        {{ $item->tanggal->format('d/m/Y') }}

                                        @if($item->jam_mulai)
                                            <small>
                                                {{ $item->jam_mulai }}
                                                @if($item->jam_selesai)
                                                    - {{ $item->jam_selesai }}
                                                @endif
                                            </small>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    <span class="status status-{{ $status }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>

                                <td>
                                    <div class="actions">

                                        <a
                                            href="{{ route('eo.panitia.tugas.show', $item) }}"
                                            class="btn-view"
                                        >
                                            Detail
                                        </a>

                                        <form
                                            method="POST"
                                            action="{{ route('eo.panitia.tugas.destroy', $item) }}"
                                            onsubmit="return confirm('Hapus tugas ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-delete">
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

            <div class="empty">
                <div class="empty-icon">TP</div>
                <h3>Belum ada tugas panitia</h3>
                <p>Buat pembagian tugas pertama untuk event kamu.</p>

                <a href="{{ route('eo.panitia.tugas.create') }}" class="btn-primary">
                    Tambah Tugas
                </a>
            </div>

        @endif

    </div>

</div>

<style>
.page {
    padding: 28px;
}

.page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:24px;
}

.page-header h1 {
    margin:0;
    color:#172033;
    font-size:28px;
}

.page-header p {
    margin:7px 0 0;
    color:#718096;
}

.btn-primary {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:11px 18px;
    background:#15803d;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
    border:0;
    cursor:pointer;
}

.btn-primary:hover {
    background:#166534;
}

.card {
    background:#fff;
    border-radius:16px;
    box-shadow:0 5px 20px rgba(15,23,42,.06);
    overflow:hidden;
}

.card-header {
    padding:20px 24px;
    border-bottom:1px solid #edf0f3;
}

.card-header h2 {
    margin:0;
    font-size:18px;
    color:#172033;
}

.card-header p {
    margin:5px 0 0;
    color:#718096;
    font-size:14px;
}

.table-wrap {
    overflow-x:auto;
}

table {
    width:100%;
    border-collapse:collapse;
}

th {
    background:#f8fafc;
    color:#64748b;
    font-size:12px;
    text-transform:uppercase;
    letter-spacing:.04em;
    padding:14px 18px;
    text-align:left;
}

td {
    padding:16px 18px;
    border-top:1px solid #edf0f3;
    color:#334155;
    vertical-align:middle;
}

td strong {
    color:#172033;
}

td small {
    display:block;
    margin-top:4px;
    color:#94a3b8;
}

.division {
    display:inline-block;
    padding:5px 9px;
    background:#f0fdf4;
    color:#15803d;
    border-radius:7px;
    font-size:12px;
    font-weight:600;
}

.status {
    display:inline-block;
    padding:6px 10px;
    border-radius:8px;
    font-size:12px;
    font-weight:600;
}

.status-belum_dimulai {
    background:#f1f5f9;
    color:#475569;
}

.status-sedang_dikerjakan {
    background:#eff6ff;
    color:#2563eb;
}

.status-selesai {
    background:#f0fdf4;
    color:#15803d;
}

.actions {
    display:flex;
    gap:7px;
    align-items:center;
}

.btn-view,
.btn-delete {
    padding:7px 10px;
    border-radius:7px;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
    border:0;
    cursor:pointer;
}

.btn-view {
    background:#f0fdf4;
    color:#15803d;
}

.btn-delete {
    background:#fef2f2;
    color:#dc2626;
}

.alert-success {
    margin-bottom:20px;
    padding:13px 16px;
    background:#f0fdf4;
    border:1px solid #bbf7d0;
    color:#166534;
    border-radius:10px;
}

.empty {
    padding:60px 20px;
    text-align:center;
}

.empty-icon {
    width:60px;
    height:60px;
    margin:0 auto 15px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:16px;
    background:#f0fdf4;
    color:#15803d;
    font-weight:800;
}

.empty h3 {
    margin:0;
    color:#172033;
}

.empty p {
    color:#718096;
    margin:8px 0 20px;
}

@media(max-width:700px) {
    .page {
        padding:16px;
    }

    .page-header {
        align-items:flex-start;
        flex-direction:column;
    }

    .actions {
        flex-direction:column;
        align-items:stretch;
    }
}
</style>

</x-layouts.eo>