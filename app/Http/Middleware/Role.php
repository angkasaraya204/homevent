<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        if ($user && $user->role === $role) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
