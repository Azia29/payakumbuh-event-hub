<x-layouts.eo :user="$user" title="Detail Dokumentasi">

@php
    $jenis = strtolower(trim($dokumentasi->jenis ?? ''));
    $status = $dokumentasi->status ?? 'draft';
    $fileUrl = $dokumentasi->file ? asset('storage/' . $dokumentasi->file) : null;
@endphp

<style>
    .dd-head { display:flex; align-items:flex-start; justify-content:space-between; gap:20px; margin-bottom:22px; }
    .dd-head h1 { margin:0; font-size:27px; font-weight:800; color:#172033; }
    .dd-head p { margin:7px 0 0; color:#64748b; font-size:13px; }
    .dd-btn { display:inline-flex; align-items:center; justify-content:center; height:40px; padding:0 16px; border-radius:10px; border:1px solid #e2e8f0; background:#fff; color:#475569; font-size:12px; font-weight:700; text-decoration:none; cursor:pointer; transition:.2s; }
    .dd-btn:hover { background:#f8fafc; border-color:#cbd5e1; }
    .dd-btn.green { background:#15803d; border-color:#15803d; color:#fff; }
    .dd-btn.green:hover { background:#166534; }
    .dd-btn.red { color:#dc2626; }
    .dd-btn.red:hover { background:#fef2f2; border-color:#fecaca; }
    .dd-alert { margin-bottom:18px; padding:13px 16px; border-radius:11px; font-size:12px; font-weight:600; }
    .dd-alert.ok { border:1px solid #bbf7d0; background:#f0fdf4; color:#166534; }
    .dd-alert.err { border:1px solid #fecaca; background:#fef2f2; color:#b91c1c; }
    .dd-grid { display:grid; grid-template-columns:minmax(0,1.1fr) minmax(0,1fr); gap:20px; align-items:start; }
    .dd-card { background:#fff; border:1px solid #e5e7eb; border-radius:18px; box-shadow:0 4px 15px rgba(15,23,42,.045); overflow:hidden; }
    .dd-card-head { padding:17px 21px; border-bottom:1px solid #eef2f7; font-size:15px; font-weight:750; color:#172033; }
    .dd-media { background:#f0fdf4; display:flex; align-items:center; justify-content:center; min-height:280px; }
    .dd-media img, .dd-media video { width:100%; max-height:460px; object-fit:contain; display:block; }
    .dd-media .dd-placeholder { padding:40px; text-align:center; color:#15803d; font-weight:800; }
    .dd-media .dd-placeholder small { display:block; margin-top:6px; color:#94a3b8; font-weight:600; font-size:11px; }
    .dd-file { padding:14px 21px; border-top:1px solid #eef2f7; display:flex; justify-content:space-between; align-items:center; gap:12px; font-size:12px; color:#64748b; }
    .dd-info { padding:6px 21px 12px; }
    .dd-row { padding:14px 0; border-bottom:1px solid #f1f5f9; }
    .dd-row:last-child { border-bottom:0; }
    .dd-label { font-size:10px; font-weight:800; color:#94a3b8; text-transform:uppercase; letter-spacing:.5px; }
    .dd-value { margin-top:6px; font-size:14px; font-weight:650; color:#1e293b; line-height:1.6; }
    .dd-badge { display:inline-flex; padding:6px 11px; border-radius:8px; font-size:11px; font-weight:800; }
    .b-draft { background:#f1f5f9; color:#475569; }
    .b-diajukan { background:#fff7ed; color:#c2410c; }
    .b-publik { background:#f0fdf4; color:#15803d; }
    .b-foto { background:#eff6ff; color:#2563eb; }
    .b-video { background:#fef2f2; color:#dc2626; }
    .b-dokumen { background:#fff7ed; color:#c2410c; }
    .dd-actions { display:flex; flex-wrap:wrap; gap:10px; padding:16px 21px; border-top:1px solid #eef2f7; background:#f8fafc; }
    .dd-note { padding:13px 21px; background:#fff7ed; color:#9a3412; font-size:12px; border-top:1px solid #fed7aa; }
    @media(max-width:900px){ .dd-grid{ grid-template-columns:1fr; } .dd-head{ flex-direction:column; } }
</style>

<div>

    <div class="dd-head">
        <div>
            <h1>Detail Dokumentasi</h1>
            <p>Informasi lengkap dokumentasi event.</p>
        </div>
        <a href="{{ route('eo.dokumentasi.index') }}" class="dd-btn">&larr; Kembali</a>
    </div>

    @if(session('success'))
        <div class="dd-alert ok">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="dd-alert err">{{ session('error') }}</div>
    @endif

    <div class="dd-grid">

        <div class="dd-card">
            <div class="dd-card-head">Pratinjau File</div>

            <div class="dd-media">
                @if($fileUrl && $jenis === 'foto')
                    <img src="{{ $fileUrl }}" alt="{{ $dokumentasi->judul }}">
                @elseif($fileUrl && $jenis === 'video')
                    <video src="{{ $fileUrl }}" controls preload="metadata"></video>
                @else
                    <div class="dd-placeholder">
                        {{ $jenis === 'dokumen' ? 'DOKUMEN' : 'FILE' }}
                        <small>{{ $fileUrl ? 'Pratinjau tidak tersedia, buka file lewat tombol di bawah.' : 'Belum ada file yang diunggah.' }}</small>
                    </div>
                @endif
            </div>

            @if($fileUrl)
                <div class="dd-file">
                    <span>{{ basename($dokumentasi->file) }}</span>
                    <a href="{{ $fileUrl }}" target="_blank" class="dd-btn">Buka File</a>
                </div>
            @endif
        </div>

        <div class="dd-card">
            <div class="dd-card-head">Informasi Dokumentasi</div>

            <div class="dd-info">

                <div class="dd-row">
                    <div class="dd-label">Status</div>
                    <div class="dd-value">
                        @if($status === 'dipublikasi')
                            <span class="dd-badge b-publik">Dipublikasi</span>
                        @elseif($status === 'diajukan')
                            <span class="dd-badge b-diajukan">Menunggu Admin</span>
                        @else
                            <span class="dd-badge b-draft">Draft</span>
                        @endif
                    </div>
                </div>

                <div class="dd-row">
                    <div class="dd-label">Judul</div>
                    <div class="dd-value">{{ $dokumentasi->judul }}</div>
                </div>

                <div class="dd-row">
                    <div class="dd-label">Event</div>
                    <div class="dd-value">{{ $dokumentasi->event?->nama_event ?? '-' }}</div>
                </div>

                <div class="dd-row">
                    <div class="dd-label">Jenis</div>
                    <div class="dd-value">
                        <span class="dd-badge {{ $jenis === 'foto' ? 'b-foto' : ($jenis === 'video' ? 'b-video' : 'b-dokumen') }}">
                            {{ ucfirst($jenis ?: 'Lainnya') }}
                        </span>
                    </div>
                </div>

                <div class="dd-row">
                    <div class="dd-label">Tanggal Dokumentasi</div>
                    <div class="dd-value">{{ $dokumentasi->tanggal?->format('d M Y') ?? '-' }}</div>
                </div>

                <div class="dd-row">
                    <div class="dd-label">Keterangan</div>
                    <div class="dd-value">{{ $dokumentasi->keterangan ?: 'Tidak ada keterangan.' }}</div>
                </div>

                @if($status === 'dipublikasi' && $dokumentasi->published_at)
                    <div class="dd-row">
                        <div class="dd-label">Dipublikasi Pada</div>
                        <div class="dd-value">{{ $dokumentasi->published_at->format('d M Y, H:i') }}</div>
                    </div>
                @endif

            </div>

            @if($status === 'diajukan')
                <div class="dd-note">Dokumentasi ini sedang menunggu admin. Batalkan pengajuan jika ingin mengubahnya.</div>
            @elseif($status === 'dipublikasi')
                <div class="dd-note">Dokumentasi ini sudah dipublikasi oleh admin, sehingga tidak bisa diubah atau dihapus oleh EO.</div>
            @endif

            <div class="dd-actions">

                @if($status === 'draft')

                    <form action="{{ route('eo.dokumentasi.ajukan', $dokumentasi) }}" method="POST"
                          onsubmit="return confirm('Ajukan dokumentasi ini ke admin untuk dipublikasi?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="dd-btn green">Ajukan ke Admin</button>
                    </form>

                    <a href="{{ route('eo.dokumentasi.edit', $dokumentasi) }}" class="dd-btn">Edit</a>

                    <form action="{{ route('eo.dokumentasi.destroy', $dokumentasi) }}" method="POST"
                          onsubmit="return confirm('Hapus dokumentasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dd-btn red">Hapus</button>
                    </form>

                @elseif($status === 'diajukan')

                    <form action="{{ route('eo.dokumentasi.batalkan', $dokumentasi) }}" method="POST"
                          onsubmit="return confirm('Batalkan pengajuan ini?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="dd-btn">Batalkan Pengajuan</button>
                    </form>

                @endif

            </div>

        </div>

    </div>

</div>

</x-layouts.eo>