<x-layouts.eo :user="$user" title="Perlengkapan Event">

    <div style="padding: 28px;">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="margin:0; font-size:28px; color:#1f2937;">
                    Perlengkapan Event
                </h1>
                <p style="margin:6px 0 0; color:#64748b;">
                    Kelola seluruh perlengkapan yang dibutuhkan dalam pelaksanaan event.
                </p>
            </div>

            <a href="{{ route('eo.perlengkapan.create') }}"
               style="background:#16a34a; color:white; padding:11px 18px;
                      border-radius:10px; text-decoration:none; font-weight:600;">
                + Tambah Perlengkapan
            </a>
        </div>

        @if(session('success'))
            <div style="background:#dcfce7; color:#166534; padding:14px 18px;
                        border-radius:10px; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background:#fee2e2; color:#991b1b; padding:14px 18px;
                        border-radius:10px; margin-bottom:20px;">
                <strong>Terjadi kesalahan:</strong>
                <ul style="margin:8px 0 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="background:white; border-radius:14px; box-shadow:0 4px 18px rgba(0,0,0,.06);
                    overflow:hidden;">

            <div style="padding:20px 22px; border-bottom:1px solid #e5e7eb;">
                <strong style="font-size:17px;">Daftar Perlengkapan</strong>
                <span style="color:#64748b; margin-left:8px;">
                    {{ $perlengkapans->count() }} data
                </span>
            </div>

            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="background:#f8fafc;">
                            <th style="padding:14px; text-align:left;">No</th>
                            <th style="padding:14px; text-align:left;">Event</th>
                            <th style="padding:14px; text-align:left;">Perlengkapan</th>
                            <th style="padding:14px; text-align:center;">Jumlah</th>
                            <th style="padding:14px; text-align:left;">Kondisi</th>
                            <th style="padding:14px; text-align:left;">Sumber</th>
                            <th style="padding:14px; text-align:left;">Penanggung Jawab</th>
                            <th style="padding:14px; text-align:left;">Status</th>
                            <th style="padding:14px; text-align:center;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($perlengkapans as $item)

                            <tr style="border-top:1px solid #e5e7eb;">

                                <td style="padding:14px;">
                                    {{ $loop->iteration }}
                                </td>

                                <td style="padding:14px;">
                                    <strong>
                                        {{ $item->event?->nama_event ?? 'Event tidak tersedia' }}
                                    </strong>
                                </td>

                                <td style="padding:14px;">
                                    {{ $item->nama_perlengkapan }}
                                </td>

                                <td style="padding:14px; text-align:center;">
                                    {{ $item->jumlah }} {{ $item->satuan }}
                                </td>

                                <td style="padding:14px;">
                                    {{ $item->kondisi }}
                                </td>

                                <td style="padding:14px;">
                                    {{ $item->sumber }}
                                </td>

                                <td style="padding:14px;">
                                    {{ $item->penanggung_jawab ?: '-' }}
                                </td>

                                <td style="padding:14px;">
                                    {{ $item->status }}
                                </td>

                                <td style="padding:14px; text-align:center; white-space:nowrap;">

                                    <a href="{{ route('eo.perlengkapan.edit', $item) }}"
                                       style="display:inline-block; background:#2563eb; color:white;
                                              padding:7px 11px; border-radius:7px;
                                              text-decoration:none; font-size:13px;">
                                        Edit
                                    </a>

                                    <form action="{{ route('eo.perlengkapan.destroy', $item) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Yakin ingin menghapus perlengkapan ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                style="background:#dc2626; color:white;
                                                       border:0; padding:7px 11px;
                                                       border-radius:7px; cursor:pointer;
                                                       font-size:13px;">
                                            Hapus
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9"
                                    style="padding:50px; text-align:center; color:#64748b;">

                                    <div style="font-size:40px; margin-bottom:10px;">
                                        📦
                                    </div>

                                    <strong style="display:block; color:#334155; font-size:17px;">
                                        Belum ada perlengkapan
                                    </strong>

                                    <p style="margin:7px 0 18px;">
                                        Tambahkan perlengkapan yang dibutuhkan untuk event.
                                    </p>

                                    <a href="{{ route('eo.perlengkapan.create') }}"
                                       style="display:inline-block; background:#16a34a;
                                              color:white; padding:10px 16px;
                                              border-radius:8px; text-decoration:none;">
                                        + Tambah Perlengkapan
                                    </a>

                                </td>
                            </tr>

                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</x-layouts.eo>