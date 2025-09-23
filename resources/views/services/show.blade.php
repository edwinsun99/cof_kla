@extends('layouts.app')

@section('title', 'Detail Case')

@section('content')
<div class="container mt-4">
    <h3>Detail Case</h3>
    <table class="table table-bordered">
        <tr>
            <th>Customer Name</th>
            <td>{{ $service->customer_name }}</td>
        </tr>
        <tr>
            <th>Contact Person</th>
            <td>{{ $service->contact_person }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $service->address }}</td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td>{{ $service->phone_number }}</td>
        </tr>
        <tr>
            <th>Brand</th>
            <td>{{ $service->brand }}</td>
        </tr>
        <tr>
            <th>Product Number</th>
            <td>{{ $service->product_number }}</td>
        </tr>
        <tr>
            <th>Serial Number</th>
            <td>{{ $service->serial_number }}</td>
        </tr>
        <tr>
            <th>Fault Description</th>
            <td>{{ $service->fault_description }}</td>
        </tr>
    </table>

    <a href="{{ route('services.index') }}" class="btn btn-secondary">⬅ Back</a>
</div>
@endsection
