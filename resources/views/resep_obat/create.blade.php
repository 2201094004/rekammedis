@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Resep Obat</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('resepObat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_rekam_medik" class="form-label">Rekam Medik</label>
            <select name="id_rekam_medik" id="id_rekam_medik" class="form-control" required>
                <option value="" disabled selected>Pilih Rekam Medik</option>
                @foreach ($dataRekamMedis as $rekamMedik)
                    <option value="{{ $rekamMedik->id }}">{{ $rekamMedik->pasien->nama ?? 'N/A' }} - {{ $rekamMedik->diagnosa }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_obat" class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dosis" class="form-label">Dosis</label>
            <input type="text" name="dosis" id="dosis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="petunjuk" class="form-label">Petunjuk</label>
            <textarea name="petunjuk" id="petunjuk" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
