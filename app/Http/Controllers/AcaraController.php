<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acara = Acara::paginate(10);
        return view('admin.acara.index', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.acara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'genre' => 'required',
            'link' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
        ]);

        // Simpan data ke tabel "nama"
        Acara::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'genre' => $request->genre,
            'link' => $request->link,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('admin.acara')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $acara = Acara::findOrFail($id);
        return view('admin.acara.edit', compact('acara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'genre' => 'required',
            'link' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
        ]);

        $acara = Acara::findOrFail($id);

        // Simpan data ke tabel "nama"
        $acara->update([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'genre' => $request->genre,
            'link' => $request->link,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('admin.acara')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari kategori berdasarkan ID
        $acara = Acara::findOrFail($id);

        // Menghapus kategori
        $acara->delete();

        // Mengalihkan kembali dengan pesan sukses
        return redirect()->route('admin.acara')->with('success', 'Data berhasil dihapus!');
    }
}
