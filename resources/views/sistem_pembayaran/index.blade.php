@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Sistem Pembayaran</h3>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search Form -->
    <form action="{{ route('sistemPembayaran.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari nama sistem pembayaran..." value="{{ request('search') }}">
    </form>

    <!-- Add New Payment System Button -->
    <a href="{{ route('sistemPembayaran.create') }}" class="btn btn-primary mb-3">Tambah Sistem Pembayaran</a>

    <!-- Table for Payment Systems -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Sistem Pembayaran</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($sistemPembayaran->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($sistemPembayaran as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pembayaran }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="{{ route('sistemPembayaran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('sistemPembayaran.destroy', $item->id) }}" method="POST" class="d-inline">
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

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $sistemPembayaran->links() }}
    </div>
</div>
@endsection
