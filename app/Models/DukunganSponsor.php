<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DukunganSponsor extends Model
{
    protected $fillable = [
        'pengajuan_sponsor_id',
        'nominal',
        'status_pembayaran',
        'bukti_pembayaran',
        'catatan',
        'tanggal_pembayaran',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
        'tanggal_pembayaran' => 'datetime',
    ];

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(PengajuanSponsor::class, 'pengajuan_sponsor_id');
    }
}