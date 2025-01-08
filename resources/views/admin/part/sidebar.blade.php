<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rekam Medis')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper d-flex">
        
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar bg-dark text-light">
            <div class="sidebar-content js-simplebar">
                
                <a class="sidebar-brand text-light d-flex align-items-center py-3" href="#">
                    <i class="align-middle" data-feather="activity" aria-label="logo"></i>
                    <span class="align-middle ms-2 fw-bold">Rekam Medis</span>
                </a>
                
                <ul class="sidebar-nav">
                    <!-- Dashboard -->
                    <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('dashboard') }}">
                            <i class="align-middle me-2" data-feather="home" aria-label="Dashboard"></i>
                            Dashboard
                        </a>
                    </li>

                    <!-- Data Keluarga -->
                    <li class="sidebar-item {{ request()->is('data_keluarga') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('data_keluarga.index') }}">
                            <i class="bi bi-people me-2" aria-label="Data Keluarga"></i>
                            Data Keluarga
                        </a>
                    </li>

                    <!-- Keluhan Pasien -->
                    {{-- <li class="sidebar-item {{ request()->is('keluhan-pasien') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('keluhan-pasien.index') }}">
                            <i class="bi bi-chat-dots me-2" aria-label="Keluhan Pasien"></i>
                            Keluhan Pasien
                        </a>
                    </li> --}}

                    <!-- Data Pasien -->
                    <li class="sidebar-item {{ request()->is('data-pasien') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('dataPasien.index') }}">
                            <i class="bi bi-person me-2" aria-label="Data Pasien"></i>
                            Data Pasien
                        </a>
                    </li>
                    
                    <!-- Dokter -->
                    <li class="sidebar-item {{ request()->is('dokter') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('dokter.index') }}">
                            <i class="bi bi-person-badge me-2" aria-label="Dokter"></i>
                            Dokter
                        </a>
                    </li>

                    <!-- Rekam Medik -->
                    <li class="sidebar-item {{ request()->is('rekamMedik') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('rekamMedik.index') }}">
                            <i class="bi bi-journal me-2" aria-label="Rekam Medik"></i>
                            Rekam Medik
                        </a>
                    </li>
 
                     <!-- Nama Obat -->
                     <li class="sidebar-item {{ request()->is('nama-obat') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('namaObat.index') }}">
                            <i class="bi bi-capsule me-2" aria-label="Nama Obat"></i>
                            Nama Obat
                        </a>
                    </li>

                    <!-- Resep Obat -->
                    <li class="sidebar-item {{ request()->is('resepObat') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('resepObat.index') }}">
                            <i class="bi bi-file-earmark-medical me-2" aria-label="Resep Obat"></i>
                            Resep Obat
                        </a>
                    </li>

                    <!-- Hasil Lab -->
                    <li class="sidebar-item {{ request()->is('hasil-lab') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('hasilLab.index') }}">
                            <i class="bi bi-file-earmark-bar-graph me-2" aria-label="Hasil Lab"></i>
                            Hasil Lab
                        </a>
                    </li>

                    <!-- Tagihan -->
                    <li class="sidebar-item {{ request()->is('tagihan') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('tagihan.index') }}">
                            <i class="bi bi-receipt me-2" aria-label="Tagihan"></i>
                            Tagihan
                        </a>
                    </li>

                    <!-- Sistem Pembayaran -->
                    <li class="sidebar-item {{ request()->is('sistem-pembayaran') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('sistemPembayaran.index') }}">
                            <i class="bi bi-credit-card me-2" aria-label="Sistem Pembayaran"></i>
                            Sistem Pembayaran
                        </a>
                    </li>

                    <li class="sidebar-item {{ request()->is('data-pasien') || request()->is('dokter') || request()->is('rekamMedik') || request()->is('nama-obat') || request()->is('resepObat') || request()->is('hasil-lab') || request()->is('tagihan') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="#medicalSection" data-bs-toggle="collapse" aria-expanded="false" aria-controls="medicalSection">
                            <i class="bi bi-heart me-2" aria-label="Medical"></i>
                            Laporan Rekam Medis  
                        </a>
                    </li>    

                    <!-- Role Management -->
                    <li class="sidebar-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('roles.index') }}">
                            <i class="align-middle me-2" data-feather="users" aria-label="Role"></i>
                            Role
                        </a>
                    </li>

                    <!-- User Management -->
                    <li class="sidebar-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <a class="sidebar-link text-light" href="{{ route('users.index') }}">
                            <i class="align-middle me-2" data-feather="user-check" aria-label="User"></i>
                            User
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="sidebar-link text-light">
                                <i class="bi bi-box-arrow-right me-2" aria-label="Log Out"></i>
                                Log Out
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        {{-- <div class="content-wrapper flex-fill">
            <div class="container-fluid py-3">
                @yield('content')
            </div>
        </div> --}}
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Activate Feather Icons
        feather.replace();
    </script>
</body>
</html>
