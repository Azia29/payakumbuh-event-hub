<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    protected $fillable = [
        'event_id',
        'nama_jadwal',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'latitude',
        'longitude',
        'penanggung_jawab',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}