@extends('layout.app')

@section('title', 'Kelola Project')

@section('content')
<div class="container mt-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- Judul + Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h2 class="fw-bold mb-0 text-primary">
                    <i class="fa-solid fa-diagram-project"></i> Kelola Project / Karya Siswa
                </h2>

                <a href="{{ route('project.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Project
                </a>
            </div>

            <!-- Input Pencarian -->
            <div class="d-flex align-items-center mb-3 position-relative" style="max-width: 300px;">
                <i class="fa-solid fa-magnifying-glass position-absolute ms-3 text-secondary"></i>
                <input type="text" id="searchInput" class="form-control shadow-sm ps-5"
                    placeholder="Cari nama / NIS / project / kategori...">
            </div>

            <!-- Pesan Sukses -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Judul Project</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody id="dataTable">
                        @if($projects->count() > 0)
                            @foreach($projects as $p)
                            <tr>
                                <td>{{ $p->nisn }}</td>
                                <td>{{ $p->nama_siswa }}</td>
                                <td>{{ $p->judul_project }}</td>
                                <td>{{ $p->kategori ?? '-' }}</td>
                                <td class="text-center">
                                    @if($p->gambar)
                                        <a href="{{ asset('storage/' . $p->gambar) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $p->gambar) }}" 
                                                 alt="Project" width="120" 
                                                 class="rounded shadow-sm">
                                        </a>
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge 
                                        @if($p->status == 'Selesai') bg-success 
                                        @elseif($p->status == 'Proses') bg-warning 
                                        @else bg-secondary @endif">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <a href="{{ route('project.edit', $p->id) }}" 
                                           class="btn btn-warning btn-sm mb-2 w-100">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('project.destroy', $p->id) }}" 
                                              method="POST" class="w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm w-100" 
                                                    onclick="return confirm('Yakin hapus project ini?')">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    <em>Tidak ada data project.</em>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $projects->links() }}
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
        // 0: NIS, 1: Nama, 2: Judul, 3: Kategori
        let nis = row.cells[0]?.textContent.toLowerCase() || '';
        let nama = row.cells[1]?.textContent.toLowerCase() || '';
        let judul = row.cells[2]?.textContent.toLowerCase() || '';
        let kategori = row.cells[3]?.textContent.toLowerCase() || '';

        if (
            nis.includes(filter) ||
            nama.includes(filter) ||
            judul.includes(filter) ||
            kategori.includes(filter)
        ) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>
@endsection
