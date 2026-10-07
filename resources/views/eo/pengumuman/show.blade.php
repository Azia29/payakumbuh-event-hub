<x-layouts.eo :user="$user" title="Detail Pengumuman">

    <div class="page-header">

        <div>
            <a href="{{ route('eo.pengumuman.index') }}" class="back">
                ← Kembali ke Pengumuman
            </a>

            <h1>{{ $pengumuman->judul }}</h1>

            <p>
                Dibuat {{ $pengumuman->created_at?->format('d F Y, H:i') }}
            </p>
        </div>

        @if($pengumuman->status === 'draft')
            <span class="status draft">Draft</span>
        @elseif($pengumuman->status === 'diajukan')
            <span class="status submitted">Menunggu Admin</span>
        @elseif($pengumuman->status === 'ditolak')
            <span class="status rejected">Ditolak</span>
        @elseif($pengumuman->status === 'dipublikasikan')
            <span class="status published">Dipublikasikan</span>
        @endif

    </div>

    <div class="content-grid">

        <div class="main-card">

            <div class="section">
                <h3>Isi Pengumuman</h3>

                <div class="article">
                    {!! nl2br(e($pengumuman->isi)) !!}
                </div>
            </div>

            @if($pengumuman->status === 'ditolak' && $pengumuman->catatan_admin)

                <div class="rejection">

                    <strong>Catatan Admin</strong>

                    <p>
                        {{ $pengumuman->catatan_admin }}
                    </p>

                </div>

            @endif

        </div>

        <div class="side-card">

            <h3>Informasi</h3>

            <div class="info-row">
                <span>Event</span>
                <strong>
                    {{ $pengumuman->event?->nama_event ?? 'Umum' }}
                </strong>
            </div>

            <div class="info-row">
                <span>Status</span>
                <strong>
                    {{ $pengumuman->status === 'diajukan'
                        ? 'Menunggu Admin'
                        : ucfirst($pengumuman->status) }}
                </strong>
            </div>

            @if($pengumuman->published_at)

                <div class="info-row">
                    <span>Dipublikasikan</span>
                    <strong>
                        {{ $pengumuman->published_at->format('d/m/Y H:i') }}
                    </strong>
                </div>

            @endif

            <div class="actions">

                @if(in_array($pengumuman->status, ['draft', 'ditolak']))

                    <a
                        href="{{ route('eo.pengumuman.edit', $pengumuman) }}"
                        class="btn-edit"
                    >
                        Edit Pengumuman
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
                            Ajukan ke Admin
                        </button>

                    </form>

                @elseif($pengumuman->status === 'diajukan')

                    <div class="waiting">
                        Pengumuman sedang diperiksa oleh Admin.
                    </div>

                @elseif($pengumuman->status === 'dipublikasikan')

                    <div class="published">
                        Pengumuman sudah dipublikasikan oleh Admin.
                    </div>

                @endif

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
            font-size:28px;
            color:#1f2937;
        }

        .page-header p {
            margin:0;
            color:#64748b;
        }

        .status {
            padding:8px 13px;
            border-radius:9px;
            font-size:12px;
            font-weight:700;
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

        .status.published {
            background:#dcfce7;
            color:#166534;
        }

        .content-grid {
            display:grid;
            grid-template-columns:minmax(0,1fr) 320px;
            gap:20px;
        }

        .main-card,
        .side-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .main-card {
            padding:28px;
        }

        .side-card {
            padding:22px;
            height:max-content;
        }

        .section h3,
        .side-card h3 {
            margin:0 0 18px;
            color:#1f2937;
        }

        .article {
            color:#475569;
            line-height:1.8;
            font-size:15px;
        }

        .info-row {
            padding:14px 0;
            border-bottom:1px solid #f1f5f9;
        }

        .info-row span {
            display:block;
            color:#94a3b8;
            font-size:12px;
            margin-bottom:5px;
        }

        .info-row strong {
            color:#334155;
        }

        .actions {
            margin-top:20px;
        }

        .actions form {
            margin-top:10px;
        }

        .btn-edit,
        .btn-submit {
            display:block;
            width:100%;
            box-sizing:border-box;
            text-align:center;
            padding:10px 14px;
            border-radius:9px;
            text-decoration:none;
            border:0;
            cursor:pointer;
            font-weight:600;
        }

        .btn-edit {
            background:#fef3c7;
            color:#92400e;
        }

        .btn-submit {
            background:#16a34a;
            color:#fff;
        }

        .waiting {
            padding:12px;
            border-radius:10px;
            background:#fef3c7;
            color:#92400e;
            font-size:13px;
            line-height:1.5;
        }

        .published {
            padding:12px;
            border-radius:10px;
            background:#dcfce7;
            color:#166534;
            font-size:13px;
            line-height:1.5;
        }

        .rejection {
            margin-top:25px;
            padding:18px;
            border-radius:12px;
            background:#fff1f2;
            border:1px solid #fecdd3;
        }

        .rejection strong {
            color:#991b1b;
        }

        .rejection p {
            margin:8px 0 0;
            color:#7f1d1d;
            line-height:1.6;
        }

        @media(max-width:800px) {
            .content-grid {
                grid-template-columns:1fr;
            }

            .page-header {
                flex-direction:column;
            }
        }

    </style>

</x-layouts.eo>