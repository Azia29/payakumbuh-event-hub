<x-layouts.eo
    :user="$user"
    title="Dashboard Ketua"
>


<div class="space-y-6">


{{-- HEADER --}}

<div class="rounded-2xl bg-gradient-to-r from-green-700 to-green-500 p-8 text-white shadow-lg">

    <h1 class="text-3xl font-bold">
        Selamat Datang, {{ $user->name }}
    </h1>

    <p class="mt-2 text-green-100">
        Dashboard Ketua EO untuk mengontrol seluruh kegiatan event.
    </p>


    <div class="mt-5 flex gap-3">

        <a href="{{ route('eo.events.create') }}"
        class="rounded-lg bg-white px-5 py-2 text-sm font-semibold text-green-700">
            + Buat Event
        </a>


        <a href="{{ route('eo.panitia.create') }}"
        class="rounded-lg border border-white px-5 py-2 text-sm font-semibold text-white">
            + Tambah Panitia
        </a>

    </div>


</div>



{{-- STATISTIC CARD --}}


<div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">


<div class="rounded-xl bg-white p-6 shadow-md border">

<div class="flex justify-between">

<div>

<p class="text-sm text-gray-500">
Total Event
</p>

<h2 class="mt-3 text-3xl font-bold">
{{ $totalEvent }}
</h2>

</div>


<div class="rounded-full bg-green-100 p-4 text-2xl">
ðŸ“…
</div>

</div>

</div>




<div class="rounded-xl bg-white p-6 shadow-md border">


<div class="flex justify-between">

<div>

<p class="text-sm text-gray-500">
Event Aktif
</p>


<h2 class="mt-3 text-3xl font-bold text-green-600">
{{ $eventAktif }}
</h2>

</div>


<div class="rounded-full bg-blue-100 p-4 text-2xl">
ðŸš€
</div>


</div>

</div>




<div class="rounded-xl bg-white p-6 shadow-md border">


<div class="flex justify-between">

<div>

<p class="text-sm text-gray-500">
Event Selesai
</p>


<h2 class="mt-3 text-3xl font-bold">
{{ $eventSelesai }}
</h2>


</div>


<div class="rounded-full bg-gray-100 p-4 text-2xl">
âœ”
</div>


</div>

</div>




<div class="rounded-xl bg-white p-6 shadow-md border">


<div class="flex justify-between">

<div>

<p class="text-sm text-gray-500">
Total Panitia
</p>


<h2 class="mt-3 text-3xl font-bold">
{{ $totalPanitia }}
</h2>


</div>


<div class="rounded-full bg-yellow-100 p-4 text-2xl">
ðŸ‘¥
</div>


</div>


</div>


</div>





{{-- GRID UTAMA --}}


<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">



{{-- EVENT TERBARU --}}


<div class="lg:col-span-2 rounded-xl bg-white shadow-md border">


<div class="border-b px-6 py-4">

<h2 class="font-bold text-lg">
Event Terbaru
</h2>

</div>



<div class="p-6">


@forelse($eventTerbaru as $event)


<div class="mb-4 flex items-center justify-between rounded-lg bg-gray-50 p-4">


<div>

<h3 class="font-semibold">
{{ $event->nama_event }}
</h3>


<p class="text-sm text-gray-500">
{{ $event->lokasi_event }}
</p>


</div>



<span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">

{{ ucfirst($event->status) }}

</span>


</div>


@empty


<div class="text-center text-gray-500 py-8">

Belum ada event

</div>


@endforelse


</div>


</div>





{{-- RINGKASAN --}}


<div class="rounded-xl bg-white shadow-md border">


<div class="border-b px-6 py-4">

<h2 class="font-bold text-lg">
Ringkasan Divisi
</h2>

</div>


<div class="p-6 space-y-4">


<div class="flex justify-between">

<span>
Rundown
</span>

<b>
{{ $totalRundown }}
</b>

</div>



<div class="flex justify-between">

<span>
Jadwal
</span>

<b>
{{ $totalJadwal }}
</b>

</div>



<div class="flex justify-between">

<span>
Kegiatan
</span>

<b>
{{ $totalKegiatan }}
</b>

</div>



<div class="flex justify-between">

<span>
Sponsor
</span>

<b>
{{ $totalSponsor }}
</b>

</div>



</div>

</div>


</div>





{{-- QUICK MENU --}}


<div class="rounded-xl bg-white p-6 shadow-md border">


<h2 class="mb-5 text-lg font-bold">
Menu Cepat
</h2>



<div class="grid grid-cols-2 gap-4 md:grid-cols-4">


<a href="{{ route('eo.events.index') }}"
class="rounded-xl bg-green-50 p-5 text-center hover:bg-green-100">

<div class="text-3xl">
ðŸ“…
</div>

<p class="mt-2 font-semibold">
Event
</p>

</a>



<a href="{{ route('eo.panitia.index') }}"
class="rounded-xl bg-blue-50 p-5 text-center hover:bg-blue-100">

<div class="text-3xl">
ðŸ‘¥
</div>

<p class="mt-2 font-semibold">
Panitia
</p>

</a>



<a href="{{ route('eo.monitoring') }}"
class="rounded-xl bg-yellow-50 p-5 text-center hover:bg-yellow-100">

<div class="text-3xl">
ðŸ“ˆ
</div>

<p class="mt-2 font-semibold">
Monitoring
</p>

</a>



<a href="{{ route('eo.laporan') }}"
class="rounded-xl bg-gray-100 p-5 text-center hover:bg-gray-200">

<div class="text-3xl">
ðŸ“„
</div>

<p class="mt-2 font-semibold">
Laporan
</p>

</a>


</div>


</div>


</div>


</x-layouts.eo>