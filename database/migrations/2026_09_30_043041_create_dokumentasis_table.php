<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->string('judul');

            $table->enum('jenis', [
                'foto',
                'video',
                'dokumen',
            ]);

            $table->string('file_path');

            $table->string('nama_file');

            $table->text('keterangan')->nullable();

            $table->date('tanggal_dokumentasi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasis');
    }
};
