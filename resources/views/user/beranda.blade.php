@extends('layout.user')

@section('title', 'Beranda - Sistem Portofolio Siswa')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-dark mb-3">
                <i class="fa-solid fa-graduation-cap text-primary"></i> Selamat Datang
            </h1>
            <p class="lead text-muted mb-4">
                Sistem Portofolio Siswa - Temukan talenta dan prestasi siswa kami
            </p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="mb-4">
                        Platform ini menyediakan informasi lengkap tentang siswa, portofolio prestasi,
                        projek/karya inovatif, dan laporan kegiatan siswa.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-users fa-3x text-primary mb-3"></i>
                    <h4 class="card-title">Data Siswa</h4>
                    <p class="card-text">Informasi lengkap tentang siswa terdaftar</p>
                    <a href="{{ url('/user/data-siswa') }}" class="btn btn-primary">
                        <i class="fa-solid fa-eye"></i> Lihat Data
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-folder-open fa-3x text-success mb-3"></i>
                    <h4 class="card-title">Portofolio</h4>
                    <p class="card-text">Koleksi prestasi dan keahlian siswa</p>
                    <a href="{{ url('/user/portofolio') }}" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i> Lihat Portofolio
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-lightbulb fa-3x text-warning mb-3"></i>
                    <h4 class="card-title">Projek/Karya</h4>
                    <p class="card-text">Kumpulan projek inovatif siswa</p>
                    <a href="{{ url('/user/projek') }}" class="btn btn-warning text-white">
                        <i class="fa-solid fa-eye"></i> Lihat Projek
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-chart-bar fa-3x text-info mb-3"></i>
                    <h4 class="card-title">Laporan</h4>
                    <p class="card-text">Laporan kegiatan dan pencapaian</p>
                    <a href="{{ url('/user/laporan') }}" class="btn btn-info text-white">
                        <i class="fa-solid fa-eye"></i> Lihat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title mb-3">Tentang Sistem Ini</h3>
                    <p class="card-text">
                        Sistem Portofolio Siswa dirancang untuk memfasilitasi dokumentasi dan publikasi
                        prestasi siswa. Dengan platform ini, siswa dapat memamerkan keahlian, projek,
                        dan pencapaian mereka kepada khalayak umum tanpa batasan akses.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <i class="fa-solid fa-shield-alt fa-2x text-success mb-2"></i>
                            <h6>Akses Publik</h6>
                            <small class="text-muted">Semua informasi dapat diakses tanpa login</small>
                        </div>
                        <div class="col-md-4">
                            <i class="fa-solid fa-mobile-alt fa-2x text-primary mb-2"></i>
                            <h6>Responsif</h6>
                            <small class="text-muted">Tampilan optimal di semua perangkat</small>
                        </div>
                        <div class="col-md-4">
                            <i class="fa-solid fa-search fa-2x text-info mb-2"></i>
                            <h6>Mudah Dicari</h6>
                            <small class="text-muted">Informasi mudah ditemukan dan diakses</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
