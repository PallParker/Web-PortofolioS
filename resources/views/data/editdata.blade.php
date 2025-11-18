@extends('layout.app')

@section('title', 'Edit Data Siswa')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">
        <h3 class="text-center mb-4 fw-bold">Edit Data Siswa</h3>

        <form action="{{ route('keloladata.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
            </div>
            
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nisn" value="{{ $data->nisn }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" value="{{ $data->kelas }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $data->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $data->email }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ $data->no_hp }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Foto</label><br>
                @if($data->foto)
                    <img src="{{ asset('img/' . $data->foto) }}" alt="Foto" width="80" class="mb-2 rounded shadow-sm"><br>
                @endif
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-dark w-100">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
