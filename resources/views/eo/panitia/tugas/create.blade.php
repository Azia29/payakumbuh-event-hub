<x-layouts.eo :user="$user" title="Tambah Tugas Panitia">

<div class="page">

    <div class="page-header">
        <div>
            <h1>Tambah Tugas Panitia</h1>
            <p>Tentukan event, panitia, divisi, dan tugas yang harus dikerjakan.</p>
        </div>

        <a href="{{ route('eo.panitia.tugas.index') }}" class="btn-secondary">
            Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa data berikut:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('eo.panitia.tugas.store') }}"
          class="card">

        @csrf

        <div class="section">
            <h2>Penugasan</h2>

            <div class="grid">

                <div class="field">
                    <label>Event</label>
                    <select name="event_id" required>
                        <option value="">Pilih Event</option>

                        @foreach($events as $event)
                            <option value="{{ $event->id }}"
                                {{ old('event_id') == $event->id ? 'selected' : '' }}>
                                {{ $event->nama_event }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label>Panitia</label>
                    <select name="panitia_id" required>
                        <option value="">Pilih Panitia</option>

                        @foreach($panitias as $panitia)
                            <option value="{{ $panitia->id }}"
                                {{ old('panitia_id') == $panitia->id ? 'selected' : '' }}>
                                {{ $panitia->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label>Divisi</label>
                    <select name="divisi_id" required>
                        <option value="">Pilih Divisi</option>

                        @foreach($divisis as $divisi)
                            <option value="{{ $divisi->id }}"
                                {{ old('divisi_id') == $divisi->id ? 'selected' : '' }}>
                                {{ $divisi->nama_divisi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label>Judul Tugas</label>
                    <input
                        type="text"
                        name="judul_tugas"
                        value="{{ old('judul_tugas') }}"
                        placeholder="Contoh: Mengatur rundown acara"
                        required
                    >
                </div>

            </div>
        </div>

        <div class="section">
            <h2>Detail Tugas</h2>

            <div class="field">
                <label>Deskripsi</label>
                <textarea
                    name="deskripsi"
                    rows="5"
                    placeholder="Jelaskan pekerjaan yang harus dilakukan..."
                >{{ old('deskripsi') }}</textarea>
            </div>

            <div class="grid">

                <div class="field">
                    <label>Tanggal</label>
                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal') }}"
                    >
                </div>

                <div class="field">
                    <label>Lokasi</label>
                    <input
                        type="text"
                        name="lokasi"
                        value="{{ old('lokasi') }}"
                        placeholder="Contoh: Gedung Serbaguna"
                    >
                </div>

                <div class="field">
                    <label>Jam Mulai</label>
                    <input
                        type="time"
                        name="jam_mulai"
                        value="{{ old('jam_mulai') }}"
                    >
                </div>

                <div class="field">
                    <label>Jam Selesai</label>
                    <input
                        type="time"
                        name="jam_selesai"
                        value="{{ old('jam_selesai') }}"
                    >
                </div>

            </div>
        </div>

        <div class="form-footer">
            <a href="{{ route('eo.panitia.tugas.index') }}"
               class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn-primary">
                Simpan Tugas
            </button>
        </div>

    </form>

</div>

<style>
.page {
    padding:28px;
}

.page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    margin-bottom:24px;
}

.page-header h1 {
    margin:0;
    color:#172033;
    font-size:28px;
}

.page-header p {
    margin:7px 0 0;
    color:#718096;
}

.card {
    background:#fff;
    border-radius:16px;
    box-shadow:0 5px 20px rgba(15,23,42,.06);
}

.section {
    padding:24px;
    border-bottom:1px solid #edf0f3;
}

.section h2 {
    margin:0 0 20px;
    color:#172033;
    font-size:18px;
}

.grid {
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:18px;
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

input,
select,
textarea {
    width:100%;
    box-sizing:border-box;
    padding:11px 13px;
    border:1px solid #dbe2e8;
    border-radius:9px;
    background:#fff;
    color:#172033;
    font:inherit;
    outline:none;
}

input:focus,
select:focus,
textarea:focus {
    border-color:#22c55e;
    box-shadow:0 0 0 3px rgba(34,197,94,.1);
}

textarea {
    resize:vertical;
}

.form-footer {
    display:flex;
    justify-content:flex-end;
    gap:10px;
    padding:20px 24px;
}

.btn-primary,
.btn-secondary {
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:11px 18px;
    border-radius:9px;
    font-weight:600;
    text-decoration:none;
    cursor:pointer;
}

.btn-primary {
    background:#15803d;
    color:#fff;
    border:0;
}

.btn-secondary {
    background:#f1f5f9;
    color:#334155;
    border:1px solid #e2e8f0;
}

.alert-error {
    margin-bottom:20px;
    padding:15px;
    background:#fef2f2;
    border:1px solid #fecaca;
    color:#991b1b;
    border-radius:10px;
}

.alert-error ul {
    margin:8px 0 0;
}

@media(max-width:700px) {
    .page {
        padding:16px;
    }

    .grid {
        grid-template-columns:1fr;
    }

    .page-header {
        flex-direction:column;
        align-items:flex-start;
    }
}
</style>

</x-layouts.eo>