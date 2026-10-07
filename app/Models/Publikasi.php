<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publikasi extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'judul',
        'jenis',
        'isi',
        'gambar',
        'status',
        'catatan_admin',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
