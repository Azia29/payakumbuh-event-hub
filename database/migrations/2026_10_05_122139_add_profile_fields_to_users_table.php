<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp', 20)->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'alamat')) {
                $table->text('alamat')->nullable()->after('no_hp');
            }

            if (!Schema::hasColumn('users', 'jenis_kelamin')) {
                $table->string('jenis_kelamin', 20)->nullable()->after('alamat');
            }

            if (!Schema::hasColumn('users', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->nullable()->after('jenis_kelamin');
            }

            if (!Schema::hasColumn('users', 'foto')) {
                $table->string('foto')->nullable()->after('tanggal_lahir');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            foreach (['foto', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_hp'] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};