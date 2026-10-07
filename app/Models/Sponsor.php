<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_perusahaan',
        'nama_kontak',
        'telepon',
        'email',
        'alamat',
        'jenis_dukungan',
        'nominal_dukungan',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'nominal_dukungan' => 'decimal:2',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

