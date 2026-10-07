@props([
    'latitude' => null,
    'longitude' => null,
    'lokasi' => null,
    'height' => '350px',
    'zoom' => 16,
])

@php
    $lat = is_numeric($latitude) ? (float) $latitude : null;
    $lng = is_numeric($longitude) ? (float) $longitude : null;
    $mapId = 'map_' . uniqid();
@endphp

<div class="eo-map-wrapper">

    @if($lat !== null && $lng !== null)

        <div
            id="{{ $mapId }}"
            style="
                width:100%;
                height:{{ $height }};
                border-radius:14px;
                overflow:hidden;
                border:1px solid #e5e7eb;
                z-index:1;
            "
        ></div>

        @if($lokasi)
            <div style="
                margin-top:10px;
                padding:10px 13px;
                background:#f8fafc;
                border-radius:10px;
                color:#475569;
                font-size:13px;
            ">
                <strong>Lokasi:</strong>
                {{ $lokasi }}
            </div>
        @endif

        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        >

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const map = L.map('{{ $mapId }}').setView(
                    [{{ $lat }}, {{ $lng }}],
                    {{ $zoom }}
                );

                L.tileLayer(
                    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    {
                        maxZoom: 19,
                        attribution: '&copy; OpenStreetMap contributors'
                    }
                ).addTo(map);

                const marker = L.marker([
                    {{ $lat }},
                    {{ $lng }}
                ]).addTo(map);

                @if($lokasi)
                    marker.bindPopup(
                        `<strong>{{ addslashes($lokasi) }}</strong>`
                    ).openPopup();
                @endif

            });
        </script>

    @else

        <div style="
            height:{{ $height }};
            border:1px dashed #cbd5e1;
            border-radius:14px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            gap:8px;
            background:#f8fafc;
            color:#64748b;
            text-align:center;
            padding:20px;
            box-sizing:border-box;
        ">
            <div style="font-size:30px;">📍</div>

            <strong style="color:#334155;">
                Lokasi belum tersedia
            </strong>

            <span style="font-size:13px;">
                Koordinat lokasi belum ditentukan.
            </span>
        </div>

    @endif

</div>