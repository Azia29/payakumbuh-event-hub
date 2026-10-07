<x-layouts.eo :user="$user" title="Press Release">

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

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, .05);
        }

        .icon {
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

        .card h3 {
            margin: 0 0 8px;
            font-size: 17px;
            color: #111827;
        }

        .card p {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
            font-size: 14px;
        }

        .workflow {
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e5e7eb;
        }

        .workflow h2 {
            margin: 0 0 18px;
            font-size: 20px;
            color: #111827;
        }

        .steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
        }

        .step {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 18px;
        }

        .number {
            font-size: 13px;
            font-weight: 700;
            color: #15803d;
            margin-bottom: 8px;
        }

        .step strong {
            display: block;
            color: #111827;
            margin-bottom: 6px;
        }

        .step span {
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        .notice {
            margin-top: 20px;
            padding: 15px 18px;
            border-radius: 12px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            font-size: 14px;
            line-height: 1.6;
        }

        @media (max-width: 900px) {
            .grid,
            .steps {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .grid,
            .steps {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="page-wrap">

        <div class="hero">
            <h1>Press Release</h1>
            <p>
                Kelola materi berita resmi dan informasi kegiatan event
                sebelum disampaikan untuk proses pemeriksaan dan publikasi.
            </p>
        </div>

        <div class="grid">

            <div class="card">
                <div class="icon">PR</div>
                <h3>Buat Press Release</h3>
                <p>
                    Menyiapkan draft berita resmi mengenai kegiatan,
                    pencapaian, atau informasi penting dari event.
                </p>
            </div>

            <div class="card">
                <div class="icon">ED</div>
                <h3>Edit Materi</h3>
                <p>
                    Memeriksa kembali judul, isi berita, informasi event,
                    dan materi pendukung sebelum diajukan.
                </p>
            </div>

            <div class="card">
                <div class="icon">AJ</div>
                <h3>Ajukan ke Admin</h3>
                <p>
                    Mengirim press release kepada Admin EO untuk diperiksa
                    sebelum dapat dipublikasikan.
                </p>
            </div>

        </div>

        <div class="workflow">

            <h2>Alur Press Release</h2>

            <div class="steps">

                <div class="step">
                    <div class="number">01</div>
                    <strong>Buat Draft</strong>
                    <span>
                        Humas menulis materi press release.
                    </span>
                </div>

                <div class="step">
                    <div class="number">02</div>
                    <strong>Periksa</strong>
                    <span>
                        Humas memastikan informasi sudah benar.
                    </span>
                </div>

                <div class="step">
                    <div class="number">03</div>
                    <strong>Ajukan</strong>
                    <span>
                        Materi dikirim kepada Admin EO untuk diperiksa.
                    </span>
                </div>

                <div class="step">
                    <div class="number">04</div>
                    <strong>Publikasi</strong>
                    <span>
                        Publikasi dilakukan setelah mendapatkan persetujuan Admin.
                    </span>
                </div>

            </div>

            <div class="notice">
                <strong>Catatan:</strong>
                Humas bertugas membuat dan mengajukan press release.
                Humas tidak melakukan publikasi langsung.
            </div>

        </div>

    </div>

</x-layouts.eo>