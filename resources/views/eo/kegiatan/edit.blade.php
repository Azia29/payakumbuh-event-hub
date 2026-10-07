```blade
<x-layouts.eo :user="$user" title="Edit Kegiatan">

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- HEADER --}}
        <div>
            <div class="mb-2">
                <a
                    href="{{ route('eo.kegiatan.index') }}"
                    class="text-sm font-medium text-green-600 hover:text-green-700"
                >
                    â† Kembali ke Kegiatan
                </a>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Edit Kegiatan
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi kegiatan event.
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
                    Informasi Kegiatan
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Perbarui data kegiatan sesuai kebutuhan.
                </p>

            </div>

            <form
                action="{{ route('eo.kegiatan.update', $kegiatan) }}"
                method="POST"
                class="space-y-6 p-6"
            >

                @csrf
                @method('PUT')

                {{-- EVENT --}}
                <div>

                    <label
                        for="event_id"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Event
                    </label>

                    <select
                        id="event_id"
                        name="event_id"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Event --
                        </option>

                        @foreach($events as $event)

                            <option
                                value="{{ $event->id }}"
                                {{ old('event_id', $kegiatan->event_id) == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- NAMA KEGIATAN --}}
                <div>

                    <label
                        for="nama_kegiatan"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Nama Kegiatan
                    </label>

                    <input
                        type="text"
                        id="nama_kegiatan"
                        name="nama_kegiatan"
                        value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                        placeholder="Contoh: Pembukaan Acara"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                {{-- DESKRIPSI --}}
                <div>

                    <label
                        for="deskripsi"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                        placeholder="Jelaskan kegiatan..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>

                </div>

                {{-- TANGGAL --}}
                <div>

                    <label
                        for="tanggal"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Tanggal
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', $kegiatan->tanggal) }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                {{-- WAKTU --}}
                <div class="grid gap-6 md:grid-cols-2">

                    <div>

                        <label
                            for="waktu_mulai"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Waktu Mulai
                        </label>

                        <input
                            type="time"
                            id="waktu_mulai"
                            name="waktu_mulai"
                            value="{{ old('waktu_mulai', $kegiatan->waktu_mulai) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                    <div>

                        <label
                            for="waktu_selesai"
                            class="mb-2 block text-sm font-semibold text-gray-700"
                        >
                            Waktu Selesai
                        </label>

                        <input
                            type="time"
                            id="waktu_selesai"
                            name="waktu_selesai"
                            value="{{ old('waktu_selesai', $kegiatan->waktu_selesai) }}"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>

                {{-- LOKASI --}}
                <div>

                    <label
                        for="lokasi"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Lokasi
                    </label>

                    <input
                        type="text"
                        id="lokasi"
                        name="lokasi"
                        value="{{ old('lokasi', $kegiatan->lokasi) }}"
                        placeholder="Contoh: Lapangan Utama"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                {{-- PENANGGUNG JAWAB --}}
                <div>

                    <label
                        for="penanggung_jawab"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Penanggung Jawab
                    </label>

                    <input
                        type="text"
                        id="penanggung_jawab"
                        name="penanggung_jawab"
                        value="{{ old('penanggung_jawab', $kegiatan->penanggung_jawab) }}"
                        placeholder="Contoh: Ketua Divisi Acara"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                </div>

                {{-- STATUS --}}
                <div>

                    <label
                        for="status"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >

                        <option
                            value="direncanakan"
                            {{ old('status', $kegiatan->status) === 'direncanakan' ? 'selected' : '' }}
                        >
                            Direncanakan
                        </option>

                        <option
                            value="berlangsung"
                            {{ old('status', $kegiatan->status) === 'berlangsung' ? 'selected' : '' }}
                        >
                            Berlangsung
                        </option>

                        <option
                            value="selesai"
                            {{ old('status', $kegiatan->status) === 'selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                        <option
                            value="dibatalkan"
                            {{ old('status', $kegiatan->status) === 'dibatalkan' ? 'selected' : '' }}
                        >
                            Dibatalkan
                        </option>

                    </select>

                </div>

                {{-- TOMBOL --}}
                <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('eo.kegiatan.index') }}"
                        class="rounded-lg border border-gray-300 px-5 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form
```
