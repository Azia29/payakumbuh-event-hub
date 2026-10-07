<x-layouts.eo :user="$user" title="Edit Dokumentasi">

    <div class="p-6">

        <div class="mb-6">

            <h1 class="text-2xl font-bold text-gray-800">
                Edit Dokumentasi
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                Perbarui informasi dokumentasi event.
            </p>

        </div>


        @if($errors->any())

            <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">

                <ul class="list-disc ml-5">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">

            <form
                action="{{ route('eo.dokumentasi.update', $dokumentasi) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')


                <div class="mb-5">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Event
                    </label>

                    <select
                        name="event_id"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                        @foreach($events as $event)

                            <option
                                value="{{ $event->id }}"
                                {{ old('event_id', $dokumentasi->event_id) == $event->id ? 'selected' : '' }}
                            >
                                {{ $event->nama_event }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mb-5">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Judul Dokumentasi
                    </label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul', $dokumentasi->judul) }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Jenis Dokumentasi
                    </label>

                    <select
                        name="jenis"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                        <option
                            value="Foto"
                            {{ old('jenis', $dokumentasi->jenis) == 'Foto' ? 'selected' : '' }}
                        >
                            Foto
                        </option>

                        <option
                            value="Video"
                            {{ old('jenis', $dokumentasi->jenis) == 'Video' ? 'selected' : '' }}
                        >
                            Video
                        </option>

                        <option
                            value="Dokumen"
                            {{ old('jenis', $dokumentasi->jenis) == 'Dokumen' ? 'selected' : '' }}
                        >
                            Dokumen
                        </option>

                    </select>

                </div>


                <div class="mb-5">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', optional($dokumentasi->tanggal)->format('Y-m-d')) }}"
                        required
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                </div>


                @if($dokumentasi->file)

                    <div class="mb-5 bg-gray-50 border rounded-lg p-4">

                        <p class="text-sm text-gray-500">
                            File saat ini
                        </p>

                        <a
                            href="{{ asset('storage/' . $dokumentasi->file) }}"
                            target="_blank"
                            class="text-green-600 hover:underline"
                        >
                            Lihat file saat ini
                        </a>

                    </div>

                @endif


                <div class="mb-5">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Ganti File
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >

                    <p class="text-xs text-gray-500 mt-2">
                        Kosongkan jika tidak ingin mengganti file.
                    </p>

                </div>


                <div class="mb-6">

                    <label class="block font-semibold text-gray-700 mb-2">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3"
                    >{{ old('keterangan', $dokumentasi->keterangan) }}</textarea>

                </div>


                <div class="flex gap-3">

                    <a
                        href="{{ route('eo.dokumentasi.index') }}"
                        class="px-5 py-3 bg-gray-200 text-gray-700 rounded-lg"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-layouts.eo>