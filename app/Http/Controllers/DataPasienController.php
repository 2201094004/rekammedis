<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPasien;
use App\Models\DataKeluarga;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil input pencarian
        $search = $request->input('search');
        
        // Mengambil data pasien dengan pencarian
        $dataPasien = DataPasien::when($search, function ($query, $search) {
            return $query->where('nik', 'like', '%' . $search . '%')
                         ->orWhere('nama', 'like', '%' . $search . '%')
                         ->orWhere('alamat', 'like', '%' . $search . '%');
        })->get();

        // Mengembalikan tampilan index dengan data pasien
        return view('data_pasien.index', compact('dataPasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data keluarga untuk dropdown
        $dataKeluarga = DataKeluarga::all();

        // Mengembalikan tampilan create dengan data keluarga
        return view('data_pasien.create', compact('dataKeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'keluarga_id' => 'required|exists:data_keluarga,id',
        ]);

        // session()->flush();

    
        // Menyimpan data pasien
        DataPasien::create($validatedData);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataPasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }
    

    /**
     * Menampilkan detail data pasien.
     */
    public function show($id)
    {
        // Mengambil data pasien berdasarkan ID
        $dataPasien = DataPasien::findOrFail($id);

        // Mengambil data keluarga yang terkait
        $dataKeluarga = $dataPasien->keluarga;

        // Mengembalikan tampilan detail (show) data pasien
        return view('data_pasien.show', compact('dataPasien', 'dataKeluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data pasien berdasarkan id
        $dataPasien = DataPasien::findOrFail($id);

        // Mengambil semua data keluarga untuk dropdown
        $dataKeluarga = DataKeluarga::all();

        // Mengembalikan tampilan edit dengan data pasien dan keluarga
        return view('data_pasien.edit', compact('dataPasien', 'dataKeluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik'           => 'required|string|max:255',
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'nomor_telepon' => 'required|string|max:15',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'keluarga_id'     => 'required|exists:data_keluarga,id',
        ]);

        // Mengambil data pasien dan memperbarui data
        $dataPasien = DataPasien::findOrFail($id);
        $dataPasien->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataPasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus data pasien berdasarkan id
        $dataPasien = DataPasien::findOrFail($id);
        $dataPasien->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataPasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
