@props([
    'user',
    'title' => 'Dashboard',
])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $title }} - Payakumbuh Event Hub
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">

    <div class="flex min-h-screen">

        {{-- =========================================================
             SIDEBAR
        ========================================================== --}}
        <aside class="flex w-64 flex-col border-r border-gray-200 bg-white">

            {{-- Logo --}}
            <div class="border-b border-gray-200 px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-600 text-xl text-white">
                        ðŸ“…
                    </div>

                    <div>
                        <h1 class="font-bold text-gray-800">
                            Event Hub
                        </h1>

                        <p class="text-xs text-gray-500">
                            Payakumbuh
                        </p>
                    </div>

                </div>

            </div>


            {{-- Informasi User --}}
            <div class="border-b border-gray-200 px-5 py-4">

                <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                    Akun EO
                </p>

                <p class="mt-1 truncate font-semibold text-gray-800">
                    {{ $user->name }}
                </p>

                <p class="mt-1 text-sm text-green-600">
                    {{ $user->divisi?->nama_divisi ?? 'Divisi belum ditentukan' }}
                </p>

            </div>


            {{-- Menu --}}
            <nav class="flex-1 space-y-1 overflow-y-auto px-4 py-5">

                {{-- =================================================
                     SEMUA EO
                ================================================== --}}

                {{-- Dashboard --}}
                <a
                    href="{{ route('eo.dashboard') }}"
                    class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                    hover:bg-green-50 hover:text-green-600
                    {{ request()->routeIs('eo.dashboard')
                        ? 'bg-green-50 text-green-600'
                        : 'text-gray-600' }}"
                >
                    <span>ðŸ“Š</span>
                    <span>Dashboard</span>
                </a>


                {{-- =================================================
                     DIVISI ACARA
                ================================================== --}}

                @if ($user->divisi?->nama_divisi === 'Acara')

                    {{-- Kelola Event --}}
                    <a
                        href="{{ route('eo.events.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.events.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“…</span>
                        <span>Kelola Event</span>
                    </a>


                    {{-- Rundown --}}
                    <a
                        href="{{ route('eo.rundown.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.rundown.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“</span>
                        <span>Rundown</span>
                    </a>


                    {{-- Jadwal --}}
                    <a
                        href="{{ route('eo.jadwal.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.jadwal.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ•</span>
                        <span>Jadwal</span>
                    </a>


                    {{-- Kegiatan --}}
                    <a
                        href="{{ route('eo.kegiatan.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.kegiatan.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸŽ¯</span>
                        <span>Kegiatan</span>
                    </a>


                    {{-- Laporan --}}
                    <a
                        href="{{ route('eo.laporan') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.laporan')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“„</span>
                        <span>Laporan</span>
                    </a>

                @endif


                {{-- =================================================
                     DIVISI KETUA
                ================================================== --}}

                @if ($user->divisi?->nama_divisi === 'Ketua')

                    {{-- Kelola Event --}}
                    <a
                        href="{{ route('eo.events.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.events.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“…</span>
                        <span>Kelola Event</span>
                    </a>


                    {{-- Panitia --}}
                    <a
                        href="{{ route('eo.panitia.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.panitia.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ‘¥</span>
                        <span>Kelola Panitia</span>
                    </a>


                    {{-- Monitoring --}}
                    <a
                        href="{{ route('eo.monitoring') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.monitoring')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“ˆ</span>
                        <span>Monitoring</span>
                    </a>


                    {{-- Laporan --}}
                    <a
                        href="{{ route('eo.laporan') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.laporan')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“„</span>
                        <span>Laporan</span>
                    </a>

                @endif


                {{-- =================================================
                     DIVISI HUMAS
                ================================================== --}}

                @if ($user->divisi?->nama_divisi === 'Humas')

                    {{-- Kelola Event --}}
                    <a
                        href="{{ route('eo.events.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.events.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“…</span>
                        <span>Kelola Event</span>
                    </a>


                    {{-- Monitoring --}}
                    <a
                        href="{{ route('eo.monitoring') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.monitoring')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“ˆ</span>
                        <span>Monitoring</span>
                    </a>


                    {{-- Laporan --}}
                    <a
                        href="{{ route('eo.laporan') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.laporan')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“„</span>
                        <span>Laporan</span>
                    </a>

                @endif


                {{-- =================================================
                     DIVISI SPONSORSHIP
                ================================================== --}}

                @if ($user->divisi?->nama_divisi === 'Sponsorship')

                    {{-- Kelola Event --}}
                    <a
                        href="{{ route('eo.events.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.events.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“…</span>
                        <span>Kelola Event</span>
                    </a>


                    {{-- Kelola Sponsor --}}
                    <a
                        href="{{ route('eo.sponsorship.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.sponsorship.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ¤</span>
                        <span>Kelola Sponsor</span>
                    </a>


                    {{-- Monitoring --}}
                    <a
                        href="{{ route('eo.monitoring') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.monitoring')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“ˆ</span>
                        <span>Monitoring</span>
                    </a>


                    {{-- Laporan --}}
                    <a
                        href="{{ route('eo.laporan') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.laporan')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“„</span>
                        <span>Laporan</span>
                    </a>

                @endif


                {{-- =================================================
                     DIVISI DOKUMENTASI
                ================================================== --}}

                @if ($user->divisi?->nama_divisi === 'Dokumentasi')

                    {{-- Kelola Event --}}
                    <a
                        href="{{ route('eo.events.index') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.events.*')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“…</span>
                        <span>Kelola Event</span>
                    </a>


                    {{-- Monitoring --}}
                    <a
                        href="{{ route('eo.monitoring') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.monitoring')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“ˆ</span>
                        <span>Monitoring</span>
                    </a>


                    {{-- Laporan --}}
                    <a
                        href="{{ route('eo.laporan') }}"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium transition
                        hover:bg-green-50 hover:text-green-600
                        {{ request()->routeIs('eo.laporan')
                            ? 'bg-green-50 text-green-600'
                            : 'text-gray-600' }}"
                    >
                        <span>ðŸ“„</span>
                        <span>Laporan</span>
                    </a>

                @endif

            </nav>


            {{-- =====================================================
                 LOGOUT
            ====================================================== --}}
            <div class="border-t border-gray-200 p-4">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-sm font-medium text-red-600 transition hover:bg-red-50"
                    >
                        <span>ðŸšª</span>
                        <span>Logout</span>
                    </button>

                </form>

            </div>

        </aside>


        {{-- =========================================================
             MAIN CONTENT
        ========================================================== --}}
        <main class="min-w-0 flex-1">

            {{-- Header --}}
            <header class="border-b border-gray-200 bg-white px-6 py-4">

                <div class="flex items-center justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-gray-800">
                            {{ $title }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            Payakumbuh Event Hub
                        </p>
                    </div>

                    <div class="hidden text-right sm:block">

                        <p class="text-sm font-medium text-gray-800">
                            {{ $user->name }}
                        </p>

                        <p class="text-xs text-gray-500">
                            {{ $user->divisi?->nama_divisi ?? '-' }}
                        </p>

                    </div>

                </div>

            </header>


            {{-- Isi Halaman --}}
            <section class="p-6">

                {{ $slot }}

            </section>

        </main>

    </div>

</body>

</html>

