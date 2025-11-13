<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErfController extends Controller
{
    /**
     * Tampilkan halaman upload ERF.
     */
    public function index()
    {
        return view('erf');
    }

    /**
     * Proses upload ERF.
     */
    public function store(Request $request)
    {
        $request->validate([
            'erf_file' => 'required|mimes:pdf,doc,docx,xlsx|max:2048',
        ]);

        // Simpan file ke folder public/storage/erf
        $path = $request->file('erf_file')->store('erf', 'public');

        // Kamu bisa simpan path ke database di sini (opsional)
        // Erf::create(['file_path' => $path]);

        return redirect()->route('erf.index')->with('success', 'File ERF berhasil diupload!');
    }
}
