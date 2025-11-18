<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'judul_project',
        'deskripsi',
        'kategori',
        'gambar',
        'status',
    ];
}
