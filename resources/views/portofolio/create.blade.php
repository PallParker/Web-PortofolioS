@extends('layout.app')

@section('title', 'Tambah Portofolio')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Tambah Portofolio Siswa</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">NIS</label>
                <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Siswa" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Keahlian</label>
                <input type="text" name="keahlian" class="form-control" placeholder="Masukkan Keahlian">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Sertifikat</label>
                <input type="file" name="sertifikat" class="form-control">
                <small class="text-muted">Format file: pdf, jpg, jpeg, png</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Pengalaman</label>
                <textarea name="pengalaman" class="form-control" placeholder="Masukkan Pengalaman" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('portofolio.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
