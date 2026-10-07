<x-layouts.eo :user="$user" title="Detail Publikasi">

    <div class="page-header">

        <div>
            <a href="{{ route('eo.publikasi.index') }}" class="back">
                ← Kembali ke Publikasi
            </a>

            <h1>{{ $publikasi->judul }}</h1>

            <p>
                Dibuat {{ $publikasi->created_at?->format('d F Y, H:i') }}
            </p>
        </div>

        <div>
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
            @endif
        </div>

    </div>

    <div class="content-grid">

        <div class="main-card">

            @if($publikasi->gambar)

                <div class="image-wrapper">
                    <img
                        src="{{ asset('storage/' . $publikasi->gambar) }}"
                        alt="{{ $publikasi->judul }}"
                    >
                </div>

            @endif

            <div class="article-section">

                <div class="article-label">
                    {{ ucfirst($publikasi->jenis) }}
                </div>

                <h2>{{ $publikasi->judul }}</h2>

                <div class="article">
                    {!! nl2br(e($publikasi->isi)) !!}
                </div>

            </div>

            @if($publikasi->status === 'ditolak' && $publikasi->catatan_admin)

                <div class="rejection">

                    <div class="rejection-title">
                        Catatan Admin
                    </div>

                    <p>
                        {{ $publikasi->catatan_admin }}
                    </p>

                </div>

            @endif

        </div>

        <div class="side-column">

            <div class="info-card">

                <h3>Informasi Publikasi</h3>

                <div class="info-row">
                    <span>Event</span>

                    <strong>
                        {{ $publikasi->event?->nama_event ?? 'Umum' }}
                    </strong>
                </div>

                <div class="info-row">
                    <span>Jenis</span>

                    <strong>
                        {{ ucfirst($publikasi->jenis) }}
                    </strong>
                </div>

                <div class="info-row">
                    <span>Status</span>

                    <strong>
                        @if($publikasi->status === 'diajukan')
                            Menunggu Admin
                        @else
                            {{ ucfirst($publikasi->status) }}
                        @endif
                    </strong>
                </div>

                <div class="info-row">
                    <span>Dibuat</span>

                    <strong>
                        {{ $publikasi->created_at?->format('d/m/Y H:i') }}
                    </strong>
                </div>

                @if($publikasi->published_at)

                    <div class="info-row">
                        <span>Dipublikasikan</span>

                        <strong>
                            {{ $publikasi->published_at->format('d/m/Y H:i') }}
                        </strong>
                    </div>

                @endif

            </div>

            <div class="action-card">

                <h3>Aksi</h3>

                @if(in_array($publikasi->status, ['draft', 'ditolak']))

                    <a
                        href="{{ route('eo.publikasi.edit', $publikasi) }}"
                        class="btn-edit"
                    >
                        Edit Publikasi
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
                            Ajukan ke Admin
                        </button>

                    </form>

                @elseif($publikasi->status === 'diajukan')

                    <div class="waiting">
                        <strong>Menunggu pemeriksaan Admin</strong>

                        <p>
                            Publikasi sudah diajukan dan sedang menunggu
                            pemeriksaan serta keputusan dari Admin EO.
                        </p>
                    </div>

                @elseif($publikasi->status === 'disetujui')

                    <div class="approved-box">
                        <strong>Publikasi disetujui</strong>

                        <p>
                            Publikasi telah disetujui Admin dan siap
                            untuk dipublikasikan.
                        </p>
                    </div>

                @elseif($publikasi->status === 'dipublikasikan')

                    <div class="published-box">
                        <strong>Sudah dipublikasikan</strong>

                        <p>
                            Publikasi ini telah diterbitkan oleh Admin EO.
                        </p>
                    </div>

                @endif

            </div>

            <div class="workflow-card">

                <h3>Alur Publikasi</h3>

                <div class="workflow-step active">
                    <span>1</span>

                    <div>
                        <strong>Humas Membuat</strong>
                        <small>
                            Konten dibuat oleh EO Humas.
                        </small>
                    </div>
                </div>

                <div class="workflow-line"></div>

                <div class="workflow-step">
                    <span>2</span>

                    <div>
                        <strong>Ajukan ke Admin</strong>
                        <small>
                            Konten diperiksa oleh Admin EO.
                        </small>
                    </div>
                </div>

                <div class="workflow-line"></div>

                <div class="workflow-step">
                    <span>3</span>

                    <div>
                        <strong>Persetujuan Admin</strong>
                        <small>
                            Admin dapat menyetujui atau menolak.
                        </small>
                    </div>
                </div>

                <div class="workflow-line"></div>

                <div class="workflow-step">
                    <span>4</span>

                    <div>
                        <strong>Publikasi</strong>
                        <small>
                            Publikasi diterbitkan oleh Admin.
                        </small>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <style>

        .page-header {
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:20px;
            margin-bottom:24px;
        }

        .back {
            display:inline-block;
            margin-bottom:12px;
            color:#16a34a;
            text-decoration:none;
            font-weight:600;
            font-size:14px;
        }

        .page-header h1 {
            margin:0 0 7px;
            color:#1f2937;
            font-size:28px;
            line-height:1.3;
        }

        .page-header p {
            margin:0;
            color:#64748b;
            font-size:13px;
        }

        .status {
            display:inline-block;
            padding:8px 12px;
            border-radius:9px;
            font-size:12px;
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

        .content-grid {
            display:grid;
            grid-template-columns:minmax(0,1fr) 320px;
            gap:20px;
            align-items:start;
        }

        .main-card,
        .info-card,
        .action-card,
        .workflow-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .main-card {
            overflow:hidden;
        }

        .image-wrapper {
            width:100%;
            max-height:390px;
            overflow:hidden;
            background:#f8fafc;
        }

        .image-wrapper img {
            display:block;
            width:100%;
            max-height:390px;
            object-fit:cover;
        }

        .article-section {
            padding:28px;
        }

        .article-label {
            display:inline-block;
            margin-bottom:10px;
            padding:6px 9px;
            border-radius:7px;
            background:#f0fdf4;
            color:#166534;
            font-size:11px;
            font-weight:700;
        }

        .article-section h2 {
            margin:0 0 18px;
            color:#1f2937;
            font-size:22px;
            line-height:1.4;
        }

        .article {
            color:#475569;
            font-size:15px;
            line-height:1.8;
        }

        .rejection {
            margin:0 28px 28px;
            padding:17px;
            border-radius:12px;
            background:#fff1f2;
            border:1px solid #fecdd3;
        }

        .rejection-title {
            color:#991b1b;
            font-weight:700;
            font-size:13px;
        }

        .rejection p {
            margin:7px 0 0;
            color:#7f1d1d;
            font-size:13px;
            line-height:1.6;
        }

        .side-column {
            display:grid;
            gap:16px;
        }

        .info-card,
        .action-card,
        .workflow-card {
            padding:21px;
        }

        .info-card h3,
        .action-card h3,
        .workflow-card h3 {
            margin:0 0 17px;
            color:#1f2937;
            font-size:16px;
        }

        .info-row {
            padding:12px 0;
            border-bottom:1px solid #f1f5f9;
        }

        .info-row:last-child {
            border-bottom:0;
            padding-bottom:0;
        }

        .info-row span {
            display:block;
            margin-bottom:5px;
            color:#94a3b8;
            font-size:11px;
        }

        .info-row strong {
            display:block;
            color:#334155;
            font-size:13px;
            line-height:1.4;
        }

        .btn-edit,
        .btn-submit {
            display:block;
            width:100%;
            box-sizing:border-box;
            padding:11px 14px;
            border-radius:9px;
            text-align:center;
            text-decoration:none;
            border:0;
            cursor:pointer;
            font-weight:600;
            font-size:13px;
        }

        .btn-edit {
            background:#fef3c7;
            color:#92400e;
        }

        .btn-submit {
            margin-top:9px;
            background:#16a34a;
            color:#fff;
        }

        .action-card form {
            margin:0;
        }

        .waiting,
        .approved-box,
        .published-box {
            padding:13px;
            border-radius:10px;
            font-size:12px;
            line-height:1.5;
        }

        .waiting {
            background:#fffbeb;
            color:#92400e;
        }

        .approved-box,
        .published-box {
            background:#f0fdf4;
            color:#166534;
        }

        .waiting strong,
        .approved-box strong,
        .published-box strong {
            display:block;
            margin-bottom:4px;
        }

        .waiting p,
        .approved-box p,
        .published-box p {
            margin:0;
        }

        .workflow-step {
            display:flex;
            align-items:flex-start;
            gap:11px;
        }

        .workflow-step > span {
            flex:0 0 27px;
            width:27px;
            height:27px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            background:#f1f5f9;
            color:#64748b;
            font-size:11px;
            font-weight:700;
        }

        .workflow-step.active > span {
            background:#dcfce7;
            color:#166534;
        }

        .workflow-step strong {
            display:block;
            color:#334155;
            font-size:12px;
        }

        .workflow-step small {
            display:block;
            margin-top:3px;
            color:#94a3b8;
            font-size:11px;
            line-height:1.4;
        }

        .workflow-line {
            width:1px;
            height:14px;
            margin:3px 0 3px 13px;
            background:#e2e8f0;
        }

        @media(max-width:850px) {
            .content-grid {
                grid-template-columns:1fr;
            }
        }

        @media(max-width:600px) {
            .page-header {
                flex-direction:column;
            }

            .article-section {
                padding:20px;
            }

            .rejection {
                margin:0 20px 20px;
            }
        }

    </style>

</x-layouts.eo>