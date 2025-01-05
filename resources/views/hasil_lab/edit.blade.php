@extends('admin.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Hasil Laboratorium</h5>

        <form action="{{ route('hasilLab.update', $hasilLab->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_pasien" class="form-label">Pasien</label>
                <select name="id_pasien" id="id_pasien" class="form-control" required>
                    @foreach($dataPasien as $pasien)
                        <option value="{{ $pasien->id }}" {{ $hasilLab->id_pasien == $pasien->id ? 'selected' : '' }}>
                            {{ $pasien->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="hasil" class="form-label">Hasil</label>
                <input type="text" name="hasil" id="hasil" class="form-control" value="{{ $hasilLab->hasil }}" required>
            </div>
            <div class="mb-3">
                <label for="dokter_id" class="form-label">Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-control">
                    <option value="">Pilih Dokter (Opsional)</option>
                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ $hasilLab->dokter_id == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>        
    </div>
</div>
@endsection
