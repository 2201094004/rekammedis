@extends('admin.app')

@section('content')
<div class="container">
    <h1>Laporan Medikal</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('medical.index') }}">
        <input type="text" name="search" placeholder="Cari berdasarkan nama pasien" class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Rekam Medik -->
    <h2>Rekam Medik</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Diagnosa</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekamMedik as $rekam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rekam->pasien->nama }}</td>
                    <td>{{ $rekam->dokter->nama }}</td>
                    <td>{{ $rekam->diagnosa }}</td>
                    <td>{{ $rekam->keluhan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabel Hasil Lab -->
    <h2>Hasil Lab</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasilLab as $hasil)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hasil->pasien->nama }}</td>
                    <td>{{ $hasil->dokter->nama }}</td>
                    <td>{{ $hasil->hasil }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tabel Obat yang Diberikan -->
    <h2>Daftar Obat</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($namaObat as $obat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->kategori }}</td>
                    <td>{{ $obat->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
