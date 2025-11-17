<?php

namespace App\Http\Controllers\ce;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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

        $service->status = $request->status;
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
}
