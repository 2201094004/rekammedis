@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Resep Obat</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('resepObat.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari resep obat..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('resepObat.create') }}" class="btn btn-primary mb-3">Tambah Data Resep Obat</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Petunjuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($resepObats->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($resepObats as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->rekamMedik->pasien->nama ?? 'N/A' }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->dosis }}</td>
                        <td>{{ $item->petunjuk }}</td>
                        <td>
                            <a href="{{ route('resepObat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('resepObat.destroy', $item->id) }}" method="POST" class="d-inline">
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

    {{ $resepObats->links() }}
</div>
@endsection
