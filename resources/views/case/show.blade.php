@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Service</h2>
        <ul>
            <li><strong>COF-ID:</strong> {{ $service->id }}</li>
            <li><strong>Customer Name:</strong> {{ $service->customer_name }}</li>
            <li><strong>Contact:</strong> {{ $service->contact }}</li>
            <li><strong>Phone:</strong> {{ $service->phone_number }}</li>
            <li><strong>Brand:</strong> {{ $service->brand }}</li>
            <li><strong>Product Number:</strong> {{ $service->product_number }}</li>
            <li><strong>Serial Number:</strong> {{ $service->serial_number }}</li>
            <li><strong>Type:</strong> {{ $service->nama_type }}</li>
            <li><strong>Received Date:</strong> {{ $service->received_date }}</li>
        </ul>
    </div>
@endsection
