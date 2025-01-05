@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data Dokter</h5>

        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Dokter</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $dokter->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="spesialis" class="form-label">Spesialis</label>
                <input type="text" name="spesialis" id="spesialis" class="form-control" value="{{ $dokter->spesialis }}" required>
            </div>

            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ $dokter->nomor_telepon }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required>{{ $dokter->alamat }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
