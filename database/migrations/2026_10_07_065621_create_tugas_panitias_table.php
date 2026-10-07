<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tugas_panitias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_panitia_id')
                ->constrained('event_panitias')
                ->cascadeOnDelete();

            $table->string('judul_tugas');
            $table->text('deskripsi')->nullable();

            $table->date('tanggal')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();

            $table->string('lokasi')->nullable();

            $table->enum('status', [
                'belum_dimulai',
                'sedang_dikerjakan',
                'selesai'
            ])->default('belum_dimulai');

            $table->text('catatan_panitia')->nullable();

            $table->string('token', 64)->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tugas_panitias');
    }
};