<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductType(Request $request)
    {
        $pn = $request->get('pn');

        // Cari product berdasarkan Product Number
        $products = DB::table('products')
            ->where('pn', 'LIKE', "%{$pn}%")
            ->select('nt')
            ->limit(5)
            ->get();

        return response()->json($products);
    }
}
