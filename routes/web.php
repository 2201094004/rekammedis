<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataKeluargaController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\RekamMedikController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\HasilLabController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\SistemPembayaranController;

// Route untuk login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route dengan autentikasi
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    // Data Keluarga
    Route::resource('dataKeluarga', DataKeluargaController::class);
    Route::get('/data_keluarga', [DataKeluargaController::class, 'index'])->name('data_keluarga.index');
    Route::get('/data-keluarga/{id}', [DataKeluargaController::class, 'show'])->name('dataKeluarga.show');

    // Data Pasien
    Route::resource('dataPasien', DataPasienController::class);
    Route::get('/data-pasien', [DataPasienController::class, 'index'])->name('dataPasien.index');
    Route::get('/data-pasien/{id}', [DataPasienController::class, 'show'])->name('dataPasien.show');

    // Dokter
    Route::resource('dokter', DokterController::class);

    // Rekam Medik
    Route::resource('rekamMedik', RekamMedikController::class);
    Route::get('/rekam_medik', [RekamMedikController::class, 'index'])->name('rekam_medik.index');

    // Resep Obat
    Route::resource('resepObat', ResepObatController::class);

    // Hasil Lab
    Route::resource('hasilLab', HasilLabController::class);

    // Tagihan Routes
    Route::resource('tagihan', TagihanController::class);

    // Sistem Pembayaran Routes
    Route::resource('sistemPembayaran', SistemPembayaranController::class);

});

// Role Management
Route::resource('roles', RoleController::class);

// User
Route::resource('user', UserController::class);
