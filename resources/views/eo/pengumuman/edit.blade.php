<x-layouts.eo :user="$user" title="Edit Pengumuman">

    <div class="page-header">
        <div>
            <a href="{{ route('eo.pengumuman.show', $pengumuman) }}" class="back">
                ← Kembali ke Detail
            </a>

            <h1>Edit Pengumuman</h1>
            <p>Perbarui informasi pengumuman sebelum diajukan kepada Admin.</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert error">
            <strong>Periksa kembali data berikut:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eo.pengumuman.update', $pengumuman) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-card">

                <div class="card-title">
                    <div>
                        <h3>Informasi Pengumuman</h3>
                        <p>Lengkapi isi pengumuman dengan jelas dan informatif.</p>
                    </div>

                    <span class="status {{ $pengumuman->status }}">
                        {{ $pengumuman->status === 'ditolak' ? 'Ditolak' : 'Draft' }}
                    </span>
                </div>

                <div class="field">
                    <label for="judul">
                        Judul Pengumuman <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        value="{{ old('judul', $pengumuman->judul) }}"
                        placeholder="Masukkan judul pengumuman"
                        required
                    >
                </div>

                <div class="field">
                    <label for="event_id">
                        Terkait Event
                    </label>

                    <select id="event_id" name="event_id">
                        <option value="">-- Pengumuman Umum --</option>

                        @foreach ($events as $event)
                            <option
                                value="{{ $event->id }}"
                                @selected(old('event_id', $pengumuman->event_id) == $event->id)
                            >
                                {{ $event->nama_event }}
                            </option>
                        @endforeach
                    </select>

                    <small>
                        Pilih event jika pengumuman berkaitan dengan kegiatan tertentu.
                    </small>
                </div>

                <div class="field">
                    <label for="isi">
                        Isi Pengumuman <span>*</span>
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        rows="12"
                        placeholder="Tuliskan isi pengumuman..."
                        required
                    >{{ old('isi', $pengumuman->isi) }}</textarea>
                </div>

            </div>

            <div class="side-column">

                @if ($pengumuman->status === 'ditolak' && $pengumuman->catatan_admin)

                    <div class="note-card">
                        <div class="note-icon">!</div>

                        <div>
                            <strong>Catatan Admin</strong>

                            <p>
                                {{ $pengumuman->catatan_admin }}
                            </p>
                        </div>
                    </div>

                @endif

                <div class="info-card">

                    <h3>Alur Pengumuman</h3>

                    <div class="step active">
                        <span>1</span>

                        <div>
                            <strong>Humas membuat</strong>
                            <small>
                                Edit dan lengkapi pengumuman.
                            </small>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="step">
                        <span>2</span>

                        <div>
                            <strong>Ajukan ke Admin</strong>
                            <small>
                                Pengumuman diperiksa Admin EO.
                            </small>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="step">
                        <span>3</span>

                        <div>
                            <strong>Publikasi</strong>
                            <small>
                                Admin yang menentukan persetujuan.
                            </small>
                        </div>
                    </div>

                </div>

                <div class="action-card">

                    <button type="submit" class="btn-save">
                        Simpan Perubahan
                    </button>

                    <a
                        href="{{ route('eo.pengumuman.show', $pengumuman) }}"
                        class="btn-cancel"
                    >
                        Batal
                    </a>

                </div>

            </div>

        </div>
    </form>

    <style>

        .page-header {
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

        .alert {
            padding:15px 18px;
            border-radius:12px;
            margin-bottom:20px;
            font-size:14px;
        }

        .alert.error {
            background:#fff1f2;
            border:1px solid #fecdd3;
            color:#9f1239;
        }

        .alert ul {
            margin:8px 0 0 20px;
        }

        .form-grid {
            display:grid;
            grid-template-columns:minmax(0,1fr) 320px;
            gap:20px;
            align-items:start;
        }

        .form-card,
        .info-card,
        .action-card,
        .note-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .form-card {
            padding:28px;
        }

        .card-title {
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:15px;
            margin-bottom:25px;
        }

        .card-title h3,
        .info-card h3 {
            margin:0 0 6px;
            color:#1f2937;
        }

        .card-title p {
            margin:0;
            color:#64748b;
            font-size:13px;
        }

        .status {
            padding:7px 11px;
            border-radius:8px;
            font-size:12px;
            font-weight:700;
            white-space:nowrap;
        }

        .status.draft {
            background:#f1f5f9;
            color:#475569;
        }

        .status.ditolak {
            background:#fee2e2;
            color:#991b1b;
        }

        .field {
            margin-bottom:21px;
        }

        .field:last-child {
            margin-bottom:0;
        }

        .field label {
            display:block;
            margin-bottom:8px;
            color:#334155;
            font-weight:600;
            font-size:14px;
        }

        .field label span {
            color:#dc2626;
        }

        .field input,
        .field select,
        .field textarea {
            width:100%;
            box-sizing:border-box;
            border:1px solid #dbe2ea;
            border-radius:10px;
            padding:11px 13px;
            font:inherit;
            color:#334155;
            background:#fff;
            outline:none;
            transition:.2s;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color:#16a34a;
            box-shadow:0 0 0 3px rgba(22,163,74,.10);
        }

        .field textarea {
            resize:vertical;
            min-height:230px;
            line-height:1.6;
        }

        .field small {
            display:block;
            margin-top:6px;
            color:#94a3b8;
            font-size:12px;
        }

        .side-column {
            display:grid;
            gap:16px;
        }

        .note-card {
            display:flex;
            gap:12px;
            padding:16px;
            background:#fff7ed;
            border-color:#fed7aa;
        }

        .note-icon {
            flex:0 0 28px;
            width:28px;
            height:28px;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#f97316;
            color:#fff;
            font-weight:800;
        }

        .note-card strong {
            color:#9a3412;
            font-size:14px;
        }

        .note-card p {
            margin:6px 0 0;
            color:#7c2d12;
            font-size:13px;
            line-height:1.5;
        }

        .info-card {
            padding:22px;
        }

        .info-card h3 {
            margin-bottom:18px;
        }

        .step {
            display:flex;
            gap:12px;
            align-items:flex-start;
        }

        .step > span {
            width:27px;
            height:27px;
            flex:0 0 27px;
            border-radius:50%;
            background:#f1f5f9;
            color:#64748b;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:12px;
            font-weight:700;
        }

        .step.active > span {
            background:#dcfce7;
            color:#166534;
        }

        .step strong {
            display:block;
            color:#334155;
            font-size:13px;
        }

        .step small {
            display:block;
            margin-top:3px;
            color:#94a3b8;
            line-height:1.4;
            font-size:11px;
        }

        .line {
            width:1px;
            height:16px;
            background:#e2e8f0;
            margin:3px 0 3px 13px;
        }

        .action-card {
            padding:18px;
        }

        .btn-save,
        .btn-cancel {
            display:block;
            width:100%;
            box-sizing:border-box;
            text-align:center;
            padding:11px 14px;
            border-radius:9px;
            font-weight:600;
            text-decoration:none;
            cursor:pointer;
            font-size:14px;
        }

        .btn-save {
            border:0;
            background:#16a34a;
            color:#fff;
        }

        .btn-cancel {
            margin-top:9px;
            background:#f8fafc;
            color:#475569;
            border:1px solid #e2e8f0;
        }

        @media(max-width:850px) {
            .form-grid {
                grid-template-columns:1fr;
            }
        }

        @media(max-width:600px) {
            .form-card {
                padding:20px;
            }

            .card-title {
                flex-direction:column;
            }
        }

    </style>

</x-layouts.eo>