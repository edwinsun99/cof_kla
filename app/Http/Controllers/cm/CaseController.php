<?php
namespace App\Http\Controllers\cm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Excel\CofData;

class CaseController extends Controller
{
    // List semua cases untuk branch user CM login
    public function index()
{
    // Ambil semua data tanpa filter branch_id dan tanpa pencarian
    $cases = Service::orderBy('received_date', 'desc')->get();

    // Kirim data ke view (variabel search dikirim null agar blade tidak error)
    return view('cm.case', [
        'cases' => $cases,
        'search' => null 
    ]);
}

    // filter by received_date range
    public function logdate(Request $request)
    {
        $username = Session::get('username');
        $user = \App\Models\User::where('un', $username)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Login dulu!');
        }

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        if ($endDate && !$startDate) {
            $startDate = Carbon::parse($endDate)->subDay()->toDateString();
        }
        if ($startDate && !$endDate) {
            $endDate = Carbon::now()->toDateString();
        }

        $query = Service::where('branch_id', $user->branch_id);

        if ($startDate && $endDate) {
            $query->whereBetween('received_date', [$startDate, $endDate]);
        }

        $cases = $query->orderByDesc('received_date')->get();

        return view('cm.case', compact('cases', 'startDate', 'endDate'));
    }

    // detail
    public function show($id)
    {
        $case = Service::findOrFail($id);
        return view('cm.show', compact('case')); // pakai cm.show
    }

    // excel
    public function excel()
    {
        return Excel::download(new CofData, 'CofData.xlsx');
    }
}