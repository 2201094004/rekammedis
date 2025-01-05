@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Data Keluarga</h3>

   
        <div class="card-body">
            <form action="{{ route('dataKeluarga.update', $dataKeluarga->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="no_kk" class="form-label">Nomor Kartu Keluarga (No KK)</label>
                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ old('no_kk', $dataKeluarga->no_kk) }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_kepala_keluarga" class="form-label">Nama Kepala Keluarga</label>
                    <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="{{ old('nama_kepala_keluarga', $dataKeluarga->nama_kepala_keluarga) }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $dataKeluarga->alamat) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('dataKeluarga.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

@endsection
