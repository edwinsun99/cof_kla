@extends('layouts.app')

@section('title', 'Case')

@section('content')
    <div style="padding: 20px;">
        <h2 style="color: purple; margin-bottom: 20px;">📂 View Case</h2>

        <div style="margin-bottom: 20px;">
            <button style="background:#27ae60; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                📊 Export to Excel
            </button>
            <a href="{{ route('cases.new') }}">
                <button style="background:#e67e22; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                    ➕ Create New Case
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
        <th>Contact</th>
        <th>Cust Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Brand</th>
        <th>Product Number</th>
        <th>Serial Number</th>
        <th>Nama Type</th>
        <th>Received Date</th>
        <th>accessories</th>

    </tr>
</thead>
<tbody>
    @forelse($services ?? [] as $service)
        <tr <tr class="clickable-row" data-href="{{ route('case.show', $service->id) }}">

            <td>{{ $service->id }}</td>
            <td>{{ $service->contact }}</td>
            <td>{{ $service->customer_name }}</td>
            <td>{{ $service->address }}</td>
            <td>{{ $service->phone_number }}</td>
            <td>{{ $service->brand }}</td>
            <td>{{ $service->product_number }}</td>
            <td>{{ $service->serial_number }}</td>
            <td>{{ $service->nama_type }}</td>
            <td>{{ $service->received_date }}</td>
            <td>{{ $service->accessories}}</td>

        </tr>
    @empty
        <tr>
            <td colspan="9" style="text-align:center; color:gray;">Belum ada data case.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>
@endsection
