<?php

namespace App\Http\Controllers\Api;

use App\Models\SistemPembayaran;
use App\Http\Resources\SistemPembayaranResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SistemPembayaranApiController extends Controller
{
    public function index(Request $request)
    {
        $sistemPembayaran = SistemPembayaran::paginate(10);

        return SistemPembayaranResource::collection($sistemPembayaran);
    }

    public function show($id)
    {
        $sistemPembayaran = SistemPembayaran::findOrFail($id);

        return new SistemPembayaranResource($sistemPembayaran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $sistemPembayaran = SistemPembayaran::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Sistem Pembayaran berhasil ditambahkan.',
            'data' => new SistemPembayaranResource($sistemPembayaran),
        ]);
    }

    public function update(Request $request, $id)
    {
        $sistemPembayaran = SistemPembayaran::findOrFail($id);

        $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $sistemPembayaran->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Sistem Pembayaran berhasil diperbarui.',
            'data' => new SistemPembayaranResource($sistemPembayaran),
        ]);
    }

    public function destroy($id)
    {
        $sistemPembayaran = SistemPembayaran::findOrFail($id);
        $sistemPembayaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sistem Pembayaran berhasil dihapus.'
        ]);
    }
}
