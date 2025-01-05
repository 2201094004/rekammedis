@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Rekam Medik</h3>
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

    <form action="{{ route('rekamMedik.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_pasien" class="form-label">Nama Pasien</label>
            <select class="form-select" id="id_pasien" name="id_pasien" required>
                <option value="">Pilih Pasien</option>
                @foreach($dataPasien as $pasien)
                    <option value="{{ $pasien->id }}" {{ old('id_pasien') == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosis</label>
            <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" required>{{ old('diagnosa') }}</textarea>
        </div>

        <!-- Kolom 'Resep' telah dihapus -->

        <div class="mb-3">
            <label for="dokter_id" class="form-label">Nama Dokter</label>
            <select class="form-select" id="dokter_id" name="dokter_id" required>
                <option value="">Pilih Dokter</option>
                @foreach($dokter as $dokter)
                    <option value="{{ $dokter->id }}" {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required>{{ old('keluhan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
