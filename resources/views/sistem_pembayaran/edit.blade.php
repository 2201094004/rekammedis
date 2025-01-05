@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Sistem Pembayaran</h3>

    <div class="card-body">
        <form action="{{ route('sistemPembayaran.update', $sistemPembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sistem Pembayaran</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $sistemPembayaran->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required>{{ $sistemPembayaran->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('sistemPembayaran.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
