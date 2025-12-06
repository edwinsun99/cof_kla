@extends('master.layout.app')

@section('title', 'Case')

@section('content')

@php
    $cases = $cases ?? collect(); // kalau null, ubah jadi collection kosong
@endphp

    <div style="padding: 20px;">
        <h2 style="color: purple; margin-bottom: 20px;">✌️ Quotation Request</h2>

        <div style="margin-bottom: 20px;">
            <a href="{{ route('excel.cofdata') }}" class="btn btn-success">
<button style="background:#27ae60; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                📊 Export to Excel
            </button>
</a>
        </div>

        <form action="{{ route('master.quotreq.logdate') }}" method="GET" class="mb-3 d-flex align-items-end gap-3">
    <div>
        <label for="start_date" class="form-label">Start Date:</label>
        <input type="date" name="start_date" id="start_date"
            class="form-control" value="{{ request('start_date') }}">
    </div>

    <div>
        <label for="end_date" class="form-label">End Date:</label>
        <input type="date" name="end_date" id="end_date"
            class="form-control" value="{{ request('end_date') }}">
    </div>

    <div>
        <button type="submit" class="btn btn-success">Filter</button>
        @if(request('start_date') || request('end_date'))
            <a href="{{ route('master.quotreq.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </div>
</form>


        <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".clickable-row").forEach(function(row) {
        row.addEventListener("click", function() {
            window.location = this.dataset.href;
        });
    });
});
</script>

<pre>
Start: {{ request('start_date') }}
End: {{ request('end_date') }}
Jumlah data: {{ count($cases) }}
</pre>

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
        <th>Status</th>
        <th>Nama Type</th>
        <th>ERF</th>
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

@forelse($cases ?? [] as $service)
        <tr class="clickable-row" data-href="{{ route('cm.case.show', $service->id) }}">
            <td>{{ $service->cof_id }}</td> <!-- COF-ID -->
            <td>{{ $service->customer_name }}</td>
            <td>{{ $service->phone_number }}</td>
            <td>{{ $service->brand }}</td>
            <td>{{ $service->product_number }}</td> 
            <td>{{ $service->serial_number }}</td> <!-- SN -->
            <td>{{ $service->status }}</td>
            <td>{{ $service->nama_type }}</td>

<td>
    @if($service->erf_file)
        <a href="{{ asset('storage/' . $service->erf_file) }}" target="_blank" rel="noopener noreferrer">
            📄 PDF
        </a>
    @else
        —
    @endif
</td>



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
