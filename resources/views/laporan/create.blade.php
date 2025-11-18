@extends('layout.app')

@section('title', 'Tambah Laporan')

@section('content')
<div class="container mt-4">

    <h2 class="fw-bold mb-4">
        <i class="fa-solid fa-plus me-2"></i> Tambah Laporan
    </h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
@endsection
