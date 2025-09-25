<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class CaseController extends Controller
{
    public function index()
    {
        $cases = Service::all(); // ambil semua data dari table services
        return view('case', compact('cases')); // case.blade.php
    }

    // Menampilkan form New Case
    public function create()
    {
        return view('newcase'); // newcase.blade.php
    }

    // simpan form ke db
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:50',
            'received_date' => 'nullable|date',
            'started_date' => 'nullable|date',
            'finished_date' => 'nullable|date',
            'brand' => 'nullable|string|max:255',
            'product_number' => 'nullable|string|max:255',
            'serial_number' => 'nullable|string|max:255',
            'product_type' => 'nullable|string|max:255',
            'accessories' => 'nullable|string|max:255',
            'fault_description' => 'nullable|string',
            'unit_condition' => 'nullable|string',
            'repair_summary' => 'nullable|string',
        ]);

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Case berhasil disimpan.');
    }
}
