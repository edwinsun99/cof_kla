d<div class="row">
    {{-- Kolom kiri: info case --}}
    <div class="col-md-6">
        <h5>Case</h5>
        <table class="table table-bordered">
            <tr>
                <th>COF-ID</th>
                <td>{{ $case->cof_id }}</td>
            </tr>
            <tr>
                <th>Fault Desc</th>
                <td>{{ $case->fault_description }}</td>
            </tr>
            <tr>
                <th>Unit Condition</th>
                <td>{{ $case->kondisi_unit }}</td>
            </tr>
            <tr>
                <th>Received Date</th>
                <td>{{ $case->received_date }}</td>
            </tr>
               <tr>
                <th>Started Date</th>
                <td>{{ $case->started_date }}</td>
            </tr>
             <tr>
                <th>Finished Date</th>
                <td>{{ $case->finished_date }}</td>
            </tr>
              <tr>
                <th>Repair Summary</th>
                <td>{{ $case->repair_summary }}</td>
            </tr>
</table>
    </div>

    {{-- Kolom kanan: info produk --}}
    <div class="col-md-6">
        <h5>Product</h5>
        <table class="table table-bordered">
            <tr>
                <th>Brand</th>
                <td>{{ $case->brand }}</td>
            </tr>
            <tr>
                <th>Product Number</th>
                <td>{{ $case->product_number }}</td>
            </tr>
            <tr>
                <th>Serial Number</th>
                <td>{{ $case->serial_number }}</td>
            </tr>
            <tr>
                <th>Product Type</th>
                <td>{{ $case->nama_type }}</td>
            </tr>
            <tr>
                <th>Accessories</th>
                <td>{{ $case->accessories }}</td>
            </tr>
        </table>
    </div>

@php
    // fallback kalau controller belum mengirim; mencegah undefined variable
    $service = $service ?? ($case ?? null);
    $statusOptions = $statusOptions ?? [];
@endphp

@if(!$service)
    <div class="alert alert-warning">Service not found.</div>
@else
    <form action="{{ route('ce.case.updateStatus', $service->id) }}" method="POST">
        @csrf

        <label>Status</label>
        
{{-- CURRENT STATUS --}}
<div class="mb-3">
    <label class="form-label"><strong>Current Status:</strong></label>
    <div class="p-2 border rounded bg-light">
        {{ ucfirst($service->status) }}
    </div>
</div>

{{-- CHANGE STATUS --}}
<div class="mb-3">
    <label class="form-label"><strong>Change Status *</strong></label>
    
    <select name="status" class="form-control">
        @php
            $opsi = [
                'repair progress',
                'quotation request',
                'cancel repair',
                'finish repair'
            ];
        @endphp

        @foreach ($opsi as $st)
            <option value="{{ $st }}" {{ $service->status == $st ? 'selected' : '' }}>
                {{ ucwords($st) }}
            </option>
        @endforeach
    </select>
</div>




        <button type="submit" class="btn btn-primary mt-2">Save</button>
    </form>
@endif


</div>
