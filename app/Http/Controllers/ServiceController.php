<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // ambil semua data dari DB
        return view('case', compact('services')); // kirim ke view case.blade.php
    }

    public function store(Request $request)
    {
        Service::create($request->all()); // simpan data ke DB
        return redirect()->route('services.index')->with('success', 'Case berhasil ditambahkan!');
    }
}
