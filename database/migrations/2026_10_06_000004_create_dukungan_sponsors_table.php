<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('dukungan_sponsors')) {
            Schema::create('dukungan_sponsors', function (Blueprint $table) {
                $table->id();

                $table->foreignId('pengajuan_sponsor_id')
                    ->constrained('pengajuan_sponsors')
                    ->cascadeOnDelete();

                $table->decimal('nominal', 15, 2)->default(0);

                $table->enum('status_pembayaran', [
                    'belum_dibayar',
                    'menunggu_verifikasi',
                    'dibayar',
                    'ditolak'
                ])->default('belum_dibayar');

                $table->string('bukti_pembayaran')->nullable();

                $table->text('catatan')->nullable();

                $table->timestamp('tanggal_pembayaran')->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('dukungan_sponsors');
    }
};