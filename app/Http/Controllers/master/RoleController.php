<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::all(); // ambil semua data user
        return view('master.manage_roles', compact('users'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'un'   => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pw'   => 'required|string|min:6',
            'role' => 'required|string',
        ]);

        User::create([
            'un' => $request->un,
            'email' => $request->email,
    'pw' => $request->pw, // otomatis di-hash karena mutator
            'role' => $request->role,
        ]);

        return redirect()->route('roles.index')->with('success', 'User baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('roles.index')->with('success', 'User berhasil dihapus.');
    }
}
