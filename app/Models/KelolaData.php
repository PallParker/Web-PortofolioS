<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelolaData extends Model
{
    use HasFactory;

    protected $table = 'kelola_data'; // nama tabel di database

    protected $fillable = [
        'nama',
        'nisn',
        'kelas',
        'alamat',
        'email',
        'no_hp',
        'foto',
    ];
}
