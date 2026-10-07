<x-layouts.eo :user="$user" title="Detail Dokumentasi">

    <div class="p-6">

        <div class="flex items-center justify-between mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Detail Dokumentasi
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Informasi lengkap dokumentasi event.
                </p>
            </div>

            <a
                href="{{ route('eo.dokumentasi.index') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg"
            >
                Kembali
            </a>

        </div>


        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <p class="text-sm text-gray-500">
                        Event
                    </p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $dokumentasi->event?->nama_event ?? '-' }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Judul Dokumentasi
                    </p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $dokumentasi->judul }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Jenis
                    </p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $dokumentasi->jenis }}
                    </p>
                </div>


                <div>
                    <p class="text-sm text-gray-500">
                        Tanggal
                    </p>

                    <p class="font-semibold text-gray-800 mt-1">
                        {{ $dokumentasi->tanggal?->format('d-m-Y') ?? '-' }}
                    </p>
                </div>

            </div>


            <div class="mt-6">

                <p class="text-sm text-gray-500">
                    Keterangan
                </p>

                <p class="text-gray-700 mt-2 leading-relaxed">
                    {{ $dokumentasi->keterangan ?? 'Tidak ada keterangan.' }}
                </p>

            </div>


            @if($dokumentasi->file)

                <div class="mt-6">

                    <p class="text-sm text-gray-500 mb-2">
                        File Dokumentasi
                    </p>

                    <a
                        href="{{ asset('storage/' . $dokumentasi->file) }}"
                        target="_blank"
                        class="inline-block px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg"
                    >
                        Lihat / Buka File
                    </a>

                </div>

            @endif


            <div class="flex gap-3 mt-8">

                <a
                    href="{{ route('eo.dokumentasi.edit', $dokumentasi) }}"
                    class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg"
                >
                    Edit
                </a>


                <form
                    action="{{ route('eo.dokumentasi.destroy', $dokumentasi) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus dokumentasi ini?')"
                >

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg"
                    >
                        Hapus
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-layouts.eo>