<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Branches;
use Illuminate\Support\Facades\Session;
use App\Models\Service;

class ErfController extends Controller
{
    public function selectCase()
{
    // Ambil semua branch untuk dropdown
    $branches = \App\Models\Branches::all();

    $cases = Service::whereIn('status', ['finish repair', 'cancel repair'])
                    ->whereNull('erf_file') // <--- WAJIB supaya case hilang setelah di-upload
                    ->orderBy('created_at', 'DESC')
                    ->get();

    return view('master.select', [
        'cases' => $cases,
        'branches' => $branches,
        'selected_branch' => 'all',
        'start_date' => null,   
        'end_date' => null
    ]);
}

 public function logdate(Request $request)
{
    // ✅ TAMBAH: Filter status 'new' dan 'repair progress' dari awal
    $query = Service::whereIn('status', ['cancel repair', 'finish repair'])
                    ->whereNull('erf_file'); // <--- WAJIB supaya case hilang setelah di-upload

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

    $cases = $query->orderByDesc('received_date')->get();

    return view('master.select', [
        'cases' => $cases,
        'branches' => $branches,
        'selected_branch' => $branchId,
        'start_date' => $startDate,
        'end_date' => $endDate
    ]);
}

    public function print($id)
{
    $service = Service::with('branch')->findOrFail($id);

    $pdf = PDF::loadView('pdf.cof', compact('service'));
    return $pdf->stream('COF_'.$service->cof_id.'.pdf');
}

  public function form($id)
    {
        $case = Service::findOrFail($id);
        return view('master.erf', compact('case'));
    }

      public function upload(Request $request, $id)
{
    $request->validate([
        'erf_file' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    $case = Service::findOrFail($id);

    if ($request->hasFile('erf_file')) {

        $filename = 'ERF_' . $case->cof_id . '_' . time() . '.' . $request->file('erf_file')->getClientOriginalExtension();

        // simpan ke storage/app/public/erf_files/
        $path = $request->file('erf_file')->storeAs('erf_files', $filename, 'public');

        $case->erf_file = $path;
        $case->save();
    }

    return back()->with('success', 'Upload berhasil!');
}

public function preview($id)
{
    $case = Service::findOrFail($id);

    if (!$case->erf_file) {
        return back()->with('error', 'ERF file tidak ditemukan.');
    }

    $filePath = storage_path('app/public/' . $case->erf_file);

    return response()->file($filePath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
    ]);
}

public function download($id)
{
    $case = Service::findOrFail($id);

    if (!$case->erf_file) {
        return back()->with('error', 'ERF file not found.');
    }

    $filePath = storage_path('app/public/' . $case->erf_file);

    return response()->download($filePath);
}

}
