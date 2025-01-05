@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Tagihan</h3>

    <div class="card-body">
        <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_pasien" class="form-label">Nama Pasien</label>
                <select name="id_pasien" id="id_pasien" class="form-control" required>
                    @foreach($dataPasien as $pasien)
                        <option value="{{ $pasien->id }}" {{ $tagihan->id_pasien == $pasien->id ? 'selected' : '' }}>
                            {{ $pasien->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_rekam_medik" class="form-label">Rekam Medik</label>
                <select name="id_rekam_medik" id="id_rekam_medik" class="form-control">
                    <option value="">Tidak ada</option>
                    @foreach($rekamMedik as $rekam)
                        <option value="{{ $rekam->id }}" {{ $tagihan->id_rekam_medik == $rekam->id ? 'selected' : '' }}>
                            {{ $rekam->keluhan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $tagihan->nominal }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="belum_dibayar" {{ $tagihan->status == 'belum_dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                    <option value="dibayar" {{ $tagihan->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                    <option value="batal" {{ $tagihan->status == 'batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="sistem_pembayaran_id" class="form-label">Sistem Pembayaran</label>
                <select name="sistem_pembayaran_id" id="sistem_pembayaran_id" class="form-control" required>
                    @foreach($sistemPembayaran as $sistem)
                        <option value="{{ $sistem->id }}" {{ $tagihan->sistem_pembayaran_id == $sistem->id ? 'selected' : '' }}>
                            {{ $sistem->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
