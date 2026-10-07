<x-layouts.eo
    :user="$user"
    title="Dashboard Humas"
>

    {{-- HEADER --}}
    <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>
            <p class="text-sm font-medium text-green-600">
                Divisi Humas
            </p>

            <h1 class="mt-1 text-3xl font-bold text-gray-900">
                Dashboard Humas
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Kelola informasi, publikasi, dan komunikasi event.
            </p>
        </div>

        <a
            href="{{ route('eo.events.index') }}"
            class="inline-flex w-fit items-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700"
        >
            Lihat Event
        </a>

    </div>


    {{-- WELCOME --}}
    <div class="mb-6 overflow-hidden rounded-2xl bg-gradient-to-r from-green-700 to-emerald-500 p-6 text-white shadow-lg">

        <p class="text-sm text-green-100">
            Selamat datang kembali
        </p>

        <h2 class="mt-1 text-2xl font-bold">
            {{ $user->name }}
        </h2>

        <p class="mt-2 max-w-xl text-sm text-green-50">
            Pantau event dan siapkan informasi yang akan disampaikan
            kepada masyarakat serta pihak terkait.
        </p>

    </div>


    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">
                Total Event
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $totalEvent }}
            </p>

            <p class="mt-2 text-xs text-gray-400">
                Seluruh event
            </p>
        </div>


        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">
                Event Aktif
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $eventAktif }}
            </p>

            <p class="mt-2 text-xs text-green-600">
                Aktif / berlangsung
            </p>
        </div>


        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">
                Event Mendatang
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $eventMendatang->count() }}
            </p>

            <p class="mt-2 text-xs text-gray-400">
                Perlu dipersiapkan
            </p>
        </div>


        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <p class="text-sm text-gray-500">
                Event Terbaru
            </p>

            <p class="mt-2 text-3xl font-bold text-gray-900">
                {{ $eventTerbaru->count() }}
            </p>

            <p class="mt-2 text-xs text-gray-400">
                Informasi terbaru
            </p>
        </div>

    </div>


    {{-- EVENT MENDATANG --}}
    <div class="mt-6 rounded-2xl border border-gray-100 bg-white shadow-sm">

        <div class="border-b border-gray-100 px-6 py-5">

            <h2 class="text-lg font-bold text-gray-900">
                Event Mendatang
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Event yang perlu dipersiapkan informasinya oleh Humas.
            </p>

        </div>


        <div class="divide-y divide-gray-100">

            @forelse($eventMendatang as $event)

                <div class="flex flex-col gap-4 px-6 py-5 transition hover:bg-gray-50 md:flex-row md:items-center md:justify-between">

                    <div>

                        <h3 class="font-semibold text-gray-900">
                            {{ $event->nama_event }}
                        </h3>

                        <div class="mt-2 flex flex-wrap gap-4 text-sm text-gray-500">

                            <span>
                                Lokasi: {{ $event->lokasi_event ?? '-' }}
                            </span>

                            <span>
                                Tanggal:
                                {{ $event->tgl_mulai
                                    ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d M Y')
                                    : '-'
                                }}
                            </span>

                        </div>

                    </div>

                    <span class="w-fit rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                        Perlu Persiapan
                    </span>

                </div>

            @empty

                <div class="px-6 py-12 text-center">

                    <p class="font-semibold text-gray-700">
                        Belum ada event mendatang
                    </p>

                    <p class="mt-1 text-sm text-gray-500">
                        Event yang akan datang akan muncul di sini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>


    {{-- EVENT TERBARU --}}
    <div class="mt-6 rounded-2xl border border-gray-100 bg-white shadow-sm">

        <div class="border-b border-gray-100 px-6 py-5">

            <h2 class="text-lg font-bold text-gray-900">
                Event Terbaru
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Informasi event terbaru dalam sistem.
            </p>

        </div>


        <div class="divide-y divide-gray-100">

            @forelse($eventTerbaru as $event)

                <div class="flex items-center justify-between px-6 py-4 transition hover:bg-gray-50">

                    <div>
                        <p class="font-semibold text-gray-900">
                            {{ $event->nama_event }}
                        </p>

                        <p class="mt-1 text-sm text-gray-500">
                            {{ $event->lokasi_event ?? 'Lokasi belum ditentukan' }}
                        </p>
                    </div>

                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                        {{ ucfirst($event->status ?? 'Draft') }}
                    </span>

                </div>

            @empty

                <div class="px-6 py-12 text-center text-gray-500">
                    Belum ada event.
                </div>

            @endforelse

        </div>

    </div>


    {{-- FOKUS HUMAS --}}
    <div class="mt-6">

        <div class="mb-4">

            <h2 class="text-lg font-bold text-gray-900">
                Fokus Divisi Humas
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Tugas utama yang dijalankan oleh divisi Humas.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">

            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-2xl">
                    INFO
                </div>

                <h3 class="mt-4 font-bold text-gray-900">
                    Informasi Event
                </h3>

                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Menyiapkan informasi event yang jelas untuk masyarakat.
                </p>

            </div>


            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-2xl">
                    PUB
                </div>

                <h3 class="mt-4 font-bold text-gray-900">
                    Publikasi
                </h3>

                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Menyiapkan kebutuhan publikasi dan promosi event.
                </p>

            </div>


            <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl">
                    KOM
                </div>

                <h3 class="mt-4 font-bold text-gray-900">
                    Komunikasi
                </h3>

                <p class="mt-2 text-sm leading-6 text-gray-500">
                    Mendukung komunikasi dengan masyarakat dan pihak terkait.
                </p>

            </div>

        </div>

    </div>


    {{-- ACTION --}}
    <div class="mt-6 flex justify-end">

        <a
            href="{{ route('eo.laporan') }}"
            class="rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
        >
            Lihat Laporan
        </a>

    </div>

</x-layouts.eo
