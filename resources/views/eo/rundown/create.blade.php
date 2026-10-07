<x-layouts.eo :user="$user" title="Tambah Rundown Acara">

<style>
    .rundown-page {
        font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                     BlinkMacSystemFont, "Segoe UI", sans-serif;
        color: #1e293b;
    }

    .rundown-page * {
        box-sizing: border-box;
    }

    .rundown-page .page-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 24px;
    }

    .rundown-page .breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #94a3b8;
        margin-bottom: 10px;
    }

    .rundown-page .breadcrumb a {
        color: #64748b;
        text-decoration: none;
    }

    .rundown-page .breadcrumb a:hover {
        color: #059669;
    }

    .rundown-page .page-title {
        margin: 0;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
        color: #0f172a;
    }

    .rundown-page .page-description {
        margin: 8px 0 0;
        font-size: 14px;
        color: #64748b;
    }

    .rundown-page .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border: 1px solid #dbe3ea;
        border-radius: 11px;
        background: #ffffff;
        color: #475569;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        transition: .2s ease;
        white-space: nowrap;
    }

    .rundown-page .back-button:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        transform: translateY(-1px);
    }

    .rundown-page .error-box {
        display: flex;
        gap: 13px;
        padding: 16px;
        margin-bottom: 20px;
        border: 1px solid #fecaca;
        border-radius: 14px;
        background: #fff7f7;
    }

    .rundown-page .error-icon {
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

    .rundown-page .error-title {
        margin: 0 0 5px;
        color: #b91c1c;
        font-size: 14px;
        font-weight: 700;
    }

    .rundown-page .error-list {
        margin: 0;
        padding-left: 18px;
        color: #dc2626;
        font-size: 13px;
    }

    .rundown-page .main-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.75fr) minmax(320px, 1fr);
        gap: 20px;
        align-items: start;
    }

    .rundown-page .left-column {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .rundown-page .card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
        overflow: hidden;
    }

    .rundown-page .card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 19px 22px;
        border-bottom: 1px solid #edf2f7;
    }

    .rundown-page .card-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: .3px;
    }

    .rundown-page .icon-green {
        background: #dcfce7;
        color: #047857;
    }

    .rundown-page .icon-blue {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .rundown-page .icon-location {
        background: #d1fae5;
        color: #047857;
    }

    .rundown-page .card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 750;
        color: #1e293b;
    }

    .rundown-page .card-subtitle {
        margin: 3px 0 0;
        font-size: 12px;
        color: #94a3b8;
    }

    .rundown-page .card-body {
        padding: 22px;
    }

    .rundown-page .form-group {
        margin-bottom: 19px;
    }

    .rundown-page .form-group:last-child {
        margin-bottom: 0;
    }

    .rundown-page .form-label {
        display: block;
        margin-bottom: 7px;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
    }

    .rundown-page .required {
        color: #ef4444;
    }

    .rundown-page .form-input,
    .rundown-page .form-select,
    .rundown-page .form-textarea {
        width: 100%;
        border: 1px solid #d7dee7;
        border-radius: 10px;
        background: #ffffff;
        color: #334155;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: .2s ease;
    }

    .rundown-page .form-input,
    .rundown-page .form-select {
        height: 43px;
        padding: 0 13px;
    }

    .rundown-page .form-textarea {
        min-height: 110px;
        padding: 12px 13px;
        resize: vertical;
        line-height: 1.5;
    }

    .rundown-page .form-input::placeholder,
    .rundown-page .form-textarea::placeholder {
        color: #a8b3c2;
    }

    .rundown-page .form-input:focus,
    .rundown-page .form-select:focus,
    .rundown-page .form-textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, .10);
    }

    .rundown-page .readonly-input {
        background: #f8fafc;
        color: #64748b;
    }

    .rundown-page .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .rundown-page .map-card {
        position: sticky;
        top: 20px;
    }

    .rundown-page .map-wrapper {
        position: relative;
        width: 100%;
        height: 360px;
        overflow: hidden;
        border: 1px solid #dfe7ee;
        border-radius: 13px;
        background: #e2e8f0;
    }

    #rundown-map {
        width: 100%;
        height: 100%;
    }

    .rundown-page .map-help {
        display: flex;
        gap: 10px;
        margin-top: 13px;
        padding: 12px;
        border: 1px solid #bbf7d0;
        border-radius: 11px;
        background: #f0fdf4;
    }

    .rundown-page .map-help-icon {
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

    .rundown-page .map-help-title {
        margin: 0;
        font-size: 12px;
        font-weight: 750;
        color: #166534;
    }

    .rundown-page .map-help-text {
        margin: 3px 0 0;
        font-size: 11px;
        line-height: 1.5;
        color: #15803d;
    }

    .rundown-page .coordinate-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        margin-top: 15px;
    }

    .rundown-page .coordinate-label {
        display: block;
        margin-bottom: 6px;
        font-size: 11px;
        font-weight: 700;
        color: #64748b;
    }

    .rundown-page .coordinate-input {
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

    .rundown-page .location-status {
        margin-top: 9px;
        font-size: 11px;
        color: #64748b;
    }

    .rundown-page .bottom-card {
        margin-top: 20px;
        padding: 18px 22px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .04);
    }

    .rundown-page .bottom-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .rundown-page .bottom-title {
        margin: 0;
        font-size: 13px;
        font-weight: 700;
        color: #334155;
    }

    .rundown-page .bottom-text {
        margin: 4px 0 0;
        font-size: 11px;
        color: #94a3b8;
    }

    .rundown-page .button-group {
        display: flex;
        gap: 9px;
        flex-shrink: 0;
    }

    .rundown-page .btn {
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
        transition: .2s ease;
    }

    .rundown-page .btn-cancel {
        border: 1px solid #d7dee7;
        background: #ffffff;
        color: #475569;
    }

    .rundown-page .btn-cancel:hover {
        background: #f8fafc;
    }

    .rundown-page .btn-save {
        border: 1px solid #059669;
        background: #059669;
        color: #ffffff;
        box-shadow: 0 3px 8px rgba(5, 150, 105, .18);
    }

    .rundown-page .btn-save:hover {
        background: #047857;
        border-color: #047857;
        transform: translateY(-1px);
    }

    .rundown-page .field-error {
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
        .rundown-page .main-grid {
            grid-template-columns: 1fr;
        }

        .rundown-page .map-card {
            position: static;
        }

        .rundown-page .map-wrapper {
            height: 380px;
        }
    }

    @media (max-width: 650px) {
        .rundown-page .page-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .rundown-page .page-title {
            font-size: 24px;
        }

        .rundown-page .two-column,
        .rundown-page .coordinate-grid {
            grid-template-columns: 1fr;
        }

        .rundown-page .bottom-content {
            align-items: stretch;
            flex-direction: column;
        }

        .rundown-page .button-group {
            width: 100%;
        }

        .rundown-page .btn {
            flex: 1;
        }
    }
</style>


<div class="rundown-page">

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

                <span>Tambah</span>

            </div>

            <h1 class="page-title">
                Tambah Rundown Acara
            </h1>

            <p class="page-description">
                Susun urutan kegiatan acara, waktu, penanggung jawab,
                dan lokasi kegiatan.
            </p>
        </div>

        <a href="{{ route('eo.rundown.index') }}"
           class="back-button">
            <span>←</span>
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
                    Data belum dapat disimpan
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
        action="{{ route('eo.rundown.store') }}"
        method="POST"
        id="rundownForm">

        @csrf


        <div class="main-grid">


            {{-- ================================ --}}
            {{-- KIRI --}}
            {{-- ================================ --}}

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
                                Isi informasi utama kegiatan acara.
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


                        {{-- NAMA RUNDOWN --}}
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
                                value="{{ old('nama_rundown') }}"
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
                                placeholder="Jelaskan kegiatan yang akan dilakukan...">{{ old('deskripsi') }}</textarea>

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
                                value="{{ old('tanggal') }}"
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
                                    value="{{ old('waktu_mulai') }}"
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
                                    value="{{ old('waktu_selesai') }}"
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
                                Tentukan penanggung jawab dan status kegiatan.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">

                        <div class="two-column">


                            {{-- PENANGGUNG JAWAB --}}
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
                                    value="{{ old('penanggung_jawab') }}"
                                    class="form-input"
                                    placeholder="Nama penanggung jawab">

                                @error('penanggung_jawab')

                                    <div class="field-error">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>


                            {{-- STATUS --}}
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


            {{-- ================================ --}}
            {{-- KANAN - LOKASI --}}
            {{-- ================================ --}}

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
                                Pilih titik lokasi pada peta.
                            </p>

                        </div>

                    </div>


                    <div class="card-body">


                        {{-- MAP --}}
                        <div class="map-wrapper">

                            <div id="rundown-map"></div>

                        </div>


                        {{-- PETUNJUK --}}
                        <div class="map-help">

                            <div class="map-help-icon">
                                MP
                            </div>

                            <div>

                                <p class="map-help-title">
                                    Pilih lokasi kegiatan
                                </p>

                                <p class="map-help-text">
                                    Klik titik pada peta atau geser marker
                                    untuk menentukan lokasi.
                                </p>

                            </div>

                        </div>


                        {{-- LOKASI --}}
                        <div class="form-group"
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
                                value="{{ old('lokasi') }}"
                                class="form-input"
                                placeholder="Contoh: Kantor Walikota Payakumbuh"
                                required>

                            @error('lokasi')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div class="location-status">
                                Nama lokasi dapat diisi sesuai titik yang dipilih.
                            </div>

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
                                    value="{{ old('latitude') }}"
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
                                    value="{{ old('longitude') }}"
                                    class="coordinate-input"
                                    readonly>

                            </div>

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
                        Pastikan data sudah benar
                    </p>

                    <p class="bottom-text">
                        Lokasi disimpan berdasarkan koordinat yang dipilih
                        pada peta.
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

                        Simpan Rundown

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

    const defaultLat = -0.9546506;
    const defaultLng = 101.5016556;

    const oldLat = @json(old('latitude'));
    const oldLng = @json(old('longitude'));

    const startLat =
        oldLat !== null && oldLat !== ''
            ? parseFloat(oldLat)
            : defaultLat;

    const startLng =
        oldLng !== null && oldLng !== ''
            ? parseFloat(oldLng)
            : defaultLng;


    const map = L.map('rundown-map').setView(
        [startLat, startLng],
        15
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
        '<strong>Lokasi Rundown</strong><br>Pilih atau geser marker.'
    );


    function updateLocation(lat, lng) {

        latitude.value =
            Number(lat).toFixed(7);

        longitude.value =
            Number(lng).toFixed(7);

        marker.setLatLng([lat, lng]);

    }


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


    document
        .getElementById('rundownForm')
        .addEventListener('submit', function (event) {

            if (!latitude.value || !longitude.value) {

                event.preventDefault();

                alert(
                    'Silakan pilih lokasi kegiatan pada peta terlebih dahulu.'
                );

            }

        });

});

</script>

</x-layouts.eo>