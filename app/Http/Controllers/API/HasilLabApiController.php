<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HasilLab;
use App\Models\DataPasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class HasilLabApiController extends Controller
{
    /**
     * Menampilkan daftar hasil laboratorium.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $hasil_lab = HasilLab::with('pasien', 'dokter') // Memanggil relasi pasien dan dokter
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('pasien', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $hasil_lab,
        ], 200);
    }

    /**
     * Menyimpan data hasil laboratorium baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id', // Pastikan pasien ada di tabel
            'hasil' => 'required|string|max:255',
            'dokter_id' => 'nullable|exists:dokter,id', // Jika dokter diisi, harus ada di tabel dokter
        ]);

        $hasil_lab = HasilLab::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data hasil laboratorium berhasil disimpan.',
            'data' => $hasil_lab,
        ], 201);
    }

    /**
     * Menampilkan detail hasil laboratorium berdasarkan ID.
     */
    public function show($id)
    {
        $hasil_lab = HasilLab::with('pasien', 'dokter')->find($id);

        if (!$hasil_lab) {
            return response()->json([
                'success' => false,
                'message' => 'Data hasil laboratorium tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $hasil_lab,
        ], 200);
    }

    /**
     * Memperbarui data hasil laboratorium.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id', // Pastikan pasien ada di tabel
            'hasil' => 'required|string|max:255',
            'dokter_id' => 'nullable|exists:dokter,id', // Jika dokter diisi, harus ada di tabel dokter
        ]);

        $hasil_lab = HasilLab::find($id);

        if (!$hasil_lab) {
            return response()->json([
                'success' => false,
                'message' => 'Data hasil laboratorium tidak ditemukan.',
            ], 404);
        }

        $hasil_lab->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Data hasil laboratorium berhasil diperbarui.',
            'data' => $hasil_lab,
        ], 200);
    }

    /**
     * Menghapus data hasil laboratorium.
     */
    public function destroy($id)
    {
        $hasil_lab = HasilLab::find($id);

        if (!$hasil_lab) {
            return response()->json([
                'success' => false,
                'message' => 'Data hasil laboratorium tidak ditemukan.',
            ], 404);
        }

        $hasil_lab->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data hasil laboratorium berhasil dihapus.',
        ], 200);
    }
}
