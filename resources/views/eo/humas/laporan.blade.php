<x-layouts.eo :user="$user" title="Laporan Humas">

    <div class="page-header">
        <div>
            <h1>Laporan Humas</h1>
            <p>Ringkasan aktivitas informasi dan publikasi event.</p>
        </div>
    </div>

    <div class="stats">

        <div class="stat-card">
            <span>Total Event</span>
            <strong>{{ $totalEvent }}</strong>
        </div>

        <div class="stat-card">
            <span>Total Publikasi</span>
            <strong>{{ $totalPublikasi }}</strong>
        </div>

        <div class="stat-card">
            <span>Diajukan</span>
            <strong>{{ $diajukan }}</strong>
        </div>

        <div class="stat-card">
            <span>Dipublikasikan</span>
            <strong>{{ $dipublikasikan }}</strong>
        </div>

    </div>

    <div class="content-card">

        <h2>Rekap Status Publikasi</h2>

        <div class="status-list">
            <div>
                <span>Draft</span>
                <strong>{{ $draft }}</strong>
            </div>

            <div>
                <span>Diajukan</span>
                <strong>{{ $diajukan }}</strong>
            </div>

            <div>
                <span>Ditolak</span>
                <strong>{{ $ditolak }}</strong>
            </div>

            <div>
                <span>Dipublikasikan</span>
                <strong>{{ $dipublikasikan }}</strong>
            </div>
        </div>

    </div>

    <style>
        .page-header {
            margin-bottom:24px;
        }

        .page-header h1 {
            margin:0 0 6px;
            font-size:28px;
        }

        .page-header p {
            margin:0;
            color:#64748b;
        }

        .stats {
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:18px;
            margin-bottom:24px;
        }

        .stat-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            padding:22px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .stat-card span {
            color:#64748b;
            font-size:14px;
        }

        .stat-card strong {
            display:block;
            margin-top:10px;
            font-size:30px;
            color:#1f2937;
        }

        .content-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            padding:24px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .content-card h2 {
            margin-top:0;
        }

        .status-list div {
            display:flex;
            justify-content:space-between;
            padding:16px 0;
            border-bottom:1px solid #f1f5f9;
        }

        .status-list div:last-child {
            border-bottom:none;
        }

        .status-list span {
            color:#64748b;
        }

        @media(max-width:900px) {
            .stats {
                grid-template-columns:repeat(2,1fr);
            }
        }

        @media(max-width:550px) {
            .stats {
                grid-template-columns:1fr;
            }
        }
    </style>

</x-layouts.eo>