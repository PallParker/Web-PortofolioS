<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua data laporan
        $laporan = Laporan::all();

        // Kirim variabel bernama 'laporan' ke view
        return view('laporan.index', compact('laporan'));
    }

    public function cetak()
    {
        $laporan = Laporan::all();
        return view('laporan.cetak', compact('laporan'));
    }
}
