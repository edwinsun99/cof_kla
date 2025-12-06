@extends('master.layout.app')

@section('title', 'Select Case for ERF')

@section('content')
<h3>Pilih Case untuk Upload ERF</h3>

<table class="table table-bordered">
    <tr>
        <th>COF-ID</th>
        <th>Customer</th>
        <th>Aksi</th>
    </tr>

    @foreach($cases as $c)
        <tr>
            <td>{{ $c->cof_id }}</td>
            <td>{{ $c->customer_name }}</td>
            <td>
                <a href="{{ route('master.erf.form', $c->id) }}" class="btn btn-primary btn-sm">
                    Upload ERF
                </a>
            </td>
        </tr>
    @endforeach
</table>
@endsection
