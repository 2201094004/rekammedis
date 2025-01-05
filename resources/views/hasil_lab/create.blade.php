@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Hasil Laboratorium</h3>
</div>

<div class="card-body">
    <!-- Form untuk menambah data hasil lab -->
    <form action="{{ route('hasilLab.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pasien" class="form-label">Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-control" required>
                <option value="">Pilih Pasien</option>
                @foreach($dataPasien as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="hasil" class="form-label">Hasil</label>
            <input type="text" name="hasil" id="hasil" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dokter_id" class="form-label">Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-control">
                <option value="">Pilih Dokter (Opsional)</option>
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@endsection
