@extends('layout.app')

@section('title', 'Laporan Kegiatan')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fa-solid fa-chart-bar me-2"></i> Laporan Kegiatan
        </h2>
        <a href="{{ route('laporan.cetak') }}" class="btn btn-success">
            <i class="fa-solid fa-print"></i> Cetak Laporan
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($laporan) && $laporan->count() > 0)
                        @foreach($laporan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_siswa }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->keterangan }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                <i class="fa-solid fa-circle-info"></i> Belum ada data laporan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
