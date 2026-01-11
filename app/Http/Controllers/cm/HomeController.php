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
        // optional: caching 30s untuk mengurangi query saat demo
        $cacheKey = 'cm_dashboard_stats';

        // ---------- STATISTIK UTAMA ----------
        $stats = Cache::remember($cacheKey, 30, function () {

            // 1) Total Case All Time
            $totalAll = Service::count();

            // 2) New Cases Today
            $newToday = Service::whereDate('created_at', Carbon::today())->count();

            // 3) Cases In Progress
            $inReq = Service::where('status', 'Quotation Request')->count();

            // 4) Finished Cases
            $inApproved = Service::where('status', 'Quotation Approved')->count();

            $inCancelled = Service::where('status', 'Quotation Cancelled')->count();

            return compact('totalAll', 'newToday', 'inReq', 'inApproved', 'inCancelled');
        });

        // ---------- LINE CHART (MASUK PER BULAN) ----------
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

    // ---------- BAR CHART (TOTAL PER CABANG) ----------
// Hapus pembungkus cache-nya
$branchTotals = Service::join('branches', 'services.branch_id', '=', 'branches.id')
    ->selectRaw('branches.name as branch_name, COUNT(*) as total')
    ->whereNotNull('services.branch_id')
    ->groupBy('branches.name')
    ->orderByDesc('total')
    ->get();

$labels = $branchTotals->pluck('branch_name')->toArray();
$data   = $branchTotals->pluck('total')->toArray();

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
            'totalCases'      => $stats['totalAll'],
            'newCasesToday'   => $stats['newToday'],
            'casesInReq' => $stats['inReq'],
                        'casesInApp' => $stats['inApproved'],
            'casesInCancl' => $stats['inCancelled'],


            // Line Chart
            'chartMonths'     => $months,
            'chartData'       => $monthlyCases,

            // Bar Chart
                'labels' => $labels,
                'data'   => $data,

             // Pie Chart
            'statusLabels' => $statusLabels,
            'statusData'   => $statusData,

        ]);
    }
}
