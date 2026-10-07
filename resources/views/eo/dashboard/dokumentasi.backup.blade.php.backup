<x-layouts.eo
    :user="$user"
    title="Dashboard Dokumentasi"
>

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Dokumentasi
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Memantau event dan kegiatan yang membutuhkan dokumentasi.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

        <div class="rounded-xl bg-white p-5 border shadow-sm">

            <p class="text-sm text-gray-500">
                Total Event
            </p>

            <p class="mt-2 text-3xl font-bold">
                {{ $totalEvent }}
            </p>

        </div>


        <div class="rounded-xl bg-white p-5 border shadow-sm">

            <p class="text-sm text-gray-500">
                Event Aktif
            </p>

            <p class="mt-2 text-3xl font-bold">
                {{ $eventAktif }}
            </p>

        </div>


        <div class="rounded-xl bg-white p-5 border shadow-sm">

            <p class="text-sm text-gray-500">
                Event Mendatang
            </p>

            <p class="mt-2 text-3xl font-bold">
                {{ $eventMendatang->count() }}
            </p>

        </div>

    </div>


    {{-- EVENT YANG AKAN DIDOKUMENTASIKAN --}}

    <div class="mt-6 rounded-xl bg-white border shadow-sm">

        <div class="border-b px-6 py-4">

            <h2 class="font-semibold text-gray-800">
                Event Mendatang
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Event yang perlu dipersiapkan dokumentasinya.
            </p>

        </div>


        <div class="divide-y">

            @forelse($eventMendatang as $event)

                <div class="px-6 py-5">

                    <div class="flex flex-col justify-between gap-3 md:flex-row">

                        <div>

                            <h3 class="font-semibold text-gray-800">
                                {{ $event->nama_event }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                            </p>

                        </div>


                        <div class="text-sm text-gray-500">

                            {{ $event->tgl_mulai
                                ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y')
                                : '-'
                            }}

                        </div>

                    </div>

                </div>

            @empty

                <div class="px-6 py-8 text-center text-gray-500">
                    Belum ada event mendatang.
                </div>

            @endforelse

        </div>

    </div>


    {{-- KEGIATAN YANG PERLU DIDOKUMENTASIKAN --}}

    <div class="mt-6 rounded-xl bg-white border shadow-sm">

        <div class="border-b px-6 py-4">

            <h2 class="font-semibold text-gray-800">
                Kegiatan Mendatang
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Kegiatan yang perlu dipersiapkan dokumentasinya.
            </p>

        </div>


        <div class="divide-y">

            @forelse($kegiatanMendatang as $kegiatan)

                <div class="px-6 py-5">

                    <h3 class="font-semibold text-gray-800">
                        {{ $kegiatan->nama_kegiatan }}
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Event:
                        {{ $kegiatan->event?->nama_event ?? '-' }}
                    </p>

                    <p class="mt-1 text-sm text-gray-500">

                        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}

                        @if($kegiatan->waktu_mulai)
                            Â· {{ $kegiatan->waktu_mulai }}
                        @endif

                        @if($kegiatan->lokasi)
                            Â· {{ $kegiatan->lokasi }}
                        @endif

                    </p>

                </div>

            @empty

                <div class="px-6 py-8 text-center text-gray-500">
                    Belum ada kegiatan mendatang.
                </div>

            @endforelse

        </div>

    </div>


    {{-- TUGAS DOKUMENTASI --}}

    <div class="mt-6 rounded-xl bg-white border shadow-sm p-6">

        <h2 class="font-semibold text-gray-800">
            Fokus Divisi Dokumentasi
        </h2>

        <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-3">

            <div class="rounded-lg bg-gray-50 p-5">

                <div class="text-2xl">
                    ðŸ“·
                </div>

                <h3 class="mt-3 font-semibold">
                    Foto Event
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Mempersiapkan kebutuhan pengambilan foto pada event.
                </p>

            </div>


            <div class="rounded-lg bg-gray-50 p-5">

                <div class="text-2xl">
                    ðŸŽ¥
                </div>

                <h3 class="mt-3 font-semibold">
                    Video Event
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Mempersiapkan kebutuhan dokumentasi video kegiatan.
                </p>

            </div>


            <div class="rounded-lg bg-gray-50 p-5">

                <div class="text-2xl">
                    ðŸ—‚ï¸
                </div>

                <h3 class="mt-3 font-semibold">
                    Arsip Dokumentasi
                </h3>

                <p class="mt-1 text-sm text-gray-500">
                    Menyiapkan dan mengelola arsip dokumentasi event.
                </p>

            </div>

        </div>

    </div>


    <div class="mt-6">

        <a
            href="{{ route('eo.events.index') }}"
            class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white"
        >
            Lihat Event
        </a>

    </div>

</x-layouts.eo>
