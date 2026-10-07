<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->string('nama_event');

        $table->text('deskripsi_event');

        $table->date('tgl_mulai');

        $table->date('tgl_selesai');

        $table->string('lokasi_event');

        $table->string('status')
            ->default('menunggu_verifikasi');

        $table->text('alasan_penolakan')
            ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
