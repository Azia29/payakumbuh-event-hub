<x-layouts.eo :user="$user" title="Dashboard Sponsorship">

<style>
    .sp-page {
        padding: 28px 30px 40px;
    }

    .sp-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 26px;
    }

    .sp-title {
        margin: 0;
        font-size: 28px;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.5px;
    }

    .sp-description {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    .sp-header-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border-radius: 10px;
        background: #059669;
        color: #ffffff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        transition: .2s ease;
    }

    .sp-header-button:hover {
        background: #047857;
        transform: translateY(-1px);
    }

    .sp-stats {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }

    .sp-stat-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
    }

    .sp-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }

    .sp-stat-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .sp-stat-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #ecfdf5;
        color: #059669;
        font-size: 12px;
        font-weight: 800;
    }

    .sp-stat-number {
        margin-top: 13px;
        font-size: 27px;
        font-weight: 800;
        color: #0f172a;
    }

    .sp-support-card {
        background: linear-gradient(135deg, #047857, #059669);
        color: #ffffff;
        border-radius: 16px;
        padding: 23px 25px;
        margin-bottom: 22px;
        box-shadow: 0 6px 18px rgba(5, 150, 105, .18);
    }

    .sp-support-label {
        font-size: 13px;
        opacity: .88;
        margin-bottom: 8px;
    }

    .sp-support-value {
        font-size: 30px;
        font-weight: 800;
    }

    .sp-support-note {
        margin-top: 6px;
        font-size: 12px;
        opacity: .82;
    }

    .sp-panel {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 3px 12px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .sp-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 22px;
        border-bottom: 1px solid #e2e8f0;
    }

    .sp-panel-title {
        margin: 0;
        font-size: 17px;
        font-weight: 800;
        color: #0f172a;
    }

    .sp-panel-subtitle {
        margin: 4px 0 0;
        color: #94a3b8;
        font-size: 12px;
    }

    .sp-table-wrap {
        overflow-x: auto;
    }

    .sp-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 720px;
    }

    .sp-table th {
        background: #f8fafc;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .4px;
        text-align: left;
        padding: 13px 18px;
        border-bottom: 1px solid #e2e8f0;
    }

    .sp-table td {
        padding: 15px 18px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        font-size: 13px;
        vertical-align: middle;
    }

    .sp-table tr:last-child td {
        border-bottom: 0;
    }

    .sp-company {
        font-weight: 700;
        color: #0f172a;
    }

    .sp-event {
        color: #64748b;
    }

    .sp-money {
        font-weight: 700;
        color: #059669;
    }

    .sp-status {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        background: #f1f5f9;
        color: #475569;
    }

    .sp-status-calon {
        background: #fef3c7;
        color: #92400e;
    }

    .sp-status-proposal_dikirim {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .sp-status-negosiasi {
        background: #ede9fe;
        color: #6d28d9;
    }

    .sp-status-disetujui,
    .sp-status-selesai {
        background: #dcfce7;
        color: #166534;
    }

    .sp-status-ditolak {
        background: #fee2e2;
        color: #b91c1c;
    }

    .sp-empty {
        padding: 50px 20px;
        text-align: center;
    }

    .sp-empty-icon {
        width: 48px;
        height: 48px;
        margin: 0 auto 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #f1f5f9;
        color: #64748b;
        font-size: 14px;
        font-weight: 800;
    }

    .sp-empty-title {
        font-weight: 700;
        color: #334155;
    }

    .sp-empty-text {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 12px;
    }

    .sp-bottom-action {
        padding: 18px 22px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        justify-content: flex-end;
    }

    .sp-action-button {
        display: inline-flex;
        align-items: center;
        padding: 10px 15px;
        border: 1px solid #d1d5db;
        border-radius: 9px;
        color: #334155;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        background: #ffffff;
        transition: .2s ease;
    }

    .sp-action-button:hover {
        border-color: #059669;
        color: #059669;
        background: #f0fdf4;
    }

    @media (max-width: 1100px) {
        .sp-stats {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 760px) {
        .sp-page {
            padding: 20px 16px 30px;
        }

        .sp-header {
            flex-direction: column;
        }

        .sp-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 480px) {
        .sp-stats {
            grid-template-columns: 1fr;
        }

        .sp-title {
            font-size: 23px;
        }
    }
</style>

<div class="sp-page">

    <div class="sp-header">
        <div>
            <h1 class="sp-title">Dashboard Sponsorship</h1>
            <p class="sp-description">
                Mengelola calon sponsor, proposal, negosiasi, dan dukungan sponsor.
            </p>
        </div>

        <a href="{{ route('eo.sponsorship.index') }}" class="sp-header-button">
            <span>SP</span>
            <span>Kelola Sponsor</span>
        </a>
    </div>

    <div class="sp-stats">

        <div class="sp-stat-card">
            <div class="sp-stat-top">
                <div class="sp-stat-label">Total Sponsor</div>
                <div class="sp-stat-icon">SP</div>
            </div>
            <div class="sp-stat-number">{{ $totalSponsor }}</div>
        </div>

        <div class="sp-stat-card">
            <div class="sp-stat-top">
                <div class="sp-stat-label">Calon Sponsor</div>
                <div class="sp-stat-icon">CL</div>
            </div>
            <div class="sp-stat-number">{{ $calonSponsor }}</div>
        </div>

        <div class="sp-stat-card">
            <div class="sp-stat-top">
                <div class="sp-stat-label">Proposal</div>
                <div class="sp-stat-icon">PR</div>
            </div>
            <div class="sp-stat-number">{{ $proposalDikirim }}</div>
        </div>

        <div class="sp-stat-card">
            <div class="sp-stat-top">
                <div class="sp-stat-label">Negosiasi</div>
                <div class="sp-stat-icon">NG</div>
            </div>
            <div class="sp-stat-number">{{ $negosiasi }}</div>
        </div>

        <div class="sp-stat-card">
            <div class="sp-stat-top">
                <div class="sp-stat-label">Disetujui</div>
                <div class="sp-stat-icon">OK</div>
            </div>
            <div class="sp-stat-number">{{ $disetujui }}</div>
        </div>

    </div>

    <div class="sp-support-card">
        <div class="sp-support-label">
            Total Dukungan Sponsor Disetujui
        </div>

        <div class="sp-support-value">
            Rp {{ number_format((float) $totalDukungan, 0, ',', '.') }}
        </div>

        <div class="sp-support-note">
            Total nominal dukungan dari sponsor dengan status disetujui.
        </div>
    </div>

    <div class="sp-panel">

        <div class="sp-panel-header">
            <div>
                <h2 class="sp-panel-title">Data Sponsor Terbaru</h2>
                <p class="sp-panel-subtitle">
                    Daftar sponsor yang terakhir ditambahkan atau diperbarui.
                </p>
            </div>
        </div>

        @if($sponsors->count())

            <div class="sp-table-wrap">

                <table class="sp-table">

                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Event</th>
                            <th>Dukungan</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($sponsors as $sponsor)

                            <tr>

                                <td>
                                    <div class="sp-company">
                                        {{ $sponsor->nama_perusahaan }}
                                    </div>

                                    @if($sponsor->nama_kontak)
                                        <div class="sp-event">
                                            {{ $sponsor->nama_kontak }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <div class="sp-event">
                                        {{ $sponsor->event?->nama_event ?? 'Belum ditentukan' }}
                                    </div>
                                </td>

                                <td>
                                    {{ $sponsor->jenis_dukungan ?: '-' }}
                                </td>

                                <td>
                                    <span class="sp-money">
                                        Rp {{ number_format((float) ($sponsor->nominal_dukungan ?? 0), 0, ',', '.') }}
                                    </span>
                                </td>

                                <td>
                                    @php
                                        $statusClass = 'sp-status-' . ($sponsor->status ?? 'calon');

                                        $statusLabel = match($sponsor->status) {
                                            'proposal_dikirim' => 'Proposal Dikirim',
                                            'negosiasi' => 'Negosiasi',
                                            'disetujui' => 'Disetujui',
                                            'ditolak' => 'Ditolak',
                                            'selesai' => 'Selesai',
                                            default => 'Calon',
                                        };
                                    @endphp

                                    <span class="sp-status {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="sp-empty">

                <div class="sp-empty-icon">
                    SP
                </div>

                <div class="sp-empty-title">
                    Belum ada data sponsor
                </div>

                <div class="sp-empty-text">
                    Tambahkan calon sponsor untuk mulai mengelola sponsorship event.
                </div>

            </div>

        @endif

        <div class="sp-bottom-action">
            <a href="{{ route('eo.sponsorship.index') }}" class="sp-action-button">
                Kelola Semua Sponsor
            </a>
        </div>

    </div>

</div>

</x-layouts.eo>