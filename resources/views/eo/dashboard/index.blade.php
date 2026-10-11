<x-layouts.eo :user="$user" title="Dashboard EO">

<div class="eo-page">

    {{-- STATISTIK --}}
    <section>
        <div class="section-heading">
            <div>
                <h2>Statistik</h2>
                <p>Ringkasan kondisi event dan tugas panitia.</p>
            </div>
        </div>

        <div class="eo-stats">

            <div class="stat-card">
                <span class="stat-icon">EV</span>
                <div>
                    <small>Total Event</small>
                    <strong>{{ $totalEvent }}</strong>
                    <span>Seluruh event</span>
                </div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">AK</span>
                <div>
                    <small>Event Aktif</small>
                    <strong>{{ $eventAktif }}</strong>
                    <span>Event sedang berjalan</span>
                </div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">PN</span>
                <div>
                    <small>Total Panitia</small>
                    <strong>{{ $totalPanitia }}</strong>
                    <span>Anggota panitia</span>
                </div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">TG</span>
                <div>
                    <small>Total Tugas</small>
                    <strong>{{ $totalTugas }}</strong>
                    <span>Seluruh tugas</span>
                </div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">BJ</span>
                <div>
                    <small>Tugas Berjalan</small>
                    <strong>{{ $tugasBerjalan }}</strong>
                    <span>Sedang dikerjakan</span>
                </div>
            </div>

            <div class="stat-card">
                <span class="stat-icon">SL</span>
                <div>
                    <small>Tugas Selesai</small>
                    <strong>{{ $tugasSelesai }}</strong>
                    <span>Sudah diselesaikan</span>
                </div>
            </div>

        </div>
    </section>

    {{-- AKSES CEPAT --}}
    <section class="dashboard-section">

        <div class="section-heading">
            <div>
                <h2>Akses Cepat</h2>
                <p>Akses fitur utama pengelolaan event.</p>
            </div>
        </div>

        <div class="quick-grid">

            <a href="{{ route('eo.events.index') }}" class="quick-card">
                <span>EV</span>
                <div>
                    <strong>Kelola Event</strong>
                    <small>Buat dan kelola event</small>
                </div>
            </a>

            <a href="{{ route('eo.rundown.index') }}" class="quick-card">
                <span>RD</span>
                <div>
                    <strong>Rundown</strong>
                    <small>Atur susunan acara</small>
                </div>
            </a>

            <a href="{{ route('eo.jadwal.index') }}" class="quick-card">
                <span>JD</span>
                <div>
                    <strong>Jadwal</strong>
                    <small>Kelola jadwal kegiatan</small>
                </div>
            </a>

            <a href="{{ route('eo.perlengkapan.index') }}" class="quick-card">
                <span>PR</span>
                <div>
                    <strong>Perlengkapan</strong>
                    <small>Kelola kebutuhan event</small>
                </div>
            </a>

            <a href="{{ route('eo.monitoring') }}" class="quick-card">
                <span>MN</span>
                <div>
                    <strong>Monitoring</strong>
                    <small>Pantau kegiatan event</small>
                </div>
            </a>

            <a href="{{ route('eo.panitia.index') }}" class="quick-card">
                <span>PN</span>
                <div>
                    <strong>Kelola Panitia</strong>
                    <small>Kelola anggota panitia</small>
                </div>
            </a>

            <a href="{{ route('eo.panitia.tugas.index') }}" class="quick-card">
                <span>PT</span>
                <div>
                    <strong>Pembagian Tugas</strong>
                    <small>Kelola tugas panitia</small>
                </div>
            </a>

            <a href="{{ route('eo.sponsorship.paket.index') }}" class="quick-card">
                <span>SP</span>
                <div>
                    <strong>Sponsorship</strong>
                    <small>Kelola sponsorship event</small>
                </div>
            </a>

            <a href="{{ route('eo.dokumentasi.index') }}" class="quick-card">
                <span>DK</span>
                <div>
                    <strong>Dokumentasi</strong>
                    <small>Kelola dokumentasi event</small>
                </div>
            </a>

            <a href="{{ route('eo.laporan') }}" class="quick-card">
                <span>LP</span>
                <div>
                    <strong>Laporan</strong>
                    <small>Lihat laporan event</small>
                </div>
            </a>

        </div>

    </section>

    {{-- PROGRESS TUGAS --}}
    <section class="dashboard-section">

        <div class="section-heading section-heading-row">
            <div>
                <h2>Progress Tugas Panitia</h2>
                <p>Ringkasan status seluruh tugas panitia.</p>
            </div>

            <a href="{{ route('eo.panitia.tugas.index') }}" class="section-link">
                Lihat Semua
            </a>
        </div>

        <div class="progress-grid">

            <div class="progress-card">
                <div>
                    <span>Belum Dimulai</span>
                    <strong>{{ $tugasBelumDimulai }}</strong>
                </div>
                <div class="progress-track">
                    <div class="progress-fill"
                         style="width: {{ $totalTugas > 0 ? ($tugasBelumDimulai / $totalTugas) * 100 : 0 }}%;">
                    </div>
                </div>
                <small>tugas</small>
            </div>

            <div class="progress-card">
                <div>
                    <span>Sedang Dikerjakan</span>
                    <strong>{{ $tugasBerjalan }}</strong>
                </div>
                <div class="progress-track">
                    <div class="progress-fill"
                         style="width: {{ $totalTugas > 0 ? ($tugasBerjalan / $totalTugas) * 100 : 0 }}%;">
                    </div>
                </div>
                <small>tugas</small>
            </div>

            <div class="progress-card">
                <div>
                    <span>Selesai</span>
                    <strong>{{ $tugasSelesai }}</strong>
                </div>
                <div class="progress-track">
                    <div class="progress-fill"
                         style="width: {{ $totalTugas > 0 ? ($tugasSelesai / $totalTugas) * 100 : 0 }}%;">
                    </div>
                </div>
                <small>tugas</small>
            </div>

        </div>

    </section>

    {{-- INFORMASI PANITIA --}}
    <section class="dashboard-section">

        <div class="section-heading">
            <div>
                <h2>Informasi Panitia</h2>
                <p>Informasi dan komunikasi yang berkaitan dengan panitia.</p>
            </div>
        </div>

        <div class="information-grid">

            <div class="information-card">
                <div class="information-icon">PG</div>

                <div>
                    <span>Pengumuman</span>
                    <h3>Informasi Panitia</h3>
                    <p>
                        Tempat untuk menyampaikan informasi penting
                        kepada panitia.
                    </p>
                    <button type="button" class="disabled-button">
                        Segera Hadir
                    </button>
                </div>
            </div>

            <div class="information-card">
                <div class="information-icon warning">KD</div>

                <div>
                    <span>Kendala Panitia</span>
                    <h3>Laporan Kendala</h3>
                    <p>
                        Pantau kendala atau masalah yang dilaporkan
                        oleh panitia.
                    </p>
                    <button type="button" class="disabled-button">
                        Segera Hadir
                    </button>
                </div>
            </div>

        </div>

    </section>

    {{-- SPONSORSHIP --}}
    <section class="dashboard-section">

        <div class="section-heading">
            <div>
                <h2>Sponsorship</h2>
                <p>Ringkasan sponsorship event.</p>
            </div>
        </div>

        <div class="sponsor-grid">

            <a href="{{ route('eo.sponsorship.paket.index') }}" class="sponsor-card">
                <span>SP</span>
                <div>
                    <small>Paket Sponsorship</small>
                    <strong>{{ $totalPaket }}</strong>
                </div>
            </a>

            <a href="{{ route('eo.sponsorship.pengajuan.index') }}" class="sponsor-card">
                <span>PG</span>
                <div>
                    <small>Pengajuan Sponsor</small>
                    <strong>{{ $totalPengajuan }}</strong>
                </div>
            </a>

        </div>

    </section>

    {{-- EVENT TERBARU --}}
    <section class="dashboard-section">

        <div class="section-heading section-heading-row">
            <div>
                <h2>Event Terbaru</h2>
                <p>Daftar event terbaru yang dikelola EO.</p>
            </div>

            <a href="{{ route('eo.events.index') }}" class="section-link">
                Lihat Semua
            </a>
        </div>

        <div class="event-table">

            <div class="event-table-header">
                <span>Nama Event</span>
                <span>Lokasi</span>
                <span>Tanggal</span>
                <span>Status</span>
            </div>

            @forelse($events as $event)

                <div class="event-row">

                    <div>
                        <strong>{{ $event->nama_event }}</strong>
                    </div>

                    <div>
                        {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                    </div>

                    <div>
                        {{ $event->tgl_mulai
                            ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y')
                            : '-'
                        }}
                    </div>

                    <div>
                        <span class="status-badge">
                            {{ ucfirst($event->status ?? 'draft') }}
                        </span>
                    </div>

                </div>

            @empty

                <div class="empty-state">
                    Belum ada event.
                </div>

            @endforelse

        </div>

    </section>

</div>

<style>

.eo-page {
    padding: 0 28px 28px;
    max-width: 1400px;
    margin: 0 auto;
}

.eo-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 24px;
    padding: 18px 28px 28px;
    margin-bottom: 28px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(15, 23, 42, .05);
}

.eo-badge {
    display: inline-block;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .08em;
    color: #10b981;
    margin-bottom: 8px;
}

.eo-header h1 {
    margin: 0;
    font-size: 30px;
    color: #111827;
}

.eo-header p {
    margin: 8px 0 0;
    color: #64748b;
}

.eo-user-box {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 210px;
}

.eo-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #10b981;
    color: #ffffff;
    font-weight: 800;
}

.eo-user-box strong {
    display: block;
    color: #111827;
}

.eo-user-box small {
    color: #64748b;
}

.section-heading {
    margin-top: 0;
    margin-bottom: 12px;
}

.section-heading-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.section-heading h2 {
    margin: 0;
    color: #111827;
    font-size: 20px;
}

.section-heading p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 14px;
}

.eo-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 14px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 5px 18px rgba(15, 23, 42, .04);
}

.stat-icon,
.quick-card > span,
.sponsor-card > span,
.information-icon {
    width: 46px;
    height: 46px;
    flex-shrink: 0;
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ecfdf5;
    color: #059669;
    font-size: 12px;
    font-weight: 800;
}

.stat-card small,
.stat-card > div > span {
    display: block;
    color: #64748b;
    font-size: 13px;
}

.stat-card strong {
    display: block;
    margin: 3px 0;
    font-size: 26px;
    color: #111827;
}

.dashboard-section {
    margin-top: 32px;
}

.quick-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 14px;
}

.quick-card {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 15px;
    text-decoration: none;
    transition: .2s ease;
}

.quick-card:hover,
.sponsor-card:hover {
    transform: translateY(-2px);
    border-color: #a7f3d0;
    box-shadow: 0 8px 20px rgba(15, 23, 42, .07);
}

.quick-card strong,
.sponsor-card strong {
    display: block;
    color: #111827;
}

.quick-card small {
    display: block;
    margin-top: 4px;
    color: #64748b;
    font-size: 12px;
}

.progress-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

.progress-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 20px;
}

.progress-card > div:first-child {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.progress-card span {
    color: #475569;
    font-weight: 600;
}

.progress-card strong {
    font-size: 24px;
    color: #111827;
}

.progress-card small {
    color: #64748b;
}

.progress-track {
    height: 8px;
    margin: 16px 0 8px;
    background: #e5e7eb;
    border-radius: 999px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: #10b981;
    border-radius: 999px;
}

.information-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.information-card {
    display: flex;
    gap: 16px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 22px;
}

.information-icon.warning {
    background: #fff7ed;
    color: #ea580c;
}

.information-card > div:last-child {
    flex: 1;
}

.information-card span {
    font-size: 12px;
    font-weight: 700;
    color: #64748b;
}

.information-card h3 {
    margin: 5px 0;
    color: #111827;
}

.information-card p {
    margin: 0 0 14px;
    color: #64748b;
    line-height: 1.6;
}

.disabled-button {
    border: 0;
    padding: 8px 13px;
    border-radius: 8px;
    background: #f1f5f9;
    color: #64748b;
    cursor: default;
}

.sponsor-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.sponsor-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    text-decoration: none;
}

.sponsor-card small {
    display: block;
    color: #64748b;
}

.sponsor-card strong {
    font-size: 25px;
    margin-top: 3px;
}

.event-table {
    overflow: hidden;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
}

.event-table-header,
.event-row {
    display: grid;
    grid-template-columns: 1.3fr 2fr 1fr .8fr;
    gap: 16px;
    align-items: center;
    padding: 16px 20px;
}

.event-table-header {
    background: #f8fafc;
    color: #64748b;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
}

.event-row {
    border-top: 1px solid #f1f5f9;
    color: #64748b;
    font-size: 14px;
}

.event-row strong {
    color: #111827;
}

.status-badge {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 999px;
    background: #f1f5f9;
    color: #475569;
    font-size: 12px;
    font-weight: 700;
}

.section-link {
    color: #059669;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.empty-state {
    padding: 30px;
    text-align: center;
    color: #64748b;
}

@media (max-width: 1100px) {
    .quick-grid {
        grid-template-columns: repeat(3, 1fr);
    }

    .eo-stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 760px) {
    .eo-page {
        padding: 16px;
    }

    .eo-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .eo-stats,
    .quick-grid,
    .progress-grid,
    .information-grid,
    .sponsor-grid {
        grid-template-columns: 1fr;
    }

    .event-table {
        overflow-x: auto;
    }

    .event-table-header,
    .event-row {
        min-width: 760px;
    }
}

.dashboard-intro {
    margin-bottom: 14px;
}

.dashboard-intro h1 {
    margin: 0;
    font-size: 24px;
    font-weight: 750;
    color: #111827;
}

.dashboard-intro p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 14px;
}
.eo-page > section:first-child {
    margin-top: 0 !important;
}

.eo-page > section:first-child .section-heading {
    margin-top: 0 !important;
}
</style>

</x-layouts.eo>
