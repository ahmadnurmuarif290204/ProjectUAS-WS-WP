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
        Schema::create('qurans', function (Blueprint $table) {
            $table->id();
            $table->integer('nomorSurah');
            $table->string('namaSurah');
            $table->string('namaLatin');
            $table->integer('jumlahAyat');
            $table->string('tempatTurun');
            $table->string('arti');
            $table->text('deskripsi');
            $table->json('audio_full');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qurans');
    }
};
