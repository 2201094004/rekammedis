@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Nama Obat</h3>

    <form action="{{ route('namaObat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control">
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
