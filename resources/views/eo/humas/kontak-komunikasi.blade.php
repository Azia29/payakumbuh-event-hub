<x-layouts.eo :user="$user" title="Kontak & Komunikasi">

    <div class="page-header">
        <h1>Kontak & Komunikasi</h1>
        <p>Kelola komunikasi dan kontak pihak yang berhubungan dengan event.</p>
    </div>

    <div class="content-card">

        <div class="contact-row">
            <div class="contact-icon">EO</div>
            <div>
                <strong>Panitia / EO</strong>
                <p>Koordinasi internal terkait informasi event.</p>
            </div>
        </div>

        <div class="contact-row">
            <div class="contact-icon">SP</div>
            <div>
                <strong>Sponsor</strong>
                <p>Komunikasi mengenai kerja sama dan kebutuhan publikasi.</p>
            </div>
        </div>

        <div class="contact-row">
            <div class="contact-icon">MD</div>
            <div>
                <strong>Media</strong>
                <p>Hubungan dengan media untuk kebutuhan pemberitaan event.</p>
            </div>
        </div>

        <div class="contact-row">
            <div class="contact-icon">MS</div>
            <div>
                <strong>Masyarakat</strong>
                <p>Penyampaian informasi dan komunikasi kepada masyarakat.</p>
            </div>
        </div>

    </div>

    <style>
        .page-header {
            margin-bottom:24px;
        }

        .page-header h1 {
            margin:0 0 6px;
            font-size:28px;
        }

        .page-header p {
            margin:0;
            color:#64748b;
        }

        .content-card {
            background:#fff;
            border:1px solid #e5e7eb;
            border-radius:16px;
            padding:8px 24px;
            box-shadow:0 4px 15px rgba(15,23,42,.05);
        }

        .contact-row {
            display:flex;
            align-items:center;
            gap:18px;
            padding:20px 0;
            border-bottom:1px solid #f1f5f9;
        }

        .contact-row:last-child {
            border-bottom:none;
        }

        .contact-icon {
            width:48px;
            height:48px;
            border-radius:12px;
            background:#dcfce7;
            color:#15803d;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
        }

        .contact-row p {
            margin:5px 0 0;
            color:#64748b;
        }
    </style>

</x-layouts.eo>