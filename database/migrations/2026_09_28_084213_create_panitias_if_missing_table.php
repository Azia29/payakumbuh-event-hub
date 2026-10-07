<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('panitias')) {
            Schema::create('panitias', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('email')->nullable();
                $table->string('no_hp')->nullable();
                $table->string('jabatan');
                $table->string('divisi');
                $table->text('keterangan')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('panitias');
    }
};