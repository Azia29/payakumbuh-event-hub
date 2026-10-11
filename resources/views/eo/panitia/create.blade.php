<x-layouts.eo :user="$user" title="Tambah Panitia">

<style>
    .page-content {
        padding: 28px;
    }

    .breadcrumb {
        display: flex;
        gap: 8px;
        align-items: center;
        margin-bottom: 20px;
        font-size: 13px;
        color: #64748b;
    }

    .breadcrumb a {
        color: #047857;
        text-decoration: none;
    }

    .form-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.05);
        overflow: hidden;
    }

    .form-card-header {
        padding: 22px 26px;
        border-bottom: 1px solid #e5e7eb;
    }

    .form-card-header h2 {
        margin: 0 0 5px;
        font-size: 18px;
        color: #1f2937;
    }

    .form-card-header p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .form-body {
        padding: 26px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 4px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #1f2937;
    }

    .required {
        color: #ef4444;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 11px 13px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #fff;
        color: #1f2937;
        font-size: 14px;
        outline: none;
    }

    .form-control:focus {
        border-color: #059669;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.10);
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    .input-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .info-box {
        margin-top: 24px;
        padding: 14px 16px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        color: #166534;
        font-size: 13px;
        line-height: 1.5;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 26px;
        padding-top: 20px;
        border-top: 1px solid #e5e7eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 18px;
        border-radius: 8px;
        border: none;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-save {
        background: #047857;
        color: #fff;
    }

    .btn-save:hover {
        background: #065f46;
    }

    @media (max-width: 800px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .page-content {
            padding: 18px;
        }
    }
</style>

<div class="page-content">

    <div class="breadcrumb">
        <a href="{{ route('eo.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('eo.panitia.index') }}">Panitia</a>
        <span>/</span>
        <span>Tambah Panitia</span>
    </div>

    <div class="form-card">

        <div class="form-card-header">
            <h2>Data Anggota Panitia</h2>
            <p>Isi data anggota panitia dengan lengkap.</p>
        </div>

        <form action="{{ route('eo.panitia.store') }}" method="POST">
            @csrf

            <div class="form-body">

                <div class="form-grid">

                    {{-- EVENT --}}
                    <div class="form-group">

                        <label for="event_id">
                            Event <span class="required">*</span>
                        </label>

                        <select
                            id="event_id"
                            name="event_id"
                            class="form-control @error('event_id') has-error @enderror"
                            required
                        >
                            <option value="">-- Pilih Event --</option>

                            @foreach ($events as $event)
                                <option
                                    value="{{ $event->id }}"
                                    {{ old('event_id') == $event->id ? 'selected' : '' }}
                                >
                                    {{ $event->nama_event }}
                                </option>
                            @endforeach
                        </select>

                        @error('event_id')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- NAMA --}}
                    <div class="form-group">

                        <label for="nama">
                            Nama Panitia <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="form-control @error('nama') has-error @enderror"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama panitia"
                            required
                        >

                        @error('nama')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- EMAIL --}}
                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control @error('email') has-error @enderror"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                        >

                        @error('email')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- NOMOR HP --}}
                    <div class="form-group">

                        <label for="no_hp">
                            Nomor HP
                        </label>

                        <input
                            type="text"
                            id="no_hp"
                            name="no_hp"
                            class="form-control @error('no_hp') has-error @enderror"
                            value="{{ old('no_hp') }}"
                            placeholder="Contoh: 081234567890"
                        >

                        @error('no_hp')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- DIVISI --}}
                    <div class="form-group">

                        <label for="divisi">
                            Divisi <span class="required">*</span>
                        </label>

                        <select
                            id="divisi"
                            name="divisi"
                            class="form-control @error('divisi') has-error @enderror"
                            required
                        >
                            <option value="">-- Pilih Divisi --</option>

                            <option
                                value="Acara"
                                {{ old('divisi') == 'Acara' ? 'selected' : '' }}
                            >
                                Acara
                            </option>

                            <option
                                value="Humas"
                                {{ old('divisi') == 'Humas' ? 'selected' : '' }}
                            >
                                Humas
                            </option>

                            <option
                                value="Sponsorship"
                                {{ old('divisi') == 'Sponsorship' ? 'selected' : '' }}
                            >
                                Sponsorship
                            </option>

                            <option
                                value="Dokumentasi"
                                {{ old('divisi') == 'Dokumentasi' ? 'selected' : '' }}
                            >
                                Dokumentasi
                            </option>

                        </select>

                        @error('divisi')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>


                    {{-- KETERANGAN --}}
                    <div class="form-group full">

                        <label for="keterangan">
                            Keterangan
                        </label>

                        <textarea
                            id="keterangan"
                            name="keterangan"
                            class="form-control @error('keterangan') has-error @enderror"
                            placeholder="Tambahkan keterangan jika diperlukan..."
                        >{{ old('keterangan') }}</textarea>

                        @error('keterangan')
                            <div class="input-error">{{ $message }}</div>
                        @enderror

                    </div>

                </div>


                <div class="info-box">
                    <strong>Informasi:</strong>
                    Data yang ditambahkan melalui form ini akan masuk ke daftar panitia.
                    Setiap panitia akan memiliki QR Code untuk mengakses tugas yang diberikan.
                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('eo.panitia.index') }}"
                        class="btn btn-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        Simpan Panitia
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

</x-layouts.eo>
