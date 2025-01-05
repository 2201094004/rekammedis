<?php

namespace App\Http\Controllers;

use App\Models\DataPasien;
use App\Models\Tagihan;
use App\Models\RekamMedik;
use App\Models\SistemPembayaran;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihan = Tagihan::with(['pasien', 'rekamMedik', 'sistemPembayaran'])->paginate(10);
        return view('tagihan.index', compact('tagihan'));
    }

    public function create()
    {
        $dataPasien = DataPasien::all();
        $rekamMedik = RekamMedik::all();
        $sistemPembayaran = SistemPembayaran::all();
        return view('tagihan.create', compact('dataPasien', 'rekamMedik', 'sistemPembayaran'));
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

        Tagihan::create($request->all());

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }

    public function edit(Tagihan $tagihan)
    {
        $dataPasien = DataPasien::all();
        $rekamMedik = RekamMedik::all();
        $sistemPembayaran = SistemPembayaran::all();
        return view('tagihan.edit', compact('tagihan', 'dataPasien', 'rekamMedik', 'sistemPembayaran'));
    }

    public function update(Request $request, Tagihan $tagihan)
    {
        $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id',
            'id_rekam_medik' => 'nullable|exists:rekam_medik,id',
            'nominal' => 'required|numeric|min:0',
            'status' => 'required|in:belum_dibayar,dibayar,batal',
            'sistem_pembayaran_id' => 'required|exists:sistem_pembayaran,id',
        ]);

        $tagihan->update($request->all());

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();
        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
