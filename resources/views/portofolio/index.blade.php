@extends('layout.app')

@section('title', 'Kelola Portofolio')

@section('content')
<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">
            <!-- Judul dan Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h2 class="fw-bold mb-0 text-primary">
                    <i class="fa-solid fa-folder-open"></i> Kelola Portofolio Siswa
                </h2>

                <a href="{{ route('portofolio.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Portofolio
                </a>
            </div>

            <!-- Input Pencarian -->
            <div class="d-flex align-items-center mb-3 position-relative" style="max-width: 300px;">
                <i class="fa-solid fa-magnifying-glass position-absolute ms-3 text-secondary"></i>
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5"
                    placeholder="Cari nama / NIS / keahlian...">
            </div>

            <!-- Tabel Portofolio -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Keahlian</th>
                            <th>Foto</th>
                            <th>Sertifikat</th>
                            <th>Pengalaman</th>
                            <th style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach($portofolios as $p)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $p->nisn }}</td>
                            <td>{{ $p->nama_siswa }}</td>
                            <td>{{ $p->keahlian }}</td>
                            <td class="text-center">
                                @if($p->foto)
                                    <a href="{{ asset('storage/' . $p->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $p->foto) }}"
                                            alt="Foto"
                                            width="120"
                                            class="rounded shadow-sm">
                                    </a>
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($p->sertifikat)
                                    <a href="{{ asset('storage/' . $p->sertifikat) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $p->sertifikat) }}"
                                            alt="Sertifikat"
                                            width="120"
                                            class="rounded shadow-sm">
                                    </a>
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{!! ltrim(str_replace('-', '<br>• ', $p->pengalaman), '<br>') !!}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <a href="{{ route('portofolio.edit', $p->nisn) }}" 
                                       class="btn btn-warning btn-sm mb-2 w-100">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('portofolio.destroy', $p->nisn) }}" 
                                          method="POST" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm w-100" 
                                                onclick="return confirm('Yakin hapus portofolio ini?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $portofolios->links() }}
            </div>
        </div>
    </div>
</div>

<!-- 🔎 Script Pencarian -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tr');

    rows.forEach(row => {
        // urutan kolom:
        // 0: No, 1: NIS, 2: Nama, 3: Keahlian, 4: Foto, 5: Sertifikat, 6: Pengalaman, 7: Aksi
        let nis = row.cells[1]?.textContent.toLowerCase() || '';
        let nama = row.cells[2]?.textContent.toLowerCase() || '';
        let keahlian = row.cells[3]?.textContent.toLowerCase() || '';

        if (nama.includes(filter) || nis.includes(filter) || keahlian.includes(filter)) {
            row.style.display = ''; // tampilkan
        } else {
            row.style.display = 'none'; // sembunyikan
        }
    });
});
</script>
@endsection
