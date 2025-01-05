@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Sistem Pembayaran</h3>
</div>

<div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sistemPembayaran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_pembayaran" class="form-label">Nama Sistem Pembayaran</label>
            <input type="text" class="form-control" id="nama_pembayaran" name="nama_pembayaran" value="{{ old('nama_pembayaran') }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
