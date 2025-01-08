<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use App\Models\DataPasien;
use App\Models\HasilLab;
use App\Models\NamaObat;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Pencarian berdasarkan nama pasien
        $search = $request->input('search');

        $rekamMedik = RekamMedik::with(['pasien', 'dokter'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'like', "%" . $search . "%");
                });
            })
            ->get();

        // Ambil data hasil lab yang terhubung dengan pasien dan dokter
        $hasilLab = HasilLab::with('pasien', 'dokter')
            ->when($search, function ($query, $search) {
                return $query->whereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'like', "%" . $search . "%");
                });
            })
            ->get();

        // Ambil data obat yang diresepkan
        $namaObat = NamaObat::all();

        return view('medical.index', compact('rekamMedik', 'hasilLab', 'namaObat'));
    }
}
