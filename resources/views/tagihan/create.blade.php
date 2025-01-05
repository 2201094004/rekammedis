@extends('admin.app')

@section('content')
<div class="container">
    <h3>Tambah Tagihan</h3>
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

    <form action="{{ route('tagihan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_pasien" class="form-label">Nama Pasien</label>
            <select class="form-select" id="id_pasien" name="id_pasien" required>
                <option value="">Pilih Pasien</option>
                @foreach($dataPasien as $pasien)
                    <option value="{{ $pasien->id }}" {{ old('id_pasien') == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_rekam_medik" class="form-label">Rekam Medik</label>
            <select class="form-select" id="id_rekam_medik" name="id_rekam_medik">
                <option value="">Tidak ada</option>
                @foreach($rekamMedik as $rekam)
                    <option value="{{ $rekam->id }}" {{ old('id_rekam_medik') == $rekam->id ? 'selected' : '' }}>
                        {{ $rekam->keluhan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="belum_dibayar" {{ old('status') == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                <option value="dibayar" {{ old('status') == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                <option value="batal" {{ old('status') == 'batal' ? 'selected' : '' }}>Batal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="sistem_pembayaran_id" class="form-label">Sistem Pembayaran</label>
            <select class="form-select" id="sistem_pembayaran_id" name="sistem_pembayaran_id" required>
                @foreach($sistemPembayaran as $sistem)
                    <option value="{{ $sistem->id }}" {{ old('sistem_pembayaran_id') == $sistem->id ? 'selected' : '' }}>
                        {{ $sistem->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
