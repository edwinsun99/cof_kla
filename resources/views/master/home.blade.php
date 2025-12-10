@extends('master.layout.app')

@section('title', 'Home')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

 <style>
.dashboard-wrapper{
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Stats */
.stats-container{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    width: 100%;
}

.stats-card{
    background: #fff;
    padding: 16px;
    border-radius: 14px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,.08);
    border-top: 5px solid #7d3cff;
}

.stats-title{
    font-size: 14px;
    font-weight: bold;
    color: #7d3cff;
}

.circle-progress{
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 6px solid #d5c2ff;
    margin: 10px auto 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.circle-progress span{
    font-size: 20px;
    font-weight: bold;
    color: #6a11cb;
}

/* Charts */
.chart-line{
    width: 100%;
    max-width: 900px;
    height: 280px;
    background: #fff;
    padding: 16px;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(0,0,0,.1);
}

/* Pastikan class ini ada dan mendefinisikan 2 kolom */
.charts-grid{
    display: grid;
    grid-template-columns: 1fr 1fr; 
    gap: 20px;
    width: 100%; 
}

/* Tambahkan styling untuk card chart jika diperlukan, atau pakai styling default untuk Line Chart */
.chart-card{
    background: #fff;
    padding: 16px;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(0,0,0,.1);
}
</style>

<h2 style="margin-bottom: 15px;">
    Welcome Back, {{ auth()->user()->un }} 👋
</h2>

<div class="dashboard-wrapper">

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

<!-- PIE CHART : DISTRIBUSI STATUS -->

<div style="margin-top:20px;"> 
    <h4>Distribusi Status Case</h4>
    {{-- Menghilangkan padding, border-radius, dan box shadow --}}
    
    <div style="width:100%; max-width:400px; height:320px; margin:auto;">
        <canvas id="statusPieChart" style="height:300px;"></canvas>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const statusLabels = {!! json_encode($statusLabels) !!};
    const statusData   = {!! json_encode($statusData) !!};

    const colors = [
        '#4CAF50', // new
        '#2196F3', // repair progress
        '#FF9800', // quotation request
        '#00BCD4', // quotation approved
        '#F44336', // quotation cancelled
        '#a4a3a3ff',  // cancel repair
        '#9C27B0'  // finish repair
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

</div>
@endsection
