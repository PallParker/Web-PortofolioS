@extends('layout.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
            <h3 class="mb-0 fw-bold"><i class="bi bi-people-fill me-2"></i>Kelola Data Siswa</h3>
        </div>

        <div class="card-body bg-light">

            <!-- 🔍 Bagian Tombol Tambah & Pencarian -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <!-- Input Pencarian -->
                <div class="d-flex align-items-center position-relative">
                    <i class="fa-solid fa-magnifying-glass position-absolute ms-3 text-secondary"></i>
                    <input type="text" id="searchInput" class="form-control shadow-sm ps-5"
                        placeholder="Cari nama / NIS / kelas..." style="min-width: 230px;">
                </div>

                <!-- Tombol Tambah Data -->
                <a href="{{ route('keloladata.tambah') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </div>


            <!-- 🧾 Tabel Data -->
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-bordered table-striped align-middle text-center mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        @if ($data->count() > 0)
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('img/' . $item->foto) }}" alt="Foto" width="60"
                                                class="rounded shadow-sm">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center">
                                            <a href="{{ route('keloladata.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm mb-2 w-100">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('keloladata.destroy', $item->id) }}" method="POST"
                                                class="w-100">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm w-100"
                                                    onclick="return confirm('Yakin hapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="text-center text-muted">Belum ada data siswa</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 🔎 Script Pencarian -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tr'); // id dari tbody kamu

    rows.forEach(row => {
        // urutan kolom:
        // 0: No, 1: Nama, 2: NIS, 3: Kelas, 4: Alamat, 5: Email, 6: No HP, 7: Foto, 8: Aksi
        let nama = row.cells[1]?.textContent.toLowerCase() || '';
        let nis = row.cells[2]?.textContent.toLowerCase() || '';
        let kelas = row.cells[3]?.textContent.toLowerCase() || '';

        if (nama.includes(filter) || nis.includes(filter) || kelas.includes(filter)) {
            row.style.display = ''; // tampilkan
        } else {
            row.style.display = 'none'; // sembunyikan
        }
    });
});
</script>
@endsection
