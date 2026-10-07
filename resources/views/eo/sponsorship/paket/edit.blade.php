<x-layouts.eo :user="$user" title="Edit Paket Sponsorship">

<style>
.package-edit-page {
    min-height: 100%;
    padding: 30px 34px 60px;
    background: #f6f8f7;
    color: #0f172a;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system,
        BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.package-edit-container {
    max-width: 1240px;
    margin: 0 auto;
}

/* HEADER */

.edit-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 22px;
    margin-bottom: 24px;
}

.edit-heading {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.edit-heading-icon {
    width: 55px;
    height: 55px;
    border-radius: 16px;
    background: linear-gradient(135deg, #047857, #10b981);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 900;
    box-shadow: 0 8px 22px rgba(5,150,105,.2);
}

.edit-eyebrow {
    color: #059669;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.edit-title {
    margin: 0;
    font-size: 30px;
    line-height: 1.2;
    font-weight: 850;
    letter-spacing: -.7px;
}

.edit-subtitle {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 14px;
    line-height: 1.6;
}

.back-btn {
    height: 42px;
    padding: 0 16px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #fff;
    border: 1px solid #dce5e1;
    color: #475569;
    text-decoration: none;
    font-size: 12px;
    font-weight: 750;
    transition: .2s;
}

.back-btn:hover {
    color: #047857;
    border-color: #10b981;
}

/* TOP INFO */

.edit-info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 22px;
}

.info-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 14px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 4px 15px rgba(15,23,42,.035);
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
    flex-shrink: 0;
}

.info-label {
    color: #94a3b8;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .8px;
    font-weight: 800;
}

.info-value {
    margin-top: 4px;
    color: #334155;
    font-size: 12px;
    font-weight: 750;
}

/* ERROR */

.error-box {
    background: #fff1f2;
    border: 1px solid #fecdd3;
    color: #9f1239;
    border-radius: 13px;
    padding: 16px 18px;
    margin-bottom: 20px;
    font-size: 12px;
}

.error-box strong {
    font-size: 14px;
}

.error-box ul {
    margin: 8px 0 0 18px;
    line-height: 1.7;
}

/* MAIN */

.edit-layout {
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

.form-header {
    padding: 21px 25px;
    border-bottom: 1px solid #edf1ef;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.form-header-left {
    display: flex;
    align-items: center;
    gap: 12px;
}

.form-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
}

.form-title {
    margin: 0;
    font-size: 16px;
    font-weight: 800;
}

.form-description {
    margin: 3px 0 0;
    color: #94a3b8;
    font-size: 11px;
}

.edit-badge {
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 800;
}

.form-body {
    padding: 27px 25px;
}

/* SECTIONS */

.form-section {
    margin-bottom: 31px;
}

.form-section:last-child {
    margin-bottom: 0;
}

.section-heading {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 18px;
}

.section-number {
    width: 26px;
    height: 26px;
    border-radius: 8px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 900;
}

.section-title {
    color: #334155;
    font-size: 12px;
    font-weight: 850;
}

.section-line {
    flex: 1;
    height: 1px;
    background: #edf1ef;
}

/* FIELDS */

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
    box-sizing: border-box;
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
    min-height: 135px;
    padding: 12px 13px;
    resize: vertical;
    line-height: 1.6;
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

.form-input::placeholder,
.form-textarea::placeholder {
    color: #a0acb8;
}

.help-text {
    margin-top: 6px;
    color: #94a3b8;
    font-size: 10px;
    line-height: 1.5;
}

/* PRICE */

.price-wrap {
    position: relative;
}

.price-prefix {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
    font-size: 12px;
    font-weight: 850;
    pointer-events: none;
}

.price-input {
    padding-left: 37px !important;
}

/* FOOTER */

.form-footer {
    background: #fafcfb;
    border-top: 1px solid #edf1ef;
    padding: 18px 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
}

.footer-note {
    color: #94a3b8;
    font-size: 10px;
}

.footer-actions {
    display: flex;
    gap: 9px;
}

.btn {
    height: 42px;
    padding: 0 17px;
    border-radius: 9px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    text-decoration: none;
    border: 1px solid transparent;
    font-family: inherit;
    font-size: 12px;
    font-weight: 750;
    cursor: pointer;
    transition: .2s;
}

.btn-cancel {
    color: #475569;
    background: #fff;
    border-color: #d8e1dc;
}

.btn-cancel:hover {
    background: #f8faf9;
}

.btn-save {
    color: white;
    background: #059669;
    border-color: #059669;
    box-shadow: 0 5px 14px rgba(5,150,105,.2);
}

.btn-save:hover {
    background: #047857;
    transform: translateY(-1px);
}

/* RIGHT */

.right-column {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

/* CURRENT PACKAGE */

.current-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 7px 25px rgba(15,23,42,.045);
}

.current-top {
    padding: 21px;
    background: linear-gradient(135deg, #064e3b, #047857, #10b981);
    color: white;
}

.current-label {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    font-weight: 800;
    opacity: .72;
}

.current-name {
    margin-top: 8px;
    font-size: 22px;
    font-weight: 850;
}

.current-event {
    margin-top: 5px;
    font-size: 11px;
    opacity: .8;
}

.current-body {
    padding: 19px 21px;
}

.current-price-label {
    color: #94a3b8;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .8px;
}

.current-price {
    color: #047857;
    font-size: 23px;
    font-weight: 850;
    margin-top: 3px;
}

.current-row {
    display: flex;
    justify-content: space-between;
    padding: 11px 0;
    border-top: 1px solid #f0f2f1;
    margin-top: 12px;
}

.current-row-label {
    color: #94a3b8;
    font-size: 10px;
}

.current-row-value {
    color: #334155;
    font-size: 11px;
    font-weight: 750;
}

.status-active {
    color: #047857;
    background: #dcfce7;
    padding: 5px 9px;
    border-radius: 999px;
    font-weight: 800;
}

.status-inactive {
    color: #b45309;
    background: #fef3c7;
    padding: 5px 9px;
    border-radius: 999px;
    font-weight: 800;
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
    align-items: center;
    gap: 10px;
    margin-bottom: 13px;
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
    font-size: 13px;
    font-weight: 900;
}

.tips-title {
    margin: 0;
    font-size: 13px;
    font-weight: 800;
}

.tip {
    display: flex;
    gap: 9px;
    padding: 11px 0;
    border-top: 1px solid #f0f2f1;
}

.tip-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #10b981;
    margin-top: 5px;
    flex-shrink: 0;
}

.tip-text {
    color: #64748b;
    font-size: 10px;
    line-height: 1.55;
}

/* RESPONSIVE */

@media(max-width: 1050px) {
    .edit-layout {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 800px) {
    .package-edit-page {
        padding: 22px 17px 45px;
    }

    .edit-header {
        flex-direction: column;
    }

    .edit-info-grid {
        grid-template-columns: 1fr;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full {
        grid-column: auto;
    }

    .form-header,
    .form-footer {
        align-items: flex-start;
    }

    .form-header {
        flex-direction: column;
        gap: 12px;
    }

    .form-footer {
        flex-direction: column;
    }

    .footer-actions {
        width: 100%;
    }

    .footer-actions .btn {
        flex: 1;
    }
}
</style>


<div class="package-edit-page">

<div class="package-edit-container">


    {{-- HEADER --}}
    <div class="edit-header">

        <div class="edit-heading">

            <div class="edit-heading-icon">
                PS
            </div>

            <div>

                <div class="edit-eyebrow">
                    EO Sponsorship
                </div>

                <h1 class="edit-title">
                    Edit Paket Sponsorship
                </h1>

                <p class="edit-subtitle">
                    Perbarui informasi, harga, status, deskripsi,
                    dan benefit paket sponsorship.
                </p>

            </div>

        </div>


        <a href="{{ route('eo.sponsorship.paket.show', $paketSponsorship) }}"
           class="back-btn">
            ← Kembali ke Detail
        </a>

    </div>


    {{-- INFO BAR --}}
    <div class="edit-info-grid">

        <div class="info-card">

            <div class="info-icon">
                EV
            </div>

            <div>

                <div class="info-label">
                    Event
                </div>

                <div class="info-value">
                    {{ $paketSponsorship->event?->nama_event ?? 'Belum ditentukan' }}
                </div>

            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                ID
            </div>

            <div>

                <div class="info-label">
                    Paket ID
                </div>

                <div class="info-value">
                    #{{ $paketSponsorship->id }}
                </div>

            </div>

        </div>


        <div class="info-card">

            <div class="info-icon">
                ST
            </div>

            <div>

                <div class="info-label">
                    Status Saat Ini
                </div>

                <div class="info-value">
                    {{ ucfirst($paketSponsorship->status) }}
                </div>

            </div>

        </div>

    </div>


    {{-- ERRORS --}}
    @if ($errors->any())

        <div class="error-box">

            <strong>
                Periksa kembali data paket
            </strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- MAIN --}}
    <div class="edit-layout">


        {{-- FORM --}}
        <div class="form-card">

            <div class="form-header">

                <div class="form-header-left">

                    <div class="form-icon">
                        ED
                    </div>

                    <div>

                        <h2 class="form-title">
                            Informasi Paket
                        </h2>

                        <p class="form-description">
                            Ubah data paket sponsorship di bawah ini.
                        </p>

                    </div>

                </div>

                <div class="edit-badge">
                    MODE EDIT
                </div>

            </div>


            <form action="{{ route('eo.sponsorship.paket.update', $paketSponsorship) }}"
                  method="POST">

                @csrf
                @method('PUT')


                <div class="form-body">


                    {{-- SECTION 1 --}}
                    <div class="form-section">

                        <div class="section-heading">

                            <div class="section-number">
                                1
                            </div>

                            <div class="section-title">
                                EVENT & IDENTITAS PAKET
                            </div>

                            <div class="section-line"></div>

                        </div>


                        <div class="form-grid">


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
                                            {{ old('event_id', $paketSponsorship->event_id) == $event->id ? 'selected' : '' }}>

                                            {{ $event->nama_event }}

                                        </option>

                                    @endforeach

                                </select>

                                <div class="help-text">
                                    Pilih event yang menggunakan paket sponsorship ini.
                                </div>

                            </div>


                            <div class="form-field">

                                <label class="form-label">
                                    Nama Paket
                                    <span class="required">*</span>
                                </label>

                                <input type="text"
                                       name="nama_paket"
                                       class="form-input"
                                       value="{{ old('nama_paket', $paketSponsorship->nama_paket) }}"
                                       placeholder="Contoh: Gold Sponsorship"
                                       required>

                                <div class="help-text">
                                    Contoh: Bronze, Silver, Gold, atau Platinum.
                                </div>

                            </div>


                            <div class="form-field">

                                <label class="form-label">
                                    Status Paket
                                    <span class="required">*</span>
                                </label>

                                <select name="status"
                                        class="form-select"
                                        required>

                                    <option value="aktif"
                                        {{ old('status', $paketSponsorship->status) === 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option value="nonaktif"
                                        {{ old('status', $paketSponsorship->status) === 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif
                                    </option>

                                </select>

                                <div class="help-text">
                                    Paket aktif dapat ditawarkan kepada sponsor.
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- SECTION 2 --}}
                    <div class="form-section">

                        <div class="section-heading">

                            <div class="section-number">
                                2
                            </div>

                            <div class="section-title">
                                NILAI SPONSORSHIP
                            </div>

                            <div class="section-line"></div>

                        </div>


                        <div class="form-grid">

                            <div class="form-field full">

                                <label class="form-label">
                                    Harga Sponsorship
                                    <span class="required">*</span>
                                </label>

                                <div class="price-wrap">

                                    <span class="price-prefix">
                                        Rp
                                    </span>

                                    <input type="number"
                                           name="harga"
                                           class="form-input price-input"
                                           value="{{ old('harga', $paketSponsorship->harga) }}"
                                           min="0"
                                           step="0.01"
                                           required>

                                </div>

                                <div class="help-text">
                                    Perbarui nilai paket sesuai benefit sponsorship yang diberikan.
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- SECTION 3 --}}
                    <div class="form-section">

                        <div class="section-heading">

                            <div class="section-number">
                                3
                            </div>

                            <div class="section-title">
                                DESKRIPSI & BENEFIT
                            </div>

                            <div class="section-line"></div>

                        </div>


                        <div class="form-grid">


                            <div class="form-field">

                                <label class="form-label">
                                    Deskripsi Paket
                                </label>

                                <textarea name="deskripsi"
                                          class="form-textarea"
                                          placeholder="Jelaskan paket sponsorship...">{{ old('deskripsi', $paketSponsorship->deskripsi) }}</textarea>

                                <div class="help-text">
                                    Jelaskan konsep, sasaran, dan nilai utama paket.
                                </div>

                            </div>


                            <div class="form-field">

                                <label class="form-label">
                                    Benefit Sponsorship
                                </label>

                                <textarea name="benefit"
                                          class="form-textarea"
                                          placeholder="Logo pada poster event&#10;Promosi media sosial&#10;Banner event&#10;Booth sponsor">{{ old('benefit', $paketSponsorship->benefit) }}</textarea>

                                <div class="help-text">
                                    Tulis satu benefit pada setiap baris.
                                </div>

                            </div>

                        </div>

                    </div>


                </div>


                {{-- FOOTER --}}
                <div class="form-footer">

                    <div class="footer-note">
                        <span class="required">*</span>
                        Field wajib diisi
                    </div>


                    <div class="footer-actions">

                        <a href="{{ route('eo.sponsorship.paket.show', $paketSponsorship) }}"
                           class="btn btn-cancel">
                            Batal
                        </a>

                        <button type="submit"
                                class="btn btn-save">
                            ✓ Simpan Perubahan
                        </button>

                    </div>

                </div>

            </form>

        </div>


        {{-- RIGHT COLUMN --}}
        <div class="right-column">


            {{-- CURRENT PACKAGE --}}
            <div class="current-card">

                <div class="current-top">

                    <div class="current-label">
                        Paket Saat Ini
                    </div>

                    <div class="current-name">
                        {{ $paketSponsorship->nama_paket }}
                    </div>

                    <div class="current-event">
                        {{ $paketSponsorship->event?->nama_event ?? 'Event belum ditentukan' }}
                    </div>

                </div>


                <div class="current-body">

                    <div class="current-price-label">
                        Harga Saat Ini
                    </div>

                    <div class="current-price">
                        Rp {{ number_format((float) $paketSponsorship->harga, 0, ',', '.') }}
                    </div>


                    <div class="current-row">

                        <span class="current-row-label">
                            Status
                        </span>

                        <span class="current-row-value">

                            @if($paketSponsorship->status === 'aktif')

                                <span class="status-active">
                                    Aktif
                                </span>

                            @else

                                <span class="status-inactive">
                                    Nonaktif
                                </span>

                            @endif

                        </span>

                    </div>


                    <div class="current-row">

                        <span class="current-row-label">
                            Dibuat
                        </span>

                        <span class="current-row-value">
                            {{ $paketSponsorship->created_at?->format('d M Y') ?? '-' }}
                        </span>

                    </div>


                    <div class="current-row">

                        <span class="current-row-label">
                            Terakhir Diubah
                        </span>

                        <span class="current-row-value">
                            {{ $paketSponsorship->updated_at?->format('d M Y') ?? '-' }}
                        </span>

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
                        Sebelum Menyimpan
                    </h3>

                </div>


                <div class="tip">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Pastikan event yang dipilih sudah sesuai dengan paket sponsorship.
                    </div>

                </div>


                <div class="tip">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Sesuaikan harga dengan benefit yang diberikan kepada sponsor.
                    </div>

                </div>


                <div class="tip">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Pastikan benefit ditulis satu per baris agar mudah dibaca sponsor.
                    </div>

                </div>


                <div class="tip">

                    <div class="tip-dot"></div>

                    <div class="tip-text">
                        Gunakan status Nonaktif jika paket sementara tidak ingin ditawarkan.
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

</x-layouts.eo>