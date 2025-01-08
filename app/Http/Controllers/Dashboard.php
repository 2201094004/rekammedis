<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\Dokter;

class Dashboard extends Controller
{
    public function index()
    {
        // Hitung jumlah total data pasien dan dokter
        $totalPasien = DataPasien::count();
        $totalDokter = Dokter::count();

        // Hitung jumlah pasien berdasarkan jenis kelamin (L/P)
        $genderCounts = DataPasien::select('jenis_kelamin', \DB::raw('count(*) as count'))
            ->groupBy('jenis_kelamin') // Tidak ada filter keluhan
            ->get();

        // Persiapkan data untuk grafik
        $genderLabels = $genderCounts->pluck('jenis_kelamin')->toArray(); // L/P
        $genderData = $genderCounts->pluck('count')->toArray(); // Jumlah pasien

        // Jika tidak ada data untuk gender, pastikan data tetap terisi (untuk menghindari error pada Chart.js)
        if (empty($genderLabels)) {
            $genderLabels = ['Laki-laki', 'Perempuan']; // Default labels
            $genderData = [0, 0]; // Default data
        }

        // Kirim data ke view dashboard
        return view('dashboard.index', compact('totalPasien', 'totalDokter', 'genderLabels', 'genderData'));
    }
}
