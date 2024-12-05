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
        Schema::create('component', function (Blueprint $table) {
            $table->id();
            $table->string('kode_komponen');
            $table->string('nama_komponen');
            $table->string('nomor_item');
            $table->bigInteger('panjang');
            $table->bigInteger('lebar');
            $table->bigInteger('tinggi');
            $table->string('zona');
            $table->string('jenis');
            $table->string('pola');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component');
    }
};
