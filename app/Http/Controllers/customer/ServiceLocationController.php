<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service; // model services
use App\Models\Branches; // model services
use Illuminate\Support\Facades\Validator;

class ServiceLocationController extends Controller {

    public function index() {
        return view('customer.serviceloc'); // blade nanti muat map + JS
    }

    public function branchesJson() {
        return Branches::select(
            'id','name','address','phone','lat','lng','open_at','close_at'
        )->get();
    }
}


