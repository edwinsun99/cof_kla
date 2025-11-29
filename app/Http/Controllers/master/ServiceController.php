<?php
namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller; // WAJIB ada ini
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
   public function index()
{
    // Ambil semua service
    $services = Service::orderByDesc('received_date')->get();

    // Ambil semua cabang (WAJIB, karena blade butuh $branches)
    $branches = \App\Models\Branches::all();

    return view('master.case', [
        'cases' => $services,   // ← INI LETAK BARIS 'cases' => $services
        'branches' => $branches,
        'selected_branch' => 'all',
        'start_date' => null,
        'end_date' => null
    ]);
}



 public function store(Request $request)
{

  // Ambil branch ID dari form (karena Master memilih cabang secara manual)
$branchId = $request->branch_id;
if (!$branchId) {
    return back()->with('error', 'Pilih cabang terlebih dahulu.');
}

// Ambil prefix branch
$branch = \App\Models\Branches::find($branchId);
$prefix = $branch->prefix ?? 'X';

// Counter COF khusus per cabang
$counter = \App\Models\CofCounter::firstOrCreate(
    ['branch_id' => $branchId],
    ['current_number' => 0]
);

// Naikkan counter
$nextNumber = $counter->current_number + 1;
$counter->update(['current_number' => $nextNumber]);

// Ambil tanggal diterima
$receivedDate = $request->received_date ?? now();
$year = date('Y', strtotime($receivedDate));
$month = date('m', strtotime($receivedDate));

// Generate COF-ID akhir
$cofId = $prefix . $year . $month . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

    // Simpan data ke database
    Service::create([
        'cof_id' => $cofId,
        'customer_name' => $request->customer_name,
        'email' => $request->email,
        'contact' => $request->contact,
        'branch_id' => $request->branch_id,
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

    return redirect()->route('master.services.index')->with('success', 'Case berhasil ditambahkan!');
}
}