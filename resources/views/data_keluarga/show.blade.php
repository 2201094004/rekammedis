@extends('admin.app')

@section('content')

    <div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">
        <div class="border p-3" style="width: 90%; max-width: 500px;">
            <header>
                <h5>Detail Data Keluarga</h5>
            </header>
            <section>
                <p><strong>No KK:</strong> {{ $dataKeluarga->no_kk }}</p>
                <p><strong>Nama Kepala Keluarga:</strong> {{ $dataKeluarga->nama_kepala_keluarga }}</p>
                <p><strong>Alamat:</strong> {{ $dataKeluarga->alamat }}</p>
            </section>
            <footer>
                <a href="{{ route('dataKeluarga.index') }}" class="btn btn-secondary">Kembali</a>
            </footer>
        </div>
    </div>

@endsection
