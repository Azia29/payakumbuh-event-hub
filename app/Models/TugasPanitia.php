<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TugasPanitia extends Model
{
    protected $table = 'tugas_panitias';

    protected $fillable = [
        'event_panitia_id',
        'judul_tugas',
        'deskripsi',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'status',
        'catatan_panitia',
        'token',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function eventPanitia(): BelongsTo
    {
        return $this->belongsTo(EventPanitia::class);
    }
}