@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Nama Obat</h3>

    <form action="{{ route('namaObat.update', $namaObat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="form-control" value="{{ $namaObat->nama_obat }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $namaObat->kategori }}">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3">{{ $namaObat->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
