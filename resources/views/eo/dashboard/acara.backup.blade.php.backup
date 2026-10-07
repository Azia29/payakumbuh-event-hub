<x-layouts.eo
    :user="$user"
    title="Dashboard Acara"
>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Acara
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Mengatur event, rundown, jadwal, dan kegiatan acara.
        </p>
    </div>


    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-xl bg-white p-5 shadow-sm border">
            <p class="text-sm text-gray-500">Total Event</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalEvent }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 shadow-sm border">
            <p class="text-sm text-gray-500">Event Aktif</p>
            <p class="mt-2 text-3xl font-bold">{{ $eventAktif }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 shadow-sm border">
            <p class="text-sm text-gray-500">Rundown</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalRundown }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 shadow-sm border">
            <p class="text-sm text-gray-500">Jadwal</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalJadwal }}</p>
        </div>

    </div>


    <div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-2">

        {{-- RUNDOWN --}}

        <div class="rounded-xl bg-white shadow-sm border">

            <div class="border-b px-6 py-4">
                <h2 class="font-semibold">
                    Rundown Terdekat
                </h2>
            </div>

            <div class="divide-y">

                @forelse($rundowns as $rundown)

                    <div class="px-6 py-4">

                        <p class="font-semibold">
                            {{ $rundown->nama_rundown }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $rundown->event?->nama_event ?? '-' }}
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            {{ \Carbon\Carbon::parse($rundown->tanggal)->format('d M Y') }}
                            Â·
                            {{ $rundown->waktu_mulai }}
                        </p>

                    </div>

                @empty

                    <p class="p-6 text-sm text-gray-500">
                        Belum ada rundown.
                    </p>

                @endforelse

            </div>

        </div>


        {{-- JADWAL --}}

        <div class="rounded-xl bg-white shadow-sm border">

            <div class="border-b px-6 py-4">
                <h2 class="font-semibold">
                    Jadwal Terdekat
                </h2>
            </div>

            <div class="divide-y">

                @forelse($jadwals as $jadwal)

                    <div class="px-6 py-4">

                        <p class="font-semibold">
                            {{ $jadwal->nama_jadwal }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $jadwal->event?->nama_event ?? '-' }}
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}
                            Â·
                            {{ $jadwal->waktu_mulai }}
                        </p>

                    </div>

                @empty

                    <p class="p-6 text-sm text-gray-500">
                        Belum ada jadwal.
                    </p>

                @endforelse

            </div>

        </div>

    </div>


    <div class="mt-6 rounded-xl bg-white shadow-sm border">

        <div class="border-b px-6 py-4">
            <h2 class="font-semibold">
                Kegiatan Terdekat
            </h2>
        </div>

        <div class="divide-y">

            @forelse($kegiatan as $item)

                <div class="px-6 py-4">

                    <p class="font-semibold">
                        {{ $item->nama_kegiatan }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $item->event?->nama_event ?? '-' }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                        @if($item->waktu_mulai)
                            Â· {{ $item->waktu_mulai }}
                        @endif

                    </p>

                </div>

            @empty

                <p class="p-6 text-sm text-gray-500">
                    Belum ada kegiatan.
                </p>

            @endforelse

        </div>

    </div>


    <div class="mt-6 flex flex-wrap gap-3">

        <a href="{{ route('eo.events.index') }}"
           class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white">
            Kelola Event
        </a>

        <a href="{{ route('eo.rundown.index') }}"
           class="rounded-lg border px-5 py-3 text-sm font-semibold">
            Kelola Rundown
        </a>

        <a href="{{ route('eo.jadwal.index') }}"
           class="rounded-lg border px-5 py-3 text-sm font-semibold">
            Kelola Jadwal
        </a>

        <a href="{{ route('eo.kegiatan.index') }}"
           class="rounded-lg border px-5 py-3 text-sm font-semibold">
            Kelola Kegiatan
        </a>

    </div>

</x-layouts.eo>

