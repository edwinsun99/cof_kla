<?php
namespace App\Http\Controllers\ce;

use App\Models\Service;
use App\Http\Controllers\Controller; // WAJIB ada ini
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DetailController extends Controller
{
    public function show($id)
    {
        $case = Service::findOrFail($id);
        return view('ce.show', compact('case'));
    }


   public function previewPdf($id)
{
    // Ambil data service + relasi branch
    $case = \App\Models\Service::with('branch')->findOrFail($id);

    // Pastikan branch tersedia
    $branch = $case->branch;
    $branchName = $branch->name ?? 'Unknown Branch';
    $prefix = $branch->prefix ?? '';

    // Data alamat dan telp dari tabel branches
    $alamat = [
        'line1' => $branch->address ?? 'Alamat tidak tersedia',
        'telp'  => $branch->phone ?? '-',
    ];

    // Load Blade PDF dengan variabel tambahan
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('ce.pdf.cofsummary', compact('case', 'alamat'));

    // Buat nama file dinamis berdasarkan prefix dan branch
    $fileName = 'COF_' . $case->cof_id . '_' . str_replace(' ', '_', $branchName) . '.pdf';

    // Preview PDF langsung di browser (bukan download)
    return $pdf->stream($fileName);
}

}
