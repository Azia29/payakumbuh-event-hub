<x-layouts.eo :user="$user" title="Pengumuman">

    <div class="page-header">
        <div>
            <h1>Pengumuman</h1>
            <p>Kelola pengumuman dan informasi resmi untuk event.</p>
        </div>

        <a href="{{ route('eo.pengumuman.create') }}" class="btn-primary">
            + Buat Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert success">
            ✓ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert error">
            ! {{ session('error') }}
        </div>
    @endif

    <div class="summary-grid">

        <div class="summary-card">
            <span>Total Pengumuman</span>
            <strong>{{ $pengumumans->count() }}</strong>
        </div>

        <div class="summary-card">
            <span>Draft</span>
            <strong>
                {{ $pengumumans->where('status', 'draft')->count() }}
            </strong>
        </div>

        <div class="summary-card">
            <span>Diajukan</span>
            <strong>
                {{ $pengumumans->where('status', 'diajukan')->count() }}
            </strong>
        </div>

        <div class="summary-card">
            <span>Ditolak</span>
            <strong>
                {{ $pengumumans->where('status', 'ditolak')->count() }}
            </strong>
        </div>

    </div>

    <div class="content-card">

        <div class="card-title">
            <div>
                <h2>Daftar Pengumuman</h2>
                <p>Pengumuman yang dibuat oleh Anda.</p>
            </div>
        </div>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengumuman</th>
                        <th>Event</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($pengumumans as $index => $pengumuman)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>
                            <div class="title-cell">
                                <strong>{{ $pengumuman->judul }}</strong>

                                <small>
                                    {{ \Illuminate\Support\Str::limit($pengumuman->isi, 80) }}
                                </small>
                            </div>
                        </td>

                        <td>
                            {{ $pengumuman->event?->nama_event ?? 'Umum' }}
                        </td>

                        <td>

                            @if($pengumuman->status === 'draft')
                                <span class="badge draft">
                                    Draft
                                </span>

                            @elseif($pengumuman->status === 'diajukan')
                                <span class="badge submitted">
                                    Menunggu Admin
                                </span>

                            @elseif($pengumuman->status === 'ditolak')
                                <span class="badge rejected">
                                    Ditolak
                                </span>

                            @elseif($pengumuman->status === 'dipublikasikan')
                                <span class="badge published">
                                    Dipublikasikan
                                </span>

                            @else
                                <span class="badge">
                                    {{ ucfirst($pengumuman->status) }}
                                </span>
                            @endif

                        </td>

                        <td>
                            {{ $pengumuman->created_at?->format('d/m/Y') }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('eo.pengumuman.show', $pengumuman) }}"
                                    class="btn-view"
                                >
                                    Lihat
                                </a>

                                @if(in_array($pengumuman->status, ['draft', 'ditolak']))

                                    <a
                                        href="{{ route('eo.pengumuman.edit', $pengumuman) }}"
                                        class="btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('eo.pengumuman.ajukan', $pengumuman) }}"
                                        method="POST"
                                    >
                                        @csrf

                                        <button
                                            type="submit"
                                            class="btn-submit"
                                            onclick="return confirm('Ajukan pengumuman ini kepada Admin?')"
                                        >
                                            Ajukan
                                        </button>
                                    </form>

                                    <form
                                        action="{{ route('eo.pengumuman.destroy', $pengumuman) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn-delete"
                                            onclick="return confirm('Hapus pengumuman ini?')"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                @elseif($pengumuman->status === 'diajukan')

                                    <span class="waiting">
                                        Menunggu Admin
                                    </span>

                                @elseif($pengumuman->status === 'dipublikasikan')

                                    <span class="published-text">
                                        ✓ Sudah Dipublikasikan
                                    </span>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    PG
                                </div>

                                <h3>Belum ada pengumuman</h3>

                                <p>
                                    Mulai dengan membuat pengumuman pertama
                                    untuk event Anda.
                                </p>

                                <a
                                    href="{{ route('eo.pengumuman.create') }}"
                                    class="btn-primary"
                                >
                                    + Buat Pengumuman
                                </a>

                            </div>

                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <style>

        .page-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:20px;
            margin-bottom:24px;
        }

        .page-header h1 {
            margin:0 0 6px;
            font-size:28px;
            color:#1f2937;
        }

        .page-header p {
            margin:0;
            color:#64748b;
        }

        .btn-primary {
            display:inline-flex;
            align-items:center;
            padding:11px 18px;
            border-radius:10px;
            background:#16a34a;
            color:#fff;
            text-decoration:none;
            font-weight:600;
            border:none;
            cursor:pointer;
        }

        .btn-primary:hover {
            background:#15803d;
        }

        .alert {
            padding:14px 18px;
            border-radius:12px;
            margin-bottom:20px;
            font-weight:500;
        }

        .alert.success {
            background:#dcfce7;
            color:#166534;
        }

        .alert.error {
            background:#fee2e2;
            color:#991b1b;
        }

        .summary-grid {
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
            margin-bottom:24px;
        }

        .summary-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            padding:20px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .summary-card span {
            color:#64748b;
            font-size:14px;
        }

        .summary-card strong {
            display:block;
            margin-top:8px;
            font-size:28px;
            color:#1f2937;
        }

        .content-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
            overflow:hidden;
        }

        .card-title {
            padding:22px 24px;
            border-bottom:1px solid #e5e7eb;
        }

        .card-title h2 {
            margin:0 0 5px;
            font-size:19px;
        }

        .card-title p {
            margin:0;
            color:#64748b;
            font-size:14px;
        }

        .table-wrapper {
            overflow-x:auto;
        }

        table {
            width:100%;
            border-collapse:collapse;
        }

        th {
            padding:14px 16px;
            background:#f8fafc;
            color:#475569;
            font-size:13px;
            text-align:left;
            white-space:nowrap;
        }

        td {
            padding:16px;
            border-bottom:1px solid #f1f5f9;
            color:#334155;
            vertical-align:middle;
        }

        tbody tr:hover {
            background:#f8fafc;
        }

        .title-cell strong {
            display:block;
            color:#1f2937;
            margin-bottom:4px;
        }

        .title-cell small {
            color:#94a3b8;
        }

        .badge {
            display:inline-flex;
            padding:6px 10px;
            border-radius:8px;
            font-size:12px;
            font-weight:600;
            background:#f1f5f9;
            color:#475569;
        }

        .badge.draft {
            background:#f1f5f9;
            color:#475569;
        }

        .badge.submitted {
            background:#fef3c7;
            color:#92400e;
        }

        .badge.rejected {
            background:#fee2e2;
            color:#991b1b;
        }

        .badge.published {
            background:#dcfce7;
            color:#166534;
        }

        .actions {
            display:flex;
            align-items:center;
            gap:7px;
            flex-wrap:wrap;
        }

        .actions a,
        .actions button {
            padding:7px 10px;
            border-radius:8px;
            border:0;
            text-decoration:none;
            font-size:12px;
            font-weight:600;
            cursor:pointer;
        }

        .btn-view {
            background:#eff6ff;
            color:#1d4ed8;
        }

        .btn-edit {
            background:#fef3c7;
            color:#92400e;
        }

        .btn-submit {
            background:#dcfce7;
            color:#166534;
        }

        .btn-delete {
            background:#fee2e2;
            color:#991b1b;
        }

        .waiting {
            color:#92400e;
            font-size:12px;
            font-weight:600;
        }

        .published-text {
            color:#166534;
            font-size:12px;
            font-weight:600;
        }

        .empty-state {
            text-align:center;
            padding:60px 20px;
        }

        .empty-icon {
            width:60px;
            height:60px;
            margin:0 auto 16px;
            border-radius:16px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#dcfce7;
            color:#15803d;
            font-weight:700;
        }

        .empty-state h3 {
            margin:0 0 8px;
            color:#1f2937;
        }

        .empty-state p {
            margin:0 0 20px;
            color:#64748b;
        }

        @media(max-width:1000px) {
            .summary-grid {
                grid-template-columns:repeat(2,1fr);
            }
        }

        @media(max-width:650px) {
            .page-header {
                align-items:flex-start;
                flex-direction:column;
            }

            .summary-grid {
                grid-template-columns:1fr;
            }
        }

    </style>

</x-layouts.eo>