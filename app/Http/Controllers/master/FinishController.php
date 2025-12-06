<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Excel\CofDataMC;
use Carbon\Carbon; // <-- ini baris penting
use App\Models\Branches;
use Maatwebsite\Excel\Facades\Excel;

class FinishController extends Controller
{
   public function index()
{
    // Ambil semua branch untuk dropdown
    $branches = \App\Models\Branches::all();

    $cases = Service::where('status', 'finish repair')
                    ->orderBy('created_at', 'DESC')
                    ->get();

    return view('master.finish', [
        'cases' => $cases,
        'branches' => $branches,
        'selected_branch' => 'all',
        'start_date' => null,   
        'end_date' => null
    ]);
}

    public function show($id)
{
    $service = Service::findOrFail($id); // pakai modelmu
    return view('case.show', compact('service'));
}


    // Menampilkan form New Case
    public function create()
    {
        return view('master.newcase'); // newcase.blade.php
    }

    public function logdate(Request $request)
{
    $query = Service::query();

    // Ambil semua cabang untuk dropdown
    $branches = \App\Models\Branches::all();

    // Ambil input filter
    $branchId = $request->input('branch_id');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Filter cabang bila dipilih (tidak null)
    if ($branchId && $branchId !== 'all') {
        $query->where('branch_id', $branchId);
    }

    // Auto adjust tanggal
    if ($endDate && !$startDate) {
        $startDate = \Carbon\Carbon::parse($endDate)->subDay()->toDateString();
    }

    if ($startDate && !$endDate) {
        $endDate = \Carbon\Carbon::now()->toDateString();
    }

    // Filter tanggal
    if ($startDate && $endDate) {
        $query->whereBetween('received_date', [$startDate, $endDate]);
    }

$cases = $query
    ->where('status', 'finish repair')   // ⬅️ filter khusus finish repair
    ->orderByDesc('received_date')
    ->get();

    return view('master.finish', [
        'cases' => $cases,
        'branches' => $branches,
        'selected_branch' => $branchId,
        'start_date' => $startDate,
        'end_date' => $endDate
    ]);
}

public function search(Request $request)
{
    $search = $request->input('search');

    // Tambahkan ini agar dropdown cabang tidak error
    $branches = \App\Models\Branches::all();

    $case = Service::query()
        ->when($search, function ($query, $search) {
            $query->where('id', $search)
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('serial_number', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
        })
        ->get();

    return view('master.finish', [
        'cases' => $case,
        'search' => $search,
        'branches' => $branches,
        'selected_branch' => 'all',
        'start_date' => null,
        'end_date' => null
    ]);
}



public function excel()
{
    return Excel::download(new CofDataMC, 'Cof Data.xlsx');
}
}
