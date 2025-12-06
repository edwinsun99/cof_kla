<?php

namespace App\Http\Controllers\master;

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
        return view('master.show', compact('case'));
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
        ->route('case.show', $id)
        ->with('success', 'Status berhasil diperbarui!');
}


public function status($id)
{
    $service = Service::findOrFail($id);
    return view('master.partials.detailcase', compact('service'));
}

    public function downloadPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('master.pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('COF-'.$case->id.'.pdf');
    }

    public function previewPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('master.pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        // pakai stream biar tampil di browser
        return $pdf->stream('COF-'.$case->id.'.pdf');
    }

    public function lognote($id)
{
    $service = Service::with('notes.user')->findOrFail($id);

    $notes = $service->notes()->latest()->get(); // ambil lognote urut terbaru

    return view('master.partials.detailcase', compact('service', 'notes'));
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
