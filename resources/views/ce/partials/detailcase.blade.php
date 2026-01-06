<div class="row">
    {{-- Kolom kiri: info case --}}
    <div class="col-md-6">
        <h5>Case</h5>
        <table class="table table-bordered">
            <tr><th>COF-ID</th><td>{{ $case->cof_id }}</td></tr>
            <tr><th>Fault Desc</th><td>{{ $case->fault_description }}</td></tr>
            <tr><th>Unit Condition</th><td>{{ $case->kondisi_unit }}</td></tr>
            <tr><th>Received Date</th><td>{{ $case->received_date }}</td></tr>
            <tr><th>Started Date</th><td>{{ $case->started_date }}</td></tr>
            <tr><th>Finished Date</th><td>{{ $case->finished_date }}</td></tr>
            <tr><th>Repair Summary</th><td>{{ $case->repair_summary }}</td></tr>
        </table>
    </div>

    {{-- Kolom kanan: info produk --}}
    <div class="col-md-6">
        <h5>Product</h5>
        <table class="table table-bordered">
            <tr><th>Brand</th><td>{{ $case->brand }}</td></tr>
            <tr><th>Product Number</th><td>{{ $case->product_number }}</td></tr>
            <tr><th>Serial Number</th><td>{{ $case->serial_number }}</td></tr>
            <tr><th>Product Type</th><td>{{ $case->nama_type }}</td></tr>
            <tr><th>Accessories</th><td>{{ $case->accessories }}</td></tr>
        </table>
    </div>
</div>

<hr>

@php
    $service = $service ?? ($case ?? null);
@endphp

@if(!$service)
    <div class="alert alert-warning">Service not found.</div>
@else
    {{-- FORM UTAMA: Menyatukan Status & Note --}}
    <form action="{{ route('ce.case.updateAll', $service->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 mb-4" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px);">
                    <div class="card-body">
                        <h5 class="mb-3">Update Progress</h5>
                        
                        {{-- CURRENT STATUS (Read-only info) --}}
                        <div class="mb-3">
                            <label class="form-label"><strong>Current Status:</strong></label>
                            <span class="badge bg-info text-dark ms-2">{{ strtoupper($service->status) }}</span>
                        </div>

                        {{-- CHANGE STATUS --}}
                        <div class="mb-3">
                            <label class="form-label"><strong>Change Status *</strong></label>
                            <select name="status" class="form-control" required>
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

                        {{-- INPUT LOGNOTE --}}
                        <div class="mb-3">
                            <label class="form-label"><strong>Add Log Note</strong> (Optional)</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Tulis catatan perkembangan unit di sini..."></textarea>
                            <small class="text-muted">Isi jika ada catatan tambahan.</small>
                        </div>
                        
                        {{-- SATU TOMBOL SAVE UNTUK SEMUA --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save me-2"></i> Save All Changes (Status & Lognote)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endif

<hr>

{{-- RIWAYAT LOGNOTE (Hanya Tampilan) --}}
<h4>Lognote History</h4>
@php
    $notes = \DB::table('lognote')
        ->where('cof_id', $service->cof_id)
        ->orderBy('created_at', 'desc')
        ->get();
@endphp

<table class="table table-hover mt-3">
    <thead class="table-light">
        <tr>
            <th style="width: 150px;">Date</th>
            <th style="width: 200px;">User</th>
            <th>Log Description</th>
        </tr>
    </thead>
    <tbody>
        @forelse($notes as $note)
        <tr>
            <td>{{ $note->created_at ? \Carbon\Carbon::parse($note->created_at)->timezone('Asia/Jakarta')->format('d M Y H:i') : '-' }}</td>
            <td><strong>{{ $note->username }}</strong></td>
            <td>{{ $note->logdesc }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center text-muted p-4">Belum ada riwayat lognote.</td>
        </tr>
        @endforelse
    </tbody>
</table>