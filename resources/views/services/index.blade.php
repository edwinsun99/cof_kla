@extends('layouts.app')

@section('content')
    <h3>View Orders</h3>

    <!-- Search / Filter Form -->
    <form class="row g-3 mb-3">
        <div class="col-md-3">
            <label class="form-label">Customer Name</label>
            <input type="text" class="form-control" name="customer_name">
        </div>
        <div class="col-md-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="col-md-3">
            <label class="form-label">Date From</label>
            <input type="date" class="form-control" name="date_from">
        </div>
        <div class="col-md-3">
            <label class="form-label">Date To</label>
            <input type="date" class="form-control" name="date_to">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Data Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Phone</th>
                <th>Unit</th>
                <th>Serial No</th>
                <th>Condition</th>
                <th>Repair Summary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->customer_name }}</td>
                    <td>{{ $service->phone }}</td>
                    <td>{{ $service->unit }}</td>
                    <td>{{ $service->serial_number }}</td>
                    <td>{{ $service->condition }}</td>
                    <td>{{ $service->repair_summary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
