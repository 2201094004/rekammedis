<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    // Menampilkan daftar keluhan
    public function index(Request $request)
    {
        // Mencari keluhan berdasarkan parameter pencarian jika ada
        $search = $request->get('search');
        $keluhans = Keluhan::when($search, function ($query, $search) {
            return $query->where('deskripsi', 'like', "%$search%");
        })->paginate(10); // Melakukan pagination

        // Mengirim data keluhans ke view
        return view('keluhan.index', compact('keluhans'));
    }

    // Menampilkan form tambah keluhan
    public function create()
    {
        return view('keluhan.create');
    }

    // Menyimpan data keluhan baru
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:255',
        ]);

        // Menyimpan data keluhan ke dalam database
        Keluhan::create([
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('keluhan-pasien.index')->with('success', 'Keluhan berhasil ditambahkan.');
    }

    // Menampilkan form edit keluhan
    public function edit($id)
    {
        $keluhan = Keluhan::findOrFail($id); // Mencari keluhan berdasarkan ID
        return view('keluhan.edit', compact('keluhan'));
    }

    // Memperbarui data keluhan
    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi' => 'required|string|max:255',
        ]);

        $keluhan = Keluhan::findOrFail($id);
        $keluhan->update([
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('keluhan-pasien.index')->with('success', 'Keluhan berhasil diperbarui.');
    }

    // Menghapus data keluhan
    public function destroy($id)
    {
        $keluhan = Keluhan::findOrFail($id);
        $keluhan->delete();

        return redirect()->route('keluhan-pasien.index')->with('success', 'Keluhan berhasil dihapus.');
    }
}
