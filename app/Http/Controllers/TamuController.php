<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Acara;
use App\Models\Artikel;
use App\Models\Tentang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::all();
        $kategori = Kategori::all();
        
        $query = $request->input('search');
        $acara = Acara::with('kategori')
        ->when($query, function ($q) use ($query) {
            $q->where('nama', 'like', '%' . $query . '%')
            ->orWhere('deskripsi', 'like', '%' . $query . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('home', compact('user','acara','kategori'));
    }
    public function dashboard()
    {
        return view('admin.index');
    }

    public function category()
    {
        $kategori = Kategori::all();
        $userId = Auth::id();
        $acara = Acara::with(['bookmarks' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->get();

        $acara->map(function ($acara) {
            $acara->isBookmarked = $acara->bookmarks->isNotEmpty();
            return $acara;
        });
        return view('category', compact('kategori','acara'));
    }

    public function showByKategori($nama)
    {
        // Ambil artikel yang berhubungan dengan kategori tersebut
        $kategori = Kategori::where('nama', $nama)->firstOrFail();
        $artikels = Artikel::where('kategori_id', $kategori->id)->get();

        $userId = Auth::id();
        $acara = Acara::with(['bookmarks' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])->get();

        $acara->map(function ($acara) {
            $acara->isBookmarked = $acara->bookmarks->isNotEmpty();
            return $acara;
        });

        // Kirim data ke view
        return view('per-kategori', compact('artikels', 'acara'));
    }

    public function detailArtikel($nama, $slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('detail-artikel', compact('artikel'));
    }

    public function detailAcara($slug)
    {
        $acara = Acara::where('slug', $slug)->firstOrFail();
        return view('detail-acara', compact('acara'));
    }

    public function aboutus()
    {
        $tentang = Tentang::first();
        return view('about-us', compact('tentang'));
    }
}
