<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rundown extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_rundown',
        'deskripsi',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'latitude',
        'longitude',
        'penanggung_jawab',
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