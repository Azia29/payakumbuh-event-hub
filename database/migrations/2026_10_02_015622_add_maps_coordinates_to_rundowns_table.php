<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rundowns', function (Blueprint $table) {
            if (!Schema::hasColumn('rundowns', 'latitude')) {
                $table->decimal('latitude', 10, 7)
                    ->nullable()
                    ->after('lokasi');
            }

            if (!Schema::hasColumn('rundowns', 'longitude')) {
                $table->decimal('longitude', 10, 7)
                    ->nullable()
                    ->after('latitude');
            }
        });
    }

    public function down(): void
    {
        Schema::table('rundowns', function (Blueprint $table) {
            if (Schema::hasColumn('rundowns', 'longitude')) {
                $table->dropColumn('longitude');
            }

            if (Schema::hasColumn('rundowns', 'latitude')) {
                $table->dropColumn('latitude');
            }
        });
    }
};