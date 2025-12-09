@extends('master.layout.app')

@section('title', 'Home')

@section('content')

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

<div style="width: 420px; height:230px; margin-top:20px;">
    <canvas id="caseLineChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

@endsection
