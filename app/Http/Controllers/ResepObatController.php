<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use App\Models\ResepObat;
use App\Models\NamaObat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $resepObats = ResepObat::with('rekamMedik.pasien', 'namaObat')
            ->where('nama_obat_id', 'like', "%$search%")  // Menggunakan nama_obat_id untuk pencarian
            ->orWhereHas('rekamMedik.pasien', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->paginate(10);

        return view('resep_obat.index', compact('resepObats'));
    }

    public function create()
    {
        // Mengambil data rekam medis dan nama obat untuk form create
        $dataRekamMedis = RekamMedik::with('pasien')->get();
        $dataNamaObat = NamaObat::all();  // Mendapatkan semua nama obat
        return view('resep_obat.create', compact('dataRekamMedis', 'dataNamaObat'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat_id' => 'required|exists:nama_obat,id',  // Menggunakan nama_obat_id sesuai relasi
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        // Menyimpan resep obat baru
        ResepObat::create([
            'id_rekam_medik' => $request->id_rekam_medik,
            'nama_obat_id' => $request->nama_obat_id,  // Menyimpan nama obat menggunakan nama_obat_id
            'dosis' => $request->dosis,
            'petunjuk' => $request->petunjuk,
        ]);

        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil ditambahkan.');
    }

    public function edit(ResepObat $resepObat)
    {
        // Mengambil data rekam medis dan nama obat untuk form edit
        $dataRekamMedis = RekamMedik::with('pasien')->get();
        $dataNamaObat = NamaObat::all();
        return view('resep_obat.edit', compact('resepObat', 'dataRekamMedis', 'dataNamaObat'));
    }

    public function update(Request $request, ResepObat $resepObat)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat_id' => 'required|exists:nama_obat,id',  // Menggunakan nama_obat_id sesuai relasi
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        // Update data resep obat
        $resepObat->update([
            'id_rekam_medik' => $request->id_rekam_medik,
            'nama_obat_id' => $request->nama_obat_id,  // Menyimpan nama obat menggunakan nama_obat_id
            'dosis' => $request->dosis,
            'petunjuk' => $request->petunjuk,
        ]);

        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil diperbarui.');
    }

    public function destroy(ResepObat $resepObat)
    {
        // Menghapus data resep obat
        $resepObat->delete();
        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil dihapus.');
    }
}
