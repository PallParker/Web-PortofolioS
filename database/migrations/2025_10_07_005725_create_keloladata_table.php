<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel kelola_data
     */
    public function up(): void
    {
        Schema::create('kelola_data', function (Blueprint $table) {
            $table->id(); // Primary key otomatis (auto increment)
            $table->string('nama', 100);
            $table->string('nisn', 20)->nullable();
            $table->string('kelas', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('foto')->nullable(); // simpan path file foto
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Hapus tabel jika rollback dijalankan
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_data');
    }
};
