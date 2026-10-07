<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'nama_event',
        'deskripsi_event',
        'jenis_tiket',
        'harga_tiket',
        'kuota_tiket',
        'tgl_mulai',
        'tgl_selesai',
        'lokasi_event',
        'latitude',
        'longitude',
        'status',
        'alasan_penolakan',
    ];

    protected function casts(): array
    {
        return [
            'harga_tiket' => 'decimal:2',
            'kuota_tiket' => 'integer',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rundowns(): HasMany
    {
        return $this->hasMany(Rundown::class);
    }

    public function jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class);
    }

    public function kegiatans(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function panitias(): HasMany
    {
        return $this->hasMany(Panitia::class);
    }

    public function eventPanitias(): HasMany
    {
        return $this->hasMany(EventPanitia::class);
    }

    public function perlengkapans(): HasMany
    {
        return $this->hasMany(Perlengkapan::class);
    }
}