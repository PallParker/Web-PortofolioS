<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // Menampilkan semua portofolio
    public function index()
    {
        $portofolios = Portofolio::paginate(5);
        return view('portofolio.index', compact('portofolios')); // view di folder portofolio
    }

    // Form tambah portofolio
    public function create()
    {
        return view('portofolio.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:portofolio,nisn',
            'nama_siswa' => 'required',
            'keahlian' => 'nullable',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'pengalaman' => 'nullable',
        ]);
        
        // Simpan foto ke storage/app/public/portofolio
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('portofolio', 'public');
        }

        $data = $request->all();

        if ($request->hasFile('sertifikat')) {
            $data['sertifikat'] = $request->file('sertifikat')->store('portofolio', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }
    // Form edit portofolio
    public function edit($nisn)
    {
        $portofolio = Portofolio::findOrFail($nisn);
        return view('portofolio.edit', compact('portofolio'));
    }

    // Update data portofolio
    public function update(Request $request, $nisn)
    {
        $portofolio = Portofolio::findOrFail($nisn);

        $request->validate([
            'nama_siswa' => 'required',
            'keahlian' => 'nullable',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'pengalaman' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('sertifikat')) {
            if ($portofolio->sertifikat) {
                Storage::disk('public')->delete($portofolio->sertifikat);
            }
            $data['sertifikat'] = $request->file('sertifikat')->store('portofolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diupdate!');
    }

    // Hapus portofolio
    public function destroy($nisn)
    {
        $portofolio = Portofolio::findOrFail($nisn);

        if ($portofolio->sertifikat) {
            Storage::disk('public')->delete($portofolio->sertifikat);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}
