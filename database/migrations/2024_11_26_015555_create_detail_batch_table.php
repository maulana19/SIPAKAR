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
        Schema::create('detail_batch', function (Blueprint $table) {
            $table->id();
            $table->string('kode_detail');
            $table->string('nomor_batch');
            $table->string('nomor_komponen');
            $table->bigInteger('target');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_batch');
    }
};
