<x-layouts.eo :user="$user" title="Edit Perlengkapan">

    <div style="padding:28px; max-width:1000px;">

        <div style="margin-bottom:24px;">
            <a href="{{ route('eo.perlengkapan.index') }}"
               style="color:#64748b; text-decoration:none;">
                ← Kembali ke Perlengkapan
            </a>

            <h1 style="margin:12px 0 5px; color:#1f2937;">
                Edit Perlengkapan
            </h1>

            <p style="margin:0; color:#64748b;">
                Perbarui informasi perlengkapan event.
            </p>
        </div>

        @if($errors->any())
            <div style="background:#fee2e2; color:#991b1b; padding:15px;
                        border-radius:10px; margin-bottom:20px;">
                <ul style="margin:0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST"
              action="{{ route('eo.perlengkapan.update', $perlengkapan) }}">

            @csrf
            @method('PUT')

            <div style="background:white; padding:25px; border-radius:14px;
                        box-shadow:0 4px 18px rgba(0,0,0,.06);">

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                    <div style="grid-column:1 / -1;">
                        <label>Event</label>
                        <select name="event_id" required
                                style="width:100%; padding:11px; margin-top:7px;
                                       border:1px solid #d1d5db; border-radius:8px;">

                            @foreach($events as $event)
                                <option value="{{ $event->id }}"
                                    {{ old('event_id',$perlengkapan->event_id) == $event->id ? 'selected' : '' }}>
                                    {{ $event->nama_event }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Nama Perlengkapan</label>
                        <input type="text"
                               name="nama_perlengkapan"
                               value="{{ old('nama_perlengkapan',$perlengkapan->nama_perlengkapan) }}"
                               required
                               style="width:100%; padding:11px; margin-top:7px;
                                      border:1px solid #d1d5db; border-radius:8px;">
                    </div>

                    <div>
                        <label>Jumlah</label>
                        <input type="number"
                               name="jumlah"
                               value="{{ old('jumlah',$perlengkapan->jumlah) }}"
                               min="1"
                               required
                               style="width:100%; padding:11px; margin-top:7px;
                                      border:1px solid #d1d5db; border-radius:8px;">
                    </div>

                    <div>
                        <label>Satuan</label>
                        <input type="text"
                               name="satuan"
                               value="{{ old('satuan',$perlengkapan->satuan) }}"
                               required
                               style="width:100%; padding:11px; margin-top:7px;
                                      border:1px solid #d1d5db; border-radius:8px;">
                    </div>

                    <div>
                        <label>Kondisi</label>
                        <select name="kondisi" required
                                style="width:100%; padding:11px; margin-top:7px;
                                       border:1px solid #d1d5db; border-radius:8px;">

                            @foreach(['Baik','Rusak Ringan','Rusak Berat'] as $kondisi)
                                <option value="{{ $kondisi }}"
                                    {{ old('kondisi',$perlengkapan->kondisi) == $kondisi ? 'selected' : '' }}>
                                    {{ $kondisi }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Sumber</label>
                        <select name="sumber" required
                                style="width:100%; padding:11px; margin-top:7px;
                                       border:1px solid #d1d5db; border-radius:8px;">

                            @foreach(['Milik EO','Sewa','Pinjam'] as $sumber)
                                <option value="{{ $sumber }}"
                                    {{ old('sumber',$perlengkapan->sumber) == $sumber ? 'selected' : '' }}>
                                    {{ $sumber }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div>
                        <label>Penanggung Jawab</label>
                        <input type="text"
                               name="penanggung_jawab"
                               value="{{ old('penanggung_jawab',$perlengkapan->penanggung_jawab) }}"
                               style="width:100%; padding:11px; margin-top:7px;
                                      border:1px solid #d1d5db; border-radius:8px;">
                    </div>

                    <div>
                        <label>Status</label>
                        <select name="status" required
                                style="width:100%; padding:11px; margin-top:7px;
                                       border:1px solid #d1d5db; border-radius:8px;">

                            @foreach(['Tersedia','Dipakai','Dikembalikan'] as $status)
                                <option value="{{ $status }}"
                                    {{ old('status',$perlengkapan->status) == $status ? 'selected' : '' }}>
                                    {{ $status }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div style="grid-column:1 / -1;">
                        <label>Keterangan</label>
                        <textarea name="keterangan"
                                  rows="4"
                                  style="width:100%; padding:11px; margin-top:7px;
                                         border:1px solid #d1d5db; border-radius:8px;">{{ old('keterangan',$perlengkapan->keterangan) }}</textarea>
                    </div>

                </div>

                <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:25px;">

                    <a href="{{ route('eo.perlengkapan.index') }}"
                       style="padding:11px 18px; border:1px solid #d1d5db;
                              border-radius:8px; text-decoration:none; color:#475569;">
                        Batal
                    </a>

                    <button type="submit"
                            style="background:#2563eb; color:white; border:0;
                                   padding:11px 20px; border-radius:8px; cursor:pointer;
                                   font-weight:600;">
                        Simpan Perubahan
                    </button>

                </div>

            </div>

        </form>

    </div>

</x-layouts.eo>