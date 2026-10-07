<x-layouts.eo :user="$user" title="Detail Paket Sponsorship">

<style>
.package-detail-page {
    min-height: 100%;
    padding: 30px 34px 60px;
    background: #f6f8f7;
    color: #0f172a;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system,
        BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.package-detail-container {
    max-width: 1240px;
    margin: 0 auto;
}

/* HEADER */

.detail-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 24px;
}

.detail-heading {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.detail-icon {
    width: 55px;
    height: 55px;
    border-radius: 16px;
    background: linear-gradient(135deg, #047857, #10b981);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 900;
    box-shadow: 0 8px 22px rgba(5,150,105,.2);
}

.detail-eyebrow {
    color: #059669;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.detail-title {
    margin: 0;
    font-size: 30px;
    line-height: 1.2;
    font-weight: 850;
    letter-spacing: -.7px;
}

.detail-subtitle {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 14px;
}

.detail-actions {
    display: flex;
    gap: 9px;
}

.detail-btn {
    height: 42px;
    padding: 0 16px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 750;
    transition: .2s;
}

.detail-btn-back {
    color: #475569;
    background: #fff;
    border: 1px solid #dce5e1;
}

.detail-btn-back:hover {
    color: #047857;
    border-color: #10b981;
}

.detail-btn-edit {
    color: white;
    background: #059669;
    border: 1px solid #059669;
    box-shadow: 0 5px 14px rgba(5,150,105,.18);
}

.detail-btn-edit:hover {
    background: #047857;
}

/* HERO */

.package-hero {
    background: linear-gradient(135deg, #064e3b 0%, #047857 52%, #10b981 100%);
    border-radius: 20px;
    padding: 30px;
    color: white;
    margin-bottom: 22px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(5,150,105,.18);
}

.package-hero::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    right: -90px;
    top: -120px;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
}

.package-hero::before {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: 50px;
    bottom: -110px;
    border: 1px solid rgba(255,255,255,.1);
    border-radius: 50%;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.hero-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
}

.hero-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    opacity: .72;
    font-weight: 800;
}

.hero-package-name {
    font-size: 32px;
    font-weight: 850;
    margin-top: 7px;
    letter-spacing: -.7px;
}

.hero-event {
    margin-top: 8px;
    font-size: 13px;
    opacity: .84;
}

.hero-event strong {
    color: white;
}

.hero-status {
    padding: 7px 13px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.2);
    backdrop-filter: blur(5px);
}

.hero-bottom {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-top: 30px;
    gap: 20px;
}

.hero-price-label {
    display: block;
    font-size: 10px;
    opacity: .68;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 4px;
}

.hero-price {
    font-size: 31px;
    font-weight: 850;
}

.hero-description-short {
    max-width: 420px;
    font-size: 12px;
    line-height: 1.6;
    opacity: .82;
    text-align: right;
}

/* GRID */

.detail-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 340px;
    gap: 22px;
    align-items: start;
}

/* CARDS */

.detail-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    box-shadow: 0 7px 25px rgba(15,23,42,.045);
    overflow: hidden;
    margin-bottom: 18px;
}

.detail-card:last-child {
    margin-bottom: 0;
}

.card-header {
    padding: 20px 22px;
    border-bottom: 1px solid #edf1ef;
    display: flex;
    align-items: center;
    gap: 12px;
}

.card-header-icon {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
}

.card-title {
    margin: 0;
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
}

.card-description {
    margin: 3px 0 0;
    color: #94a3b8;
    font-size: 11px;
}

.card-body {
    padding: 22px;
}

/* INFORMATION */

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 16px;
}

.info-box {
    padding: 16px;
    border: 1px solid #edf1ef;
    border-radius: 12px;
    background: #fafcfb;
}

.info-label {
    color: #94a3b8;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .8px;
    font-weight: 800;
    margin-bottom: 7px;
}

.info-value {
    color: #334155;
    font-size: 13px;
    font-weight: 750;
    line-height: 1.5;
}

.event-box {
    display: flex;
    align-items: center;
    gap: 12px;
}

.event-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #ecfdf5;
    color: #059669;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
}

/* TEXT */

.description-text {
    color: #64748b;
    font-size: 13px;
    line-height: 1.8;
    white-space: pre-line;
}

.empty-description {
    color: #94a3b8;
    font-size: 12px;
    font-style: italic;
}

/* BENEFIT */

.benefit-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 13px 14px;
    background: #f8faf9;
    border: 1px solid #edf1ef;
    border-radius: 11px;
}

.benefit-check {
    width: 23px;
    height: 23px;
    border-radius: 50%;
    background: #dcfce7;
    color: #15803d;
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 23px;
    font-size: 11px;
    font-weight: 900;
}

.benefit-text {
    color: #475569;
    font-size: 12px;
    line-height: 1.6;
}

/* RIGHT SUMMARY */

.summary-card {
    background: #fff;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    padding: 21px;
    box-shadow: 0 7px 25px rgba(15,23,42,.045);
    margin-bottom: 18px;
}

.summary-title {
    font-size: 13px;
    font-weight: 800;
    color: #334155;
    margin-bottom: 16px;
}

.summary-price-box {
    padding: 17px;
    border-radius: 13px;
    background: #ecfdf5;
    border: 1px solid #d1fae5;
    margin-bottom: 15px;
}

.summary-price-label {
    display: block;
    color: #6b8b7b;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .8px;
    margin-bottom: 5px;
}

.summary-price {
    color: #047857;
    font-size: 23px;
    font-weight: 850;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 11px 0;
    border-bottom: 1px solid #f0f2f1;
}

.summary-row:last-child {
    border-bottom: 0;
}

.summary-row-label {
    color: #94a3b8;
    font-size: 11px;
}

.summary-row-value {
    color: #334155;
    font-size: 11px;
    font-weight: 750;
    text-align: right;
}

.status-active {
    color: #047857;
    background: #dcfce7;
    padding: 5px 9px;
    border-radius: 999px;
    font-weight: 800;
}

.status-inactive {
    color: #b45309;
    background: #fef3c7;
    padding: 5px 9px;
    border-radius: 999px;
    font-weight: 800;
}

/* FLOW */

.flow-card {
    background: #f0fdf4;
    border: 1px solid #d1fae5;
    border-radius: 18px;
    padding: 21px;
}

.flow-title {
    color: #166534;
    font-size: 12px;
    font-weight: 850;
    margin-bottom: 17px;
}

.flow-step {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

.flow-step:last-child {
    margin-bottom: 0;
}

.flow-number {
    width: 27px;
    height: 27px;
    border-radius: 8px;
    background: #dcfce7;
    color: #15803d;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 10px;
    font-weight: 900;
}

.flow-text {
    color: #4d7c5b;
    font-size: 11px;
    line-height: 1.4;
}

/* ACTION */

.bottom-actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;
    margin-top: 22px;
}

/* RESPONSIVE */

@media(max-width: 1050px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 800px) {
    .package-detail-page {
        padding: 22px 17px 45px;
    }

    .detail-header {
        flex-direction: column;
    }

    .detail-actions {
        width: 100%;
    }

    .detail-actions .detail-btn {
        flex: 1;
    }

    .hero-top,
    .hero-bottom {
        flex-direction: column;
        align-items: flex-start;
    }

    .hero-description-short {
        text-align: left;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }
}
</style>


<div class="package-detail-page">

<div class="package-detail-container">


    {{-- HEADER --}}
    <div class="detail-header">

        <div class="detail-heading">

            <div class="detail-icon">
                PS
            </div>

            <div>

                <div class="detail-eyebrow">
                    EO Sponsorship
                </div>

                <h1 class="detail-title">
                    Detail Paket Sponsorship
                </h1>

                <p class="detail-subtitle">
                    Informasi lengkap paket sponsorship yang tersedia untuk event.
                </p>

            </div>

        </div>


        <div class="detail-actions">

            <a href="{{ route('eo.sponsorship.paket.index') }}"
               class="detail-btn detail-btn-back">
                ← Kembali
            </a>

            <a href="{{ route('eo.sponsorship.paket.edit', $paketSponsorship) }}"
               class="detail-btn detail-btn-edit">
                Edit Paket
            </a>

        </div>

    </div>


    {{-- HERO PACKAGE --}}
    <div class="package-hero">

        <div class="hero-content">

            <div class="hero-top">

                <div>

                    <div class="hero-label">
                        Paket Sponsorship
                    </div>

                    <div class="hero-package-name">
                        {{ $paketSponsorship->nama_paket }}
                    </div>

                    <div class="hero-event">

                        Event:
                        <strong>
                            {{ $paketSponsorship->event?->nama_event ?? 'Event belum ditentukan' }}
                        </strong>

                    </div>

                </div>


                <div class="hero-status">

                    {{ ucfirst($paketSponsorship->status) }}

                </div>

            </div>


            <div class="hero-bottom">

                <div>

                    <span class="hero-price-label">
                        Nilai Sponsorship
                    </span>

                    <div class="hero-price">
                        Rp {{ number_format((float) $paketSponsorship->harga, 0, ',', '.') }}
                    </div>

                </div>


                <div class="hero-description-short">

                    {{ $paketSponsorship->deskripsi
                        ? \Illuminate\Support\Str::limit($paketSponsorship->deskripsi, 180)
                        : 'Paket sponsorship untuk mendukung penyelenggaraan event.' }}

                </div>

            </div>

        </div>

    </div>


    {{-- MAIN --}}
    <div class="detail-grid">


        {{-- LEFT --}}
        <div>


            {{-- INFORMATION --}}
            <div class="detail-card">

                <div class="card-header">

                    <div class="card-header-icon">
                        IN
                    </div>

                    <div>

                        <h2 class="card-title">
                            Informasi Paket
                        </h2>

                        <p class="card-description">
                            Detail dasar paket sponsorship.
                        </p>

                    </div>

                </div>


                <div class="card-body">

                    <div class="info-grid">


                        <div class="info-box">

                            <div class="info-label">
                                Event
                            </div>

                            <div class="event-box">

                                <div class="event-icon">
                                    EV
                                </div>

                                <div class="info-value">

                                    {{ $paketSponsorship->event?->nama_event
                                        ?? 'Event belum ditentukan' }}

                                </div>

                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Nama Paket
                            </div>

                            <div class="info-value">
                                {{ $paketSponsorship->nama_paket }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Harga Sponsorship
                            </div>

                            <div class="info-value">
                                Rp {{ number_format((float) $paketSponsorship->harga, 0, ',', '.') }}
                            </div>

                        </div>


                        <div class="info-box">

                            <div class="info-label">
                                Status
                            </div>

                            <div class="info-value">

                                @if($paketSponsorship->status === 'aktif')

                                    <span class="status-active">
                                        Aktif
                                    </span>

                                @else

                                    <span class="status-inactive">
                                        Nonaktif
                                    </span>

                                @endif

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="detail-card">

                <div class="card-header">

                    <div class="card-header-icon">
                        DS
                    </div>

                    <div>

                        <h2 class="card-title">
                            Deskripsi Paket
                        </h2>

                        <p class="card-description">
                            Penjelasan mengenai penawaran sponsorship.
                        </p>

                    </div>

                </div>


                <div class="card-body">

                    @if($paketSponsorship->deskripsi)

                        <div class="description-text">
                            {{ $paketSponsorship->deskripsi }}
                        </div>

                    @else

                        <div class="empty-description">
                            Belum ada deskripsi untuk paket ini.
                        </div>

                    @endif

                </div>

            </div>


            {{-- BENEFIT --}}
            <div class="detail-card">

                <div class="card-header">

                    <div class="card-header-icon">
                        BF
                    </div>

                    <div>

                        <h2 class="card-title">
                            Benefit Sponsorship
                        </h2>

                        <p class="card-description">
                            Fasilitas dan keuntungan yang diperoleh sponsor.
                        </p>

                    </div>

                </div>


                <div class="card-body">

                    @if($paketSponsorship->benefit)

                        <div class="benefit-list">

                            @foreach(preg_split('/\r\n|\r|\n/', $paketSponsorship->benefit) as $benefit)

                                @if(trim($benefit) !== '')

                                    <div class="benefit-item">

                                        <div class="benefit-check">
                                            ✓
                                        </div>

                                        <div class="benefit-text">
                                            {{ trim($benefit) }}
                                        </div>

                                    </div>

                                @endif

                            @endforeach

                        </div>

                    @else

                        <div class="empty-description">
                            Belum ada benefit yang ditambahkan pada paket ini.
                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- RIGHT --}}
        <div>


            {{-- SUMMARY --}}
            <div class="summary-card">

                <div class="summary-title">
                    Ringkasan Paket
                </div>


                <div class="summary-price-box">

                    <span class="summary-price-label">
                        Nilai Sponsorship
                    </span>

                    <div class="summary-price">
                        Rp {{ number_format((float) $paketSponsorship->harga, 0, ',', '.') }}
                    </div>

                </div>


                <div class="summary-row">

                    <span class="summary-row-label">
                        Event
                    </span>

                    <span class="summary-row-value">
                        {{ \Illuminate\Support\Str::limit(
                            $paketSponsorship->event?->nama_event ?? '-',
                            24
                        ) }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-row-label">
                        Paket
                    </span>

                    <span class="summary-row-value">
                        {{ $paketSponsorship->nama_paket }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-row-label">
                        Status
                    </span>

                    <span class="summary-row-value">

                        @if($paketSponsorship->status === 'aktif')

                            <span class="status-active">
                                Aktif
                            </span>

                        @else

                            <span class="status-inactive">
                                Nonaktif
                            </span>

                        @endif

                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-row-label">
                        Dibuat
                    </span>

                    <span class="summary-row-value">
                        {{ $paketSponsorship->created_at?->format('d M Y') ?? '-' }}
                    </span>

                </div>


                <div class="summary-row">

                    <span class="summary-row-label">
                        Diperbarui
                    </span>

                    <span class="summary-row-value">
                        {{ $paketSponsorship->updated_at?->format('d M Y') ?? '-' }}
                    </span>

                </div>

            </div>


            {{-- FLOW --}}
            <div class="flow-card">

                <div class="flow-title">
                    ALUR PAKET SPONSORSHIP
                </div>


                <div class="flow-step">

                    <div class="flow-number">
                        1
                    </div>

                    <div class="flow-text">
                        EO membuat paket sponsorship.
                    </div>

                </div>


                <div class="flow-step">

                    <div class="flow-number">
                        2
                    </div>

                    <div class="flow-text">
                        Paket dipublikasikan kepada sponsor.
                    </div>

                </div>


                <div class="flow-step">

                    <div class="flow-number">
                        3
                    </div>

                    <div class="flow-text">
                        Sponsor memilih paket yang tersedia.
                    </div>

                </div>


                <div class="flow-step">

                    <div class="flow-number">
                        4
                    </div>

                    <div class="flow-text">
                        Sponsor mengirim pengajuan.
                    </div>

                </div>


                <div class="flow-step">

                    <div class="flow-number">
                        5
                    </div>

                    <div class="flow-text">
                        EO melakukan review dan negosiasi.
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- BOTTOM ACTION --}}
    <div class="bottom-actions">

        <a href="{{ route('eo.sponsorship.paket.index') }}"
           class="detail-btn detail-btn-back">
            ← Kembali ke Paket
        </a>

        <a href="{{ route('eo.sponsorship.paket.edit', $paketSponsorship) }}"
           class="detail-btn detail-btn-edit">
            Edit Paket
        </a>

    </div>


</div>

</div>

</x-layouts.eo>