<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    /**
     * Handle an incoming request.
     * Usage di route: ->middleware('role:MASTER,CM')
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 1️⃣ Jika belum login, arahkan ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 2️⃣ Ambil role user yang sedang login (huruf besar semua untuk konsistensi)
        $userRole = strtoupper(Auth::user()->role);

        // 3️⃣ Normalisasi roles dari parameter middleware
        $allowedRoles = array_map('strtoupper', $roles);

        // 4️⃣ Jika role user tidak termasuk di daftar role yang diizinkan
        if (!in_array($userRole, $allowedRoles)) {
            // Bisa pakai abort(403) atau redirect dengan pesan error
            abort(403, 'Akses ditolak: Role Anda (' . $userRole . ') tidak memiliki izin.');
        }

        // 5️⃣ Lolos semua pengecekan, lanjut ke request berikutnya
        return $next($request);
    }
}
