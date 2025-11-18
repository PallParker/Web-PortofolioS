<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio'; // nama tabel singular
    protected $primaryKey = 'nisn';  // primary key pakai NISN
    public $incrementing = false;    // karena nisn bukan auto increment
    protected $keyType = 'string';   // tipe primary key string

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'keahlian',
        'foto',
        'sertifikat',
        'pengalaman',
    ];

    // relasi ke kelola data siswa
    public function siswa() {
        return $this->belongsTo(KelolaData::class, 'nisn', 'nisn');
    }
}

