<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perlengkapans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->string('nama_perlengkapan');
            $table->integer('jumlah')->default(1);
            $table->string('satuan')->default('Unit');

            $table->enum('kondisi', [
                'Baik',
                'Rusak Ringan',
                'Rusak Berat'
            ])->default('Baik');

            $table->enum('sumber', [
                'Milik EO',
                'Sewa',
                'Pinjam'
            ])->default('Milik EO');

            $table->string('penanggung_jawab')->nullable();

            $table->enum('status', [
                'Tersedia',
                'Dipakai',
                'Dikembalikan'
            ])->default('Tersedia');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perlengkapans');
    }
};