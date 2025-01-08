@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Selamat Datang di Dashboard</h1>

    <div class="row justify-content-center">
        <!-- Card Total Pasien -->
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm mb-4">
                <div class="card-header text-center">
                    <h5>Total Pasien</h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title">{{ $totalPasien }}</h2>
                    <p class="card-text">Jumlah total pasien yang terdaftar di sistem.</p>
                </div>
            </div>
        </div>

        <!-- Card Total Dokter -->
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow-sm mb-4">
                <div class="card-header text-center">
                    <h5>Total Dokter</h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title">{{ $totalDokter }}</h2>
                    <p class="card-text">Jumlah total dokter yang terdaftar di sistem.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Jenis Kelamin Pasien -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header text-center">
                    <h5>Jumlah Pasien Berdasarkan Jenis Kelamin (L/P) yang Sakit</h5>
                </div>
                <div class="card-body">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('genderChart').getContext('2d');
    var genderChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($genderLabels),
            datasets: [{
                label: 'Jumlah Pasien Sakit (L/P)',
                data: @json($genderData),
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
