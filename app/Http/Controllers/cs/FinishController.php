<?php

namespace App\Http\Controllers\cs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinishController extends Controller
{
    /**
     * Tampilkan halaman daftar atau form Finish Repair.
     */
    public function index()
    {
        // contoh data dummy sementara (bisa kamu ganti ambil dari DB)
        $repairs = [
            ['id' => 1, 'device' => 'Printer HP LaserJet 1020', 'status' => 'Pending'],
            ['id' => 2, 'device' => 'Printer Canon LBP6030', 'status' => 'Completed'],
        ];

        // kirim data ke view
        return view('finish', compact('repairs'));
    }

    /**
     * Simpan data hasil repair (kalau nanti ada form submit).
     */
    public function store(Request $request)
    {
        $request->validate([
            'device_name' => 'required|string|max:255',
            'repair_note' => 'required|string',
        ]);

        // logika penyimpanan ke database bisa kamu tambahkan di sini
        // Contoh:
        // Repair::create([
        //     'device_name' => $request->device_name,
        //     'repair_note' => $request->repair_note,
        //     'status' => 'Completed',
        // ]);

        return redirect()->route('finish.index')->with('success', 'Repair berhasil diselesaikan!');
    }
}
