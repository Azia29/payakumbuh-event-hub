```blade
<x-layouts.eo :user="$user" title="Edit Jadwal">

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- HEADER --}}
        <div>
            <div class="mb-2">
                <a
                    href="{{ route('eo.jadwal.index') }}"
                    class="text-sm font-medium text-green-600 hover:text-green-700"
                >
                    â† Kembali ke Jadwal
                </a>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Edit Jadwal
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Perbarui informasi jadwal event.
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
                    Informasi Jadwal
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Perbarui data sesuai kebutuhan.
                </p>
            </div>

            <form
                action="{{ route('eo.jadwal.update', $jadwal) }}"
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
                                {{ old('event_id', $jadwal->event_id) == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- NAMA JADWAL --}}
                <div>
                    <label
                        for="nama_jadwal"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Nama Jadwal
                    </label>

                    <input
                        type="text"
                        id="nama_jadwal"
                        name="nama_jadwal"
                        value="{{ old('nama_jadwal', $jadwal->nama_jadwal) }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >
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
                        value="{{ old('tanggal', $jadwal->tanggal) }}"
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
                            value="{{ old('waktu_mulai', $jadwal->waktu_mulai) }}"
                            required
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
                            value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}"
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
                        value="{{ old('lokasi', $jadwal->lokasi) }}"
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
                        value="{{ old('penanggung_jawab', $jadwal->penanggung_jawab) }}"
                        placeholder="Contoh: Ketua Divisi Acara"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >
                </div>

                {{-- KETERANGAN --}}
                <div>
                    <label
                        for="keterangan"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Keterangan
                    </label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        rows="4"
                        placeholder="Tambahkan keterangan jadwal..."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none focus:border-green-500 focus:ring-2 focus:ring-green-100"
                    >{{ old('keterangan', $jadwal->keterangan) }}</textarea>
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
                            value="terjadwal"
                            {{ old('status', $jadwal->status) === 'terjadwal' ? 'selected' : '' }}
                        >
                            Terjadwal
                        </option>

                        <option
                            value="berlangsung"
                            {{ old('status', $jadwal->status) === 'berlangsung' ? 'selected' : '' }}
                        >
                            Berlangsung
                        </option>

                        <option
                            value="selesai"
                            {{ old('status', $jadwal->status) === 'selesai' ? 'selected' : '' }}
                        >
                            Selesai
                        </option>

                        <option
                            value="dibatalkan"
                            {{ old('status', $jadwal->status) === 'dibatalkan' ? 'selected' : '' }}
                        >
                            Dibatalkan
                        </option>

                    </select>
                </div>

                {{-- TOMBOL --}}
                <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('eo.jadwal.index') }}"
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

            </form>

        </div>

    </div>

</x-layouts.eo>

