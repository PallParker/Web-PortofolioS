@extends('layout.user')

@section('title', 'Laporan Kegiatan Siswa')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 font-weight-bold text-dark">
                <i class="fa-solid fa-chart-bar"></i> Laporan Kegiatan
            </h1>
            <p class="lead text-muted">Dokumentasi kegiatan dan pencapaian siswa</p>
        </div>
    </div>

    <div class="row">
        @forelse($laporan as $item)
        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="card-title mb-1">{{ $item->nama_siswa }}</h5>
                            <p class="text-muted mb-2">
                                <i class="fa-solid fa-calendar-days"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                            </p>
                        </div>
                        <span class="badge bg-primary">{{ $item->kegiatan }}</span>
                    </div>

                    <p class="card-text">{{ $item->keterangan }}</p>

                    <div class="mt-3 text-end">
                        <small class="text-muted">
                            Dibuat: {{ $item->created_at->format('d M Y H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-info">
                <i class="fa-solid fa-info-circle fa-2x"></i>
                <h4 class="alert-heading">Belum ada laporan</h4>
                <p>Laporan kegiatan akan segera ditampilkan di sini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
