@extends('layout.user')

@section('title', 'Projek/Karya Siswa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-dark">
                <i class="fa-solid fa-lightbulb"></i> Projek/Karya Siswa
            </h1>
            <p class="lead text-muted">Koleksi projek inovatif dan karya siswa</p>
        </div>
    </div>

    <div class="row">
        @forelse($projects as $project)
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                @if($project->gambar)
                <img src="{{ asset('storage/' . $project->gambar) }}"
                     class="card-img-top"
                     alt="Gambar {{ $project->judul_project }}"
                     style="height: 250px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->judul_project }}</h5>
                    <p class="card-text">
                        <strong>Oleh:</strong> {{ $project->nama_siswa }} (NISN: {{ $project->nisn }})
                    </p>

                    @if($project->kategori)
                    <p class="card-text">
                        <span class="badge bg-primary">{{ $project->kategori }}</span>
                    </p>
                    @endif

                    @if($project->deskripsi)
                    <p class="card-text">{{ Str::limit($project->deskripsi, 150) }}</p>
                    @endif

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge
                            @if($project->status == 'Selesai') bg-success
                            @elseif($project->status == 'Dalam Proses') bg-warning text-dark
                            @else bg-secondary
                            @endif">
                            {{ $project->status }}
                        </span>
                        <small class="text-muted">
                            {{ $project->created_at->format('d M Y') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fa-solid fa-info-circle fa-2x"></i>
                <h4 class="alert-heading">Belum ada projek</h4>
                <p>Projek siswa akan segera ditampilkan di sini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
