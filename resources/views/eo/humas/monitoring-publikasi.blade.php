<x-layouts.eo :user="$user" title="Monitoring Publikasi">

    <div class="page-header">
        <div>
            <h1>Monitoring Publikasi</h1>
            <p>Pantau status seluruh publikasi yang dibuat oleh Humas.</p>
        </div>
    </div>

    <div class="content-card">

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Event</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($publikasis as $index => $publikasi)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <strong>{{ $publikasi->judul }}</strong>
                            </td>

                            <td>
                                {{ $publikasi->event?->nama_event ?? 'Umum' }}
                            </td>

                            <td>{{ $publikasi->jenis }}</td>

                            <td>
                                <span class="badge">
                                    {{ ucfirst($publikasi->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $publikasi->created_at?->format('d/m/Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">
                                Belum ada publikasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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

        .content-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            padding:20px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .table-wrap {
            overflow-x:auto;
        }

        table {
            width:100%;
            border-collapse:collapse;
        }

        th {
            text-align:left;
            padding:14px;
            background:#f8fafc;
            color:#475569;
            font-size:13px;
        }

        td {
            padding:15px 14px;
            border-bottom:1px solid #f1f5f9;
            color:#334155;
        }

        .badge {
            display:inline-block;
            padding:6px 10px;
            border-radius:8px;
            background:#f1f5f9;
            color:#475569;
            font-size:12px;
            font-weight:600;
        }

        .empty {
            text-align:center;
            padding:40px;
            color:#64748b;
        }
    </style>

</x-layouts.eo>