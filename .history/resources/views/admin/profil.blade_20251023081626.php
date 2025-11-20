@extends('layout.app')

@section('title', 'Profil Admin')

@section('content')
<style>
  .content {
    margin-left: 130px; /* ✅ jarak ideal dari sidebar */
    margin-top: 20px; /* jarak dari atas */
    display: flex;
    justify-content: center;
    padding: 0;
  }

  /* 🎨 Card Profil */
  .profile-container {
    width: 950px; /* ✅ sedikit lebih lebar agar 4 statistik sejajar */
    background: linear-gradient(135deg, #1e1e2f, #343a40);
    color: #fff;
    padding: 30px 35px;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
    overflow: visible;
  }

  .profile-header {
    text-align: center;
    margin-bottom: 25px;
  }

  .profile-header img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #e10600;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  .profile-header h2 {
    margin-top: 15px;
    font-size: 26px;
    font-weight: bold;
  }

  .badge-role {
    background: #ffd700;
    color: #000;
    font-size: 14px;
    padding: 6px 14px;
    border-radius: 10px;
    font-weight: bold;
    display: inline-block;
    margin-top: 8px;
  }

  /* 🔢 Kartu Statistik */
  .stats-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap; /* ✅ agar 4 kartu tetap sejajar */
    margin-top: 25px;
    gap: 15px;
  }

  .stat-card {
    flex: 1 1 calc(25% - 15px);
    text-align: center;
    color: white;
    border-radius: 15px;
    padding: 18px 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
    min-width: 200px;
  }

  .stat-card:hover {
    transform: translateY(-5px);
  }

  .stat-card i {
    font-size: 30px;
    margin-bottom: 8px;
    display: block;
  }

  .stat-card h4 {
    font-size: 22px;
    font-weight: bold;
    margin: 3px 0;
  }

  .stat-card p {
    margin: 0;
    font-size: 15px;
  }

  /* Warna tiap kartu */
  .blue { background-color: #007bff; }
  .purple { background-color: #7b2cbf; }
  .green { background-color: #198754; }
  .red { background-color: #dc3545; }

  /* ℹ️ Info Profil */
  .profile-info {
    margin-top: 25px;
    padding: 18px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
  }

  .profile-info p {
    font-size: 16px;
    margin: 10px 0;
  }

  /* 🔘 Tombol Aksi */
  .btn-group {
    margin-top: 20px;
    text-align: center;
  }

  .btn-group .btn {
    padding: 10px 18px;
    font-size: 15px;
    border-radius: 8px;
    margin: 0 8px;
    transition: transform 0.2s ease;
  }

  .btn-group .btn:hover {
    transform: translateY(-3px);
  }
</style>

<main class="content">
  <div class="profile-container">
    <div class="profile-header">
      <!-- Foto Admin -->
      <img src="{{ asset('img/' . (session('user')['foto'] ?? 'default.jpg')) }}" 
      alt="Foto Admin" 
      class="rounded-circle mb-3">

      <h2>{{ session('user')['nama'] ?? 'Guest' }}</h2>
      <span class="badge-role">Super Admin</span>
    </div>

    <!-- 🔢 Statistik -->
    <div class="stats-container">
      <div class="stat-card blue">
        <i class="fa-solid fa-book"></i>
        <h4>128</h4>
        <p>Data Siswa</p>
      </div>

      <div class="stat-card purple">
        <i class="fa-solid fa-folder-open"></i>
        <h4>14</h4>
        <p>Proyek</p>
      </div>

      <div class="stat-card green">
        <i class="fa-solid fa-user-group"></i>
        <h4>2</h4>
        <p>Admin Aktif</p>
      </div>

      <div class="stat-card red">
        <i class="fa-solid fa-award"></i>
        <h4>9</h4>
        <p>Portofolio Unggulan</p>
      </div>
    </div>

    <!-- ℹ️ Info Profil -->
    <div class="profile-info mt-4">
      <p><i class="fa-solid fa-envelope"></i>
      <strong>Email:</strong>
      {{ session('user')['email'] ?? 'Tidak ada email' }}</p>

      <p><i class="fa-solid fa-clock"></i>
      <strong>Terakhir Login:</strong>
      {{ session('user')['terakhir_login'] ?? '-' }}</p>

      <p><i class="fa-solid fa-calendar"></i>
      <strong>Dibuat Pada:</strong>
      {{ session('user')['dibuat_pada'] }}</p>
    </div>

    <div class="btn-group">
      <a href="#" class="btn btn-primary"><i class="fa-solid fa-user-pen"></i> Edit Profil</a>
      <a href="#" class="btn btn-warning text-dark"><i class="fa-solid fa-key"></i> Ubah Password</a>
    </div>
  </div>
</main>
@endsection
