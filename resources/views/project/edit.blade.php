@extends('layout.app')

@section('title', 'Edit Project')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Edit Project / Karya Siswa</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $project->nisn }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="{{ $project->nama_siswa }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Project</label>
                    <input type="text" name="judul_project" class="form-control" value="{{ $project->judul_project }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="Website" {{ $project->kategori == 'Website' ? 'selected' : '' }}>Website</option>
                        <option value="Desain" {{ $project->kategori == 'Desain' ? 'selected' : '' }}>Desain</option>
                        <option value="Aplikasi" {{ $project->kategori == 'Aplikasi' ? 'selected' : '' }}>Aplikasi</option>
                        <option value="Elektronika" {{ $project->kategori == 'Elektronika' ? 'selected' : '' }}>Elektronika</option>
                        <option value="Elektronika" {{ $project->kategori == 'IoT' ? 'selected' : '' }}>IoT</option>
                        <option value="Lainnya" {{ $project->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label class="form-label fw-semibold">Gambar</label><br>
                    @if($project->gambar)
                        <img src="{{ asset('storage/' . $project->gambar) }}" width="120" class="rounded mb-2 shadow-sm">
                    @endif
                    <input type="file" name="gambar" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Proses" {{ $project->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $project->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="Belum Mulai" {{ $project->status == 'Belum Mulai' ? 'selected' : '' }}>Belum Mulai</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('project.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Perbarui Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
