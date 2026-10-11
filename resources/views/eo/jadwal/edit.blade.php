<x-layouts.eo :user="$user" title="Edit Jadwal">

<style>
    .jadwal-page {
        max-width: 1100px;
        margin: 0 auto;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-title {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
    }

    .page-description {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 42px;
        padding: 0 16px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid transparent;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-back {
        background: #ffffff;
        color: #475569;
        border-color: #dbe2ea;
    }

    .btn-back:hover {
        background: #f8fafc;
    }

    .btn-save {
        background: #0f766e;
        color: #ffffff;
    }

    .btn-save:hover {
        background: #115e59;
    }

    .form-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .form-card-header {
        padding: 22px 24px;
        border-bottom: 1px solid #e5e7eb;
    }

    .form-card-title {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #1f2937;
    }

    .form-card-subtitle {
        margin: 6px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .form-body {
        padding: 26px 24px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        margin-bottom: 7px;
        color: #334155;
        font-size: 13px;
        font-weight: 600;
    }

    .required {
        color: #dc2626;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        min-height: 44px;
        padding: 10px 12px;
        border: 1px solid #dbe2ea;
        border-radius: 8px;
        background: #ffffff;
        color: #1f2937;
        font-size: 14px;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .form-control:focus {
        border-color: #0f766e;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, .10);
    }

    textarea.form-control {
        min-height: 110px;
        resize: vertical;
    }

    select.form-control {
        cursor: pointer;
    }

    .form-help {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 12px;
    }

    .error-message {
        margin-top: 5px;
        color: #dc2626;
        font-size: 12px;
    }

    .alert {
        margin-bottom: 20px;
        padding: 13px 16px;
        border-radius: 9px;
        font-size: 14px;
    }

    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 18px 24px;
        background: #f8fafc;
        border-top: 1px solid #e5e7eb;
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
        }

        .page-header .btn {
            width: 100%;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .form-footer .btn {
            width: 100%;
        }
    }
</style>

<div class="jadwal-page">

    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Jadwal</h1>

            <p class="page-description">
                Perbarui informasi jadwal kegiatan event sesuai kebutuhan.
            </p>
        </div>

        <a href="{{ route('eo.jadwal.index') }}" class="btn btn-back">
            Kembali ke Jadwal
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Periksa kembali data yang dimasukkan.</strong>

            <ul style="margin:8px 0 0 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('eo.jadwal.update', $jadwal) }}"
        method="POST"
        class="form-card"
    >

        @csrf
        @method('PUT')

        <div class="form-card-header">
            <h2 class="form-card-title">Informasi Jadwal</h2>

            <p class="form-card-subtitle">
                Perbarui data kegiatan, waktu, lokasi, dan penanggung jawab.
            </p>
        </div>

        <div class="form-body">

            <div class="form-grid">

                {{-- Event --}}
                <div class="form-group full">
                    <label class="form-label" for="event_id">
                        Event <span class="required">*</span>
                    </label>

                    <select
                        name="event_id"
                        id="event_id"
                        class="form-control"
                        required
                    >
                        <option value="">Pilih Event</option>

                        @foreach ($events as $event)
                            <option
                                value="{{ $event->id }}"
                                {{ old('event_id', $jadwal->event_id) == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>
                        @endforeach
                    </select>

                    @error('event_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Jadwal --}}
                <div class="form-group full">
                    <label class="form-label" for="nama_jadwal">
                        Nama Jadwal <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_jadwal"
                        id="nama_jadwal"
                        class="form-control"
                        value="{{ old('nama_jadwal', $jadwal->nama_jadwal) }}"
                        placeholder="Contoh: Pembukaan Acara"
                        required
                    >

                    @error('nama_jadwal')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tanggal --}}
                <div class="form-group">
                    <label class="form-label" for="tanggal">
                        Tanggal <span class="required">*</span>
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        id="tanggal"
                        class="form-control"
                        value="{{ old('tanggal', $jadwal->tanggal ? \Carbon\Carbon::parse($jadwal->tanggal)->format('Y-m-d') : '') }}"
                        required
                    >

                    @error('tanggal')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label class="form-label" for="status">
                        Status <span class="required">*</span>
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-control"
                        required
                    >
                        @php
                            $currentStatus = old('status', $jadwal->status ?? 'draft');
                        @endphp

                        <option value="draft" {{ $currentStatus === 'draft' ? 'selected' : '' }}>
                            Draft
                        </option>

                        <option value="terjadwal" {{ $currentStatus === 'terjadwal' ? 'selected' : '' }}>
                            Terjadwal
                        </option>

                        <option value="berlangsung" {{ $currentStatus === 'berlangsung' ? 'selected' : '' }}>
                            Berlangsung
                        </option>

                        <option value="selesai" {{ $currentStatus === 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                    </select>

                    @error('status')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Waktu Mulai --}}
                <div class="form-group">
                    <label class="form-label" for="waktu_mulai">
                        Waktu Mulai <span class="required">*</span>
                    </label>

                    <input
                        type="time"
                        name="waktu_mulai"
                        id="waktu_mulai"
                        class="form-control"
                        value="{{ old('waktu_mulai', $jadwal->waktu_mulai ? \Carbon\Carbon::parse($jadwal->waktu_mulai)->format('H:i') : '') }}"
                        required
                    >

                    @error('waktu_mulai')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Waktu Selesai --}}
                <div class="form-group">
                    <label class="form-label" for="waktu_selesai">
                        Waktu Selesai
                    </label>

                    <input
                        type="time"
                        name="waktu_selesai"
                        id="waktu_selesai"
                        class="form-control"
                        value="{{ old('waktu_selesai', $jadwal->waktu_selesai ? \Carbon\Carbon::parse($jadwal->waktu_selesai)->format('H:i') : '') }}"
                    >

                    @error('waktu_selesai')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Lokasi --}}
                <div class="form-group">
                    <label class="form-label" for="lokasi">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        name="lokasi"
                        id="lokasi"
                        class="form-control"
                        value="{{ old('lokasi', $jadwal->lokasi) }}"
                        placeholder="Contoh: Ngalau Indah"
                    >

                    @error('lokasi')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Penanggung Jawab --}}
                <div class="form-group">
                    <label class="form-label" for="penanggung_jawab">
                        Penanggung Jawab
                    </label>

                    <input
                        type="text"
                        name="penanggung_jawab"
                        id="penanggung_jawab"
                        class="form-control"
                        value="{{ old('penanggung_jawab', $jadwal->penanggung_jawab) }}"
                        placeholder="Contoh: Divisi Acara"
                    >

                    @error('penanggung_jawab')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div class="form-group full">
                    <label class="form-label" for="keterangan">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        class="form-control"
                        placeholder="Tambahkan keterangan jadwal jika diperlukan..."
                    >{{ old('keterangan', $jadwal->keterangan) }}</textarea>

                    @error('keterangan')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

            </div>

        </div>

        <div class="form-footer">

            <a
                href="{{ route('eo.jadwal.index') }}"
                class="btn btn-back"
            >
                Batal
            </a>

            <button type="submit" class="btn btn-save">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

</x-layouts.eo>
