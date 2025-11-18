<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Renaming kolom 'nama' menjadi 'nama_siswa'
        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('nama', 'nama_siswa');
        });
    }

    public function down(): void
    {
        // Jika rollback, kembalikan nama kolomnya
        Schema::table('laporan', function (Blueprint $table) {
            $table->renameColumn('nama_siswa', 'nama');
        });
    }
};
