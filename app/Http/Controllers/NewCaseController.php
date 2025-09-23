<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewCaseController extends Controller
{
    public function index()
    {
        return view('newcase'); // file: resources/views/newcase.blade.php
    }
}
