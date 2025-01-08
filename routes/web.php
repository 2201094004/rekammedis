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
use App\Http\Controllers\NamaObatController;
use App\Http\Controllers\KeluhanController;  
use App\Http\Controllers\MedicalController;

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

    // Keluhan Pasien
    Route::resource('keluhan-pasien', KeluhanController::class);  // Menambahkan route resource untuk KeluhanPasien

    // Dokter
    Route::resource('dokter', DokterController::class);

    // Rekam Medik
    Route::resource('rekamMedik', RekamMedikController::class);
    Route::get('/rekam_medik', [RekamMedikController::class, 'index'])->name('rekam_medik.index');

    // Resep Obat
    Route::resource('resepObat', ResepObatController::class);

    // Nama Obat (menambahkan route untuk NamaObatController)
    Route::resource('namaObat', NamaObatController::class);

    // Hasil Lab
    Route::resource('hasilLab', HasilLabController::class);

    // Tagihan Routes
    Route::resource('tagihan', TagihanController::class);

    // Sistem Pembayaran Routes
    Route::resource('sistemPembayaran', SistemPembayaranController::class);

    //Laporan Medical
    Route::get('/medical', [MedicalController::class, 'index'])->name('medical.index');
});

// Role Management
Route::resource('roles', RoleController::class);

// User
Route::resource('users', UserController::class);
