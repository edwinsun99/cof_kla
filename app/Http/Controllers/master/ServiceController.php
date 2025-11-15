<?php
namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller; // WAJIB ada ini
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); // ambil semua data dari DB
        return view('master.case', compact('services')); // kirim ke view case.blade.php
    }

 public function store(Request $request)
{
    // Ambil tanggal diterima dari form
    $receivedDate = $request->received_date ?? now();

    // Ambil tahun dan bulan dari received date
    $year = date('Y', strtotime($receivedDate));
    $month = date('m', strtotime($receivedDate));

    // Hitung jumlah case bulan ini untuk buat counter
    $count = \App\Models\Service::whereYear('received_date', $year)
        ->whereMonth('received_date', $month)
        ->count() + 1;

    // Format counter (misal 1 jadi 00001)
    $counter = str_pad($count, 5, '0', STR_PAD_LEFT);

    // Buat COF ID
    $cofId = "A{$year}{$month}{$counter}";

    // Simpan data ke database
    Service::create([
        'cof_id' => $cofId,
        'customer_name' => $request->customer_name,
        'email' => $request->email,
        'contact' => $request->contact,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'received_date' => $receivedDate,
        'started_date' => $request->started_date,
        'finished_date' => $request->finished_date,
        'brand' => $request->brand,
        'product_number' => $request->product_number,
        'nama_type' => $request->nama_type,
        'serial_number' => $request->serial_number,
        'fault_description' => $request->fault_description,
        'accessories' => $request->accessories,
        'kondisi_unit' => $request->kondisi_unit,
        'repair_summary' => $request->repair_summary,
    ]);

    return redirect()->route('services.index')->with('success', 'Case berhasil ditambahkan!');
}
}