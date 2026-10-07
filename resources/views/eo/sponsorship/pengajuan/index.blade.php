<x-layouts.eo :user="$user" title="Pengajuan Sponsor">

    <div class="space-y-6">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-emerald-600">
                    EO Sponsorship
                </p>

                <h1 class="mt-1 text-2xl font-bold text-gray-900">
                    Pengajuan Sponsor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola dan proses pengajuan sponsorship dari sponsor.
                </p>
            </div>

            <div class="rounded-xl bg-emerald-50 px-4 py-3">
                <p class="text-xs font-medium text-emerald-600">
                    Total Pengajuan
                </p>

                <p class="mt-1 text-xl font-bold text-emerald-700">
                    {{ $pengajuans->count() }}
                </p>
            </div>
        </div>


        @if(session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif


        @if($pengajuans->count())
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">

                        <thead class="border-b border-gray-200 bg-gray-50">
                            <tr>
                                <th class="px-5 py-4 text-left font-semibold text-gray-600">
                                    Sponsor
                                </th>

                                <th class="px-5 py-4 text-left font-semibold text-gray-600">
                                    Event
                                </th>

                                <th class="px-5 py-4 text-left font-semibold text-gray-600">
                                    Paket
                                </th>

                                <th class="px-5 py-4 text-left font-semibold text-gray-600">
                                    Nominal
                                </th>

                                <th class="px-5 py-4 text-left font-semibold text-gray-600">
                                    Status
                                </th>

                                <th class="px-5 py-4 text-right font-semibold text-gray-600">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach($pengajuans as $pengajuan)

                                @php
                                    $statusClass = match($pengajuan->status) {
                                        'menunggu' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                        'ditinjau' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'negosiasi' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'disetujui' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'ditolak' => 'bg-red-50 text-red-700 border-red-200',
                                        'selesai' => 'bg-gray-100 text-gray-700 border-gray-200',
                                        default => 'bg-gray-100 text-gray-600 border-gray-200',
                                    };

                                    $statusLabel = match($pengajuan->status) {
                                        'menunggu' => 'Menunggu',
                                        'ditinjau' => 'Ditinjau',
                                        'negosiasi' => 'Negosiasi',
                                        'disetujui' => 'Disetujui',
                                        'ditolak' => 'Ditolak',
                                        'selesai' => 'Selesai',
                                        default => ucfirst($pengajuan->status ?? '-'),
                                    };
                                @endphp

                                <tr class="transition hover:bg-gray-50">

                                    <td class="px-5 py-4">
                                        <div class="font-semibold text-gray-900">
                                            {{ $pengajuan->sponsor?->nama_perusahaan ?? 'Sponsor' }}
                                        </div>

                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $pengajuan->sponsor?->email ?? '-' }}
                                        </div>
                                    </td>


                                    <td class="px-5 py-4">
                                        <div class="font-medium text-gray-800">
                                            {{ $pengajuan->paket?->event?->nama_event ?? '-' }}
                                        </div>
                                    </td>


                                    <td class="px-5 py-4">
                                        <div class="font-medium text-gray-800">
                                            {{ $pengajuan->paket?->nama_paket ?? '-' }}
                                        </div>
                                    </td>


                                    <td class="px-5 py-4">
                                        <span class="font-semibold text-emerald-600">
                                            Rp {{ number_format((float) $pengajuan->nominal_pengajuan, 0, ',', '.') }}
                                        </span>
                                    </td>


                                    <td class="px-5 py-4">
                                        <span class="inline-flex rounded-full border px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>
                                    </td>


                                    <td class="px-5 py-4">
                                        <div class="flex flex-wrap justify-end gap-2">

                                            <a href="{{ route('eo.sponsorship.pengajuan.show', $pengajuan) }}"
                                               class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                                Detail
                                            </a>

                                            <a href="{{ route('eo.sponsorship.negosiasi.index', $pengajuan) }}"
                                               class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 hover:bg-blue-100">
                                                Negosiasi
                                            </a>

                                            @if(in_array($pengajuan->status, ['disetujui', 'selesai']))
                                                <a href="{{ route('eo.sponsorship.dukungan.index') }}"
                                                   class="rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-100">
                                                    Dukungan
                                                </a>
                                            @endif

                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

        @else

            <div class="rounded-2xl border border-dashed border-gray-300 bg-white px-6 py-14 text-center shadow-sm">

                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-lg font-bold text-emerald-600">
                    SP
                </div>

                <h2 class="mt-4 text-lg font-bold text-gray-900">
                    Belum Ada Pengajuan Sponsor
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-gray-500">
                    Pengajuan dari sponsor akan muncul di halaman ini setelah sponsor memilih paket sponsorship dan mengirimkan pengajuan.
                </p>

                <a href="{{ route('eo.sponsorship.paket.index') }}"
                   class="mt-5 inline-flex rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
                    Kelola Paket Sponsorship
                </a>

            </div>

        @endif

    </div>

</x-layouts.eo>