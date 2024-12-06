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
    public function index()
    {
        $user = User::all();
        $acara = Acara::orderBy('created_at', 'desc')->take(3)->get();
        $kategori = Kategori::all();
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

    public function showByKategori(string $id)
    {
        // Ambil artikel yang berhubungan dengan kategori tersebut
        $artikels = Artikel::where('kategori_id', $id)->get();

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

    public function detailArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    return view('detail-artikel', compact('artikel'));
}

    public function aboutus()
    {
        $tentang = Tentang::first();
        return view('about-us', compact('tentang'));
    }
}
