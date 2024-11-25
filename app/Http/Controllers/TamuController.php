<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Acara;
use App\Models\Tentang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('home', compact('user'));
    }

    public function category()
    {
        $kategori = Kategori::all();
        $acara = Acara::all();
        return view('category', compact('kategori','acara'));
    }

    public function aboutus()
    {
        $tentang = Tentang::first();
        return view('about-us', compact('tentang'));
    }
}
