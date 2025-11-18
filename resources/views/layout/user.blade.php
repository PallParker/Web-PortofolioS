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
        }

        .navbar {
            background-color: #343a40;
            color: white;
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/user') }}">
                <i class="fa-solid fa-graduation-cap"></i> Sistem Portofolio Siswa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user') ? 'active' : '' }}" href="{{ url('/user') }}">
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

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
