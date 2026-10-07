<x-layouts.eo :user="$user" title="Kelola Event">

    <div class="space-y-6">

        {{-- HEADER --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Kelola Event
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola seluruh data event yang dibuat oleh Event Organizer.
                </p>
            </div>

            <a
                href="{{ route('eo.events.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white hover:bg-green-700"
            >
                + Tambah Event
            </a>
        </div>

        {{-- PESAN SUKSES --}}
        @if(session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABEL EVENT --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">

            <div class="border-b border-gray-200 px-6 py-4">
                <h2 class="font-semibold text-gray-800">
                    Daftar Event
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Semua event yang tersedia di sistem.
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-gray-50">
                        <tr class="border-b border-gray-200">

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                No
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Nama Event
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Lokasi
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Mulai
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Selesai
                            </th>

                            <th class="px-6 py-4 text-left font-semibold text-gray-600">
                                Status
                            </th>

                            <th class="px-6 py-4 text-center font-semibold text-gray-600">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($events as $event)

                            <tr class="hover:bg-gray-50">

                                {{-- NO --}}
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- NAMA --}}
                                <td class="px-6 py-4">

                                    <div class="font-semibold text-gray-800">
                                        {{ $event->nama_event }}
                                    </div>

                                    @if($event->deskripsi_event)
                                        <div class="mt-1 max-w-xs truncate text-xs text-gray-500">
                                            {{ $event->deskripsi_event }}
                                        </div>
                                    @endif

                                </td>

                                {{-- LOKASI --}}
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                    {{ $event->lokasi_event ?? '-' }}
                                </td>

                                {{-- MULAI --}}
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                    {{ $event->tgl_mulai
                                        ? \Carbon\Carbon::parse($event->tgl_mulai)->format('d/m/Y')
                                        : '-' }}
                                </td>

                                {{-- SELESAI --}}
                                <td class="whitespace-nowrap px-6 py-4 text-gray-600">
                                    {{ $event->tgl_selesai
                                        ? \Carbon\Carbon::parse($event->tgl_selesai)->format('d/m/Y')
                                        : '-' }}
                                </td>

                                {{-- STATUS --}}
                                <td class="whitespace-nowrap px-6 py-4">

                                    @php
                                        $status = strtolower($event->status ?? 'belum ada');

                                        $statusClass = match ($status) {
                                            'aktif', 'disetujui', 'berlangsung'
                                                => 'bg-green-100 text-green-700',

                                            'selesai'
                                                => 'bg-blue-100 text-blue-700',

                                            'ditolak', 'dibatalkan'
                                                => 'bg-red-100 text-red-700',

                                            'pending', 'menunggu'
                                                => 'bg-yellow-100 text-yellow-700',

                                            default
                                                => 'bg-gray-100 text-gray-600',
                                        };
                                    @endphp

                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                                        {{ ucfirst($event->status ?? 'Belum Ada') }}
                                    </span>

                                </td>

                                {{-- AKSI --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('eo.events.edit', $event) }}"
                                            class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 hover:bg-blue-100"
                                        >
                                            Edit
                                        </a>

                                        {{-- HAPUS --}}
                                        <form
                                            action="{{ route('eo.events.destroy', $event) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus event ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100"
                                            >
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td
                                    colspan="7"
                                    class="px-6 py-12 text-center"
                                >
                                    <div class="text-gray-400">
                                        Belum ada data event.
                                    </div>

                                    <a
                                        href="{{ route('eo.events.create') }}"
                                        class="mt-3 inline-block text-sm font-semibold text-green-600 hover:text-green-700"
                                    >
                                        + Tambahkan event pertama
                                    </a>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-layouts.eo>
