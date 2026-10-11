<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('dokumentasis', 'file_path') && ! Schema::hasColumn('dokumentasis', 'file')) {
            Schema::table('dokumentasis', function (Blueprint $table) {
                $table->renameColumn('file_path', 'file');
            });
        }

        if (Schema::hasColumn('dokumentasis', 'tanggal_dokumentasi') && ! Schema::hasColumn('dokumentasis', 'tanggal')) {
            Schema::table('dokumentasis', function (Blueprint $table) {
                $table->renameColumn('tanggal_dokumentasi', 'tanggal');
            });
        }

        Schema::table('dokumentasis', function (Blueprint $table) {
            if (Schema::hasColumn('dokumentasis', 'file')) {
                $table->string('file')->nullable()->change();
            }
            if (Schema::hasColumn('dokumentasis', 'nama_file')) {
                $table->string('nama_file')->nullable()->change();
            }
            if (Schema::hasColumn('dokumentasis', 'jenis')) {
                $table->string('jenis', 100)->change();
            }
        });

        Schema::table('dokumentasis', function (Blueprint $table) {
            if (! Schema::hasColumn('dokumentasis', 'status')) {
                $table->string('status', 20)->default('draft');
            }
            if (! Schema::hasColumn('dokumentasis', 'published_at')) {
                $table->timestamp('published_at')->nullable();
            }
            if (! Schema::hasColumn('dokumentasis', 'published_by')) {
                $table->foreignId('published_by')->nullable()->constrained('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('dokumentasis', function (Blueprint $table) {
            $table->dropConstrainedForeignId('published_by');
            $table->dropColumn(['status', 'published_at']);
        });
    }
};