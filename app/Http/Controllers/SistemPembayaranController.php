<?php

namespace App\Http\Controllers;

use App\Models\SistemPembayaran;
use Illuminate\Http\Request;

class SistemPembayaranController extends Controller
{
    public function index()
    {
        $sistemPembayaran = SistemPembayaran::paginate(10);
        return view('sistem_pembayaran.index', compact('sistemPembayaran'));
    }

    public function create()
    {
        return view('sistem_pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        SistemPembayaran::create($request->all());

        return redirect()->route('sistemPembayaran.index')->with('success', 'Sistem Pembayaran berhasil ditambahkan.');
    }

    public function edit(SistemPembayaran $sistemPembayaran)
    {
        return view('sistem_pembayaran.edit', compact('sistemPembayaran'));
    }

    public function update(Request $request, SistemPembayaran $sistemPembayaran)
    {
        $request->validate([
            'nama_pembayaran' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $sistemPembayaran->update($request->all());

        return redirect()->route('sistemPembayaran.index')->with('success', 'Sistem Pembayaran berhasil diperbarui.');
    }

    public function destroy(SistemPembayaran $sistemPembayaran)
    {
        $sistemPembayaran->delete();
        return redirect()->route('sistemPembayaran.index')->with('success', 'Sistem Pembayaran berhasil dihapus.');
    }
}
