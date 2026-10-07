<x-layouts.eo :user="$user" title="Buat Pengumuman">

    <style>
        .announcement-create {
            max-width: 900px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
        }

        .page-header p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .form-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #1f2937;
            font-size: 14px;
            font-weight: 600;
        }

        .required {
            color: #ef4444;
        }

        .form-control,
        .form-select {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 14px;
            color: #1f2937;
            background: #fff;
            outline: none;
            transition: .2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, .12);
        }

        textarea.form-control {
            min-height: 220px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-help {
            margin-top: 6px;
            color: #94a3b8;
            font-size: 12px;
        }

        .error-box {
            margin-bottom: 22px;
            padding: 14px 16px;
            border-radius: 10px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            font-size: 14px;
        }

        .error-box ul {
            margin: 6px 0 0 18px;
            padding: 0;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 42px;
            padding: 0 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .btn-primary {
            background: #10b981;
            color: #fff;
        }

        .btn-primary:hover {
            background: #059669;
        }

        @media (max-width: 640px) {
            .form-card {
                padding: 20px;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <div class="announcement-create">

        <div class="page-header">
            <h1>Buat Pengumuman</h1>
            <p>
                Buat pengumuman resmi untuk menyampaikan informasi kepada peserta dan masyarakat.
            </p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <strong>Periksa kembali data yang diisi.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">

            <form action="{{ route('eo.pengumuman.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="judul">
                        Judul Pengumuman <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        class="form-control"
                        value="{{ old('judul') }}"
                        placeholder="Contoh: Perubahan Jadwal Acara"
                        required
                    >

                    <div class="form-help">
                        Gunakan judul yang singkat dan mudah dipahami.
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="event_id">
                        Terkait Event
                    </label>

                    <select
                        id="event_id"
                        name="event_id"
                        class="form-select"
                    >
                        <option value="">-- Pengumuman Umum --</option>

                        @foreach ($events as $event)
                            <option
                                value="{{ $event->id }}"
                                {{ old('event_id') == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>
                        @endforeach
                    </select>

                    <div class="form-help">
                        Pilih event jika pengumuman berkaitan dengan event tertentu.
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="isi">
                        Isi Pengumuman <span class="required">*</span>
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        class="form-control"
                        placeholder="Tuliskan isi pengumuman di sini..."
                        required
                    >{{ old('isi') }}</textarea>
                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('eo.pengumuman.index') }}"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Pengumuman
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.eo>