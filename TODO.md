
# TODO: Membuat Tampilan User Lengkap (Beranda, Data Siswa, Portofolio, Projek/Karya, Laporan) Tanpa Login

## Langkah 1: Update Layout User dengan Navbar
- [x] Update `resources/views/layout/user.blade.php` untuk menambahkan navbar dengan menu: Beranda, Data Siswa, Portofolio, Projek/Karya, Laporan.

## Langkah 2: Buat Halaman Beranda Publik
- [x] Buat route `/user` atau `/beranda` yang mengarah ke halaman beranda publik.
- [x] Buat view `resources/views/user/beranda.blade.php` dengan informasi umum aplikasi.

## Langkah 3: Buat Halaman Data Siswa Publik
- [x] Tambahkan method `publicIndex` di `KelolaDataController` untuk menampilkan data siswa publik.
- [x] Buat route `/user/data-siswa`.
- [x] Buat view `resources/views/user/data-siswa.blade.php`.

## Langkah 4: Update Portofolio Publik
- [x] Sudah ada: route `/portofolio-public`, method `publicIndex` di PortofolioController, view `resources/views/user/portofolio.blade.php`.

## Langkah 5: Buat Halaman Projek/Karya Publik
- [x] Tambahkan method `publicIndex` di `ProjectController` untuk menampilkan projek publik.
- [x] Buat route `/user/projek`.
- [x] Buat view `resources/views/user/projek.blade.php`.

## Langkah 6: Buat Halaman Laporan Publik
- [x] Tambahkan method `publicIndex` di `LaporanController` untuk menampilkan laporan publik.
- [x] Buat route `/user/laporan`.
- [x] Buat view `resources/views/user/laporan.blade.php`.

## Langkah 7: Tambahkan Routes Publik
- [x] Update `routes/web.php` dengan semua route publik baru.

## Langkah 8: Test dan Verifikasi
- [x] Test semua halaman user tanpa login.
- [x] Pastikan navbar berfungsi dengan baik.
- [ ] Jika perlu, tambahkan fitur pencarian atau filter.
