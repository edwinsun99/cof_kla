<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; color: #333; }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 16px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
    }

    .info-label { font-size: 0.75rem; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.8px; }
    .info-value { font-size: 0.95rem; font-weight: 500; color: #2d3436; margin-bottom: 0; }
    
    .section-title { 
        color: #6f42c1; 
        font-weight: 700; 
        border-left: 4px solid #ffc107; 
        padding-left: 12px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
    }

    .form-select-lg {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236f42c1' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px 12px;
        border-radius: 12px !important;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .btn-save-all {
        background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
        border: none;
        color: white;
        padding: 15px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-save-all:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(111, 66, 193, 0.4);
        color: #ffc107;
    }

    .badge-custom {
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 600;
    }
</style>

<div class="container-fluid py-4">
    <div class="row g-4">
        {{-- Kolom kiri: Info Case --}}
        <div class="col-md-6">
            <div class="glass-card p-4 h-100">
                <h5 class="section-title"><i class="fas fa-folder-open me-3"></i>Case Information</h5>
                <div class="row g-4">
                    <div class="col-6">
                        <p class="info-label mb-1">COF-ID</p>
                        <p class="info-value fw-bold text-primary">{{ $case->cof_id }}</p>
                    </div>
                    <div class="col-6 border-start">
                        <p class="info-label mb-1">Received Date</p>
                        <p class="info-value">{{ $case->received_date }}</p>
                    </div>

                    <div class="col-6">
                        <p class="info-label mb-1">Unit Condition</p>
                        <p class="info-value">{{ $case->kondisi_unit }}</p>
                    </div>
                    <div class="col-6 border-start">
                        <p class="info-label mb-1">Repair Summary</p>
                        <p class="info-value text-dark">{{ $case->repair_summary ?? '-' }}</p>
                    </div>

                    <div class="col-6">
                        <p class="info-label mb-1">Started Date</p>
                        <p class="info-value text-primary">
                            {{ $case->started_date ? \Carbon\Carbon::parse($case->started_date)->format('Y-m-d') : '-' }}
                        </p>
                    </div>
                    <div class="col-6 border-start">
                        <p class="info-label mb-1">Finished Date</p>
                        <p class="info-value text-success font-monospace fw-bold">
                            {{ $case->finished_date ? \Carbon\Carbon::parse($case->finished_date)->format('Y-m-d') : '-' }}
                        </p>
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-3" style="background: rgba(111, 66, 193, 0.05); border-left: 4px solid #6f42c1;">
                            <p class="info-label mb-1">Fault Description</p>
                            <p class="info-value italic">{{ $case->fault_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom kanan: Info Produk --}}
        <div class="col-md-6">
            <div class="glass-card p-4 h-100">
                <h5 class="section-title"><i class="fas fa-microchip me-3"></i>Product Details</h5>
                <div class="row g-4">
                    <div class="col-6">
                        <p class="info-label mb-1">Brand</p>
                        <span class="badge bg-warning text-dark px-3 py-2">{{ $case->brand }}</span>
                    </div>
                    <div class="col-6 border-start">
                        <p class="info-label mb-1">Serial Number</p>
                        <p class="info-value font-monospace">{{ $case->serial_number }}</p>
                    </div>

                    <div class="col-6">
                        <p class="info-label mb-1">Accessories</p>
                        <p class="info-value text-muted small"><i>{{ $case->accessories }}</i></p>
                    </div>
                    <div class="col-6 border-start">
                        <p class="info-label mb-1">Product Number</p>
                        <p class="info-value">{{ $case->product_number }}</p>
                    </div>

                    <div class="col-12">
                        <div class="p-3 rounded-3 bg-light">
                            <p class="info-label mb-1">Product Name / Type</p>
                            <p class="info-value fw-bold" style="font-size: 1.1rem;">{{ $case->nama_type }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php $service = $service ?? ($case ?? null); @endphp

    @if(!$service)
        <div class="alert alert-warning mt-4 rounded-3 border-0 shadow-sm">Service data not found.</div>
    @else
        {{-- FORM UTAMA: Update Status & Lognote --}}
        <form action="{{ route('master.case.updateAll', $service->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="glass-card p-4 border-top border-4 border-primary">
                <h5 class="section-title"><i class="fas fa-sync-alt me-2"></i>Update Progress</h5>
                
                <div class="row align-items-center mb-4">
                    <div class="col-md-4">
                        <label class="info-label d-block mb-1">Current Status</label>
                        <span class="badge-custom bg-info text-white text-uppercase" style="font-size: 0.9rem;">
                            <i class="fas fa-info-circle me-1"></i> {{ $service->status }}
                        </span>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label info-label">Change Status to *</label>
                        <select name="status" class="form-select shadow-sm" required>
                            @php
                                $opsi = ['repair progress', 'quotation request','quotation approved', 'quotation cancelled', 'cancel repair', 'finish repair'];
                            @endphp
                            @foreach ($opsi as $st)
                                <option value="{{ $st }}" {{ $service->status == $st ? 'selected' : '' }}>
                                    {{ ucwords($st) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label info-label">Add Log Note <span class="text-lowercase fw-normal">(Opsional)</span></label>
                    <textarea name="note" class="form-control shadow-sm" rows="3" placeholder="Apa yang sedang dikerjakan hari ini?"></textarea>
                </div>

                <button type="submit" class="btn btn-save-all w-100 shadow">
                    <i class="fas fa-cloud-upload-alt me-2"></i> SAVE ALL CHANGES
                </button>
            </div>
        </form>
    @endif

    {{-- RIWAYAT LOGNOTE --}}
    <div class="mt-5">
        <h5 class="section-title"><i class="fas fa-history me-2"></i>Lognote History</h5>
        <div class="glass-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 px-4 py-3 info-label">Timestamp</th>
                            <th class="border-0 px-4 py-3 info-label">User</th>
                            <th class="border-0 px-4 py-3 info-label">Log Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $notes = \DB::table('lognote')
                                ->where('cof_id', $service->cof_id)
                                ->orderBy('created_at', 'desc')
                                ->get();
                        @endphp
                        @forelse($notes as $note)
                        <tr>
                            <td class="px-4 py-3 text-muted" style="font-size: 0.9rem;">
                                <i class="far fa-clock me-1"></i> {{ $note->created_at ? \Carbon\Carbon::parse($note->created_at)->timezone('Asia/Jakarta')->format('d M Y, H:i') : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="fw-bold text-dark"><i class="fas fa-user-circle me-1 text-primary"></i> {{ $note->username }}</span>
                            </td>
                            <td class="px-4 py-3 text-secondary">{{ $note->logdesc }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 text-muted">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="50" class="opacity-25 mb-3 d-block mx-auto">
                                Belum ada riwayat catatan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>