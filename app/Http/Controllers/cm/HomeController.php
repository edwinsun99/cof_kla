<?php

namespace App\Http\Controllers\cm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // STATISTICS CARD
         // optional: caching 30s untuk mengurangi query saat demo
        $cacheKey = 'cm_dashboard_stats';

        // ---------- STATISTIK UTAMA ----------
        $stats = Cache::remember($cacheKey, 30, function () {

            // 1) Total Case All Time
            $totalAll = Service::count();

            // 2) New Cases Today
            $newToday = Service::whereDate('created_at', Carbon::today())->count();

            // 3) Cases In Progress
            $inRequest = Service::where('status', 'quotation request')->count();

                // 3) Cases In Progress
            $inApproved = Service::where('status', 'quotation approved')->count();

                // 3) Cases In Progress
            $inCancelled = Service::where('status', 'quotation cancelled')->count();

            return compact('totalAll', 'newToday', 'inRequest', 'inApproved', 'inCancelled');
        });

      // ---------- PIE CHART (DISTRIBUSI STATUS CASE) ----------

$statusSummary = Cache::remember('status_distribution_alltime', 600, function () {
    return Service::selectRaw('status, COUNT(*) as total')
        ->whereNotNull('status')
        ->groupBy('status')
        ->get();
});

// Urutan status yang kamu mau tampilkan di chart
$statusLabels = [
    'quotation request',
    'quotation approved',
    'quotation cancelled',
];

// Siapkan data sesuai urutan label di atas
$statusData = [];

foreach ($statusLabels as $status) {
    $found = $statusSummary->firstWhere('status', $status);
    $statusData[] = $found ? $found->total : 0;
}

// ---------- RETURN KE VIEW ----------
        return view('cm.home', [
            // Statistics Cards
            'totalCases'      => $stats['totalAll'],
            'newCasesToday'   => $stats['newToday'],
            'casesInRequest' => $stats['inRequest'],
            'casesInApproved'   => $stats['inApproved'],
            'casesInCancelled'   => $stats['inCancelled'],

             // Pie Chart
            'statusLabels' => $statusLabels,
            'statusData'   => $statusData,
        ]);
    }
}
