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
        Schema::create('sistem_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembayaran'); // Contoh: BPJS, Tunai, Kartu Kredit
            $table->text('deskripsi')->nullable(); // Penjelasan metode pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistem_pembayaran');
    }
};
