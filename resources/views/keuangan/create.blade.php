<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catat Transaksi - Payakumbuh Event Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4" style="max-width: 640px;">
    <h3 class="mb-3">Catat Transaksi</h3>

    @if($errors->any())
        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <form method="POST" action="{{ route('keuangan.store') }}" enctype="multipart/form-data" class="card card-body">
        @csrf
        <div class="mb-3">
            <label class="form-label">Event</label>
            <select name="event_id" class="form-select" required>
                <option value="">- pilih event -</option>
                @foreach($events as $e)
                    <option value="{{ $e->id }}" @selected(old('event_id') == $e->id)>
                        {{ $e->nama_event ?? $e->nama ?? $e->judul ?? $e->title ?? ('Event #'.$e->id) }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Jenis</label>
                <select name="jenis" class="form-select" required>
                    <option value="pengeluaran" @selected(old('jenis') === 'pengeluaran')>Pengeluaran</option>
                    <option value="pemasukan" @selected(old('jenis') === 'pemasukan')>Pemasukan</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}" placeholder="Konsumsi, sewa tempat, sponsor, dll" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah (Rp)</label>
            <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" min="0" step="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="2">{{ old('keterangan') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Bukti (jpg/png/pdf, maks 2 MB)</label>
            <input type="file" name="bukti" class="form-control">
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('keuangan.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
</body>
</html>