<x-layouts.eo :user="$user" title="Pengumuman">

<style>
.page {
    max-width: 1400px;
    margin: auto;
}

.hero {
    background: linear-gradient(135deg,#047857,#10b981);
    color: white;
    padding: 30px;
    border-radius: 22px;
    margin-bottom: 24px;
}

.hero h1 {
    margin: 0 0 8px;
    font-size: 30px;
}

.hero p {
    margin: 0;
    opacity: .9;
}

.card {
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 20px;
    padding: 28px;
    box-shadow: 0 8px 25px rgba(15,23,42,.05);
}

.empty {
    text-align: center;
    padding: 60px 20px;
    color: #64748b;
}

.empty h2 {
    color: #0f172a;
    margin-bottom: 8px;
}
</style>

<div class="page">

    <div class="hero">
        <h1>Pengumuman</h1>
        <p>
            Kelola informasi dan pengumuman yang berkaitan dengan kegiatan event.
        </p>
    </div>

    <div class="card">

        <div class="empty">
            <h2>Modul Pengumuman</h2>

            <p>
                Halaman ini disiapkan untuk pengelolaan pengumuman event.
            </p>

            <p>
                Fitur CRUD pengumuman dapat dikembangkan pada tahap berikutnya.
            </p>
        </div>

    </div>

</div>

</x-layouts.eo>