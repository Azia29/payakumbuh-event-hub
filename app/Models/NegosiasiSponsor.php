<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NegosiasiSponsor extends Model
{
    protected $fillable = [
        'pengajuan_sponsor_id',
        'user_id',
        'pengirim',
        'pesan',
        'nominal_tawaran',
    ];

    protected $casts = [
        'nominal_tawaran' => 'decimal:2',
    ];

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(PengajuanSponsor::class, 'pengajuan_sponsor_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}