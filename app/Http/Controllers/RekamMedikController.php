<?php

namespace App\Http\Controllers;

use App\Models\RekamMedik;
use App\Models\DataPasien; // Model untuk pasien
use App\Models\User;
use App\Models\Dokter; // Model untuk dokter
use Illuminate\Http\Request;

class RekamMedikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query dengan relasi pasien
        $rekam_medik = RekamMedik::with('pasien')
            ->when($search, function ($query, $search) {
                return $query->whereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'desc') // Tambahkan pengurutan
            ->get();

        return view('rekam_medik.index', compact('rekam_medik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataPasien = DataPasien::all(); // Mengambil semua data pasien
        // $dokter = User::where('dokter')->get(); // Mengambil semua dokter
        $dokter = Dokter::all(); // Query yang benar menggunakan Spatie


        return view('rekam_medik.create', compact('dataPasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien'  => 'required|exists:data_pasien,id',
            'diagnosa'  => 'required|string',
            // 'resep'      => 'required|string',
            'keluhan' => 'required|string',
            'dokter_id'  => 'nullable|exists:dokter,id',
        ]);

        RekamMedik::create($request->all());

        return redirect()->route('rekam_medik.index')->with('success', 'Rekam medik berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        $dataPasien = DataPasien::all(); // Ambil data pasien
        $dokter = Dokter::all(); // Ambil data dokter

        return view('rekam_medik.edit', compact('rekamMedik', 'dataPasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);

        $request->validate([
            'id_pasien'  => 'required|exists:data_pasien,id',
            'diagnosa'  => 'required|string',
            // 'resep'      => 'required|string',
            'keluhan' => 'required|string',
            'dokter_id'  => 'nullable|exists:dokter,id',
        ]);

        $rekamMedik->update($request->all());

        return redirect()->route('rekam_medik.index')->with('success', 'Rekam medik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        $rekamMedik->delete();

        return redirect()->route('rekam_medik.index')->with('success', 'Rekam medik berhasil dihapus.');
    }
}
