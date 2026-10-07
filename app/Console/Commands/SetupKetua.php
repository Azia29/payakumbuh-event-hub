<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Divisi;
use Illuminate\Support\Facades\Hash;

class SetupKetua extends Command
{
    protected $signature = 'setup:ketua';

    protected $description = 'Membuat satu akun EO Ketua';

    public function handle()
    {
        $divisi = Divisi::firstOrCreate(
            ['nama_divisi' => 'Ketua'],
            [
                'deskripsi' => 'Mengelola dan mengawasi seluruh kegiatan Event Hub.'
            ]
        );

        User::where('role', 'EO')
            ->where('divisi_id', $divisi->id)
            ->where('email', '!=', 'eoketua@gmail.com')
            ->delete();

        $user = User::updateOrCreate(
            ['email' => 'eoketua@gmail.com'],
            [
                'name' => 'EO Ketua',
                'email' => 'eoketua@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'EO',
                'divisi_id' => $divisi->id,
            ]
        );

        $this->info('======================================');
        $this->info('AKUN EO KETUA BERHASIL DISIAPKAN');
        $this->info('======================================');
        $this->info('Nama     : ' . $user->name);
        $this->info('Email    : ' . $user->email);
        $this->info('Password : 12345678');
        $this->info('Role     : ' . $user->role);
        $this->info('Divisi   : ' . $divisi->nama_divisi);

        return Command::SUCCESS;
    }
}