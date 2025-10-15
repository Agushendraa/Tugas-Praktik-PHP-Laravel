<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // 🔹 Menampilkan daftar mahasiswa
    public function index()
{
    // Menampilkan data mahasiswa dengan urutan NIM dari kecil ke besar
    $mahasiswa = Mahasiswa::orderBy('nim', 'asc')->get();

    return view('mahasiswa.index', compact('mahasiswa'));
}


    // 🔹 Form tambah mahasiswa
    public function create()
    {
        return view('mahasiswa.create');
    }

    // 🔹 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim',
            'nama' => 'required',
            'prodi' => 'required',
        ]);

        Mahasiswa::create($request->only(['nim', 'nama', 'prodi']));

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa baru berhasil ditambahkan.');
    }

    // 🔹 Form edit mahasiswa
    public function edit($id)
    {
        $m = Mahasiswa::find($id);
        if (!$m) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan.');
        }
        return view('mahasiswa.edit', compact('m'));
    }

    // 🔹 Update data mahasiswa
    public function update(Request $request, $id)
    {
        $m = Mahasiswa::find($id);
        if (!$m) {
            return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $request->validate([
            'nim' => 'required|min:4|unique:mahasiswa,nim,' . $id,
            'nama' => 'required',
            'prodi' => 'required',
        ]);

        $m->update($request->only(['nim', 'nama', 'prodi']));

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    // 🔹 Hapus data mahasiswa
    public function destroy($id)
{
    $m = Mahasiswa::find($id);
    if (!$m) {
        return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan.');
    }

    $m->delete();
    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
}

}
