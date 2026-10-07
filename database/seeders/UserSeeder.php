<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $divisi = DB::table('divisis')->pluck('id', 'nama_divisi');

        DB::table('users')->insert([
            [
                'name' => 'EO Ketua',
                'email' => 'ketua@eventhub.test',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi['Ketua'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EO Acara',
                'email' => 'acara@eventhub.test',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi['Acara'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EO Humas',
                'email' => 'humas@eventhub.test',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi['Humas'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EO Sponsorship',
                'email' => 'sponsorship@eventhub.test',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi['Sponsorship'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EO Dokumentasi',
                'email' => 'dokumentasi@eventhub.test',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi['Dokumentasi'],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}