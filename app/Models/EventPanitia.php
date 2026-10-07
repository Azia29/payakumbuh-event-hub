<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventPanitia extends Model
{
    protected $fillable = [
        'event_id',
        'panitia_id',
        'divisi_id',
        'access_token',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function panitia(): BelongsTo
    {
        return $this->belongsTo(Panitia::class);
    }

    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class);
    }

    public function tugas(): HasMany
    {
        return $this->hasMany(TugasPanitia::class);
    }
}