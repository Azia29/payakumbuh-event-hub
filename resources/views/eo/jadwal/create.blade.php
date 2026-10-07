<x-layouts.eo :user="$user" title="Tambah Jadwal Kegiatan">

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    crossorigin=""
>

<style>
    .jadwal-page {
        color: #1e293b;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                     BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .jadwal-page * {
        box-sizing: border-box;
    }

    .page-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 22px;
    }

    .breadcrumb {
        font-size: 13px;
        color: #94a3b8;
        margin-bottom: 9px;
    }

    .breadcrumb a {
        color: #64748b;
        text-decoration: none;
    }

    .breadcrumb a:hover {
        color: #059669;
    }

    .page-title {
        margin: 0;
        font-size: 29px;
        font-weight: 800;
        color: #0f172a;
    }

    .page-subtitle {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 42px;
        padding: 0 16px;
        border: 1px solid #dbe3ea;
        border-radius: 10px;
        background: #fff;
        color: #475569;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
    }

    .back-btn:hover {
        background: #f8fafc;
    }

    .alert-error {
        display: flex;
        gap: 12px;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #fecaca;
        border-radius: 13px;
        background: #fff7f7;
        color: #b91c1c;
    }

    .alert-error-icon {
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #fee2e2;
        font-weight: 800;
    }

    .alert-error strong {
        display: block;
        margin-bottom: 4px;
        font-size: 13px;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 17px;
        font-size: 12px;
    }

    .content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(320px, .9fr);
        gap: 20px;
        align-items: start;
    }

    .left-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .045);
        overflow: hidden;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 19px 22px;
        border-bottom: 1px solid #edf2f7;
    }

    .card-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        font-size: 11px;
        font-weight: 800;
    }

    .green-icon {
        background: #dcfce7;
        color: #047857;
    }

    .blue-icon {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .map-icon {
        background: #d1fae5;
        color: #047857;
    }

    .card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 800;
        color: #1e293b;
    }

    .card-description {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .card-body {
        padding: 22px;
    }

    .section-label {
        margin: 0 0 13px;
        padding-bottom: 9px;
        border-bottom: 1px solid #d1fae5;
        color: #047857;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

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
        font-size: 13px;
        font-weight: 700;
    }

    .required {
        color: #ef4444;
    }

    .form-input,
    .form-select,
    .form-textarea {
        width: 100%;
        border: 1px solid #d7dee7;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .form-input,
    .form-select {
        height: 44px;
        padding: 0 13px;
    }

    .form-textarea {
        min-height: 110px;
        padding: 12px 13px;
        resize: vertical;
    }

    .form-input:focus,
    .form-select:focus,
    .form-textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, .10);
    }

    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .map-card {
        position: sticky;
        top: 20px;
    }

    .map-container {
        height: 390px;
        width: 100%;
        overflow: hidden;
        border: 1px solid #dbe4ea;
        border-radius: 13px;
        background: #e2e8f0;
    }

    #jadwal-map {
        width: 100%;
        height: 100%;
    }

    .map-instruction {
        margin-top: 13px;
        padding: 13px;
        border: 1px solid #bbf7d0;
        border-radius: 11px;
        background: #f0fdf4;
    }

    .map-instruction-title {
        margin: 0 0 4px;
        color: #166534;
        font-size: 12px;
        font-weight: 800;
    }

    .map-instruction-text {
        margin: 0;
        color: #15803d;
        font-size: 11px;
        line-height: 1.5;
    }

    .selected-location {
        margin-top: 14px;
        padding: 13px;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        background: #f8fafc;
    }

    .selected-location-label {
        margin-bottom: 6px;
        color: #64748b;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .selected-location-value {
        color: #334155;
        font-size: 12px;
        line-height: 1.5;
        font-weight: 600;
    }

    .coordinates {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 9px;
        margin-top: 10px;
    }

    .coordinate-box {
        padding: 9px 10px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #fff;
    }

    .coordinate-label {
        display: block;
        margin-bottom: 3px;
        color: #94a3b8;
        font-size: 9px;
        font-weight: 800;
    }

    .coordinate-value {
        color: #475569;
        font-family: monospace;
        font-size: 10px;
    }

    .example-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .example-item {
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        background: #fff;
        cursor: pointer;
        transition: .2s;
    }

    .example-item:hover {
        border-color: #86efac;
        background: #f0fdf4;
        transform: translateY(-1px);
    }

    .example-time {
        color: #059669;
        font-size: 11px;
        font-weight: 800;
    }

    .example-name {
        margin-top: 3px;
        color: #334155;
        font-size: 12px;
        font-weight: 750;
    }

    .example-desc {
        margin-top: 3px;
        color: #94a3b8;
        font-size: 10px;
        line-height: 1.4;
    }

    .tips {
        margin-top: 14px;
        padding: 13px;
        border: 1px solid #bfdbfe;
        border-radius: 11px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 11px;
        line-height: 1.5;
    }

    .bottom-card {
        margin-top: 20px;
        padding: 18px 22px;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        background: #fff;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .04);
    }

    .bottom-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .bottom-title {
        margin: 0;
        color: #334155;
        font-size: 13px;
        font-weight: 800;
    }

    .bottom-text {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 11px;
    }

    .actions {
        display: flex;
        gap: 9px;
    }

    .btn {
        height: 42px;
        padding: 0 18px;
        border-radius: 10px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 750;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .btn-cancel {
        border: 1px solid #d7dee7;
        background: #fff;
        color: #475569;
    }

    .btn-save {
        border: 1px solid #059669;
        background: #059669;
        color: #fff;
    }

    .btn-save:hover {
        background: #047857;
    }

    .field-error {
        margin-top: 5px;
        color: #dc2626;
        font-size: 11px;
    }

    @media (max-width: 1050px) {
        .content-grid {
            grid-template-columns: 1fr;
        }

        .map-card {
            position: static;
        }
    }

    @media (max-width: 650px) {
        .page-head,
        .bottom-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .two-column,
        .coordinates {
            grid-template-columns: 1fr;
        }

        .actions {
            width: 100%;
        }

        .btn {
            flex: 1;
        }
    }
</style>


<div class="jadwal-page">

    {{-- HEADER --}}
    <div class="page-head">

        <div>

            <div class="breadcrumb">

                <a href="{{ route('eo.dashboard') }}">
                    Dashboard
                </a>

                &nbsp;/&nbsp;

                <a href="{{ route('eo.jadwal.index') }}">
                    Jadwal Kegiatan
                </a>

                &nbsp;/&nbsp;

                Tambah

            </div>

            <h1 class="page-title">
                Tambah Jadwal Kegiatan
            </h1>

            <p class="page-subtitle">
                Atur waktu, penanggung jawab, dan lokasi kegiatan event.
            </p>

        </div>

        <a
            href="{{ route('eo.jadwal.index') }}"
            class="back-btn">

            ← Kembali

        </a>

    </div>


    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert-error">

            <div class="alert-error-icon">
                !
            </div>

            <div>

                <strong>
                    Data belum dapat disimpan
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    @endif


    <form
        action="{{ route('eo.jadwal.store') }}"
        method="POST"
        id="jadwalForm">

        @csrf


        <div class="content-grid">


            {{-- KOLOM KIRI --}}
            <div class="left-column">


                {{-- INFORMASI --}}
                <div class="card">

                    <div class="card-header">

                        <div class="card-icon green-icon">
                            JD
                        </div>

                        <div>

                            <h2 class="card-title">
                                Informasi Jadwal
                            </h2>

                            <p class="card-description">
                                Lengkapi informasi kegiatan event berikut.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">


                        <p class="section-label">
                            Event
                        </p>


                        {{-- EVENT --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="event_id">

                                Pilih Event
                                <span class="required">*</span>

                            </label>

                            <select
                                name="event_id"
                                id="event_id"
                                class="form-select"
                                required>

                                <option value="">
                                    Pilih Event
                                </option>

                                @foreach ($events as $event)

                                    <option
                                        value="{{ $event->id }}"
                                        {{ old('event_id') == $event->id ? 'selected' : '' }}>

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


                        <p class="section-label">
                            Detail Jadwal
                        </p>


                        {{-- NAMA --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="nama_jadwal">

                                Nama Jadwal
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                name="nama_jadwal"
                                id="nama_jadwal"
                                class="form-input"
                                value="{{ old('nama_jadwal') }}"
                                placeholder="Contoh: Pembukaan Acara"
                                required>

                            @error('nama_jadwal')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KETERANGAN --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="keterangan">

                                Keterangan

                            </label>

                            <textarea
                                name="keterangan"
                                id="keterangan"
                                class="form-textarea"
                                placeholder="Tuliskan informasi tambahan mengenai jadwal...">{{ old('keterangan') }}</textarea>

                            @error('keterangan')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <p class="section-label">
                            Waktu Pelaksanaan
                        </p>


                        {{-- TANGGAL --}}
                        <div class="form-group">

                            <label
                                class="form-label"
                                for="tanggal">

                                Tanggal Kegiatan
                                <span class="required">*</span>

                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                class="form-input"
                                value="{{ old('tanggal') }}"
                                required>

                            @error('tanggal')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- WAKTU --}}
                        <div class="two-column">

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="waktu_mulai">

                                    Waktu Mulai
                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="waktu_mulai"
                                    id="waktu_mulai"
                                    class="form-input"
                                    value="{{ old('waktu_mulai') }}"
                                    required>

                            </div>


                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="waktu_selesai">

                                    Waktu Selesai
                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="waktu_selesai"
                                    id="waktu_selesai"
                                    class="form-input"
                                    value="{{ old('waktu_selesai') }}"
                                    required>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- PELAKSANA --}}
                <div class="card">

                    <div class="card-header">

                        <div class="card-icon blue-icon">
                            PJ
                        </div>

                        <div>

                            <h2 class="card-title">
                                Pelaksanaan
                            </h2>

                            <p class="card-description">
                                Tentukan penanggung jawab kegiatan.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="two-column">

                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="penanggung_jawab">

                                    Penanggung Jawab

                                </label>

                                <input
                                    type="text"
                                    name="penanggung_jawab"
                                    id="penanggung_jawab"
                                    class="form-input"
                                    value="{{ old('penanggung_jawab') }}"
                                    placeholder="Contoh: Ketua Divisi Acara">

                            </div>


                            <div class="form-group">

                                <label
                                    class="form-label"
                                    for="status">

                                    Status
                                    <span class="required">*</span>

                                </label>

                                <select
                                    name="status"
                                    id="status"
                                    class="form-select"
                                    required>

                                    <option
                                        value="draft"
                                        {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                    <option
                                        value="aktif"
                                        {{ old('status') == 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option
                                        value="selesai"
                                        {{ old('status') == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- KOLOM KANAN --}}
            <div>


                {{-- MAP --}}
                <div class="card map-card">

                    <div class="card-header">

                        <div class="card-icon map-icon">
                            MP
                        </div>

                        <div>

                            <h2 class="card-title">
                                Lokasi Kegiatan
                            </h2>

                            <p class="card-description">
                                Pilih lokasi langsung melalui Maps.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">


                        <div class="map-container">

                            <div id="jadwal-map"></div>

                        </div>


                        <div class="map-instruction">

                            <p class="map-instruction-title">
                                Pilih lokasi menggunakan peta
                            </p>

                            <p class="map-instruction-text">
                                Klik titik lokasi pada peta atau geser marker.
                                Lokasi dan koordinat akan otomatis digunakan
                                saat jadwal disimpan.
                            </p>

                        </div>


                        {{-- LOKASI TIDAK DIKETIK MANUAL --}}
                        <input
                            type="hidden"
                            name="lokasi"
                            id="lokasi"
                            value="{{ old('lokasi') }}">


                        <div class="selected-location">

                            <div class="selected-location-label">
                                Lokasi terpilih
                            </div>

                            <div
                                class="selected-location-value"
                                id="location-display">

                                Belum memilih lokasi pada peta

                            </div>


                            <div class="coordinates">

                                <div class="coordinate-box">

                                    <span class="coordinate-label">
                                        LATITUDE
                                    </span>

                                    <span
                                        class="coordinate-value"
                                        id="latitude-display">

                                        -

                                    </span>

                                </div>


                                <div class="coordinate-box">

                                    <span class="coordinate-label">
                                        LONGITUDE
                                    </span>

                                    <span
                                        class="coordinate-value"
                                        id="longitude-display">

                                        -

                                    </span>

                                </div>

                            </div>

                        </div>


                        <input
                            type="hidden"
                            name="latitude"
                            id="latitude"
                            value="{{ old('latitude') }}">

                        <input
                            type="hidden"
                            name="longitude"
                            id="longitude"
                            value="{{ old('longitude') }}">

                    </div>

                </div>


                {{-- CONTOH JADWAL --}}
                <div
                    class="card"
                    style="margin-top:20px;">

                    <div class="card-header">

                        <div class="card-icon green-icon">
                            EX
                        </div>

                        <div>

                            <h2 class="card-title">
                                Contoh Jadwal
                            </h2>

                            <p class="card-description">
                                Contoh susunan kegiatan event.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="example-list">


                            <div
                                class="example-item"
                                data-name="Registrasi Peserta"
                                data-start="08:00"
                                data-end="09:00"
                                data-description="Registrasi dan pemeriksaan peserta event.">

                                <div class="example-time">
                                    08:00 - 09:00
                                </div>

                                <div class="example-name">
                                    Registrasi Peserta
                                </div>

                                <div class="example-desc">
                                    Registrasi dan pemeriksaan peserta event.
                                </div>

                            </div>


                            <div
                                class="example-item"
                                data-name="Pembukaan Acara"
                                data-start="09:00"
                                data-end="09:30"
                                data-description="Pembukaan oleh MC dan sambutan panitia.">

                                <div class="example-time">
                                    09:00 - 09:30
                                </div>

                                <div class="example-name">
                                    Pembukaan Acara
                                </div>

                                <div class="example-desc">
                                    Pembukaan oleh MC dan sambutan panitia.
                                </div>

                            </div>


                            <div
                                class="example-item"
                                data-name="Acara Utama"
                                data-start="09:30"
                                data-end="12:00"
                                data-description="Pelaksanaan kegiatan utama event.">

                                <div class="example-time">
                                    09:30 - 12:00
                                </div>

                                <div class="example-name">
                                    Acara Utama
                                </div>

                                <div class="example-desc">
                                    Pelaksanaan kegiatan utama event.
                                </div>

                            </div>


                            <div
                                class="example-item"
                                data-name="Penutupan"
                                data-start="12:00"
                                data-end="12:30"
                                data-description="Penutupan dan dokumentasi kegiatan.">

                                <div class="example-time">
                                    12:00 - 12:30
                                </div>

                                <div class="example-name">
                                    Penutupan
                                </div>

                                <div class="example-desc">
                                    Penutupan dan dokumentasi kegiatan.
                                </div>

                            </div>

                        </div>


                        <div class="tips">

                            <strong>
                                Tips:
                            </strong>

                            Klik salah satu contoh jadwal untuk
                            mengisi Nama Jadwal, waktu, dan keterangan
                            secara otomatis.

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ACTION --}}
        <div class="bottom-card">

            <div class="bottom-actions">

                <div>

                    <p class="bottom-title">
                        Simpan Jadwal Kegiatan
                    </p>

                    <p class="bottom-text">
                        Pastikan waktu dan lokasi Maps sudah benar.
                    </p>

                </div>


                <div class="actions">

                    <a
                        href="{{ route('eo.jadwal.index') }}"
                        class="btn btn-cancel">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="btn btn-save">

                        Simpan Jadwal

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    crossorigin="">
</script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const defaultLat = -0.9546506;
    const defaultLng = 101.5016556;

    const oldLat = @json(old('latitude'));
    const oldLng = @json(old('longitude'));

    const startLat =
        oldLat &&
        !isNaN(parseFloat(oldLat))
            ? parseFloat(oldLat)
            : defaultLat;

    const startLng =
        oldLng &&
        !isNaN(parseFloat(oldLng))
            ? parseFloat(oldLng)
            : defaultLng;


    const map = L.map('jadwal-map').setView(
        [startLat, startLng],
        16
    );


    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);


    let marker = L.marker(
        [startLat, startLng],
        {
            draggable: true
        }
    ).addTo(map);


    const latitude =
        document.getElementById('latitude');

    const longitude =
        document.getElementById('longitude');

    const lokasi =
        document.getElementById('lokasi');

    const locationDisplay =
        document.getElementById('location-display');

    const latitudeDisplay =
        document.getElementById('latitude-display');

    const longitudeDisplay =
        document.getElementById('longitude-display');


    function updateLocation(lat, lng) {

        const latValue =
            Number(lat).toFixed(7);

        const lngValue =
            Number(lng).toFixed(7);


        latitude.value = latValue;
        longitude.value = lngValue;


        latitudeDisplay.textContent =
            latValue;

        longitudeDisplay.textContent =
            lngValue;


        const locationText =
            'Lokasi dipilih melalui Maps (' +
            latValue +
            ', ' +
            lngValue +
            ')';


        lokasi.value =
            locationText;

        locationDisplay.textContent =
            locationText;


        marker.setLatLng([
            lat,
            lng
        ]);

    }


    updateLocation(
        startLat,
        startLng
    );


    map.on('click', function (event) {

        updateLocation(
            event.latlng.lat,
            event.latlng.lng
        );

        marker.openPopup();

    });


    marker.on('dragend', function (event) {

        const position =
            event.target.getLatLng();

        updateLocation(
            position.lat,
            position.lng
        );

    });


    setTimeout(function () {

        map.invalidateSize();

    }, 400);


    /*
     * CONTOH JADWAL
     */
    document
        .querySelectorAll('.example-item')
        .forEach(function (item) {

            item.addEventListener('click', function () {

                document.getElementById(
                    'nama_jadwal'
                ).value =
                    item.dataset.name;


                document.getElementById(
                    'waktu_mulai'
                ).value =
                    item.dataset.start;


                document.getElementById(
                    'waktu_selesai'
                ).value =
                    item.dataset.end;


                document.getElementById(
                    'keterangan'
                ).value =
                    item.dataset.description;


                document
                    .getElementById('nama_jadwal')
                    .focus();

            });

        });


    /*
     * VALIDASI LOKASI
     */
    document
        .getElementById('jadwalForm')
        .addEventListener('submit', function (event) {

            if (
                !latitude.value ||
                !longitude.value ||
                !lokasi.value
            ) {

                event.preventDefault();

                alert(
                    'Silakan pilih lokasi kegiatan pada Maps terlebih dahulu.'
                );

                return;

            }

        });

});

</script>

</x-layouts.eo>