<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;

class Dashboard extends Controller
{
    public function index()
    {
        // Mengambil data jumlah pasien per bulan
        $chartData = DataPasien::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Mapping bulan menjadi nama bulan
        $bulan = $chartData->pluck('bulan')->map(function ($b) {
            return date("F", mktime(0, 0, 0, $b, 1)); // Mengubah angka bulan menjadi nama bulan
        })->toArray();

        // Mengambil jumlah total pasien
        $total = $chartData->pluck('total')->toArray();

        // Mengirim data ke view
        return view('dashboard.index', compact('bulan', 'total'));
    }
}
