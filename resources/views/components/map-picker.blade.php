@props([
    'latitude' => null,
    'longitude' => null,
    'lokasi' => null,
])

@php
    $defaultLat = is_numeric($latitude) ? (float) $latitude : -0.2299;
    $defaultLng = is_numeric($longitude) ? (float) $longitude : 100.6308;
    $pickerId = 'picker_' . uniqid();
@endphp

<div style="margin-top:10px;">

    <div
        id="{{ $pickerId }}"
        style="
            width:100%;
            height:400px;
            border-radius:14px;
            overflow:hidden;
            border:1px solid #e5e7eb;
        "
    ></div>

    <div style="
        margin-top:12px;
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:12px;
    ">

        <div>
            <label style="
                display:block;
                margin-bottom:6px;
                font-size:13px;
                font-weight:600;
                color:#374151;
            ">
                Latitude
            </label>

            <input
                type="text"
                name="latitude"
                id="{{ $pickerId }}_lat"
                value="{{ old('latitude', $latitude) }}"
                readonly
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:11px 12px;
                    border:1px solid #d1d5db;
                    border-radius:9px;
                    background:#f8fafc;
                "
            >
        </div>

        <div>
            <label style="
                display:block;
                margin-bottom:6px;
                font-size:13px;
                font-weight:600;
                color:#374151;
            ">
                Longitude
            </label>

            <input
                type="text"
                name="longitude"
                id="{{ $pickerId }}_lng"
                value="{{ old('longitude', $longitude) }}"
                readonly
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:11px 12px;
                    border:1px solid #d1d5db;
                    border-radius:9px;
                    background:#f8fafc;
                "
            >
        </div>

    </div>

    <div style="
        margin-top:10px;
        padding:10px 13px;
        background:#eff6ff;
        color:#1d4ed8;
        border-radius:9px;
        font-size:13px;
    ">
        📍 Klik pada peta atau geser marker untuk menentukan lokasi.
    </div>

</div>

<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const map = L.map('{{ $pickerId }}').setView(
        [{{ $defaultLat }}, {{ $defaultLng }}],
        14
    );

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    let marker = L.marker(
        [{{ $defaultLat }}, {{ $defaultLng }}],
        {
            draggable: true
        }
    ).addTo(map);

    function updateCoordinates(lat, lng) {

        document.getElementById(
            '{{ $pickerId }}_lat'
        ).value = lat.toFixed(7);

        document.getElementById(
            '{{ $pickerId }}_lng'
        ).value = lng.toFixed(7);
    }

    marker.on('dragend', function () {

        const position = marker.getLatLng();

        updateCoordinates(
            position.lat,
            position.lng
        );

    });

    map.on('click', function (e) {

        marker.setLatLng(e.latlng);

        updateCoordinates(
            e.latlng.lat,
            e.latlng.lng
        );

    });

    updateCoordinates(
        {{ $defaultLat }},
        {{ $defaultLng }}
    );

});
</script>