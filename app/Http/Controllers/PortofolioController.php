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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'pengalaman' => 'nullable',
        ]);

        $data = $request->all();

        // Simpan foto ke public/img
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('img'), $filename);
            $data['foto'] = $filename;
        }

        if ($request->hasFile('sertifikat')) {
            $filename = time() . '_' . $request->file('sertifikat')->getClientOriginalName();
            $request->file('sertifikat')->move(public_path('img'), $filename);
            $data['sertifikat'] = $filename;
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'pengalaman' => 'nullable',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($portofolio->foto && file_exists(public_path('img/' . $portofolio->foto))) {
                unlink(public_path('img/' . $portofolio->foto));
            }
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('img'), $filename);
            $data['foto'] = $filename;
        }

        if ($request->hasFile('sertifikat')) {
            if ($portofolio->sertifikat && file_exists(public_path('img/' . $portofolio->sertifikat))) {
                unlink(public_path('img/' . $portofolio->sertifikat));
            }
            $filename = time() . '_' . $request->file('sertifikat')->getClientOriginalName();
            $request->file('sertifikat')->move(public_path('img'), $filename);
            $data['sertifikat'] = $filename;
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diupdate!');
    }

    // Hapus portofolio
    public function destroy($nisn)
    {
        $portofolio = Portofolio::findOrFail($nisn);

        if ($portofolio->foto && file_exists(public_path('img/' . $portofolio->foto))) {
            unlink(public_path('img/' . $portofolio->foto));
        }

        if ($portofolio->sertifikat && file_exists(public_path('img/' . $portofolio->sertifikat))) {
            unlink(public_path('img/' . $portofolio->sertifikat));
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil dihapus!');
    }

    // Menampilkan portofolio untuk user publik (tanpa login)
    public function publicIndex()
    {
        $portofolios = Portofolio::all(); // Ambil semua portofolio tanpa pagination untuk tampilan publik
        return view('user.portofolio', compact('portofolios'));
    }
}
