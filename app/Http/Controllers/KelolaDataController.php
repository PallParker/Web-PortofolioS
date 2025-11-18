<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaDataController extends Controller
{
    public function index()
    {
        $data = DB::table('kelola_data')->get();
        return view('data.keloladata', compact('data'));
    }

    public function create()
    {
        return view('data.tambahdata');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'kelas'  => 'required|string|max:50',
            'alamat' => 'nullable|string|max:255',
            'nisn'   => 'required|string|max:20',
            'email'  => 'required|email|max:100',
            'no_hp'  => 'required|string|max:20',
            'foto'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $namaFile = null;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
        }

        DB::table('kelola_data')->insert([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'foto' => $namaFile,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('keloladata')->with('success', 'Data berhasil ditambahkan!');
    }

    // ✏️ Edit
    public function edit($id)
    {
        $data = DB::table('kelola_data')->where('id', $id)->first();
        return view('data.editdata', compact('data'));
    }

    // 🔄 Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'kelas' => 'required|string|max:50',
            'alamat' => 'nullable|string|max:255',
            'nisn' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'no_hp' => 'required|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $record = DB::table('kelola_data')->where('id', $id)->first();
        $namaFile = $record->foto;

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($record->foto && file_exists(public_path('img/' . $record->foto))) {
                unlink(public_path('img/' . $record->foto));
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $namaFile);
        }

        DB::table('kelola_data')->where('id', $id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'foto' => $namaFile,
            'updated_at' => now(),
        ]);

        return redirect()->route('keloladata')->with('success', 'Data berhasil diupdate!');
    }

    // 🗑️ Hapus
    public function destroy($id)
    {
        $data = DB::table('kelola_data')->where('id', $id)->first();

        if ($data->foto && file_exists(public_path('img/' . $data->foto))) {
            unlink(public_path('img/' . $data->foto));
        }

        DB::table('kelola_data')->where('id', $id)->delete();
        return redirect()->route('keloladata')->with('success', 'Data berhasil dihapus!');
    }
}
