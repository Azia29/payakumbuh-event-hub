<x-layouts.eo :user="$user" title="Buat Publikasi">

    <div class="page-header">
        <div>
            <h1>Buat Publikasi Event</h1>
            <p>Buat berita atau informasi untuk dipublikasikan melalui divisi Humas.</p>
        </div>

        <a href="{{ route('eo.publikasi.index') }}" class="btn-secondary">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eo.publikasi.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="form-layout">

            <div class="main-card">

                <div class="card-header">
                    <h2>Informasi Publikasi</h2>
                    <p>Masukkan informasi utama yang akan ditampilkan kepada masyarakat.</p>
                </div>

                <div class="form-body">

                    <div class="form-group">
                        <label for="judul">
                            Judul Publikasi <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Festival Batiah Kota Payakumbuh 2026"
                            required>

                        @error('judul')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="jenis">
                                Jenis Publikasi <span>*</span>
                            </label>

                            <select id="jenis" name="jenis" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Berita" {{ old('jenis') == 'Berita' ? 'selected' : '' }}>
                                    Berita
                                </option>
                                <option value="Informasi" {{ old('jenis') == 'Informasi' ? 'selected' : '' }}>
                                    Informasi
                                </option>
                                <option value="Pengumuman" {{ old('jenis') == 'Pengumuman' ? 'selected' : '' }}>
                                    Pengumuman
                                </option>
                                <option value="Press Release" {{ old('jenis') == 'Press Release' ? 'selected' : '' }}>
                                    Press Release
                                </option>
                                <option value="Promosi Event" {{ old('jenis') == 'Promosi Event' ? 'selected' : '' }}>
                                    Promosi Event
                                </option>
                            </select>

                            @error('jenis')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="event_id">Event Terkait</label>

                            <select id="event_id" name="event_id">
                                <option value="">-- Publikasi Umum --</option>

                                @foreach($events as $event)
                                    <option
                                        value="{{ $event->id }}"
                                        {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                        {{ $event->nama_event }}
                                    </option>
                                @endforeach
                            </select>

                            <small class="helper-text">
                                Pilih event jika publikasi berkaitan dengan kegiatan tertentu.
                            </small>

                            @error('event_id')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="isi">
                            Isi Publikasi <span>*</span>
                        </label>

                        <textarea
                            id="isi"
                            name="isi"
                            rows="12"
                            placeholder="Tulis isi berita atau informasi publikasi di sini..."
                            required>{{ old('isi') }}</textarea>

                        @error('isi')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Publikasi</label>

                        <div class="upload-box">
                            <input
                                type="file"
                                id="gambar"
                                name="gambar"
                                accept="image/*">

                            <div>
                                <strong>Upload gambar</strong>
                                <small>JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.</small>
                            </div>
                        </div>

                        @error('gambar')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

            </div>

            <div class="side-card">

                <div class="card-header">
                    <h2>Status Publikasi</h2>
                </div>

                <div class="status-info">

                    <div class="status-icon">
                        DR
                    </div>

                    <div>
                        <strong>Draft</strong>
                        <p>
                            Publikasi akan disimpan sebagai draft terlebih dahulu.
                        </p>
                    </div>

                </div>

                <div class="workflow">

                    <div class="workflow-item active">
                        <span>1</span>
                        <div>
                            <strong>Buat Publikasi</strong>
                            <small>Humas membuat materi publikasi.</small>
                        </div>
                    </div>

                    <div class="workflow-line"></div>

                    <div class="workflow-item">
                        <span>2</span>
                        <div>
                            <strong>Ajukan</strong>
                            <small>Materi diajukan kepada Admin.</small>
                        </div>
                    </div>

                    <div class="workflow-line"></div>

                    <div class="workflow-item">
                        <span>3</span>
                        <div>
                            <strong>Review Admin</strong>
                            <small>Admin menyetujui atau menolak.</small>
                        </div>
                    </div>

                    <div class="workflow-line"></div>

                    <div class="workflow-item">
                        <span>4</span>
                        <div>
                            <strong>Publikasi</strong>
                            <small>Materi dipublikasikan setelah disetujui.</small>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('eo.publikasi.index') }}" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan sebagai Draft
            </button>
        </div>

    </form>

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

        .form-layout {
            display:grid;
            grid-template-columns:minmax(0, 1fr) 320px;
            gap:22px;
        }

        .main-card,
        .side-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:14px;
            box-shadow:0 3px 12px rgba(15,23,42,.05);
            overflow:hidden;
        }

        .card-header {
            padding:20px 22px;
            border-bottom:1px solid #e5e7eb;
        }

        .card-header h2 {
            margin:0 0 5px;
            color:#1f2937;
            font-size:18px;
        }

        .card-header p {
            margin:0;
            color:#64748b;
            font-size:13px;
        }

        .form-body {
            padding:22px;
        }

        .form-group {
            margin-bottom:20px;
        }

        .form-group:last-child {
            margin-bottom:0;
        }

        label {
            display:block;
            margin-bottom:8px;
            color:#334155;
            font-size:14px;
            font-weight:700;
        }

        label span {
            color:#ef4444;
        }

        input[type="text"],
        select,
        textarea {
            width:100%;
            box-sizing:border-box;
            border:1px solid #dbe2ea;
            border-radius:9px;
            padding:11px 13px;
            font-family:inherit;
            font-size:14px;
            color:#1f2937;
            background:#fff;
            outline:none;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color:#10b981;
            box-shadow:0 0 0 3px rgba(16,185,129,.10);
        }

        textarea {
            resize:vertical;
            line-height:1.6;
        }

        .form-row {
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }

        .helper-text {
            display:block;
            margin-top:6px;
            color:#94a3b8;
            font-size:12px;
        }

        .error-text {
            display:block;
            margin-top:6px;
            color:#dc2626;
            font-size:12px;
        }

        .alert-error {
            background:#fef2f2;
            color:#b91c1c;
            border:1px solid #fecaca;
            padding:14px 18px;
            border-radius:10px;
            margin-bottom:20px;
        }

        .alert-error ul {
            margin:7px 0 0 20px;
        }

        .upload-box {
            display:flex;
            align-items:center;
            gap:15px;
            padding:18px;
            border:1px dashed #cbd5e1;
            border-radius:10px;
            background:#f8fafc;
        }

        .upload-box input {
            max-width:100%;
        }

        .upload-box strong {
            display:block;
            color:#334155;
            font-size:13px;
            margin-bottom:3px;
        }

        .upload-box small {
            color:#94a3b8;
            font-size:11px;
        }

        .status-info {
            display:flex;
            gap:12px;
            padding:20px;
        }

        .status-icon {
            min-width:42px;
            height:42px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#f1f5f9;
            color:#475569;
            border-radius:11px;
            font-size:11px;
            font-weight:800;
        }

        .status-info strong {
            color:#1f2937;
            font-size:14px;
        }

        .status-info p {
            margin:4px 0 0;
            color:#64748b;
            font-size:12px;
            line-height:1.5;
        }

        .workflow {
            padding:0 20px 20px;
        }

        .workflow-item {
            display:flex;
            gap:12px;
            align-items:flex-start;
        }

        .workflow-item > span {
            width:28px;
            height:28px;
            min-width:28px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            background:#f1f5f9;
            color:#64748b;
            font-size:11px;
            font-weight:800;
        }

        .workflow-item.active > span {
            background:#10b981;
            color:white;
        }

        .workflow-item strong {
            display:block;
            color:#334155;
            font-size:12px;
            margin-bottom:3px;
        }

        .workflow-item small {
            color:#94a3b8;
            font-size:11px;
            line-height:1.4;
        }

        .workflow-line {
            width:1px;
            height:20px;
            background:#e2e8f0;
            margin:3px 0 3px 14px;
        }

        .form-actions {
            display:flex;
            justify-content:flex-end;
            gap:10px;
            margin-top:22px;
        }

        .btn-primary,
        .btn-secondary {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:11px 18px;
            border-radius:9px;
            font-size:13px;
            font-weight:700;
            text-decoration:none;
            border:0;
            cursor:pointer;
        }

        .btn-primary {
            background:#10b981;
            color:white;
        }

        .btn-primary:hover {
            background:#059669;
        }

        .btn-secondary {
            background:#f1f5f9;
            color:#475569;
        }

        .btn-secondary:hover {
            background:#e2e8f0;
        }

        @media(max-width:900px) {
            .form-layout {
                grid-template-columns:1fr;
            }
        }

        @media(max-width:650px) {
            .page-header {
                flex-direction:column;
                align-items:flex-start;
            }

            .form-row {
                grid-template-columns:1fr;
            }

            .form-actions {
                justify-content:stretch;
            }

            .form-actions a,
            .form-actions button {
                flex:1;
            }
        }

    </style>

</x-layouts.eo>