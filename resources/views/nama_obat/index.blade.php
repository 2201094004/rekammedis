@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Nama Obat</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('namaObat.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari nama obat..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('namaObat.create') }}" class="btn btn-primary mb-3">Tambah Nama Obat</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($namaObats->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($namaObats as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->kategori ?? 'N/A' }}</td>
                        <td>{{ $item->keterangan ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('namaObat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('namaObat.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{ $namaObats->links() }}
</div>
@endsection
