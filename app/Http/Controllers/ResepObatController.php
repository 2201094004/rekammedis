<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use App\Models\ResepObat;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $resepObats = ResepObat::with('rekamMedik.pasien')
            ->where('nama_obat', 'like', "%$search%")
            ->orWhereHas('rekamMedik.pasien', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%");
            })
            ->paginate(10);

        return view('resep_obat.index', compact('resepObats'));
    }

    public function create()
    {
        $dataRekamMedis = RekamMedik::with('pasien')->get();
        return view('resep_obat.create', compact('dataRekamMedis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        ResepObat::create($request->all());
        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil ditambahkan.');
    }

    public function edit(ResepObat $resepObat)
    {
        $dataRekamMedis = RekamMedik::with('pasien')->get();
        return view('resep_obat.edit', compact('resepObat', 'dataRekamMedik'));
    }

    public function update(Request $request, ResepObat $resepObat)
    {
        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        $resepObat->update($request->all());
        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil diperbarui.');
    }

    public function destroy(ResepObat $resepObat)
    {
        $resepObat->delete();
        return redirect()->route('resepObat.index')->with('success', 'Resep Obat berhasil dihapus.');
    }
}
