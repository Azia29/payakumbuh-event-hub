<x-layouts.eo :user="$user" title="Tim Panitia">

<style>
    .panitia-page {
        padding: 8px 4px 40px;
    }

    .page-header {
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:20px;
        margin-bottom:22px;
    }

    .page-title {
        margin:0;
        font-size:28px;
        font-weight:800;
        color:#0f172a;
    }

    .page-subtitle {
        margin-top:6px;
        color:#64748b;
        font-size:13px;
    }

    .btn {
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:7px;
        padding:11px 16px;
        border-radius:10px;
        text-decoration:none;
        font-size:13px;
        font-weight:700;
        border:0;
        cursor:pointer;
    }

    .btn-primary {
        background:#047857;
        color:white;
    }

    .btn-primary:hover {
        background:#065f46;
    }

    .alert {
        padding:13px 16px;
        margin-bottom:18px;
        border-radius:11px;
        background:#ecfdf5;
        border:1px solid #a7f3d0;
        color:#047857;
        font-size:13px;
        font-weight:600;
    }

    .table-card {
        background:white;
        border:1px solid #e2e8f0;
        border-radius:17px;
        box-shadow:0 4px 18px rgba(15,23,42,.05);
        overflow:hidden;
    }

    .table-top {
        padding:18px 20px;
        border-bottom:1px solid #eef2f7;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .table-title {
        font-size:16px;
        font-weight:800;
        color:#0f172a;
    }

    .table-count {
        color:#64748b;
        font-size:12px;
    }

    .table-wrapper {
        overflow-x:auto;
    }

    table {
        width:100%;
        border-collapse:collapse;
        min-width:850px;
    }

    th {
        background:#f8fafc;
        color:#64748b;
        font-size:11px;
        text-transform:uppercase;
        letter-spacing:.04em;
        text-align:left;
        padding:13px 18px;
        border-bottom:1px solid #e2e8f0;
    }

    td {
        padding:15px 18px;
        border-bottom:1px solid #f1f5f9;
        color:#334155;
        font-size:13px;
        vertical-align:middle;
    }

    tr:last-child td {
        border-bottom:0;
    }

    .person {
        display:flex;
        align-items:center;
        gap:11px;
    }

    .avatar {
        width:38px;
        height:38px;
        border-radius:50%;
        background:#ecfdf5;
        color:#047857;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:800;
        flex-shrink:0;
    }

    .person-name {
        font-weight:800;
        color:#0f172a;
    }

    .person-email {
        margin-top:3px;
        color:#94a3b8;
        font-size:11px;
    }

    .badge {
        display:inline-flex;
        padding:6px 10px;
        border-radius:999px;
        background:#ecfdf5;
        color:#047857;
        font-size:11px;
        font-weight:800;
    }

    .event-name {
        font-weight:700;
        color:#334155;
    }

    .actions {
        display:flex;
        gap:7px;
    }

    .btn-edit,
    .btn-delete {
        padding:7px 11px;
        border-radius:8px;
        font-size:11px;
        font-weight:700;
        text-decoration:none;
        cursor:pointer;
    }

    .btn-edit {
        background:#eff6ff;
        color:#1d4ed8;
        border:0;
    }

    .btn-delete {
        background:#fef2f2;
        color:#dc2626;
        border:0;
    }

    .empty {
        text-align:center;
        padding:50px 20px !important;
        color:#94a3b8;
    }

    .empty-icon {
        font-size:35px;
        margin-bottom:10px;
    }

    .empty-title {
        color:#334155;
        font-weight:800;
        font-size:15px;
    }
</style>

<div class="panitia-page">

    <div class="page-header">

        <div>
            <h1 class="page-title">
                Tim Panitia
            </h1>

            <p class="page-subtitle">
                Kelola anggota panitia dan pembagian divisi event.
            </p>
        </div>

        <a href="{{ route('eo.panitia.create') }}"
           class="btn btn-primary">
            + Tambah Panitia
        </a>

    </div>


    @if(session('success'))
        <div class="alert">
            ✓ {{ session('success') }}
        </div>
    @endif


    <div class="table-card">

        <div class="table-top">

            <div class="table-title">
                Daftar Anggota Panitia
            </div>

            <div class="table-count">
                {{ $panitia->count() }} anggota
            </div>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Divisi</th>
                        <th>Event</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($panitia as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="person">

                                    <div class="avatar">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="person-name">
                                            {{ $item->nama }}
                                        </div>

                                        <div class="person-email">
                                            {{ $item->email ?? 'Email belum diisi' }}
                                        </div>
                                    </div>

                                </div>

                            </td>

                            <td>
                                {{ $item->no_hp ?? '-' }}
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $item->divisi }}
                                </span>
                            </td>

                            <td>
                                <div class="event-name">
                                    {{ $item->event->nama_event ?? '-' }}
                                </div>
                            </td>

                            <td>

                                <div class="actions">

                                    <a href="{{ route('eo.panitia.edit', $item) }}"
                                       class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('eo.panitia.destroy', $item) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data panitia ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-delete">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="empty">

                                <div class="empty-icon">
                                    👥
                                </div>

                                <div class="empty-title">
                                    Belum ada anggota panitia
                                </div>

                                <div style="margin-top:6px;">
                                    Silakan tambahkan anggota panitia.
                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-layouts.eo>