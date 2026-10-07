<x-layouts.eo :user="$user" title="Publikasi Event">

    <div class="page-header">

        <div>
            <span class="eyebrow">HUMAS</span>
            <h1>Publikasi Event</h1>
            <p>Kelola konten publikasi event sebelum diajukan kepada Admin.</p>
        </div>

        <a href="{{ route('eo.publikasi.create') }}" class="btn-primary">
            + Buat Publikasi
        </a>

    </div>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert error">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert error">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="summary-grid">

        <div class="summary-card">
            <div class="summary-icon">PB</div>
            <div>
                <span>Total Publikasi</span>
                <strong>{{ $publikasis->count() }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon draft">DR</div>
            <div>
                <span>Draft</span>
                <strong>{{ $publikasis->where('status', 'draft')->count() }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon waiting">AD</div>
            <div>
                <span>Menunggu Admin</span>
                <strong>{{ $publikasis->where('status', 'diajukan')->count() }}</strong>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon rejected">TL</div>
            <div>
                <span>Ditolak</span>
                <strong>{{ $publikasis->where('status', 'ditolak')->count() }}</strong>
            </div>
        </div>

    </div>

    <div class="info-banner">
        <div class="info-symbol">i</div>

        <div>
            <strong>Alur Publikasi</strong>
            <p>
                Humas membuat publikasi → Ajukan kepada Admin →
                Admin memeriksa → Admin menyetujui dan mempublikasikan.
            </p>
        </div>
    </div>

    <div class="table-card">

        <div class="table-header">
            <div>
                <h3>Daftar Publikasi</h3>
                <p>Publikasi yang dibuat oleh akun Humas Anda.</p>
            </div>
        </div>

        @if($publikasis->count())

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Publikasi</th>
                            <th>Event</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($publikasis as $publikasi)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="publication-title">
                                        {{ $publikasi->judul }}
                                    </div>

                                    @if($publikasi->gambar)
                                        <span class="has-image">
                                            ● Memiliki gambar
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $publikasi->event?->nama_event ?? 'Umum' }}
                                </td>

                                <td>
                                    <span class="type-badge">
                                        {{ ucfirst($publikasi->jenis) }}
                                    </span>
                                </td>

                                <td>

                                    @if($publikasi->status === 'draft')
                                        <span class="status draft">Draft</span>

                                    @elseif($publikasi->status === 'diajukan')
                                        <span class="status submitted">Menunggu Admin</span>

                                    @elseif($publikasi->status === 'ditolak')
                                        <span class="status rejected">Ditolak</span>

                                    @elseif($publikasi->status === 'disetujui')
                                        <span class="status approved">Disetujui</span>

                                    @elseif($publikasi->status === 'dipublikasikan')
                                        <span class="status published">Dipublikasikan</span>

                                    @else
                                        <span class="status">{{ ucfirst($publikasi->status) }}</span>
                                    @endif

                                </td>

                                <td>
                                    {{ $publikasi->created_at?->format('d/m/Y') }}
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('eo.publikasi.show', $publikasi) }}"
                                            class="btn-view"
                                        >
                                            Lihat
                                        </a>

                                        @if(in_array($publikasi->status, ['draft', 'ditolak']))

                                            <a
                                                href="{{ route('eo.publikasi.edit', $publikasi) }}"
                                                class="btn-edit"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('eo.publikasi.ajukan', $publikasi) }}"
                                                method="POST"
                                            >
                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="btn-submit"
                                                    onclick="return confirm('Ajukan publikasi ini kepada Admin?')"
                                                >
                                                    Ajukan
                                                </button>

                                            </form>

                                            <form
                                                action="{{ route('eo.publikasi.destroy', $publikasi) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn-delete"
                                                    onclick="return confirm('Hapus publikasi ini?')"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        @elseif($publikasi->status === 'diajukan')

                                            <span class="waiting-label">
                                                Menunggu Admin
                                            </span>

                                        @elseif($publikasi->status === 'dipublikasikan')

                                            <span class="published-label">
                                                Sudah Terbit
                                            </span>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">PB</div>

                <h3>Belum ada publikasi</h3>

                <p>
                    Buat publikasi event pertama untuk diajukan kepada Admin.
                </p>

                <a
                    href="{{ route('eo.publikasi.create') }}"
                    class="btn-primary"
                >
                    + Buat Publikasi
                </a>

            </div>

        @endif

    </div>

    <style>

        .page-header {
            display:flex;
            justify-content:space-between;
            align-items:flex-end;
            gap:20px;
            margin-bottom:24px;
        }

        .eyebrow {
            display:inline-block;
            margin-bottom:7px;
            color:#16a34a;
            font-size:11px;
            font-weight:800;
            letter-spacing:.08em;
        }

        .page-header h1 {
            margin:0 0 7px;
            color:#1f2937;
            font-size:28px;
        }

        .page-header p {
            margin:0;
            color:#64748b;
            font-size:14px;
        }

        .btn-primary {
            display:inline-block;
            padding:11px 17px;
            border-radius:10px;
            background:#16a34a;
            color:#fff;
            text-decoration:none;
            border:0;
            font-weight:700;
            cursor:pointer;
            white-space:nowrap;
        }

        .btn-primary:hover {
            background:#15803d;
        }

        .alert {
            padding:13px 16px;
            border-radius:11px;
            margin-bottom:18px;
            font-size:14px;
        }

        .alert.success {
            background:#ecfdf5;
            border:1px solid #bbf7d0;
            color:#166534;
        }

        .alert.error {
            background:#fff1f2;
            border:1px solid #fecdd3;
            color:#9f1239;
        }

        .summary-grid {
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
            margin-bottom:20px;
        }

        .summary-card {
            display:flex;
            align-items:center;
            gap:13px;
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:15px;
            padding:18px;
            box-shadow:0 4px 15px rgba(15,23,42,.04);
        }

        .summary-icon {
            width:42px;
            height:42px;
            border-radius:11px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#dcfce7;
            color:#166534;
            font-size:11px;
            font-weight:800;
        }

        .summary-icon.draft {
            background:#f1f5f9;
            color:#475569;
        }

        .summary-icon.waiting {
            background:#fef3c7;
            color:#92400e;
        }

        .summary-icon.rejected {
            background:#fee2e2;
            color:#991b1b;
        }

        .summary-card span {
            display:block;
            color:#94a3b8;
            font-size:12px;
            margin-bottom:4px;
        }

        .summary-card strong {
            color:#1f2937;
            font-size:22px;
        }

        .info-banner {
            display:flex;
            align-items:flex-start;
            gap:12px;
            padding:15px 17px;
            margin-bottom:20px;
            border-radius:12px;
            background:#f0fdf4;
            border:1px solid #bbf7d0;
        }

        .info-symbol {
            width:27px;
            height:27px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#16a34a;
            color:#fff;
            font-weight:800;
        }

        .info-banner strong {
            color:#166534;
            font-size:13px;
        }

        .info-banner p {
            margin:4px 0 0;
            color:#4b5563;
            font-size:12px;
            line-height:1.5;
        }

        .table-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 4px 15px rgba(15,23,42,.04);
        }

        .table-header {
            padding:20px 22px;
            border-bottom:1px solid #e5e7eb;
        }

        .table-header h3 {
            margin:0 0 5px;
            color:#1f2937;
        }

        .table-header p {
            margin:0;
            color:#94a3b8;
            font-size:12px;
        }

        .table-wrapper {
            overflow-x:auto;
        }

        table {
            width:100%;
            border-collapse:collapse;
            min-width:950px;
        }

        th {
            padding:13px 15px;
            background:#f8fafc;
            color:#64748b;
            text-align:left;
            font-size:11px;
            text-transform:uppercase;
            letter-spacing:.04em;
            white-space:nowrap;
        }

        td {
            padding:15px;
            border-top:1px solid #f1f5f9;
            color:#475569;
            font-size:13px;
            vertical-align:middle;
        }

        tr:hover td {
            background:#fafafa;
        }

        .publication-title {
            color:#1f2937;
            font-weight:700;
            max-width:230px;
        }

        .has-image {
            display:inline-block;
            margin-top:5px;
            color:#16a34a;
            font-size:10px;
        }

        .type-badge {
            padding:5px 8px;
            border-radius:7px;
            background:#f1f5f9;
            color:#475569;
            font-size:11px;
            font-weight:600;
        }

        .status {
            display:inline-block;
            padding:6px 9px;
            border-radius:8px;
            font-size:11px;
            font-weight:700;
            white-space:nowrap;
        }

        .status.draft {
            background:#f1f5f9;
            color:#475569;
        }

        .status.submitted {
            background:#fef3c7;
            color:#92400e;
        }

        .status.rejected {
            background:#fee2e2;
            color:#991b1b;
        }

        .status.approved,
        .status.published {
            background:#dcfce7;
            color:#166534;
        }

        .actions {
            display:flex;
            align-items:center;
            gap:6px;
            flex-wrap:wrap;
        }

        .actions a,
        .actions button {
            padding:6px 8px;
            border-radius:7px;
            font-size:11px;
            font-weight:600;
            text-decoration:none;
            border:0;
            cursor:pointer;
        }

        .actions form {
            margin:0;
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

        .waiting-label {
            color:#92400e;
            font-size:11px;
            font-weight:700;
        }

        .published-label {
            color:#166534;
            font-size:11px;
            font-weight:700;
        }

        .empty-state {
            padding:55px 20px;
            text-align:center;
        }

        .empty-icon {
            width:58px;
            height:58px;
            margin:0 auto 15px;
            border-radius:16px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#f0fdf4;
            color:#16a34a;
            font-weight:800;
        }

        .empty-state h3 {
            margin:0 0 7px;
            color:#1f2937;
        }

        .empty-state p {
            margin:0 0 18px;
            color:#94a3b8;
            font-size:13px;
        }

        @media(max-width:1000px) {
            .summary-grid {
                grid-template-columns:repeat(2,1fr);
            }
        }

        @media(max-width:700px) {
            .page-header {
                flex-direction:column;
                align-items:flex-start;
            }

            .summary-grid {
                grid-template-columns:1fr;
            }
        }

    </style>

</x-layouts.eo>