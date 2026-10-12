<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keuangan - Payakumbuh Event Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Keuangan</h3>
        @if($bolehKelola)
            <a href="{{ route('keuangan.create') }}" class="btn btn-primary">+ Catat Transaksi</a>
        @endif
    </div>

    @if(session('sukses')) <div class="alert alert-success">{{ session('sukses') }}</div> @endif
    @if(session('galat'))  <div class="alert alert-danger">{{ session('galat') }}</div> @endif

    <div class="row g-3 mb-4">
        <div class="col-md-4"><div class="card"><div class="card-body">
            <div class="text-muted">Total Pemasukan</div>
            <div class="fs-4 text-success">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</div>
        </div></div></div>
        <div class="col-md-4"><div class="card"><div class="card-body">
            <div class="text-muted">Total Pengeluaran</div>
            <div class="fs-4 text-danger">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</div>
        </div></div></div>
        <div class="col-md-4"><div class="card"><div class="card-body">
            <div class="text-muted">Saldo</div>
            <div class="fs-4">Rp {{ number_format($totalMasuk - $totalKeluar, 0, ',', '.') }}</div>
        </div></div></div>
    </div>

    <h5>Ringkasan per Event</h5>
    <div class="table-responsive mb-4">
        <table class="table table-sm table-bordered bg-white">
            <thead class="table-light">
                <tr><th>Event</th><th class="text-end">Pemasukan</th><th class="text-end">Pengeluaran</th><th class="text-end">Saldo</th></tr>
            </thead>
            <tbody>
            @forelse($ringkasan as $r)
                <tr>
                    <td>{{ $r->event->nama_event ?? $r->event->nama ?? $r->event->judul ?? $r->event->title ?? ('Event #'.$r->event_id) }}</td>
                    <td class="text-end">{{ number_format($r->pemasukan, 0, ',', '.') }}</td>
                    <td class="text-end">{{ number_format($r->pengeluaran, 0, ',', '.') }}</td>
                    <td class="text-end">{{ number_format($r->pemasukan - $r->pengeluaran, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h5>Riwayat Transaksi</h5>
        <form method="GET" class="d-flex gap-2">
            <select name="event_id" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">Semua event</option>
                @foreach($events as $e)
                    <option value="{{ $e->id }}" @selected(request('event_id') == $e->id)>
                        {{ $e->nama_event ?? $e->nama ?? $e->judul ?? $e->title ?? ('Event #'.$e->id) }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="table-responsive mt-2">
        <table class="table table-sm table-bordered bg-white">
            <thead class="table-light">
                <tr><th>Tanggal</th><th>Event</th><th>Jenis</th><th>Kategori</th><th class="text-end">Jumlah</th><th>Keterangan</th><th>Bukti</th><th></th></tr>
            </thead>
            <tbody>
            @forelse($transaksis as $t)
                <tr>
                    <td>{{ $t->tanggal->format('d/m/Y') }}</td>
                    <td>{{ $t->nama_event }}</td>
                    <td><span class="badge {{ $t->jenis === 'pemasukan' ? 'bg-success' : 'bg-danger' }}">{{ ucfirst($t->jenis) }}</span></td>
                    <td>{{ $t->kategori }}</td>
                    <td class="text-end">{{ number_format($t->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $t->keterangan }}</td>
                    <td>@if($t->bukti_path)<a href="{{ asset('storage/'.$t->bukti_path) }}" target="_blank">Lihat</a>@endif</td>
                    <td>
                        @if($bolehKelola && $t->sumber !== 'harga_event')
                            <form method="POST" action="{{ route('keuangan.destroy', $t) }}" onsubmit="return confirm('Hapus transaksi ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted">Belum ada transaksi.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $transaksis->links() }}
</div>
</body>
</html>