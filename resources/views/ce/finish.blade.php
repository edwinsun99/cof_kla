@extends('ce.layout.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Finished Cases</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>COF ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Status</th>
                <th width="130px">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($cases as $case)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $case->cof_id }}</td>
                    <td>{{ $case->customer_name }}</td>
                    <td>{{ $case->product }}</td>
                    <td>
                        <span class="badge bg-success">Finished</span>
                    </td>
                    <td>
                        <!-- CLOSE -->
                        <form action="{{ route('ce.finished.close', $case->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Close Data</button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada case yang selesai</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

