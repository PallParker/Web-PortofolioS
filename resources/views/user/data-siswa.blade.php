@extends('layout.user')

@section('title', 'Data Siswa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-dark">
                <i class="fa-solid fa-users"></i> Data Siswa
            </h1>
            <p class="lead text-muted">Informasi lengkap siswa terdaftar</p>
        </div>
    </div>

    <div class="row">
        @forelse($data as $siswa)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <img src="{{ $siswa->foto ? asset('img/' . $siswa->foto) : asset('img/default.jpg') }}"
                         class="rounded-circle mb-3"
                         alt="Foto {{ $siswa->nama }}"
                         style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #007bff;">
                    <h5 class="card-title">{{ $siswa->nama }}</h5>
                    <p class="text-muted mb-2"><strong>NISN:</strong> {{ $siswa->nisn }}</p>
                    <p class="text-muted mb-2"><strong>Kelas:</strong> {{ $siswa->kelas }}</p>

                    <div class="mt-3">
                        <p class="mb-1"><i class="fa-solid fa-envelope text-primary"></i> {{ $siswa->email }}</p>
                        <p class="mb-1"><i class="fa-solid fa-phone text-success"></i> {{ $siswa->no_hp }}</p>
                        @if($siswa->alamat)
                        <p class="mb-1"><i class="fa-solid fa-map-marker-alt text-danger"></i> {{ $siswa->alamat }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fa-solid fa-info-circle fa-2x"></i>
                <h4 class="alert-heading">Belum ada data siswa</h4>
                <p>Data siswa akan segera ditampilkan di sini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
