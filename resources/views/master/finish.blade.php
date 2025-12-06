@extends('master.layout.app')

@section('title', 'Case')

@section('content')
    <div style="padding: 20px;">
        <h2 style="color: purple; margin-bottom: 20px;">📂 Finish Repair</h2>

        <div style="margin-bottom: 20px;">
            <a href="{{ route('excel.cofdata') }}" class="btn btn-success">
<button style="background:#27ae60; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                📊 Export to Excel
            </button>
</a>

              <a href="{{ route('master.newcase') }}">
                <button style="background:#e67e22; color:white; border:none; padding:8px 14px; border-radius:6px; cursor:pointer;">
                    ➕ Create New Case
                </button>
            </a>
        </div>

        <form action="{{ route('master.finish.logdate') }}" method="GET" class="mb-3 d-flex align-items-end gap-3">

    {{-- DROPDOWN CABANG --}}
    <div>
        <label for="branch_id" class="form-label">Cabang:</label>
        <select name="branch_id" id="branch_id" class="form-control">
            <option value="all">Semua Cabang</option>

            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}"
                    {{ (isset($selected_branch) && $selected_branch == $branch->id) ? 'selected' : '' }}>
                    {{ $branch->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- START DATE --}}
    <div>
        <label for="start_date" class="form-label">Start Date:</label>
        <input type="date" name="start_date" id="start_date"
            class="form-control" value="{{ $start_date }}">
    </div>

    {{-- END DATE --}}
    <div>
        <label for="end_date" class="form-label">End Date:</label>
        <input type="date" name="end_date" id="end_date"
            class="form-control" value="{{ $end_date }}">
    </div>

    <div>
        <button type="submit" class="btn btn-success">Filter</button>
        @if($start_date || $end_date || $selected_branch)
            <a href="{{ route('master.finish.repair') }}" class="btn btn-secondary">Reset</a>
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

        {{-- Table muncul disini persis dibawah tombol --}}
        <table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
            <thead>
    <tr style="background:#f2f2f2; text-align:left;">
        <th>No</th>
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

@forelse(collect($cases ?? [])->sortByDesc('received_date') as $service)
        <tr class="clickable-row" data-href="{{ route('case.show', $service->id) }}">
            <td>{{ $service->id }}</td> <!-- NO -->
            <td>{{ $service->cof_id }}</td> <!-- COF-ID -->
            <td>{{ $service->customer_name }}</td>
            <td>{{ $service->phone_number }}</td>
            <td>{{ $service->brand }}</td>
            <td>{{ $service->product_number }}</td>
            <td>{{ $service->serial_number }}</td> <!-- SN -->
            <td>{{ $service->status }}</td> <!-- SN -->
            <td>{{ $service->nama_type }}</td>
            <td>{{ $service->erf_file }}</td> <!-- SN -->
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
