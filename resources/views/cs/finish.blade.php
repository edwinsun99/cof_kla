@extends('cs.layout.app')

@section('title', 'Finish Repair')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">🛬 Finish Repair</h2>

    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Serial Number</th>
                <th>Finish Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $index => $service)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $service->customer_name }}</td>
                    <td>{{ $service->product_number }}</td>
                    <td>{{ $service->serial_number }}</td>
                    <td>{{ $service->updated_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data service yang selesai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
