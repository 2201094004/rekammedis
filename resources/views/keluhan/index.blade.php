@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tabel Keluhan</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Pencarian -->
    <form action="{{ route('keluhan.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari keluhan..." value="{{ request('search') }}">
    </form>

    <a href="{{ route('keluhan.create') }}" class="btn btn-primary mb-3">Tambah Keluhan</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Keluhan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($keluhans->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($keluhans as $keluhan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $keluhan->keluhan }}</td>
                        <td>
                            <a href="{{ route('keluhan.edit', $keluhan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('keluhan.destroy', $keluhan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus keluhan ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $keluhans->links() }}

</div>
@endsection
