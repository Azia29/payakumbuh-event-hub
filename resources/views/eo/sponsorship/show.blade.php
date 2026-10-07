<x-layouts.eo :user="$user" title="Detail Sponsor">

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- Header --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <a
                    href="{{ route('eo.sponsorship.index') }}"
                    class="text-sm font-medium text-green-600 hover:text-green-700"
                >
                    â† Kembali ke Kelola Sponsor
                </a>

                <h1 class="mt-3 text-2xl font-bold text-gray-800">
                    Detail Sponsor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Informasi lengkap sponsor dan kerja sama event.
                </p>
            </div>

            <a
                href="{{ route('eo.sponsorship.edit', $sponsor) }}"
                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700"
            >
                âœï¸ Edit Sponsor
            </a>

        </div>


        {{-- Informasi Sponsor --}}
        <div class="rounded-xl border border-gray-100 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-6 py-5">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Sponsor
                </h2>

            </div>

            <div class="grid gap-6 p-6 md:grid-cols-2">

                <div>
                    <p class="text-sm text-gray-500">
                        Nama Perusahaan / Sponsor
                    </p>

                    <p class="mt-1 font-semibold text-gray-800">
                        {{ $sponsor->nama_perusahaan }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Nama Kontak
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $sponsor->nama_kontak ?: '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Nomor Telepon
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $sponsor->telepon ?: '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Email
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $sponsor->email ?: '-' }}
                    </p>
                </div>


                <div class="md:col-span-2">

                    <p class="text-sm text-gray-500">
                        Alamat
                    </p>

                    <p class="mt-1 whitespace-pre-line text-gray-800">
                        {{ $sponsor->alamat ?: '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Informasi Event --}}
        <div class="rounded-xl border border-gray-100 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-6 py-5">

                <h2 class="text-lg font-semibold text-gray-800">
                    Event
                </h2>

            </div>

            <div class="p-6">

                @if ($sponsor->event)

                    <p class="font-semibold text-gray-800">
                        {{ $sponsor->event->nama_event }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500">
                        {{ $sponsor->event->lokasi_event ?: 'Lokasi belum ditentukan' }}
                    </p>

                    @if ($sponsor->event->tgl_mulai)

                        <p class="mt-1 text-sm text-gray-500">
                            Mulai:
                            {{ \Carbon\Carbon::parse($sponsor->event->tgl_mulai)->format('d M Y') }}
                        </p>

                    @endif

                @else

                    <p class="text-sm text-gray-400">
                        Sponsor belum dikaitkan dengan event.
                    </p>

                @endif

            </div>

        </div>


        {{-- Informasi Dukungan --}}
        <div class="rounded-xl border border-gray-100 bg-white shadow-sm">

            <div class="border-b border-gray-100 px-6 py-5">

                <h2 class="text-lg font-semibold text-gray-800">
                    Informasi Dukungan
                </h2>

            </div>

            <div class="grid gap-6 p-6 md:grid-cols-3">

                <div>
                    <p class="text-sm text-gray-500">
                        Jenis Dukungan
                    </p>

                    <p class="mt-1 font-medium text-gray-800">
                        {{ $sponsor->jenis_dukungan ?: '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Nominal Dukungan
                    </p>

                    <p class="mt-1 font-semibold text-green-600">
                        @if ($sponsor->nominal_dukungan)
                            Rp {{ number_format($sponsor->nominal_dukungan, 0, ',', '.') }}
                        @else
                            -
                        @endif
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Status
                    </p>

                    @php
                        $statusClass = match ($sponsor->status) {
                            'calon' => 'bg-gray-100 text-gray-700',
                            'proposal_dikirim' => 'bg-blue-100 text-blue-700',
                            'negosiasi' => 'bg-yellow-100 text-yellow-700',
                            'disetujui' => 'bg-green-100 text-green-700',
                            'ditolak' => 'bg-red-100 text-red-700',
                            'selesai' => 'bg-purple-100 text-purple-700',
                            default => 'bg-gray-100 text-gray-700',
                        };

                        $statusLabel = match ($sponsor->status) {
                            'proposal_dikirim' => 'Proposal Dikirim',
                            default => ucfirst(str_replace('_', ' ', $sponsor->status)),
                        };
                    @endphp

                    <span class="mt-2 inline-flex rounded-full px-3 py-1 text-xs font-medium {{ $statusClass }}">
                        {{ $statusLabel }}
                    </span>

                </div>

                <div class="md:col-span-3">

                    <p class="text-sm text-gray-500">
                        Keterangan
                    </p>

                    <p class="mt-1 whitespace-pre-line text-gray-800">
                        {{ $sponsor->keterangan ?: '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Tombol Kembali --}}
        <div class="flex justify-end">

            <a
                href="{{ route('eo.sponsorship.index') }}"
                class="rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Kembali
            </a>

        </div>

    </div>

</x-layouts.eo>

