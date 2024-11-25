<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    public function aboutus()
    {
        $tentang = Tentang::all();
        return view('admin.aboutus.index', compact('tentang'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function editabout(string $id)
    {
        $tentang = Tentang::findOrFail($id);
        return view('admin.aboutus.edit', compact('tentang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function aboutstore(Request $request, string $id)
    {
        // Validasi permintaan
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required'
        ]);

        // Mencari tentang berdasarkan ID
        $tentang = Tentang::findOrFail($id);

        // Tangani unggahan gambar
        if ($request->hasFile('logo')) {
            // Hapus gambar lama dari storage jika ada
            if ($tentang->logo) {
                $oldImagePath = public_path('img/' . $tentang->logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus gambar lama
                }
            }
            // Simpan gambar baru
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('img'), $imageName);
        } else {
            $imageName = $tentang->logo; // Pertahankan gambar lama jika tidak ada yang diunggah
        }

        // Perbarui tentang
        $tentang->update([
            'logo' => $imageName,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.aboutus')->with('success', 'Data berhasil diperbarui.');
    }
}
