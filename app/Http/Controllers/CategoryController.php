<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = null; // or set a default image
        }

        // Simpan data ke tabel "nama"
        Kategori::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName
        ]);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('admin.kategori')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Cari kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($kategori->gambar) {
                $oldImagePath = public_path('img/' . $kategori->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus gambar lama
                }
            }
            // Simpan gambar baru
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = $kategori->gambar; // Pertahankan gambar lama jika tidak ada yang diunggah
        }
    
        // Update data kategori
        $kategori->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName
        ]);
    
        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('admin.kategori')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        if ($kategori->gambar) {
            $filePath = public_path('img/' . $kategori->gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Menghapus kategori
        $kategori->delete();

        // Mengalihkan kembali dengan pesan sukses
        return redirect()->route('admin.kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}
