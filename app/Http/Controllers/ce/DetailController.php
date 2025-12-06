<?php

namespace App\Http\Controllers\ce;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Lognote; // ← ini yang harus ditambahkan

class DetailController extends Controller
{
    public function show($id)
    {
        $case = Service::findOrFail($id);
        return view('ce.show', compact('case'));
    }


    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string'
    ]);

    $service = Service::findOrFail($id);

    // Update status
    $service->status = $request->status;

    // 🔥 Jika status berubah menjadi "Repair Progress"
    if ($request->status === 'repair progress') {
        $service->started_date = now();     // Set otomatis
    }

     // 🔥 Jika status berubah menjadi "Repair Progress"
    if ($request->status === 'finish repair') {
        $service->finished_date = now();     // Set otomatis
    }

    $service->save();

    return redirect()
        ->route('ce.case.show', $id)
        ->with('success', 'Status berhasil diperbarui!');
}


public function status($id)
{
    $service = Service::findOrFail($id);
    return view('ce.partials.detailcase', compact('service'));
}



    public function previewPdf($id)
    {
        $case = Service::with('branch')->findOrFail($id);

        $branch = $case->branch;
        $branchName = $branch->name ?? 'Unknown Branch';

        $alamat = [
            'line1' => $branch->address ?? 'Alamat tidak tersedia',
            'telp'  => $branch->phone ?? '-',
        ];

        $pdf = Pdf::loadView('ce.pdf.cofsummary', compact('case', 'alamat'));

        $fileName = 'COF_' . $case->cof_id . '_' . str_replace(' ', '_', $branchName) . '.pdf';

        return $pdf->stream($fileName);
    }

    public function lognote($id)
{
    $service = Service::with('notes.user')->findOrFail($id);

    $notes = $service->notes()->latest()->get(); // ambil lognote urut terbaru

    return view('ce.partials.detailcase', compact('service', 'notes'));
}

 public function addNote(Request $request, $id)
{
    $request->validate([
        'note' => 'required|max:500'
    ]);

    $user = \Auth::user(); // pakai Auth, jangan Session
    
    if (!$user) {
        return redirect()->route('login')->with('error', 'Login dulu!');
    }

    $service = Service::findOrFail($id);

    Lognote::create([
        'cof_id' => $service->cof_id, // ini yang benar
        'un' => $user->un, // gunakan kolom 'un'
        'logdesc' => $request->note,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return back()->with('success', 'Note berhasil ditambahkan!');
}
}
