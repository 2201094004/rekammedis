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
        // Create table nama_obat
        Schema::create('nama_obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('kategori')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop table nama_obat
        Schema::dropIfExists('nama_obat');
    }
};
