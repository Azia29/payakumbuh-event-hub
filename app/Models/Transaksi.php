<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'event_id', 'jenis', 'kategori', 'jumlah', 'tanggal',
        'keterangan', 'bukti_path', 'sumber', 'dibuat_oleh',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jumlah'  => 'decimal:2',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function pembuat()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }

    public function getNamaEventAttribute(): string
    {
        $e = $this->event;
        if (! $e) return '-';
        return $e->nama_event ?? $e->nama ?? $e->judul ?? $e->title ?? ('Event #' . $e->id);
    }
}