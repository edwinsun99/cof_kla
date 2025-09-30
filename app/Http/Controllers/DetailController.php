<?php
namespace App\Http\Controllers;

use App\Models\Service; // ini model case kamu
use Illuminate\Http\Request;
use Barryvdh\domPDF\Facade\Pdf;

class DetailController extends Controller
{
    public function show($id)
    {
    // Ambil data berdasarkan ID
    $case = Service::findOrFail($id);

    // Kirim data ke view case/show.blade.php
    return view('case.show', compact('case'));
    }

     public function downloadPdf($id)
{
    $case = Service::findOrFail($id);

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.cofsummary', compact('case'))
              ->setPaper('a4', 'portrait');

    return $pdf->download('COF-'.$case->id.'.pdf');
}
}
