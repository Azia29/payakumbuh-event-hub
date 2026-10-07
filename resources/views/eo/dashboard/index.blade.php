<x-layouts.eo :user="$user" title="Dashboard EO">

<div class="eo-page">

    <div class="eo-hero">
        <div>
            <span class="eo-badge">EO EVENT HUB</span>
            <h1>Dashboard EO</h1>
            <p>
                Kelola seluruh kegiatan event dalam satu dashboard.
            </p>
        </div>

        <div class="eo-user-box">
            <div class="eo-avatar">
                {{ strtoupper(substr($user->name ?? 'E', 0, 1)) }}
            </div>
            <div>
                <strong>{{ $user->name ?? 'EO' }}</strong>
                <small>Event Organizer</small>
            </div>
        </div>
    </div>

    <div class="eo-stats">

        <div class="eo-stat">
            <span>Total Event</span>
            <strong>{{ $totalEvent }}</strong>
        </div>

        <div class="eo-stat">
            <span>Event Aktif</span>
            <strong>{{ $eventAktif }}</strong>
        </div>

        <div class="eo-stat">
            <span>Total Panitia</span>
            <strong>{{ $totalPanitia }}</strong>
        </div>

        <div class="eo-stat">
            <span>Paket Sponsor</span>
            <strong>{{ $totalPaket }}</strong>
        </div>

        <div class="eo-stat">
            <span>Pengajuan Sponsor</span>
            <strong>{{ $totalPengajuan }}</strong>
        </div>

    </div>

    <div class="eo-grid">

        <a href="{{ route('eo.events.index') }}" class="eo-menu">
            <span>EV</span>
            <div>
                <strong>Kelola Event</strong>
                <small>Buat dan kelola event</small>
            </div>
        </a>

        <a href="{{ route('eo.rundown.index') }}" class="eo-menu">
            <span>RD</span>
            <div>
                <strong>Rundown Acara</strong>
                <small>Atur susunan acara</small>
            </div>
        </a>

        <a href="{{ route('eo.jadwal.index') }}" class="eo-menu">
            <span>JD</span>
            <div>
                <strong>Jadwal Kegiatan</strong>
                <small>Kelola jadwal event</small>
            </div>
        </a>

        <a href="{{ route('eo.perlengkapan.index') }}" class="eo-menu">
            <span>PR</span>
            <div>
                <strong>Perlengkapan</strong>
                <small>Kelola kebutuhan event</small>
            </div>
        </a>

        <a href="{{ route('eo.monitoring') }}" class="eo-menu">
            <span>MN</span>
            <div>
                <strong>Monitoring</strong>
                <small>Pantau kegiatan event</small>
            </div>
        </a>

        <a href="{{ route('eo.panitia.index') }}" class="eo-menu">
            <span>PN</span>
            <div>
                <strong>Kelola Panitia</strong>
                <small>Kelola anggota panitia</small>
            </div>
        </a>

        <a href="{{ route('eo.sponsorship.paket.index') }}" class="eo-menu">
            <span>SP</span>
            <div>
                <strong>Paket Sponsorship</strong>
                <small>Kelola paket sponsor</small>
            </div>
        </a>

        <a href="{{ route('eo.sponsorship.pengajuan.index') }}" class="eo-menu">
            <span>PG</span>
            <div>
                <strong>Pengajuan Sponsor</strong>
                <small>Review pengajuan sponsor</small>
            </div>
        </a>

        <a href="{{ route('eo.sponsorship.negosiasi.index', 1) }}" class="eo-menu">
            <span>NG</span>
            <div>
                <strong>Negosiasi</strong>
                <small>Kelola negosiasi sponsor</small>
            </div>
        </a>

        <a href="{{ route('eo.sponsorship.dukungan.index') }}" class="eo-menu">
            <span>DK</span>
            <div>
                <strong>Dukungan Sponsor</strong>
                <small>Kelola dukungan sponsor</small>
            </div>
        </a>

        <a href="{{ route('eo.dokumentasi.index') }}" class="eo-menu">
            <span>DK</span>
            <div>
                <strong>Dokumentasi</strong>
                <small>Kelola dokumentasi event</small>
            </div>
        </a>

        <a href="{{ route('eo.laporan') }}" class="eo-menu">
            <span>LP</span>
            <div>
                <strong>Laporan Event</strong>
                <small>Lihat laporan kegiatan</small>
            </div>
        </a>

    </div>

    <div class="eo-events">
        <div class="eo-section-title">
            <div>
                <h2>Event Terbaru</h2>
                <p>Daftar event terbaru yang dikelola EO.</p>
            </div>

            <a href="{{ route('eo.events.index') }}">Lihat Semua</a>
        </div>

        @forelse($events as $event)

            <div class="eo-event-row">

                <div>
                    <strong>{{ $event->nama_event }}</strong>
                    <span>
                        {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                    </span>
                </div>

                <div>
                    <span>
                        {{ $event->tgl_mulai ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y') : '-' }}
                    </span>
                </div>

                <div>
                    <span class="eo-status">
                        {{ ucfirst($event->status ?? 'draft') }}
                    </span>
                </div>

            </div>

        @empty

            <div class="eo-empty">
                Belum ada event.
            </div>

        @endforelse

    </div>

</div>

<style>

.eo-page {
    padding: 28px;
}

.eo-hero {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    padding:28px;
    border-radius:20px;
    background:#ffffff;
    border:1px solid #e5e7eb;
    box-shadow:0 8px 25px rgba(15,23,42,.06);
}

.eo-badge {
    display:inline-block;
    padding:6px 10px;
    border-radius:999px;
    background:#ecfdf5;
    color:#047857;
    font-size:11px;
    font-weight:700;
    letter-spacing:.06em;
}

.eo-hero h1 {
    margin:10px 0 5px;
    color:#111827;
    font-size:28px;
}

.eo-hero p {
    margin:0;
    color:#64748b;
}

.eo-user-box {
    display:flex;
    align-items:center;
    gap:12px;
}

.eo-user-box small {
    display:block;
    color:#64748b;
    margin-top:3px;
}

.eo-avatar {
    width:44px;
    height:44px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#10b981;
    color:#fff;
    font-weight:800;
}

.eo-stats {
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:15px;
    margin-top:20px;
}

.eo-stat {
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:16px;
    padding:20px;
}

.eo-stat span {
    display:block;
    color:#64748b;
    font-size:13px;
}

.eo-stat strong {
    display:block;
    color:#111827;
    font-size:27px;
    margin-top:8px;
}

.eo-grid {
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
    margin-top:20px;
}

.eo-menu {
    display:flex;
    align-items:center;
    gap:14px;
    padding:18px;
    border-radius:16px;
    border:1px solid #e5e7eb;
    background:#fff;
    text-decoration:none;
    transition:.2s;
}

.eo-menu:hover {
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(15,23,42,.08);
    border-color:#a7f3d0;
}

.eo-menu > span {
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:12px;
    background:#ecfdf5;
    color:#047857;
    font-size:12px;
    font-weight:800;
}

.eo-menu strong {
    display:block;
    color:#111827;
}

.eo-menu small {
    display:block;
    color:#64748b;
    margin-top:4px;
}

.eo-events {
    margin-top:20px;
    padding:22px;
    border-radius:18px;
    background:#fff;
    border:1px solid #e5e7eb;
}

.eo-section-title {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

.eo-section-title h2 {
    margin:0;
    color:#111827;
}

.eo-section-title p {
    margin:5px 0 0;
    color:#64748b;
    font-size:13px;
}

.eo-section-title a {
    color:#047857;
    text-decoration:none;
    font-weight:700;
}

.eo-event-row {
    display:grid;
    grid-template-columns:2fr 1fr 1fr;
    gap:15px;
    padding:15px 0;
    border-top:1px solid #f1f5f9;
}

.eo-event-row strong,
.eo-event-row span {
    display:block;
}

.eo-event-row span {
    color:#64748b;
    font-size:13px;
    margin-top:4px;
}

.eo-status {
    display:inline-block !important;
    padding:5px 9px;
    border-radius:999px;
    background:#f0fdf4;
    color:#15803d !important;
}

.eo-empty {
    padding:30px;
    text-align:center;
    color:#64748b;
}

@media(max-width:900px) {
    .eo-stats {
        grid-template-columns:repeat(2,1fr);
    }

    .eo-grid {
        grid-template-columns:1fr 1fr;
    }
}

@media(max-width:600px) {
    .eo-hero,
    .eo-section-title {
        align-items:flex-start;
        flex-direction:column;
    }

    .eo-stats,
    .eo-grid {
        grid-template-columns:1fr;
    }

    .eo-event-row {
        grid-template-columns:1fr;
    }
}

</style>

</x-layouts.eo>