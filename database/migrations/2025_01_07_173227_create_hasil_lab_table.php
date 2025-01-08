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
        Schema::create('hasil_lab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->text('hasil');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('data_pasien')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_lab');
    }
};