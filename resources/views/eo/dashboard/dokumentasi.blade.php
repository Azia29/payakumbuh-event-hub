<x-layouts.eo :user="$user" title="Dashboard Dokumentasi">

<style>
    .doc-page {
        padding: 0;
    }

    /* HERO */
    .doc-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #064e2b, #15803d);
        border-radius: 24px;
        padding: 34px;
        color: white;
        margin-bottom: 24px;
    }

    .doc-hero::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 1px solid rgba(255,255,255,.13);
        border-radius: 50%;
        right: -80px;
        top: -120px;
    }

    .doc-hero::after {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border: 1px solid rgba(255,255,255,.10);
        border-radius: 50%;
        right: 80px;
        bottom: -130px;
    }

    .doc-hero-content {
        position: relative;
        z-index: 2;
        max-width: 700px;
    }

    .doc-eyebrow {
        display: inline-flex;
        align-items: center;
        padding: 7px 12px;
        border-radius: 999px;
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.16);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .3px;
        margin-bottom: 16px;
    }

    .doc-hero h2 {
        margin: 0;
        font-size: 31px;
        line-height: 1.15;
        font-weight: 800;
    }

    .doc-hero p {
        margin: 14px 0 0;
        color: #dcfce7;
        font-size: 13px;
        line-height: 1.7;
        max-width: 620px;
    }

    .doc-hero-actions {
        display: flex;
        gap: 10px;
        margin-top: 24px;
        flex-wrap: wrap;
    }

    .doc-btn-primary,
    .doc-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 0 16px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        transition: .2s;
    }

    .doc-btn-primary {
        background: white;
        color: #166534;
    }

    .doc-btn-primary:hover {
        background: #f0fdf4;
        transform: translateY(-1px);
    }

    .doc-btn-secondary {
        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.25);
        color: white;
    }

    .doc-btn-secondary:hover {
        background: rgba(255,255,255,.17);
    }

    /* STATISTICS */
    .doc-stat-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 22px;
    }

    .doc-stat {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 19px;
        box-shadow: 0 4px 15px rgba(15,23,42,.045);
        min-height: 145px;
    }

    .doc-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .doc-stat-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        background: #f0fdf4;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 800;
        border: 1px solid #dcfce7;
    }

    .doc-stat-label {
        margin-top: 17px;
        font-size: 12px;
        color: #64748b;
    }

    .doc-stat-number {
        margin-top: 4px;
        font-size: 27px;
        font-weight: 800;
        color: #172033;
    }

    /* MAIN GRID */
    .doc-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.55fr) minmax(310px, .85fr);
        gap: 20px;
    }

    /* CARD */
    .doc-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 4px 15px rgba(15,23,42,.045);
        overflow: hidden;
    }

    .doc-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #eef2f7;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .doc-card-title {
        margin: 0;
        color: #172033;
        font-size: 17px;
        font-weight: 750;
    }

    .doc-card-desc {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    /* MEDIA */
    .doc-media {
        padding: 20px 22px;
    }

    .doc-media-feature {
        min-height: 180px;
        border-radius: 15px;
        background: linear-gradient(135deg, #052e16, #166534);
        display: flex;
        align-items: flex-end;
        padding: 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .doc-media-feature::before {
        content: "DK";
        position: absolute;
        right: 30px;
        top: 25px;
        font-size: 70px;
        font-weight: 900;
        color: rgba(255,255,255,.06);
    }

    .doc-media-feature-content {
        position: relative;
        z-index: 2;
    }

    .doc-media-tag {
        display: inline-block;
        padding: 5px 9px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.18);
        border-radius: 999px;
        font-size: 10px;
        margin-bottom: 9px;
    }

    .doc-media-title {
        font-size: 20px;
        font-weight: 700;
    }

    .doc-media-subtitle {
        margin-top: 5px;
        font-size: 12px;
        color: #dcfce7;
    }

    /* RECENT */
    .doc-recent {
        margin-top: 18px;
    }

    .doc-recent-item {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .doc-recent-item:last-child {
        border-bottom: none;
    }

    .doc-thumb {
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #f0fdf4;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 800;
        border: 1px solid #dcfce7;
    }

    .doc-recent-content {
        min-width: 0;
        flex: 1;
    }

    .doc-recent-title {
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .doc-recent-meta {
        margin-top: 4px;
        font-size: 11px;
        color: #94a3b8;
    }

    .doc-type {
        padding: 5px 8px;
        border-radius: 7px;
        background: #f0fdf4;
        color: #15803d;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* QUICK ACTION */
    .doc-actions {
        padding: 18px;
    }

    .doc-action {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 14px;
        border: 1px solid #e5e7eb;
        border-radius: 13px;
        text-decoration: none;
        color: #334155;
        margin-bottom: 11px;
        transition: .2s;
    }

    .doc-action:last-child {
        margin-bottom: 0;
    }

    .doc-action:hover {
        border-color: #86efac;
        background: #f0fdf4;
        transform: translateY(-1px);
    }

    .doc-action-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: #f0fdf4;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 800;
        flex-shrink: 0;
        border: 1px solid #dcfce7;
    }

    .doc-action strong {
        display: block;
        font-size: 13px;
    }

    .doc-action span {
        display: block;
        margin-top: 3px;
        color: #94a3b8;
        font-size: 11px;
    }

    /* INFO */
    .doc-info {
        margin-top: 20px;
        padding: 19px 22px;
        border: 1px solid #bbf7d0;
        background: linear-gradient(135deg, #f0fdf4, #ffffff);
        border-radius: 18px;
    }

    .doc-info-title {
        color: #166534;
        font-weight: 700;
        font-size: 14px;
    }

    .doc-info-text {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
    }

    /* EMPTY */
    .doc-empty {
        text-align: center;
        padding: 30px 10px;
        color: #94a3b8;
    }

    .doc-empty-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        margin: 0 auto;
        background: #f0fdf4;
        color: #15803d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    .doc-empty-title {
        margin-top: 10px;
        font-size: 13px;
        font-weight: 700;
        color: #64748b;
    }

    .doc-empty-text {
        margin-top: 4px;
        font-size: 11px;
    }

    /* RESPONSIVE */
    @media(max-width:1050px) {
        .doc-stat-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .doc-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width:600px) {
        .doc-stat-grid {
            grid-template-columns: 1fr;
        }

        .doc-hero {
            padding: 24px;
        }

        .doc-hero h2 {
            font-size: 25px;
        }
    }
</style>

<div class="doc-page">

    {{-- HERO --}}
    <section class="doc-hero">

        <div class="doc-hero-content">

            <div class="doc-eyebrow">
                DK — DIVISI DOKUMENTASI
            </div>

            <h2>
                Pusat Dokumentasi<br>
                Payakumbuh Event Hub
            </h2>

            <p>
                Simpan, kelola, dan arsipkan seluruh momen penting
                dari setiap kegiatan event dalam satu tempat.
            </p>

            <div class="doc-hero-actions">

                <a
                    href="{{ route('eo.dokumentasi.create') }}"
                    class="doc-btn-primary"
                >
                    + Tambah Dokumentasi
                </a>

                <a
                    href="{{ route('eo.dokumentasi.index') }}"
                    class="doc-btn-secondary"
                >
                    Lihat Arsip
                </a>

            </div>

        </div>

    </section>


    {{-- STATISTIK --}}
    <section class="doc-stat-grid">

        <div class="doc-stat">
            <div class="doc-stat-top">
                <div class="doc-stat-icon">DK</div>
            </div>

            <div class="doc-stat-label">
                Total Dokumentasi
            </div>

            <div class="doc-stat-number">
                {{ $totalDokumentasi ?? 0 }}
            </div>
        </div>


        <div class="doc-stat">
            <div class="doc-stat-top">
                <div class="doc-stat-icon">FO</div>
            </div>

            <div class="doc-stat-label">
                Dokumentasi Foto
            </div>

            <div class="doc-stat-number">
                {{ $totalFoto ?? 0 }}
            </div>
        </div>


        <div class="doc-stat">
            <div class="doc-stat-top">
                <div class="doc-stat-icon">VI</div>
            </div>

            <div class="doc-stat-label">
                Dokumentasi Video
            </div>

            <div class="doc-stat-number">
                {{ $totalVideo ?? 0 }}
            </div>
        </div>


        <div class="doc-stat">
            <div class="doc-stat-top">
                <div class="doc-stat-icon">EV</div>
            </div>

            <div class="doc-stat-label">
                Event Terdokumentasi
            </div>

            <div class="doc-stat-number">
                {{ $eventTerdokumentasi ?? 0 }}
            </div>
        </div>

    </section>


    {{-- GRID UTAMA --}}
    <section class="doc-grid">

        {{-- GALERI TERBARU --}}
        <div class="doc-card">

            <div class="doc-card-header">
                <div>
                    <h3 class="doc-card-title">
                        Galeri & Aktivitas Terbaru
                    </h3>

                    <p class="doc-card-desc">
                        Arsip dokumentasi yang terakhir dikelola.
                    </p>
                </div>
            </div>


            <div class="doc-media">

                <div class="doc-media-feature">

                    <div class="doc-media-feature-content">

                        <div class="doc-media-tag">
                            MEDIA EVENT
                        </div>

                        <div class="doc-media-title">
                            Arsip Momen Event
                        </div>

                        <div class="doc-media-subtitle">
                            Foto · Video · Dokumen
                        </div>

                    </div>

                </div>


                <div class="doc-recent">

                    @if(isset($dokumentasiTerbaru) && $dokumentasiTerbaru->count())

                        @foreach($dokumentasiTerbaru as $item)

                            <div class="doc-recent-item">

                                <div class="doc-thumb">

                                    @if(strtolower($item->jenis) === 'foto')
                                        FO
                                    @elseif(strtolower($item->jenis) === 'video')
                                        VI
                                    @else
                                        DK
                                    @endif

                                </div>


                                <div class="doc-recent-content">

                                    <div class="doc-recent-title">
                                        {{ $item->judul }}
                                    </div>

                                    <div class="doc-recent-meta">

                                        {{ $item->event?->nama_event ?? '-' }}

                                        ·

                                        {{ $item->tanggal?->format('d M Y') ?? '-' }}

                                    </div>

                                </div>


                                <span class="doc-type">
                                    {{ $item->jenis }}
                                </span>

                            </div>

                        @endforeach

                    @else

                        <div class="doc-empty">

                            <div class="doc-empty-icon">
                                DK
                            </div>

                            <div class="doc-empty-title">
                                Belum ada dokumentasi
                            </div>

                            <div class="doc-empty-text">
                                Dokumentasi event akan muncul di sini.
                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- AKSI CEPAT --}}
        <div class="doc-card">

            <div class="doc-card-header">

                <div>
                    <h3 class="doc-card-title">
                        Kelola Dokumentasi
                    </h3>

                    <p class="doc-card-desc">
                        Akses fitur dokumentasi.
                    </p>
                </div>

            </div>


            <div class="doc-actions">

                <a
                    href="{{ route('eo.dokumentasi.create') }}"
                    class="doc-action"
                >

                    <div class="doc-action-icon">
                        UP
                    </div>

                    <div>
                        <strong>
                            Upload Dokumentasi
                        </strong>

                        <span>
                            Tambahkan foto, video, atau dokumen
                        </span>
                    </div>

                </a>


                <a
                    href="{{ route('eo.dokumentasi.index') }}"
                    class="doc-action"
                >

                    <div class="doc-action-icon">
                        AR
                    </div>

                    <div>
                        <strong>
                            Arsip Dokumentasi
                        </strong>

                        <span>
                            Lihat seluruh dokumentasi event
                        </span>
                    </div>

                </a>


                <a
                    href="{{ route('eo.dokumentasi.index') }}"
                    class="doc-action"
                >

                    <div class="doc-action-icon">
                        EV
                    </div>

                    <div>
                        <strong>
                            Dokumentasi Event
                        </strong>

                        <span>
                            Kelola dokumentasi berdasarkan event
                        </span>
                    </div>

                </a>

            </div>

        </div>

    </section>


    {{-- INFORMASI --}}
    <section class="doc-info">

        <div class="doc-info-title">
            Pusat Arsip Dokumentasi
        </div>

        <p class="doc-info-text">
            Gunakan halaman dokumentasi untuk menyimpan foto, video,
            dan dokumen dari setiap event. Setiap dokumentasi terhubung
            dengan event sehingga arsip kegiatan lebih mudah dicari,
            dikelola, dan digunakan kembali untuk kebutuhan laporan.
        </p>

    </section>

</div>

</x-layouts.eo>