<x-layouts.eo :user="$user" title="Edit Panitia">

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 15px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        margin: 0;
        font-size: 28px;
        color: #166534;
    }

    .page-header p {
        margin: 6px 0 0;
        color: #64748b;
    }

    .card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .06);
        max-width: 850px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: 700;
        color: #374151;
        font-size: 14px;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 9px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        background: #fff;
        color: #1f2937;
    }

    input:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border-color: #166534;
        box-shadow: 0 0 0 3px rgba(22, 101, 52, .08);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
        flex-wrap: wrap;
    }

    .btn {
        border: none;
        border-radius: 9px;
        padding: 12px 20px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary {
        background: #166534;
        color: #fff;
    }

    .btn-primary:hover {
        background: #15803d;
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #334155;
    }

    .btn-secondary:hover {
        background: #e2e8f0;
    }

    .error-box {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    @media (max-width: 700px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .card {
            padding: 20px;
        }
    }
</style>

<div class="page-header">
    <div>
        <h1>Edit Panitia</h1>
        <p>Perbarui informasi anggota panitia.</p>
    </div>
</div>

@if ($errors->any())
    <div class="error-box">
        <strong>Data belum dapat disimpan.</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">

    <form
        action="{{ route('eo.panitia.update', $panitia) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group full">
                <label for="nama">Nama Panitia</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $panitia->nama) }}"
                    placeholder="Masukkan nama panitia"
                    required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $panitia->email) }}"
                    placeholder="contoh@email.com">
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP</label>

                <input
                    type="text"
                    id="no_hp"
                    name="no_hp"
                    value="{{ old('no_hp', $panitia->no_hp) }}"
                    placeholder="08xxxxxxxxxx">
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>

                <input
                    type="text"
                    id="jabatan"
                    name="jabatan"
                    value="{{ old('jabatan', $panitia->jabatan) }}"
                    placeholder="Contoh: Ketua"
                    required>
            </div>

            <div class="form-group">
                <label for="divisi">Divisi</label>

                <select id="divisi" name="divisi" required>
                    <option value="">-- Pilih Divisi --</option>

                    <option value="Ketua" {{ old('divisi', $panitia->divisi) == 'Ketua' ? 'selected' : '' }}>
                        Ketua
                    </option>

                    <option value="Acara" {{ old('divisi', $panitia->divisi) == 'Acara' ? 'selected' : '' }}>
                        Acara
                    </option>

                    <option value="Humas" {{ old('divisi', $panitia->divisi) == 'Humas' ? 'selected' : '' }}>
                        Humas
                    </option>

                    <option value="Sponsorship" {{ old('divisi', $panitia->divisi) == 'Sponsorship' ? 'selected' : '' }}>
                        Sponsorship
                    </option>

                    <option value="Dokumentasi" {{ old('divisi', $panitia->divisi) == 'Dokumentasi' ? 'selected' : '' }}>
                        Dokumentasi
                    </option>
                </select>
            </div>

            <div class="form-group full">
                <label for="keterangan">Keterangan</label>

                <textarea
                    id="keterangan"
                    name="keterangan"
                    placeholder="Keterangan tambahan">{{ old('keterangan', $panitia->keterangan) }}</textarea>
            </div>

        </div>

        <div class="actions">

            <button
                type="submit"
                class="btn btn-primary">
                Simpan Perubahan
            </button>

            <a
                href="{{ route('eo.panitia.index') }}"
                class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

</x-layouts.eo>