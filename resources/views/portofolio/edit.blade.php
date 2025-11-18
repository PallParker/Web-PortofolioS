@extends('layout.app')

@section('title', 'Edit Portofolio')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4">Edit Portofolio Siswa</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('portofolio.update', $portofolio->nisn) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">NIS</label>
                <input type="text" name="nisn" class="form-control" value="{{ $portofolio->nisn }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="{{ $portofolio->nama_siswa }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Keahlian</label>
                <input type="text" name="keahlian" class="form-control" value="{{ $portofolio->keahlian }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Foto</label>
                @if($portofolio->foto)
                    <p><a href="{{ asset('storage/'.$portofolio->foto) }}" target="_blank">Lihat Foto Lama</a></p>
                @endif
                <input type="file" name="foto" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Sertifikat</label>
                @if($portofolio->sertifikat)
                    <p><a href="{{ asset('storage/'.$portofolio->sertifikat) }}" target="_blank">Lihat Sertifikat Lama</a></p>
                @endif
                <input type="file" name="sertifikat" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Pengalaman</label>
                <textarea name="pengalaman" class="form-control" rows="3">{{ $portofolio->pengalaman }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('portofolio.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
