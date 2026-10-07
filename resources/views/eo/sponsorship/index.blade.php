<x-layouts.eo :user="$user" title="Pengajuan Sponsor">

    <div class="space-y-6">

        {{-- HEADER --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold text-emerald-600">
                    EO Sponsorship
                </p>

                <h1 class="mt-1 text-2xl font-bold text-gray-900">
                    Pengajuan Sponsor
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Kelola data sponsor dan proses pengajuan sponsorship untuk event.
                </p>
            </div>

            <a href="{{ route('eo.sponsorship.create') }}"
               class="inline-flex items-center justify-center rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-emerald-700">
                + Tambah Data Sponsor
            </a>
        </div>


        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                {{ session('success') }}
            </div>
        @endif


        {{-- SUMMARY --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Sponsor</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">
                            {{ $sponsors->count() }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-sm font-bold text-emerald-600">
                        SP
                    </div>
                </div>
            </div>


            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Calon</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">
                            {{ $sponsors->where('status', 'calon')->count() }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gray-100 text-sm font-bold text-gray-600">
                        CL
                    </div>
                </div>
            </div>


            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Negosiasi</p>
                        <p class="mt-2 text-3xl font-bold text-gray-900">
                            {{ $sponsors->where('status', 'negosiasi')->count() }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-sm font-bold text-amber-600">
                        NG
                    </div>
                </div>
            </div>


            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Disetujui</p>
                        <p class="mt-2 text-3xl font-bold text-emerald-600">
                            {{ $sponsors->where('status', 'disetujui')->count() }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-sm font-bold text-emerald-600">
                        OK
                    </div>
                </div>
            </div>

        </div>


        {{-- TABLE --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">

            <div class="flex flex-col gap-2 border-b border-gray-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="font-semibold text-gray-900">
                        Daftar Sponsor
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Daftar perusahaan atau pihak yang mengajukan sponsorship.
                    </p>
                </div>

                <span class="text-sm text-gray-400">
                    {{ $sponsors->count() }} data
                </span>
            </div>


            @if($sponsors->count())

                <div class="overflow-x-auto">

                    <table class="min-w-full text-sm">

                        <thead class="bg-gray-50">
                            <tr class="text-left">
                                <th class="px-6 py-4 font-semibold text-gray-600">
                                    Sponsor
                                </th>

                                <th class="px-6 py-4 font-semibold text-gray-600">
                                    Kontak
                                </th>

                                <th class="px-6 py-4 font-semibold text-gray-600">
                                    Event
                                </th>

                                <th class="px-6 py-4 font-semibold text-gray-600">
                                    Dukungan
                                </th>

                                <th class="px-6 py-4 font-semibold text-gray-600">
                                    Status
                                </th>

                                <th class="px-6 py-4 text-right font-semibold text-gray-600">
                                    Aksi
                                </th>
                            </tr>
                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @foreach($sponsors as $sponsor)

                                <tr class="transition hover:bg-gray-50">

                                    {{-- SPONSOR --}}
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">
                                            {{ $sponsor->nama_perusahaan }}
                                        </div>

                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $sponsor->email ?: 'Email belum diisi' }}
                                        </div>
                                    </td>


                                    {{-- KONTAK --}}
                                    <td class="px-6 py-4">
                                        <div class="text-gray-700">
                                            {{ $sponsor->nama_kontak ?: '-' }}
                                        </div>

                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $sponsor->telepon ?: 'Telepon belum diisi' }}
                                        </div>
                                    </td>


                                    {{-- EVENT --}}
                                    <td class="px-6 py-4">
                                        <div class="max-w-xs font-medium text-gray-700">
                                            {{ $sponsor->event?->nama_event ?? 'Belum terhubung event' }}
                                        </div>
                                    </td>


                                    {{-- DUKUNGAN --}}
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">
                                            Rp {{ number_format((float) ($sponsor->nominal_dukungan ?? 0), 0, ',', '.') }}
                                        </div>

                                        <div class="mt-1 text-xs text-gray-500">
                                            {{ $sponsor->jenis_dukungan ?: 'Belum ditentukan' }}
                                        </div>
                                    </td>


                                    {{-- STATUS --}}
                                    <td class="px-6 py-4">

                                        @php
                                            $status = $sponsor->status;

                                            $statusLabel = [
                                                'calon' => 'Calon',
                                                'proposal_dikirim' => 'Proposal Dikirim',
                                                'negosiasi' => 'Negosiasi',
                                                'disetujui' => 'Disetujui',
                                                'ditolak' => 'Ditolak',
                                                'selesai' => 'Selesai',
                                            ][$status] ?? ucfirst(str_replace('_', ' ', $status ?? 'Belum Ada'));
                                        @endphp

                                        @if($status === 'disetujui' || $status === 'selesai')

                                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                {{ $statusLabel }}
                                            </span>

                                        @elseif($status === 'negosiasi')

                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                                {{ $statusLabel }}
                                            </span>

                                        @elseif($status === 'ditolak')

                                            <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                                {{ $statusLabel }}
                                            </span>

                                        @else

                                            <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-600">
                                                {{ $statusLabel }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- AKSI --}}
                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('eo.sponsorship.show', $sponsor) }}"
                                               class="rounded-lg border border-gray-200 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                                                Detail
                                            </a>

                                            <a href="{{ route('eo.sponsorship.edit', $sponsor) }}"
                                               class="rounded-lg bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-100">
                                                Edit
                                            </a>

                                            <form action="{{ route('eo.sponsorship.destroy', $sponsor) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data sponsor ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-100">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="px-6 py-16 text-center">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-sm font-bold text-emerald-600">
                        SP
                    </div>

                    <h3 class="mt-4 font-semibold text-gray-900">
                        Belum ada data sponsor
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Data sponsor akan tampil di halaman ini.
                    </p>

                    <a href="{{ route('eo.sponsorship.create') }}"
                       class="mt-5 inline-flex rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white hover:bg-emerald-700">
                        + Tambah Sponsor
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-layouts.eo>