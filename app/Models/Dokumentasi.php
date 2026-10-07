<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'judul',
        'jenis',
        'tanggal',
        'keterangan',
        'file',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
} 