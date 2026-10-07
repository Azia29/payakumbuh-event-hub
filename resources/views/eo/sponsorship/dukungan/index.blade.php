<x-layouts.eo :user="$user" title="Dukungan Sponsor">

<style>
.dukungan-page {
    min-height: 100%;
    padding: 30px 34px 55px;
    background: #f6f8f7;
    color: #0f172a;
    font-family: Inter, ui-sans-serif, system-ui, -apple-system,
        BlinkMacSystemFont, "Segoe UI", sans-serif;
}

.dukungan-container {
    max-width: 1280px;
    margin: 0 auto;
}

/* HEADER */

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 25px;
}

.header-left {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.header-icon {
    width: 56px;
    height: 56px;
    border-radius: 16px;
    background: linear-gradient(135deg, #064e3b, #059669, #10b981);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
    box-shadow: 0 8px 22px rgba(5,150,105,.20);
}

.eyebrow {
    color: #059669;
    font-size: 10px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    font-weight: 850;
    margin-bottom: 5px;
}

.page-title {
    margin: 0;
    font-size: 30px;
    line-height: 1.2;
    font-weight: 850;
    letter-spacing: -.7px;
}

.page-subtitle {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 13px;
}

.header-info {
    display: flex;
    align-items: center;
    gap: 9px;
    background: white;
    border: 1px solid #e3ebe7;
    padding: 10px 14px;
    border-radius: 11px;
    color: #64748b;
    font-size: 11px;
    font-weight: 700;
}

.header-dot {
    width: 7px;
    height: 7px;
    background: #10b981;
    border-radius: 50%;
}

/* STATS */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    margin-bottom: 22px;
}

.stat-card {
    background: white;
    border: 1px solid #e4ebe7;
    border-radius: 15px;
    padding: 18px;
    box-shadow: 0 5px 18px rgba(15,23,42,.035);
    position: relative;
    overflow: hidden;
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 70px;
    height: 70px;
    right: -25px;
    top: -25px;
    border-radius: 50%;
    background: #ecfdf5;
}

.stat-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: 900;
    z-index: 1;
    position: relative;
}

.stat-label {
    margin-top: 13px;
    color: #94a3b8;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .7px;
}

.stat-value {
    margin-top: 4px;
    font-size: 22px;
    font-weight: 850;
    color: #0f172a;
}

.stat-money {
    font-size: 17px;
}

/* ALERT */

.alert {
    border-radius: 12px;
    padding: 13px 16px;
    margin-bottom: 20px;
    font-size: 12px;
    font-weight: 650;
}

.alert-success {
    color: #047857;
    background: #ecfdf5;
    border: 1px solid #bbf7d0;
}

/* MAIN CARD */

.main-card {
    background: white;
    border: 1px solid #e4ebe7;
    border-radius: 18px;
    box-shadow: 0 7px 25px rgba(15,23,42,.045);
    overflow: hidden;
}

.card-header {
    padding: 21px 23px;
    border-bottom: 1px solid #edf1ef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 18px;
}

.card-heading {
    display: flex;
    align-items: center;
    gap: 11px;
}

.card-icon {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 9px;
    font-weight: 900;
}

.card-title {
    margin: 0;
    font-size: 15px;
    font-weight: 850;
}

.card-description {
    margin: 3px 0 0;
    color: #94a3b8;
    font-size: 10px;
}

/* SUMMARY */

.summary-bar {
    margin: 18px 23px;
    padding: 17px 19px;
    border: 1px solid #dff4e9;
    background: linear-gradient(135deg, #f0fdf7, #f8fffb);
    border-radius: 13px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.summary-label {
    color: #64748b;
    font-size: 10px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.summary-text {
    margin-top: 4px;
    color: #047857;
    font-size: 19px;
    font-weight: 900;
}

.summary-note {
    color: #94a3b8;
    font-size: 10px;
    margin-top: 2px;
}

/* TOOLBAR */

.toolbar {
    padding: 16px 23px;
    background: #fafcfb;
    border-top: 1px solid #edf1ef;
    border-bottom: 1px solid #edf1ef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
}

.toolbar-left {
    display: flex;
    gap: 9px;
    flex: 1;
}

.search-box {
    position: relative;
    width: 300px;
}

.search-box span {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 10px;
    font-weight: 900;
}

.search-input,
.status-filter {
    height: 39px;
    border: 1px solid #dce5e0;
    background: white;
    border-radius: 9px;
    outline: none;
    font-family: inherit;
    font-size: 11px;
    color: #334155;
}

.search-input {
    width: 100%;
    padding: 0 12px 0 31px;
}

.status-filter {
    padding: 0 12px;
    min-width: 155px;
}

.search-input:focus,
.status-filter:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.08);
}

.count-label {
    color: #94a3b8;
    font-size: 10px;
    font-weight: 700;
}

/* TABLE */

.table-wrap {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 1050px;
}

.data-table thead th {
    padding: 13px 16px;
    background: #f8faf9;
    color: #64748b;
    border-bottom: 1px solid #e5ebe8;
    font-size: 9px;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .75px;
    text-align: left;
    white-space: nowrap;
}

.data-table tbody td {
    padding: 16px;
    border-bottom: 1px solid #f0f3f2;
    vertical-align: middle;
    font-size: 11px;
    color: #475569;
}

.data-table tbody tr {
    transition: .18s;
}

.data-table tbody tr:hover {
    background: #fbfdfc;
}

.data-table tbody tr:last-child td {
    border-bottom: none;
}

/* SPONSOR */

.company {
    display: flex;
    align-items: center;
    gap: 10px;
}

.company-avatar {
    width: 39px;
    height: 39px;
    border-radius: 11px;
    background: #ecfdf5;
    color: #047857;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
    flex-shrink: 0;
}

.company-name {
    color: #1e293b;
    font-size: 12px;
    font-weight: 800;
}

.company-contact {
    color: #94a3b8;
    font-size: 9px;
    margin-top: 3px;
}

/* EVENT / PACKAGE */

.event-name {
    color: #334155;
    font-weight: 750;
}

.package-name {
    color: #047857;
    font-size: 10px;
    font-weight: 750;
    margin-top: 3px;
}

.money {
    color: #047857;
    font-weight: 900;
    white-space: nowrap;
}

/* PAYMENT */

.payment {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 9px;
    font-weight: 850;
    white-space: nowrap;
}

.payment-dot {
    width: 5px;
    height: 5px;
    border-radius: 50%;
}

.payment-belum {
    color: #92400e;
    background: #fef3c7;
}

.payment-belum .payment-dot {
    background: #f59e0b;
}

.payment-sebagian {
    color: #1d4ed8;
    background: #dbeafe;
}

.payment-sebagian .payment-dot {
    background: #3b82f6;
}

.payment-dibayar {
    color: #047857;
    background: #dcfce7;
}

.payment-dibayar .payment-dot {
    background: #10b981;
}

/* DATE */

.date-value {
    color: #475569;
    font-weight: 700;
    white-space: nowrap;
}

.date-empty {
    color: #cbd5e1;
}

/* ACTION */

.detail-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 32px;
    padding: 0 11px;
    border-radius: 8px;
    background: #ecfdf5;
    color: #047857;
    border: 1px solid #d1fae5;
    text-decoration: none;
    font-size: 10px;
    font-weight: 800;
    transition: .2s;
}

.detail-btn:hover {
    background: #059669;
    color: white;
    border-color: #059669;
}

/* EMPTY */

.empty-state {
    padding: 65px 20px;
    text-align: center;
}

.empty-icon {
    width: 62px;
    height: 62px;
    border-radius: 18px;
    margin: 0 auto 14px;
    background: #f1f5f3;
    color: #94a3b8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 900;
}

.empty-title {
    color: #334155;
    font-size: 14px;
    font-weight: 800;
}

.empty-text {
    color: #94a3b8;
    font-size: 11px;
    margin-top: 5px;
}

/* RESPONSIVE */

@media(max-width: 950px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .page-header {
        flex-direction: column;
    }

    .header-info {
        align-self: flex-start;
    }

    .summary-bar {
        align-items: flex-start;
        flex-direction: column;
    }
}

@media(max-width: 650px) {
    .dukungan-page {
        padding: 22px 16px 40px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .toolbar {
        align-items: stretch;
        flex-direction: column;
    }

    .toolbar-left {
        flex-direction: column;
    }

    .search-box {
        width: 100%;
    }

    .status-filter {
        width: 100%;
    }
}
</style>


<div class="dukungan-page">

<div class="dukungan-container">


    {{-- HEADER --}}
    <div class="page-header">

        <div class="header-left">

            <div class="header-icon">
                DS
            </div>

            <div>

                <div class="eyebrow">
                    EO Sponsorship
                </div>

                <h1 class="page-title">
                    Dukungan Sponsor
                </h1>

                <p class="page-subtitle">
                    Pantau dukungan sponsorship, nominal kontribusi,
                    dan status pembayaran sponsor.
                </p>

            </div>

        </div>

        <div class="header-info">
            <span class="header-dot"></span>
            Monitoring Dukungan
        </div>

    </div>


    {{-- STATISTICS --}}

    @php
        $totalDukungan = $dukungans->count();

        $belumBayar = $dukungans->filter(function ($item) {
            return strtolower($item->status_pembayaran ?? '') === 'belum_bayar';
        })->count();

        $sebagian = $dukungans->filter(function ($item) {
            return strtolower($item->status_pembayaran ?? '') === 'sebagian';
        })->count();

        $sudahBayar = $dukungans->filter(function ($item) {
            return in_array(strtolower($item->status_pembayaran ?? ''), [
                'dibayar',
                'lunas'
            ]);
        })->count();

        $totalNominal = $dukungans->sum(function ($item) {
            return (float) ($item->nominal ?? 0);
        });
    @endphp


    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                ALL
            </div>

            <div class="stat-label">
                Total Dukungan
            </div>

            <div class="stat-value">
                {{ $totalDukungan }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                PB
            </div>

            <div class="stat-label">
                Belum Dibayar
            </div>

            <div class="stat-value">
                {{ $belumBayar }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                SB
            </div>

            <div class="stat-label">
                Sebagian Dibayar
            </div>

            <div class="stat-value">
                {{ $sebagian }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                OK
            </div>

            <div class="stat-label">
                Sudah Dibayar
            </div>

            <div class="stat-value">
                {{ $sudahBayar }}
            </div>

        </div>

    </div>


    {{-- SUCCESS --}}

    @if(session('success'))

        <div class="alert alert-success">
            ✓ {{ session('success') }}
        </div>

    @endif


    {{-- MAIN CARD --}}

    <div class="main-card">


        <div class="card-header">

            <div class="card-heading">

                <div class="card-icon">
                    DS
                </div>

                <div>

                    <h2 class="card-title">
                        Daftar Dukungan Sponsor
                    </h2>

                    <p class="card-description">
                        Rekap dukungan sponsor berdasarkan pengajuan
                        yang telah diproses.
                    </p>

                </div>

            </div>

        </div>


        {{-- SUMMARY --}}

        <div class="summary-bar">

            <div>

                <div class="summary-label">
                    Total Nilai Dukungan
                </div>

                <div class="summary-text">
                    Rp {{ number_format($totalNominal, 0, ',', '.') }}
                </div>

                <div class="summary-note">
                    Akumulasi seluruh dukungan yang tercatat.
                </div>

            </div>

            <div class="summary-label">
                {{ $totalDukungan }} transaksi dukungan
            </div>

        </div>


        {{-- TOOLBAR --}}

        <div class="toolbar">

            <div class="toolbar-left">

                <div class="search-box">

                    <span>⌕</span>

                    <input
                        type="text"
                        id="searchDukungan"
                        class="search-input"
                        placeholder="Cari sponsor, event, atau paket..."
                    >

                </div>


                <select
                    id="filterPembayaran"
                    class="status-filter"
                >

                    <option value="">
                        Semua Pembayaran
                    </option>

                    <option value="belum bayar">
                        Belum Dibayar
                    </option>

                    <option value="sebagian dibayar">
                        Sebagian Dibayar
                    </option>

                    <option value="sudah dibayar">
                        Sudah Dibayar
                    </option>

                </select>

            </div>


            <div class="count-label">
                {{ $totalDukungan }} dukungan
            </div>

        </div>


        @if($dukungans->count())

            <div class="table-wrap">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>SPONSOR</th>
                            <th>EVENT</th>
                            <th>PAKET</th>
                            <th>NOMINAL</th>
                            <th>PEMBAYARAN</th>
                            <th>TANGGAL</th>
                            <th>AKSI</th>

                        </tr>

                    </thead>


                    <tbody id="dukunganTable">

                    @foreach($dukungans as $dukungan)

                        @php

                            $paymentStatus =
                                strtolower($dukungan->status_pembayaran ?? 'belum_bayar');

                            $paymentClass = match($paymentStatus) {

                                'dibayar', 'lunas'
                                    => 'payment-dibayar',

                                'sebagian'
                                    => 'payment-sebagian',

                                default
                                    => 'payment-belum',

                            };

                            $paymentLabel = match($paymentStatus) {

                                'dibayar', 'lunas'
                                    => 'Sudah Dibayar',

                                'sebagian'
                                    => 'Sebagian Dibayar',

                                default
                                    => 'Belum Dibayar',

                            };

                            $sponsorName =
                                $dukungan->pengajuan?->sponsor?->nama_perusahaan
                                ?? $dukungan->pengajuan?->sponsor?->nama
                                ?? $dukungan->pengajuan?->sponsor?->nama_usaha
                                ?? 'Sponsor';

                            $eventName =
                                $dukungan->pengajuan?->paket?->event?->nama_event
                                ?? 'Event belum ditentukan';

                            $packageName =
                                $dukungan->pengajuan?->paket?->nama_paket
                                ?? 'Paket belum ditentukan';

                            $initial =
                                strtoupper(substr($sponsorName, 0, 1));

                            $tanggal =
                                $dukungan->tanggal_pembayaran
                                ? \Carbon\Carbon::parse(
                                    $dukungan->tanggal_pembayaran
                                )->format('d M Y')
                                : null;

                        @endphp


                        <tr
                            class="dukungan-row"
                            data-search="{{ strtolower(
                                $sponsorName . ' ' .
                                $eventName . ' ' .
                                $packageName
                            ) }}"
                            data-payment="{{ strtolower($paymentLabel) }}"
                        >


                            {{-- SPONSOR --}}

                            <td>

                                <div class="company">

                                    <div class="company-avatar">
                                        {{ $initial }}
                                    </div>

                                    <div>

                                        <div class="company-name">
                                            {{ $sponsorName }}
                                        </div>

                                        @if($dukungan->pengajuan?->sponsor?->email)

                                            <div class="company-contact">
                                                {{ $dukungan->pengajuan->sponsor->email }}
                                            </div>

                                        @elseif($dukungan->pengajuan?->sponsor?->telepon)

                                            <div class="company-contact">
                                                {{ $dukungan->pengajuan->sponsor->telepon }}
                                            </div>

                                        @else

                                            <div class="company-contact">
                                                Kontak belum tersedia
                                            </div>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- EVENT --}}

                            <td>

                                <div class="event-name">
                                    {{ $eventName }}
                                </div>

                            </td>


                            {{-- PACKAGE --}}

                            <td>

                                <div class="package-name">
                                    {{ $packageName }}
                                </div>

                            </td>


                            {{-- NOMINAL --}}

                            <td>

                                <div class="money">

                                    Rp
                                    {{ number_format(
                                        (float) ($dukungan->nominal ?? 0),
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </div>

                            </td>


                            {{-- PAYMENT STATUS --}}

                            <td>

                                <span class="payment {{ $paymentClass }}">

                                    <span class="payment-dot"></span>

                                    {{ $paymentLabel }}

                                </span>

                            </td>


                            {{-- DATE --}}

                            <td>

                                @if($tanggal)

                                    <div class="date-value">
                                        {{ $tanggal }}
                                    </div>

                                @else

                                    <div class="date-empty">
                                        Belum ada tanggal
                                    </div>

                                @endif

                            </td>


                            {{-- ACTION --}}

                            <td>

                                @if($dukungan->pengajuan)

                                    <a
                                        href="{{ route(
                                            'eo.sponsorship.pengajuan.show',
                                            $dukungan->pengajuan
                                        ) }}"
                                        class="detail-btn"
                                    >
                                        Lihat Detail →
                                    </a>

                                @else

                                    <span class="date-empty">
                                        -
                                    </span>

                                @endif

                            </td>


                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    DS
                </div>

                <div class="empty-title">
                    Belum Ada Dukungan Sponsor
                </div>

                <div class="empty-text">
                    Dukungan sponsor yang sudah dicatat akan
                    tampil di halaman ini.
                </div>

            </div>

        @endif


    </div>

</div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('searchDukungan');

    const filterPayment =
        document.getElementById('filterPembayaran');

    const rows =
        document.querySelectorAll('.dukungan-row');


    function filterRows() {

        const keyword =
            (searchInput.value || '').toLowerCase().trim();

        const payment =
            (filterPayment.value || '').toLowerCase();


        rows.forEach(function (row) {

            const searchData =
                (row.dataset.search || '').toLowerCase();

            const rowPayment =
                (row.dataset.payment || '').toLowerCase();


            const matchSearch =
                !keyword ||
                searchData.includes(keyword);


            const matchPayment =
                !payment ||
                rowPayment === payment;


            row.style.display =
                matchSearch && matchPayment
                    ? ''
                    : 'none';

        });

    }


    searchInput.addEventListener(
        'input',
        filterRows
    );

    filterPayment.addEventListener(
        'change',
        filterRows
    );

});
</script>

</x-layouts.eo>