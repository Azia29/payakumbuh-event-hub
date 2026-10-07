<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pengajuan_sponsors')) {
            Schema::create('pengajuan_sponsors', function (Blueprint $table) {
                $table->id();

                $table->foreignId('sponsor_account_id')
                    ->constrained('sponsor_accounts')
                    ->cascadeOnDelete();

                $table->foreignId('paket_sponsorship_id')
                    ->constrained('paket_sponsorships')
                    ->cascadeOnDelete();

                $table->text('pesan')->nullable();

                $table->decimal('nominal_pengajuan', 15, 2)
                    ->default(0);

                $table->enum('status', [
                    'menunggu',
                    'ditinjau',
                    'negosiasi',
                    'disetujui',
                    'ditolak',
                    'selesai'
                ])->default('menunggu');

                $table->text('catatan_eo')->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_sponsors');
    }
};