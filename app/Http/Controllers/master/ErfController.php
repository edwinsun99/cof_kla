<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Service;

class ErfController extends Controller
{
    public function selectCase()
{
    // Ambil semua branch untuk dropdown
    $branches = \App\Models\Branches::all();

    $cases = Service::where('status', 'finish repair')
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


  public function form($id)
    {
        $case = Service::findOrFail($id);
        return view('ce.erf', compact('case'));
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
