<x-layouts.eo :user="$user" title="Edit Sponsor">

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
                Edit Sponsor
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi sponsor dan kerja sama event.
            </p>

        </div>


        {{-- Error --}}
        @if ($errors->any())

            <div class="rounded-xl border border-red-200 bg-red-50 p-4">

                <p class="font-semibold text-red-700">
                    Terdapat kesalahan:
                </p>

                <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Form --}}
        <form
            action="{{ route('eo.sponsorship.update', $sponsor) }}"
            method="POST"
            class="space-y-6"
        >

            @csrf
            @method('PUT')


            {{-- Event --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Event
                </h2>

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
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Tidak dikaitkan dengan event --
                        </option>

                        @foreach ($events as $event)

                            <option
                                value="{{ $event->id }}"
                                {{ old('event_id', $sponsor->event_id) == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- Informasi Sponsor --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Sponsor
                </h2>

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
                            value="{{ old('nama_perusahaan', $sponsor->nama_perusahaan) }}"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    {{-- Kontak --}}
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
                            value="{{ old('nama_kontak', $sponsor->nama_kontak) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
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
                            value="{{ old('telepon', $sponsor->telepon) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
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
                            value="{{ old('email', $sponsor->email) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

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
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >{{ old('alamat', $sponsor->alamat) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- Dukungan --}}
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Dukungan
                </h2>

                <div class="mt-5 grid gap-5 md:grid-cols-2">

                    {{-- Jenis --}}
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
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                            <option value="">
                                -- Pilih Jenis Dukungan --
                            </option>

                            @foreach ([
                                'Dana',
                                'Barang',
                                'Jasa',
                                'Media Partner',
                                'Lainnya'
                            ] as $jenis)

                                <option
                                    value="{{ $jenis }}"
                                    {{ old('jenis_dukungan', $sponsor->jenis_dukungan) === $jenis ? 'selected' : '' }}
                                >
                                    {{ $jenis }}
                                </option>

                            @endforeach

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
                                value="{{ old('nominal_dukungan', $sponsor->nominal_dukungan) }}"
                                min="0"
                                step="0.01"
                                class="w-full rounded-r-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                            >

                        </div>

                    </div>


                    {{-- Status --}}
                    <div>

                        <label
                            for="status"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Status
                            <span class="text-red-500">*</span>
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                            @foreach ([
                                'calon' => 'Calon',
                                'proposal_dikirim' => 'Proposal Dikirim',
                                'negosiasi' => 'Negosiasi',
                                'disetujui' => 'Disetujui',
                                'ditolak' => 'Ditolak',
                                'selesai' => 'Selesai'
                            ] as $value => $label)

                                <option
                                    value="{{ $value }}"
                                    {{ old('status', $sponsor->status) === $value ? 'selected' : '' }}
                                >
                                    {{ $label }}
                                </option>

                            @endforeach

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
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >{{ old('keterangan', $sponsor->keterangan) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- Tombol --}}
            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('eo.sponsorship.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-green-600 px-5 py-3 text-sm font-medium text-white hover:bg-green-700"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</x-layouts.eo>

