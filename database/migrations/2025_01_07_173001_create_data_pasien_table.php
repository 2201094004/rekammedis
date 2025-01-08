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
        Schema::create('data_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('keluarga_id');
            // $table->unsignedBigInteger('keluhan_id')->nullable();  // Menambahkan kolom keluhan_id sebagai foreign key
            $table->timestamps();

            // Menambahkan foreign key untuk relasi keluarga_id
            $table->foreign('keluarga_id')->references('id')->on('data_keluarga')->onDelete('cascade');
            
            // Menambahkan foreign key untuk relasi keluhan_id ke tabel keluhan
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pasien');
    }
};
