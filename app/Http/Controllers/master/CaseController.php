<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Excel\cofdata;
use Maatwebsite\Excel\Facades\Excel;

class CaseController extends Controller
{
    public function index()
    {
        $cases = Service::all(); // ambil semua data dari table services
        return view('master.case', compact('cases')); // case.blade.php
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

    // simpan form ke db
    public function store(Request $request)
    {
        $data = $request->validate([
        'cof_id' => 'required|string|max:100',
        'customer_name' => 'required|string|max:100',
        'contact' => 'required|string|max:100',
        'address' => 'nullable|string|max:500',
        'email' => 'required|email|max:255',
        'phone_number' => 'nullable|string|max:20',
        'received_date' => 'nullable|date',
        'started_date' => 'nullable|date',
        'finished_date' => 'nullable|date',
        'brand' => 'nullable|string|max:255',
        'product_number' => 'nullable|string|max:100',
        'serial_number' => 'nullable|string|max:100',
        'nama_type' => 'nullable|string|max:100',
        'fault_description' => 'nullable|string',
        'kondisi_unit' => 'nullable|string',
        'repair_summary' => 'nullable|string',
        ]);

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Case berhasil disimpan.');
    }

public function search(Request $request)
{
    $search = $request->input('search');

    $case = Service::query()
        ->when($search, function ($query, $search) {
            $query->where('id', $search)
                    ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('serial_number', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
        })
        ->get();

    return view('master.case', ['services' => $case, 'search' => $search]);
}


public function excel()
{
    return Excel::download(new CofData, 'Cof Data.xlsx');
}
}
