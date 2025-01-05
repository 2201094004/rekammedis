<?php 

namespace App\Http\Controllers\Api;

use App\Models\RekamMedik;
use App\Models\ResepObat;
use App\Http\Resources\ResepObatResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResepObatApiController extends Controller
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

        // Perbaiki kesalahan penulisan nama Resource
        return ResepObatResource::collection($resepObats);
    }

    public function show($id)
    {
        $resepObat = ResepObat::with('rekamMedik.pasien')->findOrFail($id);

        return new ResepObatResource($resepObat);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        $resepObat = ResepObat::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Resep Obat berhasil ditambahkan.',
            'data' => new ResepObatResource($resepObat),
        ]);
    }

    public function update(Request $request, $id)
    {
        $resepObat = ResepObat::findOrFail($id);

        $request->validate([
            'id_rekam_medik' => 'required|exists:rekam_medik,id',
            'nama_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'petunjuk' => 'required|string',
        ]);

        $resepObat->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Resep Obat berhasil diperbarui.',
            'data' => new ResepObatResource($resepObat),
        ]);
    }

    public function destroy($id)
    {
        $resepObat = ResepObat::findOrFail($id);
        $resepObat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resep Obat berhasil dihapus.'
        ]);
    }
}
