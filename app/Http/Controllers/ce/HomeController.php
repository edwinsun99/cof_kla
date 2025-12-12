<?php

namespace App\Http\Controllers\ce;

use App\Http\Controllers\Controller; // ✅ ini yang benar
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use App\Models\Branches;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{   
   public function index()
{
    
    // Ambil user login berdasarkan session
    $username = Session::get('username');
    $user = \App\Models\User::where('username', $username)->first();
    $branch = Session::get('branch_id'); // ⬅ penting


    if (!$user) {
        return redirect()->route('login')
            ->with('error', 'User tidak ditemukan.');
    }

    $branchId = $user->branch_id;    // <-- INI KUNCI

    // 4 STATISTICS CARD

        $todayStart = Carbon::today()->startOfDay();
    $todayEnd   = Carbon::today()->endOfDay();

    // 1. Total Case ALL TIME (per cabang)
    $totalCases = Service::where('branch_id', $branchId)->count();

    // 2. Total Cases Today (received_date = hari ini)
    $newCasesToday = Service::where('branch_id', $branchId)
     ->whereDate('created_at', Carbon::today())->count();

    // 3. Repair Progress (per cabang)
    $casesInProgress = Service::where('branch_id', $branchId)
        ->where('status', 'repair progress')
        ->count();

    // 4. Finished Repair (per cabang)
    $finishedCases = Service::where('branch_id', $branchId)
        ->where('status', 'finish repair')
        ->count();

        
    // ======================================
    // 🔹 LINE CHART (Kasus Masuk Per Bulan)
    // ======================================
    $cases = Service::selectRaw('MONTH(received_date) AS month, COUNT(*) AS total')
        ->where('branch_id', $branch)
        ->whereNotNull('received_date')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $monthlyCases = array_fill(0, 12, 0);

    foreach ($cases as $row) {
        $monthlyCases[$row->month - 1] = $row->total;
    }

    // ---------- PIE CHART (DISTRIBUSI STATUS | PER BRANCH CE) ----------
$statusSummary = Service::selectRaw('status, COUNT(*) as total')
    ->where('branch_id', $branchId)
    ->whereNotNull('status')
    ->groupBy('status')
    ->get();

$statusLabels = [
    'new',
    'repair progress',
    'quotation request',
    'quotation approved',
    'quotation cancelled',
    'cancel repair',
    'finish repair'
];

$statusData = [];

foreach ($statusLabels as $status) {
    $found = $statusSummary->firstWhere('status', $status);
    $statusData[] = $found ? $found->total : 0;
}

            return view('ce.home', [
        'totalCases'      => $totalCases,
        'newCasesToday'   => $newCasesToday,
        'casesInProgress' => $casesInProgress,
        'finishedCases'   => $finishedCases,
        
        'chartMonths' => $months,
        'chartData'   => $monthlyCases,

        'statusLabels' => $statusLabels,
        'statusData'   => $statusData,

    ]);
}
}