<x-layouts.eo :user="$user" title="Edit Event">

<style>

    .event-page {
        padding: 30px;
        background: #f8fafc;
        min-height: calc(100vh - 80px);
    }

    .event-header {
        margin-bottom: 22px;
    }

    .event-header h1 {
        margin: 0;
        font-size: 27px;
        font-weight: 800;
        color: #0f172a;
    }

    .event-header p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .event-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(15,23,42,.05);
        max-width: 1100px;
    }

    .section-title {
        margin: 0 0 17px;
        color: #0f172a;
        font-size: 16px;
        font-weight: 800;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 17px;
    }

    .form-group {
        margin-bottom: 17px;
    }

    .full {
        grid-column: 1 / -1;
    }

    label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }

    input,
    textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #dbe3ea;
        border-radius: 11px;
        padding: 11px 13px;
        outline: none;
        color: #0f172a;
        background: white;
        font-family: inherit;
        font-size: 12px;
    }

    textarea {
        min-height: 110px;
        resize: vertical;
    }

    input:focus,
    textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16,185,129,.10);
    }

    .map-box {
        overflow: hidden;
        border: 1px solid #dbe3ea;
        border-radius: 15px;
    }

    #eventMap {
        width: 100%;
        height: 390px;
    }

    .map-info {
        padding: 12px 14px;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        color: #64748b;
        font-size: 10px;
    }

    .coordinate-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 13px;
        margin-top: 14px;
    }

    .coordinate-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px;
    }

    .coordinate-box label {
        color: #64748b;
        margin-bottom: 5px;
    }

    .actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    .btn {
        border: 0;
        border-radius: 10px;
        padding: 11px 18px;
        font-size: 11px;
        font-weight: 800;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-save {
        background: #059669;
        color: white;
    }

    @media(max-width:800px) {

        .form-grid,
        .coordinate-grid {
            grid-template-columns: 1fr;
        }

        .event-page {
            padding: 18px;
        }

    }

</style>

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<div class="event-page">

    <div class="event-header">

        <h1>Edit Event</h1>

        <p>
            Perbarui informasi event dan lokasi kegiatan.
        </p>

    </div>


    <form
        action="{{ route('eo.events.update', $event) }}"
        method="POST"
        class="event-card"
    >

        @csrf
        @method('PUT')

        <h2 class="section-title">
            Informasi Event
        </h2>

        <div class="form-grid">

            <div class="form-group full">

                <label>Nama Event</label>

                <input
                    type="text"
                    name="nama_event"
                    value="{{ old('nama_event', $event->nama_event) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Tanggal Mulai</label>

                <input
                    type="datetime-local"
                    name="tgl_mulai"
                    value="{{ old('tgl_mulai', $event->tgl_mulai?->format('Y-m-d\TH:i')) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Tanggal Selesai</label>

                <input
                    type="datetime-local"
                    name="tgl_selesai"
                    value="{{ old('tgl_selesai', $event->tgl_selesai?->format('Y-m-d\TH:i')) }}"
                    required
                >

            </div>

            <div class="form-group full">

                <label>Deskripsi Event</label>

                <textarea
                    name="deskripsi_event"
                >{{ old('deskripsi_event', $event->deskripsi_event) }}</textarea>

            </div>

        </div>


        <h2 class="section-title" style="margin-top:25px;">
            Lokasi Event
        </h2>

        <div class="form-group">

            <label>
                Nama / Alamat Lokasi
            </label>

            <input
                type="text"
                id="lokasi_event"
                name="lokasi_event"
                value="{{ old('lokasi_event', $event->lokasi_event) }}"
                required
            >

        </div>


        <div class="map-box">

            <div id="eventMap"></div>

            <div class="map-info">
                Klik titik baru untuk memindahkan lokasi.
                Marker juga dapat digeser.
            </div>

        </div>


        <div class="coordinate-grid">

            <div class="coordinate-box">

                <label>Latitude</label>

                <input
                    type="text"
                    id="latitude"
                    name="latitude"
                    value="{{ old('latitude', $event->latitude) }}"
                    readonly
                >

            </div>

            <div class="coordinate-box">

                <label>Longitude</label>

                <input
                    type="text"
                    id="longitude"
                    name="longitude"
                    value="{{ old('longitude', $event->longitude) }}"
                    readonly
                >

            </div>

        </div>


        <div class="actions">

            <a
                href="{{ route('eo.events.index') }}"
                class="btn btn-cancel"
            >
                Batal
            </a>

            <button
                type="submit"
                class="btn btn-save"
            >
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

    const defaultLat = -0.2299;
    const defaultLng = 100.6308;

    const latitudeInput =
        document.getElementById('latitude');

    const longitudeInput =
        document.getElementById('longitude');

    const oldLat =
        latitudeInput.value;

    const oldLng =
        longitudeInput.value;

    const startLat =
        oldLat ? parseFloat(oldLat) : defaultLat;

    const startLng =
        oldLng ? parseFloat(oldLng) : defaultLng;

    const map = L.map('eventMap').setView(
        [startLat, startLng],
        oldLat && oldLng ? 17 : 13
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


    function updateLocation(lat, lng) {

        latitudeInput.value =
            lat.toFixed(7);

        longitudeInput.value =
            lng.toFixed(7);

        marker.setLatLng([
            lat,
            lng
        ]);

        fetch(
            'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' +
            lat +
            '&lon=' +
            lng
        )
        .then(response => response.json())
        .then(data => {

            if (data.display_name) {

                document.getElementById(
                    'lokasi_event'
                ).value = data.display_name;

            }

        })
        .catch(() => {});

    }


    marker.on(
        'dragend',
        function () {

            const position =
                marker.getLatLng();

            updateLocation(
                position.lat,
                position.lng
            );

        }
    );


    map.on(
        'click',
        function (e) {

            updateLocation(
                e.latlng.lat,
                e.latlng.lng
            );

        }
    );

</script>

</x-layouts.eo>