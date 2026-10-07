<x-layouts.eo :user="$user" title="Paket Sponsorship">

<style>
.paket-page {
    padding: 30px 34px 50px;
    background: #f6f8fb;
    min-height: calc(100vh - 74px);
}

.paket-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 28px;
}

.paket-eyebrow {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: #10b981;
    margin-bottom: 8px;
}

.paket-title {
    font-size: 30px;
    font-weight: 800;
    color: #172033;
    margin: 0;
}

.paket-subtitle {
    color: #64748b;
    margin: 8px 0 0;
    font-size: 14px;
}

.btn-add {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #10b981;
    color: white;
    text-decoration: none;
    padding: 12px 18px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 700;
    box-shadow: 0 8px 18px rgba(16,185,129,.18);
}

.btn-add:hover {
    background: #059669;
}

.alert-success {
    background: #ecfdf5;
    border: 1px solid #a7f3d0;
    color: #047857;
    padding: 13px 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    font-size: 14px;
}

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 28px;
}

.stat {
    background: white;
    border: 1px solid #e7ebf0;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 5px 18px rgba(15,23,42,.04);
}

.stat-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #64748b;
    font-size: 13px;
    font-weight: 600;
}

.stat-icon {
    width: 38px;
    height: 38px;
    border-radius: 11px;
    background: #ecfdf5;
    color: #059669;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
}

.stat-value {
    font-size: 27px;
    font-weight: 800;
    color: #172033;
    margin-top: 12px;
}

.stat-note {
    font-size: 12px;
    color: #94a3b8;
    margin-top: 4px;
}

.panel {
    background: white;
    border: 1px solid #e7ebf0;
    border-radius: 18px;
    box-shadow: 0 5px 18px rgba(15,23,42,.04);
    overflow: hidden;
}

.panel-head {
    padding: 22px 24px;
    border-bottom: 1px solid #edf0f3;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.panel-title {
    font-size: 18px;
    font-weight: 800;
    color: #172033;
}

.panel-desc {
    font-size: 13px;
    color: #94a3b8;
    margin-top: 4px;
}

.table-wrap {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    padding: 14px 20px;
    background: #f8fafc;
    color: #64748b;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .05em;
    text-align: left;
    white-space: nowrap;
}

td {
    padding: 17px 20px;
    border-top: 1px solid #f0f2f5;
    color: #334155;
    font-size: 13px;
    vertical-align: middle;
}

tr:hover td {
    background: #fbfdfc;
}

.event-name {
    font-weight: 700;
    color: #172033;
}

.package-name {
    font-weight: 800;
    color: #0f766e;
}

.price {
    font-weight: 800;
    color: #172033;
}

.badge {
    display: inline-flex;
    padding: 6px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
}

.badge-active {
    background: #dcfce7;
    color: #15803d;
}

.badge-off {
    background: #f1f5f9;
    color: #64748b;
}

.actions {
    display: flex;
    gap: 7px;
    flex-wrap: wrap;
}

.action {
    display: inline-flex;
    text-decoration: none;
    padding: 7px 10px;
    border-radius: 9px;
    font-size: 11px;
    font-weight: 700;
    border: 1px solid #e2e8f0;
    color: #475569;
    background: white;
    cursor: pointer;
}

.action:hover {
    background: #f8fafc;
}

.action-detail {
    color: #047857;
    border-color: #bbf7d0;
    background: #f0fdf4;
}

.action-delete {
    color: #dc2626;
}

.empty {
    padding: 50px 25px;
    text-align: center;
    color: #94a3b8;
}

.empty-icon {
    margin: 0 auto 12px;
    width: 50px;
    height: 50px;
    border-radius: 15px;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    color: #64748b;
}

.empty-title {
    font-weight: 800;
    color: #334155;
    margin-bottom: 5px;
}

@media (max-width: 1000px) {
    .stats {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 650px) {
    .paket-page {
        padding: 22px 16px;
    }

    .paket-top {
        flex-direction: column;
    }

    .stats {
        grid-template-columns: 1fr;
    }

    .btn-add {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="paket-page">

    {{-- HEADER --}}
    <div class="paket-top">

        <div>
            <div class="paket-eyebrow">
                EO Sponsorship
            </div>

            <h1 class="paket-title">
                Paket Sponsorship
            </h1>

            <p class="paket-subtitle">
                Kelola paket kerja sama yang dapat dipilih oleh sponsor untuk setiap event.
            </p>
        </div>

        <a href="{{ route('eo.sponsorship.paket.create') }}"
           class="btn-add">
            <span>+</span>
            Tambah Paket
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- STATISTIK --}}
    <div class="stats">

        <div class="stat">

            <div class="stat-head">
                <span>Total Paket</span>
                <span class="stat-icon">PK</span>
            </div>

            <div class="stat-value">
                {{ $pakets->count() }}
            </div>

            <div class="stat-note">
                Semua paket sponsorship
            </div>

        </div>


        <div class="stat">

            <div class="stat-head">
                <span>Paket Aktif</span>
                <span class="stat-icon">AK</span>
            </div>

            <div class="stat-value">
                {{ $pakets->where('status', 'aktif')->count() }}
            </div>

            <div class="stat-note">
                Siap ditawarkan ke sponsor
            </div>

        </div>


        <div class="stat">

            <div class="stat-head">
                <span>Paket Nonaktif</span>
                <span class="stat-icon">NA</span>
            </div>

            <div class="stat-value">
                {{ $pakets->where('status', 'nonaktif')->count() }}
            </div>

            <div class="stat-note">
                Tidak ditawarkan saat ini
            </div>

        </div>


        <div class="stat">

            <div class="stat-head">
                <span>Event Terhubung</span>
                <span class="stat-icon">EV</span>
            </div>

            <div class="stat-value">
                {{ $pakets->pluck('event_id')->filter()->unique()->count() }}
            </div>

            <div class="stat-note">
                Event yang memiliki paket
            </div>

        </div>

    </div>


    {{-- DAFTAR PAKET --}}
    <div class="panel">

        <div class="panel-head">

            <div>
                <div class="panel-title">
                    Daftar Paket
                </div>

                <div class="panel-desc">
                    Paket yang tersedia untuk ditawarkan kepada sponsor.
                </div>
            </div>

        </div>


        @if($pakets->count())

            <div class="table-wrap">

                <table>

                    <thead>

                        <tr>
                            <th>Event</th>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pakets as $paket)

                            <tr>

                                <td>
                                    <div class="event-name">
                                        {{ $paket->event?->nama_event ?? 'Event belum dipilih' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="package-name">
                                        {{ $paket->nama_paket }}
                                    </div>
                                </td>

                                <td>
                                    <div class="price">
                                        Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                    </div>
                                </td>

                                <td>

                                    @if($paket->status === 'aktif')

                                        <span class="badge badge-active">
                                            Aktif
                                        </span>

                                    @else

                                        <span class="badge badge-off">
                                            Nonaktif
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="actions">

                                        <a href="{{ route('eo.sponsorship.paket.show', $paket) }}"
                                           class="action action-detail">
                                            Detail
                                        </a>

                                        <a href="{{ route('eo.sponsorship.paket.edit', $paket) }}"
                                           class="action">
                                            Edit
                                        </a>

                                        <form action="{{ route('eo.sponsorship.paket.destroy', $paket) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus paket ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="action action-delete">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    PK
                </div>

                <div class="empty-title">
                    Belum ada paket sponsorship
                </div>

                <div>
                    Tambahkan paket pertama untuk mulai menawarkan kerja sama kepada sponsor.
                </div>

            </div>

        @endif

    </div>

</div>

</x-layouts.eo>