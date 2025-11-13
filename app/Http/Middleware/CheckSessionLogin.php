<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckSessionLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek dua sistem login (Session & Auth)
        if (!Session::get('login') && !Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
