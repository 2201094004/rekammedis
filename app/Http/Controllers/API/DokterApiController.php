<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterApiController extends Controller
{
    /**
     * Menampilkan daftar dokter.
     */
    public function index(Request $request)
    {
        $dokter = Dokter::paginate(10);

        return response()->json([
            'success' => true,
            'data' => $dokter,
        ], 200);
    }

    /**
     * Menyimpan data dokter baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $dokter = Dokter::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data Dokter berhasil ditambahkan.',
            'data' => $dokter,
        ], 201);
    }

    /**
     * Menampilkan data dokter berdasarkan ID.
     */
    public function show($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json([
                'success' => false,
                'message' => 'Data Dokter tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $dokter,
        ], 200);
    }

    /**
     * Memperbarui data dokter.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json([
                'success' => false,
                'message' => 'Data Dokter tidak ditemukan.',
            ], 404);
        }

        $dokter->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data Dokter berhasil diperbarui.',
            'data' => $dokter,
        ], 200);
    }

    /**
     * Menghapus data dokter.
     */
    public function destroy($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json([
                'success' => false,
                'message' => 'Data Dokter tidak ditemukan.',
            ], 404);
        }

        $dokter->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Dokter berhasil dihapus.',
        ], 200);
    }
}
