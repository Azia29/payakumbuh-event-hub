<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaketSponsorship extends Model
{
    protected $fillable = [
        'event_id',
        'nama_paket',
        'harga',
        'deskripsi',
        'benefit',
        'status',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function pengajuans(): HasMany
    {
        return $this->hasMany(PengajuanSponsor::class, 'paket_sponsorship_id');
    }
}