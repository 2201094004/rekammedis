<?php

namespace App\Http\Controllers;

use App\Models\HasilLab;
use App\Models\DataPasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class HasilLabController extends Controller
{
    // Menampilkan daftar hasil lab
    public function index(Request $request)
    {
        $search = $request->get('search');
        $hasil_lab = HasilLab::with('pasien', 'dokter') // Memanggil model HasilLab dengan relasi pasien dan dokter
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('pasien', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        return view('hasil_lab.index', compact('hasil_lab'));
    }

    // Menampilkan form untuk membuat hasil lab
    public function create()
    {
        $dataPasien = DataPasien::all(); // Mendapatkan data pasien
        $dokters = Dokter::all(); // Mendapatkan data dokter
        return view('hasil_lab.create', compact('dataPasien', 'dokters'));
    }

    // Menyimpan data hasil lab baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id', // Pastikan pasien ada di tabel
            'hasil' => 'required|string|max:255',
            'dokter_id' => 'nullable|exists:dokter,id', // Jika dokter diisi, harus ada di tabel dokter
        ]);

        // Menyimpan data hasil lab
        HasilLab::create([
            'id_pasien' => $request->id_pasien,
            'hasil' => $request->hasil,
            'dokter_id' => $request->dokter_id,
        ]);

        return redirect()->route('hasilLab.index')->with('success', 'Data hasil laboratorium berhasil disimpan.');
    }

    // Menampilkan form untuk mengedit hasil lab
    public function edit(HasilLab $hasilLab)
    {
        $dataPasien = DataPasien::all(); // Mendapatkan data pasien
        $dokters = Dokter::all(); // Mendapatkan data dokter
        return view('hasil_lab.edit', compact('hasilLab', 'dataPasien', 'dokters'));
    }

    // Memperbarui data hasil lab
    public function update(Request $request, HasilLab $hasilLab)
    {
        $request->validate([
            'id_pasien' => 'required|exists:data_pasien,id', // Pastikan pasien ada di tabel
            'hasil' => 'required|string|max:255',
            'dokter_id' => 'nullable|exists:dokter,id', // Jika dokter diisi, harus ada di tabel dokter
        ]);

        // Memperbarui data hasil lab
        $hasilLab->update([
            'id_pasien' => $request->id_pasien,
            'hasil' => $request->hasil,
            'dokter_id' => $request->dokter_id,
        ]);

        return redirect()->route('hasilLab.index')->with('success', 'Data hasil laboratorium berhasil diperbarui.');
    }

    // Menghapus data hasil lab
    public function destroy(HasilLab $hasilLab)
    {
        $hasilLab->delete();

        return redirect()->route('hasilLab.index')->with('success', 'Data hasil laboratorium berhasil dihapus.');
    }
}
