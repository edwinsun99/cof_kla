{{-- resources/views/newcase.blade.php --}}
@extends('layouts.app')

@section('title', 'New Case')

@section('content')
<div class="container mt-4">
    <h3 class="mb-1 fw-bold"><i class="bi bi-file-earmark-text"></i> Customer Order Form (COF)</h3>
    <small class="text-muted">Input data customer dan service order</small>
    <hr>

    {{-- FORM SIMPAN DATA --}}
    <form action="{{ route('services.store') }}" method="POST">
        @csrf

        {{-- Customer Information --}}
        <h5 class="mt-4 text-primary fw-bold">
            <i class="bi bi-person-fill"></i> Customer Information
        </h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="customer_name" placeholder="e.g. John Doe">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Person</label>
                <input type="text" class="form-control" name="contact_person" placeholder="e.g. Jane Doe">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-9">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Street, City, Country">
            </div>
            <div class="col-md-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" placeholder="+62...">
            </div>
        </div>

        {{-- Service Information --}}
        <h5 class="mt-4 text-primary fw-bold">
            <i class="bi bi-wrench-adjustable"></i> Service Information
        </h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label">Received Date</label>
                <input type="date" class="form-control" name="received_date">
            </div>
            <div class="col-md-4">
                <label class="form-label">Started Date</label>
                <input type="date" class="form-control" name="started_date">
            </div>
            <div class="col-md-4">
                <label class="form-label">Finished Date</label>
                <input type="date" class="form-control" name="finished_date">
            </div>
        </div>

        {{-- Service Unit --}}
        <h5 class="mt-4 text-primary fw-bold">
            <i class="bi bi-laptop"></i> Service Unit
        </h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label class="form-label">Brand</label>
                <select class="form-select" name="brand">
                    <option selected disabled>Select Brand</option>
                    <option>Acer</option>
                    <option>Asus</option>
                    <option>HP</option>
                    <option>Dell</option>
                    <option>Lenovo</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Product Number</label>
                <input type="text" class="form-control" name="product_number">
            </div>
            <div class="col-md-3">
                <label class="form-label">Serial Number</label>
                <input type="text" class="form-control" name="serial_number">
            </div>
            <div class="col-md-3">
                <label class="form-label">Product Type</label>
                <input type="text" class="form-control" name="product_type" placeholder="Laptop, Printer, etc.">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Accessories</label>
                <input type="text" class="form-control" name="accessories" placeholder="Charger, Bag, etc.">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Fault Description</label>
            <textarea class="form-control" name="fault_description" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Unit Condition</label>
            <textarea class="form-control" name="unit_condition" rows="2"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Repair Summary</label>
            <textarea class="form-control" name="repair_summary" rows="2"></textarea>
        </div>

        {{-- BUTTONS --}}
        <div class="d-flex justify-content-end">
            <a href="{{ route('case.index') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left-circle"></i> Cancel
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Case
            </button>
        </div>
    </form>
</div>
@endsection
