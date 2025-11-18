<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelolaDataController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect()->route('login');
});

// 🔐 Login & Logout
Route::get('/login', [AuthController::class, 'index'])->name('login'); 
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 🏠 Profil
Route::view('/admin/profil', 'admin.profil')->name('profil');

// 👩‍🎓 Kelola Data Siswa
Route::get('/admin/keloladata', [KelolaDataController::class, 'index'])->name('keloladata');
Route::get('/admin/keloladata/tambahdata', [KelolaDataController::class, 'create'])->name('keloladata.tambah');
Route::post('/admin/keloladata/tambahdata', [KelolaDataController::class, 'store'])->name('keloladata.store');
Route::get('/admin/keloladata/edit/{id}', [KelolaDataController::class, 'edit'])->name('keloladata.edit');
Route::post('/admin/keloladata/update/{id}', [KelolaDataController::class, 'update'])->name('keloladata.update');
Route::delete('/admin/keloladata/hapus/{id}', [KelolaDataController::class, 'destroy'])->name('keloladata.destroy');

// 🗂️ CRUD Portofolio
Route::get('/admin/portofolio', [PortofolioController::class, 'index'])->name('portofolio.index');
Route::get('/admin/portofolio/create', [PortofolioController::class, 'create'])->name('portofolio.create');
Route::post('/admin/portofolio', [PortofolioController::class, 'store'])->name('portofolio.store');
Route::get('/admin/portofolio/{nisn}/edit', [PortofolioController::class, 'edit'])->name('portofolio.edit');
Route::put('/admin/portofolio/{nisn}', [PortofolioController::class, 'update'])->name('portofolio.update');
Route::delete('/admin/portofolio/{nisn}', [PortofolioController::class, 'destroy'])->name('portofolio.destroy');

// 💡 CRUD Project / Karya
Route::get('/admin/project', [ProjectController::class, 'index'])->name('project.index');
Route::get('/admin/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/admin/project', [ProjectController::class, 'store'])->name('project.store');
Route::get('/admin/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/admin/project/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/admin/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

// 📊 Laporan Portofolio
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
