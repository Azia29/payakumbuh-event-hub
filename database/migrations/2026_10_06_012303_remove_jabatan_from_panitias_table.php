<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('panitias', 'jabatan')) {
            Schema::table('panitias', function (Blueprint $table) {
                $table->dropColumn('jabatan');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('panitias', 'jabatan')) {
            Schema::table('panitias', function (Blueprint $table) {
                $table->string('jabatan')->nullable();
            });
        }
    }
};