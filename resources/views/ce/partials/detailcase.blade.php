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

<h4>Lognote</h4>

@php
    // Ambil data lognote berdasarkan service_id dari $service
    $notes = \DB::table('lognote')
        ->where('cof_id', $service->id)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 150px;">Date</th>
            <th style="width: 200px;">User</th>
            <th>Log Description</th>
        </tr>
    </thead>

    <tbody>
        @forelse($notes as $note)
        <tr>
            <td>{{ $note->created_at ? \Carbon\Carbon::parse($note->created_at)->format('Y-m-d H:i') : '-' }}</td>
            <td>{{ $note->un }}</td>
            <td>{{ $note->logdesc }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center text-muted">Belum ada lognote.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- Form Input Lognote -->
<form action="{{ route('ce.case.note', $service->id) }}" method="POST" class="mt-3">
    @csrf

    <div class="mb-2">
        <textarea name="note" class="form-control" rows="3" placeholder="Tulis note kamu di sini..." required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Note</button>
</form>

</div>
