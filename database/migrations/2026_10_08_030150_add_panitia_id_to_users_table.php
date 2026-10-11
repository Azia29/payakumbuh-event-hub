<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'panitia_id')) {
                $table->foreignId('panitia_id')
                    ->nullable()
                    ->after('divisi_id')
                    ->constrained('panitias')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'panitia_id')) {
                $table->dropForeign(['panitia_id']);
                $table->dropColumn('panitia_id');
            }
        });
    }
};