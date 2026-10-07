<x-layouts.eo :user="$user" title="Tambah Sponsor">

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- Header --}}
        <div>
            <a
                href="{{ route('eo.sponsorship.index') }}"
                class="text-sm font-medium text-green-600 hover:text-green-700"
            >
                â† Kembali ke Kelola Sponsor
            </a>

            <h1 class="mt-3 text-2xl font-bold text-gray-800">
                Tambah Sponsor
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Tambahkan data perusahaan atau pihak yang menjadi sponsor event.
            </p>
        </div>


        {{-- Error Validasi --}}
        @if ($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 p-4">

                <div class="font-semibold text-red-700">
                    Terdapat kesalahan:
                </div>

                <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>
        @endif


        {{-- Form --}}
        <form
            action="{{ route('eo.sponsorship.store') }}"
            method="POST"
            class="space-y-6"
        >

            @csrf


            {{-- =====================================================
                 INFORMASI EVENT
            ====================================================== --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Event
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Hubungkan sponsor dengan event yang sedang dikelola.
                </p>

                <div class="mt-5">

                    <label
                        for="event_id"
                        class="mb-2 block text-sm font-medium text-gray-700"
                    >
                        Event
                    </label>

                    <select
                        id="event_id"
                        name="event_id"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Event --
                        </option>

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
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>


            {{-- =====================================================
                 INFORMASI PERUSAHAAN
            ====================================================== --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Sponsor
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Masukkan informasi perusahaan atau pihak sponsor.
                </p>


                <div class="mt-5 grid gap-5 md:grid-cols-2">

                    {{-- Nama Perusahaan --}}
                    <div class="md:col-span-2">

                        <label
                            for="nama_perusahaan"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Nama Perusahaan / Sponsor
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            id="nama_perusahaan"
                            name="nama_perusahaan"
                            value="{{ old('nama_perusahaan') }}"
                            placeholder="Contoh: PT Maju Bersama"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                        @error('nama_perusahaan')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Nama Kontak --}}
                    <div>

                        <label
                            for="nama_kontak"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Nama Kontak
                        </label>

                        <input
                            type="text"
                            id="nama_kontak"
                            name="nama_kontak"
                            value="{{ old('nama_kontak') }}"
                            placeholder="Contoh: Budi Santoso"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    {{-- Telepon --}}
                    <div>

                        <label
                            for="telepon"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Nomor Telepon
                        </label>

                        <input
                            type="text"
                            id="telepon"
                            name="telepon"
                            value="{{ old('telepon') }}"
                            placeholder="Contoh: 081234567890"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                        @error('email')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- Alamat --}}
                    <div class="md:col-span-2">

                        <label
                            for="alamat"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Alamat
                        </label>

                        <textarea
                            id="alamat"
                            name="alamat"
                            rows="3"
                            placeholder="Alamat perusahaan / sponsor"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >{{ old('alamat') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 INFORMASI DUKUNGAN
            ====================================================== --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Bentuk Dukungan Sponsorship
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Catat bentuk kerja sama yang diberikan oleh sponsor.
                </p>


                <div class="mt-5 grid gap-5 md:grid-cols-2">

                    {{-- Jenis Dukungan --}}
                    <div>

                        <label
                            for="jenis_dukungan"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Jenis Dukungan
                        </label>

                        <select
                            id="jenis_dukungan"
                            name="jenis_dukungan"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                            <option value="">
                                -- Pilih Jenis Dukungan --
                            </option>

                            <option
                                value="Dana"
                                {{ old('jenis_dukungan') === 'Dana' ? 'selected' : '' }}
                            >
                                Dana
                            </option>

                            <option
                                value="Barang"
                                {{ old('jenis_dukungan') === 'Barang' ? 'selected' : '' }}
                            >
                                Barang
                            </option>

                            <option
                                value="Jasa"
                                {{ old('jenis_dukungan') === 'Jasa' ? 'selected' : '' }}
                            >
                                Jasa
                            </option>

                            <option
                                value="Media Partner"
                                {{ old('jenis_dukungan') === 'Media Partner' ? 'selected' : '' }}
                            >
                                Media Partner
                            </option>

                            <option
                                value="Lainnya"
                                {{ old('jenis_dukungan') === 'Lainnya' ? 'selected' : '' }}
                            >
                                Lainnya
                            </option>

                        </select>

                    </div>


                    {{-- Nominal --}}
                    <div>

                        <label
                            for="nominal_dukungan"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Nominal Dukungan
                        </label>

                        <div class="flex">

                            <span class="inline-flex items-center rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 px-4 text-sm text-gray-500">
                                Rp
                            </span>

                            <input
                                type="number"
                                id="nominal_dukungan"
                                name="nominal_dukungan"
                                value="{{ old('nominal_dukungan') }}"
                                min="0"
                                step="0.01"
                                placeholder="0"
                                class="w-full rounded-r-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                            >

                        </div>

                    </div>


                    {{-- Status --}}
                    <div>

                        <label
                            for="status"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Status Sponsorship
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                            <option
                                value="calon"
                                {{ old('status', 'calon') === 'calon' ? 'selected' : '' }}
                            >
                                Calon
                            </option>

                            <option
                                value="proposal_dikirim"
                                {{ old('status') === 'proposal_dikirim' ? 'selected' : '' }}
                            >
                                Proposal Dikirim
                            </option>

                            <option
                                value="negosiasi"
                                {{ old('status') === 'negosiasi' ? 'selected' : '' }}
                            >
                                Negosiasi
                            </option>

                            <option
                                value="disetujui"
                                {{ old('status') === 'disetujui' ? 'selected' : '' }}
                            >
                                Disetujui
                            </option>

                            <option
                                value="ditolak"
                                {{ old('status') === 'ditolak' ? 'selected' : '' }}
                            >
                                Ditolak
                            </option>

                            <option
                                value="selesai"
                                {{ old('status') === 'selesai' ? 'selected' : '' }}
                            >
                                Selesai
                            </option>

                        </select>

                    </div>


                    {{-- Keterangan --}}
                    <div class="md:col-span-2">

                        <label
                            for="keterangan"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Keterangan
                        </label>

                        <textarea
                            id="keterangan"
                            name="keterangan"
                            rows="4"
                            placeholder="Catatan tambahan mengenai kerja sama sponsor..."
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >{{ old('keterangan') }}</textarea>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 BUTTON
            ====================================================== --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('eo.sponsorship.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-green-700"
                >
                    Simpan Sponsor
                </button>

            </div>

        </form>

    </div>

</x-layouts.eo>

