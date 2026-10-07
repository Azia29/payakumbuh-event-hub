<x-layouts.eo :user="$user" title="Profil Akun">

<style>
    .profile-page {
        max-width: 1100px;
        margin: 0 auto;
    }

    .profile-header {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 28px;
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
    }

    .profile-avatar {
        width: 82px;
        height: 82px;
        border-radius: 50%;
        background: #eef2ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .profile-name {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .profile-email {
        color: #64748b;
        margin-bottom: 10px;
    }

    .badge {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #ecfdf5;
        color: #047857;
        margin-right: 5px;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 1.4fr .8fr;
        gap: 20px;
    }

    .card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0,0,0,.04);
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 5px;
    }

    .card-subtitle {
        color: #64748b;
        font-size: 13px;
        margin-bottom: 22px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    label {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
    }

    input, textarea, select {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 11px 13px;
        font-size: 14px;
        outline: none;
        background: #fff;
        box-sizing: border-box;
    }

    input:focus, textarea:focus, select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37,99,235,.08);
    }

    textarea {
        min-height: 95px;
        resize: vertical;
    }

    .btn {
        border: 0;
        border-radius: 10px;
        padding: 11px 18px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-danger {
        background: #dc2626;
        color: #fff;
    }

    .account-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        padding: 13px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .account-row:last-child {
        border-bottom: 0;
    }

    .account-label {
        color: #64748b;
        font-size: 13px;
    }

    .account-value {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
        text-align: right;
    }

    .alert-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #047857;
        border-radius: 10px;
        padding: 12px 15px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-error {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
        border-radius: 10px;
        padding: 12px 15px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .password-note {
        background: #f8fafc;
        border-radius: 10px;
        padding: 12px;
        color: #64748b;
        font-size: 12px;
        margin-bottom: 18px;
    }

    @media (max-width: 800px) {
        .profile-grid,
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .profile-header {
            align-items: flex-start;
        }
    }
</style>

<div class="profile-page">

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('success_password'))
        <div class="alert-success">
            {{ session('success_password') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <strong>Periksa kembali data:</strong>
            <ul style="margin:8px 0 0 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="profile-header">

        <div class="profile-avatar">
            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
        </div>

        <div>
            <div class="profile-name">
                {{ $user->name }}
            </div>

            <div class="profile-email">
                {{ $user->email }}
            </div>

            <span class="badge">
                {{ $user->role ?? 'EO' }}
            </span>

            <span class="badge">
                {{ $user->divisi->nama_divisi ?? '-' }}
            </span>
        </div>

    </div>


    <div class="profile-grid">

        <div>

            <div class="card">

                <div class="card-title">
                    Data Pribadi
                </div>

                <div class="card-subtitle">
                    Informasi pribadi yang digunakan pada akun Anda.
                </div>

                <form method="POST" action="{{ route('eo.profil.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-grid">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input
                                type="email"
                                value="{{ $user->email }}"
                                disabled
                            >
                        </div>

                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input
                                type="text"
                                name="no_hp"
                                value="{{ old('no_hp', $user->no_hp) }}"
                                placeholder="Contoh: 081234567890"
                            >
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin">
                                <option value="">Pilih</option>
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $user->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input
                                type="date"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $user->tanggal_lahir?->format('Y-m-d')) }}"
                            >
                        </div>

                        <div class="form-group full">
                            <label>Alamat</label>
                            <textarea
                                name="alamat"
                                placeholder="Masukkan alamat lengkap"
                            >{{ old('alamat', $user->alamat) }}</textarea>
                        </div>

                    </div>

                    <div style="margin-top:20px;">
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>


            <div class="card">

                <div class="card-title">
                    Keamanan Akun
                </div>

                <div class="card-subtitle">
                    Ganti password apabila diperlukan.
                </div>

                <div class="password-note">
                    Password baru minimal 8 karakter. Password lama harus benar sebelum password dapat diganti.
                </div>

                <form method="POST" action="{{ route('eo.profil.password') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group" style="margin-bottom:15px;">
                        <label>Password Lama</label>
                        <input
                            type="password"
                            name="password_lama"
                            placeholder="Masukkan password lama"
                            required
                        >
                    </div>

                    <div class="form-group" style="margin-bottom:15px;">
                        <label>Password Baru</label>
                        <input
                            type="password"
                            name="password_baru"
                            placeholder="Masukkan password baru"
                            required
                        >
                    </div>

                    <div class="form-group" style="margin-bottom:18px;">
                        <label>Konfirmasi Password Baru</label>
                        <input
                            type="password"
                            name="password_baru_confirmation"
                            placeholder="Ulangi password baru"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-danger">
                        Ubah Password
                    </button>

                </form>

            </div>

        </div>


        <div>

            <div class="card">

                <div class="card-title">
                    Data Akun
                </div>

                <div class="card-subtitle">
                    Informasi akun yang digunakan dalam sistem.
                </div>

                <div class="account-row">
                    <span class="account-label">Nama</span>
                    <span class="account-value">{{ $user->name }}</span>
                </div>

                <div class="account-row">
                    <span class="account-label">Email</span>
                    <span class="account-value">{{ $user->email }}</span>
                </div>

                <div class="account-row">
                    <span class="account-label">Role</span>
                    <span class="account-value">{{ $user->role ?? 'EO' }}</span>
                </div>

                <div class="account-row">
                    <span class="account-label">Divisi</span>
                    <span class="account-value">
                        {{ $user->divisi->nama_divisi ?? '-' }}
                    </span>
                </div>

                <div class="account-row">
                    <span class="account-label">Status</span>
                    <span class="account-value" style="color:#059669;">
                        ● Aktif
                    </span>
                </div>

                <div class="account-row">
                    <span class="account-label">Terdaftar</span>
                    <span class="account-value">
                        {{ $user->created_at?->format('d M Y') ?? '-' }}
                    </span>
                </div>

            </div>

            <div class="card">

                <div class="card-title">
                    Informasi
                </div>

                <div class="card-subtitle">
                    Data akun Anda.
                </div>

                <p style="font-size:13px;color:#64748b;line-height:1.7;margin:0;">
                    Email digunakan untuk masuk ke sistem dan tidak dapat
                    diubah melalui halaman profil. Untuk mengganti password,
                    masukkan password lama terlebih dahulu.
                </p>

            </div>

        </div>

    </div>

</div>

</x-layouts.eo>