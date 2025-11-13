@extends('cm.layout.app')

@section('title', 'Case')

@section('content')
    <div style="padding: 20px;">
        <h2 style="color: purple; margin-bottom: 20px;">📂 View Case</h2>

        <div style="margin-bottom: 20px;">
            <a href="{{ route('excel.cofdata') }}" class="btn btn-success">
<button style="background:#27ae60; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                📊 Export to Excel
            </button>
</a>

        </div>

        <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".clickable-row").forEach(function(row) {
        row.addEventListener("click", function() {
            window.location = this.dataset.href;
        });
    });
});
</script>

        {{-- Table muncul disini persis dibawah tombol --}}
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
            <thead>
    <tr style="background:#f2f2f2; text-align:left;">
        <th>COF-ID</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
        <th>Brand</th>
        <th>Product Number</th>
        <th>Serial Number</th>
        <th>Nama Type</th>
        <th>Received Date</th>
    </tr>
</thead>
<tbody>
    @if(isset($search))
        <tr>
            <td colspan="12" style="text-align:center; font-weight:bold;">
                🔍 Hasil pencarian untuk: <span style="color:blue;">{{ $search }}</span>
            </td>
        </tr>
    @endif

    @forelse($services ?? [] as $service)
        <tr class="clickable-row" data-href="{{ route('cm.case.show', $service->id) }}">
            <td>{{ $service->id }}</td> <!-- COF-ID -->
            <td>{{ $service->customer_name }}</td>
            <td>{{ $service->phone_number }}</td>
            <td>{{ $service->brand }}</td>
            <td>{{ $service->product_number }}</td>
            <td>{{ $service->serial_number }}</td> <!-- SN -->
            <td>{{ $service->nama_type }}</td>
            <td>{{ $service->received_date }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="12" style="text-align:center; color:gray;">Data tidak ditemukan.</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
@endsection
