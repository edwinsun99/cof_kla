<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DetailController extends Controller
{
    public function show($id)
    {
        $case = Service::findOrFail($id);
        return view('case.show', compact('case'));
    }

    public function downloadPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('COF-'.$case->id.'.pdf');
    }

    public function previewPdf($id)
    {
        $case = Service::findOrFail($id);

        $pdf = Pdf::loadView('pdf.cofsummary', compact('case'))
                  ->setPaper('a4', 'portrait');

        // pakai stream biar tampil di browser
        return $pdf->stream('COF-'.$case->id.'.pdf');
    }
}
