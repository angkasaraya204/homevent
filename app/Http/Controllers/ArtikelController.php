<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::paginate(10);
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'penulis' => 'required',
            'konten' => 'required|string|max:255',
        ]);

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = null; // or set a default image
        }

        // Create a new event
        Artikel::create([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan.');
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
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi permintaan
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'penulis' => 'required',
            'konten' => 'required|string|max:255',
        ]);

        // Mencari artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Tangani unggahan gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($artikel->gambar) {
                $oldImagePath = public_path('img/' . $artikel->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus gambar lama
                }
            }
            // Simpan gambar baru
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = $artikel->gambar; // Pertahankan gambar lama jika tidak ada yang diunggah
        }

        // Perbarui artikel
        $artikel->update([
            'judul' => $request->judul,
            'gambar' => $imageName,
            'tanggal' => $request->tanggal,
            'penulis' => $request->penulis,
            'konten' => $request->konten,
        ]);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($artikel->gambar) {
            $filePath = public_path('img/' . $artikel->gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Menghapus artikel
        $artikel->delete();

        // Mengalihkan kembali dengan pesan sukses
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus!');
    }
}