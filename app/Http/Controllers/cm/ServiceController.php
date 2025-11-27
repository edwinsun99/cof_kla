<?php

namespace App\Http\Controllers\cm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Branches;
use App\Models\CofCounter;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf; // pastikan ada ini di atas


class ServiceController extends Controller
{
    // ✅ 1. Method untuk menampilkan daftar service
   public function index()
{
    $user = Auth::user(); // jika pakai Auth
    $services = Service::where('branch_id', $user->branch_id)->latest()->get();

    // kirim sebagai 'cases' supaya view cm.case konsisten
    return view('cm.case', ['cases' => $services]);
}


// app/Models/Service.php
public function scopeForCurrentBranch($query)
{
    $user = Auth::user();
    if ($user) {
        $query->where('branch_id', $user->branch_id);
    }
    return $query;
}
public function previewPdf($id)
{
    $service = Service::with('branch')->findOrFail($id);

    // Mapping alamat berdasarkan prefix
    $addresses = [
        'A' => [
            'line1' => 'Ruko Mataram Plaza Blok D8',
            'line2' => 'Jl. MT. Haryono 427–429, Kota Semarang',
            'line3' => 'Jawa Tengah 50613',
            'telp'  => '08993201657'
        ],
        'B' => [
            'line1' => 'Ruko Slawi Indah Blok B1',
            'line2' => 'Jl. Ahmad Yani No.12, Slawi – Tegal',
            'line3' => 'Jawa Tengah 52413',
            'telp'  => '082132456789'
        ],
        // dan seterusnya...
    ];

    $prefix = $service->branch->prefix;
    $alamat = $addresses[$prefix] ?? $addresses['A']; // default ke A kalau ga ketemu

    $pdf = Pdf::loadView('cm.pdf.cofsummary', compact('service', 'alamat'));

    return $pdf->stream('COF_' . $service->cof_id . '.pdf');
}



    // ✅ 2. Method untuk menyimpan data baru
    public function store(Request $request)
    {
        // Pastikan user login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'User tidak ditemukan atau belum login.');
        }

        // Ambil branch & prefix
        $branch = Branches::find($user->branch_id);
        $prefix = $branch->prefix ?? 'X'; // fallback biar tidak null

        // Ambil counter terakhir
        $counter = CofCounter::where('branch_id', $user->branch_id)->first();
        if (!$counter) {
            $counter = CofCounter::create([
                'branch_id' => $user->branch_id,
                'current_number' => 0
            ]);
        }

        $nextNumber = $counter->current_number + 1;

        // Bentuk COF-ID
        $cofId = $prefix . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        // Update counter
        $counter->update(['current_number' => $nextNumber]);

        // Simpan service
        Service::create([
            'cof_id' => $cofId,
            'status' => 'new', // default awal
            'erf_file' => $request->erf_file, // jika dari input text
            'branch_id' => $user->branch_id,
            'ce_id' => $user->id,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'contact' => $request->contact,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'received_date' => $request->received_date,
            'started_date' => $request->started_date,
            'finished_date' => $request->finished_date,
            'brand' => $request->brand,
            'product_number' => $request->product_number,
            'serial_number' => $request->serial_number,
            'nama_type' => $request->nama_type,
            'fault_description' => $request->fault_description,
            'accessories' => $request->accessories,
            'kondisi_unit' => $request->kondisi_unit,
            'repair_summary' => $request->repair_summary,
        ]);

        return redirect()->route('cm.services.index')->with('success', 'Case berhasil ditambahkan!');
    }
}
