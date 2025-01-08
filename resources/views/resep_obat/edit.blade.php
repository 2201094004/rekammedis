@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Resep Obat</h5>

        <form action="{{ route('resepObat.update', $resepObat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_rekam_medik" class="form-label">Rekam Medik</label>
                <select name="id_rekam_medik" id="id_rekam_medik" class="form-control" required>
                    @foreach($dataRekamMedis as $rekamMedik)
                        <option value="{{ $rekamMedik->id }}" {{ $resepObat->id_rekam_medik == $rekamMedik->id ? 'selected' : '' }}>
                            {{ $rekamMedik->pasien->nama }} - {{ $rekamMedik->diagnosa }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nama_obat_id" class="form-label">Nama Obat</label>
                <select name="nama_obat_id" id="nama_obat_id" class="form-control" required>
                    @foreach($dataNamaObat as $namaObat)
                        <option value="{{ $namaObat->id }}" {{ $resepObat->nama_obat_id == $namaObat->id ? 'selected' : '' }}>
                            {{ $namaObat->nama_obat }}
                        </option>
                    @endforeach
                </select>
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
