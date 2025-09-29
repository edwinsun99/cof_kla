<?php
namespace App\Http\Controllers;

use App\Models\Service; // ini model case kamu
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show($id)
    {
    // Ambil data berdasarkan ID
    $case = Service::findOrFail($id);

    // Kirim data ke view case/show.blade.php
    return view('case.show', compact('case'));
    }
}
