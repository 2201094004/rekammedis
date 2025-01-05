<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataKeluarga;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    // Menampilkan semua data keluarga
    public function index(Request $request)
    {
        // Mengambil input pencarian
        $search = $request->input('search');
        
        // Mengambil data keluarga dengan pencarian
        $data_keluarga = DataKeluarga::when($search, function ($query, $search) {
            return $query->where('no_kk', 'like', '%' . $search . '%')
                         ->orWhere('nama_kepala_keluarga', 'like', '%' . $search . '%')
                         ->orWhere('alamat', 'like', '%' . $search . '%');
        })->get();

        return view('data_keluarga.index', compact('data_keluarga'));
    }

    // Menampilkan form untuk menambahkan data keluarga
    public function create()
    {
        return view('data_keluarga.create');
    }

    // Menyimpan data keluarga baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'no_kk'                => 'required',
            'nama_kepala_keluarga'  => 'required',
            'alamat'               => 'required',
        ]);

        // Menyimpan data ke dalam database
        DataKeluarga::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataKeluarga.index');
    }

    // Menampilkan detail data keluarga
    public function show($id)
    {
        // Mengambil data keluarga berdasarkan ID
        $dataKeluarga = DataKeluarga::findOrFail($id);

        // Mengembalikan tampilan detail (show) data keluarga
        return view('data_keluarga.show', compact('dataKeluarga'));
    }

    // Menampilkan form untuk mengedit data keluarga
    public function edit($id)
    {
        $dataKeluarga = DataKeluarga::findOrFail($id);
        return view('data_keluarga.edit', compact('dataKeluarga'));
    }

    // Mengupdate data keluarga yang ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'no_kk'                => 'required',
            'nama_kepala_keluarga'  => 'required',
            'alamat'               => 'required',
        ]);

        // Mengupdate data keluarga
        $dataKeluarga = DataKeluarga::findOrFail($id);
        $dataKeluarga->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataKeluarga.index')->with('success', 'Data keluarga berhasil diupdate.');
    }

    // Menghapus data keluarga
    public function destroy($id)
    {
        $dataKeluarga = DataKeluarga::findOrFail($id);
        $dataKeluarga->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataKeluarga.index')->with('success', 'Data keluarga berhasil dihapus.');
    }
}
