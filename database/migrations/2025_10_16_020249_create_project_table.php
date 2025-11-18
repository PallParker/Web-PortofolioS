<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->string('judul_project');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', ['Website', 'Desain', 'Aplikasi', 'Elektronika','IoT', 'Lainnya'])->default('Lainnya'); 
            $table->string('gambar')->nullable(); // foto atau preview project
            $table->enum('status', ['Selesai', 'Proses', 'Belum Mulai'])->default('Proses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
