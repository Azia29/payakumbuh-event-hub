<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Panitia extends Model
{
    protected $fillable = [
        'event_id',
        'nama',
        'email',
        'no_hp',
        'divisi',
        'keterangan',
        'qr_token',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
