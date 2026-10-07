<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('divisis')->insert([
            [
                'nama_divisi' => 'Ketua',
                'deskripsi' => 'Mengatur dan memantau keseluruhan kegiatan event.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_divisi' => 'Acara',
                'deskripsi' => 'Mengatur konsep acara, jadwal, dan rundown.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_divisi' => 'Humas',
                'deskripsi' => 'Mengelola komunikasi, hubungan masyarakat, dan publikasi event.',
                'created_at' => now(),
                'updated_at' => now(),
        ],
            [
                'nama_divisi' => 'Sponsorship',
                'deskripsi' => 'Mengelola sponsor dan paket sponsorship.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_divisi' => 'Dokumentasi',
                'deskripsi' => 'Mengelola dokumentasi foto, video, dan konten event.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}