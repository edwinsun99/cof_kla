@extends('cm.layout.app')

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
    Welcome Back, {{ auth()->user()->username }} 👋
</h2>

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
        <div class="stats-title">Quotation Request</div>
        <div class="circle-progress">
            <span>{{ $casesInRequest }}</span>
        </div>
    </div>

    {{-- 4. Finished Repair --}}
    <div class="stats-card">
        <div class="stats-title">Quotation Approved</div>
        <div class="circle-progress">
            <span>{{ $casesInApproved }}</span>
        </div>
    </div>
    
        {{-- 4. Finished Repair --}}
    <div class="stats-card">
        <div class="stats-title">Quotation Cancelled</div>
        <div class="circle-progress">
            <span>{{ $casesInCancelled }}</span>
        </div>
    </div>

</div>

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
        '#FF9800', // quotation request
        '#00BCD4', // quotation approved
        '#F44336', // quotation cancelled
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
