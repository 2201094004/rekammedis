@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Keluhan</h3>

    <div class="card-body">
        <form action="{{ route('keluhan-pasien.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Keluhan</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
