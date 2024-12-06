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
        Schema::create('percetakans', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_cetak',255);
            $table->integer('harga_cetak');
            $table->string('gambar_cetak',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percetakans');
    }
};
