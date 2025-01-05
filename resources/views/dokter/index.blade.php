@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Dokter</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('dokter.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari data dokter..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('dokter.create') }}" class="btn btn-primary mb-3">Tambah Data Dokter</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($dokter->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($dokter as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->spesialis }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('dokter.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dokter.destroy', $item->id) }}" method="POST" class="d-inline">
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
