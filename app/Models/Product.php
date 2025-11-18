<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    //inisialisasi tabel
    /** @var string */
    protected $table= 'products';
    //menambahkan field di fillable
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga',
        'stok',
        'keterangan'
    ];
}
