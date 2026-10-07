<x-layouts.eo :user="$user" title="Negosiasi Sponsor">

    <div class="space-y-6">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-emerald-600">
                    EO Sponsorship
                </p>

                <h1 class="mt-1 text-2xl font-bold text-gray-900">
                    Negosiasi Sponsor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola komunikasi dan penawaran dengan sponsor.
                </p>
            </div>

            <a href="{{ route('eo.sponsorship.pengajuan.show', $pengajuanSponsor) }}"
               class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                Kembali ke Pengajuan
            </a>
        </div>


        @if(session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif


        @if($errors->any())
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <ul class="list-disc space-y-1 pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="grid gap-6 lg:grid-cols-3">

            {{-- Informasi Pengajuan --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <div class="flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-sm font-bold text-emerald-600">
                        SP
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                            Sponsor
                        </p>

                        <h2 class="font-bold text-gray-900">
                            {{ $pengajuanSponsor->sponsor?->nama_perusahaan ?? '-' }}
                        </h2>
                    </div>
                </div>


                <div class="mt-6 space-y-5">

                    <div>
                        <p class="text-xs uppercase text-gray-400">
                            Event
                        </p>

                        <p class="mt-1 font-semibold text-gray-800">
                            {{ $pengajuanSponsor->paket?->event?->nama_event ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase text-gray-400">
                            Paket
                        </p>

                        <p class="mt-1 font-semibold text-gray-800">
                            {{ $pengajuanSponsor->paket?->nama_paket ?? '-' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase text-gray-400">
                            Nominal Pengajuan
                        </p>

                        <p class="mt-1 text-lg font-bold text-emerald-600">
                            Rp {{ number_format((float) $pengajuanSponsor->nominal_pengajuan, 0, ',', '.') }}
                        </p>
                    </div>


                    <div>
                        <p class="text-xs uppercase text-gray-400">
                            Status
                        </p>

                        @php
                            $statusClass = match($pengajuanSponsor->status) {
                                'menunggu' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                'ditinjau' => 'bg-blue-50 text-blue-700 border-blue-200',
                                'negosiasi' => 'bg-purple-50 text-purple-700 border-purple-200',
                                'disetujui' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'ditolak' => 'bg-red-50 text-red-700 border-red-200',
                                'selesai' => 'bg-gray-100 text-gray-700 border-gray-200',
                                default => 'bg-gray-100 text-gray-600 border-gray-200',
                            };

                            $statusLabel = match($pengajuanSponsor->status) {
                                'menunggu' => 'Menunggu',
                                'ditinjau' => 'Ditinjau',
                                'negosiasi' => 'Negosiasi',
                                'disetujui' => 'Disetujui',
                                'ditolak' => 'Ditolak',
                                'selesai' => 'Selesai',
                                default => ucfirst($pengajuanSponsor->status ?? '-'),
                            };
                        @endphp

                        <span class="mt-2 inline-flex rounded-full border px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                            {{ $statusLabel }}
                        </span>
                    </div>

                </div>

            </div>


            {{-- Riwayat Negosiasi --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-2">

                <div class="flex items-center justify-between border-b border-gray-100 pb-4">

                    <div>
                        <h2 class="font-bold text-gray-900">
                            Riwayat Negosiasi
                        </h2>

                        <p class="mt-1 text-xs text-gray-500">
                            Percakapan antara EO dan sponsor.
                        </p>
                    </div>

                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                        {{ $pengajuanSponsor->negosiasi->count() }} Pesan
                    </span>

                </div>


                <div class="mt-5 max-h-[520px] space-y-4 overflow-y-auto pr-1">

                    @forelse($pengajuanSponsor->negosiasi as $negosiasi)

                        @php
                            $isEo = $negosiasi->pengirim === 'eo';
                        @endphp

                        <div class="flex {{ $isEo ? 'justify-end' : 'justify-start' }}">

                            <div class="max-w-[85%]">

                                <div class="mb-1 flex items-center gap-2 {{ $isEo ? 'justify-end' : '' }}">

                                    <span class="text-xs font-semibold text-gray-700">
                                        {{ $isEo ? 'EO' : 'Sponsor' }}
                                    </span>

                                    <span class="text-[11px] text-gray-400">
                                        {{ $negosiasi->created_at?->format('d M Y, H:i') }}
                                    </span>

                                </div>


                                <div class="rounded-2xl border px-4 py-3
                                    {{ $isEo
                                        ? 'border-emerald-200 bg-emerald-50'
                                        : 'border-gray-200 bg-gray-50' }}">

                                    <p class="whitespace-pre-line text-sm leading-6 text-gray-700">
                                        {{ $negosiasi->pesan }}
                                    </p>


                                    @if($negosiasi->nominal_tawaran !== null)

                                        <div class="mt-3 border-t border-gray-200/70 pt-3">

                                            <p class="text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                                                Nominal Tawaran
                                            </p>

                                            <p class="mt-1 font-bold {{ $isEo ? 'text-emerald-700' : 'text-gray-800' }}">
                                                Rp {{ number_format((float) $negosiasi->nominal_tawaran, 0, ',', '.') }}
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center">

                            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-white font-bold text-emerald-600 shadow-sm">
                                NG
                            </div>

                            <h3 class="mt-4 font-semibold text-gray-900">
                                Belum Ada Negosiasi
                            </h3>

                            <p class="mt-1 text-sm text-gray-500">
                                Belum ada percakapan antara EO dan sponsor.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- Form Balasan EO --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

            <div class="mb-5">
                <h2 class="font-bold text-gray-900">
                    Kirim Pesan EO
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Kirim tanggapan atau tawaran baru kepada sponsor.
                </p>
            </div>


            <form action="{{ route('eo.sponsorship.negosiasi.store', $pengajuanSponsor) }}"
                  method="POST">

                @csrf

                <div class="grid gap-5 lg:grid-cols-3">

                    <div class="lg:col-span-2">

                        <label class="text-sm font-semibold text-gray-700">
                            Pesan
                        </label>

                        <textarea name="pesan"
                                  rows="5"
                                  required
                                  placeholder="Tuliskan pesan atau hasil negosiasi..."
                                  class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">{{ old('pesan') }}</textarea>

                    </div>


                    <div>

                        <label class="text-sm font-semibold text-gray-700">
                            Nominal Tawaran
                        </label>

                        <div class="mt-2">

                            <input type="number"
                                   name="nominal_tawaran"
                                   min="0"
                                   step="0.01"
                                   value="{{ old('nominal_tawaran') }}"
                                   placeholder="Contoh: 5000000"
                                   class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100">

                        </div>

                        <p class="mt-2 text-xs leading-5 text-gray-500">
                            Kosongkan jika pesan tidak menyertakan perubahan nominal.
                        </p>


                        <button type="submit"
                                class="mt-5 w-full rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700">
                            Kirim Negosiasi
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</x-layouts.eo>