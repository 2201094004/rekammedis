<?php

namespace App\Http\Controllers\Api;

use App\Models\RekamMedik;
use App\Models\DataPasien;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekamMedikApiController extends Controller
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

        return response()->json([
            'success' => true,
            'data' => $rekam_medik
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataPasien = DataPasien::all(); // Mengambil semua data pasien
        $dokter = Dokter::all(); // Mengambil semua data dokter

        return response()->json([
            'success' => true,
            'data' => [
                'data_pasien' => $dataPasien,
                'dokter' => $dokter
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien'  => 'required|exists:data_pasien,id',
            'diagnosa'  => 'required|string',
            'keluhan' => 'required|string',
            'dokter_id'  => 'nullable|exists:dokter,id',
        ]);

        $rekamMedik = RekamMedik::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Rekam medik berhasil ditambahkan.',
            'data' => $rekamMedik
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        $dataPasien = DataPasien::all(); // Ambil data pasien
        $dokter = Dokter::all(); // Ambil data dokter

        return response()->json([
            'success' => true,
            'data' => [
                'rekam_medik' => $rekamMedik,
                'data_pasien' => $dataPasien,
                'dokter' => $dokter
            ]
        ]);
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
            'keluhan' => 'required|string',
            'dokter_id'  => 'nullable|exists:dokter,id',
        ]);

        $rekamMedik->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Rekam medik berhasil diperbarui.',
            'data' => $rekamMedik
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekamMedik = RekamMedik::findOrFail($id);
        $rekamMedik->delete();

        return response()->json([
            'success' => true,
            'message' => 'Rekam medik berhasil dihapus.'
        ]);
    }
}
