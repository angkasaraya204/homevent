<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginpost(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email or Password is not valid !!');
        } else {
            Auth::login($user, false);
            // Cek role pengguna dan redirect ke dashboard yang sesuai
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'tamu') {
                return redirect()->route('index');
            } else {
                return redirect()->route('login'); // Redirect ke halaman utama jika role tidak dikenali
            }
        }
    }

    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
