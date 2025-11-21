<?php

namespace App\Http\Controllers\cm;

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
        return view('cm.show', compact('case'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $service = Service::findOrFail($id);

        $service->status = $request->status;
        $service->save();

        return redirect()
            ->route('cm.case.show', $id)
            ->with('success', 'Status berhasil diperbarui!');
    }

public function status($id)
{
    $service = Service::findOrFail($id);
    return view('cm.partials.detailcase', compact('service'));
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

        $pdf = Pdf::loadView('cm.pdf.cofsummary', compact('case', 'alamat'));

        $fileName = 'COF_' . $case->cof_id . '_' . str_replace(' ', '_', $branchName) . '.pdf';

        return $pdf->stream($fileName);
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

    Lognote::create([
        'cof_id' => $id,
        'un' => $user->un, // gunakan kolom 'un'
        'logdesc' => $request->note,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return back()->with('success', 'Note berhasil ditambahkan!');
}
}
