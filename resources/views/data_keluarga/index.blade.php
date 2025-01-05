@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Data Keluarga</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('dataKeluarga.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari data keluarga..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('dataKeluarga.create') }}" class="btn btn-primary mb-3">Tambah Data Keluarga</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>No KK</th>
                <th>Nama Kepala Keluarga</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($data_keluarga->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($data_keluarga as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_kk }}</td>
                        <td>{{ $item->nama_kepala_keluarga }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            {{-- <a href="{{ route('dataKeluarga.show', $item->id) }}" class="btn btn-info btn-sm">Show</a> --}}
                            <a href="{{ route('dataKeluarga.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dataKeluarga.destroy', $item->id) }}" method="POST" class="d-inline">
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
