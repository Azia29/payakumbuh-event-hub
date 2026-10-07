<x-layouts.eo :user="$user" title="Tambah Event">

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

    input:focus,
    textarea:focus {
        border-color: #10b981;
        box-shadow: 0 0 0 3px rgba(16,185,129,.10);
    }

    textarea {
        min-height: 110px;
        resize: vertical;
    }

    .map-box {
        overflow: hidden;
        border: 1px solid #dbe3ea;
        border-radius: 15px;
        margin-top: 10px;
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
        margin-bottom: 5px;
        color: #64748b;
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

    .error-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 12px;
        padding: 13px;
        margin-bottom: 20px;
        font-size: 11px;
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

        <h1>Tambah Event</h1>

        <p>
            Buat event baru dan tentukan lokasi kegiatan menggunakan Maps.
        </p>

    </div>

    @if ($errors->any())

        <div class="error-box">

            <strong>Periksa data berikut:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="{{ route('eo.events.store') }}"
        method="POST"
        class="event-card"
    >

        @csrf

        <h2 class="section-title">
            Informasi Event
        </h2>

        <div class="form-grid">

            <div class="form-group full">

                <label>Nama Event</label>

                <input
                    type="text"
                    name="nama_event"
                    value="{{ old('nama_event') }}"
                    placeholder="Masukkan nama event"
                    required
                >

            </div>

            <div class="form-group">

                <label>Tanggal Mulai</label>

                <input
                    type="datetime-local"
                    name="tgl_mulai"
                    value="{{ old('tgl_mulai') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Tanggal Selesai</label>

                <input
                    type="datetime-local"
                    name="tgl_selesai"
                    value="{{ old('tgl_selesai') }}"
                    required
                >

            </div>

            <div class="form-group full">

                <label>Deskripsi Event</label>

                <textarea
                    name="deskripsi_event"
                    placeholder="Jelaskan event..."
                >{{ old('deskripsi_event') }}</textarea>

            </div>

        </div>


        <h2 class="section-title" style="margin-top:25px;">
            Tiket Event
        </h2>

        <div class="ticket-box">

            <div class="ticket-option-grid">

                <label class="ticket-option">
                    <input
                        type="radio"
                        name="jenis_tiket"
                        value="gratis"
                        {{ old('jenis_tiket', 'gratis') === 'gratis' ? 'checked' : '' }}
                        onchange="toggleTicketFields()"
                    >

                    <span class="ticket-option-content">
                        <strong>Gratis</strong>
                        <small>Peserta tidak perlu membayar tiket.</small>
                    </span>
                </label>

                <label class="ticket-option">
                    <input
                        type="radio"
                        name="jenis_tiket"
                        value="berbayar"
                        {{ old('jenis_tiket') === 'berbayar' ? 'checked' : '' }}
                        onchange="toggleTicketFields()"
                    >

                    <span class="ticket-option-content">
                        <strong>Berbayar</strong>
                        <small>Peserta membeli tiket untuk mengikuti event.</small>
                    </span>
                </label>

            </div>

            <div class="ticket-fields" id="ticketFields">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Harga Tiket</label>

                        <div class="price-input">
                            <span>Rp</span>

                            <input
                                type="number"
                                id="harga_tiket"
                                name="harga_tiket"
                                value="{{ old('harga_tiket') }}"
                                min="0"
                                step="1000"
                                placeholder="50000"
                            >
                        </div>

                        <small class="field-help">
                            Masukkan harga tiket dalam Rupiah.
                        </small>

                    </div>

                    <div class="form-group">

                        <label>Kuota Tiket</label>

                        <input
                            type="number"
                            id="kuota_tiket"
                            name="kuota_tiket"
                            value="{{ old('kuota_tiket') }}"
                            min="1"
                            placeholder="Contoh: 500"
                        >

                        <small class="field-help">
                            Jumlah maksimal peserta yang dapat mengikuti event.
                        </small>

                    </div>

                </div>

            </div>

            <div class="free-ticket-info" id="freeTicketInfo">
                <strong>Event Gratis</strong>
                <span>Peserta tidak dikenakan biaya tiket.</span>
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
                value="{{ old('lokasi_event') }}"
                placeholder="Klik titik pada Maps atau masukkan nama lokasi"
                required
            >

        </div>


        <div class="map-box">

            <div id="eventMap"></div>

            <div class="map-info">
                Klik pada peta untuk menentukan titik lokasi event.
                Marker dapat dipindahkan dengan cara drag.
            </div>

        </div>


        <div class="coordinate-grid">

            <div class="coordinate-box">

                <label>Latitude</label>

                <input
                    type="text"
                    id="latitude"
                    name="latitude"
                    value="{{ old('latitude') }}"
                    readonly
                >

            </div>

            <div class="coordinate-box">

                <label>Longitude</label>

                <input
                    type="text"
                    id="longitude"
                    name="longitude"
                    value="{{ old('longitude') }}"
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
                Simpan Event
            </button>

        </div>

    </form>

</div>


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"><script>
    function toggleTicketFields() {
        const selected = document.querySelector(
            'input[name="jenis_tiket"]:checked'
        );

        const fields = document.getElementById('ticketFields');
        const freeInfo = document.getElementById('freeTicketInfo');
        const harga = document.getElementById('harga_tiket');
        const kuota = document.getElementById('kuota_tiket');

        if (!selected) return;

        if (selected.value === 'berbayar') {
            fields.style.display = 'block';
            freeInfo.style.display = 'none';

            harga.disabled = false;
            harga.required = true;

            kuota.disabled = false;
        } else {
            fields.style.display = 'none';
            freeInfo.style.display = 'flex';

            harga.value = 0;
            harga.disabled = true;
            harga.required = false;

            kuota.disabled = false;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        toggleTicketFields();
    });
</script></script>

<script>

    // Default: Payakumbuh
    const defaultLat = -0.2299;
    const defaultLng = 100.6308;

    const oldLat = document.getElementById('latitude').value;
    const oldLng = document.getElementById('longitude').value;

    const startLat = oldLat ? parseFloat(oldLat) : defaultLat;
    const startLng = oldLng ? parseFloat(oldLng) : defaultLng;

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

    let marker = null;

    function setLocation(lat, lng) {

        document.getElementById('latitude').value =
            lat.toFixed(7);

        document.getElementById('longitude').value =
            lng.toFixed(7);

        if (!marker) {

            marker = L.marker(
                [lat, lng],
                {
                    draggable: true
                }
            ).addTo(map);

            marker.on('dragend', function () {

                const position = marker.getLatLng();

                setLocation(
                    position.lat,
                    position.lng
                );

            });

        } else {

            marker.setLatLng([lat, lng]);

        }

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
        .catch(() => {

            // Jika reverse geocoding gagal,
            // koordinat tetap tersimpan.

        });

    }

    if (oldLat && oldLng) {

        setLocation(
            startLat,
            startLng
        );

    }

    map.on('click', function (e) {

        setLocation(
            e.latlng.lat,
            e.latlng.lng
        );

    });

<script>
    function toggleTicketFields() {
        const selected = document.querySelector(
            'input[name="jenis_tiket"]:checked'
        );

        const fields = document.getElementById('ticketFields');
        const freeInfo = document.getElementById('freeTicketInfo');
        const harga = document.getElementById('harga_tiket');
        const kuota = document.getElementById('kuota_tiket');

        if (!selected) return;

        if (selected.value === 'berbayar') {
            fields.style.display = 'block';
            freeInfo.style.display = 'none';

            harga.disabled = false;
            harga.required = true;

            kuota.disabled = false;
        } else {
            fields.style.display = 'none';
            freeInfo.style.display = 'flex';

            harga.value = 0;
            harga.disabled = true;
            harga.required = false;

            kuota.disabled = false;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        toggleTicketFields();
    });
</script></script>

</x-layouts.eo>