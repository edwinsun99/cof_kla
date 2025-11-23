@extends('ce.layout.app')

@section('title', 'engineer')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Engineer</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
     <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".clickable-row").forEach(function(row) {
        row.addEventListener("click", function() {
            window.location = this.dataset.href;
        });
    });
});
</script>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>COF ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>SN</th>
                                <th>Product Number</th>
                                                <th>Brand</th>
                                                                <th>Nama Type</th>
                                                                                <th>Received Date</th>




                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($cases as $case)
                    <tr class="clickable-row" data-href="{{ route('ce.case.show', $case->id) }}">
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $case->cof_id }}</td>
<td>
    <a href="{{ route('ce.case.show', $case->id) }}" style="text-decoration:none;">
        {{ $case->customer_name }} 
    </a>
</td>
                    <td>{{ $case->phone_number }}</td>
                    <td>{{ $case->serial_number }}</td>
                    <td>{{ $case->product_number }}</td>
                    <td>{{ $case->brand }}</td>
                    <td>{{ $case->nama_type }}</td>
                    <td>{{ $case->received_date }}</td>

                    <td>
                        <span class="badge bg-warning">{{ $case->status }}</span>
                    </td>

                    <td>
                        {{-- Button Progress --}}
                        @if($case->status == 'NEW' || $case->status == 'ASSIGNED')
                            <form action="{{ route('ce.engineer.progress', $case->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-primary btn-sm">Set Progress</button>
                            </form>
                        @endif

                        {{-- Button Finish --}}
                        @if($case->status == 'PROGRESS')
                            <form action="{{ route('ce.engineer.finish', $case->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">Finish</button>
                            </form>
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada case</td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>
@endsection

