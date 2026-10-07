<x-layouts.eo :user="$user" title="Media & Sosial">

    <style>
        .page-wrap {
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero {
            background: linear-gradient(135deg, #166534, #15803d);
            color: white;
            border-radius: 18px;
            padding: 28px;
            margin-bottom: 24px;
        }

        .hero h1 {
            margin: 0 0 8px;
            font-size: 26px;
        }

        .hero p {
            margin: 0;
            opacity: .9;
            line-height: 1.6;
        }

        .section-title {
            margin: 0 0 14px;
            font-size: 20px;
            color: #111827;
        }

        .channels {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .channel {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 16px rgba(15,23,42,.05);
        }

        .channel-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #dcfce7;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-bottom: 14px;
        }

        .channel strong {
            display: block;
            color: #111827;
            margin-bottom: 6px;
        }

        .channel span {
            color: #64748b;
            font-size: 13px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.4fr .8fr;
            gap: 20px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 16px rgba(15,23,42,.05);
        }

        .card h2 {
            margin: 0 0 18px;
            font-size: 19px;
            color: #111827;
        }

        .task {
            display: flex;
            align-items: flex-start;
            gap: 13px;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .task:last-child {
            border-bottom: 0;
        }

        .task-icon {
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            border-radius: 10px;
            background: #f0fdf4;
            color: #15803d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .task strong {
            display: block;
            margin-bottom: 4px;
            color: #1f2937;
            font-size: 14px;
        }

        .task span {
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        .status {
            margin-top: 18px;
            padding: 15px;
            border-radius: 12px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            font-size: 13px;
            line-height: 1.6;
        }

        .rules {
            margin: 0;
            padding-left: 20px;
            color: #475569;
            line-height: 1.8;
            font-size: 14px;
        }

        @media (max-width: 900px) {
            .channels {
                grid-template-columns: 1fr 1fr;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .channels {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="page-wrap">

        <div class="hero">
            <h1>Media & Sosial</h1>
            <p>
                Pusat pengelolaan informasi, materi komunikasi, dan
                rencana publikasi event pada berbagai kanal media.
            </p>
        </div>

        <h2 class="section-title">Kanal Komunikasi</h2>

        <div class="channels">

            <div class="channel">
                <div class="channel-icon">IG</div>
                <strong>Instagram</strong>
                <span>Konten visual, poster, story, dan informasi event.</span>
            </div>

            <div class="channel">
                <div class="channel-icon">FB</div>
                <strong>Facebook</strong>
                <span>Informasi kegiatan dan publikasi kepada masyarakat.</span>
            </div>

            <div class="channel">
                <div class="channel-icon">YT</div>
                <strong>YouTube</strong>
                <span>Video dokumentasi dan informasi kegiatan.</span>
            </div>

            <div class="channel">
                <div class="channel-icon">WEB</div>
                <strong>Website</strong>
                <span>Informasi resmi dan berita mengenai event.</span>
            </div>

        </div>

        <div class="content-grid">

            <div class="card">
                <h2>Tugas Media & Sosial</h2>

                <div class="task">
                    <div class="task-icon">01</div>
                    <div>
                        <strong>Menyiapkan Materi</strong>
                        <span>
                            Menyiapkan caption, poster, gambar, video,
                            dan materi informasi event.
                        </span>
                    </div>
                </div>

                <div class="task">
                    <div class="task-icon">02</div>
                    <div>
                        <strong>Menentukan Kanal</strong>
                        <span>
                            Menentukan media yang sesuai untuk setiap
                            jenis informasi dan target masyarakat.
                        </span>
                    </div>
                </div>

                <div class="task">
                    <div class="task-icon">03</div>
                    <div>
                        <strong>Menjadwalkan Konten</strong>
                        <span>
                            Mengatur waktu dan urutan materi yang akan
                            diajukan untuk publikasi.
                        </span>
                    </div>
                </div>

                <div class="task">
                    <div class="task-icon">04</div>
                    <div>
                        <strong>Monitoring</strong>
                        <span>
                            Memantau status materi yang telah dibuat,
                            diajukan, disetujui, atau ditolak.
                        </span>
                    </div>
                </div>

            </div>

            <div class="card">
                <h2>Pedoman Humas</h2>

                <ul class="rules">
                    <li>Gunakan informasi event yang sudah valid.</li>
                    <li>Pastikan judul dan caption mudah dipahami.</li>
                    <li>Gunakan materi visual yang sesuai.</li>
                    <li>Periksa kembali informasi sebelum diajukan.</li>
                    <li>Publikasi mengikuti persetujuan Admin EO.</li>
                </ul>

                <div class="status">
                    <strong>Alur:</strong><br>
                    Humas membuat materi → pemeriksaan internal →
                    ajukan ke Admin → Admin menyetujui →
                    materi dapat dipublikasikan.
                </div>

            </div>

        </div>

    </div>

</x-layouts.eo>