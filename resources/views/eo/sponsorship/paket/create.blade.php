<x-layouts.eo :user="$user" title="Tambah Paket Sponsorship">

<style>
/* =========================================================
   EO SPONSORSHIP - CREATE PACKAGE
========================================================= */

.package-create-page {
    min-height: 100%;
    padding: 30px 34px 60px;
    background: #f6f8f7;
    color: #0f172a;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system,
        BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.package-container {
    max-width: 1240px;
    margin: 0 auto;
}

/* HEADER */

.package-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 24px;
    margin-bottom: 26px;
}

.package-heading {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}

.package-heading-icon {
    width: 54px;
    height: 54px;
    border-radius: 16px;
    background: linear-gradient(135deg, #059669, #10b981);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    font-weight: 900;
    box-shadow: 0 8px 20px rgba(5,150,105,.20);
    flex-shrink: 0;
}

.package-eyebrow {
    color: #059669;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.package-title {
    margin: 0;
    font-size: 30px;
    line-height: 1.2;
    font-weight: 850;
    letter-spacing: -.7px;
    color: #0f172a;
}

.package-subtitle {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
}

.package-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 42px;
    padding: 0 16px;
    border-radius: 10px;
    border: 1px solid #dce5e1;
    background: #fff;
    color: #475569;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 2px 7px rgba(15,23,42,.04);
    transition: .2s;
}

.package-back:hover {
    border-color: #10b981;
    color: #047857;
}

/* INFO BAR */

.package-info-bar {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 22px;
}

.info-mini {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 17px;
    background: #fff;
    border: 1px solid #e6ece9;
    border-radius: 13px;
    box-shadow: 0 3px 12px rgba(15,23,42,.035);
}

.info-mini-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 900;
}

.info-mini strong {
    display: block;
    font-size: 12px;
    color: #334155;
    margin-bottom: 2px;
}

.info-mini span {
    display: block;
    font-size: 11px;
    color: #94a3b8;
}

/* ERROR */

.package-error {
    background: #fff1f2;
    border: 1px solid #fecdd3;
    color: #9f1239;
    padding: 16px 18px;
    border-radius: 13px;
    margin-bottom: 20px;
    font-size: 13px;
}

.package-error strong {
    font-size: 14px;
}

.package-error ul {
    margin: 8px 0 0 18px;
    line-height: 1.7;
}

/* MAIN GRID */

.package-layout {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 340px;
    gap: 22px;
    align-items: start;
}

/* FORM CARD */

.form-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    box-shadow: 0 7px 25px rgba(15,23,42,.055);
    overflow: hidden;
}

.form-card-header {
    padding: 22px 25px;
    border-bottom: 1px solid #edf1ef;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.form-card-header-left {
    display: flex;
    gap: 13px;
    align-items: center;
}

.form-card-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 900;
}

.form-card-title {
    margin: 0;
    font-size: 16px;
    font-weight: 800;
    color: #0f172a;
}

.form-card-desc {
    margin: 3px 0 0;
    font-size: 12px;
    color: #94a3b8;
}

/* FORM */

.form-content {
    padding: 27px 25px;
}

.form-section {
    margin-bottom: 30px;
}

.form-section:last-child {
    margin-bottom: 0;
}

.form-section-head {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 18px;
}

.form-section-number {
    width: 25px;
    height: 25px;
    border-radius: 8px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
}

.form-section-title {
    font-size: 13px;
    font-weight: 800;
    color: #334155;
}

.form-section-line {
    flex: 1;
    height: 1px;
    background: #edf1ef;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 19px;
}

.full {
    grid-column: 1 / -1;
}

.form-field {
    display: flex;
    flex-direction: column;
}

.form-label {
    color: #334155;
    font-size: 12px;
    font-weight: 750;
    margin-bottom: 7px;
}

.required {
    color: #ef4444;
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    border: 1px solid #d7e0db;
    background: #fff;
    color: #0f172a;
    border-radius: 10px;
    font-family: inherit;
    font-size: 13px;
    outline: none;
    transition: .2s;
}

.form-input,
.form-select {
    height: 45px;
    padding: 0 13px;
}

.form-textarea {
    min-height: 130px;
    padding: 12px 13px;
    resize: vertical;
    line-height: 1.6;
}

.form-input::placeholder,
.form-textarea::placeholder {
    color: #a0acb8;
}

.form-input:hover,
.form-select:hover,
.form-textarea:hover {
    border-color: #b7c5bd;
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 4px rgba(16,185,129,.09);
}

.field-help {
    margin-top: 6px;
    color: #94a3b8;
    font-size: 11px;
    line-height: 1.5;
}

/* PRICE */

.price-box {
    position: relative;
}

.price-prefix {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 13px;
    font-weight: 800;
    color: #64748b;
}

.price-input {
    padding-left: 38px !important;
}

/* FORM FOOTER */

.form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 19px 25px;
    border-top: 1px solid #edf1ef;
    background: #fafcfb;
}

.required-note {
    font-size: 11px;
    color: #94a3b8;
}

.form-actions {
    display: flex;
    gap: 9px;
}

.btn {
    min-height: 42px;
    padding: 0 17px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    text-decoration: none;
    font-family: inherit;
    font-size: 12px;
    font-weight: 750;
    cursor: pointer;
    transition: .2s;
}

.btn-cancel {
    background: #fff;
    border: 1px solid #d8e1dc;
    color: #475569;
}

.btn-cancel:hover {
    background: #f8faf9;
}

.btn-save {
    border: 1px solid #059669;
    background: #059669;
    color: #fff;
    box-shadow: 0 5px 14px rgba(5,150,105,.20);
}

.btn-save:hover {
    background: #047857;
    transform: translateY(-1px);
}

/* RIGHT PANEL */

.preview-column {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

/* PREVIEW */

.preview-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 7px 25px rgba(15,23,42,.055);
}

.preview-top {
    padding: 19px 20px;
    background: linear-gradient(135deg, #047857, #10b981);
    color: #fff;
}

.preview-top-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    opacity: .78;
    font-weight: 800;
}

.preview-package-name {
    margin-top: 8px;
    font-size: 21px;
    font-weight: 850;
}

.preview-price {
    margin-top: 13px;
}

.preview-price-label {
    display: block;
    font-size: 10px;
    opacity: .75;
}

.preview-price-value {
    font-size: 25px;
    font-weight: 850;
}

.preview-body {
    padding: 20px;
}

.preview-heading {
    color: #334155;
    font-size: 12px;
    font-weight: 800;
    margin-bottom: 10px;
}

.preview-benefit {
    display: flex;
    align-items: flex-start;
    gap: 9px;
    margin-bottom: 9px;
    color: #64748b;
    font-size: 11px;
    line-height: 1.5;
}

.preview-check {
    width: 18px;
    height: 18px;
    flex: 0 0 18px;
    border-radius: 50%;
    background: #ecfdf5;
    color: #059669;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: 900;
}

/* TIPS */

.tips-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 7px 25px rgba(15,23,42,.045);
}

.tips-header {
    display: flex;
    gap: 11px;
    align-items: center;
    margin-bottom: 15px;
}

.tips-icon {
    width: 35px;
    height: 35px;
    border-radius: 10px;
    background: #fffbeb;
    color: #d97706;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
}

.tips-title {
    margin: 0;
    font-size: 13px;
    font-weight: 800;
    color: #334155;
}

.tip-item {
    padding: 11px 0;
    border-top: 1px solid #f0f2f1;
    display: flex;
    gap: 9px;
}

.tip-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #10b981;
    margin-top: 6px;
    flex-shrink: 0;
}

.tip-text {
    color: #64748b;
    font-size: 11px;
    line-height: 1.55;
}

/* FLOW */

.flow-card {
    background: #f0fdf4;
    border: 1px solid #d1fae5;
    border-radius: 18px;
    padding: 20px;
}

.flow-title {
    font-size: 12px;
    font-weight: 800;
    color: #166534;
    margin-bottom: 15px;
}

.flow-step {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 11px;
}

.flow-step:last-child {
    margin-bottom: 0;
}

.flow-number {
    width: 25px;
    height: 25px;
    border-radius: 8px;
    background: #dcfce7;
    color: #15803d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 900;
}

.flow-text {
    font-size: 11px;
    color: #4d7c5b;
}

/* RESPONSIVE */

@media(max-width: 1050px) {
    .package-layout {
        grid-template-columns: 1fr;
    }

    .preview-column {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 800px) {
    .package-create-page {
        padding: 22px 17px 45px;
    }

    .package-header {
        flex-direction: column;
    }

    .package-info-bar {
        grid-template-columns: 1fr;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full {
        grid-column: auto;
    }

    .preview-column {
        display: flex;
    }

    .form-footer {
        align-items: flex-start;
        flex-direction: column;
        gap: 14px;
    }

    .form-actions {
        width: 100%;
    }

    .form-actions .btn {
        flex: 1;
    }
}
</style>


<div class="package-create-page">

<div class="package-container">

    {{-- HEADER --}}
    <div class="package-header">

        <div class="package-heading">

            <div class="package-heading-icon">
                PS
            </div>

            <div>
                <div class="package-eyebrow">
                    EO Sponsorship
                </div>

                <h1 class="package-title">
                    Tambah Paket Sponsorship
                </h1>

                <p class="package-subtitle">
                    Buat penawaran sponsorship yang profesional,
                    jelas, dan menarik bagi calon sponsor event.
                </p>
            </div>

        </div>

        <a href="{{ route('eo.sponsorship.paket.index') }}"
           class="package-back">
            ← Kembali ke Paket
        </a>

    </div>


    {{-- QUICK INFO --}}
    <div class="package-info-bar">

        <div class="info-mini">
            <div class="info-mini-icon">01</div>
            <div>
                <strong>Pilih Event</strong>
                <span>Tentukan event tujuan</span>
            </div>
        </div>

        <div class="info-mini">
            <div class="info-mini-icon">02</div>
            <div>
                <strong>Tentukan Paket</strong>
                <span>Atur harga dan benefit</span>
            </div>
        </div>

        <div class="info-mini">
            <div class="info-mini-icon">03</div>
            <div>
                <strong>Publikasikan</strong>
                <span>Paket siap dipilih sponsor</span>
            </div>
        </div>

    </div>


    {{-- ERROR --}}
    @if ($errors->any())

        <div class="package-error">

            <strong>
                Data belum dapat disimpan
            </strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    {{-- MAIN --}}
    <div class="package-layout">

        {{-- LEFT FORM --}}
        <div class="form-card">

            <div class="form-card-header">

                <div class="form-card-header-left">

                    <div class="form-card-icon">
                        PS
                    </div>

                    <div>
                        <h2 class="form-card-title">
                            Detail Paket
                        </h2>

                        <p class="form-card-desc">
                            Lengkapi informasi paket sponsorship.
                        </p>
                    </div>

                </div>

            </div>


            <form action="{{ route('eo.sponsorship.paket.store') }}"
                  method="POST">

                @csrf

                <div class="form-content">


                    {{-- SECTION 1 --}}
                    <div class="form-section">

                        <div class="form-section-head">

                            <div class="form-section-number">
                                1
                            </div>

                            <div class="form-section-title">
                                EVENT & IDENTITAS PAKET
                            </div>

                            <div class="form-section-line"></div>

                        </div>


                        <div class="form-grid">

                            {{-- EVENT --}}
                            <div class="form-field full">

                                <label class="form-label">
                                    Event
                                    <span class="required">*</span>
                                </label>

                                <select name="event_id"
                                        class="form-select"
                                        required>

                                    <option value="">
                                        -- Pilih Event --
                                    </option>

                                    @foreach ($events as $event)

                                        <option value="{{ $event->id }}"
                                            {{ old('event_id') == $event->id ? 'selected' : '' }}>

                                            {{ $event->nama_event }}

                                        </option>

                                    @endforeach

                                </select>

                                <div class="field-help">
                                    Paket ini akan ditampilkan sebagai bagian dari sponsorship event yang dipilih.
                                </div>

                            </div>


                            {{-- NAMA --}}
                            <div class="form-field">

                                <label class="form-label">
                                    Nama Paket
                                    <span class="required">*</span>
                                </label>

                                <input type="text"
                                       name="nama_paket"
                                       class="form-input"
                                       value="{{ old('nama_paket') }}"
                                       placeholder="Contoh: Gold Sponsorship"
                                       required>

                                <div class="field-help">
                                    Contoh: Bronze, Silver, Gold, Platinum.
                                </div>

                            </div>


                            {{-- STATUS --}}
                            <div class="form-field">

                                <label class="form-label">
                                    Status Paket
                                    <span class="required">*</span>
                                </label>

                                <select name="status"
                                        class="form-select"
                                        required>

                                    <option value="aktif"
                                        {{ old('status', 'aktif') === 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option value="nonaktif"
                                        {{ old('status') === 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif
                                    </option>

                                </select>

                                <div class="field-help">
                                    Hanya paket aktif yang dapat ditawarkan kepada sponsor.
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- SECTION 2 --}}
                    <div class="form-section">

                        <div class="form-section-head">

                            <div class="form-section-number">
                                2
                            </div>

                            <div class="form-section-title">
                                NILAI SPONSORSHIP
                            </div>

                            <div class="form-section-line"></div>

                        </div>


                        <div class="form-grid">

                            <div class="form-field full">

                                <label class="form-label">
                                    Harga Sponsorship
                                    <span class="required">*</span>
                                </label>

                                <div class="price-box">

                                    <span class="price-prefix">
                                        Rp
                                    </span>

                                    <input type="number"
                                           name="harga"
                                           class="form-input price-input"
                                           value="{{ old('harga') }}"
                                           min="0"
                                           step="0.01"
                                           placeholder="10000000"
                                           required>

                                </div>

                                <div class="field-help">
                                    Tentukan nilai paket berdasarkan benefit yang diberikan kepada sponsor.
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- SECTION 3 --}}
                    <div class="form-section">

                        <div class="form-section-head">

                            <div class="form-section-number">
                                3
                            </div>

                            <div class="form-section-title">
                                DESKRIPSI & BENEFIT
                            </div>

                            <div class="form-section-line"></div>

                        </div>


                        <div class="form-grid">

                            {{-- DESKRIPSI --}}
                            <div class="form-field">

                                <label class="form-label">
                                    Deskripsi Paket
                                </label>

                                <textarea name="deskripsi"
                                          class="form-textarea"
                                          placeholder="Contoh: Paket sponsorship untuk perusahaan yang ingin mendapatkan eksposur utama selama kegiatan event.">{{ old('deskripsi') }}</textarea>

                                <div class="field-help">
                                    Jelaskan konsep dan nilai utama paket.
                                </div>

                            </div>


                            {{-- BENEFIT --}}
                            <div class="form-field">

                                <label class="form-label">
                                    Benefit Sponsorship
                                </label>

                                <textarea name="benefit"
                                          class="form-textarea"
                                          placeholder="Logo pada poster event&#10;Logo pada media sosial&#10;Banner di lokasi event&#10;Booth sponsor">{{ old('benefit') }}</textarea>

                                <div class="field-help">
                                    Tulis satu benefit pada setiap baris.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- FOOTER --}}
                <div class="form-footer">

                    <div class="required-note">
                        <span class="required">*</span>
                        Field wajib diisi
                    </div>

                    <div class="form-actions">

                        <a href="{{ route('eo.sponsorship.paket.index') }}"
                           class="btn btn-cancel">
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-save">
                            ✓ Simpan Paket
                        </button>

                    </div>

                </div>

            </form>

        </div>


        {{-- RIGHT COLUMN --}}
        <div class="preview-column">


            {{-- PREVIEW --}}
            <div class="preview-card">

                <div class="preview-top">

                    <div class="preview-top-label">
                        Preview Paket
                    </div>

                    <div class="preview-package-name">
                        {{ old('nama_paket', 'Gold Sponsorship') }}
                    </div>

                    <div class="preview-price">

                        <span class="preview-price-label">
                            Nilai Sponsorship
                        </span>

                        <div class="preview-price-value">
                            Rp {{ number_format((float) old('harga', 10000000), 0, ',', '.') }}
                        </div>

                    </div>

                </div>


                <div class="preview-body">

                    <div class="preview-heading">
                        Contoh Benefit
                    </div>

                    <div class="preview-benefit">
                        <div class="preview-check">✓</div>
                        <div>Logo perusahaan pada materi promosi event</div>
                    </div>

                    <div class="preview-benefit">
                        <div class="preview-check">✓</div>
                        <div>Promosi melalui media sosial event</div>
                    </div>

                    <div class="preview-benefit">
                        <div class="preview-check">✓</div>
                        <div>Branding pada area kegiatan</div>
                    </div>

                    <div class="preview-benefit">
                        <div class="preview-check">✓</div>
                        <div>Kesempatan mendapatkan booth sponsor</div>
                    </div>

                </div>

            </div>


            {{-- TIPS --}}
            <div class="tips-card">

                <div class="tips-header">

                    <div class="tips-icon">
                        !
                    </div>

                    <h3 class="tips-title">
                        Tips Paket Sponsorship
                    </h3>

                </div>

                <div class="tip-item">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Buat tingkatan paket agar sponsor mempunyai beberapa pilihan.
                    </div>

                </div>

                <div class="tip-item">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Sesuaikan harga dengan jumlah dan kualitas benefit yang diberikan.
                    </div>

                </div>

                <div class="tip-item">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Gunakan nama paket seperti Bronze, Silver, Gold, dan Platinum.
                    </div>

                </div>

            </div>


            {{-- FLOW --}}
            <div class="flow-card">

                <div class="flow-title">
                    ALUR SPONSORSHIP
                </div>

                <div class="flow-step">

                    <div class="flow-number">
                        1
                    </div>

                    <div class="flow-text">
                        EO membuat paket sponsorship
                    </div>

                </div>

                <div class="flow-step">

                    <div class="flow-number">
                        2
                    </div>

                    <div class="flow-text">
                        Paket ditampilkan kepada sponsor
                    </div>

                </div>

                <div class="flow-step">

                    <div class="flow-number">
                        3
                    </div>

                    <div class="flow-text">
                        Sponsor mengajukan paket
                    </div>

                </div>

                <div class="flow-step">

                    <div class="flow-number">
                        4
                    </div>

                    <div class="flow-text">
                        EO melakukan review dan negosiasi
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</x-layouts.eo>