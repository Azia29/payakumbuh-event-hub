<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panitia extends Model
{
    protected $fillable = [
        'event_id',
        'nama',
        'email',
        'no_hp',
        'divisi',
        'keterangan',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}