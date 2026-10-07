<x-layouts.eo :user="$user" title="Edit Rundown Acara">

<style>
    .edit-rundown {
        font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                     BlinkMacSystemFont, "Segoe UI", sans-serif;
        color: #1e293b;
    }

    .edit-rundown * {
        box-sizing: border-box;
    }

    .edit-rundown .page-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 24px;
    }

    .edit-rundown .breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .edit-rundown .breadcrumb a {
        color: #64748b;
        text-decoration: none;
    }

    .edit-rundown .breadcrumb a:hover {
        color: #059669;
    }

    .edit-rundown .page-title {
        margin: 0;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
        color: #0f172a;
    }

    .edit-rundown .page-description {
        margin: 8px 0 0;
        font-size: 14px;
        color: #64748b;
    }

    .edit-rundown .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border: 1px solid #dbe3ea;
        border-radius: 11px;
        background: #fff;
        color: #475569;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        transition: .2s;
    }

    .edit-rundown .back-button:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .edit-rundown .success-box {
        margin-bottom: 20px;
        padding: 14px 16px;
        border: 1px solid #bbf7d0;
        border-radius: 13px;
        background: #f0fdf4;
        color: #166534;
        font-size: 13px;
        font-weight: 600;
    }

    .edit-rundown .error-box {
        display: flex;
        gap: 13px;
        padding: 16px;
        margin-bottom: 20px;
        border: 1px solid #fecaca;
        border-radius: 14px;
        background: #fff7f7;
    }

    .edit-rundown .error-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fee2e2;
        color: #dc2626;
        font-weight: 800;
    }

    .edit-rundown .error-title {
        margin: 0 0 5px;
        color: #b91c1c;
        font-size: 14px;
        font-weight: 700;
    }

    .edit-rundown .error-list {
        margin: 0;
        padding-left: 18px;
        color: #dc2626;
        font-size: 13px;
    }

    .edit-rundown .main-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.75fr) minmax(320px, 1fr);
        gap: 20px;
        align-items: start;
    }

    .edit-rundown .left-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .edit-rundown .card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
        overflow: hidden;
    }

    .edit-rundown .card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 19px 22px;
        border-bottom: 1px solid #edf2f7;
    }

    .edit-rundown .card-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
    }

    .edit-rundown .icon-green {
        background: #dcfce7;
        color: #047857;
    }

    .edit-rundown .icon-blue {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .edit-rundown .icon-location {
        background: #d1fae5;
        color: #047857;
    }

    .edit-rundown .card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 750;
        color: #1e293b;
    }

    .edit-rundown .card-subtitle {
        margin: 3px 0 0;
        font-size: 12px;
        color: #94a3b8;
    }

    .edit-rundown .card-body {
        padding: 22px;
    }

    .edit-rundown .form-group {
        margin-bottom: 19px;
    }

    .edit-rundown .form-group:last-child {
        margin-bottom: 0;
    }

    .edit-rundown .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
    }

    .edit-rundown .required {
        color: #ef4444;
    }

    .edit-rundown .form-input,
    .edit-rundown .form-select,
    .edit-rundown .form-textarea {
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

    .edit-rundown .form-input,
    .edit-rundown .form-select {
        height: 43px;
        padding: 0 13px;
    }

    .edit-rundown .form-textarea {
        min-height: 110px;
        padding: 12px 13px;
        resize: vertical;
        line-height: 1.5;
    }

    .edit-rundown .form-input:focus,
    .edit-rundown .form-select:focus,
    .edit-rundown .form-textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, .10);
    }

    .edit-rundown .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .edit-rundown .map-card {
        position: sticky;
        top: 20px;
    }

    .edit-rundown .map-wrapper {
        width: 100%;
        height: 360px;
        overflow: hidden;
        border: 1px solid #dfe7ee;
        border-radius: 13px;
        background: #e2e8f0;
    }

    #edit-rundown-map {
        width: 100%;
        height: 100%;
    }

    .edit-rundown .map-help {
        display: flex;
        gap: 10px;
        margin-top: 13px;
        padding: 12px;
        border: 1px solid #bbf7d0;
        border-radius: 11px;
        background: #f0fdf4;
    }

    .edit-rundown .map-help-icon {
        width: 32px;
        height: 32px;
        flex: 0 0 32px;
        border-radius: 8px;
        background: #dcfce7;
        color: #047857;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 800;
    }

    .edit-rundown .map-help-title {
        margin: 0;
        font-size: 12px;
        font-weight: 750;
        color: #166534;
    }

    .edit-rundown .map-help-text {
        margin: 3px 0 0;
        font-size: 11px;
        line-height: 1.5;
        color: #15803d;
    }

    .edit-rundown .coordinate-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 15px;
    }

    .edit-rundown .coordinate-label {
        display: block;
        margin-bottom: 6px;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
    }

    .edit-rundown .coordinate-input {
        width: 100%;
        height: 38px;
        padding: 0 10px;
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        background: #f8fafc;
        color: #64748b;
        font-family: monospace;
        font-size: 11px;
        outline: none;
    }

    .edit-rundown .location-status {
        margin-top: 9px;
        font-size: 11px;
        color: #64748b;
    }

    .edit-rundown .bottom-card {
        margin-top: 20px;
        padding: 18px 22px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .edit-rundown .bottom-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .edit-rundown .bottom-title {
        margin: 0;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
    }

    .edit-rundown .bottom-text {
        margin: 4px 0 0;
        font-size: 11px;
        color: #94a3b8;
    }

    .edit-rundown .button-group {
        display: flex;
        gap: 9px;
        flex-shrink: 0;
    }

    .edit-rundown .btn {
        min-width: 105px;
        height: 42px;
        padding: 0 17px;
        border-radius: 10px;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: .2s;
    }

    .edit-rundown .btn-cancel {
        border: 1px solid #d7dee7;
        background: #fff;
        color: #475569;
    }

    .edit-rundown .btn-cancel:hover {
        background: #f8fafc;
    }

    .edit-rundown .btn-save {
        border: 1px solid #059669;
        background: #059669;
        color: #fff;
        box-shadow: 0 3px 8px rgba(5, 150, 105, .18);
    }

    .edit-rundown .btn-save:hover {
        background: #047857;
        border-color: #047857;
        transform: translateY(-1px);
    }

    .edit-rundown .field-error {
        margin-top: 5px;
        color: #dc2626;
        font-size: 11px;
    }

    .leaflet-container {
        font-family: inherit;
    }

    .leaflet-control-attribution {
        font-size: 9px !important;
    }

    @media (max-width: 1050px) {
        .edit-rundown .main-grid {
            grid-template-columns: 1fr;
        }

        .edit-rundown .map-card {
            position: static;
        }

        .edit-rundown .map-wrapper {
            height: 380px;
        }
    }

    @media (max-width: 650px) {
        .edit-rundown .page-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .edit-rundown .page-title {
            font-size: 24px;
        }

        .edit-rundown .two-column,
        .edit-rundown .coordinate-grid {
            grid-template-columns: 1fr;
        }

        .edit-rundown .bottom-content {
            align-items: stretch;
            flex-direction: column;
        }

        .edit-rundown .button-group {
            width: 100%;
        }

        .edit-rundown .btn {
            flex: 1;
        }
    }
</style>


<div class="edit-rundown">

    {{-- HEADER --}}
    <div class="page-top">

        <div>

            <div class="breadcrumb">

                <a href="{{ route('eo.dashboard') }}">
                    Dashboard
                </a>

                <span>/</span>

                <a href="{{ route('eo.rundown.index') }}">
                    Rundown Acara
                </a>

                <span>/</span>

                <span>Edit</span>

            </div>

            <h1 class="page-title">
                Edit Rundown Acara
            </h1>

            <p class="page-description">
                Perbarui informasi kegiatan, waktu, penanggung jawab,
                dan lokasi rundown.
            </p>

        </div>


        <a
            href="{{ route('eo.rundown.index') }}"
            class="back-button">

            <span>â†</span>
            Kembali

        </a>

    </div>


    {{-- ERROR --}}
    @if ($errors->any())

        <div class="error-box">

            <div class="error-icon">
                !
            </div>

            <div>

                <p class="error-title">
                    Data belum dapat diperbarui
                </p>

                <ul class="error-list">

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
        action="{{ route('eo.rundown.update', $rundown->id) }}"
        method="POST"
        id="editRundownForm">

        @csrf
        @method('PUT')


        <div class="main-grid">


            {{-- KIRI --}}
            <div class="left-column">


                {{-- INFORMASI RUNDOWN --}}
                <div class="card">

                    <div class="card-header">

                        <div class="card-icon icon-green">
                            RD
                        </div>

                        <div>

                            <h2 class="card-title">
                                Informasi Rundown
                            </h2>

                            <p class="card-subtitle">
                                Perbarui informasi utama kegiatan.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">


                        {{-- EVENT --}}
                        <div class="form-group">

                            <label
                                for="event_id"
                                class="form-label">

                                Event
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
                                        {{ old('event_id', $rundown->event_id) == $event->id ? 'selected' : '' }}>

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


                        {{-- NAMA --}}
                        <div class="form-group">

                            <label
                                for="nama_rundown"
                                class="form-label">

                                Nama Rundown
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                name="nama_rundown"
                                id="nama_rundown"
                                value="{{ old('nama_rundown', $rundown->nama_rundown) }}"
                                class="form-input"
                                placeholder="Contoh: Pembukaan Acara"
                                required>

                            @error('nama_rundown')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- DESKRIPSI --}}
                        <div class="form-group">

                            <label
                                for="deskripsi"
                                class="form-label">

                                Deskripsi

                            </label>

                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                class="form-textarea"
                                placeholder="Jelaskan kegiatan yang akan dilakukan...">{{ old('deskripsi', $rundown->deskripsi) }}</textarea>

                            @error('deskripsi')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- TANGGAL --}}
                        <div class="form-group">

                            <label
                                for="tanggal"
                                class="form-label">

                                Tanggal Kegiatan
                                <span class="required">*</span>

                            </label>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                value="{{ old('tanggal', $rundown->tanggal) }}"
                                class="form-input"
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
                                    for="waktu_mulai"
                                    class="form-label">

                                    Waktu Mulai
                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="waktu_mulai"
                                    id="waktu_mulai"
                                    value="{{ old('waktu_mulai', $rundown->waktu_mulai ? \Carbon\Carbon::parse($rundown->waktu_mulai)->format('H:i') : '') }}"
                                    class="form-input"
                                    required>

                                @error('waktu_mulai')

                                    <div class="field-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <div class="form-group">

                                <label
                                    for="waktu_selesai"
                                    class="form-label">

                                    Waktu Selesai
                                    <span class="required">*</span>

                                </label>

                                <input
                                    type="time"
                                    name="waktu_selesai"
                                    id="waktu_selesai"
                                    value="{{ old('waktu_selesai', $rundown->waktu_selesai ? \Carbon\Carbon::parse($rundown->waktu_selesai)->format('H:i') : '') }}"
                                    class="form-input"
                                    required>

                                @error('waktu_selesai')

                                    <div class="field-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>


                {{-- PELAKSANAAN --}}
                <div class="card">

                    <div class="card-header">

                        <div class="card-icon icon-blue">
                            PJ
                        </div>

                        <div>

                            <h2 class="card-title">
                                Pelaksanaan
                            </h2>

                            <p class="card-subtitle">
                                Perbarui penanggung jawab dan status.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="two-column">


                            <div class="form-group">

                                <label
                                    for="penanggung_jawab"
                                    class="form-label">

                                    Penanggung Jawab

                                </label>

                                <input
                                    type="text"
                                    name="penanggung_jawab"
                                    id="penanggung_jawab"
                                    value="{{ old('penanggung_jawab', $rundown->penanggung_jawab) }}"
                                    class="form-input"
                                    placeholder="Nama penanggung jawab">

                                @error('penanggung_jawab')

                                    <div class="field-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            <div class="form-group">

                                <label
                                    for="status"
                                    class="form-label">

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
                                        {{ old('status', $rundown->status) == 'draft' ? 'selected' : '' }}>
                                        Draft
                                    </option>

                                    <option
                                        value="aktif"
                                        {{ old('status', $rundown->status) == 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>

                                    <option
                                        value="selesai"
                                        {{ old('status', $rundown->status) == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                </select>

                                @error('status')

                                    <div class="field-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- KANAN MAP --}}
            <div>

                <div class="card map-card">

                    <div class="card-header">

                        <div class="card-icon icon-location">
                            MP
                        </div>

                        <div>

                            <h2 class="card-title">
                                Lokasi Kegiatan
                            </h2>

                            <p class="card-subtitle">
                                Perbarui titik lokasi melalui peta.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">


                        {{-- MAP --}}
                        <div class="map-wrapper">

                            <div id="edit-rundown-map"></div>

                        </div>


                        {{-- PETUNJUK --}}
                        <div class="map-help">

                            <div class="map-help-icon">
                                MP
                            </div>

                            <div>

                                <p class="map-help-title">
                                    Ubah lokasi kegiatan
                                </p>

                                <p class="map-help-text">
                                    Klik lokasi baru pada peta atau geser
                                    marker yang sudah ada.
                                </p>

                            </div>

                        </div>


                        {{-- NAMA LOKASI --}}
                        <div
                            class="form-group"
                            style="margin-top:17px;">

                            <label
                                for="lokasi"
                                class="form-label">

                                Nama Lokasi
                                <span class="required">*</span>

                            </label>

                            <input
                                type="text"
                                name="lokasi"
                                id="lokasi"
                                value="{{ old('lokasi', $rundown->lokasi) }}"
                                class="form-input"
                                placeholder="Contoh: Kantor Walikota Payakumbuh"
                                required>

                            @error('lokasi')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KOORDINAT --}}
                        <div class="coordinate-grid">

                            <div>

                                <label
                                    for="latitude"
                                    class="coordinate-label">

                                    Latitude

                                </label>

                                <input
                                    type="text"
                                    name="latitude"
                                    id="latitude"
                                    value="{{ old('latitude', $rundown->latitude) }}"
                                    class="coordinate-input"
                                    readonly>

                            </div>


                            <div>

                                <label
                                    for="longitude"
                                    class="coordinate-label">

                                    Longitude

                                </label>

                                <input
                                    type="text"
                                    name="longitude"
                                    id="longitude"
                                    value="{{ old('longitude', $rundown->longitude) }}"
                                    class="coordinate-input"
                                    readonly>

                            </div>

                        </div>


                        <div class="location-status">
                            Koordinat akan diperbarui otomatis ketika marker dipindahkan.
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- BUTTON --}}
        <div class="bottom-card">

            <div class="bottom-content">

                <div>

                    <p class="bottom-title">
                        Perbarui data rundown
                    </p>

                    <p class="bottom-text">
                        Periksa kembali perubahan sebelum menyimpan.
                    </p>

                </div>


                <div class="button-group">

                    <a
                        href="{{ route('eo.rundown.index') }}"
                        class="btn btn-cancel">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="btn btn-save">

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


{{-- LEAFLET --}}
<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    crossorigin=""
>

<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    crossorigin="">
</script>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const savedLat = @json(old('latitude', $rundown->latitude));
    const savedLng = @json(old('longitude', $rundown->longitude));

    const defaultLat = -0.9546506;
    const defaultLng = 101.5016556;

    const startLat =
        savedLat !== null &&
        savedLat !== '' &&
        !isNaN(parseFloat(savedLat))
            ? parseFloat(savedLat)
            : defaultLat;

    const startLng =
        savedLng !== null &&
        savedLng !== '' &&
        !isNaN(parseFloat(savedLng))
            ? parseFloat(savedLng)
            : defaultLng;


    const map = L.map('edit-rundown-map').setView(
        [startLat, startLng],
        16
    );


    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution:
                '&copy; OpenStreetMap contributors'
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


    latitude.value =
        startLat.toFixed(7);

    longitude.value =
        startLng.toFixed(7);


    marker.bindPopup(
        '<strong>Lokasi Rundown</strong><br>Geser marker atau klik peta untuk mengubah lokasi.'
    );


    function updateLocation(lat, lng) {

        latitude.value =
            Number(lat).toFixed(7);

        longitude.value =
            Number(lng).toFixed(7);

        marker.setLatLng([lat, lng]);

    }


    // Klik peta
    map.on('click', function (event) {

        updateLocation(
            event.latlng.lat,
            event.latlng.lng
        );

        marker.openPopup();

    });


    // Geser marker
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


    document
        .getElementById('editRundownForm')
        .addEventListener('submit', function (event) {

            if (!latitude.value || !longitude.value) {

                event.preventDefault();

                alert(
                    'Lokasi belum memiliki koordinat. Silakan pilih lokasi pada peta.'
                );

            }

        });

});

</script>

</x-layouts.eo>