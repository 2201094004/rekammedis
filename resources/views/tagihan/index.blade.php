@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Tagihan</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('tagihan.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari nama pasien..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('tagihan.create') }}" class="btn btn-primary mb-3">Tambah Data Tagihan</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Rekam Medik</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Sistem Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($tagihan->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($tagihan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pasien->nama }}</td>
                        <td>{{ $item->rekamMedik->keluhan ?? '-' }}</td>
                        <td>{{ number_format($item->nominal, 2) }}</td>
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ $item->sistemPembayaran->nama ?? 'Tidak ada' }}</td>
                        <td>
                            <a href="{{ route('tagihan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tagihan.destroy', $item->id) }}" method="POST" class="d-inline">
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
    {{ $tagihan->links() }}
</div>
@endsection
