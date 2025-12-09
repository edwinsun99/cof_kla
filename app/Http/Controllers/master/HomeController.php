<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller; // ✅ ini yang benar
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{

public function index()
{
    // optional: caching 30s untuk mengurangi query saat demo
    $cacheKey = 'master_dashboard_stats';

    // ---------- STATISTIK UTAMA ----------
    $stats = Cache::remember($cacheKey, 30, function () {

        $todayStart = Carbon::today()->startOfDay();
        $todayEnd   = Carbon::today()->endOfDay();

        // 1) Total Case All Time
        $totalAll = Service::count();

        // 2) New Cases Today
        $newToday = Service::whereDate('created_at', Carbon::today())->count();

        // 3) Cases In Progress
        $inProgress = Service::where('status', 'repair progress')->count();

        // 4) Finished Cases
        $finished = Service::where('status', 'finish repair')->count();

        return compact('totalAll', 'newToday', 'inProgress', 'finished');
    });

    // ============== LINE CHART (MASUK PER BULAN) ==============
    $cases = Service::selectRaw('MONTH(received_date) AS month, COUNT(*) AS total')
        ->whereNotNull('received_date')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $monthlyCases = array_fill(0, 12, 0);

    foreach ($cases as $row) {
        $monthlyCases[$row->month - 1] = $row->total;
    }

    // ============== RETURN KE VIEW ==============
    return view('master.home', [
        'totalCases'      => $stats['totalAll'],
        'newCasesToday'   => $stats['newToday'],
        'casesInProgress' => $stats['inProgress'],
        'finishedCases'   => $stats['finished'],
      // Chart
    'chartMonths'     => $months,
    'chartData'       => $monthlyCases,
    ]);
}
}