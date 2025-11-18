<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    // Menampilkan daftar laporan
    public function index()
    {
        $laporan = Laporan::paginate(10);
        return view('laporan.index', compact('laporan'));
    }

    // Form tambah laporan
    public function create()
    {
        return view('laporan.create');
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
        ]);

        Laporan::create($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
    }

    // Form edit laporan
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    // Update laporan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kegiatan' => 'required',
            'tanggal' => 'required|date',
            'keterangan' => 'required',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus!');
    }

    // Menampilkan laporan untuk user publik (tanpa login)
    public function publicIndex()
    {
        $laporan = Laporan::orderBy('tanggal', 'desc')->get();
        return view('user.laporan', compact('laporan'));
    }
}
