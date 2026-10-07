<x-layouts.eo :user="$user" title="Kelola Dokumentasi">

<style>
    .documentation-page {
        padding: 0;
    }

    /* HEADER */
    .page-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .page-head h1 {
        margin: 0;
        font-size: 27px;
        font-weight: 800;
        color: #172033;
    }

    .page-head p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
    }

    .btn-add {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 0 17px;
        background: #15803d;
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        box-shadow: 0 5px 12px rgba(21,128,61,.16);
        transition: .2s;
        white-space: nowrap;
    }

    .btn-add:hover {
        background: #166534;
        color: white;
        transform: translateY(-1px);
    }

    .plus {
        font-size: 18px;
        line-height: 1;
        font-weight: 400;
    }

    /* ALERT */
    .alert-success {
        margin-bottom: 18px;
        padding: 13px 16px;
        border-radius: 11px;
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
        font-size: 12px;
        font-weight: 600;
    }

    /* TOOLBAR */
    .toolbar {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 17px;
        padding: 17px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(15,23,42,.04);
    }

    .toolbar-row {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 190px auto;
        gap: 11px;
        align-items: center;
    }

    .search-box,
    .filter-select {
        height: 42px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        color: #334155;
        font-size: 12px;
        outline: none;
        transition: .2s;
    }

    .search-box {
        width: 100%;
        padding: 0 14px;
    }

    .filter-select {
        width: 100%;
        padding: 0 12px;
    }

    .search-box:focus,
    .filter-select:focus {
        background: white;
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(34,197,94,.08);
    }

    .result-count {
        height: 42px;
        display: inline-flex;
        align-items: center;
        padding: 0 13px;
        border-radius: 10px;
        background: #f0fdf4;
        color: #15803d;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* TABLE CARD */
    .documentation-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(15,23,42,.045);
        overflow: hidden;
    }

    .card-head {
        padding: 19px 21px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .card-head-title {
        margin: 0;
        font-size: 16px;
        font-weight: 750;
        color: #172033;
    }

    .card-head-desc {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    /* TABLE */
    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .doc-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 850px;
    }

    .doc-table th {
        padding: 13px 17px;
        background: #f8fafc;
        color: #64748b;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 800;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .doc-table td {
        padding: 14px 17px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        color: #334155;
        font-size: 12px;
    }

    .doc-table tbody tr {
        transition: .15s;
    }

    .doc-table tbody tr:hover {
        background: #f8fafc;
    }

    .doc-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* FILE PREVIEW */
    .file-preview {
        width: 55px;
        height: 55px;
        border-radius: 12px;
        overflow: hidden;
        background: #f0fdf4;
        border: 1px solid #dcfce7;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #15803d;
        font-size: 11px;
        font-weight: 800;
        flex-shrink: 0;
    }

    .file-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .file-info {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 230px;
    }

    .file-title {
        font-size: 13px;
        font-weight: 750;
        color: #1e293b;
        max-width: 260px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-subtitle {
        margin-top: 4px;
        color: #94a3b8;
        font-size: 10px;
    }

    /* TYPE */
    .type-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 62px;
        padding: 6px 9px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 800;
    }

    .type-foto {
        background: #eff6ff;
        color: #2563eb;
    }

    .type-video {
        background: #fef2f2;
        color: #dc2626;
    }

    .type-dokumen {
        background: #fff7ed;
        color: #c2410c;
    }

    .type-other {
        background: #f1f5f9;
        color: #475569;
    }

    /* EVENT */
    .event-name {
        font-weight: 650;
        color: #334155;
        max-width: 200px;
    }

    .date-text {
        color: #64748b;
        font-size: 11px;
        white-space: nowrap;
    }

    /* ACTION */
    .action-group {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 32px;
        padding: 0 9px;
        border-radius: 8px;
        text-decoration: none;
        border: 1px solid #e2e8f0;
        background: white;
        color: #475569;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .action-btn:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #1e293b;
    }

    .action-edit:hover {
        background: #f0fdf4;
        border-color: #86efac;
        color: #15803d;
    }

    .action-delete {
        color: #dc2626;
    }

    .action-delete:hover {
        background: #fef2f2;
        border-color: #fecaca;
        color: #b91c1c;
    }

    /* EMPTY */
    .empty-state {
        text-align: center;
        padding: 65px 20px;
    }

    .empty-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto;
        border-radius: 17px;
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #dcfce7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 800;
    }

    .empty-title {
        margin-top: 14px;
        font-size: 15px;
        font-weight: 750;
        color: #334155;
    }

    .empty-text {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 12px;
    }

    .empty-action {
        display: inline-flex;
        margin-top: 17px;
        padding: 10px 14px;
        border-radius: 9px;
        background: #15803d;
        color: white;
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
    }

    /* MOBILE */
    @media(max-width: 750px) {

        .page-head {
            flex-direction: column;
        }

        .btn-add {
            width: 100%;
        }

        .toolbar-row {
            grid-template-columns: 1fr;
        }

        .result-count {
            justify-content: center;
        }
    }
</style>


<div class="documentation-page">

    {{-- PAGE HEADER --}}
    <div class="page-head">

        <div>
            <h1>Kelola Dokumentasi</h1>

            <p>
                Kelola seluruh foto, video, dan dokumen
                dari setiap kegiatan event.
            </p>
        </div>

        <a
            href="{{ route('eo.dokumentasi.create') }}"
            class="btn-add"
        >
            <span class="plus">+</span>
            Tambah Dokumentasi
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- TOOLBAR --}}
    <div class="toolbar">

        <div class="toolbar-row">

            <input
                type="text"
                id="searchDocumentation"
                class="search-box"
                placeholder="Cari judul, event, atau keterangan..."
            >

            <select
                id="filterType"
                class="filter-select"
            >
                <option value="">Semua Jenis</option>
                <option value="foto">Foto</option>
                <option value="video">Video</option>
                <option value="dokumen">Dokumen</option>
            </select>

            <div
                class="result-count"
                id="resultCount"
            >
                {{ $dokumentasis->count() }} Dokumentasi
            </div>

        </div>

    </div>


    {{-- MAIN CARD --}}
    <div class="documentation-card">

        <div class="card-head">

            <div>
                <h2 class="card-head-title">
                    Arsip Dokumentasi
                </h2>

                <p class="card-head-desc">
                    Daftar dokumentasi yang tersimpan di sistem.
                </p>
            </div>

        </div>


        @if($dokumentasis->count())

            <div class="table-wrap">

                <table class="doc-table">

                    <thead>

                        <tr>
                            <th>Dokumentasi</th>
                            <th>Jenis</th>
                            <th>Event</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>


                    <tbody id="documentationTable">

                        @foreach($dokumentasis as $item)

                            @php
                                $jenis = strtolower(trim($item->jenis ?? ''));
                                $fileUrl = $item->file
                                    ? asset('storage/' . $item->file)
                                    : null;
                            @endphp

                            <tr
                                class="doc-row"
                                data-search="{{ strtolower(($item->judul ?? '') . ' ' . ($item->event?->nama_event ?? '') . ' ' . ($item->keterangan ?? '')) }}"
                                data-type="{{ $jenis }}"
                            >

                                {{-- DOKUMENTASI --}}
                                <td>

                                    <div class="file-info">

                                        <div class="file-preview">

                                            @if($fileUrl && $jenis === 'foto')

                                                <img
                                                    src="{{ $fileUrl }}"
                                                    alt="{{ $item->judul }}"
                                                >

                                            @elseif($jenis === 'video')

                                                VI

                                            @elseif($jenis === 'dokumen')

                                                DK

                                            @else

                                                FI

                                            @endif

                                        </div>


                                        <div>

                                            <div class="file-title">
                                                {{ $item->judul }}
                                            </div>

                                            <div class="file-subtitle">
                                                {{ $item->file ? basename($item->file) : 'Tidak ada file' }}
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                {{-- JENIS --}}
                                <td>

                                    @if($jenis === 'foto')

                                        <span class="type-badge type-foto">
                                            Foto
                                        </span>

                                    @elseif($jenis === 'video')

                                        <span class="type-badge type-video">
                                            Video
                                        </span>

                                    @elseif($jenis === 'dokumen')

                                        <span class="type-badge type-dokumen">
                                            Dokumen
                                        </span>

                                    @else

                                        <span class="type-badge type-other">
                                            {{ $item->jenis ?: 'Lainnya' }}
                                        </span>

                                    @endif

                                </td>


                                {{-- EVENT --}}
                                <td>

                                    <div class="event-name">
                                        {{ $item->event?->nama_event ?? '-' }}
                                    </div>

                                </td>


                                {{-- TANGGAL --}}
                                <td>

                                    <div class="date-text">
                                        {{ $item->tanggal?->format('d M Y') ?? '-' }}
                                    </div>

                                </td>


                                {{-- AKSI --}}
                                <td>

                                    <div class="action-group">

                                        <a
                                            href="{{ route('eo.dokumentasi.show', $item) }}"
                                            class="action-btn"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('eo.dokumentasi.edit', $item) }}"
                                            class="action-btn action-edit"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('eo.dokumentasi.destroy', $item) }}"
                                            method="POST"
                                            onsubmit="return confirm('Hapus dokumentasi ini?')"
                                            style="display:inline;"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn action-delete"
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

            {{-- EMPTY FILTER --}}
            <div
                id="filterEmpty"
                class="empty-state"
                style="display:none;"
            >

                <div class="empty-icon">
                    SR
                </div>

                <div class="empty-title">
                    Dokumentasi tidak ditemukan
                </div>

                <div class="empty-text">
                    Coba gunakan kata pencarian atau filter yang berbeda.
                </div>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    DK
                </div>

                <div class="empty-title">
                    Belum Ada Dokumentasi
                </div>

                <div class="empty-text">
                    Belum ada foto, video, atau dokumen yang tersimpan.
                </div>

                <a
                    href="{{ route('eo.dokumentasi.create') }}"
                    class="empty-action"
                >
                    Tambah Dokumentasi
                </a>

            </div>

        @endif

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchDocumentation');
    const filterType = document.getElementById('filterType');
    const rows = document.querySelectorAll('.doc-row');
    const resultCount = document.getElementById('resultCount');
    const filterEmpty = document.getElementById('filterEmpty');

    function filterDocumentation() {

        const search = (searchInput?.value || '').toLowerCase().trim();
        const type = (filterType?.value || '').toLowerCase();

        let visible = 0;

        rows.forEach(function (row) {

            const rowSearch = row.dataset.search || '';
            const rowType = row.dataset.type || '';

            const matchSearch =
                search === '' ||
                rowSearch.includes(search);

            const matchType =
                type === '' ||
                rowType === type;

            if (matchSearch && matchType) {

                row.style.display = '';
                visible++;

            } else {

                row.style.display = 'none';

            }

        });

        if (resultCount) {

            resultCount.textContent =
                visible + ' Dokumentasi';

        }

        if (filterEmpty) {

            filterEmpty.style.display =
                visible === 0 ? 'block' : 'none';

        }

    }

    if (searchInput) {
        searchInput.addEventListener(
            'input',
            filterDocumentation
        );
    }

    if (filterType) {
        filterType.addEventListener(
            'change',
            filterDocumentation
        );
    }

});

</script>

</x-layouts.eo>