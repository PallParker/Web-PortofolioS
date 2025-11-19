<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portofolio Siswa')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding-top: 70px; /* Adjust for fixed navbar */
        }

        /* Navbar */
        .navbar {
            background-color: #1f1f1f;
            color: white;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }

        .nav-link.active {
            color: #0d6efd !important;
            font-weight: 600;
        }

        .content {
            padding: 30px 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
            height: 200px;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background: #1f1f1f;
            color: white;
        }

        footer h5 {
            font-weight: 600;
        }

        footer a {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            opacity: 0.7;
        }

        footer p.small {
            color: #d3d3d3;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.beranda') }}">
                <i class="fa-solid fa-graduation-cap"></i> Portofolio Siswa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('user.beranda') ? 'active' : '' }}" href="{{ route('user.beranda') }}">
                            <i class="fa-solid fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/data-siswa') ? 'active' : '' }}" href="{{ url('/user/data-siswa') }}">
                            <i class="fa-solid fa-users"></i> Data Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/portofolio') ? 'active' : '' }}" href="{{ url('/user/portofolio') }}">
                            <i class="fa-solid fa-folder-open"></i> Portofolio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/projek') ? 'active' : '' }}" href="{{ url('/user/projek') }}">
                            <i class="fa-solid fa-lightbulb"></i> Projek/Karya
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user/laporan') ? 'active' : '' }}" href="{{ url('/user/laporan') }}">
                            <i class="fa-solid fa-chart-bar"></i> Laporan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">

            <h5 class="fw-bold mb-3">
                <i class="fa-solid fa-graduation-cap me-2"></i> Portofolio Siswa
            </h5>

            <p class="text-secondary mb-4" style="margin: 0 auto; max-width: 600px;">
                Sistem Portofolio Siswa untuk menampilkan data, karya, dan laporan kegiatan.
            </p>

            <div class="d-flex justify-content-center gap-4 mb-3">
                <a href="#" class="text-white text-decoration-none">
                    <i class="fa-solid fa-envelope"></i> Email
                </a>
                <a href="#" class="text-white text-decoration-none">
                    <i class="fa-solid fa-phone"></i> Kontak
                </a>
                <a href="#" class="text-white text-decoration-none">
                    <i class="fa-solid fa-location-dot"></i> Lokasi
                </a>
            </div>

            <p class="small text-secondary mb-0">
                &copy; 2025 Portofolio Siswa. All rights reserved.
            </p>

        </div>
    </footer>
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
