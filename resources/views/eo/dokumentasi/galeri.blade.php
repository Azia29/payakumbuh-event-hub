<x-layouts.eo :user="$user" title="Galeri Event">

<style>
    .gallery-head { display:flex; align-items:flex-start; justify-content:space-between; gap:20px; margin-bottom:22px; }
    .gallery-head h1 { margin:0; font-size:27px; font-weight:800; color:#172033; }
    .gallery-head p { margin:7px 0 0; color:#64748b; font-size:13px; line-height:1.6; }
    .gallery-filter { display:flex; gap:10px; margin-bottom:20px; }
    .gallery-filter select { height:42px; min-width:220px; padding:0 12px; border:1px solid #e2e8f0; border-radius:10px; background:#f8fafc; color:#334155; font-size:12px; }
    .gallery-filter button { height:42px; padding:0 16px; border:0; border-radius:10px; background:#15803d; color:#fff; font-size:12px; font-weight:700; cursor:pointer; }
    .gallery-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(230px, 1fr)); gap:16px; }
    .gallery-card { background:#fff; border:1px solid #e5e7eb; border-radius:16px; overflow:hidden; box-shadow:0 4px 15px rgba(15,23,42,.045); }
    .gallery-media { width:100%; aspect-ratio:4/3; background:#f0fdf4; display:flex; align-items:center; justify-content:center; overflow:hidden; color:#15803d; font-weight:800; }
    .gallery-media img, .gallery-media video { width:100%; height:100%; object-fit:cover; }
    .gallery-body { padding:13px 15px 15px; }
    .gallery-title { font-size:13px; font-weight:750; color:#1e293b; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .gallery-meta { margin-top:5px; color:#94a3b8; font-size:11px; }
    .gallery-badge { display:inline-block; margin-top:8px; padding:4px 9px; border-radius:8px; font-size:10px; font-weight:800; background:#eff6ff; color:#2563eb; }
    .gallery-badge.video { background:#fef2f2; color:#dc2626; }
    .gallery-empty { text-align:center; padding:65px 20px; background:#fff; border:1px solid #e5e7eb; border-radius:18px; }
    .gallery-empty strong { display:block; font-size:15px; color:#334155; }
    .gallery-empty span { display:block; margin-top:6px; color:#94a3b8; font-size:12px; }
</style>

<div>

    <div class="gallery-head">
        <div>
            <h1>Galeri Event</h1>
            <p>Foto dan video dokumentasi yang sudah dipublikasi oleh admin.</p>
        </div>
    </div>

    <form method="GET" action="{{ route('eo.galeri.index') }}" class="gallery-filter">
        <select name="event_id">
            <option value="">Semua Event</option>
            @foreach($events as $event)
                <option value="{{ $event->id }}" {{ (string) request('event_id') === (string) $event->id ? 'selected' : '' }}>
                    {{ $event->nama_event }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
    </form>

    @if($items->count())

        <div class="gallery-grid">

            @foreach($items as $item)

                @php
                    $jenis = strtolower(trim($item->jenis ?? ''));
                    $url = $item->file ? asset('storage/' . $item->file) : null;
                @endphp

                <div class="gallery-card">

                    <div class="gallery-media">
                        @if($url && $jenis === 'foto')
                            <img src="{{ $url }}" alt="{{ $item->judul }}">
                        @elseif($url && $jenis === 'video')
                            <video src="{{ $url }}" controls preload="metadata"></video>
                        @else
                            {{ strtoupper(substr($jenis ?: 'fi', 0, 2)) }}
                        @endif
                    </div>

                    <div class="gallery-body">
                        <div class="gallery-title">{{ $item->judul }}</div>
                        <div class="gallery-meta">
                            {{ $item->event?->nama_event ?? '-' }}
                            &middot;
                            {{ $item->tanggal?->format('d M Y') ?? '-' }}
                        </div>
                        <span class="gallery-badge {{ $jenis === 'video' ? 'video' : '' }}">
                            {{ $jenis === 'video' ? 'Video' : 'Foto' }}
                        </span>
                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="gallery-empty">
            <strong>Belum ada foto atau video yang dipublikasi</strong>
            <span>Dokumentasi tampil di galeri setelah dipublikasi oleh admin.</span>
        </div>

    @endif

</div>

</x-layouts.eo>