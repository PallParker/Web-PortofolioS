@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold">Tambah Data Siswa</h2>

    <form action="#" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" name="nisn" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success w-100">
            <i class="bi bi-save"></i> Simpan Data
        </button>
    </form>
</div>
@endsection
