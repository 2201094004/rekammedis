@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Data Pasien</h3>

    <!-- Add Search Form -->
    <form method="GET" action="{{ route('dataPasien.index') }}">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari pasien berdasarkan nama atau NIK" value="{{ request()->input('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </form>

    <a href="{{ route('dataPasien.create') }}" class="btn btn-primary mb-3">Tambah Data Pasien</a>

    <!-- Data Pasien Table -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($dataPasien->isEmpty())
                <tr>
                    <td colspan="8" class="text-center">Data tidak tersedia.</td>
                </tr>
            @else
                @foreach($dataPasien as $pasien)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pasien->nik }}</td>
                        <td>{{ $pasien->nama }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->nomor_telepon }}</td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>{{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('dataPasien.show', $pasien->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('dataPasien.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dataPasien.destroy', $pasien->id) }}" method="POST" class="d-inline">
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

    <!-- Pagination Links -->
    {{ $dataPasien->links() }}
</div>
@endsection
