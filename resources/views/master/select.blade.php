@extends('master.layout.app')

@section('title', 'Select Case for ERF')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-purple: #6a0dad;
        --soft-purple: #f3e8ff;
        --accent-yellow: #ffc107;
        --bg-glass: rgba(255, 255, 255, 0.7);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc; /* Abu-abu sangat muda agar elemen putih terlihat pop-out */
    }

    /* Heading Style */
    .page-title {
        color: var(--primary-purple);
        font-weight: 700;
        border-left: 6px solid var(--accent-yellow);
        padding-left: 15px;
        margin-bottom: 30px;
    }

    /* Glassmorphism Card */
    .glass-card {
        background: var(--bg-glass);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.5);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 32px 0 rgba(106, 13, 173, 0.05);
        margin-bottom: 30px;
    }

    /* Modern Filter Input */
    .filter-input {
        border-radius: 12px !important;
        border: 1px solid #e2e8f0 !important;
        padding: 12px 15px !important;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .filter-input:focus {
        border-color: var(--primary-purple) !important;
        box-shadow: 0 0 0 4px rgba(106, 13, 173, 0.1) !important;
    }

    /* Custom Button Style */
    .btn-modern-purple {
        background: var(--primary-purple);
        color: white;
        border-radius: 12px;
        padding: 12px 24px;
        font-weight: 600;
        border: none;
        transition: transform 0.2s;
    }

    .btn-modern-purple:hover {
        transform: translateY(-2px);
        background: #520a85;
        color: white;
    }

    /* Custom Table: Floating Rows */
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px; /* Memberi jarak antar baris */
    }

    .modern-table thead th {
        padding: 10px 20px;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        border: none;
    }

    .modern-table tbody tr {
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }

    .modern-table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 5px 20px rgba(106, 13, 173, 0.08);
    }

    .modern-table td {
        padding: 18px 20px;
        border: none;
        vertical-align: middle;
    }

    .modern-table td:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .modern-table td:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    /* ID Badge */
    .id-badge {
        background: var(--soft-purple);
        color: var(--primary-purple);
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.85rem;
    }

    .customer-name {
        font-weight: 600;
        color: #1e293b;
    }
</style>

<div class="container py-4">
    <h3 class="page-title">Pilih Case untuk Upload ERF</h3>

   {{-- FILTER SECTION --}}
<div class="glass-card">
    <form action="{{ route('master.selecterf.logdate') }}" method="GET" class="row g-3 align-items-end">
        <div class="col-md-9">
            <label class="form-label small fw-bold text-muted">CABANG</label>
            <select name="branch_id" class="form-select filter-input">
                <option value="all">Semua Cabang</option>
                @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}" {{ (isset($selected_branch) && $selected_branch == $branch->id) ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn-custom w-100 justify-content-center shadow-sm" style="background: var(--primary-purple); color: white;">
                Apply Filter
            </button>
            @if($start_date || $end_date || $selected_branch)
                <a href="{{ route('master.selecterf.logdate') }}" class="btn btn-light border d-flex align-items-center justify-content-center" style="border-radius: 12px; width: 80px;">Reset</a>
            @endif
        </div>
    </form>
</div>

    {{-- TABLE SECTION --}}
    <div class="table-responsive">
        <table class="modern-table">
            <thead>
                <tr>
                    <th>COF-ID</th>
                    <th>Customer Details</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cases as $c)
                    <tr>
                        <td width="20%">
                            <span class="id-badge">{{ $c->cof_id }}</span>
                        </td>
                        <td>
                            <span class="customer-name">{{ $c->customer_name }}</span>
                        </td>

                          <td>
                            <span class="status">{{ $c->status }}</span>
                        </td>

                        <td class="text-end">
                            <a href="{{ route('master.erf.form', $c->id) }}" class="btn btn-sm shadow-sm" style="background: var(--accent-yellow); color: #000; font-weight: 700; border-radius: 10px; padding: 8px 16px;">
                                <i class="fas fa-upload me-1"></i> Upload ERF
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection