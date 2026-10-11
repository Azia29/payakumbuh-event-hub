<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class SponsorAccount extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_perusahaan',
        'nama_kontak',
        'email',
        'telepon',
        'alamat',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function pengajuan(): HasMany
    {
        return $this->hasMany(
            PengajuanSponsor::class,
            'sponsor_account_id'
        );
    }
}