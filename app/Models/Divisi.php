<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    protected $fillable = [
        'nama_divisi',
        'deskripsi',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}