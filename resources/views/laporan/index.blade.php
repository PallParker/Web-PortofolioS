@extends('layout.app')

@section('title', 'Laporan Kegiatan')

@section('content')
<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Judul & Tombol -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h2 class="fw-bold mb-0 text-dark">
                    <i class="fa-solid fa-file-lines"></i> Laporan Kegiatan Siswa
                </h2>

                <div class="d-flex gap-2">
                    <a href="{{ route('laporan.create') }}" class="btn btn-primary shadow-sm">
                        <i class="fa-solid fa-plus"></i> Tambah
                    </a>

                    <button onclick="window.print()" class="btn btn-success shadow-sm">
                        <i class="fa-solid fa-print"></i> Cetak
                    </button>
                </div>
            </div>

            <!-- Input Pencarian -->
            <div class="d-flex align-items-center mb-3 position-relative" style="max-width: 300px;">
                <i class="fa-solid fa-magnifying-glass position-absolute ms-3 text-secondary"></i>
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5"
                    placeholder="Cari nama / kegiatan...">
            </div>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Nama Siswa</th>
                            <th>Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th style="width: 10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @foreach($laporan as $item)
                        <tr>
                            <td class="text-center">
                                {{ $loop->iteration + ($laporan->currentPage() - 1) * $laporan->perPage() }}
                            </td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">

                                    <a href="{{ route('laporan.edit', $item->id) }}" 
                                       class="btn btn-warning btn-sm mb-2 w-100">
                                       <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('laporan.destroy', $item->id) }}" 
                                          method="POST" class="w-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger btn-sm w-100"
                                                onclick="return confirm('Yakin hapus laporan ini?')">
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
                {{ $laporan->links() }}
            </div>

        </div>
    </div>

</div>

<!-- Script Pencarian -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tr');

    rows.forEach(row => {
        let nama = row.cells[1]?.textContent.toLowerCase() || '';
        let kegiatan = row.cells[2]?.textContent.toLowerCase() || '';

        if (nama.includes(filter) || kegiatan.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>

@endsection
