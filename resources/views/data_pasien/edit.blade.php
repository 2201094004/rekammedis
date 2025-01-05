@extends('admin.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Data Pasien</h3>

    <div class="card-body">
        <form action="{{ route('dataPasien.update', $dataPasien->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ $dataPasien->nik }}" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $dataPasien->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $dataPasien->alamat }}</textarea>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $dataPasien->nomor_telepon }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="laki-laki" {{ $dataPasien->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ $dataPasien->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $dataPasien->tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label for="family_id" class="form-label">Keluarga</label>
                <select class="form-select" id="family_id" name="family_id" required>
                    @foreach($dataKeluarga as $keluarga)
                        <option value="{{ $keluarga->id }}" {{ $dataPasien->family_id == $keluarga->id ? 'selected' : '' }}>
                            {{ $keluarga->nama_kepala_keluarga }} (No KK: {{ $keluarga->no_kk }})
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dataPasien.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
