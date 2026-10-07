<div class="rounded-3xl bg-gradient-to-r from-green-700 via-green-600 to-emerald-500 p-8 text-white shadow-xl">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-3xl font-bold">
                Halo, {{ $user->name }} ðŸ‘‹
            </h1>

            <p class="mt-3 text-green-100">
                Selamat datang di Event Hub Payakumbuh.
                Kelola seluruh kebutuhan event dari satu dashboard.
            </p>

        </div>


        <div class="mt-5 md:mt-0">

            <div class="rounded-xl bg-white/20 px-5 py-3">

                <p class="text-sm text-green-100">
                    Divisi
                </p>

                <p class="text-xl font-bold">
                    {{ $user->divisi->nama_divisi ?? '-' }}
                </p>

            </div>

        </div>


    </div>


    <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3">


        <a href="{{ route('eo.events.index') }}"
           class="rounded-xl bg-white p-4 text-green-700 hover:bg-green-50">

            <div class="text-2xl">
                ðŸ“…
            </div>

            <p class="mt-2 font-bold">
                Kelola Event
            </p>

            <p class="text-sm">
                Buat dan kelola event
            </p>

        </a>



        <a href="{{ route('eo.monitoring') }}"
           class="rounded-xl bg-white p-4 text-green-700 hover:bg-green-50">

            <div class="text-2xl">
                ðŸ“Š
            </div>

            <p class="mt-2 font-bold">
                Monitoring
            </p>

            <p class="text-sm">
                Pantau progres event
            </p>

        </a>



        <a href="{{ route('eo.laporan') }}"
           class="rounded-xl bg-white p-4 text-green-700 hover:bg-green-50">

            <div class="text-2xl">
                ðŸ“„
            </div>

            <p class="mt-2 font-bold">
                Laporan
            </p>

            <p class="text-sm">
                Lihat laporan event
            </p>

        </a>


    </div>


</div>