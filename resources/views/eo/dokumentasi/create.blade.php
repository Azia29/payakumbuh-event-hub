<x-layouts.eo :user="$user" title="Tambah Dokumentasi">

<style>
    .doc-create {
        max-width: 1050px;
        margin: 0 auto;
    }

    /* HEADER */
    .create-head {
        margin-bottom: 22px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        text-decoration: none;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .back-link:hover {
        color: #15803d;
    }

    .create-head h1 {
        margin: 0;
        font-size: 27px;
        font-weight: 800;
        color: #172033;
    }

    .create-head p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    /* LAYOUT */
    .create-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.45fr) minmax(300px, .75fr);
        gap: 20px;
        align-items: start;
    }

    /* CARD */
    .create-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(15,23,42,.045);
        overflow: hidden;
    }

    .card-header {
        padding: 19px 22px;
        border-bottom: 1px solid #eef2f7;
    }

    .card-header h2 {
        margin: 0;
        font-size: 16px;
        font-weight: 750;
        color: #172033;
    }

    .card-header p {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    .card-body {
        padding: 22px;
    }

    /* FORM */
    .form-group {
        margin-bottom: 18px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 12px;
        font-weight: 750;
    }

    .required {
        color: #dc2626;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #dbe2ea;
        background: #f8fafc;
        border-radius: 10px;
        color: #334155;
        font-size: 12px;
        outline: none;
        transition: .2s;
    }

    .form-input,
    .form-select {
        height: 43px;
        padding: 0 13px;
    }

    .form-textarea {
        min-height: 115px;
        padding: 12px 13px;
        resize: vertical;
        font-family: inherit;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        background: white;
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(34,197,94,.08);
    }

    .form-help {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    .field-error {
        margin-top: 5px;
        color: #dc2626;
        font-size: 10px;
        font-weight: 600;
    }

    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    /* TYPE SELECT */
    .type-options {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 9px;
    }

    .type-option {
        position: relative;
    }

    .type-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .type-option label {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .type-option input:checked + label {
        border-color: #4ade80;
        background: #f0fdf4;
        color: #15803d;
        box-shadow: 0 0 0 2px rgba(34,197,94,.08);
    }

    .type-option label:hover {
        border-color: #86efac;
    }

    /* UPLOAD */
    .upload-box {
        border: 1.5px dashed #a7f3d0;
        border-radius: 15px;
        background: #f8fffa;
        padding: 25px 18px;
        text-align: center;
        cursor: pointer;
        transition: .2s;
    }

    .upload-box:hover,
    .upload-box.dragover {
        background: #f0fdf4;
        border-color: #22c55e;
    }

    .upload-icon {
        width: 56px;
        height: 56px;
        margin: 0 auto;
        border-radius: 15px;
        background: #dcfce7;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    .upload-title {
        margin-top: 12px;
        color: #334155;
        font-size: 13px;
        font-weight: 750;
    }

    .upload-text {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.6;
    }

    .upload-button {
        display: inline-flex;
        margin-top: 12px;
        padding: 9px 13px;
        border-radius: 8px;
        background: #15803d;
        color: white;
        font-size: 10px;
        font-weight: 700;
    }

    #fileInput {
        display: none;
    }

    /* FILE PREVIEW */
    .preview-box {
        display: none;
        margin-top: 14px;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        overflow: hidden;
        background: white;
    }

    .preview-media {
        background: #f8fafc;
        min-height: 170px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .preview-media img,
    .preview-media video {
        display: block;
        max-width: 100%;
        max-height: 260px;
        object-fit: contain;
    }

    .preview-document {
        width: 75px;
        height: 75px;
        border-radius: 16px;
        background: #fff7ed;
        color: #c2410c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 800;
    }

    .preview-info {
        padding: 12px 14px;
        border-top: 1px solid #eef2f7;
    }

    .preview-name {
        color: #334155;
        font-size: 11px;
        font-weight: 700;
        word-break: break-word;
    }

    .preview-size {
        margin-top: 4px;
        color: #94a3b8;
        font-size: 10px;
    }

    /* SIDE INFO */
    .info-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .info-item {
        display: flex;
        gap: 11px;
        padding: 12px;
        border: 1px solid #e5e7eb;
        border-radius: 11px;
        background: #fafafa;
    }

    .info-number {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
        border-radius: 8px;
        background: #f0fdf4;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
    }

    .info-item strong {
        display: block;
        color: #334155;
        font-size: 11px;
    }

    .info-item span {
        display: block;
        margin-top: 3px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.5;
    }

    .notice {
        margin-top: 15px;
        padding: 13px;
        border-radius: 11px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        font-size: 10px;
        line-height: 1.6;
    }

    /* FOOTER */
    .form-footer {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
        gap: 9px;
    }

    .btn-cancel,
    .btn-save {
        min-height: 42px;
        padding: 0 17px;
        border-radius: 10px;
        font-size: 11px;
        font-weight: 750;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .btn-cancel {
        background: white;
        border: 1px solid #dbe2ea;
        color: #64748b;
    }

    .btn-cancel:hover {
        background: #f8fafc;
    }

    .btn-save {
        border: none;
        background: #15803d;
        color: white;
        box-shadow: 0 5px 12px rgba(21,128,61,.14);
    }

    .btn-save:hover {
        background: #166534;
    }

    /* RESPONSIVE */
    @media(max-width: 850px) {

        .create-grid {
            grid-template-columns: 1fr;
        }

    }

    @media(max-width: 600px) {

        .two-column,
        .type-options {
            grid-template-columns: 1fr;
        }

        .form-footer {
            flex-direction: column;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
        }

    }
</style>


<div class="doc-create">

    {{-- HEADER --}}
    <div class="create-head">

        <a
            href="{{ route('eo.dokumentasi.index') }}"
            class="back-link"
        >
            ← Kembali ke Arsip Dokumentasi
        </a>

        <h1>Tambah Dokumentasi</h1>

        <p>
            Tambahkan foto, video, atau dokumen dari kegiatan event.
        </p>

    </div>


    {{-- FORM --}}
    <form
        action="{{ route('eo.dokumentasi.store') }}"
        method="POST"
        enctype="multipart/form-data"
        id="documentationForm"
    >

        @csrf


        <div class="create-grid">

            {{-- FORM UTAMA --}}
            <div class="create-card">

                <div class="card-header">

                    <h2>Informasi Dokumentasi</h2>

                    <p>
                        Lengkapi informasi sebelum menyimpan dokumentasi.
                    </p>

                </div>


                <div class="card-body">

                    {{-- EVENT --}}
                    <div class="form-group">

                        <label class="form-label">
                            Event <span class="required">*</span>
                        </label>

                        <select
                            name="event_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Pilih Event
                            </option>

                            @foreach($events as $event)

                                <option
                                    value="{{ $event->id }}"
                                    {{ old('event_id') == $event->id ? 'selected' : '' }}
                                >
                                    {{ $event->nama_event }}
                                </option>

                            @endforeach

                        </select>

                        @error('event_id')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JUDUL --}}
                    <div class="form-group">

                        <label class="form-label">
                            Judul Dokumentasi
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-input"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Dokumentasi Pembukaan Event"
                            maxlength="255"
                            required
                        >

                        @error('judul')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- JENIS --}}
                    <div class="form-group">

                        <label class="form-label">
                            Jenis Dokumentasi
                            <span class="required">*</span>
                        </label>

                        <div class="type-options">

                            <div class="type-option">

                                <input
                                    type="radio"
                                    id="typeFoto"
                                    name="jenis"
                                    value="Foto"
                                    {{ old('jenis', 'Foto') === 'Foto' ? 'checked' : '' }}
                                >

                                <label for="typeFoto">
                                    Foto
                                </label>

                            </div>


                            <div class="type-option">

                                <input
                                    type="radio"
                                    id="typeVideo"
                                    name="jenis"
                                    value="Video"
                                    {{ old('jenis') === 'Video' ? 'checked' : '' }}
                                >

                                <label for="typeVideo">
                                    Video
                                </label>

                            </div>


                            <div class="type-option">

                                <input
                                    type="radio"
                                    id="typeDokumen"
                                    name="jenis"
                                    value="Dokumen"
                                    {{ old('jenis') === 'Dokumen' ? 'checked' : '' }}
                                >

                                <label for="typeDokumen">
                                    Dokumen
                                </label>

                            </div>

                        </div>

                        @error('jenis')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- TANGGAL --}}
                    <div class="form-group">

                        <label class="form-label">
                            Tanggal Dokumentasi
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="form-input"
                            value="{{ old('tanggal', now()->format('Y-m-d')) }}"
                            required
                        >

                        @error('tanggal')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="form-group">

                        <label class="form-label">
                            Keterangan
                        </label>

                        <textarea
                            name="keterangan"
                            class="form-textarea"
                            placeholder="Tambahkan keterangan mengenai dokumentasi ini..."
                        >{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- FILE --}}
                    <div class="form-group">

                        <label class="form-label">
                            File Dokumentasi
                        </label>

                        <div
                            class="upload-box"
                            id="uploadBox"
                        >

                            <div class="upload-icon">
                                UP
                            </div>

                            <div class="upload-title">
                                Pilih File Dokumentasi
                            </div>

                            <div class="upload-text">
                                Klik area ini atau tombol di bawah untuk memilih file.
                                Maksimal ukuran file 10 MB.
                            </div>

                            <span class="upload-button">
                                Pilih File
                            </span>

                            <input
                                type="file"
                                name="file"
                                id="fileInput"
                                accept="image/*,video/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                            >

                        </div>


                        <div class="form-help">
                            Foto, video, PDF, Word, Excel, dan PowerPoint dapat dipilih.
                        </div>

                        @error('file')
                            <div class="field-error">
                                {{ $message }}
                            </div>
                        @enderror


                        {{-- PREVIEW --}}
                        <div
                            class="preview-box"
                            id="previewBox"
                        >

                            <div
                                class="preview-media"
                                id="previewMedia"
                            ></div>

                            <div class="preview-info">

                                <div
                                    class="preview-name"
                                    id="previewName"
                                ></div>

                                <div
                                    class="preview-size"
                                    id="previewSize"
                                ></div>

                            </div>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <div class="form-footer">

                        <a
                            href="{{ route('eo.dokumentasi.index') }}"
                            class="btn-cancel"
                        >
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="btn-save"
                        >
                            Simpan Dokumentasi
                        </button>

                    </div>

                </div>

            </div>


            {{-- INFO --}}
            <div class="create-card">

                <div class="card-header">

                    <h2>Petunjuk Pengisian</h2>

                    <p>
                        Ikuti langkah berikut agar arsip rapi.
                    </p>

                </div>


                <div class="card-body">

                    <div class="info-list">

                        <div class="info-item">

                            <div class="info-number">
                                01
                            </div>

                            <div>
                                <strong>Pilih Event</strong>

                                <span>
                                    Tentukan event yang berkaitan dengan dokumentasi.
                                </span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-number">
                                02
                            </div>

                            <div>
                                <strong>Isi Judul</strong>

                                <span>
                                    Gunakan judul yang singkat dan mudah dicari.
                                </span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-number">
                                03
                            </div>

                            <div>
                                <strong>Pilih Jenis</strong>

                                <span>
                                    Tentukan apakah file berupa foto, video, atau dokumen.
                                </span>
                            </div>

                        </div>


                        <div class="info-item">

                            <div class="info-number">
                                04
                            </div>

                            <div>
                                <strong>Upload File</strong>

                                <span>
                                    Pilih file dokumentasi yang akan disimpan.
                                </span>
                            </div>

                        </div>

                    </div>


                    <div class="notice">
                        File yang diunggah akan disimpan sebagai arsip
                        dokumentasi event dan dapat dikelola kembali
                        melalui halaman Kelola Dokumentasi.
                    </div>

                </div>

            </div>

        </div>

    </form>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const uploadBox = document.getElementById('uploadBox');
    const fileInput = document.getElementById('fileInput');
    const previewBox = document.getElementById('previewBox');
    const previewMedia = document.getElementById('previewMedia');
    const previewName = document.getElementById('previewName');
    const previewSize = document.getElementById('previewSize');
    const form = document.getElementById('documentationForm');

    function formatSize(bytes) {

        if (bytes < 1024) {
            return bytes + ' B';
        }

        if (bytes < 1024 * 1024) {
            return (bytes / 1024).toFixed(1) + ' KB';
        }

        return (bytes / (1024 * 1024)).toFixed(2) + ' MB';

    }


    function showPreview(file) {

        if (!file) {
            return;
        }

        previewMedia.innerHTML = '';

        previewName.textContent = file.name;
        previewSize.textContent =
            formatSize(file.size);

        const fileType = file.type || '';
        const extension =
            file.name.split('.').pop().toLowerCase();


        /* IMAGE */

        if (fileType.startsWith('image/')) {

            const img =
                document.createElement('img');

            img.src =
                URL.createObjectURL(file);

            img.alt =
                'Preview dokumentasi';

            previewMedia.appendChild(img);

        }


        /* VIDEO */

        else if (fileType.startsWith('video/')) {

            const video =
                document.createElement('video');

            video.src =
                URL.createObjectURL(file);

            video.controls = true;

            previewMedia.appendChild(video);

        }


        /* DOCUMENT */

        else {

            const documentBox =
                document.createElement('div');

            documentBox.className =
                'preview-document';

            documentBox.textContent =
                extension.toUpperCase();

            previewMedia.appendChild(
                documentBox
            );

        }


        previewBox.style.display = 'block';

    }


    uploadBox.addEventListener(
        'click',
        function () {
            fileInput.click();
        }
    );


    fileInput.addEventListener(
        'change',
        function () {

            const file =
                this.files[0];

            showPreview(file);

        }
    );


    uploadBox.addEventListener(
        'dragover',
        function (event) {

            event.preventDefault();

            uploadBox.classList.add(
                'dragover'
            );

        }
    );


    uploadBox.addEventListener(
        'dragleave',
        function () {

            uploadBox.classList.remove(
                'dragover'
            );

        }
    );


    uploadBox.addEventListener(
        'drop',
        function (event) {

            event.preventDefault();

            uploadBox.classList.remove(
                'dragover'
            );

            const files =
                event.dataTransfer.files;

            if (files.length) {

                fileInput.files =
                    files;

                showPreview(files[0]);

            }

        }
    );


    form.addEventListener(
        'submit',
        function (event) {

            const file =
                fileInput.files[0];

            if (file && file.size > 10 * 1024 * 1024) {

                event.preventDefault();

                alert(
                    'Ukuran file maksimal 10 MB.'
                );

                return;

            }

        }
    );

});

</script>

</x-layouts.eo>