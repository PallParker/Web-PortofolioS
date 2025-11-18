<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 240px;
            background-color: #343a40;
            padding: 20px 15px;
            overflow-y: auto;
        }

        .sidebar h4 {
            font-weight: bold;
        }

        .sidebar-section {
            margin-bottom: 25px;
        }

        .sidebar-section h6 {
            color: #ced4da;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            padding-left: 5px;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 0.95rem;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

        .sidebar hr {
            border: 0;
            border-top: 1px solid #adb5bd; /* abu terang */
            margin: 15px 0;
        }

        .content {
            margin-left: 240px; 
            padding: 25px;
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <h4 class="text-center text-white mb-4">
            <i class="fa-solid fa-gear"></i> Admin Panel
        </h4>

        <!-- Bagian Profil -->
        <div class="sidebar-section">
            <h6>Profil</h6>
            <a href="{{ route('profil') }}">
                <i class="fa-solid fa-user-circle"></i> Profil Admin
            </a>
        </div>

        <!-- Bagian Kelola Data -->
        <div class="sidebar-section">
            <h6>Kelola Data</h6>
            <a href="{{ route('keloladata') }}">
                <i class="fa-solid fa-pen-to-square"></i> Kelola Data
            </a>
        </div>

        <!-- Bagian Portofolio & Project -->
        <div class="sidebar-section">
            <h6>Portofolio & Project</h6>
            <a href="{{ route('portofolio.index') }}">
                <i class="fa-solid fa-folder-open"></i> Kelola Portofolio
            </a>
            <a href="{{ route('project.index') }}">
                <i class="fa-solid fa-lightbulb"></i> Project / Karya
            </a>
        </div>

        <!-- Bagian Laporan -->
        <div class="sidebar-section">
            <h6>Laporan</h6>
            <a href="{{ route('laporan.index') }}">
                <i class="fa-solid fa-chart-bar"></i> Laporan
            </a>
        </div>

        <hr>

        <!-- Logout -->
        <a href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
