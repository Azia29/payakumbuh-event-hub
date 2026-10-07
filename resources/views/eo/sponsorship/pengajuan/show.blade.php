<x-layouts.eo :user="$user" title="Detail Pengajuan Sponsor">

    <div class="space-y-6">

        <div>
            <p class="text-sm font-semibold text-emerald-600">EO Sponsorship</p>
            <h1 class="mt-1 text-2xl font-bold text-gray-900">
                Detail Pengajuan Sponsor
            </h1>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">

            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-2">

                <h2 class="font-semibold text-gray-900">
                    Informasi Pengajuan
                </h2>

                <div class="mt-6 grid gap-5 sm:grid-cols-2">

                    <div>
                        <p class="text-xs uppercase text-gray-400">Perusahaan</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $pengajuan->sponsor?->nama_perusahaan ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-gray-400">Kontak</p>
                        <p class="mt-1 text-gray-700">
                            {{ $pengajuan->sponsor?->nama_kontak ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-gray-400">Email</p>
                        <p class="mt-1 text-gray-700">
                            {{ $pengajuan->sponsor?->email ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-gray-400">Paket</p>
                        <p class="mt-1 font-semibold text-gray-900">
                            {{ $pengajuan->paket?->nama_paket ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-gray-400">Event</p>
                        <p class="mt-1 text-gray-700">
                            {{ $pengajuan->paket?->event?->nama_event ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-gray-400">Nominal</p>
                        <p class="mt-1 font-semibold text-emerald-600">
                            Rp {{ number_format((float) $pengajuan->nominal_pengajuan, 0, ',', '.') }}
                        </p>
                    </div>

                </div>

                <div class="mt-6 border-t border-gray-100 pt-6">

                    <p class="text-xs uppercase text-gray-400">
                        Pesan Sponsor
                    </p>

                    <p class="mt-2 whitespace-pre-line text-sm leading-6 text-gray-600">
                        {{ $pengajuan->pesan ?: 'Tidak ada pesan.' }}
                    </p>

                </div>

            </div>


            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

                <h2 class="font-semibold text-gray-900">
                    Status Pengajuan
                </h2>

                <form action="{{ route('eo.sponsorship.pengajuan.status', $pengajuan) }}"
                      method="POST"
                      class="mt-5">

                    @csrf
                    @method('PUT')

                    <select name="status"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm">

                        @foreach([
                            'menunggu' => 'Menunggu',
                            'ditinjau' => 'Ditinjau',
                            'negosiasi' => 'Negosiasi',
                            'disetujui' => 'Disetujui',
                            'ditolak' => 'Ditolak',
                            'selesai' => 'Selesai'
                        ] as $value => $label)

                            <option value="{{ $value }}"
                                {{ $pengajuan->status === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>

                        @endforeach

                    </select>

                    <textarea name="catatan_eo"
                              rows="5"
                              placeholder="Catatan EO..."
                              class="mt-3 w-full rounded-xl border border-gray-300 px-4 py-3 text-sm">{{ old('catatan_eo', $pengajuan->catatan_eo) }}</textarea>

                    <button type="submit"
                            class="mt-3 w-full rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
                        Simpan Status
                    </button>

                </form>


                @if($pengajuan->status === 'negosiasi')

                    <a href="{{ route('eo.sponsorship.negosiasi.index', $pengajuan) }}"
                       class="mt-3 block rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-center text-sm font-semibold text-blue-700 hover:bg-blue-100">
                        Buka Negosiasi
                    </a>

                @endif

            </div>

        </div>

    </div>

</x-layouts.eo>