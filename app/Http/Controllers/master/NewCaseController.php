<?php
namespace App\Http\Controllers\master;

use Illuminate\Http\Request;
use App\Models\Branches;
use App\Http\Controllers\Controller; // WAJIB ada ini
use App\Models\Product;
use App\Models\Service;

class NewCaseController extends Controller
{

    public function create()
{
    $branches = Branches::all();   // <-- ambil data cabang

    return view('master.newcase', compact('branches'));  // <-- kirim ke view
}

    public function index()
    {
        return view('master.newcase'); // file: resources/views/newcase.blade.php
    }

    public function getNamaType($pn)
{
    $service = Service::where('product_number', $pn)->first();

    if ($service) {
        return response()->json(['nama_type' => $service->nama_type]);
    }
  return response()->json(['nama_type' => null]);
}
}