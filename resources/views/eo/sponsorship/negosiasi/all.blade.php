<x-layouts.eo :user="$user" title="Negosiasi Sponsor">

    <div style="padding: 28px;">

        {{-- HEADER --}}
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            gap:20px;
            margin-bottom:28px;
        ">
            <div>
                <div style="
                    font-size:13px;
                    font-weight:700;
                    color:#16a34a;
                    text-transform:uppercase;
                    letter-spacing:.08em;
                    margin-bottom:7px;
                ">
                    Sponsorship
                </div>

                <h1 style="
                    margin:0;
                    font-size:28px;
                    font-weight:800;
                    color:#1f2937;
                ">
                    Negosiasi Sponsor
                </h1>

                <p style="
                    margin:8px 0 0;
                    color:#64748b;
                    font-size:14px;
                ">
                    Kelola proses negosiasi berdasarkan pengajuan sponsor yang masuk.
                </p>
            </div>

            <a href="{{ route('eo.sponsorship.pengajuan.index') }}"
               style="
                    display:inline-flex;
                    align-items:center;
                    gap:8px;
                    padding:11px 17px;
                    border-radius:10px;
                    background:#f1f5f9;
                    color:#334155;
                    text-decoration:none;
                    font-size:13px;
                    font-weight:700;
               ">
                ← Pengajuan Sponsor
            </a>
        </div>


        {{-- RINGKASAN --}}
        <div style="
            display:grid;
            grid-template-columns:repeat(3,minmax(0,1fr));
            gap:18px;
            margin-bottom:24px;
        ">

            <div style="
                background:#fff;
                border:1px solid #e5e7eb;
                border-radius:14px;
                padding:20px;
                box-shadow:0 3px 12px rgba(15,23,42,.05);
            ">
                <div style="font-size:12px;color:#64748b;font-weight:700;">
                    TOTAL PENGAJUAN
                </div>

                <div style="
                    margin-top:8px;
                    font-size:27px;
                    font-weight:800;
                    color:#1f2937;
                ">
                    {{ $pengajuans->count() }}
                </div>
            </div>


            <div style="
                background:#fff;
                border:1px solid #e5e7eb;
                border-radius:14px;
                padding:20px;
                box-shadow:0 3px 12px rgba(15,23,42,.05);
            ">
                <div style="font-size:12px;color:#64748b;font-weight:700;">
                    DALAM NEGOSIASI
                </div>

                <div style="
                    margin-top:8px;
                    font-size:27px;
                    font-weight:800;
                    color:#d97706;
                ">
                    {{ $pengajuans->where('status', 'negosiasi')->count() }}
                </div>
            </div>


            <div style="
                background:#fff;
                border:1px solid #e5e7eb;
                border-radius:14px;
                padding:20px;
                box-shadow:0 3px 12px rgba(15,23,42,.05);
            ">
                <div style="font-size:12px;color:#64748b;font-weight:700;">
                    SUDAH ADA PESAN
                </div>

                <div style="
                    margin-top:8px;
                    font-size:27px;
                    font-weight:800;
                    color:#2563eb;
                ">
                    {{ $pengajuans->filter(fn($item) => $item->negosiasi->count() > 0)->count() }}
                </div>
            </div>

        </div>


        {{-- DAFTAR --}}
        <div style="
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            box-shadow:0 4px 16px rgba(15,23,42,.05);
            overflow:hidden;
        ">

            <div style="
                padding:20px 22px;
                border-bottom:1px solid #e5e7eb;
            ">
                <div style="
                    font-size:17px;
                    font-weight:800;
                    color:#1f2937;
                ">
                    Daftar Pengajuan Sponsor
                </div>

                <div style="
                    margin-top:4px;
                    font-size:13px;
                    color:#64748b;
                ">
                    Pilih pengajuan untuk melihat dan melanjutkan proses negosiasi.
                </div>
            </div>


            @forelse($pengajuans as $pengajuan)

                <div style="
                    padding:22px;
                    border-bottom:1px solid #f1f5f9;
                ">

                    <div style="
                        display:flex;
                        justify-content:space-between;
                        align-items:flex-start;
                        gap:20px;
                    ">

                        <div style="min-width:0;flex:1;">

                            <div style="
                                font-size:17px;
                                font-weight:800;
                                color:#1f2937;
                            ">
                                {{ $pengajuan->sponsor?->nama_perusahaan
                                    ?? $pengajuan->sponsor?->nama
                                    ?? 'Sponsor' }}
                            </div>

                            <div style="
                                margin-top:5px;
                                font-size:14px;
                                color:#475569;
                            ">
                                Event:
                                <strong>
                                    {{ $pengajuan->paket?->event?->nama_event ?? '-' }}
                                </strong>
                            </div>

                            <div style="
                                display:flex;
                                flex-wrap:wrap;
                                gap:18px;
                                margin-top:12px;
                                font-size:13px;
                                color:#64748b;
                            ">
                                <span>
                                    Nominal Pengajuan:
                                    <strong style="color:#1f2937;">
                                        Rp {{ number_format((float) $pengajuan->nominal_pengajuan, 0, ',', '.') }}
                                    </strong>
                                </span>

                                <span>
                                    Percakapan:
                                    <strong style="color:#1f2937;">
                                        {{ $pengajuan->negosiasi->count() }}
                                    </strong>
                                </span>
                            </div>

                        </div>


                        <div style="
                            display:flex;
                            align-items:center;
                            gap:10px;
                            flex-shrink:0;
                        ">

                            @php
                                $status = $pengajuan->status ?? 'menunggu';

                                $statusLabel = match($status) {
                                    'menunggu' => 'Menunggu',
                                    'ditinjau' => 'Ditinjau',
                                    'negosiasi' => 'Negosiasi',
                                    'disetujui' => 'Disetujui',
                                    'ditolak' => 'Ditolak',
                                    'selesai' => 'Selesai',
                                    default => ucfirst($status),
                                };
                            @endphp

                            <span style="
                                display:inline-flex;
                                align-items:center;
                                padding:7px 11px;
                                border-radius:999px;
                                background:#f1f5f9;
                                color:#475569;
                                font-size:12px;
                                font-weight:800;
                            ">
                                {{ $statusLabel }}
                            </span>

                            <a href="{{ route('eo.sponsorship.pengajuan.show', $pengajuan) }}"
                               style="
                                    padding:9px 13px;
                                    border:1px solid #dbe3ea;
                                    border-radius:9px;
                                    color:#334155;
                                    text-decoration:none;
                                    font-size:12px;
                                    font-weight:700;
                               ">
                                Lihat
                            </a>

                            <a href="{{ route('eo.sponsorship.negosiasi.index', $pengajuan) }}"
                               style="
                                    padding:9px 14px;
                                    border-radius:9px;
                                    background:#16a34a;
                                    color:#fff;
                                    text-decoration:none;
                                    font-size:12px;
                                    font-weight:800;
                               ">
                                Negosiasi
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div style="
                    padding:55px 20px;
                    text-align:center;
                ">
                    <div style="
                        font-size:18px;
                        font-weight:800;
                        color:#334155;
                    ">
                        Belum ada pengajuan sponsor
                    </div>

                    <div style="
                        margin-top:7px;
                        font-size:13px;
                        color:#64748b;
                    ">
                        Data pengajuan sponsor akan muncul di halaman ini.
                    </div>
                </div>

            @endforelse

        </div>

    </div>

</x-layouts.eo>