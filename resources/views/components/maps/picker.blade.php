@props([
    'latitude' => null,
    'longitude' => null,
    'lokasi' => '',
    'locationField' => 'lokasi',
])

@php
    $mapLat = $latitude ?: -0.2270;
    $mapLng = $longitude ?: 100.6320;
@endphp

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

<div class="form-group" style="margin-top:20px;">

    <label style="
        display:block;
        font-size:13px;
        font-weight:700;
        color:#374151;
        margin-bottom:8px;
    ">
        Pilih Lokasi di Peta
    </label>

    <div
        id="map-picker"
        style="
            width:100%;
            height:350px;
            border-radius:12px;
            border:1px solid #d1d5db;
            overflow:hidden;
            z-index:1;
        "
    ></div>

    <p style="
        margin:8px 0 0;
        color:#6b7280;
        font-size:12px;
    ">
        Klik pada peta untuk menentukan lokasi.
        Nama lokasi akan diisi otomatis.
    </p>

</div>

<div class="two-column" style="margin-top:15px;">

    <div class="form-group">

        <label for="{{ $locationField }}">
            Nama Lokasi
        </label>

        <input
            type="text"
            id="{{ $locationField }}"
            name="{{ $locationField }}"
            value="{{ old($locationField, $lokasi) }}"
            class="form-control"
            placeholder="Nama lokasi"
        >

    </div>

    <div class="form-group">

        <label for="latitude">
            Latitude
        </label>

        <input
            type="text"
            id="latitude"
            name="latitude"
            value="{{ old('latitude', $latitude) }}"
            class="form-control"
            readonly
            required
        >

    </div>

</div>

<div class="form-group">

    <label for="longitude">
        Longitude
    </label>

    <input
        type="text"
        id="longitude"
        name="longitude"
        value="{{ old('longitude', $longitude) }}"
        class="form-control"
        readonly
        required
    >

</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const mapElement = document.getElementById('map-picker');

    if (!mapElement) {
        return;
    }

    const defaultLat = {{ $mapLat }};
    const defaultLng = {{ $mapLng }};

    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');
    const locationInput = document.getElementById('{{ $locationField }}');

    const map = L.map('map-picker').setView(
        [defaultLat, defaultLng],
        14
    );

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    let marker = null;

    const existingLat = parseFloat(latInput.value);
    const existingLng = parseFloat(lngInput.value);

    if (!isNaN(existingLat) && !isNaN(existingLng)) {

        marker = L.marker([
            existingLat,
            existingLng
        ]).addTo(map);

        map.setView([
            existingLat,
            existingLng
        ], 16);
    }

    map.on('click', function (e) {

        const lat = e.latlng.lat.toFixed(7);
        const lng = e.latlng.lng.toFixed(7);

        latInput.value = lat;
        lngInput.value = lng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        fetch(
            'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='
            + lat
            + '&lon='
            + lng
        )
        .then(response => response.json())
        .then(data => {

            if (data.display_name && locationInput) {
                locationInput.value = data.display_name;
            }

        })
        .catch(error => {
            console.log('Reverse geocoding gagal:', error);
        });

    });

});
</script>