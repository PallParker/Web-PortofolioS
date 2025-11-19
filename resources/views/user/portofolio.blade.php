@extends('layout.user')

@section('title', 'Portofolio Siswa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-dark">
                <i class="fa-solid fa-graduation-cap text-dark"></i> Portofolio Siswa
            </h1>
            <p class="lead text-muted">Temukan talenta dan prestasi siswa kami</p>
        </div>
    </div>

    <div class="row">
        @forelse($portofolios as $portofolio)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="{{ $portofolio->foto ? asset('img/' . $portofolio->foto) : asset('img/default.jpg') }}"
                     class="card-img-top"
                     alt="Foto {{ $portofolio->nama_siswa }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold">{{ $portofolio->nama_siswa }}</h5>
                    <p class="card-text text-muted"><strong>NISN:</strong> {{ $portofolio->nisn }}</p>

                    @if($portofolio->keahlian)
                    <p class="card-text">
                        <i class="fa-solid fa-star text-warning"></i>
                        <strong>Keahlian:</strong> {{ $portofolio->keahlian }}
                    </p>
                    @endif

                    @if($portofolio->pengalaman)
                    <p class="card-text">
                        <i class="fa-solid fa-briefcase text-info"></i>
                        <strong>Pengalaman:</strong>
                        @if(strlen($portofolio->pengalaman) > 100)
                            {{ Str::limit($portofolio->pengalaman, 100) }}
                            <details>
                                <summary style="cursor: pointer; color: #007bff;">Baca Selengkapnya</summary>
                                {{ $portofolio->pengalaman }}
                            </details>
                        @else
                            {{ $portofolio->pengalaman }}
                        @endif
                    </p>
                    @endif

                    <div class="mt-auto">
                        @if($portofolio->sertifikat)
                        <a href="{{ asset('img/' . $portofolio->sertifikat) }}"
                           class="btn btn-primary btn-sm"
                           target="_blank">
                            <i class="fa-solid fa-file-pdf"></i> Lihat Sertifikat
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fa-solid fa-info-circle fa-2x"></i>
                <h4 class="alert-heading">Belum ada portofolio</h4>
                <p>Portofolio siswa akan segera ditampilkan di sini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
