<x-layouts.eo :user="$user" title="Edit Dokumentasi">

@php
    $jenisLama = old('jenis', strtolower(trim($dokumentasi->jenis ?? 'foto')));
    $fileUrl = $dokumentasi->file ? asset('storage/' . $dokumentasi->file) : null;
@endphp

<style>
    .ed-head { display:flex; align-items:flex-start; justify-content:space-between; gap:20px; margin-bottom:22px; }
    .ed-head h1 { margin:0; font-size:27px; font-weight:800; color:#172033; }
    .ed-head p { margin:7px 0 0; color:#64748b; font-size:13px; }
    .ed-btn { display:inline-flex; align-items:center; justify-content:center; height:42px; padding:0 18px; border-radius:10px; border:1px solid #e2e8f0; background:#fff; color:#475569; font-size:12px; font-weight:700; text-decoration:none; cursor:pointer; }
    .ed-btn:hover { background:#f8fafc; }
    .ed-btn.green { background:#15803d; border-color:#15803d; color:#fff; }
    .ed-btn.green:hover { background:#166534; }
    .ed-alert { margin-bottom:18px; padding:13px 16px; border-radius:11px; border:1px solid #fecaca; background:#fef2f2; color:#b91c1c; font-size:12px; font-weight:600; }
    .ed-alert ul { margin:6px 0 0 18px; padding:0; }
    .ed-card { background:#fff; border:1px solid #e5e7eb; border-radius:18px; box-shadow:0 4px 15px rgba(15,23,42,.045); overflow:hidden; max-width:820px; }
    .ed-card-head { padding:17px 21px; border-bottom:1px solid #eef2f7; font-size:15px; font-weight:750; color:#172033; }
    .ed-body { padding:21px; display:grid; gap:18px; }
    .ed-field label.ed-label { display:block; margin-bottom:7px; font-size:12px; font-weight:800; color:#172033; }
    .ed-field label.ed-label span { color:#dc2626; }
    .ed-input, .ed-select, .ed-textarea { width:100%; padding:0 14px; height:44px; border:1px solid #e2e8f0; border-radius:10px; background:#f8fafc; color:#334155; font-size:13px; outline:none; box-sizing:border-box; transition:.2s; }
    .ed-textarea { height:auto; min-height:110px; padding:12px 14px; resize:vertical; font-family:inherit; }
    .ed-input:focus, .ed-select:focus, .ed-textarea:focus { background:#fff; border-color:#86efac; box-shadow:0 0 0 3px rgba(34,197,94,.08); }
    .ed-types { display:grid; grid-template-columns:repeat(3, 1fr); gap:10px; }
    .ed-type input { display:none; }
    .ed-type span { display:flex; align-items:center; justify-content:center; height:44px; border:1px solid #e2e8f0; border-radius:10px; background:#f8fafc; color:#475569; font-size:12px; font-weight:700; cursor:pointer; transition:.2s; }
    .ed-type input:checked + span { border-color:#22c55e; background:#f0fdf4; color:#15803d; }
    .ed-current { display:flex; align-items:center; gap:14px; padding:12px; border:1px solid #e5e7eb; border-radius:12px; background:#f8fafc; margin-bottom:10px; }
    .ed-current img { width:64px; height:64px; object-fit:cover; border-radius:10px; }
    .ed-current .ed-ph { width:64px; height:64px; border-radius:10px; background:#f0fdf4; color:#15803d; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:11px; }
    .ed-current small { display:block; color:#94a3b8; font-size:11px; margin-top:3px; }
    .ed-hint { margin-top:6px; color:#94a3b8; font-size:11px; }
    .ed-error { margin-top:6px; color:#dc2626; font-size:11px; font-weight:600; }
    .ed-foot { display:flex; justify-content:flex-end; gap:10px; padding:16px 21px; border-top:1px solid #eef2f7; background:#f8fafc; }
    @media(max-width:700px){ .ed-head{ flex-direction:column; } .ed-types{ grid-template-columns:1fr; } }
</style>

<div>

    <div class="ed-head">
        <div>
            <h1>Edit Dokumentasi</h1>
            <p>Perbarui informasi dokumentasi selagi masih berstatus draft.</p>
        </div>
        <a href="{{ route('eo.dokumentasi.show', $dokumentasi) }}" class="ed-btn">&larr; Kembali</a>
    </div>

    @if(session('error'))
        <div class="ed-alert">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="ed-alert">
            Periksa kembali isian berikut:
            <ul>
                @foreach($errors->all() as $pesan)
                    <li>{{ $pesan }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eo.dokumentasi.update', $dokumentasi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ed-card">

            <div class="ed-card-head">Informasi Dokumentasi</div>

            <div class="ed-body">

                <div class="ed-field">
                    <label class="ed-label" for="event_id">Event <span>*</span></label>
                    <select name="event_id" id="event_id" class="ed-select" required>
                        <option value="">Pilih Event</option>
                        @foreach($events as $event)
                            <option value="{{ $event->id }}" {{ (string) old('event_id', $dokumentasi->event_id) === (string) $event->id ? 'selected' : '' }}>
                                {{ $event->nama_event }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="ed-field">
                    <label class="ed-label" for="judul">Judul Dokumentasi <span>*</span></label>
                    <input type="text" name="judul" id="judul" class="ed-input" maxlength="255" required
                           value="{{ old('judul', $dokumentasi->judul) }}">
                </div>

                <div class="ed-field">
                    <span class="ed-label">Jenis Dokumentasi <span>*</span></span>
                    <div class="ed-types">
                        <label class="ed-type">
                            <input type="radio" name="jenis" value="foto" {{ $jenisLama === 'foto' ? 'checked' : '' }}>
                            <span>Foto</span>
                        </label>
                        <label class="ed-type">
                            <input type="radio" name="jenis" value="video" {{ $jenisLama === 'video' ? 'checked' : '' }}>
                            <span>Video</span>
                        </label>
                        <label class="ed-type">
                            <input type="radio" name="jenis" value="dokumen" {{ $jenisLama === 'dokumen' ? 'checked' : '' }}>
                            <span>Dokumen</span>
                        </label>
                    </div>
                </div>

                <div class="ed-field">
                    <label class="ed-label" for="tanggal">Tanggal Dokumentasi <span>*</span></label>
                    <input type="date" name="tanggal" id="tanggal" class="ed-input" required
                           value="{{ old('tanggal', $dokumentasi->tanggal?->format('Y-m-d')) }}">
                </div>

                <div class="ed-field">
                    <label class="ed-label" for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="ed-textarea"
                              placeholder="Tambahkan keterangan mengenai dokumentasi ini...">{{ old('keterangan', $dokumentasi->keterangan) }}</textarea>
                </div>

                <div class="ed-field">
                    <label class="ed-label" for="file">File Dokumentasi</label>

                    @if($dokumentasi->file)
                        <div class="ed-current">
                            @if($fileUrl && $jenisLama === 'foto')
                                <img src="{{ $fileUrl }}" alt="{{ $dokumentasi->judul }}">
                            @else
                                <div class="ed-ph">FILE</div>
                            @endif
                            <div>
                                <strong style="font-size:12px;color:#1e293b;">{{ basename($dokumentasi->file) }}</strong>
                                <small>File saat ini</small>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="file" id="file" class="ed-input" style="padding-top:10px;">
                    <div class="ed-hint">Kosongkan jika tidak ingin mengganti file. Maksimal 10 MB.</div>
                </div>

            </div>

            <div class="ed-foot">
                <a href="{{ route('eo.dokumentasi.show', $dokumentasi) }}" class="ed-btn">Batal</a>
                <button type="submit" class="ed-btn green">Simpan Perubahan</button>
            </div>

        </div>

    </form>

</div>

</x-layouts.eo>