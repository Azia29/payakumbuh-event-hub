<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->nullable()
                ->constrained('events')
                ->nullOnDelete();

            $table->string('nama_perusahaan');
            $table->string('nama_kontak')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat')->nullable();

            $table->string('jenis_dukungan')->nullable();

            $table->decimal('nominal_dukungan', 15, 2)
                ->nullable();

            $table->enum('status', [
                'calon',
                'proposal_dikirim',
                'negosiasi',
                'disetujui',
                'ditolak',
                'selesai'
            ])->default('calon');

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};
