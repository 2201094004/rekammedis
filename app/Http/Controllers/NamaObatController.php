<?php

namespace App\Http\Controllers;

use App\Models\NamaObat;
use Illuminate\Http\Request;

class NamaObatController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $namaObats = NamaObat::where('nama_obat', 'like', "%$search%")
            ->orWhere('kategori', 'like', "%$search%")
            ->paginate(10);

        return view('nama_obat.index', compact('namaObats'));
    }

    public function create()
    {
        return view('nama_obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        NamaObat::create($request->all());

        return redirect()->route('namaObat.index')->with('success', 'Nama Obat berhasil ditambahkan.');
    }

    public function edit(NamaObat $namaObat)
    {
        return view('nama_obat.edit', compact('namaObat'));
    }

    public function update(Request $request, NamaObat $namaObat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $namaObat->update($request->all());

        return redirect()->route('namaObat.index')->with('success', 'Nama Obat berhasil diperbarui.');
    }

    public function destroy(NamaObat $namaObat)
    {
        $namaObat->delete();

        return redirect()->route('namaObat.index')->with('success', 'Nama Obat berhasil dihapus.');
    }
}
