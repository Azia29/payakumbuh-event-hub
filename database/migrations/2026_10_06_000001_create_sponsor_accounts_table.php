<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('sponsor_accounts')) {
            Schema::create('sponsor_accounts', function (Blueprint $table) {
                $table->id();
                $table->string('nama_perusahaan');
                $table->string('nama_kontak');
                $table->string('email')->unique();
                $table->string('telepon')->nullable();
                $table->text('alamat')->nullable();
                $table->string('password');
                $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sponsor_accounts');
    }
};