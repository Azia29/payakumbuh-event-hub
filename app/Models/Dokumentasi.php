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
        'status',
        'published_at',
        'published_by',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'published_at' => 'datetime',
    ];

    public function scopeDipublikasi($query)
    {
        return $query->where('status', 'dipublikasi');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
} 