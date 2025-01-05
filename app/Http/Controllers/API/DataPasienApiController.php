<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPasien;
use App\Models\DataKeluarga;

class DataPasienApiController extends Controller
{
    /**
     * Menampilkan semua data pasien.
     */
    public function index(Request $request)
    {
        // Mengambil input pencarian
        $search = $request->input('search');
        
        // Mengambil data pasien dengan pencarian
        $dataPasien = DataPasien::when($search, function ($query, $search) {
            return $query->where('nik', 'like', '%' . $search . '%')
                         ->orWhere('nama', 'like', '%' . $search . '%')
                         ->orWhere('alamat', 'like', '%' . $search . '%');
        })->get();

        return response()->json(['success' => true, 'data' => $dataPasien], 200);
    }

    /**
     * Menyimpan data pasien baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'keluarga_id' => 'required|exists:data_keluarga,id',
        ]);

        // Menyimpan data pasien
        $dataPasien = DataPasien::create($validatedData);

        return response()->json(['success' => true, 'data' => $dataPasien], 201);
    }

    /**
     * Menampilkan detail data pasien.
     */
    public function show($id)
    {
        $dataPasien = DataPasien::with('keluarga')->find($id);

        if (!$dataPasien) {
            return response()->json(['success' => false, 'message' => 'Data pasien tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $dataPasien], 200);
    }

    /**
     * Memperbarui data pasien.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik'           => 'required|string|max:255',
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'keluarga_id'   => 'required|exists:data_keluarga,id',
        ]);

        // Mengambil data pasien dan memperbarui data
        $dataPasien = DataPasien::find($id);

        if (!$dataPasien) {
            return response()->json(['success' => false, 'message' => 'Data pasien tidak ditemukan'], 404);
        }

        $dataPasien->update($validatedData);

        return response()->json(['success' => true, 'data' => $dataPasien], 200);
    }

    /**
     * Menghapus data pasien.
     */
    public function destroy($id)
    {
        $dataPasien = DataPasien::find($id);

        if (!$dataPasien) {
            return response()->json(['success' => false, 'message' => 'Data pasien tidak ditemukan'], 404);
        }

        $dataPasien->delete();

        return response()->json(['success' => true, 'message' => 'Data pasien berhasil dihapus'], 200);
    }
}
