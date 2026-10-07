<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('jenis_tiket', ['gratis', 'berbayar'])
                ->default('gratis')
                ->after('deskripsi_event');

            $table->decimal('harga_tiket', 15, 2)
                ->default(0)
                ->after('jenis_tiket');

            $table->unsignedInteger('kuota_tiket')
                ->nullable()
                ->after('harga_tiket');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'jenis_tiket',
                'harga_tiket',
                'kuota_tiket',
            ]);
        });
    }
};