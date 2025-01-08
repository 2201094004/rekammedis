@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Keluhan</h3>

    <div class="card-body">
        <form action="{{ route('keluhan-pasien.update', $keluhan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Keluhan</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $keluhan->deskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('keluhan-pasien.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
