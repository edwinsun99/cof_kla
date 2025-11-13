<?php
namespace App\Http\Controllers\cm;

use App\Models\Service;
use App\Http\Controllers\Controller; // WAJIB ada ini
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DetailController extends Controller
{
    public function show($id)
    {
        $case = Service::findOrFail($id);
        return view('cm.show', compact('case'));
    }

    public function downloadPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('cm.pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('COF-'.$case->id.'.pdf');
    }

    public function previewPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('cm.pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        // pakai stream biar tampil di browser
        return $pdf->stream('COF-'.$case->id.'.pdf');
    }
}
