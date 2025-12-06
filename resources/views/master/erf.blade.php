@extends('master.layout.app')

@section('title', 'Upload ERF')

@section('content')
<h3>Upload ERF untuk COF-ID: {{ $case->cof_id }}</h3>

<form action="{{ route('master.erf.upload', $case->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>File ERF (PDF/DOC/DOCX)</label>
    <input type="file" name="erf_file" class="form-control mb-3">

    <button class="btn btn-success">Upload</button>
</form>
@endsection
