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
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rekam_medik');
            $table->unsignedBigInteger('nama_obat_id'); 
            $table->string('dosis');
            $table->text('petunjuk');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->timestamps();

            $table->foreign('id_rekam_medik')->references('id')->on('rekam_medik')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('set null');
            $table->foreign('nama_obat_id')->references('id')->on('nama_obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
