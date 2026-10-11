<x-layouts.eo :user="$user" title="Pengajuan Sponsor">

<style>
    .sponsor-page { color:#1f2937; }
    .sponsor-heading { margin-bottom:24px; }
    .sponsor-heading h1 { margin:0 0 7px; font-size:28px; font-weight:800; }
    .sponsor-heading p { margin:0; color:#64748b; font-size:14px; }
    .stats { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:16px; margin-bottom:24px; }
    .stat { padding:20px; background:#fff; border:1px solid #e5e7eb; border-radius:15px; }
    .stat-label { color:#64748b; font-size:13px; margin-bottom:8px; }
    .stat-value { font-size:26px; font-weight:800; }
    .application { background:#fff; border:1px solid #e5e7eb; border-radius:16px; margin-bottom:16px; overflow:hidden; }
    .application-head { padding:20px; display:flex; justify-content:space-between; gap:16px; align-items:flex-start; background:#f8fafc; border-bottom:1px solid #e5e7eb; }
    .company-name { font-size:18px; font-weight:800; margin-bottom:5px; }
    .muted { color:#64748b; font-size:13px; }
    .status { display:inline-block; padding:7px 11px; border-radius:30px; font-size:11px; font-weight:800; text-transform:uppercase; background:#e2e8f0; color:#334155; white-space:nowrap; }
    .status-menunggu { background:#fef3c7; color:#92400e; }
    .status-ditinjau { background:#dbeafe; color:#1d4ed8; }
    .status-negosiasi { background:#ede9fe; color:#6d28d9; }
    .status-disetujui { background:#dcfce7; color:#166534; }
    .status-ditolak { background:#fee2e2; color:#b91c1c; }
    .application-body { padding:20px; }
    .info-grid { display:grid; grid-template-columns:repeat(4,minmax(0,1fr)); gap:14px; }
    .info { padding:13px; background:#f8fafc; border:1px solid #e5e7eb; border-radius:11px; min-width:0; }
    .info-label { color:#64748b; font-size:11px; text-transform:uppercase; font-weight:700; margin-bottom:6px; }
    .info-value { font-size:14px; font-weight:700; overflow-wrap:anywhere; }
    .message { margin-top:16px; padding:14px; border:1px solid #e5e7eb; border-radius:11px; font-size:14px; line-height:1.6; white-space:pre-line; }
    .actions { display:flex; flex-wrap:wrap; gap:10px; margin-top:18px; }
    .btn { display:inline-flex; align-items:center; justify-content:center; padding:10px 15px; border-radius:9px; text-decoration:none; font-size:13px; font-weight:800; border:0; cursor:pointer; }
    .btn-primary { background:#16a34a; color:#fff; }
    .btn-secondary { background:#f1f5f9; color:#334155; }
    .empty { padding:45px 20px; text-align:center; border:1px solid #e5e7eb; border-radius:16px; background:#fff; }
    .empty h3 { margin:0 0 8px; }
    .empty p { margin:0; color:#64748b; font-size:14px; }
    @media(max-width:900px) { .stats,.info-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } }
    @media(max-width:600px) { .stats,.info-grid { grid-template-columns:1fr; } .application-head { flex-direction:column; } }
</style>

<div class="sponsor-page">
    <div class="sponsor-heading">
        <h1>Pengajuan Sponsor</h1>
        <p>Periksa pengajuan perusahaan, paket yang dipilih, nominal, dan status permohonan.</p>
    </div>

    @if(session('success'))
        <div style="padding:13px 16px;background:#dcfce7;color:#166534;border-radius:10px;margin-bottom:18px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="padding:13px 16px;background:#fee2e2;color:#991b1b;border-radius:10px;margin-bottom:18px;">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="stats">
        <div class="stat">
            <div class="stat-label">Total Pengajuan</div>
            <div class="stat-value">{{ $pengajuans->count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-label">Menunggu</div>
            <div class="stat-value">{{ $pengajuans->where('status','menunggu')->count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-label">Dalam Negosiasi</div>
            <div class="stat-value">{{ $pengajuans->where('status','negosiasi')->count() }}</div>
        </div>
        <div class="stat">
            <div class="stat-label">Disetujui</div>
            <div class="stat-value">{{ $pengajuans->where('status','disetujui')->count() }}</div>
        </div>
    </div>

    @forelse($pengajuans as $pengajuan)
        @php
            $status = strtolower($pengajuan->status ?? 'menunggu');
            $statusClass = 'status-' . $status;
        @endphp

        <article class="application">
            <div class="application-head">
                <div>
                    <div class="company-name">
                        {{ $pengajuan->sponsor?->nama_perusahaan ?? 'Sponsor tidak ditemukan' }}
                    </div>
                    <div class="muted">
                        Kontak: {{ $pengajuan->sponsor?->nama_kontak ?? '-' }}
                        @if($pengajuan->sponsor?->email)
                            · {{ $pengajuan->sponsor->email }}
                        @endif
                    </div>
                </div>
                <span class="status {{ $statusClass }}">{{ ucfirst($status) }}</span>
            </div>

            <div class="application-body">
                <div class="info-grid">
                    <div class="info">
                        <div class="info-label">Event</div>
                        <div class="info-value">{{ $pengajuan->paket?->event?->nama_event ?? '-' }}</div>
                    </div>
                    <div class="info">
                        <div class="info-label">Paket Sponsorship</div>
                        <div class="info-value">{{ $pengajuan->paket?->nama_paket ?? '-' }}</div>
                    </div>
                    <div class="info">
                        <div class="info-label">Nominal Pengajuan</div>
                        <div class="info-value">Rp {{ number_format((float)$pengajuan->nominal_pengajuan,0,',','.') }}</div>
                    </div>
                    <div class="info">
                        <div class="info-label">Tanggal Pengajuan</div>
                        <div class="info-value">{{ $pengajuan->created_at?->format('d M Y') ?? '-' }}</div>
                    </div>
                </div>

                <div class="message">
                    <strong>Pesan dari sponsor</strong><br>
                    {{ $pengajuan->pesan ?: 'Sponsor tidak menyertakan pesan.' }}
                </div>

                @if($pengajuan->catatan_eo)
                    <div class="message">
                        <strong>Catatan EO</strong><br>
                        {{ $pengajuan->catatan_eo }}
                    </div>
                @endif

                <div class="actions">
                    <a class="btn btn-secondary"
                       href="{{ route('eo.sponsorship.pengajuan.show', $pengajuan) }}">
                        Lihat Detail
                    </a>

                    <a class="btn btn-primary"
                       href="{{ route('eo.sponsorship.negosiasi.index', $pengajuan) }}">
                        Buka Negosiasi
                    </a>
                </div>
            </div>
        </article>
    @empty
        <div class="empty">
            <h3>Belum Ada Pengajuan Sponsor</h3>
            <p>Pengajuan dari perusahaan akan tampil di sini setelah sponsor mengirim permohonan.</p>
        </div>
    @endforelse
</div>

</x-layouts.eo>