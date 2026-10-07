<x-layouts.eo :user="$user" title="Tambah Event">

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- HEADER --}}
        <div>
            <div class="mb-2">
                <a
                    href="{{ route('eo.events.index') }}"
                    class="text-sm font-medium text-green-600 hover:text-green-700"
                >
                    â† Kembali ke Kelola Event
                </a>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Tambah Event
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Masukkan informasi event yang akan diselenggarakan.
            </p>
        </div>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 p-4">
                <p class="mb-2 font-semibold text-red-700">
                    Terdapat kesalahan:
                </p>

                <ul class="list-disc space-y-1 pl-5 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <div class="rounded-xl border border-gray-200 bg-white">

            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="font-semibold text-gray-800">
                    Informasi Event
                </h2>
            </div>

            <form
                action="{{ route('eo.events.store') }}"
                method="POST"
                class="space-y-6 p-6"
            >

                @csrf

                {{-- NAMA EVENT --}}
                <div>
                    <label
                        for="nama_event"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Nama Event
                    </label>

                    <input
                        type="text"
                        id="nama_event"
                        name="nama_event"
                        value="{{ old('nama_event') }}"
                        placeholder="Contoh: Festival Seni Payakumbuh"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >
                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <label
                        for="deskripsi_event"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Deskripsi Event
                    </label>

                    <textarea
                        id="deskripsi_event"
                        name="deskripsi_event"
                        rows="5"
                        placeholder="Jelaskan mengenai event yang akan diselenggarakan..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >{{ old('deskripsi_event') }}</textarea>
                </div>

                {{-- TANGGAL --}}
                <div class="grid gap-6 md:grid-cols-2">

                    <div>
                        <label
                            for="tgl_mulai"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            id="tgl_mulai"
                            name="tgl_mulai"
                            value="{{ old('tgl_mulai') }}"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >
                    </div>

                    <div>
                        <label
                            for="tgl_selesai"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            id="tgl_selesai"
                            name="tgl_selesai"
                            value="{{ old('tgl_selesai') }}"
                            required
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >
                    </div>

                </div>

                {{-- LOKASI --}}
                <div>
                    <label
                        for="lokasi_event"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Lokasi Event
                    </label>

                    <input
                        type="text"
                        id="lokasi_event"
                        name="lokasi_event"
                        value="{{ old('lokasi_event') }}"
                        placeholder="Contoh: Lapangan Khatib Sulaiman"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >
                </div>

                {{-- STATUS --}}
                <div>
                    <label
                        for="status"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Status Event
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Status --
                        </option>

                        <option
                            value="pending"
                            {{ old('status') === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="disetujui"
                            {{ old('status') === 'disetujui' ? 'selected' : '' }}
                        >
                            Disetujui
                        </option>

                        <option
                            value="aktif"
                            {{ old('status') === 'aktif' ? 'selected' : '' }}
                        >
                            Aktif
                        </option>

                        <option
                            value="berlangsung"
                            {{ old('status') === 'berlangsung' ? 'selected' : '' }}
                        >
                            Berlangsung
                        </option>

                        <option
                            value="selesai"
                            {{ old('status') === 'selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                        <option
                            value="dibatalkan"
                            {{ old('status') === 'dibatalkan' ? 'selected' : '' }}
                        >
                            Dibatalkan
                        </option>

                    </select>
                </div>

                {{-- BUTTON --}}
                <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('eo.events.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
                    >
                        Simpan Event
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.eo>