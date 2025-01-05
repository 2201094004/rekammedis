@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Rekam Medik</h3>

    <div class="card-body">
        <form action="{{ route('rekamMedik.update', $rekamMedik->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_pasien" class="form-label">Nama Pasien</label>
                <select name="id_pasien" id="id_pasien" class="form-control" required>
                    @foreach($dataPasien as $pasien)
                        <option value="{{ $pasien->id }}" {{ $rekamMedik->id_pasien == $pasien->id ? 'selected' : '' }}>
                            {{ $pasien->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="diagnosa" class="form-label">Diagnosis</label>
                <textarea name="diagnosa" id="diagnosa" class="form-control" rows="3" required>{{ $rekamMedik->diagnosa }}</textarea>
            </div>

            <!-- Kolom 'Resep' telah dihapus -->

            <div class="mb-3">
                <label for="dokter_id" class="form-label">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-control" required>
                    <option value="">Pilih Dokter</option>
                    @foreach($dokter as $user)
                        <option value="{{ $user->id }}" {{ $rekamMedik->dokter_id == $user->id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea name="keluhan" id="keluhan" class="form-control" rows="3" required>{{ $rekamMedik->keluhan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('rekamMedik.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
