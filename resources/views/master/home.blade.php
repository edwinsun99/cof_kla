@extends('master.layout.app')

@section('title', 'Home')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .stats-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 2 kolom */
        gap: 15px;
        margin-top: 10px;
        width: 500px; /* supaya rapat pojok kiri, tidak melebar */
    }

    .stats-card {
        background: #ffffff;
        width: 230px;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        text-align: center;
        border-top: 5px solid #7d3cff;
    }

    .stats-title {
        font-size: 14px;
        font-weight: bold;
        color: #7d3cff;
        margin-bottom: 8px;
    }

    .circle-progress {
        width: 85px;
        height: 85px;
        border-radius: 50%;
        border: 6px solid #d5c2ff;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circle-progress span {
        font-size: 22px;
        font-weight: bold;
        color: #6a11cb;
    }

    .chart-wrapper {
        width: 480px;
        height: 280px;
        margin-top: 10px;
        background: #fff;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>

<!-- 4 STATISTICS CARD -->

<div class="stats-container">

    {{-- 1. Total Case --}}
    <div class="stats-card">
        <div class="stats-title">Total Cases All Time</div>
        <div class="circle-progress">
            <span>{{ $totalCases }}</span>
        </div>
    </div>

    {{-- 2. New Cases Today --}}
    <div class="stats-card">
        <div class="stats-title">Total Cases Today</div>
        <div class="circle-progress">
            <span>{{ $newCasesToday }}</span>
        </div>
    </div>

    {{-- 3. Repair Progress --}}
    <div class="stats-card">
        <div class="stats-title">Repair Progress</div>
        <div class="circle-progress">
            <span>{{ $casesInProgress }}</span>
        </div>
    </div>

    {{-- 4. Finished Repair --}}
    <div class="stats-card">
        <div class="stats-title">Finish Repair</div>
        <div class="circle-progress">
            <span>{{ $finishedCases }}</span>
        </div>
    </div>

</div>

<!-- LINE CHART -->

<div style="width: 420px; height:230px; margin-top:20px;">
    <canvas id="caseLineChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('caseLineChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartMonths) !!},
            datasets: [{
                label: "Cases per Month",
                data: {!! json_encode($chartData) !!},
                borderWidth: 3,
                borderColor: "#7d3cff",
                backgroundColor: "rgba(125, 60, 255, 0.2)",
                tension: 0.4,
                pointRadius: 4,
                pointBackgroundColor: "#7d3cff",
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

<!-- BAR CHART -->

<div class="card" style="padding:16px; border-radius:8px;">
    <h3 style="margin-bottom:12px;">Total Case per Cabang (All Time)</h3>

    <div style="width:100%; max-width:900px; height:420px;">
        <canvas id="branchBarChart"></canvas>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const ctx = document.getElementById('branchBarChart').getContext('2d');

    const labels = {!! json_encode($labels) !!};
    const data   = {!! json_encode($data) !!};

    const bgColors = labels.map((_, i) => `rgba(${(i*47)%255}, ${(120 + i*31)%255}, ${(200 + i*17)%255}, 0.7)`);
    const borderColors = bgColors.map(c => c.replace('0.7','1'));

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Cases',
                data: data,
                backgroundColor: bgColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true },
                x: { ticks: { precision: 0 } }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(ctx) {
                            return 'Total: ' + (ctx.parsed.y ?? ctx.parsed.x);
                        }
                    }
                }
            }
        }
    });

});
</script>

<!-- PIE CHART : DISTRIBUSI STATUS -->

<div class="card" style="padding:16px; border-radius:8px; margin-top:20px;">
    <h3>Distribusi Status Case</h3>
<div style="width:100%; max-width:400px; height:320px; margin:auto;">
<canvas id="statusPieChart" style="height:300px;"></canvas>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const statusLabels = {!! json_encode($statusLabels) !!};
    const statusData   = {!! json_encode($statusData) !!};

    const colors = [
        '#4CAF50', // new
        '#2196F3', // repair progress
        '#FF9800', // quotation request
        '#00BCD4', // quotation approved
        '#F44336', // quotation cancelled
        '#a4a3a3ff',  // cancel repair
        '#9C27B0'  // finish repair
    ];

    const ctx = document.getElementById('statusPieChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: statusLabels,
            datasets: [{
                data: statusData,
                backgroundColor: colors
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

});
</script>

@endsection
