<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            if (!Schema::hasColumn('jadwals', 'latitude')) {
                $table->decimal('latitude', 10, 7)
                    ->nullable()
                    ->after('lokasi');
            }

            if (!Schema::hasColumn('jadwals', 'longitude')) {
                $table->decimal('longitude', 10, 7)
                    ->nullable()
                    ->after('latitude');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jadwals', function (Blueprint $table) {
            if (Schema::hasColumn('jadwals', 'longitude')) {
                $table->dropColumn('longitude');
            }

            if (Schema::hasColumn('jadwals', 'latitude')) {
                $table->dropColumn('latitude');
            }
        });
    }
};