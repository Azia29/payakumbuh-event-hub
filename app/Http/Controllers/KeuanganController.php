<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    private function identitasPengguna(): array
    {
        $user = auth()->user();

        return [
            strtolower(trim((string) ($user?->divisi?->nama_divisi ?? ''))),
            strtolower(trim((string) ($user?->role ?? ''))),
        ];
    }

    private function bolehLihat(): void
    {
        [$divisi, $role] = $this->identitasPengguna();

        $diizinkan = in_array($divisi, ['ketua', 'keuangan', 'admin'], true)
            || in_array($role, ['ketua', 'admin'], true);

        abort_unless($diizinkan, 403);
    }

    private function bolehKelola(): void
    {
        [$divisi, $role] = $this->identitasPengguna();

        $diizinkan = in_array($divisi, ['ketua', 'keuangan', 'admin'], true)
            || in_array($role, ['ketua', 'admin'], true);

        abort_unless($diizinkan, 403);
    }

    public function index(Request $request)
    {
        $this->bolehLihat();

        $ringkasan = Transaksi::with('event')
            ->selectRaw("
                event_id,
                SUM(CASE WHEN jenis = 'pemasukan' THEN jumlah ELSE 0 END) AS pemasukan,
                SUM(CASE WHEN jenis = 'pengeluaran' THEN jumlah ELSE 0 END) AS pengeluaran
            ")
            ->groupBy('event_id')
            ->get();

        $transaksis = Transaksi::with('event')
            ->when(
                $request->event_id,
                fn ($query, $id) => $query->where('event_id', $id)
            )
            ->orderByDesc('tanggal')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        $totalMasuk = Transaksi::where('jenis', 'pemasukan')->sum('jumlah');
        $totalKeluar = Transaksi::where('jenis', 'pengeluaran')->sum('jumlah');
        $events = Event::all();

        $bolehKelola = true;

        return view('keuangan.index', compact(
            'ringkasan',
            'transaksis',
            'totalMasuk',
            'totalKeluar',
            'events',
            'bolehKelola'
        ));
    }

    public function create()
    {
        $this->bolehKelola();

        $events = Event::all();

        return view('keuangan.create', compact('events'));
    }

    public function store(Request $request)
    {
        $this->bolehKelola();

        $data = $request->validate([
            'event_id' => 'required|exists:events,id',
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'kategori' => 'required|string|max:100',
            'jumlah' => 'required|numeric|min:0.01',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $data['bukti_path'] = $request->file('bukti')
                ->store('bukti-keuangan', 'public');
        }

        unset($data['bukti']);

        $data['sumber'] = 'manual';
        $data['dibuat_oleh'] = auth()->id();

        Transaksi::create($data);

        return redirect()
            ->route('keuangan.index')
            ->with('sukses', 'Transaksi berhasil dicatat.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $this->bolehKelola();

        if ($transaksi->sumber !== 'manual') {
            return back()->with(
                'galat',
                'Transaksi otomatis tidak dapat dihapus dari menu manual.'
            );
        }

        $transaksi->delete();

        return back()->with('sukses', 'Transaksi berhasil dihapus.');
    }
}