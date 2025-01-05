<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DataKeluargaApiController extends Controller
{
    // Menampilkan semua data keluarga
    public function index(Request $request): JsonResponse
    {
        $search = $request->input('search');

        $data_keluarga = DataKeluarga::when($search, function ($query, $search) {
            return $query->where('no_kk', 'like', '%' . $search . '%')
                         ->orWhere('nama_kepala_keluarga', 'like', '%' . $search . '%')
                         ->orWhere('alamat', 'like', '%' . $search . '%');
        })->get();

        return response()->json(['data' => $data_keluarga], 200);
    }

    // Menyimpan data keluarga baru
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'no_kk'                => 'required',
            'nama_kepala_keluarga' => 'required',
            'alamat'               => 'required',
        ]);

        $dataKeluarga = DataKeluarga::create($validated);

        return response()->json(['message' => 'Data keluarga berhasil ditambahkan.', 'data' => $dataKeluarga], 201);
    }

    // Menampilkan detail data keluarga
    public function show($id): JsonResponse
    {
        $dataKeluarga = DataKeluarga::findOrFail($id);

        return response()->json(['data' => $dataKeluarga], 200);
    }

    // Mengupdate data keluarga yang ada
    public function update(Request $request, $id): JsonResponse
    {
        $validated = $request->validate([
            'no_kk'                => 'required',
            'nama_kepala_keluarga' => 'required',
            'alamat'               => 'required',
        ]);

        $dataKeluarga = DataKeluarga::findOrFail($id);
        $dataKeluarga->update($validated);

        return response()->json(['message' => 'Data keluarga berhasil diupdate.', 'data' => $dataKeluarga], 200);
    }

    // Menghapus data keluarga
    public function destroy($id): JsonResponse
    {
        $dataKeluarga = DataKeluarga::findOrFail($id);
        $dataKeluarga->delete();

        return response()->json(['message' => 'Data keluarga berhasil dihapus.'], 200);
    }
}
