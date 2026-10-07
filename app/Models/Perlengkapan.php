<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perlengkapan extends Model
{
    protected $fillable = [
        'event_id',
        'nama_perlengkapan',
        'jumlah',
        'satuan',
        'kondisi',
        'sumber',
        'penanggung_jawab',
        'status',
        'keterangan',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}