@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Rekam Medik</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('rekamMedik.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari rekam medik..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('rekamMedik.create') }}" class="btn btn-primary mb-3">Tambah Data Rekam Medik</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Diagnosis</th>
                <th>Dokter</th>
                <th>Keluhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($rekam_medik->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($rekam_medik as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->diagnosa }}</td>
                        <td>{{ $item->dokter->nama }}</td> 
                        <td>{{ $item->keluhan }}</td>
                        <td>
                            <a href="{{ route('rekamMedik.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('rekamMedik.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
