<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acara = Acara::with('kategori')->paginate(10);
        return view('admin.acara.index', compact('acara'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.acara.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required',
            'kategori_id' => 'required',
            'link' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
        ]);

        // Handle the image upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = null; // or set a default image
        }

        $slug = strtolower($request->slug);

        // Simpan data ke tabel "nama"
        Acara::create([
            'nama' => $request->nama,
            'slug' => $slug,
            'gambar' => $imageName,
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'link' => $request->link,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('tamu.acara')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $acara = Acara::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.acara.edit', compact('kategoris','acara'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'slug' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required',
            'kategori_id' => 'required',
            'link' => 'required',
            'tempat' => 'required',
            'deskripsi' => 'required',
            'status' => 'nullable',
        ]);

        $acara = Acara::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($acara->gambar) {
                $oldImagePath = public_path('img/' . $acara->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus gambar lama
                }
            }
            // Simpan gambar baru
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img'), $imageName);
        } else {
            $imageName = $acara->gambar; // Pertahankan gambar lama jika tidak ada yang diunggah
        }

        $slug = strtolower($request->slug);

        // Simpan data ke tabel "nama"
        $acara->update([
            'nama' => $request->nama,
            'slug' => $slug,
            'gambar' => $imageName,
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'link' => $request->link,
            'tempat' => $request->tempat,
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect ke halaman sebelumnya atau ke halaman lain
        return redirect()->route('tamu.acara')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari kategori berdasarkan ID
        $acara = Acara::findOrFail($id);

        if ($acara->gambar) {
            $filePath = public_path('img/' . $acara->gambar);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Menghapus kategori
        $acara->delete();

        // Mengalihkan kembali dengan pesan sukses
        return redirect()->route('tamu.acara')->with('success', 'Data berhasil dihapus!');
    }

    // Fungsi umum untuk memperbarui status
    private function updateStatus(string $id, string $status)
    {
        if (auth()->user()->role != 'admin') {
            return back()->with('error', 'Tidak Di izinkan');
        }

        $upstatus = Acara::findOrFail($id);
        $upstatus->status = $status;
        $upstatus->save();
    }

    public function approve($id)
    {
        $this->updateStatus($id, 'approved');
        return back()->with('success','Data berhasil di setujui');
    }

    // Fungsi untuk menolak entri stock opname
    public function reject($id)
    {
        $this->updateStatus($id, 'rejected');
        return back()->with('success','Data berhasil di tolak');
    }
}
