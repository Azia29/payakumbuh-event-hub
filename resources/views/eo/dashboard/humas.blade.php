<x-layouts.eo
    :user="$user"
    title="Dashboard Humas"
>

<div>

    {{-- ========================================
         HEADER
    ======================================== --}}

    <div
        style="
            background:linear-gradient(
                135deg,
                #047857,
                #059669
            );
            color:white;
            padding:30px;
            border-radius:20px;
            margin-bottom:24px;
            box-shadow:0 10px 25px rgba(4,120,87,.18);
        "
    >

        <div
            style="
                font-size:12px;
                font-weight:700;
                letter-spacing:1px;
                opacity:.8;
                margin-bottom:8px;
            "
        >
            DIVISI HUMAS
        </div>

        <h1
            style="
                margin:0 0 8px;
                font-size:28px;
            "
        >
            Dashboard Humas
        </h1>

        <p
            style="
                margin:0;
                max-width:700px;
                line-height:1.7;
                opacity:.9;
            "
        >
            Kelola informasi, publikasi, komunikasi,
            dan pengajuan materi publikasi untuk event
            Payakumbuh Event Hub.
        </p>

    </div>


    {{-- ========================================
         STATISTIK
    ======================================== --}}

    <div
        style="
            display:grid;
            grid-template-columns:
                repeat(4, minmax(0,1fr));
            gap:18px;
            margin-bottom:24px;
        "
    >


        {{-- TOTAL EVENT --}}

        <div
            style="
                background:white;
                border:1px solid #e5e7eb;
                border-radius:16px;
                padding:22px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    color:#64748b;
                    font-size:13px;
                    margin-bottom:10px;
                "
            >
                Total Event
            </div>

            <div
                style="
                    font-size:30px;
                    font-weight:800;
                    color:#111827;
                "
            >
                {{ $totalEvent ?? 0 }}
            </div>

        </div>


        {{-- EVENT AKTIF --}}

        <div
            style="
                background:white;
                border:1px solid #e5e7eb;
                border-radius:16px;
                padding:22px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    color:#64748b;
                    font-size:13px;
                    margin-bottom:10px;
                "
            >
                Event Aktif
            </div>

            <div
                style="
                    font-size:30px;
                    font-weight:800;
                    color:#059669;
                "
            >
                {{ $eventAktif ?? 0 }}
            </div>

        </div>


        {{-- EVENT MENDATANG --}}

        <div
            style="
                background:white;
                border:1px solid #e5e7eb;
                border-radius:16px;
                padding:22px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    color:#64748b;
                    font-size:13px;
                    margin-bottom:10px;
                "
            >
                Event Mendatang
            </div>

            <div
                style="
                    font-size:30px;
                    font-weight:800;
                    color:#2563eb;
                "
            >
                {{ isset($eventMendatang) ? $eventMendatang->count() : 0 }}
            </div>

        </div>


        {{-- EVENT TERBARU --}}

        <div
            style="
                background:white;
                border:1px solid #e5e7eb;
                border-radius:16px;
                padding:22px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    color:#64748b;
                    font-size:13px;
                    margin-bottom:10px;
                "
            >
                Event Terbaru
            </div>

            <div
                style="
                    font-size:30px;
                    font-weight:800;
                    color:#7c3aed;
                "
            >
                {{ isset($eventTerbaru) ? $eventTerbaru->count() : 0 }}
            </div>

        </div>

    </div>


    {{-- ========================================
         AKSI CEPAT
    ======================================== --}}

    <div
        style="
            display:grid;
            grid-template-columns:
                repeat(3, minmax(0,1fr));
            gap:18px;
            margin-bottom:24px;
        "
    >


        {{-- PUBLIKASI --}}

        <a
            href="{{ route('eo.publikasi.index') }}"
            style="
                display:block;
                text-decoration:none;
                background:white;
                border:1px solid #d1fae5;
                border-radius:18px;
                padding:24px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    width:48px;
                    height:48px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:12px;
                    background:#dcfce7;
                    color:#166534;
                    font-size:12px;
                    font-weight:800;
                "
            >
                PUB
            </div>

            <h3
                style="
                    margin:16px 0 7px;
                    color:#111827;
                    font-size:17px;
                "
            >
                Publikasi
            </h3>

            <p
                style="
                    margin:0;
                    color:#64748b;
                    line-height:1.6;
                    font-size:13px;
                "
            >
                Kelola materi publikasi dan
                pantau status pengajuan kepada Admin.
            </p>

        </a>


        {{-- AJUKAN --}}

        <a
            href="{{ route('eo.publikasi.create') }}"
            style="
                display:block;
                text-decoration:none;
                background:white;
                border:1px solid #dbeafe;
                border-radius:18px;
                padding:24px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    width:48px;
                    height:48px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:12px;
                    background:#dbeafe;
                    color:#1d4ed8;
                    font-size:12px;
                    font-weight:800;
                "
            >
                AJU
            </div>

            <h3
                style="
                    margin:16px 0 7px;
                    color:#111827;
                    font-size:17px;
                "
            >
                Ajukan Publikasi
            </h3>

            <p
                style="
                    margin:0;
                    color:#64748b;
                    line-height:1.6;
                    font-size:13px;
                "
            >
                Buat materi publikasi baru,
                kemudian ajukan untuk diperiksa Admin.
            </p>

        </a>


        {{-- EVENT --}}

        <a
            href="{{ route('eo.events.index') }}"
            style="
                display:block;
                text-decoration:none;
                background:white;
                border:1px solid #ede9fe;
                border-radius:18px;
                padding:24px;
                box-shadow:0 5px 18px rgba(15,23,42,.05);
            "
        >

            <div
                style="
                    width:48px;
                    height:48px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    border-radius:12px;
                    background:#ede9fe;
                    color:#6d28d9;
                    font-size:12px;
                    font-weight:800;
                "
            >
                EVT
            </div>

            <h3
                style="
                    margin:16px 0 7px;
                    color:#111827;
                    font-size:17px;
                "
            >
                Informasi Event
            </h3>

            <p
                style="
                    margin:0;
                    color:#64748b;
                    line-height:1.6;
                    font-size:13px;
                "
            >
                Lihat event yang tersedia
                sebagai bahan informasi publikasi.
            </p>

        </a>

    </div>


    {{-- ========================================
         EVENT MENDATANG
    ======================================== --}}

    <div
        style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:18px;
            padding:24px;
            margin-bottom:24px;
            box-shadow:0 5px 18px rgba(15,23,42,.05);
        "
    >

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:15px;
                margin-bottom:20px;
            "
        >

            <div>

                <h2
                    style="
                        margin:0 0 5px;
                        font-size:19px;
                        color:#111827;
                    "
                >
                    Event Mendatang
                </h2>

                <p
                    style="
                        margin:0;
                        color:#64748b;
                        font-size:13px;
                    "
                >
                    Event yang dapat menjadi bahan publikasi.
                </p>

            </div>

            <a
                href="{{ route('eo.events.index') }}"
                style="
                    text-decoration:none;
                    color:#047857;
                    font-size:13px;
                    font-weight:700;
                "
            >
                Lihat Semua
            </a>

        </div>


        @forelse($eventMendatang ?? [] as $event)

            <div
                style="
                    padding:15px 0;
                    border-top:1px solid #f1f5f9;
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    gap:20px;
                "
            >

                <div>

                    <div
                        style="
                            font-weight:700;
                            color:#111827;
                            margin-bottom:5px;
                        "
                    >
                        {{ $event->nama_event }}
                    </div>

                    <div
                        style="
                            font-size:12px;
                            color:#64748b;
                        "
                    >
                        {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                    </div>

                </div>

                <div
                    style="
                        font-size:12px;
                        color:#64748b;
                        white-space:nowrap;
                    "
                >
                    {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y') }}
                </div>

            </div>

        @empty

            <div
                style="
                    padding:30px;
                    text-align:center;
                    color:#94a3b8;
                    background:#f8fafc;
                    border-radius:12px;
                "
            >
                Belum ada event mendatang.

            </div>

        @endforelse

    </div>


    {{-- ========================================
         FOKUS HUMAS
    ======================================== --}}

    <div
        style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:18px;
            padding:24px;
            box-shadow:0 5px 18px rgba(15,23,42,.05);
        "
    >

        <h2
            style="
                margin:0 0 6px;
                font-size:19px;
                color:#111827;
            "
        >
            Fokus Kerja Humas
        </h2>

        <p
            style="
                margin:0 0 20px;
                color:#64748b;
                font-size:13px;
            "
        >
            Alur kerja utama divisi Humas.
        </p>


        <div
            style="
                display:grid;
                grid-template-columns:
                    repeat(3, minmax(0,1fr));
                gap:15px;
            "
        >

            <div
                style="
                    padding:18px;
                    border-radius:14px;
                    background:#f0fdf4;
                    border:1px solid #dcfce7;
                "
            >

                <strong>
                    01. Buat Materi
                </strong>

                <p
                    style="
                        margin:7px 0 0;
                        color:#64748b;
                        font-size:13px;
                        line-height:1.6;
                    "
                >
                    Humas membuat judul, isi,
                    jenis, dan gambar publikasi.
                </p>

            </div>


            <div
                style="
                    padding:18px;
                    border-radius:14px;
                    background:#eff6ff;
                    border:1px solid #dbeafe;
                "
            >

                <strong>
                    02. Ajukan
                </strong>

                <p
                    style="
                        margin:7px 0 0;
                        color:#64748b;
                        font-size:13px;
                        line-height:1.6;
                    "
                >
                    Materi dikirim kepada Admin
                    untuk diperiksa.
                </p>

            </div>


            <div
                style="
                    padding:18px;
                    border-radius:14px;
                    background:#faf5ff;
                    border:1px solid #ede9fe;
                "
            >

                <strong>
                    03. Tunggu Persetujuan
                </strong>

                <p
                    style="
                        margin:7px 0 0;
                        color:#64748b;
                        font-size:13px;
                        line-height:1.6;
                    "
                >
                    Admin menentukan apakah materi
                    disetujui atau ditolak.
                </p>

            </div>

        </div>

    </div>

</div>


<style>

@media (max-width: 1000px) {

    div[style*="repeat(4"] {
        grid-template-columns:
            repeat(2, minmax(0,1fr)) !important;
    }

    div[style*="repeat(3"] {
        grid-template-columns:
            1fr !important;
    }

}

@media (max-width: 600px) {

    div[style*="repeat(4"] {
        grid-template-columns:
            1fr !important;
    }

}

</style>

</x-layouts.eo>