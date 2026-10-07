<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengajuanSponsor extends Model
{
    protected $fillable = [
        'sponsor_account_id',
        'paket_sponsorship_id',
        'pesan',
        'nominal_pengajuan',
        'status',
        'catatan_eo',
    ];

    protected $casts = [
        'nominal_pengajuan' => 'decimal:2',
    ];

    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(SponsorAccount::class, 'sponsor_account_id');
    }

    public function paket(): BelongsTo
    {
        return $this->belongsTo(PaketSponsorship::class, 'paket_sponsorship_id');
    }

    public function negosiasi(): HasMany
    {
        return $this->hasMany(NegosiasiSponsor::class, 'pengajuan_sponsor_id');
    }

    public function dukungan(): HasMany
    {
        return $this->hasMany(DukunganSponsor::class, 'pengajuan_sponsor_id');
    }
}