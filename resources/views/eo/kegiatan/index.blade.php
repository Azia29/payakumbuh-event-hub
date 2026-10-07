<x-layouts.eo :user="$user" title="Kegiatan">

    <div class="page-header">
        <div>
            <span class="eyebrow">DIVISI ACARA</span>
            <h1>Kelola Kegiatan</h1>
            <p>Atur dan pantau seluruh kegiatan yang berkaitan dengan pelaksanaan event.</p>
        </div>

        <a href="{{ route('eo.kegiatan.create') }}" class="btn-primary">
            + Tambah Kegiatan
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="summary-card">
        <div class="summary-icon">K</div>
        <div>
            <strong>{{ $kegiatans->count() }}</strong>
            <span>Total Kegiatan</span>
        </div>
    </div>

    <div class="content-card">

        <div class="card-title">
            <div>
                <h2>Daftar Kegiatan</h2>
                <p>Data kegiatan yang telah dibuat oleh Divisi Acara.</p>
            </div>
        </div>

        @if($kegiatans->count() > 0)

            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($kegiatans as $kegiatan)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $kegiatan->nama_kegiatan ?? '-' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $kegiatan->event?->nama_event ?? '-' }}
                                </td>

                                <td>
                                    {{ $kegiatan->tanggal
                                        ? \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y')
                                        : '-' }}
                                </td>

                                <td>
                                    {{ $kegiatan->waktu ?? '-' }}
                                </td>

                                <td>
                                    {{ $kegiatan->lokasi ?? '-' }}
                                </td>

                                <td>

                                    <div class="actions">

                                        <a
                                            href="{{ route('eo.kegiatan.show', $kegiatan) }}"
                                            class="btn-view">
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('eo.kegiatan.edit', $kegiatan) }}"
                                            class="btn-edit">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('eo.kegiatan.destroy', $kegiatan) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">

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

            <div class="empty-state">

                <div class="empty-icon">
                    K
                </div>

                <h3>Belum ada kegiatan</h3>

                <p>
                    Belum terdapat data kegiatan.
                    Silakan tambahkan kegiatan pertama.
                </p>

                <a
                    href="{{ route('eo.kegiatan.create') }}"
                    class="btn-primary">
                    + Tambah Kegiatan
                </a>

            </div>

        @endif

    </div>


    <style>

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .eyebrow {
            font-size: 12px;
            font-weight: 800;
            color: #15803d;
            letter-spacing: 1.5px;
        }

        .page-header h1 {
            margin: 6px 0;
            font-size: 30px;
            color: #172033;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
        }

        .btn-primary {
            display: inline-block;
            background: #166534;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 9px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #15803d;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 10px;
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
            font-weight: 600;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 15px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
        }

        .summary-card strong {
            display: block;
            font-size: 24px;
            color: #172033;
        }

        .summary-card span {
            color: #64748b;
            font-size: 13px;
        }

        .content-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-title {
            padding: 22px 24px;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-title h2 {
            margin: 0 0 5px;
            color: #172033;
            font-size: 20px;
        }

        .card-title p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 14px 16px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-top: 1px solid #eef2f7;
            color: #475569;
            font-size: 14px;
            vertical-align: middle;
        }

        td strong {
            color: #172033;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .actions a,
        .actions button {
            padding: 7px 10px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-view {
            background: #f1f5f9;
            color: #334155;
        }

        .btn-edit {
            background: #dcfce7;
            color: #166534;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: #dcfce7;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
        }

        .empty-state h3 {
            margin: 0 0 8px;
            color: #172033;
        }

        .empty-state p {
            margin: 0 auto 20px;
            max-width: 450px;
            color: #64748b;
        }

        @media (max-width: 700px) {

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header h1 {
                font-size: 25px;
            }

            .btn-primary {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</x-layouts.eo>
