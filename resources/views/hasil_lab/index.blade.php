@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Hasil Laboratorium</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('hasilLab.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari nama pasien..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('hasilLab.create') }}" class="btn btn-primary mb-3">Tambah Data Hasil Lab</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Hasil</th>
                <th>Dokter</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($hasil_lab->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($hasil_lab as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->hasil }}</td>
                        <td>{{ $item->dokter ? $item->dokter->nama : 'Tidak ada dokter' }}</td>
                        <td>
                            
                            <a href="{{ route('hasilLab.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('hasilLab.destroy', $item->id) }}" method="POST" class="d-inline">
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

    <!-- Pagination -->
    {{ $hasil_lab->links() }}
</div>
@endsection
