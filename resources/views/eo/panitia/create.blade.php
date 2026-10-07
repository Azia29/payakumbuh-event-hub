<x-layouts.eo
    :user="$user"
    title="Tambah Panitia"
>

    <style>

        .panitia-create {
            width: 100%;
        }

        /* =========================
           HEADER
        ========================== */

        .page-header {
            background: #ffffff;

            padding: 24px;

            border-radius: 14px;

            border: 1px solid #e5e7eb;

            box-shadow: 0 3px 12px rgba(0, 0, 0, .05);

            margin-bottom: 22px;
        }

        .page-header h1 {
            margin: 0 0 7px;

            color: #166534;

            font-size: 26px;
        }

        .page-header p {
            margin: 0;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;
        }


        /* =========================
           BREADCRUMB
        ========================== */

        .breadcrumb {
            display: flex;

            align-items: center;

            flex-wrap: wrap;

            gap: 7px;

            margin-bottom: 20px;

            font-size: 13px;

            color: #6b7280;
        }

        .breadcrumb a {
            color: #166534;

            text-decoration: none;

            font-weight: 600;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb span {
            color: #9ca3af;
        }


        /* =========================
           FORM CARD
        ========================== */

        .form-card {
            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            box-shadow: 0 3px 12px rgba(0, 0, 0, .05);

            overflow: hidden;
        }

        .form-card-header {
            padding: 20px 24px;

            border-bottom: 1px solid #e5e7eb;
        }

        .form-card-header h2 {
            margin: 0 0 5px;

            color: #1f2937;

            font-size: 18px;
        }

        .form-card-header p {
            margin: 0;

            color: #6b7280;

            font-size: 13px;
        }

        .form-body {
            padding: 24px;
        }


        /* =========================
           FORM GRID
        ========================== */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }

        .form-group {
            margin-bottom: 2px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #374151;

            font-size: 13px;

            font-weight: bold;
        }

        .required {
            color: #dc2626;
        }


        /* =========================
           INPUT
        ========================== */

        .form-control {
            width: 100%;

            padding: 11px 13px;

            border: 1px solid #d1d5db;

            border-radius: 8px;

            background: #ffffff;

            color: #1f2937;

            font-family: Arial, sans-serif;

            font-size: 14px;

            transition: .2s;
        }

        .form-control:focus {
            outline: none;

            border-color: #166534;

            box-shadow: 0 0 0 3px rgba(22, 101, 52, .08);
        }

        textarea.form-control {
            min-height: 120px;

            resize: vertical;
        }

        .form-help {
            margin-top: 6px;

            color: #9ca3af;

            font-size: 11px;
        }


        /* =========================
           ERROR
        ========================== */

        .input-error {
            margin-top: 6px;

            color: #dc2626;

            font-size: 12px;
        }

        .has-error {
            border-color: #dc2626;
        }


        /* =========================
           ERROR SUMMARY
        ========================== */

        .error-box {
            background: #fef2f2;

            color: #991b1b;

            border: 1px solid #fecaca;

            border-radius: 9px;

            padding: 14px 16px;

            margin-bottom: 22px;

            font-size: 13px;
        }

        .error-box strong {
            display: block;

            margin-bottom: 7px;
        }

        .error-box ul {
            margin: 0;

            padding-left: 20px;
        }

        .error-box li {
            margin-bottom: 3px;
        }


        /* =========================
           ACTION BUTTON
        ========================== */

        .form-actions {
            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 25px;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 11px 18px;

            border-radius: 8px;

            font-size: 13px;

            font-weight: bold;

            text-decoration: none;

            cursor: pointer;

            transition: .2s;
        }

        .btn-cancel {
            background: #f3f4f6;

            color: #374151;

            border: 1px solid #e5e7eb;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
        }

        .btn-save {
            background: #166534;

            color: #ffffff;

            border: none;
        }

        .btn-save:hover {
            background: #15803d;
        }


        /* =========================
           INFO
        ========================== */

        .info-box {
            margin-top: 20px;

            padding: 15px 17px;

            background: #f0fdf4;

            border: 1px solid #bbf7d0;

            border-radius: 9px;

            color: #4b5563;

            font-size: 12px;

            line-height: 1.6;
        }

        .info-box strong {
            color: #166534;
        }


        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-body {
                padding: 18px;
            }

            .form-actions {
                flex-direction: column-reverse;

                align-items: stretch;
            }

            .btn {
                width: 100%;
            }

        }

    </style>


    <div class="panitia-create">


        {{-- =========================
             BREADCRUMB
        ========================== --}}

        <div class="breadcrumb">

            <a href="{{ route('eo.dashboard') }}">
                Dashboard
            </a>

            <span>
                /
            </span>

            <a href="{{ route('eo.panitia.index') }}">
                Panitia
            </a>

            <span>
                /
            </span>

            <span>
                Tambah Panitia
            </span>

        </div>


        {{-- =========================
             HEADER
        ========================== --}}

        <div class="page-header">

            <h1>
                Tambah Panitia
            </h1>

            <p>
                Tambahkan anggota baru ke dalam struktur
                kepanitiaan Payakumbuh Event Hub.
            </p>

        </div>


        {{-- =========================
             VALIDATION ERROR
        ========================== --}}

        @if($errors->any())

            <div class="error-box">

                <strong>
                    Data belum dapat disimpan.
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =========================
             FORM
        ========================== --}}

        <div class="form-card">


            {{-- FORM HEADER --}}

            <div class="form-card-header">

                <h2>
                    Data Anggota Panitia
                </h2>

                <p>
                    Isi data anggota panitia dengan lengkap.
                </p>

            </div>


            {{-- FORM BODY --}}

            <div class="form-body">

                <form
                    action="{{ route('eo.panitia.store') }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-grid">


                        {{-- =========================
                             NAMA
                        ========================== --}}

                        <div class="form-group">

                            <label for="nama">

                                Nama Panitia

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control @error('nama') has-error @enderror"
                                value="{{ old('nama') }}"
                                placeholder="Masukkan nama lengkap"
                                required
                            >

                            @error('nama')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =========================
                             EMAIL
                        ========================== --}}

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

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =========================
                             NO HP
                        ========================== --}}

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
                                placeholder="08xxxxxxxxxx"
                            >

                            @error('no_hp')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =========================
                             JABATAN
                        ========================== --}}

                        <div class="form-group">

                            <label for="jabatan">

                                Jabatan

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                id="jabatan"
                                name="jabatan"
                                class="form-control @error('jabatan') has-error @enderror"
                                value="{{ old('jabatan') }}"
                                placeholder="Contoh: Ketua Panitia"
                                required
                            >

                            @error('jabatan')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =========================
                             DIVISI
                        ========================== --}}

                        <div class="form-group">

                            <label for="divisi">

                                Divisi

                                <span class="required">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                id="divisi"
                                name="divisi"
                                class="form-control @error('divisi') has-error @enderror"
                                value="{{ old('divisi') }}"
                                placeholder="Contoh: Acara"
                                required
                            >

                            @error('divisi')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                            <div class="form-help">
                                Contoh: Acara, Humas, Sponsorship,
                                Dokumentasi, atau divisi lainnya.
                            </div>

                        </div>


                        {{-- =========================
                             KETERANGAN
                        ========================== --}}

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

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                    </div>


                    {{-- =========================
                         ACTION
                    ========================== --}}

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


                </form>

            </div>

        </div>


        {{-- =========================
             INFO
        ========================== --}}

        <div class="info-box">

            <strong>
                Informasi:
            </strong>

            Data yang ditambahkan melalui form ini akan
            masuk ke daftar panitia dan dapat dikelola
            kembali oleh Ketua EO melalui menu
            <strong>Panitia</strong>.

        </div>


    </div>

</x-layouts.eo>

