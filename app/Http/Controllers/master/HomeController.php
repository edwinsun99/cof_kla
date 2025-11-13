<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller; // ✅ ini yang benar
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // tampilkan halaman utama untuk Master
        return view('master.home');
    }
}
