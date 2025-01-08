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
        Schema::create('rekam_medik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->string('keluhan');
            $table->text('diagnosa');
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('data_pasien')->onDelete('cascade');
            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medik');
    }
};
