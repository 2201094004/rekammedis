<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DataPasienApiController;
use App\Http\Controllers\API\DokterApiController;
use App\Http\Controllers\API\HasilLabApiController;
use App\Http\Controllers\API\ResepObatApiController;
use App\Http\Controllers\API\TagihanApiController;
use App\Http\Controllers\API\SistemPembayaranApiController;
use App\Http\Controllers\API\DataKeluargaApiController;
use App\Http\Controllers\API\RekamMedikApiController;

// Route untuk Data Pasien
Route::prefix('data-pasien')->group(function () {
    Route::get('/', [DataPasienApiController::class, 'index']);         // List semua data pasien
    Route::post('/', [DataPasienApiController::class, 'store']);        // Tambah data pasien baru
    Route::get('/{id}', [DataPasienApiController::class, 'show']);      // Detail data pasien
    Route::put('/{id}', [DataPasienApiController::class, 'update']);    // Update data pasien
    Route::delete('/{id}', [DataPasienApiController::class, 'destroy']); // Hapus data pasien
});

// Route untuk Dokter
Route::prefix('dokter')->group(function () {
    Route::get('/', [DokterApiController::class, 'index']);             // List semua dokter
    Route::post('/', [DokterApiController::class, 'store']);            // Tambah dokter baru
    Route::get('/{id}', [DokterApiController::class, 'show']);          // Detail dokter
    Route::put('/{id}', [DokterApiController::class, 'update']);        // Update data dokter
    Route::delete('/{id}', [DokterApiController::class, 'destroy']);    // Hapus dokter
});

// Route untuk Hasil Lab
Route::prefix('hasil-lab')->group(function () {
    Route::get('/', [HasilLabApiController::class, 'index']);           // List semua hasil lab
    Route::post('/', [HasilLabApiController::class, 'store']);          // Tambah hasil lab baru
    Route::get('/{id}', [HasilLabApiController::class, 'show']);        // Detail hasil lab
    Route::put('/{id}', [HasilLabApiController::class, 'update']);      // Update hasil lab
    Route::delete('/{id}', [HasilLabApiController::class, 'destroy']);  // Hapus hasil lab
});

// Route untuk Resep Obat
Route::prefix('resep-obat')->group(function () {
    Route::get('/', [ResepObatApiController::class, 'index']);          // List semua resep obat
    Route::post('/', [ResepObatApiController::class, 'store']);         // Tambah resep obat baru
    Route::get('/{id}', [ResepObatApiController::class, 'show']);       // Detail resep obat
    Route::put('/{id}', [ResepObatApiController::class, 'update']);     // Update resep obat
    Route::delete('/{id}', [ResepObatApiController::class, 'destroy']); // Hapus resep obat
});

// Route untuk Tagihan
Route::prefix('tagihan')->group(function () {
    Route::get('/', [TagihanApiController::class, 'index']);            // List semua tagihan
    Route::post('/', [TagihanApiController::class, 'store']);           // Tambah tagihan baru
    Route::get('/{id}', [TagihanApiController::class, 'show']);         // Detail tagihan
    Route::put('/{id}', [TagihanApiController::class, 'update']);       // Update tagihan
    Route::delete('/{id}', [TagihanApiController::class, 'destroy']);   // Hapus tagihan
});

// Route untuk Sistem Pembayaran
Route::prefix('sistem-pembayaran')->group(function () {
    Route::get('/', [SistemPembayaranApiController::class, 'index']);   // List semua sistem pembayaran
    Route::post('/', [SistemPembayaranApiController::class, 'store']);  // Tambah sistem pembayaran baru
    Route::get('/{id}', [SistemPembayaranApiController::class, 'show']);// Detail sistem pembayaran
    Route::put('/{id}', [SistemPembayaranApiController::class, 'update']); // Update sistem pembayaran
    Route::delete('/{id}', [SistemPembayaranApiController::class, 'destroy']); // Hapus sistem pembayaran
});

// Route untuk Data Keluarga
Route::prefix('data-keluarga')->group(function () {
    Route::get('/', [DataKeluargaApiController::class, 'index']);       // List semua data keluarga
    Route::post('/', [DataKeluargaApiController::class, 'store']);      // Tambah data keluarga baru
    Route::get('/{id}', [DataKeluargaApiController::class, 'show']);    // Detail data keluarga
    Route::put('/{id}', [DataKeluargaApiController::class, 'update']);  // Update data keluarga
    Route::delete('/{id}', [DataKeluargaApiController::class, 'destroy']); // Hapus data keluarga
});

// Route untuk Rekam Medik
Route::prefix('rekam-medik')->group(function () {
    Route::get('/', [RekamMedikApiController::class, 'index']);         // List semua rekam medik
    Route::post('/', [RekamMedikApiController::class, 'store']);        // Tambah rekam medik baru
    Route::get('/{id}', [RekamMedikApiController::class, 'show']);      // Detail rekam medik
    Route::put('/{id}', [RekamMedikApiController::class, 'update']);    // Update rekam medik
    Route::delete('/{id}', [RekamMedikApiController::class, 'destroy']); // Hapus rekam medik
});
