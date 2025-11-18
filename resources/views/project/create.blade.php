@extends('layout.app')

@section('title', 'Tambah Project')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Tambah Project / Karya Siswa</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">NISN</label>
                    <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN siswa" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan nama siswa" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Project</label>
                    <input type="text" name="judul_project" class="form-control" placeholder="Masukkan judul project" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Website">Website</option>
                        <option value="Desain">Desain</option>
                        <option value="Aplikasi">Aplikasi</option>
                        <option value="Elektronika">Elektronika</option>
                        <option value="IoT">IoT</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Belum Mulai">Belum Mulai</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('project.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
