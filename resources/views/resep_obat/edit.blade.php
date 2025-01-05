@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Resep Obat</h5>

        <form action="{{ route('resepObat.update', $resepObat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_rekam_medis" class="form-label">Rekam Medis</label>
                <select name="id_rekam_medis" id="id_rekam_medis" class="form-control" required>
                    @foreach($dataRekamMedis as $rekamMedis)
                        <option value="{{ $rekamMedis->id }}" {{ $resepObat->id_rekam_medis == $rekamMedis->id ? 'selected' : '' }}>
                            {{ $rekamMedis->pasien->nama }} - {{ $rekamMedis->diagnosis }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" value="{{ $resepObat->nama_obat }}" required>
            </div>

            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis</label>
                <input type="text" name="dosis" id="dosis" class="form-control" value="{{ $resepObat->dosis }}" required>
            </div>

            <div class="mb-3">
                <label for="petunjuk" class="form-label">Petunjuk</label>
                <textarea name="petunjuk" id="petunjuk" class="form-control" rows="3" required>{{ $resepObat->petunjuk }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
