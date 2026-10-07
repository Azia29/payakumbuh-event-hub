<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_panitias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained('events')
                ->cascadeOnDelete();

            $table->foreignId('panitia_id')
                ->constrained('panitias')
                ->cascadeOnDelete();

            $table->foreignId('divisi_id')
                ->constrained('divisis')
                ->restrictOnDelete();

            $table->timestamps();

            $table->unique([
                'event_id',
                'panitia_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_panitias');
    }
};