<x-layouts.eo :user="$user" title="Detail Tugas Panitia">

<div class="page">

    <div class="page-header">
        <div>
            <h1>Detail Tugas</h1>
            <p>Informasi lengkap pembagian tugas panitia.</p>
        </div>

        <a href="{{ route('eo.panitia.tugas.index') }}" class="btn-secondary">
            Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid">

        <div class="card">
            <h2>{{ $tugasPanitia->judul_tugas }}</h2>

            <div class="info">
                <span>Event</span>
                <strong>
                    {{ $tugasPanitia->eventPanitia?->event?->nama_event ?? '-' }}
                </strong>
            </div>

            <div class="info">
                <span>Panitia</span>
                <strong>
                    {{ $tugasPanitia->eventPanitia?->panitia?->nama ?? '-' }}
                </strong>
            </div>

            <div class="info">
                <span>Divisi</span>
                <strong>
                    {{ $tugasPanitia->eventPanitia?->divisi?->nama_divisi ?? '-' }}
                </strong>
            </div>

            <div class="info">
                <span>Tanggal</span>
                <strong>
                    {{ $tugasPanitia->tanggal?->format('d F Y') ?? '-' }}
                </strong>
            </div>

            <div class="info">
                <span>Waktu</span>
                <strong>
                    {{ $tugasPanitia->jam_mulai ?? '-' }}
                    @if($tugasPanitia->jam_selesai)
                        - {{ $tugasPanitia->jam_selesai }}
                    @endif
                </strong>
            </div>

            <div class="info">
                <span>Lokasi</span>
                <strong>{{ $tugasPanitia->lokasi ?? '-' }}</strong>
            </div>

            <div class="description">
                <span>Deskripsi</span>
                <p>
                    {{ $tugasPanitia->deskripsi ?: 'Tidak ada deskripsi.' }}
                </p>
            </div>
        </div>

        <div class="card">

            <h2>Status Tugas</h2>

            <form
                method="POST"
                action="{{ route('eo.panitia.tugas.update-status', $tugasPanitia) }}"
            >
                @csrf
                @method('PUT')

                <div class="field">
                    <label>Status</label>

                    <select name="status" required>
                        <option
                            value="belum_dimulai"
                            {{ $tugasPanitia->status === 'belum_dimulai' ? 'selected' : '' }}
                        >
                            Belum Dimulai
                        </option>

                        <option
                            value="sedang_dikerjakan"
                            {{ $tugasPanitia->status === 'sedang_dikerjakan' ? 'selected' : '' }}
                        >
                            Sedang Dikerjakan
                        </option>

                        <option
                            value="selesai"
                            {{ $tugasPanitia->status === 'selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label>Catatan Panitia</label>

                    <textarea
                        name="catatan_panitia"
                        rows="5"
                        placeholder="Catatan dari panitia..."
                    >{{ $tugasPanitia->catatan_panitia }}</textarea>
                </div>

                <button type="submit" class="btn-primary">
                    Simpan Status
                </button>
            </form>

            <div class="qr-box">
    <h3>QR Panitia</h3>

    <p>
        Panitia dapat memindai QR ini untuk melihat seluruh tugas
        pada event dan divisi yang ditugaskan.
    </p>

    <div class="qr-wrapper">
        <div id="qr-panitia"></div>
    </div>

    <div class="qr-url">
        {{ route('panitia.tugas.panitia', $tugasPanitia->eventPanitia->id) }}
    </div>

    <button type="button" class="btn-primary" onclick="window.print()">
        Cetak QR
    </button>
</div>

        </div>

    </div>

</div>

<style>
.page {
    padding:28px;
}

.page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:24px;
}

.page-header h1 {
    margin:0;
    color:#172033;
}

.page-header p {
    margin:6px 0 0;
    color:#718096;
}

.grid {
    display:grid;
    grid-template-columns:1.4fr 1fr;
    gap:20px;
}

.card {
    background:#fff;
    border-radius:16px;
    padding:24px;
    box-shadow:0 5px 20px rgba(15,23,42,.06);
}

.card h2 {
    margin:0 0 22px;
    color:#172033;
}

.info {
    display:flex;
    justify-content:space-between;
    gap:20px;
    padding:13px 0;
    border-bottom:1px solid #edf0f3;
}

.info span,
.description span {
    color:#718096;
    font-size:14px;
}

.info strong {
    color:#172033;
    text-align:right;
}

.description {
    padding-top:18px;
}

.description p {
    color:#475569;
    line-height:1.7;
}

.field {
    margin-bottom:18px;
}

.field label {
    display:block;
    margin-bottom:7px;
    color:#334155;
    font-size:14px;
    font-weight:600;
}

select,
textarea,
input {
    width:100%;
    box-sizing:border-box;
    padding:11px 13px;
    border:1px solid #dbe2e8;
    border-radius:9px;
    font:inherit;
}

textarea {
    resize:vertical;
}

.btn-primary,
.btn-secondary {
    display:inline-flex;
    padding:11px 17px;
    border-radius:9px;
    font-weight:600;
    text-decoration:none;
    cursor:pointer;
}

.btn-primary {
    background:#15803d;
    color:white;
    border:0;
}

.btn-secondary {
    background:#f1f5f9;
    color:#334155;
}

.alert-success {
    margin-bottom:20px;
    padding:13px 16px;
    background:#f0fdf4;
    color:#166534;
    border:1px solid #bbf7d0;
    border-radius:10px;
}

.qr-box {
    margin-top:25px;
    padding-top:20px;
    border-top:1px solid #edf0f3;
}

.qr-box h3 {
    margin:0;
    color:#172033;
}

.qr-box p {
    color:#718096;
    font-size:14px;
}

@media(max-width:800px) {
    .grid {
        grid-template-columns:1fr;
    }

    .page {
        padding:16px;
    }

    .page-header {
        align-items:flex-start;
        gap:15px;
        flex-direction:column;
    }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const qrElement = document.getElementById('qr-panitia');

    if (qrElement) {
        new QRCode(qrElement, {
            text: @json(route('panitia.tugas.panitia', $tugasPanitia->eventPanitia->id)),
            width: 220,
            height: 220,
            correctLevel: QRCode.CorrectLevel.H
        });
    }
});
</script>
<style>
.qr-box {
    margin-top: 25px;
    padding-top: 24px;
    border-top: 1px solid #edf0f3;
}

.qr-box h3 {
    margin: 0 0 8px;
    color: #172033;
    font-size: 20px;
}

.qr-box p {
    margin: 0 0 18px;
    color: #718096;
    font-size: 14px;
    line-height: 1.6;
}

.qr-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    margin: 15px 0;
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
}

#qr-panitia {
    display: flex;
    justify-content: center;
    align-items: center;
}

.qr-url {
    padding: 10px;
    margin-bottom: 15px;
    background: #f8fafc;
    border-radius: 8px;
    color: #64748b;
    font-size: 12px;
    word-break: break-all;
    text-align: center;
}
</style>
</x-layouts.eo>