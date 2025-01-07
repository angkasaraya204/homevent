<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::with('acara','user')->where('user_id', Auth::id())->paginate(10);
        return view('admin.bookmark.index', compact('bookmarks'));;
    }

    public function store(Request $request, string $acaraId)
    {
        $userId = Auth::id();

        // Cek apakah bookmark sudah ada
        $existingBookmark = Bookmark::where('user_id', $userId)->where('acara_id', $acaraId)->first();

        if ($existingBookmark) {
            // Hapus bookmark jika sudah ada
            $existingBookmark->delete();

            return back();
        }

        // Tambahkan bookmark jika belum ada
        Bookmark::create([
            'user_id' => $userId,
            'acara_id' => $acaraId,
        ]);

        return back();
    }

    public function destroy(string $id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();

        return redirect()->route('tamu.bookmark')->with('success', 'Data berhasil dihapus!');
    }
}
