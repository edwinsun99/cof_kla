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
    public function index(Request $request)
    {
        // ambil user dari session (sesuai sistem login kamu)
        $username = Session::get('username');
        $user = \App\Models\User::where('un', $username)->first();

        if (!$user) {
            // jika user tidak ada → redirect ke login
            return redirect()->route('login')->with('error', 'Login dulu!');
        }

        // optional search
        $search = $request->input('search');

        $query = Service::where('branch_id', $user->branch_id);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('cof_id', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('serial_number', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        $cases = $query->orderBy('received_date', 'desc')->get();

        return view('cm.case', compact('cases', 'search'));
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