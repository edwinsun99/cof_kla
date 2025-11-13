<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewCaseController extends Controller
{
    public function index()
    {
        return view('newcase'); // file: resources/views/newcase.blade.php
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
