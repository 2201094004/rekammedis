@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Data Pasien</h5>
        <p><strong>NIK:</strong> {{ $dataPasien->nik }}</p>
        <p><strong>Nama:</strong> {{ $dataPasien->nama }}</p>
        <p><strong>Alamat:</strong> {{ $dataPasien->alamat }}</p>
        <p><strong>Nomor Telepon:</strong> {{ $dataPasien->nomor_telepon }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ ucfirst($dataPasien->jenis_kelamin) }}</p>
        <p><strong>Tanggal Lahir:</strong> {{ $dataPasien->tanggal_lahir }}</p>
        <p><strong>Keluarga:</strong> {{ $dataPasien->keluarga->nama_kepala_keluarga }} (No KK: {{ $dataPasien->keluarga->no_kk }})</p>

        <a href="{{ route('dataPasien.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
