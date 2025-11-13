{{-- resources/views/newcase.blade.php --}}
@extends('cm.layout.app')

@section('title', 'New Case')

@section('content')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pnInput = document.getElementById('product_number');
    const namaTypeInput = document.getElementById('nama_type');

    // debounce biar ga spam request
    function debounce(fn, delay = 350) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => fn(...args), delay);
        };
    }

    const fetchNamaType = debounce(async function (pn) {
        pn = pn.trim();
        if (!pn) {
            namaTypeInput.value = '';
            return;
        }

        try {
            const res = await fetch(`/product/by-pn/${encodeURIComponent(pn)}`);
            if (!res.ok) throw new Error('HTTP error ' + res.status);

            const data = await res.json();
            if (data.found && data.product) {
                namaTypeInput.value = data.product.nama_type;
            } else {
                namaTypeInput.value = '';
            }
        } catch (err) {
            console.error('Fetch error:', err);
            namaTypeInput.value = '';
        }
    }, 350);

    pnInput.addEventListener('input', function () {
        fetchNamaType(this.value);
    });

    pnInput.addEventListener('blur', function () {
        fetchNamaType(this.value);
    });
});
</script>

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-gradient text-white" style="background: linear-gradient(90deg, #6f42c1, #6610f2);">
            <h4 class="mb-0 fw-bold">
                <i class="bi bi-file-earmark-text"></i> Customer Order Form (COF)
            </h4>
            <small class="text-light">Input data customer dan service order</small>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf

                {{-- Customer Information --}}
                <h5 class="mt-3 text-primary fw-bold">
                    <i class="bi bi-person-fill"></i> Customer Information
                </h5>
                <hr class="mt-1">

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Customer Name</label>
                        <input type="text" class="form-control shadow-sm" name="customer_name" placeholder="Nama customer">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" placeholder="Email">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Contact Person</label>
                        <input type="text" class="form-control shadow-sm" name="contact" placeholder="Nama kontak">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Phone Number</label>
                        <input type="text" class="form-control shadow-sm" name="phone_number" placeholder="+62...">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea class="form-control shadow-sm" name="address" rows="2"></textarea>
                </div>

                {{-- Service Information --}}
                <h5 class="mt-4 text-primary fw-bold">
                    <i class="bi bi-wrench-adjustable"></i> Service Information
                </h5>
                <hr class="mt-1">

                <div class="row mb-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Received Date</label>
                        <input type="date" class="form-control shadow-sm" name="received_date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Started Date</label>
                        <input type="date" class="form-control shadow-sm" name="started_date">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Finished Date</label>
                        <input type="date" class="form-control shadow-sm" name="finished_date">
                    </div>
                </div>

                {{-- Service Unit --}}
                <h5 class="mt-4 text-primary fw-bold">
                    <i class="bi bi-laptop"></i> Service Unit
                </h5>
                <hr class="mt-1">

                <div class="row mb-3">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Brand</label>
                        <input type="text" class="form-control shadow-sm" name="brand">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Product Number</label>
                        <input type="text" id="product_number" name="product_number" class="form-control shadow-sm"
                            placeholder="Masukkan Product Number" autocomplete="off" list="pn_suggestions">
                        <datalist id="pn_suggestions"></datalist>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Serial Number</label>
                        <input type="text" class="form-control shadow-sm" name="serial_number">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-semibold">Nama Type</label>
                        <input type="text" id="nama_type" name="nama_type" class="form-control shadow-sm" placeholder="Nama Type"   >
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Fault Description</label>
                    <textarea class="form-control shadow-sm" name="fault_description" rows="2"></textarea>
                </div>

                {{-- Accessories --}}
                <h5 class="mt-4 text-primary fw-bold">
                    <i class="bi bi-plug"></i> Accessories
                </h5>
                <hr class="mt-1">

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Accessories</label>
                        <input type="text" class="form-control shadow-sm" name="accessories" placeholder="Charger, Bag, etc.">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Unit Condition</label>
                    <textarea class="form-control shadow-sm" name="kondisi_unit" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Repair Summary</label>
                    <textarea class="form-control shadow-sm" name="repair_summary" rows="2"></textarea>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('case.index') }}" class="btn btn-outline-secondary me-2 rounded-pill px-4">
                        <i class="bi bi-arrow-left-circle"></i> Cancel
                    </a>
                    <button type="submit" class="btn rounded-pill px-4 text-white fw-semibold"
                        style="background: linear-gradient(90deg, #6f42c1, #6610f2); border: none;">
                        <i class="bi bi-save"></i> Save Case
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
