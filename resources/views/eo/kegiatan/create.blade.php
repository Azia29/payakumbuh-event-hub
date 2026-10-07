<x-layouts.eo :user="$user" title="Tambah Kegiatan">

    <div class="top-area">

        <div>
            <a href="{{ route('eo.kegiatan.index') }}" class="back-link">
                ← Kembali ke Kegiatan
            </a>

            <span class="eyebrow">DIVISI ACARA</span>

            <h1>Tambah Kegiatan</h1>

            <p>
                Tambahkan aktivitas yang akan dilaksanakan
                dalam event.
            </p>
        </div>

    </div>


    @if ($errors->any())

        <div class="alert-error">

            <strong>Data belum dapat disimpan.</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <div class="form-layout">

        <div class="form-card">

            <div class="form-heading">

                <div class="heading-icon">
                    K
                </div>

                <div>
                    <h2>Informasi Kegiatan</h2>
                    <p>
                        Isi informasi kegiatan dengan lengkap.
                    </p>
                </div>

            </div>


            <form
                action="{{ route('eo.kegiatan.store') }}"
                method="POST">

                @csrf


                <div class="form-grid">


                    <div class="form-group">

                        <label for="event_id">
                            Event <span>*</span>
                        </label>

                        <select
                            id="event_id"
                            name="event_id"
                            required>

                            <option value="">
                                Pilih Event
                            </option>

                            @foreach($events as $event)

                                <option
                                    value="{{ $event->id }}"
                                    {{ old('event_id') == $event->id ? 'selected' : '' }}>

                                    {{ $event->nama_event }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="form-group">

                        <label for="nama_kegiatan">
                            Nama Kegiatan <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="nama_kegiatan"
                            name="nama_kegiatan"
                            value="{{ old('nama_kegiatan') }}"
                            placeholder="Contoh: Registrasi Peserta"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal <span>*</span>
                        </label>

                        <input
                            type="date"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal') }}"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="waktu">
                            Waktu
                        </label>

                        <input
                            type="time"
                            id="waktu"
                            name="waktu"
                            value="{{ old('waktu') }}">

                    </div>


                    <div class="form-group full">

                        <label for="lokasi">
                            Lokasi <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="lokasi"
                            name="lokasi"
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: Lapangan Utama Payakumbuh"
                            required>

                    </div>


                    <div class="form-group full">

                        <label for="deskripsi">
                            Deskripsi
                        </label>

                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            placeholder="Jelaskan kegiatan yang akan dilaksanakan...">{{ old('deskripsi') }}</textarea>

                    </div>


                </div>


                <div class="form-footer">

                    <a
                        href="{{ route('eo.kegiatan.index') }}"
                        class="btn-cancel">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="btn-save">

                        Simpan Kegiatan

                    </button>

                </div>

            </form>

        </div>


        <div class="info-card">

            <div class="info-icon">
                i
            </div>

            <h3>Informasi</h3>

            <p>
                Kegiatan digunakan untuk mencatat aktivitas
                yang dilakukan dalam pelaksanaan sebuah event.
            </p>

            <div class="info-item">
                <strong>Contoh kegiatan</strong>
                <span>Registrasi peserta</span>
            </div>

            <div class="info-item">
                <strong>Contoh lainnya</strong>
                <span>Gladi bersih, lomba, pembagian hadiah</span>
            </div>

        </div>

    </div>


    <style>

        .top-area {
            margin-bottom: 25px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 15px;
            color: #166534;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }

        .back-link:hover {
            color: #15803d;
        }

        .eyebrow {
            display: block;
            color: #15803d;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .top-area h1 {
            margin: 6px 0;
            color: #172033;
            font-size: 30px;
        }

        .top-area p {
            margin: 0;
            color: #64748b;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error ul {
            margin: 8px 0 0 20px;
        }

        .form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 280px;
            gap: 22px;
            align-items: start;
        }

        .form-card,
        .info-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
        }

        .form-card {
            padding: 28px;
        }

        .form-heading {
            display: flex;
            gap: 14px;
            align-items: center;
            padding-bottom: 22px;
            margin-bottom: 25px;
            border-bottom: 1px solid #eef2f7;
        }

        .heading-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #166534;
            font-size: 20px;
            font-weight: 800;
        }

        .form-heading h2 {
            margin: 0 0 4px;
            color: #172033;
            font-size: 19px;
        }

        .form-heading p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .form-group label span {
            color: #dc2626;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #d7dee7;
            border-radius: 9px;
            padding: 12px 13px;
            background: #fff;
            color: #172033;
            font-family: Arial, sans-serif;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        .form-group input,
        .form-group select {
            height: 45px;
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px #dcfce7;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #eef2f7;
        }

        .btn-cancel,
        .btn-save {
            min-height: 44px;
            padding: 11px 18px;
            border-radius: 9px;
            font-weight: 700;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-cancel {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-save {
            border: none;
            background: #166534;
            color: white;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .info-card {
            padding: 23px;
            background: #f0fdf4;
            border-color: #bbf7d0;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #166534;
            color: white;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .info-card h3 {
            margin: 0 0 8px;
            color: #166534;
        }

        .info-card > p {
            margin: 0 0 20px;
            color: #4b5563;
            line-height: 1.6;
            font-size: 13px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 12px 0;
            border-top: 1px solid #bbf7d0;
        }

        .info-item strong {
            font-size: 12px;
            color: #166534;
        }

        .info-item span {
            color: #4b5563;
            font-size: 12px;
            line-height: 1.5;
        }

        @media (max-width: 850px) {

            .form-layout {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 650px) {

            .form-card {
                padding: 20px;
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

            .btn-cancel,
            .btn-save {
                width: 100%;
                text-align: center;
            }

        }

    </style>

</x-layouts.eo>
