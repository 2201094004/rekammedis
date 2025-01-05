<?php

namespace App\Http\Controllers\Api;

use App\Models\Tagihan;
use App\Http\Resources\TagihanResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagihanApiController extends Controller
{
    public function index(Request $request)
    {
        $tagihan = Tagihan::with(['pasien', 'rekamMedik', 'sistemPembayaran'])->paginate(10);

        return TagihanResource::collection($tagihan);
    }

    public function show($id)
    {
        $tagihan = Tagihan::with(['pasien', 'rekamMedik', 'sistemPembayaran'])->findOrFail($id);

        return new TagihanResource($tagihan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id',
            'id_rekam_medik' => 'nullable|exists:rekam_medik,id',
            'nominal' => 'required|numeric|min:0',
            'status' => 'required|in:belum_dibayar,dibayar,batal',
            'sistem_pembayaran_id' => 'required|exists:sistem_pembayaran,id',
        ]);

        $tagihan = Tagihan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil ditambahkan.',
            'data' => new TagihanResource($tagihan),
        ]);
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id',
            'id_rekam_medik' => 'nullable|exists:rekam_medik,id',
            'nominal' => 'required|numeric|min:0',
            'status' => 'required|in:belum_dibayar,dibayar,batal',
            'sistem_pembayaran_id' => 'required|exists:sistem_pembayaran,id',
        ]);

        $tagihan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil diperbarui.',
            'data' => new TagihanResource($tagihan),
        ]);
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil dihapus.'
        ]);
    }
}
