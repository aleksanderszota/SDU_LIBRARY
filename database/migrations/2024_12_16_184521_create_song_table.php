<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();                      // Unikalne ID piosenki
            $table->string('name');            // Nazwa piosenki
            $table->string('url');             // Ścieżka do pliku MP3
            $table->boolean('favorite')->default(false); // Czy piosenka jest ulubiona
            $table->timestamps();              // Automatyczne pola czasu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};