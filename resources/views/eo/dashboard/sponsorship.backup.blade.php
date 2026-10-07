<x-layouts.eo
    :user="$user"
    title="Dashboard Sponsorship"
>

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-800">
            Dashboard Sponsorship
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Mengelola calon sponsor, proposal, negosiasi, dan dukungan sponsor.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">

        <div class="rounded-xl bg-white p-5 border shadow-sm">
            <p class="text-sm text-gray-500">Total Sponsor</p>
            <p class="mt-2 text-3xl font-bold">{{ $totalSponsor }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 border shadow-sm">
            <p class="text-sm text-gray-500">Calon</p>
            <p class="mt-2 text-3xl font-bold">{{ $calonSponsor }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 border shadow-sm">
            <p class="text-sm text-gray-500">Proposal</p>
            <p class="mt-2 text-3xl font-bold">{{ $proposalDikirim }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 border shadow-sm">
            <p class="text-sm text-gray-500">Negosiasi</p>
            <p class="mt-2 text-3xl font-bold">{{ $negosiasi }}</p>
        </div>

        <div class="rounded-xl bg-white p-5 border shadow-sm">
            <p class="text-sm text-gray-500">Disetujui</p>
            <p class="mt-2 text-3xl font-bold">{{ $disetujui }}</p>
        </div>

    </div>


    <div class="mt-6 rounded-xl bg-white p-6 border shadow-sm">

        <p class="text-sm text-gray-500">
            Total Dukungan Sponsor Disetujui
        </p>

        <p class="mt-2 text-3xl font-bold text-green-700">
            Rp {{ number_format($totalDukungan, 0, ',', '.') }}
        </p>

    </div>


    <div class="mt-6 rounded-xl bg-white border shadow-sm">

        <div class="border-b px-6 py-4">

            <h2 class="font-semibold">
                Data Sponsor Terbaru
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-3 text-left">
                            Perusahaan
                        </th>

                        <th class="px-6 py-3 text-left">
                            Event
                        </th>

                        <th class="px-6 py-3 text-left">
                            Dukungan
                        </th>

                        <th class="px-6 py-3 text-left">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y">

                    @forelse($sponsors as $sponsor)

                        <tr>

                            <td class="px-6 py-4 font-medium">
                                {{ $sponsor->nama_perusahaan }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $sponsor->event?->nama_event ?? '-' }}
                            </td>

                            <td class="px-6 py-4">
                                Rp {{ number_format($sponsor->nominal_dukungan ?? 0, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ ucfirst(str_replace('_', ' ', $sponsor->status)) }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="px-6 py-8 text-center text-gray-500">

                                Belum ada data sponsor.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <div class="mt-6">

        <a
            href="{{ route('eo.sponsorship.index') }}"
            class="rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white"
        >
            Kelola Sponsor
        </a>

    </div>

</x-layouts.eo>
