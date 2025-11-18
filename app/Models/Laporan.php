<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan'; // singular (tanpa s)

    protected $fillable = [
        'nama_siswa',
        'kegiatan',
        'tanggal',
        'keterangan',
    ];
}
