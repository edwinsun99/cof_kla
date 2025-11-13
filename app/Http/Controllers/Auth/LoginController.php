<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = User::where('un', $username)->first();

        if ($user && Hash::check($password, $user->pw)) {
            // ✅ 1. Simpan data user ke session (versi lama, tetap dipertahankan)
            Session::put('login', true);
            Session::put('email', $user->email);
            Session::put('username', $user->un);
            Session::put('role', strtoupper($user->role));
            Session::put('branch_id', $user->branch_id);

            // ✅ 2. Sinkronisasi ke sistem Auth Laravel
            Auth::login($user);

            // ✅ 3. Redirect sesuai role
            switch (strtoupper($user->role)) {
                case 'MASTER':
                    return redirect('/master/home')->with('success', 'Login berhasil sebagai MASTER!');
                case 'CS':
                    return redirect('/cs/home')->with('success', 'Login berhasil sebagai CS!');
                case 'CM':
                    return redirect('/cm/home')->with('success', 'Login berhasil sebagai CM!');
                case 'CE':
                    return redirect('/ce/home')->with('success', 'Login berhasil sebagai CE!');
                default:
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }
        } else {
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout(); // ✅ tambahkan logout Auth juga
        Session::flush();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}