@extends('cs.layout.app')

@section('title', 'Upload ERF')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">📚 Upload ERF (Engineer Report Form)</h2>

    <form action="{{ route('erf.upload') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-light">
        @csrf
        <div class="mb-3">
            <label for="case_id" class="form-label">Case ID</label>
            <input type="text" id="case_id" name="case_id" class="form-control" placeholder="Masukkan Case ID">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File ERF (PDF/DOCX)</label>
            <input type="file" id="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <button type="submit" class="btn btn-primary w-100">Upload</button>
    </form>
</div>
@endsection
