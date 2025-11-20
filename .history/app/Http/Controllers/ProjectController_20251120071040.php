<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // 🔹 Tampilkan semua data project
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(5);
        return view('project.index', compact('projects'));
    }

    // 🔹 Form tambah project
    public function create()
    {
        return view('project.create');
    }

    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'judul_project' => 'required',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        Project::create($data);
        return redirect()->route('project.index')->with('success', 'Project berhasil ditambahkan!');
    }

    //  Form edit project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    //  Update data
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'nisn' => 'required',
            'nama_siswa' => 'required',
            'judul_project' => 'required',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable',
            'status' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($project->gambar && file_exists(public_path('img/' . $project->gambar))) {
                unlink(public_path('img/' . $project->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $project->update($data);
        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui!');
    }

    // 🔹 Hapus data
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        if ($project->gambar && file_exists(public_path('img/' . $project->gambar))) {
            unlink(public_path('img/' . $project->gambar));
        }
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project berhasil dihapus!');
    }

    // Menampilkan projek untuk user publik (tanpa login)
    public function publicIndex()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('user.projek', compact('projects'));
    }
}
