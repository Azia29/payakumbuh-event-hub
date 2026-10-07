<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('negosiasi_sponsors')) {
            Schema::create('negosiasi_sponsors', function (Blueprint $table) {
                $table->id();

                $table->foreignId('pengajuan_sponsor_id')
                    ->constrained('pengajuan_sponsors')
                    ->cascadeOnDelete();

                $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete();

                $table->enum('pengirim', ['sponsor', 'eo']);

                $table->text('pesan');

                $table->decimal('nominal_tawaran', 15, 2)
                    ->nullable();

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('negosiasi_sponsors');
    }
};