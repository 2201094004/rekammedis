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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_rekam_medik')->nullable();
            $table->decimal('nominal', 15, 2);
            $table->enum('status', ['belum_dibayar', 'dibayar', 'batal'])->default('belum_dibayar');
            $table->unsignedBigInteger('sistem_pembayaran_id');
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('data_pasien')->onDelete('cascade');
            $table->foreign('id_rekam_medik')->references('id')->on('rekam_medik')->onDelete('set null');
            $table->foreign('sistem_pembayaran_id')->references('id')->on('sistem_pembayaran')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
